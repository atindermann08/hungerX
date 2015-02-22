<?php

namespace HungerExpert\Admin\controllers;

class PermissionsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		return \View::make('admin.users.permissions')
						->with('permissions', \Permission::with('roles')->get())
						->with('roles', \Role::all()->lists('name', 'id'));
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
		$validator = \Validator::make(\Input::all(), \Permission::$rules);

		if($validator->passes())
		{
			$permission = new \Permission;
			$permission->name = \Input::get('name');
			$permission->display_name = \Input::get('display_name');
			$permission->save();

			$permission->roles()->attach(\Input::get('role_id'));
			return \Redirect::back()->with('message','Permission added.');
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
		$permission = \Permission::find($id);
		if($permission)
		{
			$permission->delete();
			return \Redirect::back()
						->with('message', 'Permission deleted.');
		}
		return \Redirect::back()
						->with('message', 'Permission does not exist.');
	}


}
