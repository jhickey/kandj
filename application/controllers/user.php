<?php
 
class User_Controller extends Base_Controller {
 
    public $restful = true;
 	  /*
	|--------------------------------------------------------------------------
	| Get user data 
	|--------------------------------------------------------------------------
	| Gets array of data stored for the user. 
	|
	|
	*/
    public function get_index() 
    {
 		try
		{	
			//need to implement get user property by key
    		$user = Sentry::user();
    		$user_data = $user->get(array('email', 'metadata'));
    	 	return Response::json($user_data, 200, Config::get('cbconf.cors_header'));
    	 }
    	 catch (Sentry\SentryException $e)
		 {
		 	//need custom errors
    		$errors = $e->getMessage();
    		return Response::json($errors, 200, Config::get('cbconf.cors_header'));
		 }
 			
    }
 	  /*
	|--------------------------------------------------------------------------
	| Create a new user
	|--------------------------------------------------------------------------
	| Does what is says on the tin. 
	|
	|
	*/
    public function post_index() 
    {
 		$input = Input::json();
 		$json  = json_encode($input);
		$vars = json_decode($json, true);
	try
		{
			
			// create the user - no activation required
			$user_id = Sentry::user()->create($vars);
				return Response::json(array('status' => 'success'), 200, Config::get('cbconf.cors_header'));
		}
		
		catch (Sentry\SentryException $e)
		{
			$errors = $e->getMessage();
		}
 		return Response::json($errors, 200, Config::get('cbconf.cors_header'));
    }
 
    public function put_index() 
    {
 	
    }
 	 /*
	|--------------------------------------------------------------------------
	| Delete a user
	|--------------------------------------------------------------------------
	| Deletes the current user. Need to destroy cookie as well on client. 
	|
	|
	*/
    public function delete_index() 
    {
 		try
		{
			$user = Sentry::user();
			$email = $user->get('email');
			Sentry::logout();
			$delete = $user->delete();
			if ($delete)
			{
				
			}
			else
			{
				return Response::json('Unknown error', 200, Config::get('cbconf.cors_header'));
			}
		}
		catch (Sentry\SentryException $e)
		{
			//need custom errors
			$errors = $e->getMessage();
			return Response::json($errors, 200, Config::get('cbconf.cors_header'));
		}
    } 
}
 
?>