<?php

namespace HungerExpert\Admin\controllers;

class RolesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return \View::make('admin.users.roles')
						->with('roles', \Role::all());
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = \Validator::make(\Input::all(), \Role::$rules);

		if($validator->passes())
		{
			$role = new \Role;
			$role->name = \Input::get('name');
			$role->save();
			return \Redirect::back()->with('message','Role added.');
		}

		return \Redirect::back()
					->with('message','There were some errors. Please try again later..')
					->withInput()
					->withErrors($validator);

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$role = \Role::find($id);
		if($role)
		{
			$role->delete();
			return \Redirect::back()
						->with('message', 'Role deleted.');
		}
		return \Redirect::back()
						->with('message', 'Role does not exist.');
	}


}
