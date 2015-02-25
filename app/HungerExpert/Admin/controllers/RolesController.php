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
		//why permissions are no showing find out and add option to create users and assign roles
		return \View::make('admin.users.roles.index')
						->with('roles', \Role::with('perms')->get())
						->with('permissions', \Permission::all()->lists('display_name', 'id'));
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

			$role->perms()->attach(\Input::get('permission_id'));
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
		$roles = \Role::with('perms')->find($id);
		//$perms = $roles->perms;
		//return \Response::json($perms);
		$permissions = \Permission::whereNotIn('id', $roles->perms()->lists('permission_id'))->get()->lists('display_name', 'id');

		return \View::make('admin.users.roles.show')
			->with('role', $roles)
			->with('permissions', $permissions);
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



	/**
	* Show the form for adds food into menu.
	*
	* @return Response
	*/
	public function storePermission($roleId)
	{
		$rules = [
			'permission_id' => 'unique:permission_role,permission_id,NULL,id,role_id,'.$roleId
		];

		$validator = \Validator::make(\Input::all(), $rules);

		if($validator->passes())
		{
			$role = \Role::find($roleId);
			if($role)
			{
				$role->perms()->attach(\Input::get('permission_id'));
					return \Redirect::back()
					->with('message', 'Permission added to Role.');
			}
				return \Redirect::back()
				->with('message', 'Role does not exist.');
		}

		return \Redirect::back()
			->with('message','There were some errors. Please try again later..')
			->withInput()
			->withErrors($validator);
	}


	/**
	* Show the form for removes food from menu.
	*
	* @return Response
	*/
	public function destroyPermission($roleId, $permissionId)
	{
		$role = \Role::find($roleId);
		if($role)
		{
			$role->perms()->detach($permissionId);
			return \Redirect::back()
			->with('message', 'Permission removed from Role.');
		}
		return \Redirect::back()
		->with('message', 'Role does not exist.');
	}

}
