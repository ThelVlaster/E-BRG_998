<?php

class MainOfficialSchedController extends BaseController {

	public function showRecords()
	{
		$officialDetails = DB::table('tblofficialdetails')
			->where('tblofficialdetails.status', '=', 'active')
			->join('tblofficialposition', 'tblofficialdetails.OfficialPositionID', '=', 'tblofficialposition.OfficialPositionID')
			->join('tblresident', 'tblresident.ResidentID', '=', 'tblofficialdetails.ResidentID')
			->orderBy('OfficialID', 'asc')
			->get();

		

		$officialSched = DB::table('tblofficialsched')
				->join('tblday', 'tblofficialsched.DayID', '=', 'tblday.DayID')
				//->where('OfficialID', '=', Input::get('id'))
				->where(function($query){
					$query	->where('TimeStart', '!=', 'null')
							->orWhere('TimeEnd', '!=', 'null');
					})
				->get();

		$officialPosition = DB::table('tblofficialposition')
			->where('status', '=', 'active')
			->orderBy('OfficialPosition', 'asc')
			->get();



		return View::make('mainOfficial.official_sched')
			->with('oDetails', $officialDetails)
			->with('oSched', $officialSched)
			->with('oPosition', $officialPosition);
	}

	

	public function perOfficial()
	{
		if(Request::ajax())
		{
			if(Input::get('oName') == 'ALL')
			{
				$officialDetails = DB::table('tblofficialdetails')
					->where('tblofficialdetails.status', '=', 'active')
					->join('tblofficialposition', 'tblofficialdetails.OfficialPositionID', '=', 'tblofficialposition.OfficialPositionID')
					->join('tblresident', 'tblresident.ResidentID', '=', 'tblofficialdetails.ResidentID')
					->get();

				$officialSched = DB::table('tblofficialsched')
					->join('tblday', 'tblofficialsched.DayID', '=', 'tblday.DayID')
					//->where('OfficialID', '=', Input::get('id'))
					->where(function($query){
						$query	->where('TimeStart', '!=', 'null')
								->orWhere('TimeEnd', '!=', 'null');
						})
					->get();

				return Response::json(array('oDetails' => $officialDetails, 'oSched'=> $officialSched));
			}
			else
			{
				$officialDetails = DB::table('tblofficialdetails')
					->where('OfficialID', '=', Input::get('oName'))
					->join('tblofficialposition', 'tblofficialdetails.OfficialPositionID', '=', 'tblofficialposition.OfficialPositionID')
					->join('tblresident', 'tblresident.ResidentID', '=', 'tblofficialdetails.ResidentID')
					->get();

				$officialSched = DB::table('tblofficialsched')
						->join('tblday', 'tblofficialsched.DayID', '=', 'tblday.DayID')
						//->where('OfficialID', '=', Input::get('id'))
						->where(function($query){
							$query	->where('TimeStart', '!=', 'null')
									->orWhere('TimeEnd', '!=', 'null');
							})
						->get();
				return Response::json(array('oDetails' => $officialDetails, 'oSched'=> $officialSched));
			}
			
		}
	}

	public function getInfo()
	{
		if(Request::ajax())
		{
			$officialDetails = DB::table('tblofficialdetails')
				->join('tblofficialposition', 'tblofficialdetails.OfficialPositionID', '=', 'tblofficialposition.OfficialPositionID')
				->join('tblresident', 'tblresident.ResidentID', '=', 'tblofficialdetails.ResidentID')
				->where('OfficialID', '=', Input::get('id'))
				->get();

			$officialSched = DB::table('tblofficialsched')
				->join('tblday', 'tblofficialsched.DayID', '=', 'tblday.DayID')
				->where('OfficialID', '=', Input::get('id'))
				->get();

			return Response::json(array('oDetails' => $officialDetails,'oSched' => $officialSched));
		}
	}

	public function updateRecord()
	{
		if(Request::ajax())
		{
			if(Input::get('ts1') != '' && Input::get('te1'))
			{
				DB::table('tblofficialsched')
					->where('OfficialID', '=', Input::get('id'))
					->where('DayID', '=', Input::get('id1'))
					->update(array(
							'TimeStart' => Input::get('ts1'),
							'TimeEnd' => Input::get('te1')
						));
			}
			else
			{
				DB::table('tblofficialsched')
					->where('OfficialID', '=', Input::get('id'))
					->where('DayID', '=', Input::get('id1'))
					->update(array(
							'TimeStart' => null,
							'TimeEnd' => null
						));
			}

			if(Input::get('ts2') != '' && Input::get('te2'))
			{
				DB::table('tblofficialsched')
					->where('OfficialID', '=', Input::get('id'))
					->where('DayID', '=', Input::get('id2'))
					->update(array(
							'TimeStart' => Input::get('ts2'),
							'TimeEnd' => Input::get('te2')
						));
			}
			else
			{
				DB::table('tblofficialsched')
					->where('OfficialID', '=', Input::get('id'))
					->where('DayID', '=', Input::get('id2'))
					->update(array(
							'TimeStart' => null,
							'TimeEnd' => null
						));
			}

			if(Input::get('ts3') != '' && Input::get('te3'))
			{
				DB::table('tblofficialsched')
					->where('OfficialID', '=', Input::get('id'))
					->where('DayID', '=', Input::get('id3'))
					->update(array(
							'TimeStart' => Input::get('ts3'),
							'TimeEnd' => Input::get('te3')
						));
			}
			else
			{
				DB::table('tblofficialsched')
					->where('OfficialID', '=', Input::get('id'))
					->where('DayID', '=', Input::get('id3'))
					->update(array(
							'TimeStart' => null,
							'TimeEnd' => null
						));
			}

			if(Input::get('ts4') != '' && Input::get('te4'))
			{
				DB::table('tblofficialsched')
					->where('OfficialID', '=', Input::get('id'))
					->where('DayID', '=', Input::get('id4'))
					->update(array(
							'TimeStart' => Input::get('ts4'),
							'TimeEnd' => Input::get('te4')
						));
			}
			else
			{
				DB::table('tblofficialsched')
					->where('OfficialID', '=', Input::get('id'))
					->where('DayID', '=', Input::get('id4'))
					->update(array(
							'TimeStart' => null,
							'TimeEnd' => null
						));
			}

			if(Input::get('ts5') != '' && Input::get('te5'))
			{
				DB::table('tblofficialsched')
					->where('OfficialID', '=', Input::get('id'))
					->where('DayID', '=', Input::get('id5'))
					->update(array(
							'TimeStart' => Input::get('ts5'),
							'TimeEnd' => Input::get('te5')
						));
			}
			else
			{
				DB::table('tblofficialsched')
					->where('OfficialID', '=', Input::get('id'))
					->where('DayID', '=', Input::get('id5'))
					->update(array(
							'TimeStart' => null,
							'TimeEnd' => null
						));
			}

			if(Input::get('ts6') != '' && Input::get('te6'))
			{
				DB::table('tblofficialsched')
					->where('OfficialID', '=', Input::get('id'))
					->where('DayID', '=', Input::get('id6'))
					->update(array(
							'TimeStart' => Input::get('ts6'),
							'TimeEnd' => Input::get('te6')
						));
			}
			else
			{
				DB::table('tblofficialsched')
					->where('OfficialID', '=', Input::get('id'))
					->where('DayID', '=', Input::get('id6'))
					->update(array(
							'TimeStart' => null,
							'TimeEnd' => null
						));
			}

			if(Input::get('ts7') != '' && Input::get('te7'))
			{
				DB::table('tblofficialsched')
					->where('OfficialID', '=', Input::get('id'))
					->where('DayID', '=', Input::get('id7'))
					->update(array(
							'TimeStart' => Input::get('ts7'),
							'TimeEnd' => Input::get('te7')
						));
			}
			else
			{
				DB::table('tblofficialsched')
					->where('OfficialID', '=', Input::get('id'))
					->where('DayID', '=', Input::get('id7'))
					->update(array(
							'TimeStart' => null,
							'TimeEnd' => null
						));
			}

			if(Input::get('ctr') == 'ALL')
			{
				$officialDetails = DB::table('tblofficialdetails')
					->where('tblofficialdetails.status', '=', 'active')
					->join('tblofficialposition', 'tblofficialdetails.OfficialPositionID', '=', 'tblofficialposition.OfficialPositionID')
					->join('tblresident', 'tblresident.ResidentID', '=', 'tblofficialdetails.ResidentID')
					->get();

				$officialSched = DB::table('tblofficialsched')
					->join('tblday', 'tblofficialsched.DayID', '=', 'tblday.DayID')
					//->where('OfficialID', '=', Input::get('id'))
					->where(function($query){
						$query	->where('TimeStart', '!=', 'null')
								->orWhere('TimeEnd', '!=', 'null');
						})
					->get();

				return Response::json(array('oSched' => $officialSched, 'oDetails' => $officialDetails));
			}

			else
			{
				$officialDetails = DB::table('tblofficialdetails')
					->where('OfficialID', '=', Input::get('ctr'))
					->join('tblofficialposition', 'tblofficialdetails.OfficialPositionID', '=', 'tblofficialposition.OfficialPositionID')
					->join('tblresident', 'tblresident.ResidentID', '=', 'tblofficialdetails.ResidentID')
					->get();

				$officialSched = DB::table('tblofficialsched')
					->join('tblday', 'tblofficialsched.DayID', '=', 'tblday.DayID')
					//->where('OfficialID', '=', Input::get('id'))
					->where(function($query){
						$query	->where('TimeStart', '!=', 'null')
								->orWhere('TimeEnd', '!=', 'null');
						})
					->get();

				return Response::json(array('oSched' => $officialSched, 'oDetails' => $officialDetails));
			}
		}
	}
}
