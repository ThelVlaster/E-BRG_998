<?php

class QueriesController extends BaseController {

	public function showRecords() 
	{
		$itemName = DB::table('tblitemtype')
			->where('status', '=', 'active')
			->OrderBy('ItemName')
			->get();


		$faciName = DB::table('tblfacility')
			->get();

		$busName = DB::table('tblbusinesstype')
			->where('status', '=', 'active')
			->get();

		$offName = DB::table('tblofficialposition')
			->get();

		$house = DB::table('tblhouse')
			->get();

		$houseT = DB::table('tblhouse')
			->select('HouseType')
			->distinct()
			->get();

		$document = DB::table('tbldocumentdetails')
			->get();

		$street = DB::table('tblstreet')
			->select('HouseStreet', 'StreetID', 'StreetName')
			->join('tblhouse', 'tblhouse.HouseStreet', '=', 'tblstreet.StreetID')
			->distinct()
			->get();

		return View::make('queries.queries_main')
			->with('oName', $offName)
			->with('bName', $busName)
			->with('fName', $faciName)
			->with('iName', $itemName)
			->with('HouseT', $houseT)
			->with('DName', $document)
			->with('street', $street)
			->with('hName', $house);
	}

	public function getFaciName()
	{

		if(Request::ajax())
		{
			$fNames = DB::table('tblfacilitytype') 
				->where('FacilityTypeID', '=', Input::get('FaciID'))
				->get();

			return Response::json(array('fN' => $fNames));
		}
	}

	public function ItemQuery()
	{

		if(Request::ajax())
		{
			$item= DB::table('tblitemdetails')
				->join('tblitemtype', 'tblitemdetails.ItemTypeID', '=', 'tblitemtype.ItemTypeID')
				->whereIn('tblitemdetails.ItemTypeID', Input::get('ItemTypeID'))
				->whereIn('tblitemdetails.ItemStatus', Input::get('ItemStatus'))
				->OrderBy(Input::get('SortBy'), Input::get('OrderBy'))
				->get();

			return Response::json(array('ItemNames' =>$item));
		}

	}

	public function FacQuery()
	{

		if(Request::ajax())
		{
			$facility= DB::table('tblfacility')
				->select('FacilityID', 'status', 'FacilityName', 'Description' , 'FCondition')
				->whereIn('FacilityID', Input::get('FacID'))
				->whereIn('FCondition', Input::get('FacStatus'))
				->OrderBy(Input::get('FacSortBy'), Input::get('FacorderBy'))
				->get();

			return Response::json(array('fac' =>$facility));
		}

	}

	
	public function BusQuery()
	{

		if(Request::ajax())
		{
			$business= DB::table('tblbusinesstype')
				->whereIn('BusinessTypeID', Input::get('BusID'))
				->OrderBy(Input::get('BusSortBy'), Input::get('BusorderBy'))
				->get();
			return Response::json(array('bus'=> $business));
		}

	}

	public function ResQuery()
	{

		if(Request::ajax())
		{ 
			if (Input::get('CurStudArr')=="Yes")
			{
				$education = DB::table('tblresident')
					->select('ResidentID', 'CurrLevel', 'CurrStudy', 'HighLevel','ReadLiteracy','WriteLiteracy')
					->where('CurrStudy', '=', Input::get('CurStudArr'))
					->whereIn('ReadLiteracy', Input::get('ReadArr'))
					->whereIn('WriteLiteracy', Input::get('WriteArr'))
					->whereIn('CurrLevel', Input::get('CurEduArr'))
					->OrderBy(Input::get('ResSortBy'), Input::get('ResOrderBy'))
					->get();
			}

			else
			{			
				$education = DB::table('tblresident')
					->select('ResidentID', 'CurrLevel', 'CurrStudy', 'HighLevel','ReadLiteracy','WriteLiteracy')
					->where('CurrStudy', '=', Input::get('CurStudArr'))
					->whereIn('HighLevel', Input::get('HighArr'))
					->whereIn('ReadLiteracy', Input::get('ReadArr'))
					->whereIn('WriteLiteracy', Input::get('WriteArr'))
					->OrderBy(Input::get('ResSortBy'), Input::get('ResOrderBy'))
					->get();
			}

			
			if (Input::get('age')=='2')
			{
				$resident= DB::table('tblresident')
					->where('status', '=', Input::get('ResStatus'))
					->whereIn('Gender', Input::get('GenderArr'))
					->whereIn('ResidencyStat', Input::get('StatusArr'))
					->whereIn('CivilStat', Input::get('CivilArr'))
					->whereIn('HealthStat', Input::get('HealthArr'))
					->whereBetween('Birthdate', Input::get('bdayArr'))
					->OrderBy(Input::get('ResSortBy'), Input::get('ResOrderBy'))
					->get();
			}

			else if (Input::get('age')=='1')
			{
				$resident= DB::table('tblresident')
					->where('status', '=', Input::get('ResStatus'))
					->whereIn('Gender', Input::get('GenderArr'))
					->whereIn('ResidencyStat', Input::get('StatusArr'))
					->whereIn('CivilStat', Input::get('CivilArr'))
					->whereIn('HealthStat', Input::get('HealthArr'))
					->OrderBy(Input::get('ResSortBy'), Input::get('ResOrderBy'))
					->get();
			}

			if (Input::get('height')=='1')
			{
				$height= DB::table('tblresident')
					->select('Height', 'ResidentID')
					->OrderBy(Input::get('ResSortBy'), Input::get('ResOrderBy'))
					->get();
			}


			else if (Input::get('height')=='2')
			{
				$height= DB::table('tblresident')
					->select('Height', 'ResidentID')
					->whereBetween('Height', Input::get('HArr'))
					->OrderBy(Input::get('ResSortBy'), Input::get('ResOrderBy'))
					->get();
			}

			if (Input::get('weight')=='1')
			{
				$weight= DB::table('tblresident')
					->select('Weight', 'ResidentID', 'HealthStat')
					->OrderBy(Input::get('ResSortBy'), Input::get('ResOrderBy'))
					->get();
			}

			else if (Input::get('weight')=='2')
			{
				$weight= DB::table('tblresident')
					->select('Weight', 'ResidentID')
					->whereBetween('Weight', Input::get('WArr'))
					->OrderBy(Input::get('ResSortBy'), Input::get('ResOrderBy'))
					->get();
			}
			
			if (Input::get('EmpArr')=='Yes')
			{
				if (Input::get('wage')=='1')
				{
					$salary= DB::table('tblresident')
						->select('ResidentID', 'CurrEmployed', 'Occupation', 'Salary')
						->where('CurrEmployed', '=', Input::get('EmpArr'))
						->OrderBy(Input::get('ResSortBy'), Input::get('ResOrderBy'))
						->get();
				}

				else if (Input::get('wage')=='2')
				{
					$salary= DB::table('tblresident')
						->select('ResidentID', 'CurrEmployed', 'Occupation', 'Salary')
						->where('CurrEmployed', '=', Input::get('EmpArr'))
						->whereBetween('Salary', Input::get('SalaryArr'))
						->OrderBy(Input::get('ResSortBy'), Input::get('ResOrderBy'))
						->get();
				}
			}
			else
			{
				$salary= DB::table('tblresident')
						->select('ResidentID', 'CurrEmployed', 'Occupation', 'Salary')
						->where('CurrEmployed', '=', Input::get('EmpArr'))
						->OrderBy(Input::get('ResSortBy'), Input::get('ResOrderBy'))
						->get();
			}

			return Response::json(array('res'=> $resident, 'h'=> $height, 'w'=> $weight, 'edu' => $education, 'wage' => $salary));
		}

	}

	
	public function HouseQuery()
	{

		if(Request::ajax())
		{
			$household= DB::table('tblhouse')
				->whereIn('HouseStreet', Input::get('street'))
				->whereIn('HouseType', Input::get('type'))
				->whereIn('status', Input::get('status'))
				->OrderBy(Input::get('Hsort'), Input::get('Horder'))
				->get();
			return Response::json(array('house'=> $household));
		}

	}


	public function OfficialQuery()
	{

		if(Request::ajax())
		{
			$official= DB::table('tblofficialposition')
				->whereIn('OfficialPosition', Input::get('offPos'))
				->whereIn('status', Input::get('offStatus'))
				->OrderBy(Input::get('offSort'), Input::get('OffOrder'))
				->get();
			return Response::json(array('off'=> $official));
		}

	}

	public function DocumentQuery()
	{

		if(Request::ajax())
		{
			$document= DB::table('tbldocumentdetails')
				->whereIn('DocumentID', Input::get('DocID'))
				->whereIn('DocStatus', Input::get('DocStat'))
				->OrderBy(Input::get('Docsortby'), Input::get('docorder'))
				->get();
			return Response::json(array('documents'=> $document));
		}

	}
}