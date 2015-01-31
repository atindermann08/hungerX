<?php

class CustomerController extends \BaseController {

    public function profile()
	{
        $user = Confide::user();
        return View::make('customer.profile', ['user' => $user]);		
	}

    public function addresses()
	{
        //$user = User::with('addresses')->find($id);
        return View::make('customer.addresses');
		
	}

    public function orders()
	{
        //$user = User::with('orders')->find($id);
        return View::make('customer.orders');
		
	}
    
    public function changePassword()
	{
        return View::make('customer.change_password');
	}
    
    public function doChangePassword($id){
        $rules = array(
            'current_password'          => 'required',
            'password'                  => 'required|confirmed|different:current_password',
            'password_confirmation'     => 'required|different:current_password|same:password'
        );

        $user = User::find(Confide::user()->id);
        $validator = Validator::make(Input::all(), $rules);

        //Is the input valid? password confirmed and meets requirements
        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return Redirect::back()->withInput();
        }

        //Is the old password correct?
        if(!Hash::check(Input::get('current_password'), $user->password)){
            return Redirect::back()->withInput()->withError('Password is not correct.');
        }

        //Set new password to user
        $user->password = Input::get('password');
        $user->password_confirmation = Input::get('password_confirmation');

        $user->touch();
        $save = $user->save();

        return Redirect::to('users/logout')->withMessage('Password has been changed.');

    }
    
    public function doUpdateProfile($id){
        $rules = array(
            'firstname' => 'required|alpha',      
            'lastname' => 'required|alpha',
            'mobile' => 'required|regex:/^(\+91)?[6-9][0-9]{9}$/',
            'email' => 'required|email',
        );

        $user = User::find(Confide::user()->id);
        $validator = Validator::make(Input::all(), $rules);

        //Is the input valid? password confirmed and meets requirements
        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return Redirect::back()->withInput();
        }

        //Set new password to user
        $user->firstname = Input::get('firstname');
        $user->lastname = Input::get('lastname');
        $user->mobile = Input::get('mobile');
        $user->email = Input::get('email');

        $user->touch();
        $save = $user->save();

        return Redirect::back()->withSuccess('Profile updated successfuly.');

    }

}