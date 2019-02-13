 <?php

class TransReservedFacController extends BaseController {

	public function showRecords()
	{	
	$facReserved = DB::table('tblfacrequestdetails')
			->where('facReqStatus', '=', 'active')
			->get();
		
	$viewRes =  DB::table('tblresident') 
			->get();

	$viewNon =  DB::table('tblnonresident')
			->get();

	$resFaci = DB::table('tblfacilitytype')
			->get();

		
		return View::make('transFacility.facilityReserve')
				->with('hres', $facReserved)  
				->with('vres', $viewRes)
				->with('vnon', $viewNon)
				->with('resFaci', $resFaci);
	}


	public function getFaciInfo()
	{
		if(Request::ajax())
		{
			$resInfo = DB::table('tblfacrequestdetails')
				->where('facReqDetailsID', '=', Input::get('id'))	
				->get();

			return Response::json(array('rFInfo' => $resInfo));
		}
	}


	public function getUnpaidInfo()
	{
		if(Request::ajax())
		{
			$resInfo = DB::table('tblfacrequestdetails')
				
				->join('tblresident', 'tblfacrequestdetails.RequestorID', '=', 'tblresident.ResidentID')
				->join('tblnonresident', 'tblfacrequestdetails.RequestorID', '=', 'tblnonresident.NonResidentID')
				// ->where('tblfacilitydetails.FacilityID', '=', Input::get('x'))
				// ->where('tblfacilitytype.FacilityTypeID', '=', Input::get('y'))
				->where('tblfacrequestdetails.facReqDetailsID', '=', Input::get('id'))	
				->get();

			return Response::json(array('rFunpaid' => $resInfo));
		}
	}

	public function deleteRecord()
	{

		if(Request::ajax()){
			DB::table('tblfacrequestdetails')
				->where('facReqDetailsID', '=', Input::get('txt1'))
				->update(array(
					'facReqStatus' => 'cancel'
					));
				
		}
	}

}
	
