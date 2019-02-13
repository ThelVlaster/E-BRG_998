<?php

class MainEventDetailsController extends BaseController {

	public function showRecords()
	{
		$eventDetails = DB::table('tbleventdetails')
			->get();

		return View::make('mainEvent.event_detail')
			->with('eDetails', $eventDetails);
	}

}
