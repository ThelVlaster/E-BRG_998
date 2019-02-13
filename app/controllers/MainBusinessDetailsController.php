<?php

class MainBusinessDetailsController extends BaseController {

	public function showRecords()
	{
		$businessDetails = DB::table('tblbusinessdetails')
			->join('tblbusinesstype', 'tblbusinessdetails.BusinessTypeID', '=', 'tblbusinesstype.BusinessTypeID')
			->get();

		$businessType = DB::table('tblbusinesstype')
			->get();

		$type = DB::table('tblbusinesstype')
					->where('status', '=', "active")
					->get();

		return View::make('mainBusiness.bus_detail')
			->with('bDetails', $businessDetails)
			->with('type', $type)
			->with('bType', $businessType);
	}

	public function getBusinessInfo(){
		if(Request::ajax()){
			$bus = DB::table('tblbusinessdetails')
				->join('tblbusinesstype', 'tblbusinessdetails.BusinessTypeID', '=', 'tblbusinesstype.BusinessTypeID')
				->where('BusinessID', '=', Input::get('id'))
				->get();
			return Response::json(array('bus' => $bus));
		}
	}



	public function updateRecord(){
		if(Request::ajax()){
			DB::table('tblbusinessdetails')
				->where('BusinessID', '=', Input::get('str1'))
				->update(array(
						'BusinessName' => Input::get('str4'),
						'BusinessTypeID' => Input::get('str5'),
						'BusinessOwnerName' => Input::get('str2'),
						'BusinessAddress' => Input::get('str3'),
						'BusEmail' => Input::get('str6'),
						'BusIncome' => Input::get('str8'),
						'BusContactNo' => Input::get('str7')
					));

			$businessType = DB::table('tblbusinessdetails')
				->join('tblbusinesstype', 'tblbusinessdetails.BusinessTypeID', '=', 'tblbusinesstype.BusinessTypeID')
				->where('tblbusinessdetails.status', '=', 'active')
				->get();

			return Response::json(array('btype' => $businessType));
		}
	}

}
