<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Leave extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'leaves';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');


   /*
	 1) Working : applyLeave() use to add all leave request.
	 2) Author  : Sujeet Kumar
	 3) Date    : 27/05/2015
   */
	public static function applyLeave($data)
	{    try {
		$data->save();
	         } 
	       catch (Exception $e) {
		       print_r($e);
	         }
		
    }



/*
	 1) Working : getAllLeave() use to retirve all leave request.
	 2) Author  : Sujeet Kumar
	 3) Date    : 27/05/2015
   */	


	public static function getAllLeave($id=null)
	{  try{
		   if($id!=null)
		  {  $data=DB::table('leaves')
		              ->select('*')
		              ->where('user_id', '=',$id)
		              ->get();
		           return $data;}
		           else
		           {
		           	$data=DB::table('leaves')
		              ->select('*')
		              ->where('status', '=','pending')
		              ->get();
		           return $data;
		           }
   		}catch(Exception $e)
		   {

		   }
      
	}
/*
	 1) Working : getAllLeave() use to retirve all leave request.
	 2) Author  : Sujeet Kumar
	 3) Date    : 27/05/2015
   */	

	public static function acceptLeave($id=null)
		{  try {
			   $leave=Leave::find($id);
	           $leave->status='accepted';
	           $leave->save();
	           return 'true';
		     } 
		catch (Exception $e) {
			   return 'false';
		      }
		}
/*
	 1) Working : getAllLeave() use to retirve all leave request.
	 2) Author  : Sujeet Kumar
	 3) Date    : 27/05/2015
   */	
public static function rejectLeave($id=null)
		{  try {
			   $leave=Leave::find($id);
	           $leave->status='rejected';
	           $leave->save();
	           return 'true';
		     } 
		catch (Exception $e) {
			   return 'false';
		      }
		}





}
