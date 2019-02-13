<?php

class MainFacilityDetailsController extends BaseController {

	public function showRecords()
	{
		$facilityType = DB::table('tblfacilitytype')
			->where('status', '=', 'active')
			->get();

		$facilityDetails = DB::table('tblfacilitydetails')
			->join('tblfacilitytype', 'tblfacilitytype.FacilityTypeID', '=', 'tblfacilitydetails.FacilityTypeID')
			->select('FacilityID', 'tblfacilitydetails.FacilityTypeID', 'FacilityName' ,'tblfacilitydetails.status', 'Image', 'FacilityCode')
			->get();

		return View::make('mainFacility.fac_details')
			-> with('fType', $facilityType)
			-> with('fDetails', $facilityDetails);
	}

	public function getInfo()
	{
		if(Request::ajax())
		{
			$info = DB::table('tblfacilitydetails')
				->join('tblfacilitytype', 'tblfacilitytype.FacilityTypeID', '=', 'tblfacilitydetails.FacilityTypeID')
				->select('FacilityID', 'tblfacilitydetails.FacilityTypeID', 'FacilityName' ,'tblfacilitydetails.status', 'Image', 'FacilityCode')
				->where('tblfacilitydetails.FacilityID', '=', Input::get('fID'))
				->where('tblfacilitydetails.FacilityTypeID', '=', Input::get('ftID'))
				->get();

			return Response::json(array('info' => $info ));
		}
	}

	public function addRecord()
	{
		if(Request::ajax())
		{
			$result = DB::table('tblfacilitydetails')
				->where('FacilityTypeID', '=', Input::get('txtFType'))
				->count();


			if($result == 0)
			{
				if(Input::hasFile('txtImage'))
				{

					$newName = time().Input::file('txtImage')->getClientOriginalName();

					Input::file('txtImage')->move(public_path().'/bower_components/admin-lte/dist/images/', $newName);

					DB::table('tblfacilitydetails')
						->insert(array(
								'FacilityID' => '1',
								'FacilityTypeID' => Input::get('txtFType'),
								'status' => 'Good',
								'Image' => $newName
							));
				}

				else
				{
					DB::table('tblfacilitydetails')
						->insert(array(
								'FacilityID' => '1',
								'FacilityTypeID' => Input::get('txtFType'),
								'status' => 'Good'
							));
				}
				
				
				
			}
			else
			{
				$lastID = DB::table('tblfacilitydetails')
					->where('FacilityTypeID', '=', Input::get('txtFType'))
					->orderBy('FacilityID', 'desc')
					->take(1)
					->get();

				if(Input::hasFile('txtImage'))
				{
					$newName = time().Input::file('txtImage')->getClientOriginalName();

					Input::file('txtImage')->move(public_path().'/bower_components/admin-lte/dist/images/', $newName);


					DB::table('tblfacilitydetails')
						->insert(array(
								'FacilityID' => $lastID[0]->FacilityID + 1,
								'FacilityTypeID' => Input::get('txtFType'),
								'status' => 'Good',
								'Image' => $newName
							));
				}

				else
				{
					DB::table('tblfacilitydetails')
						->insert(array(
								'FacilityID' => $lastID[0]->FacilityID + 1,
								'FacilityTypeID' => Input::get('txtFType'),
								'status' => 'Good'
							));
				}
				
				
			}
			$facilityDetails = DB::table('tblfacilitydetails')
				->join('tblfacilitytype', 'tblfacilitytype.FacilityTypeID', '=', 'tblfacilitydetails.FacilityTypeID')
				->select('FacilityID', 'tblfacilitydetails.FacilityTypeID', 'FacilityName' ,'tblfacilitydetails.status', 'Image', 'FacilityCode')
				->get();

			return Response::json(array('fd' => $facilityDetails));
		}
	}

	public function updateRecord()
	{
		if(Request::ajax())
		{
			if(Input::hasFile('etxt7'))
			{
				$newName = time().Input::file('etxt7')->getClientOriginalName();

				Input::file('etxt7')->move(public_path().'/bower_components/admin-lte/dist/images/', $newName);

				

				DB::table('tblfacilitydetails')
					->where('FacilityTypeID', '=', Input::get('hiddenTypeID'))
					->where('FacilityID', '=', Input::get('hiddenFID'))
					->update(array(
							'FacilityID' => Input::get('etxt3'),
							'status' => Input::get('etxt5'),
							'Image' => $newName
						));
			}

			else
			{
				DB::table('tblfacilitydetails')
					->where('FacilityTypeID', '=', Input::get('hiddenTypeID'))
					->where('FacilityID', '=', Input::get('hiddenFID'))
					->update(array(
							'FacilityID' => Input::get('etxt3'),
							'status' => Input::get('etxt5')
						));
			}

			$facilityDetails = DB::table('tblfacilitydetails')
				->join('tblfacilitytype', 'tblfacilitytype.FacilityTypeID', '=', 'tblfacilitydetails.FacilityTypeID')
				->select('FacilityID', 'tblfacilitydetails.FacilityTypeID', 'FacilityName' ,'tblfacilitydetails.status', 'Image', 'FacilityCode')
				->get();

			return Response::json(array('fd' => $facilityDetails));
		}
	}

	public function deleteRecord()
	{
		if(Request::ajax())
		{
			DB::table('tblfacilitydetails')
				->where('FacilityID', '=', Input::get('hiddenFID2'))
				->where('FacilityTypeID', '=', Input::get('hiddenTypeID2'))
				->delete();

			$facilityDetails = DB::table('tblfacilitydetails')
				->join('tblfacilitytype', 'tblfacilitytype.FacilityTypeID', '=', 'tblfacilitydetails.FacilityTypeID')
				->select('FacilityID', 'tblfacilitydetails.FacilityTypeID', 'FacilityName' ,'tblfacilitydetails.status', 'Image', 'FacilityCode')
				->get();

			return Response::json(array('fd' => $facilityDetails));
		}


	}

}
