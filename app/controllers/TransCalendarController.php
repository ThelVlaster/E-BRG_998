<?php

class TransCalendarController extends BaseController {

	public function showRecords()
	{
		$facilityDetails = DB::table('tblfacilitydetails')
			->join('tblfacilitytype', 'tblfacilitytype.FacilityTypeID', '=', 'tblfacilitydetails.FacilityTypeID')
			->where('tblfacilitydetails.status', '=', 'Good')
			->get();
			
		return View::make('transFacility.facilityCalendar')
			-> with('fDetails', $facilityDetails);
	}

	public function showEvents()
	{
		$ctrEvents = DB::table('tbltransreservation')
			->count();
		$infoEvents = DB::table('tbltransreservation')
			->get();


		$events = array();

	    for($i = 0; $i < $ctrEvents ; $i++){
	        $eventArray['id'] = $infoEvents[$i]->ReservationID;
	        $eventArray['title'] = $infoEvents[$i]->Purpose;
	        $eventArray['start'] = $infoEvents[$i]->DateReserveFrom." ".$infoEvents[$i]->TimeReserveFrom;
	        $eventArray['end'] = $infoEvents[$i]->DateReserveTo." ".$infoEvents[$i]->TimeReserveTo;
	        $events[] = $eventArray;
	    }

	    echo json_encode($events);
	}


	public function getInfo()
	{
		if(Request::ajax()){
			$fac =  DB::table('tblfacilitydetails')
			->join('tblfacilitytype', 'tblfacilitytype.FacilityTypeID', '=', 'tblfacilitydetails.FacilityTypeID')
			->where('tblfacilitydetails.FacilityID', '=', Input::get('id'))
			->where('tblfacilitydetails.FacilityTypeID', '=', Input::get('type'))
			->get();

			return Response::json(array('fac' => $fac));
		}
	}

}