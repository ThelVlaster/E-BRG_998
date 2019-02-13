<?php

class MainFacilityTypeController extends BaseController {

	public function showRecords()
	{
		$facilityType = DB::table('tblfacilitytype')
			->where('status', '=', 'active')
			->get();

		return View::make('mainFacility.fac_type')
			->with('fType', $facilityType);
	}

	public function getInfo()
	{
		if(Request::ajax())
		{
			$info = DB::table('tblfacilitytype')
				->where('FacilityTypeID', '=', Input::get('id'))
				->get();

			return Response::json(array('info' => $info));
		}
	}

	public function addRecord()
	{
				date_default_timezone_set('Asia/Manila');

		Validator::extend('alpha_spaces', function($attribute, $value)
		{
    		return preg_match('/[\pL\s]/u', $value);
		});
		$post = Input::all();
		$v = Validator::make($post,
				[
					'txtFacility'	=>'required|alpha_spaces',
					'txtFCode'	=>'required|alpha_num',
					'txtResFee'	=>'required|not_in:0',
					'txtNonResFee'	=>'required|not_in:0'
				]);

		$facilityType = DB::table('tblfacilitytype')
				->where('status', '=', 'active')
				->get();

			if($v->fails()){

				return  Response::json( array(	'fType' => $facilityType, 'messages' => $v->errors() ));

			}
			else{
		if(Request::ajax())
		{
			DB::table('tblfacilitytype')
				->insert(array(
						'FacilityName' => Input::get('txtFacility'),
						'FacilityCode' => Input::get('txtFCode'),
						'FRRental' => Input::get('txtResFee'),
						'FNRRental' => Input::get('txtNonResFee')
					));

			$facilityType = DB::table('tblfacilitytype')
				->where('status', '=', 'active')
				->get();

			return Response::json(array('fType' => $facilityType));
		}
	}
}
	public function updateRecord()
	{
		if(Request::ajax())
		{
			DB::table('tblfacilitytype')
				->where('FacilityTypeID', '=', Input::get('etxt1'))
				->update(array(
						'FacilityName' => Input::get('etxt2'),
						'FacilityCode' => Input::get('etxt3'),
						'FRRental' => Input::get('etxt4'),
						'FNRRental' => Input::get('etxt5')
					));

			$facilityType = DB::table('tblfacilitytype')
				->where('status', '=', 'active')
				->get();

			return Response::json(array('fType' => $facilityType));
		}
	}

	public function deleteRecord()
	{
		if(Request::ajax())
		{
			DB::table('tblfacilitytype')
				->where('FacilityTypeID', '=', Input::get('dtxt1'))
				->update(array(
						'status' =>'inactive'
					));

			$facilityType = DB::table('tblfacilitytype')
				->where('status', '=', 'active')
				->get();

			return Response::json(array('fType' => $facilityType));
		}
	}

}
