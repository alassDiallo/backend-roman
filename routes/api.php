<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Compte;

// use Validator;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [App\Http\Controllers\ControllerUser::class, 'register']);
Route::post('/validerCompte', [App\Http\Controllers\ControllerUser::class, 'validerCompte']);
Route::post('/creationcompte',function(Request $request){

  // $rules = [
  //   'email'=>'required|email:unique:users',
  //   'name'=>'required|string|unique:users',
  //   'password'=>'required|string'
  // ];

  // $errors = Validator::make($request->all(),$rules);

  // if($errors->fails()){
  //   return response()->json($errors->errors()->toJson());
  // }

  return response()->json(['success'=>'reussi']);

});

Route::get('/',function(){
    
  return response()->json(['success'=>'bienvenue']);

});

Route::group([
  'middleware' => 'api',
  'prefix' => 'auth'
  
], function ($router) {
  
  Route::get('/rechercheLocalisation/{ville}',[App\Http\Controllers\recherche::class, 'rechercheVille'] );
    Route::post('/login', [App\Http\Controllers\ControllerUser::class, 'login']);
    Route::post('/modifierMonProfil', [App\Http\Controllers\ControllerUser::class, 'modifierMonProfil']);
    Route::post('/changerimage', [App\Http\Controllers\ControllerUser::class, 'changerimage']);
    Route::post('/recherche', [App\Http\Controllers\ControllerUser::class, 'recherche']);
    Route::post('/logout', [App\Http\Controllers\ControllerUser::class, 'logout']);
    Route::post('/refresh', [App\Http\Controllers\ControllerUser::class, 'refresh']);
    Route::get('/user-profile', [App\Http\Controllers\ControllerUser::class, 'userProfile']); 
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
