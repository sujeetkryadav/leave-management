<?php

class LeaveController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default User Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	/*
	 1) Working : applyLeave() use to save user into database.
	 2) Author  : Sujeet Kumar
	 3) Date    : 27/05/2015
   */	

	public function applyLeave()
	{

		try{
		$data=Input::all();
		//print_r($data);
		$leave = new Leave;
	    $rules = array(
                'name' => 'Required|max:15',
                'phone' => 'Required|max:15',
                'startDate' => 'Required',
                'endDate' => 'Required',
                'notes'=>'Required'
                
            ); // creating rule for  validation

            $validator = Validator::make($data, $rules); 

			       if ($validator->passes()) {
                    
				    $leave->name =$data['name'];
					$leave->user_id =Auth::id();
					$leave->contact =$data['phone'];
					$leave->from =$data['startDate'];
					$leave->to =$data['endDate'];
					$leave->status ="pending";
					$leave->comments =$data['notes'];

		            $leave->applyLeave($leave);

			       	return Redirect::to('/user-leave')->with('message','User successfully added--!');
			                        }
			     else
			          {
			        return Redirect::to('user-leave')->withErrors($validator, 'msg');
			          }
	                
	          }
	         catch(Exception $e)
	         {
	         	 return Redirect::to('user-leave')->withErrors($validator, 'msg');
	          }

}

/*
	 1) Working : getAllLeave() use to retirve all leave request.
	 2) Author  : Sujeet Kumar
	 3) Date    : 27/05/2015
   */	


public function getAllLeave($id=null)
{
   $detail=Leave::getAllLeave($id);
   return $detail;
}


/*
	 1) Working : getAllLeave() use to retirve all leave request.
	 2) Author  : Sujeet Kumar
	 3) Date    : 27/05/2015
   */	


public function acceptLeave($id=null)
{
   echo $reguestId=Input::get('id');
   $status=Leave::acceptLeave($reguestId);
   if($status=='true')
   {
     return Redirect::to('admin');
   }else
   {
     return Redirect::to('admin')->withErrors($validator, 'msg');
   }
}


/*
	 1) Working : getAllLeave() use to retirve all leave request.
	 2) Author  : Sujeet Kumar
	 3) Date    : 27/05/2015
   */	


public function rejectLeave($id=null)
{
   echo $reguestId=Input::get('id');
   $status=Leave::rejectLeave($reguestId);
   if($status=='true')
   {
     return Redirect::to('admin');
   }else
   {
     return Redirect::to('admin')->withErrors($validator, 'msg');
   }
}


}
