<?php

namespace HungerExpert\Admin\controllers;

class AdminAccountsController extends \BaseController {

  /**
  * Display a listing of the resource.
  *
  * @return Response
  */
  public function index()
  {
    $roles = \Role::all()->lists('name', 'id');
    return \View::make('admin.accounts.index')
      ->with('users', \User::with('addresses')->get())
      ->with('roles', $roles);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return Response
  */
  public function create()
  {
  }



  /**
  * Store a newly created resource in storage.
  *
  * @return Response
  */
  public function store()
  {
      $repo = \App::make('UserRepository');
      $user = $repo->signup(\Input::all());

      if ($user->id) {
        //sowing adding addresses and orders and work on adminorderscontroller
        //index and show page to confirm and check order very important part
        //and then last implement user and notification system with long pooling
        if(\Input::has('confirmed'))
        {
          $user->confirmed = true;
          $user->save();
        }
        $user->roles()->attach(\Input::get('role_id'));

        /* need to decide if mail should be sent on account creation on backend
        if (Config::get('confide::signup_email')) {
          Mail::queueOn(
            Config::get('confide::email_queue'),
            Config::get('confide::email_account_confirmation'),
            compact('user'),
            function ($message) use ($user) {
              $message
              ->to($user->email, $user->username)
              ->subject(Lang::get('confide::confide.email.account_confirmation.subject'));
            }
          );
      }*/

      return \Redirect::back()->with('message','Account added.')
      ->with('notice', \Lang::get('confide::confide.alerts.account_created'));
    } else {
      $error = $user->errors()->all(':message');
      return \Redirect::back()
        ->withInput(\Input::except('password'))
        ->with('error', $error);
    }
  }


  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return Response
  */
  public function show($id)
  {
    $user = \User::with('addresses','orders','defaultAddress')->find($id);
    return \View::make(
    'admin.accounts.show',
    [
    'user' => $user
    ]);
  }


  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return Response
  */
  public function edit($id)
  {
  }


  /**
  * Update the specified resource in storage.
  *
  * @param  int  $id
  * @return Response
  */
  public function update($id)
  {
  }


  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return Response
  */
  public function destroy($id)
  {
    $user = \User::find($id);
    if($user)
    {
      $user->delete();
      return \Redirect::back()
      ->with('message', 'Account deleted.');
    }
    return \Redirect::back()
    ->with('message', 'Account does not exist.');
  }


}
