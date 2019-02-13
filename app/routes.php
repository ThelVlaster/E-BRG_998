<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('error404', function(){
	return View::make('error.error404');
});

//WEBSITE
Route::get('/', function(){
	return View::make('website.home.index');
});

Route::get('index', function(){
	return View::make('website.home.index');
});

Route::get('about', function(){
	return View::make('website.about.about');
});

Route::get('request', function(){
	return View::make('website.request.request');
});

Route::get('news', function(){
	return View::make('website.news.news');
});

Route::get('contact', function(){
	return View::make('website.contact.contact');
});

//request page
Route::get('items', 'WebReservationController@index');

Route::get('facilities', function(){
	return View::make('website.facilities.facilities');
});

Route::get('docreq', 'WebRegDocRequestController@index');
Route::get('getDocs', 'WebRegDocRequestController@getDocs');
Route::post('onlineDocRequest', 'WebRegDocRequestController@onlineDocRequest');

Route::get('busdocs', 'WebBusDocRequestController@index');
Route::post('onlineBusRequest', 'WebBusDocRequestController@onlineBusRequest');




//Login
Route::get('login', 'LoginController@index');

//getting the value of the input if Login Successful
Route::post('loginVerification', 'LoginController@loginVerification');
Route::get('logout', 'LoginController@Logout');

Route::get('register', 'RegisterController@index');
Route::post('registration', 'RegisterController@register');
Route::post('checkUsername', 'RegisterController@checkUsername');


//Change profile pic an signature
Route::post('changeDPSignature', 'ProfileController@changeDPSign');

Route::get('userProfile', 'ProfileController@index');


//Dashboard
Route::get('dashboard', 'DashboardController@showRecords');
Route::post('countResInfo', 'DashboardController@countResInfo');
Route::get('countResStreetInfo', 'DashboardController@countResStreetInfo');

//Maintenance Menu
Route::get('maintenanceMenu', function(){
	return View::make('maintenanceMenu.maint_menu');
});


//Maintenance Official Position
Route::get('officialPosition', 'MainOfficialPositionController@showRecords');
Route::post('getInfoByID', 'MainOfficialPositionController@getInfoByID');
Route::post('addOfficialPosition', 'MainOfficialPositionController@addRecord');
Route::post('updateOfficialPosition', 'MainOfficialPositionController@updateRecord');
Route::post('deleteOfficialPosition', 'MainOfficialPositionController@deleteRecord');


//Maintenance Official Details
Route::get('officialDetails', 'MainOfficialDetailsController@showRecords');
Route::post('getResidentInfo', 'MainOfficialDetailsController@getResidentInfo');
Route::post('getOfficialDetails', 'MainOfficialDetailsController@getInfo');
Route::post('addOfficialDetails', 'MainOfficialDetailsController@addRecord');
Route::post('updateOfficialDetails', 'MainOfficialDetailsController@updateRecord');
Route::post('deleteOfficialDetails', 'MainOfficialDetailsController@deleteRecord');


//Maintenance Official Schedule
Route::get('officialSchedule', 'MainOfficialSchedController@showRecords');
Route::post('perOfficial', 'MainOfficialSchedController@perOfficial');
Route::post('getSched', 'MainOfficialSchedController@getInfo');
Route::post('updateSched', 'MainOfficialSchedController@updateRecord');

Route::get('officialScheduleDay', 'MainOfficialSchedDayController@showRecords');



//Maintenance Household Details
Route::get('householdDetails', 'MainHouseholdController@showRecords');
Route::post('getInfo', 'MainHouseholdController@getInfo');
Route::post('addHousehold', 'MainHouseholdController@addRecord');
Route::post('updateHousehold', 'MainHouseholdController@updateRecord');
Route::post('deleteHousehold', 'MainHouseholdController@deleteRecord');
Route::post('getAddress', 'MainHouseholdController@getAddress');

//Maintenance Resident Details
Route::get('residentDetails', 'MainResidentController@showRecords');
Route::post('getRInfo', 'MainResidentController@getRInfo');
Route::post('getResInfo', 'MainResidentController@getResInfo');
Route::post('addResident', 'MainResidentController@addRecord');
Route::post('addFamily', 'MainResidentController@addFamily');
Route::post('updateResident', 'MainResidentController@updateRecord');
Route::post('deleteResident', 'MainResidentController@deleteRecord');


//Maintenance Document Details
Route::get('documentDetails', 'MainDocumentDetailsController@showRecords');

//for disabling the business dropdown
Route::get('classification', 'MainDocumentDetailsController@classification');

Route::post('addDocumentDetails', 'MainDocumentDetailsController@addRecord');
Route::post('getDocumentDetails', 'MainDocumentDetailsController@getInfo');
Route::post('updateDocumentDetails', 'MainDocumentDetailsController@updateRecord');
Route::post('deleteDocumentDetails', 'MainDocumentDetailsController@deleteRecord');
Route::post('getBG', 'MainDocumentDetailsController@getBG');
Route::get('getContent', 'MainDocumentDetailsController@getContent');

Route::get('template', 'MainDocumentDetailsController@template');
Route::post('createTemplate', 'MainDocumentDetailsController@createTemplate');
Route::post('addTemplate', 'MainDocumentDetailsController@addTemplate');

//Maintenance Document Purpose
Route::get('documentPurpose', 'MainDocumentPurposeController@showRecords');
Route::post('getDocumentPurpose', 'MainDocumentPurposeController@getInfo');
Route::post('addDocumentPurpose', 'MainDocumentPurposeController@addRecord');
Route::post('updateDocumentPurpose', 'MainDocumentPurposeController@updateRecord');
Route::post('deleteDocumentPurpose', 'MainDocumentPurposeController@deleteRecord');

//Maintenance Document Template
Route::get('documentTemplate', 'MainDocumentTemplateController@showRecords');
Route::post('getTemplateInfo', 'MainDocumentTemplateController@getInfo');
Route::post('addDocumentTemplate', 'MainDocumentTemplateController@addRecord');
Route::post('updateDocumentTemplate', 'MainDocumentTemplateController@updateRecord');
Route::post('deleteDocumentTemplate', 'MainDocumentTemplateController@deleteRecord');

//Maintenance Business Type
Route::get('businessType', 'MainBusinessTypeController@showRecords');
Route::post('getBusinessTypeInfo', 'MainBusinessTypeController@getBusinessTypeInfo');
Route::post('addBusinessType', 'MainBusinessTypeController@addRecord');
Route::post('updateBusinessType', 'MainBusinessTypeController@updateRecord');
Route::post('deleteBusinessType', 'MainBusinessTypeController@deleteRecord');


//Maintenance Business Details
Route::get('businessDetails', 'MainBusinessDetailsController@showRecords');
Route::post('updateBusinessDetails', 'MainBusinessDetailsController@updateRecord');
Route::post('getBusinessInfo', 'MainBusinessDetailsController@getBusinessInfo');

//Maintenance Facility Type
Route::get('facilityType', 'MainFacilityTypeController@showRecords');
Route::post('getFacilityType', 'MainFacilityTypeController@getInfo');
Route::post('addFacilityType', 'MainFacilityTypeController@addRecord');
Route::post('updateFacilityType', 'MainFacilityTypeController@updateRecord');
Route::post('deleteFacilityType', 'MainFacilityTypeController@deleteRecord');
//WALA NA TO ^^^^





//Maintenance for Facility Details
Route::get('facilityDetails', 'MainFacilityDetailsController@showRecords');
Route::post('getFacilityDetails', 'MainFacilityDetailsController@getInfo');
Route::post('addFacilityDetails', 'MainFacilityDetailsController@addRecord');
Route::post('updateFacilityDetails', 'MainFacilityDetailsController@updateRecord');
Route::post('deleteFacilityDetails', 'MainFacilityDetailsController@deleteRecord');

//WALA NA TO ^^^^


//Maintenance Facility Schedule
Route::get('facilitySchedule', 'MainFacilityScheduleController@showRecords');
Route::post('getFacilitySchedule', 'MainFacilityScheduleController@getInfo');
Route::post('updateFacilitySched', 'MainFacilityScheduleController@updateSched');

//WALA NA TO ^^^^


//final maintenance for facility
Route::get('facility', 'MainFacilityController@showRecords');
Route::post('addFacility', 'MainFacilityController@addFacility');
Route::post('getFacDetails', 'MainFacilityController@getFacDetails');
Route::post('updateFacility', 'MainFacilityController@updateFacility');
Route::post('deleteFacility', 'MainFacilityController@deleteFacility');


//energy fee
Route::get('facilityEnergy', 'MainFacilityEnergyController@showRecords');
Route::post('getFacilityInfo', 'MainFacilityEnergyController@getFacilityInfo');
Route::post('addDevice', 'MainFacilityEnergyController@addDevice');
Route::post('getDevice', 'MainFacilityEnergyController@getDevice');
Route::post('updateDevice', 'MainFacilityEnergyController@updateDevice');
Route::post('deleteDevice', 'MainFacilityEnergyController@deleteDevice');

//Maintenance Item Type
Route::get('itemType', 'MainItemTypeController@showRecords');
Route::post('getItemTypeInfo', 'MainItemTypeController@getInfo');
Route::post('addItemType', 'MainItemTypeController@addRecord');
Route::post('updateItemType', 'MainItemTypeController@updateRecord');
Route::post('deleteItemType', 'MainItemTypeController@deleteRecord');

//Maintenance Item Details
Route::get('itemDetails', 'MainItemDetailsController@showRecords');
Route::post('addItemDetails', 'MainItemDetailsController@addRecord');
Route::post('getItemDetailsInfo', 'MainItemDetailsController@getInfo');
Route::post('updateItemDetails', 'MainItemDetailsController@updateRecord');
Route::post('deleteItemDetails', 'MainItemDetailsController@deleteRecord');

//Maintenance Event Details
Route::get('eventDetails', 'MainEventDetailsController@showRecords');

//Transaction Reserve Facility
//Route::get('reserveFac', 'TransReserveFacController@showRecords');

//Transaction Item Inventory
Route::get('itemInventory', 'TransItemInventoryController@showRecords');

//business document transaction
Route::get('busdocumentRequest', 'TransBusDocumentRequestController@showRecords');
Route::get('busdocumentRequestForm', 'TransBusDocumentRequestController@documentRequestForm');
Route::post('busgetDocRequestedForInfo', 'TransBusDocumentRequestController@getDocRequestedForInfo');
Route::post('addBusDocumentRequest', 'TransBusDocumentRequestController@addDocumentRequest');
Route::post('busgetCancel', 'TransBusDocumentRequestController@getForCancel');
Route::post('busupdateCancel', 'TransBusDocumentRequestController@updateCancel');
Route::get('createBusDocumentRequest', 'TransBusDocumentRequestController@createDocumentRequest');
Route::post('bussaveTemplate', 'TransBusDocumentRequestController@saveTemplate');
Route::get('busprintTemplate', 'TransBusDocumentRequestController@printTemplate');
Route::post('getbusFinalTemplate', 'TransBusDocumentRequestController@getFinalTemplate');


//document transaction printing and claiming sept 21
Route::post('getFirstPrint', 'TransPrintClaimController@getFirstPrint');
Route::post('donePrinting', 'TransPrintClaimController@donePrinting');
Route::post('claimingDocument', 'TransPrintClaimController@claimingDocument');
Route::post('ReprintPayment', 'TransPrintClaimController@ReprintPayment');
Route::post('reprintDone', 'TransPrintClaimController@reprintDone');

//email for business
Route::get('sendBusDocStat', 'TransBusDocumentRequestController@sendBusDocStat');
Route::get('sendRBusDocStat', 'TransBusDocumentRequestController@sendRBusDocStat');



//Transaction Reserve Facility
Route::get('reserveFac', 'TransReservedFacController@showRecords');
Route::post('getFaciInfo', 'TransReservedFacController@getFaciInfo');
Route::post('getUnpaidInfo', 'TransReservedFacController@getUnpaidInfo');
Route::post('cancelReqFaci', 'TransReservedFacController@deleteRecord');

//Route::get('viewfac', 'TransRequestFacController@showRecords');

//Transaction Request Facility
Route::get('requestFac', 'TransRequestFacController@showRecords');
Route::get('reserveCalendar','TransRequestFacController@showRecords');
Route::post('getResidentInfo', 'TransRequestFacController@getResidentInfo');
Route::post('getFacilityDetails', 'TransRequestFacController@getFacilityDetails');
Route::post('addRecord', 'TransRequestFacController@addRecords');
Route::post('getAvailFaci', 'TransRequestFacController@getAvailFaci');
Route::post('viewCalendar', 'TransRequestFacController@viewCalendar');
Route::post('getfaciID', 'TransRequestFacController@getID');
Route::post('getFacilityTable', 'TransRequestFacController@getFacilityTable');



Route::get('transactionMenu', function(){
	return View::make('transactionMenu.trans_menu');
});


Route::get('utilitiesMenu', function(){
	return View::make('utilitiesMenu.utilities_menu');
});


//documentTransaction
Route::get('documentRequest', 'TransDocumentRequestController@showRecords');
Route::get('documentRequestForm', 'TransDocumentRequestController@documentRequestForm');
Route::post('getDocRequestedForInfo', 'TransDocumentRequestController@getDocRequestedForInfo');
Route::post('getCancel', 'TransDocumentRequestController@getForCancel');
Route::post('updateCancel', 'TransDocumentRequestController@updateCancel');
Route::post('getDocResident', 'TransDocumentRequestController@getDocResident');
Route::post('getDocNonResident', 'TransDocumentRequestController@getDocNonResident');
Route::post('getDocPaymentInfo', 'TransDocumentRequestController@getPaymentInfo');
Route::post('addDocumentRequest', 'TransDocumentRequestController@addDocumentRequest');
Route::post('saveTemplate', 'TransDocumentRequestController@saveTemplate');
Route::get('printTemplate', 'TransDocumentRequestController@printTemplate');
Route::post('getFinalTemplate', 'TransDocumentRequestController@getFinalTemplate');
Route::get('createDocumentRequest', 'TransDocumentRequestController@createDocumentRequest');
Route::get('docSummary', 'TransDocumentRequestController@docSummary');
Route::get('sendDocStat', 'TransDocumentRequestController@sendDocStat');
Route::get('sendRDocStat', 'TransDocumentRequestController@sendRDocStat');
Route::post('getAccess', 'TransDocumentRequestController@getAccess');


//claim documents
Route::get('claimDocs', 'TransDocumentRequestController@showClaim');
Route::post('getClaim', 'TransDocumentRequestController@getForClaim');
Route::post('getView', 'TransDocumentRequestController@getView');
Route::post('getAdPrint', 'TransDocumentRequestController@getAdPrint');


//doc payment

Route::get('paymentDocs', 'TransDocumentRequestController@paymentDoc');
Route::post('getReg', 'TransDocumentRequestController@getReg');
Route::post('getBus', 'TransDocumentRequestController@getBus');
Route::post('getRegInfo', 'TransDocumentRequestController@getRegInfo');
Route::post('getBusInfo', 'TransDocumentRequestController@getBusInfo');

//new doc payment

Route::get('docPayment', 'TransDocumentPaymentController@showPayment');
Route::get('docPaymentForm', 'TransDocumentPaymentController@docPaymentForm');
Route::get('busdocPaymentForm', 'TransDocumentPaymentController@busdocPaymentForm');
Route::post('computeTotal', 'TransDocumentPaymentController@computeTotal');
Route::post('payDocs', 'TransDocumentPaymentController@payDocs');
Route::post('buspayDocs', 'TransDocumentPaymentController@buspayDocs');
Route::get('docReceipt', 'TransDocumentPaymentController@docReceipt');
Route::get('busdocReceipt', 'TransDocumentPaymentController@busdocReceipt');
Route::post('docPaid', 'TransDocumentPaymentController@docPaid');
Route::post('busdocPaid', 'TransDocumentPaymentController@busdocPaid');

//resident transaction
Route::get('transRes', 'TransResidentController@showRecords');
Route::get('famProfile', 'TransResidentController@showProfile');
Route::post('addMembers', 'TransResidentController@addMember');
Route::post('updateHouse', 'TransResidentController@updateHouse');
Route::post('deactFam', 'TransResidentController@deactFam');

Route::post('getRes', 'TransResidentController@getRes');
Route::post('changeRelation', 'TransResidentController@changeRelation');
Route::post('changeRelation2', 'TransResidentController@changeRelation2');

Route::get('gethousefamily', 'TransResidentController@gethousefamily');
Route::post('getfamilyperhouse', 'TransResidentController@getfamilyperhouse');
Route::post('getfamilyinfo', 'TransResidentController@getfamilyinfo');
Route::post('transferResident', 'TransResidentController@transferResident');
Route::post('transferNewResident', 'TransResidentController@transferNewResident');

Route::get('reserveCalendar', 'TransRequestFacController@showRecords');


/*********ITEM ISSUE****************/
ROUTE::get('itemIssueForm', 'TransItemIssueController@itemIssueForm');
ROUTE::post('getReserveDetailInfo', 'TransItemIssueController@getReserveDetailInfo');
ROUTE::post('getItemsID', 'TransItemIssueController@getItemsID');
ROUTE::post('getReserveInfo','TransItemIssueController@getReserveInfo');
ROUTE::post('getIssueItems','TransItemIssueController@getIssueItems');
ROUTE::post('addIssueItemsDetails','TransItemIssueController@addIssueItemsDetails');
ROUTE::post('addIssueHeader', 'TransItemIssueController@addIssueHeader');
ROUTE::post('addIssue','TransItemIssueController@addIssue');
ROUTE::post('getInventory', 'TransItemIssueController@getInventory');



// PAULO PAULO PAULO PAULO PAULO PAULO PAULO PAULO PAULO PAULO PAULO PAULO
route::post('RefAdd', 'TransItemIssueController@RefAdd');
route::post('RefAddPayment', 'TransItemIssueController@RefAddPayment');




//ROUTE::get('itemIssue', 'TransItemIssueController@itemIssue');

/****************ITEM REQUEST********************/
Route::get('ItemRequest', 'TransItemRequestController@ItemRequest');
Route::get('ItemRequestForm', 'TransItemRequestController@ItemRequestForm');
Route::post('getResidentInfo', 'TransItemRequestController@getResidentInfo');
Route::post('addReserveItems', 'TransItemRequestController@ReserveItems');
Route::post('getAvailableItems', 'TransItemRequestController@getAvailableItems');
Route::get('getItemTypes', 'TransItemRequestController@getItemTypes');
ROUTE::post('addItemRequest' ,'TransItemRequestController@addItemRequest');
ROUTE::post('getPaymentInfo', 'TransItemRequestController@getPaymentInfo');
ROUTE::post('updatePaid','TransItemRequestController@updatePaid');
ROUTE::post('getDownpaymentInfo', 'TransItemRequestController@getDownpaymentInfo');
ROUTE::post('updatePayment','TransItemRequestController@updatePayment');
ROUTE::post('CancelRequestAuto','TransItemRequestController@CancelRequestAuto');

//cancel reservation
ROUTE::post('CancelRequest','TransItemRequestController@CancelRequest');
ROUTE::post('getReserveInfotoCancel','TransItemRequestController@getReserveInfotoCancel');

//status sorting
ROUTE::get('ItemRequestApproved','TransItemRequestController@ItemRequestApproved');
ROUTE::get('ItemRequestNew','TransItemRequestController@ItemRequestNew');
ROUTE::get('ItemRequestReturned','TransItemRequestController@ItemRequestReturned');
ROUTE::get('ItemRequestReleased','TransItemRequestController@ItemRequestReleased');
ROUTE::get('ItemRequestCancel','TransItemRequestController@ItemRequestCancel');

/****************ITEM RETURN*******************/
Route::get('returnItems', 'TransItemReturnController@returnItems');
Route::post('issueInfo', 'TransItemReturnController@issueInfo');
Route::post('returnNa', 'TransItemReturnController@returnNa');
Route::post('returnType', 'TransItemReturnController@returnType');
Route::post('returnIDs', 'TransItemReturnController@returnIDs');
//item pdf
Route::get('itemReceipt','TransItemPaymentController@itemReceipt');




//******** Transaction FACILITY****//
Route::get('getFacility', 'TransFacilityRequestController@getFacility');
Route::post('availableFacility','TransFacilityRequestController@availableFacility');


//**ISSUE FACILITY***//
ROUTE::post('getFacReserveInfo', 'TransFacilityIssueController@getFacReserveInfo');
ROUTE::post('addFacIssueHeader', 'TransFacilityIssueController@addFacIssueHeader');
ROUTE::post('addFacIssueDetails', 'TransFacilityIssueController@addFacIssueDetails');
ROUTE::post('addFacIssueDevice', 'TransFacilityIssueController@addFacIssueDevice');

//RETURN FACILITY//
ROUTE::post('returnFacilityHeader', 'TransFacilityReturnController@returnFacilityHeader');
ROUTE::post('returnFacilityDetails', 'TransFacilityReturnController@returnFacilityDetails');
ROUTE::post('returnFacilityDevices', 'TransFacilityReturnController@returnFacilityDevices');

//payment
Route::get('Payment', 'PaymentController@Payment');
Route::get('paymentUnpaid', 'PaymentController@PaymentUnpaid');
Route::get('paymentPaid', 'PaymentController@PaymentPaid');
Route::get('paymentHalfpaid', 'PaymentController@PaymentHalfpaid');
Route::post('addPayment', 'PaymentController@addPayment');
Route::post('halfPayment', 'PaymentController@halfPayment');
Route::post('getPaymentInfo', 'PaymentController@getPaymentInfo');
Route::post('getPaymentInfoforManual', 'PaymentController@getPaymentInfoforManual');
Route::get('paymentDetails', 'PaymentController@paymentDetails');
Route::get('DPpaymentDetails', 'PaymentController@DPpaymentDetails');

//penalty//
Route::post('ItemPenalty', 'TransItemReturnController@ItemPenalty');
Route::post('FacilityPenalty', 'TransFacilityReturnController@FacilityPenalty');
Route::post('DevicePenalty', 'TransFacilityReturnController@DevicePenalty');

//CALENDAR
Route::get('showEvents', 'TransCalendarController@showEvents');
Route::post('getFacInfo', 'TransCalendarController@getInfo');
Route::get('showCal', 'TransCalendarController@showRecords');


// Manual date pick
Route::get('getAvailables', 'TransManualDateReservationController@getAvailables');

//Queries
// Routeget('queriesMain', function(){
// 	return Viewmake('queries.queries_main');
// });

Route::get('queriesController', 'QueriesController@showRecords');
Route::post('getFaciName', 'QueriesController@getFaciName');
Route::post('ItemQuery', 'QueriesController@ItemQuery');
Route::post('FacQuery', 'QueriesController@FacQuery');
Route::post('BusQuery', 'QueriesController@BusQuery');
Route::post('ResQuery', 'QueriesController@ResQuery');
Route::post('HouseQuery', 'QueriesController@HouseQuery');
Route::post('OfficialQuery', 'QueriesController@OfficialQuery');
Route::post('DocumentQuery', 'QueriesController@DocumentQuery');








//Utilities

Route::get('utilitiesMenu', function(){
	return View::make('utilitiesMenu.utilities_menu');
});

// Route::get('auditTrail', function(){
// 	return View::make('utilities.auditTrail');
// });
Route::get('auditTrail', 'UtilitiesAuditTrailController@showRecords');


Route::get('customAdminPage', function(){
	return View::make('utilities.customAdminPage');
});

Route::get('customWebPage', function(){
	return View::make('utilities.customWebPage');
});

// Utilities Brgy Details

Route::get('bryDetails', 'UtilitiesBrgyDetailsController@showRecords');
Route::post('updateLogo', 'UtilitiesBrgyDetailsController@updateLogos');
Route::post('updateDetail', 'UtilitiesBrgyDetailsController@updateDetails');
Route::post('addStreet', 'UtilitiesBrgyDetailsController@addStreet');
Route::post('deleteStreet', 'UtilitiesBrgyDetailsController@deleteStreet');
Route::post('addSubdivision', 'UtilitiesBrgyDetailsController@addSubdivision');
Route::post('deleteSubdivision', 'UtilitiesBrgyDetailsController@deleteSubdivision');
Route::post('addComp', 'UtilitiesBrgyDetailsController@addComp');
Route::post('deleteComp', 'UtilitiesBrgyDetailsController@deleteComp');
Route::post('updateUAdd', 'UtilitiesBrgyDetailsController@updateUAdd');
Route::post('getCheck', 'UtilitiesBrgyDetailsController@getCheck');

//Utilities Accounts
Route::get('account','UtilitiesAccountsController@showRecords');

//Utilities User Privileges
Route::get('userprivilege', 'UtilitiesUserPrivilegesController@showRecords');
Route::post('getUPInfo', 'UtilitiesUserPrivilegesController@getUPInfo');
Route::post('updateUP', 'UtilitiesUserPrivilegesController@updateUP');


Route::get('reports', 'ReportsController@index');
Route::get('ReqPerRegDoc', 'ReportsController@ReqPerRegDoc');
Route::post('docPerDateRange', 'ReportsController@docPerDateRange');
Route::post('getReport1', 'ReportsController@getReport1');


///businesss

Route::get('ReqPerBusDoc', 'ReportsController@ReqPerBusDoc');
Route::post('BusDocPerDateRange', 'ReportsController@BusDocPerDateRange');
Route::post('getReport2', 'ReportsController@getReport2');


//reg doc payment


Route::get('RegDocPayment', 'ReportsController@RegDocPayment');

Route::post('getReport3', 'ReportsController@getReport3');
//bus doc payment


Route::get('BusDocPayment', 'ReportsController@BusDocPayment');

Route::post('getReport4', 'ReportsController@getReport4');

//reservation report

Route::get('ReservationPayment', 'ReportsController@ReservationPayment');
Route::post('getReport5', 'ReportsController@getReport5');


///businesss
Route::get('ReservationItem', 'ReportsController@ReservationItem');
Route::post('ReserveDateItem', 'ReportsController@ReserveDateItem');
Route::post('getReport6', 'ReportsController@getReport6');

///businesss
Route::get('ReservationFacility', 'ReportsController@ReservationFacility');
Route::post('ReserveDateFacility', 'ReportsController@ReserveDateFacility');
Route::post('getReport7', 'ReportsController@getReport7');