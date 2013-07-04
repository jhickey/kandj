<?php
 
class Guest_Controller extends Base_Controller {
 
    public $restful = true;
 
    public function get_index() 
    {
    	$guests = Guest::all();
		return Response::eloquent($guests, 200);
    }
 
    public function post_index() 
    {
    	$input = Input::all();
    	
    	$rules = array(
			'first_name'=> 'required|max:50',
			'last_name'	=> 'required|max:50',
			'email' => 'required|email',
			'status' => 'required|in:1,0'
		);
			
		$validation = Validator::make($input, $rules);
			
		if ($validation->fails())
		{		
			$v =  $validation->errors;
			$result_arr = array('success' => false, 'messages' => $v->messages);
			return Response::json($result_arr, 200);
 		}
    	
    	Guest::create($input);
    	$result_arr = array('success' => true);
		return Response::json($result_arr, 200);
    }
}
?>