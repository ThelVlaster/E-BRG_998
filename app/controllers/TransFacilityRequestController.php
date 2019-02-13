<?php

class TransFacilityRequestController extends BaseController {


	public function getFacility()
	{
		$facreserve = DB::table('tbltransreservation')
			->where ('ReserveStatus', '!=', 'Returned')
			->get();

		$fac= DB::table('tbltransfacilityrequest')
			->get();

		return Response::json(array("facreserve" => $facreserve, 'facreq' => $fac));
	}

	public function availableFacility()
	{
		if(Request::ajax())
		{
			$facid= DB::table('tblfacility')
				->whereNotIn('FacilityID', Input::get('reserveid'))
				->where ('FCondition', '=', 'Good')
				->where ('status', '=', 'Active')
				->get();

			if (Input::get('reserveid')==null)
			{
				$facid= DB::table('tblfacility')
				->where ('status', '=', 'Active')
				->where ('FCondition', '=', 'Good')
				->get();
			}

			$device = DB::table('tblfacilityenergy')
				->where('DeviceStatus', '=', 'Good')
				->where('status', '=', 'active')
				->get();

			return Response::json(array("facid" => $facid, "device" => $device));
		}
	}
}