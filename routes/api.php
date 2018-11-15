<?php

use Illuminate\Http\Request;

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




/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//use Redirect;
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With, auth-token');
header('Access-Control-Allow-Credentials: true');
header("Access-Control-Allow-Origin: *");
/*
* Rest API Request , auth  & Route
*/ 
Route::group([
	    'prefix' => 'v1'
	], function()
	{   
		Route::get('/test', function(){
			die('test');
		});
		
		Route::match(['post','get'],'member/login', 'ApiController@login');
		Route::match(['post','get'],'member/signup', 'ApiController@register');
		Route::match(['post','get'],'member/updateProfile/{id}', 'ApiController@updateProfile'); 

        Route::match(['post','get'],'email_verification','ApiController@emailVerification');   
        
        // Route::match(['post','get'],'user/forgotPassword','ApiController@forgetPassword'); 
        // Route::match(['post','get'],'password/reset','ApiController@resetPassword'); 
		        
        // Route::match(['post','get'],'validate_user','ApiController@validateUser');
        // Route::match(['post','get'],'user/updatePassword','ApiController@changePassword'); 
        // Route::match(['post','get'],'account/deactivate/{id}','ApiController@deactivateUser'); 
        // Route::match(['post','get'],'userDetail/{id}','ApiController@userDetail'); 

        Route::group(['middleware' => 'jwt-auth'], function () 
        { 
          Route::match(['post','get'],'testing',function(){
            	die('test');
            }); 
          
        });   

        Route::match(['get','post'],'generateOtp',[
            'as' => 'generateOtp',
            'uses' => 'ApiController@generateOtp'
        ]);

        Route::match(['get','post'],'verifyOtp',[
            'as' => 'verifyOtp',
            'uses' => 'ApiController@verifyOtp'
        ]); 
        // if route not found
	    Route::any('{any}', function(){
				$data = [
							'status'=>0,
							'code'=>400,
							'message' => 'Bad request'
						];
				return \Response::json($data);
				
			});        

});    

