<?php

class DashboardController extends BaseController {


		public function showRecords()
	{

		$req = DB::table('tbldocumentrequest')
				->join('tbldocumentrequest2', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
				->where('tbldocumentrequest2.DocReqStatus', '=', 'New')
				->select('tbldocumentrequest.RequestID', 'Requestor', 'RFType', 'RFResidentID', 'DateOfRequest')
				->distinct()
				->get();


		$reqdoc = DB::table('tbldocumentrequest')
				->join('tbldocumentrequest2', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
				->join('tbldocumentdetails', 'tbldocumentdetails.DocumentID', '=', 'tbldocumentrequest2.DocumentID')
				->where('tbldocumentrequest2.DocReqStatus', '=', 'New')
				->where('tbldocumentrequest2.DocReqStatus', '!=', 'Unclaimed')
				->get();

		$docCount = DB::table('tbldocumentrequest')
				->join('tbldocumentrequest2', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
				->where('tbldocumentrequest2.DocReqStatus', '=', 'New')
				->select('tbldocumentrequest.RequestID', 'Requestor', 'RFType', 'RFResidentID', 'DateOfRequest')
				->distinct()
				->count();

		$breq = DB::table('tblbusdocheader')
				->join('tblbusinessdetails', 'tblbusinessdetails.BusinessID', '=', 'tblbusdocheader.BusinessID')
				->join('tbldocumentdetails', 'tbldocumentdetails.DocumentID', '=', 'tblbusdocheader.BusDocumentID')
				->where('tblbusdocheader.BusDocStatus', '=', 'New')
				->get();

		$busCount = DB::table('tblbusdocheader')
				->where('tblbusdocheader.BusDocStatus', '=', 'New')
				->count();

		$breq = DB::table('tblbusdocheader')
				->join('tblbusinessdetails', 'tblbusinessdetails.BusinessID', '=', 'tblbusdocheader.BusinessID')
				->join('tbldocumentdetails', 'tbldocumentdetails.DocumentID', '=', 'tblbusdocheader.BusDocumentID')
				->where('tblbusdocheader.BusDocStatus', '=', 'New')
				->get();

		$reserve= DB::table('tbltransreservation')
					->where ('ReserveStatus', '=', 'Approved')
					->get();

		$Rctr = DB::table('tbltransreservation')
					->where ('ReserveStatus', '=', 'Approved')
					->count();

		$log = DB::table('tbllog')
				->orderBy('logID', 'desc')
				->take(5)
				->get();
		// $bday = DB::table('tblresident')
		// 		->whereBetween(('Birthdate'-date('Y-m-d')), [0,18])
		// 		->count();


		return View::make('dashboard.dashboard')
				->with('info', $req)
				->with('docCount', $docCount)
				->with('breq', $breq)
				->with('log', $log)
				->with('res', $reserve)
				->with('resctr', $Rctr)
				->with('busCount', $busCount)
				//->with('bday', $bday)
				->with('docInfo', $reqdoc);
	}


	public function countResInfo(){
		if(Request::ajax()){
			$male = DB::table('tblresident')
				->where('Gender', '=', 'Male')
				->where('status', '=', 'active')
				->count();

			$female = DB::table('tblresident')
				->where('status', '=', 'active')
				->where('Gender', '=', 'Female')
				->count();
			return Response::json(array('male' => $male, 'female' => $female ));
		}
	}

	public function countResStreetInfo(){

		if(Request::ajax()){

		// $street = DB::table('tblstreet')
		// 		->where('status', '=', 'active')

		// 		->get();

		$resident = DB::table('tblstreet')
			->selectRaw('StreetName, count(tblresident.ResidentID) as countRes')
			->leftJoin('tblhouse', 'tblhouse.HouseStreet', '=', 'tblstreet.StreetID')
			->leftJoin('tblfamily', 'tblfamily.HouseID', '=', 'tblhouse.HouseID')
			->leftJoin('tblresident', 'tblfamily.FamilyID', '=', 'tblresident.FamilyID')
			->groupBy('StreetID')
			->get();





			return Response::json(array('res' => $resident ));
		}
	}


}