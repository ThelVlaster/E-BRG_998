<?php

class TransResidentController extends BaseController {

	public function showRecords()
	{
		$fam = DB::table('tblfamily')			
			->join('tblhouse', 'tblfamily.HouseID', '=', 'tblhouse.HouseID')
			->join('tblresident', 'tblresident.FamilyID', '=', 'tblfamily.FamilyID')
			->join('tblstreet', 'tblstreet.StreetID', '=', 'tblhouse.HouseStreet')		
			->leftJoin('tblcompound', 'tblcompound.compID', '=', 'tblhouse.HouseComp')		
			->leftJoin('tblsubdivision', 'tblsubdivision.subdivisionID', '=', 'tblhouse.HouseSub')		
			->where('tblresident.RelationHead', '=', 'Head')
			->where('tblresident.status', '=', 'active')
			->where('tblfamily.fam_status', '=', 'active')
			->get();

	
		return View::make('transResident.manage_res')
			->with('fam', $fam);
	}


		public function showProfile()
	{
		$fam = DB::table('tblfamily')			
			->join('tblresident', 'tblresident.FamilyID', '=', 'tblfamily.FamilyID')
			->join('tblhouse', 'tblfamily.HouseID', '=', 'tblhouse.HouseID')
			->join('tblstreet', 'tblstreet.StreetID', '=', 'tblhouse.HouseStreet')		
			->leftJoin('tblcompound', 'tblcompound.compID', '=', 'tblhouse.HouseComp')		
			->leftJoin('tblsubdivision', 'tblsubdivision.subdivisionID', '=', 'tblhouse.HouseSub')
			->where('tblresident.FamilyID', '=', Input::get('familyid'))
			->where('tblfamily.HouseID', '=', Input::get('houseid'))
			->where('tblresident.status', '=', 'active')
			->where('tblfamily.fam_status', '=', 'active')
			->get();

		$house = DB::table('tblhouse')
			->join('tblstreet', 'tblstreet.StreetID', '=', 'tblhouse.HouseStreet')		
			->leftJoin('tblcompound', 'tblcompound.compID', '=', 'tblhouse.HouseComp')		
			->leftJoin('tblsubdivision', 'tblsubdivision.subdivisionID', '=', 'tblhouse.HouseSub')
			->where('HouseID', '!=', Input::get('houseid'))
			->get();

	
		return View::make('transResident.fam_profile')
			->with('fam', $fam)
			->with('house', $house);
	}

	public function addMember()
	{
		date_default_timezone_set('Asia/Manila');

		if(Request::ajax()){
			DB::table('tblresident')
				->insert(array(
					array(
						'FamilyID' => Input::get('txt1'),
						'FirstName' => Input::get('txt2'),
						'LastName' => Input::get('txt3'),
						'MidName' => Input::get('txt4'),
						'RelationHead' => Input::get('txt5'),
						'ResidencyStat' => Input::get('txt6'),
						'Birthdate' => Input::get('txt7'),
						'Birthplace' => Input::get('txt8'),
						'Gender' => Input::get('txt9'),
						'CivilStat' => Input::get('txt10'),
						'Religion' => Input::get('txt11'),
						'MobileNo' => Input::get('txt12'),
						'TelNo' => Input::get('txt13'),
						'EmailAdd' => Input::get('txt14'),
						'Height' => Input::get('txt15'),
						'Weight' => Input::get('txt16'),
						'HealthStat' => Input::get('txt17'),
						'CurrStudy' => Input::get('txt18'),
						'HighLevel' => Input::get('txt19'),
						'CurrLevel' => Input::get('txt20'),
						'ReadLiteracy' => Input::get('txt21'),
						'WriteLiteracy' => Input::get('txt22'),
						'CurrEmployed' => Input::get('txt23'),
						'Occupation' => Input::get('txt24'),
						'Salary' => Input::get('txt25'),
						'status' => 'active'
						)
					));
					

			$loginInfo = DB::table('tblofficialaccount')
				->join('tblofficialdetails', 'tblofficialdetails.OfficialID', '=', 'tblofficialaccount.OfficialID')
				->join('tblofficialposition', 'tblofficialdetails.OfficialPositionID', '=', 'tblofficialposition.OfficialPositionID')
				->join('tblresident', 'tblofficialdetails.ResidentID', '=', 'tblresident.ResidentID')
				->join('tblfamily', 'tblfamily.FamilyID', '=', 'tblresident.FamilyID')
				->join('tblhouse', 'tblhouse.HouseID', '=', 'tblfamily.HouseID')
				->where('tblofficialaccount.Username', '=', Session::get('username'))
				->where('tblofficialaccount.Password', '=', Session::get('password'))
				->where('tblofficialaccount.OfficialID', '=', Session::get('ID'))
				->get();

			Session::put('username', $loginInfo[0]->Username);
			Session::put('password', $loginInfo[0]->Password);
			Session::put('ID', $loginInfo[0]->OfficialID);



				DB::table('tblaudit')
				    ->insert(array(
						'OfficialID' => Session::get('ID'),
						'Action' => 'Inserted',
						'Type' => 'Add New Member',
						'NewValue' => Session::get('txt1')." ".Input::get('txt2')." ".Input::get('txt3'),
						'Date' => date('Y/m/d H:m:s')
					));	


			$fam = DB::table('tblresident')			
			->join('tblfamily', 'tblresident.FamilyID', '=', 'tblfamily.FamilyID')
			->join('tblhouse', 'tblfamily.HouseID', '=', 'tblhouse.HouseID')
			->where('tblresident.FamilyID', '=', Input::get('familyid'))
			->where('tblfamily.HouseID', '=', Input::get('houseid'))
			->where('tblresident.status', '=', 'active')
			->get();



	
		return Response::json(array('fam' => $fam));
		}
	}

	public function updateHouse()
	{
		if(Request::ajax()){
			DB::table('tblfamily')
				->where('FamilyID', '=', Input::get('txtfamID'))
				->update(array(
					'HouseID' => Input::get('txt1')
					));
					

			$household = DB::table('tblfamily')
				->where('FamilyID', '=', Input::get('txtfamID'))
				->get();

			return Response::json(array('ehouse' => $household));
		}

	}


	public function deactFam()
	{
		if(Request::ajax()){
			DB::table('tblfamily')
				->where('FamilyID', '=', Input::get('txtfamID'))
				->update(array(
					'fam_status' => 'inactive'
					));

			DB::table('tblresident')
				->where('FamilyID', '=', Input::get('txtfamID'))
				->update(array(
					'status' => 'inactive'
					));
					
		$fac = DB::table('tblfamily')
				->join('tblresident', 'tblfamily.FamilyID', '=', 'tblresident.FamilyID')
				->where('FamilyID', '=', Input::get('txtfamID'))
				->get();
   			
   			Session::put('reslname', $fac[0]->LastName);
   			Session::put('resfname', $fac[0]->FirstName);
   			Session::put('famID', $fac[0]->FamilyID);



   				DB::table('tblaudit')
				    ->insert(array(
						'OfficialID' => Session::get('ID'),
						'Action' => 'Deactivate Family',
						'Type' => 'Manage Family',
						'OldValue' => 'FamilyNo.'." ".Session::get('famID')." ".Session::get('reslname'),
						'Date' => date('Y/m/d H:m:s')
					));

			$household = DB::table('tblfamily')
				->where('FamilyID', '=', Input::get('txtfamID'))
				->get();

			return Response::json(array('ehouse' => $household));
		}

	}

	public function getRes()
	{
		$res = DB::table('tblresident')
			->where('ResidentID', '=', Input::get('resID'))
			->get();

		$members = DB::table('tblresident')
			->where('FamilyID', '=', $res[0]->FamilyID)
			->get();

		return Response::json(array('res' => $res, 'members' => $members));
	}

	public function changeRelation()
	{
		if(Request::ajax())
		{
			$rID = DB::table('tblresident')
				->where('FamilyID', '=', Input::get('famID'))
				->get();

			DB::table('tblresident')
				->where('FamilyID', '=', Input::get('famID'))
				->where('RelationHead', '=', "Head")
				->update(array(
						'status' => Input::get('reason')
					));

			return Response::json(array('rID' => $rID));
		}
	}

	public function changeRelation2()
	{
		if(Request::ajax())
		{
			DB::table('tblresident')
				->where('ResidentID', '=', Input::get('resID'))
				->update(array(
						'RelationHead' => Input::get('relation')
					));
			$fam = DB::table('tblresident')
				->where('ResidentID', '=', Input::get('resID'))
			->get();


			$fac = DB::table('tblresident')
				->where('ResidentID', '=', Input::get('resID'))
				->get();
   			
   			Session::put('resID', $fac[0]->ResidentID);
   			Session::put('reslname', $fac[0]->LastName);
   			Session::put('resfname', $fac[0]->FirstName);



   				DB::table('tblaudit')
				    ->insert(array(
						'OfficialID' => Session::get('ID'),
						'Action' => 'Deleted',
						'Type' => 'Manage Resident',
						'OldValue' => 'ResNo.'." ".Session::get('resID')." ".Session::get('reslname')." ".Session::get('resfname'),
						'Date' => date('Y/m/d H:m:s')
					));


			return Response::json(array('fam' => $fam));
		}
	}

	public function gethousefamily()
	{
		if(Request::ajax())
		{
			$house = DB::table('tblhouse')
				->get();

			$family = DB::table('tblfamily')
				->join('tblresident', 'tblresident.FamilyID', '=', 'tblfamily.FamilyID')
				->where('tblresident.RelationHead', '=', 'Head')
				->get();

			return Response::json(array('house'=>$house, 'family' => $family));
		}
	}

	public function getfamilyperhouse()
	{
		if(Request::ajax())
		{
			$fam = DB::table('tblfamily')
				->join('tblresident', 'tblresident.FamilyID', '=', 'tblfamily.FamilyID')
				->where('RelationHead', '=', 'Head')
				->where('HouseID', '=', Input::get('houseid'))
				->where('fam_status', '=', 'active')
				->get();

			$house = DB::table('tblhouse')
				->where('HouseID', '=', Input::get('houseid'))
				->get();




			return Response::json(array('fam' => $fam, 'house' => $house));
		}
	}

	public function getfamilyinfo()
	{
		if(Request::ajax())
		{
			$famInfo = DB::table('tblfamily')
				->join('tblresident', 'tblresident.FamilyID', '=', 'tblfamily.FamilyID')
				->where('RelationHead', '=', 'Head')
				->where('tblresident.FamilyID', '=', Input::get('famid'))
				->get();

			return Response::json(array('famInfo' => $famInfo));
		}
	}

	public function transferResident()
	{
		if(Request::ajax())
		{
			DB::table('tblresident')
				->join('tblfamily', 'tblfamily.FamilyID', '=', 'tblresident.FamilyID')
				->join('tblhouse', 'tblhouse.HouseID', '=', 'tblfamily.HouseID')
				->where('tblresident.FamilyID', '=', Input::get('oldfamid'))
				->where('tblfamily.HouseID', '=', Input::get('oldhouseid'))
				->where('tblresident.ResidentID', '=', Input::get('resid'))
				->update(array(
						'tblresident.FamilyID' => Input::get('newfamid'),
						'tblfamily.HouseID' => Input::get('newhouseid'),
						'RelationHead' => Input::get('relation')
					));


	   $fac = DB::table('tblresident')
				->where('ResidentID', '=', Input::get('resid'))
				->get();
   			
   			Session::put('reslname', $fac[0]->LastName);
   			Session::put('resfname', $fac[0]->FirstName);
   			Session::put('famID', $fac[0]->FamilyID);



   				DB::table('tblaudit')
				    ->insert(array(
						'OfficialID' => Session::get('ID'),
						'Action' => 'Insert',
						'Type' => 'Transfer Resident',
						'OldValue' => 'FamilyNo.'." ".Session::get('famID')." ".Session::get('reslname')." ".Session::get('resfname'),
						'Date' => date('Y/m/d H:m:s')
					));


			$famInfo = DB::table('tblfamily')
				->join('tblresident', 'tblresident.FamilyID', '=', 'tblfamily.FamilyID')
				->where('RelationHead', '=', 'Head')
				->where('tblresident.FamilyID', '=', Input::get('famid'))
				->get();

			return Response::json(array('famInfo' => $famInfo));
		}
	}

	public function transferNewResident()
	{
		if(Request::ajax())
		{
			$familyCount = DB::table('tblfamily')
				->orderBy('FamilyID', 'desc')
				->count();

			if($familyCount == 0) {

				$f = 1;

			}
			else {

				$family = DB::table('tblfamily')
					->orderBy('FamilyID', 'desc')
					->take(1)
					->get();

					$f = $family[0]->FamilyID + 1;
			}

			DB::table('tblfamily')
				->insert(array(
					array(
						'HouseID' => Input::get('newhouseid'),
						'FamilyID' => $f
						)
					));



			DB::table('tblresident')
				->join('tblfamily', 'tblfamily.FamilyID', '=', 'tblresident.FamilyID')
				->join('tblhouse', 'tblhouse.HouseID', '=', 'tblfamily.HouseID')
				->where('tblresident.FamilyID', '=', Input::get('oldfamid'))
				->where('tblfamily.HouseID', '=', Input::get('oldhouseid'))
				->where('tblresident.ResidentID', '=', Input::get('resid'))
				->update(array(
						'tblresident.FamilyID' => $f,
						'RelationHead' => 'Head'
					));


	   $fac = DB::table('tblresident')
				->where('ResidentID', '=', Input::get('resid'))
				->get();
   			
   			Session::put('reslname', $fac[0]->LastName);
   			Session::put('resfname', $fac[0]->FirstName);
   			Session::put('famID', $fac[0]->FamilyID);



   				DB::table('tblaudit')
				    ->insert(array(
						'OfficialID' => Session::get('ID'),
						'Action' => 'Insert',
						'Type' => 'Transfer New Resident',
						'OldValue' => 'FamilyNo.'." ".Session::get('famID')." ".Session::get('reslname')." ".Session::get('resfname'),
						'Date' => date('Y/m/d H:m:s')
					));



			$famInfo = DB::table('tblfamily')
				->join('tblresident', 'tblresident.FamilyID', '=', 'tblfamily.FamilyID')
				->where('RelationHead', '=', 'Head')
				->where('tblresident.FamilyID', '=', Input::get('famid'))
				->get();

			return Response::json(array('famInfo' => $famInfo));
		}
	}
}

