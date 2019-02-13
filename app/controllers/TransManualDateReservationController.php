<?php

class TransManualDateReservationController extends BaseController {

	public function getAvailables()
	{
		$itemType = DB::table('tblitemtype')
			->where('status', '=', 'active')
			->get();

		$itemTypeDetails = DB::table('tblitemdetails')
			->selectRaw(DB::raw('count(*) as ItemID, ReserveStatus, ItemStatus, ItemTypeID'))
			->where('ItemStatus', '=', 'Good')
			->groupBy('ItemTypeID', 'ReserveStatus', 'ItemStatus')
			->get();

		$itemReserve = DB::table('tbltransreservation')
			->join('tbltransitemtype', 'tbltransreservation.ReservationID', '=', 'tbltransitemtype.ReservationID')
			->where('ReserveStatus', '!=', 'Returned')
			->get();


		$facility = DB::table('tblfacility')
			->where('FCondition', '=', 'Good')
			->where('tblfacility.status', '=', 'active')
			->get();

		$device = DB::table('tblfacilityenergy')
			->join('tblfacility', 'tblfacility.FacilityID', '=', 'tblfacilityenergy.DeviceFacility')
			->where('tblfacilityenergy.status', '=', 'active')
			->where('tblfacilityenergy.DeviceStatus', '=', 'Good')
			->get();

		$facilityReserve = DB::table('tbltransreservation')
			->join('tbltransfacilityrequest', 'tbltransreservation.ReservationID', '=', 'tbltransfacilityrequest.ReservationID')
			->where('ReserveStatus', '!=', 'Returned')
			->get();



		return Response::json(array('item' => $itemType, 'facility' => $facility, 'iReserve' => $itemReserve, 'fReserve' => $facilityReserve, 'iDetails' => $itemTypeDetails, 'device' => $device));
	}

}
