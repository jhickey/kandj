<?php
 
class Login_Controller extends Base_Controller {
 
    public $restful = true;
 	  /*
	|--------------------------------------------------------------------------
	| Get the current login status
	|--------------------------------------------------------------------------
	| Simple check to see if a user is logged in or not. If true, also returns whether or  
	| not user is a developer. 
	|
	*/
    public function get_index() 
    {
    
    	
    	$status = array('success' => '');
    	if (Sentry::check())
		{	
			$user = Sentry::user();
			$user_name = $user->get('email');
    		$status['success'] = true;
	    	$status['user_name'] = $user_name;	
		}
		else
		{
  	  		$status['success'] = 'false';
		}
 		return Response::json($status, 200, Config::get('cbconf.cors_header'));
    }
      /*
	|--------------------------------------------------------------------------
	| Submit a login request. 
	|--------------------------------------------------------------------------
	| Validates username and password and attempts the login. Partially localized. 
	|	
	|
	*/
    public function post_index() 
    {
    	$status = array('success' => '');
    	$input = Input::json();
		$json = json_encode($input);
		$unsafe_input = json_decode($json, true);
       	$vars = array(
					'email' => $unsafe_input['email'],
					'password'  => $unsafe_input['password']
					);
			   	$rules = array(
    				'email' => 'required',
    				'password'  => 'required'
				);
    	
    			$validation = Validator::make($vars, $rules);
				
				if ($validation->fails())
				{
					$v =  $validation->errors;
					//Need custom errors
					return Response::json($v, 200);
				}
    	   	
    	if (Sentry::user_exists($vars['email']))
		{
			try
			{
				// log the user in
				$valid_login = Sentry::login($vars['email'], $vars['password'], true);
				if ($valid_login)
				{
					$status['success'] = true;
					return Response::json($status , 200);
				}
				else
				{
					$status['success'] = false;
					return Response::json($status , 200);
				}
			}
			catch (Sentry\SentryException $e)
			{
				$errors = $e->getMessage();
				return Response::json($errors, 200);
				//Need custom errors
			}
		}
		else 
		{
			$status['success'] = $input;
			return Response::json($status, 200);
		}
    }
}
 
?>