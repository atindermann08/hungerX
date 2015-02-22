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
		return \Response::json(\Role::with('permissions')->first()->permissions());
		return \View::make('admin.users.roles.index')
						->with('roles', \Role::with('permissions')->get())
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

			$role->permissions()->attach(\Input::get('permission_id'));
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
		return \View::make('admin.users.roles.show')
			->with('role', \Role::with('permissions')->find($id))
			->with('permissions', \Permission::all()->lists('display_name', 'id'));
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
		$role = \Role::find($roleId);

		$rules = [
			'permission_id' => 'unique:permission_role,permission_id,NULL,id,role_id,'.$roleId
		];

		$validator = \Validator::make(\Input::all(), $rules);

		if($validator->passes())
		{
			if($role)
			{
				$role->permissions()->attach(\Input::get('permission_id'));
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
				$role->permissions()->detach($permissionId);
				return \Redirect::back()
				->with('message', 'Permission removed from Role.');
			}
			return \Redirect::back()
			->with('message', 'Role does not exist.');
		}

}
