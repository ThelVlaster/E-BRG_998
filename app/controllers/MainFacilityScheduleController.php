<?php

class MainFacilityScheduleController extends BaseController {

	public function showRecords()
	{
		$fIDs = DB::table('tblfacilitydetails')
			->join('tblfacilitytype', 'tblfacilitytype.FacilityTypeID', '=', 'tblfacilitydetails.FacilityTypeID')
			->get();

		$fSched =  DB::table('tblfacilitysched')
			->join('tblday', 'tblday.DayID', '=', 'tblfacilitysched.FacilityDayID')
			->where((function($query){
					$query	->where('FacilityStart', '!=', 'null')
							->orWhere('FacilityEnd', '!=', 'null');
					}))
			->get();



		return View::make('mainFacility.fac_schedule')
			->with('fIDs', $fIDs)
			->with('fSched', $fSched);
	}


	public function getInfo()
	{
		if(Request::ajax())
		{
			$fIDs = DB::table('tblfacilitydetails')
				->join('tblfacilitytype', 'tblfacilitytype.FacilityTypeID', '=', 'tblfacilitydetails.FacilityTypeID')
				->where('tblfacilitydetails.FacilityID', '=', Input::get('fID'))
				->where('tblfacilitydetails.FacilityTypeID', '=', Input::get('fTypeID'))

				->get();

			$fSched =  DB::table('tblfacilitysched')
				->join('tblday', 'tblday.DayID', '=', 'tblfacilitysched.FacilityDayID')
				->where('tblfacilitysched.FacilityID', '=', Input::get('fID'))
				->where('tblfacilitysched.FacilityTypeID', '=', Input::get('fTypeID'))
				->get();

			return Response::json(array('fIDs' => $fIDs, 'fSched' => $fSched));
		}
	}

	public function updateSched()
	{
		if(Request::ajax())
		{
			if(Input::get('ts1') != '' && Input::get('te1'))
			{
				DB::table('tblfacilitysched')
					->where('FacilityID', '=', Input::get('hiddenFID'))
					->where('FacilityTypeID', '=', Input::get('hiddenFTypeID'))
					->where('FacilityDayID', '=', Input::get('id1'))
					->update(array(
							'FacilityStart' => Input::get('ts1'),
							'FacilityEnd' => Input::get('te1')
						));
			}
			else
			{
				DB::table('tblfacilitysched')
					->where('FacilityID', '=', Input::get('hiddenFID'))
					->where('FacilityTypeID', '=', Input::get('hiddenFTypeID'))
					->where('FacilityDayID', '=', Input::get('id1'))
					->update(array(
							'FacilityStart' => null,
							'FacilityEnd' => null
						));
			}

			if(Input::get('ts2') != '' && Input::get('te2'))
			{
				DB::table('tblfacilitysched')
					->where('FacilityID', '=', Input::get('hiddenFID'))
					->where('FacilityTypeID', '=', Input::get('hiddenFTypeID'))
					->where('FacilityDayID', '=', Input::get('id2'))
					->update(array(
							'FacilityStart' => Input::get('ts2'),
							'FacilityEnd' => Input::get('te2')
						));
			}
			else
			{
				DB::table('tblfacilitysched')
					->where('FacilityID', '=', Input::get('hiddenFID'))
					->where('FacilityTypeID', '=', Input::get('hiddenFTypeID'))
					->where('FacilityDayID', '=', Input::get('id2'))
					->update(array(
							'FacilityStart' => null,
							'FacilityEnd' => null
						));
			}

			if(Input::get('ts3') != '' && Input::get('te3'))
			{
				DB::table('tblfacilitysched')
					->where('FacilityID', '=', Input::get('hiddenFID'))
					->where('FacilityTypeID', '=', Input::get('hiddenFTypeID'))
					->where('FacilityDayID', '=', Input::get('id3'))
					->update(array(
							'FacilityStart' => Input::get('ts3'),
							'FacilityEnd' => Input::get('te3')
						));
			}
			else
			{
				DB::table('tblfacilitysched')
					->where('FacilityID', '=', Input::get('hiddenFID'))
					->where('FacilityTypeID', '=', Input::get('hiddenFTypeID'))
					->where('FacilityDayID', '=', Input::get('id3'))
					->update(array(
							'FacilityStart' => null,
							'FacilityEnd' => null
						));
			}

			if(Input::get('ts4') != '' && Input::get('te4'))
			{
				DB::table('tblfacilitysched')
					->where('FacilityID', '=', Input::get('hiddenFID'))
					->where('FacilityTypeID', '=', Input::get('hiddenFTypeID'))
					->where('FacilityDayID', '=', Input::get('id4'))
					->update(array(
							'FacilityStart' => Input::get('ts4'),
							'FacilityEnd' => Input::get('te4')
						));
			}
			else
			{
				DB::table('tblfacilitysched')
					->where('FacilityID', '=', Input::get('hiddenFID'))
					->where('FacilityTypeID', '=', Input::get('hiddenFTypeID'))
					->where('FacilityDayID', '=', Input::get('id4'))
					->update(array(
							'FacilityStart' => null,
							'FacilityEnd' => null
						));
			}

			if(Input::get('ts5') != '' && Input::get('te5'))
			{
				DB::table('tblfacilitysched')
					->where('FacilityID', '=', Input::get('hiddenFID'))
					->where('FacilityTypeID', '=', Input::get('hiddenFTypeID'))
					->where('FacilityDayID', '=', Input::get('id5'))
					->update(array(
							'FacilityStart' => Input::get('ts5'),
							'FacilityEnd' => Input::get('te5')
						));
			}
			else
			{
				DB::table('tblfacilitysched')
					->where('FacilityID', '=', Input::get('hiddenFID'))
					->where('FacilityTypeID', '=', Input::get('hiddenFTypeID'))
					->where('FacilityDayID', '=', Input::get('id5'))
					->update(array(
							'FacilityStart' => null,
							'FacilityEnd' => null
						));
			}

			if(Input::get('ts6') != '' && Input::get('te6'))
			{
				DB::table('tblfacilitysched')
					->where('FacilityID', '=', Input::get('hiddenFID'))
					->where('FacilityTypeID', '=', Input::get('hiddenFTypeID'))
					->where('FacilityDayID', '=', Input::get('id6'))
					->update(array(
							'FacilityStart' => Input::get('ts6'),
							'FacilityEnd' => Input::get('te6')
						));
			}
			else
			{
				DB::table('tblfacilitysched')
					->where('FacilityID', '=', Input::get('hiddenFID'))
					->where('FacilityTypeID', '=', Input::get('hiddenFTypeID'))
					->where('FacilityDayID', '=', Input::get('id6'))
					->update(array(
							'FacilityStart' => null,
							'FacilityEnd' => null
						));
			}

			if(Input::get('ts7') != '' && Input::get('te7'))
			{
				DB::table('tblfacilitysched')
					->where('FacilityID', '=', Input::get('hiddenFID'))
					->where('FacilityTypeID', '=', Input::get('hiddenFTypeID'))
					->where('FacilityDayID', '=', Input::get('id7'))
					->update(array(
							'FacilityStart' => Input::get('ts7'),
							'FacilityEnd' => Input::get('te7')
						));
			}
			else
			{
				DB::table('tblfacilitysched')
					->where('FacilityID', '=', Input::get('hiddenFID'))
					->where('FacilityTypeID', '=', Input::get('hiddenFTypeID'))
					->where('FacilityDayID', '=', Input::get('id7'))
					->update(array(
							'FacilityStart' => null,
							'FacilityEnd' => null
						));
			}

			

			$fIDs = DB::table('tblfacilitydetails')
				->join('tblfacilitytype', 'tblfacilitytype.FacilityTypeID', '=', 'tblfacilitydetails.FacilityTypeID')
				->get();

			$fSched =  DB::table('tblfacilitysched')
				->join('tblday', 'tblday.DayID', '=', 'tblfacilitysched.FacilityDayID')
				->where((function($query){
						$query	->where('FacilityStart', '!=', 'null')
								->orWhere('FacilityEnd', '!=', 'null');
						}))
				->get();

			return Response::json(array('fIDs' => $fIDs, 'fSched' => $fSched));
		}
	}
	

}
