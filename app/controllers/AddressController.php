<?php

class AddressController extends \BaseController {

    public function __construct(){
        $this->beforeFilter('csrf', ['on' => 'post']);
    }
    
    public function index()
	{
        $addresses = Address::with('area.city.state.country')->where('user_id', '=', Confide::user()->id)->get();
		//return Response::json($addresses);
        return View::make('customer.address.index', ['addresses' => $addresses]);	
	}
    
    public function add()
	{
        $countries = Country::all()->lists('name', 'id');
        $states = State::all()->lists('name', 'id');
        $userCountry = Country::where('name', '=', 'India')->first()->id;
        $userState = State::where('name', '=', 'Punjab')->first()->id;
        $cities = City::all()->lists('name', 'id');
        
        if(Input::old())
        {   
            $selectedCity = Input::old('city');
            $areas = City::find(Input::old('city'))->areas()->lists('name', 'id');
        }
        else{
            $selectedCity = null;
            $areas = array();
        }
        return View::make('customer.address.add',
                          array(
                              'countries' => $countries,
                              'states' => $states,
                              'userState' => $userState,
                              'userCountry' => $userCountry,
                              'cities' => $cities,
                              'areas' => $areas, 
                              'selectedCity' => $selectedCity));
		
	}
        
    public function doAdd()
	{  
        if($this->isAreaSelected())
        {
            $validator = Validator::make(Input::all(), Address::$rules);
            
            if($validator->passes())
            {
                $address = new Address;
                $address->name = Input::get('name');
                $address->user_id = Confide::user()->id;
                $address->area_id = Input::get('area');
                $address->house_no = Input::get('house_no');
                $address->pin_code = Input::get('pin_code');
                $address->landmark = Input::get('landmark');
                
                $address->save();
                
                return Redirect::route('customer.address.index')->with('success', 'Address saved!');
            }
            else   
            {
                return Redirect::back()->withErrors($validator)->withInput();
            }
        }
        else
        {
            return Redirect::back()->withInput();
        }
	}
	
	public function setDefault($id){
		
		
		Address::where('user_id', '=', Confide::user()->id)->update(array('default' => false));
		Address::whereRaw('user_id = ? and id = ?',  [Confide::user()->id, $id ])->update(array('default' => true));
//			where('user_id', '=', Confide::user()->id)->update(array('default' => true));
		//return Response::json($address);
		return Redirect::back()->with('message', 'Default address updated');	
	}
    
    public function edit($id)
	{
		$address = Address::with('area.city.state.country')->find($id);
        
		$countries = Country::all()->lists('name', 'id');
        $states = State::all()->lists('name', 'id');
        $cities = City::all()->lists('name', 'id');
        $areas = City::find($address->area->city->id)->areas()->lists('name', 'id');
        //return Response::json($area);
		
        return View::make('customer.address.edit',
                          array(
                              'address' => $address,
                              'countries' => $countries,
                              'states' => $states,
                              'cities' => $cities,
                              'areas' => $areas, 
                              ));
		
	}
    
    public function doEdit($id)
	{
       	$validator = Validator::make(Input::all(), Address::$rules);
            
		if($validator->passes())
		{
			$address = Address::find($id);
			$address->name = Input::get('name');
			$address->user_id = Confide::user()->id;
			$address->area_id = Input::get('area');
			$address->house_no = Input::get('house_no');
			$address->pin_code = Input::get('pin_code');
			$address->landmark = Input::get('landmark');

			$address->save();

			return Redirect::route('customer.address.index')->with('success', 'Address saved!');
		}
		
	}
    
    
    
    protected function isAreaSelected(){
        return true;
        
            if(Input::has('area')){
                $selectedCity = Input::get('city');
                $areas = City::find(Input::get('city'))->areas()->lists('name', 'id');
                if(array_key_exists(Input::get('area'), $areas)){
                    return true;
                }
                else{
                    return false;
                }
            }        
            else{
                return false;
            }		
    }
    

}