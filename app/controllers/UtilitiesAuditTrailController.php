<?php

class UtilitiesAuditTrailController extends BaseController {

	public function showRecords()
	{

		$audit = DB::table('tblaudit')
			->join('tblofficialaccount', 'tblofficialaccount.OfficialID', '=', 'tblaudit.OfficialID')
				->join('tblofficialdetails', 'tblofficialdetails.OfficialID', '=', 'tblofficialaccount.OfficialID')
				->join('tblofficialposition', 'tblofficialdetails.OfficialPositionID', '=', 'tblofficialposition.OfficialPositionID')
				->join('tblresident', 'tblofficialdetails.ResidentID', '=', 'tblresident.ResidentID')
				->join('tblfamily', 'tblfamily.FamilyID', '=', 'tblresident.FamilyID')
				->join('tblhouse', 'tblhouse.HouseID', '=', 'tblfamily.HouseID')
			->get();

		// $offName = DB::table('tblaudit')
		// 		->join('tblofficialaccount', 'tblofficialaccount.OfficialID', '=', 'tblaudit.OfficialID')
		// 		->join('tblofficialdetails', 'tblofficialdetails.OfficialID', '=', 'tblofficialaccount.OfficialID')
		// 		->join('tblofficialposition', 'tblofficialdetails.OfficialPositionID', '=', 'tblofficialposition.OfficialPositionID')
		// 		->join('tblresident', 'tblofficialdetails.ResidentID', '=', 'tblresident.ResidentID')
		// 		->join('tblfamily', 'tblfamily.FamilyID', '=', 'tblresident.FamilyID')
		// 		->join('tblhouse', 'tblhouse.HouseID', '=', 'tblfamily.HouseID')
		// 		->where('tblofficialaccount.Username', '=', Session::get('username'))
		// 		->where('tblofficialaccount.Password', '=', Session::get('password'))
		// 		->get();

		// $st = DB::table('tblstreet')			
		//	->join('tblstreet', 'tblstreet.StreetID', '=', 'tblaudit.NewValue')
		// 	->get();

		// $sub = DB::table('tblsubdivision')
		// 	->get();

		// $comp = DB::table('tblcompound')
		// 	->get();

	 //    $pos = DB::table('tblofficialposition')
		// 	->get();

		// $btype = DB::table('tblbusinesstype')
		// 	->get();

		// $faci = DB::table('tblfacilityenergy')//device facility  join tblfaclity
		// 	->get();

		// $itype = DB::table('tblitemdetails')//joim tblitemtype
		// 	->get();

		// $doc = DB::table('tbldocumentdetails')//di sure
		// 	->get();

		return View::make('utilities.auditTrail')
			// ->with('stname', $st)
			// ->with('offname', $offName)
			->with('audit', $audit);
	}


	
}
