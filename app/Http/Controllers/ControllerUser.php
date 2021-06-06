<?php

namespace App\Http\Controllers;

use App\Models\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use Intervention\Image\Size;

class ControllerUser extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register','validerCompte']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
      $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (! $token = Auth::attempt($validator->validated())) {
            return response()->json(['success'=>false,'error' => 'login ou mot de passe incorrect'], 401);
        }

        return $this->createNewToken($token);
    }

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100|unique:users',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if($validator->fails()){
            return response()->json(['error'=>true,'errors'=>$validator->errors()]);
        }

        // $user = User::create(array_merge(
        //             $validator->validated(),
        //             ['password' => bcrypt($request->password)]
        //         ));

        return response()->json([
            'error'=>false,
            'message' => 'User successfully registered',
            // 'user' => $user
        ]);
    }

    public function recherche(Request $request){

        return response()->json($request);
    }

    public function validerCompte(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100|unique:users',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if($validator->fails()){
            return response()->json(['error'=>true,'errors'=>$validator->errors()]);
        }

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'profil'=>'photo.png',
            'password' => bcrypt($request->password),
           
            ]
                );
        
        // return response()->json($request);

        return response()->json([
            'error'=>false,
            'message' => 'User successfully registered',
            // 'user' => $user
        ]);
    }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout() {
        auth()->logout();

        return response()->json(['success' => true]);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile() {
        return response()->json(auth()->user());
    }

    public function modifierProfil(Request $request){
            if($request->image->hasFile()){
                
            }
    }

    public function changerimage(Request $request){
        $files= explode('/',$request->image);
        $file= $files[count($files)-1];
        //$filename = time() . "." .$file->getClientOriginalExtension();
        Image::make($file)->save(public_path("/").$file);
    return response()->json($file);
        if($request->hasFile('image')){
           
        }
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
      
      
        return response()->json([
            'success'=>true,
            'token' => $token,
            // 'token_type' => 'bearer',
            //'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => Auth::user()
        ]);
    }

}
