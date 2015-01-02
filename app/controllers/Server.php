<?php

class Server extends \BaseController {

	/**
	 * Deploy website from github.
	 *
	 * @return Response
	 */
	public function deploy()
	{
		echo exec('cd ~/hungerx');
		echo exec('git pull origin master');
		echo exec('php artisan migrate');
		echo exec('composer update');
		echo exec('cd ~/public_html');
		echo exec('git pull origin master');
		echo exec('composer update');
		/*SSH::into('production')->run(array(
			'cd ~/hungerx',
			'git pull origin master',
			'composer update',
			'cd ~/public_html',
			'git pull origin master',
			'composer update'
		), function($line){
			echo $line.PHP_EOL;
		});*/
		 
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
		//
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
		//
	}


}
