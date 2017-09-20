<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

// Contarct
Route::get('contracts', 'ContractController@index');
Route::get('contract/create', 'ContractController@create');
Route::post('contract/create', 'ContractController@store');
Route::get('contract/edit/{contract_id}', 'ContractController@edit');
Route::post('contract/edit/{contract_id}', 'ContractController@update');
Route::get('contract/delete/{contract_id}', 'ContractController@delete');
Route::get('contract/detail/{contract_id}', 'ContractController@detail');
Route::get('contract/data', 'ContractController@data');
Route::get('contract/ajaxgetbuyerdetails', 'ContractController@ajaxgetbuyerdetails');

// Company Details
Route::get('companys','Data\CompanyController@index');
Route::get('company/create','Data\CompanyController@create');
Route::post('company/create','Data\CompanyController@store');
Route::get('company/edit/{company_id}','Data\CompanyController@edit');
Route::post('company/edit/{company_id}','Data\CompanyController@update');
Route::get('company/delete/{company_id}','Data\CompanyController@update');
Route::get('company/data','Data\CompanyController@data');

// Bank Details
Route::get('banks','Data\BankController@index');
Route::get('bank/create','Data\BankController@create');
Route::post('bank/create','Data\BankController@store');
Route::get('bank/edit/{bank_id}','Data\BankController@edit');
Route::post('bank/edit/{bank_id}','Data\BankController@update');
Route::get('bank/delete/{bank_id}','Data\BankController@delete');
Route::get('bank/data','Data\BankController@data');

// Buyer Details
Route::get('buyers','Data\BuyerController@index');
Route::get('buyer/create','Data\BuyerController@create');
Route::post('buyer/create','Data\BuyerController@store');
Route::get('buyer/edit/{buyer_id}','Data\BuyerController@edit');
Route::post('buyer/edit/{buyer_id}','Data\BuyerController@update');
Route::get('buyer/delete/{buyer_id}','Data\BuyerController@delete');
Route::get('buyer/data','Data\BuyerController@data');

// Countries
Route::get('countries','Data\CountrieController@index');
Route::get('countrie/create','Data\CountrieController@create');
Route::post('countrie/create','Data\CountrieController@store');
Route::get('countrie/edit/{countrie_id}','Data\CountrieController@edit');
Route::post('countrie/edit/{countrie_id}','Data\CountrieController@update');
Route::get('countrie/delete/{countrie_id}','Data\CountrieController@delete');
Route::get('countrie/data','Data\CountrieController@data');

// Delivery Terms
Route::get('deliveryterms','Data\DeliveryTermController@index');
Route::get('deliveryterm/create','Data\DeliveryTermController@create');
Route::post('deliveryterm/create','Data\DeliveryTermController@store');
Route::get('deliveryterm/edit/{deliveryterm_id}','Data\DeliveryTermController@edit');
Route::post('deliveryterm/edit/{deliveryterm_id}','Data\DeliveryTermController@update');
Route::get('deliveryterm/delete/{deliveryterm_id}','Data\DeliveryTermController@delete');
Route::get('deliveryterm/data','Data\DeliveryTermController@data');

// Discharge Ports
Route::get('dischargeports','Data\DischargePortController@index');
Route::get('dischargeport/create','Data\DischargePortController@create');
Route::post('dischargeport/create','Data\DischargePortController@store');
Route::get('dischargeport/edit/{dischargeport_id}','Data\DischargePortController@edit');
Route::post('dischargeport/edit/{dischargeport_id}','Data\DischargePortController@update');
Route::get('dischargeport/delete/{dischargeport_id}','Data\DischargePortController@delete');
Route::get('dischargeport/data','Data\DischargePortController@data');

// Final Destinations
Route::get('finaldestinations','Data\FinalDestinationController@index');
Route::get('finaldestination/create','Data\FinalDestinationController@create');
Route::post('finaldestination/create','Data\FinalDestinationController@store');
Route::get('finaldestination/edit/{finaldestination_id}','Data\FinalDestinationController@edit');
Route::post('finaldestination/edit/{finaldestination_id}','Data\FinalDestinationController@update');
Route::get('finaldestination/delete/{finaldestination_id}','Data\FinalDestinationController@delete');
Route::get('finaldestination/data','Data\FinalDestinationController@data');

// Packages
Route::get('packages','Data\PackageController@index');
Route::get('package/create','Data\PackageController@create');
Route::post('package/create','Data\PackageController@store');
Route::get('package/edit/{package_id}','Data\PackageController@edit');
Route::post('package/edit/{package_id}','Data\PackageController@update');
Route::get('package/delete/{package_id}','Data\PackageController@delete');
Route::get('package/data','Data\PackageController@data');

// Products
Route::get('products','Data\ProductController@index');
Route::get('product/create','Data\ProductController@create');
Route::post('product/create','Data\ProductController@store');
Route::get('product/edit/{product_id}','Data\ProductController@edit');
Route::post('product/edit/{product_id}','Data\ProductController@update');
Route::get('product/delete/{product_id}','Data\ProductController@delete');
Route::get('product/data','Data\ProductController@data');

// Ports
Route::get('ports','Data\PortController@index');
Route::get('port/create','Data\PortController@create');
Route::post('port/create','Data\PortController@store');
Route::get('port/edit/{port_id}','Data\PortController@edit');
Route::post('port/edit/{port_id}','Data\PortController@update');
Route::get('port/delete/{port_id}','Data\PortController@delete');
Route::get('port/data','Data\PortController@data');

// Delivery Orders
Route::get('deliveryorders','DeliveryOrderController@index');
Route::get('deliveryorder/create','DeliveryOrderController@create');
Route::post('deliveryorder/create','DeliveryOrderController@store');
Route::get('deliveryorder/edit/{deliveryorder_id}','DeliveryOrderController@edit');
Route::post('deliveryorder/edit/{deliveryorder_id}','DeliveryOrderController@update');
Route::get('deliveryorder/delete/{deliveryorder_id}','DeliveryOrderController@delete');
Route::get('deliveryorder/data','DeliveryOrderController@data');

// Forwarder
Route::get('forwarders','Data\ForwarderController@index');
Route::get('forwarder/create','Data\ForwarderController@create');
Route::post('forwarder/create','Data\ForwarderController@store');
Route::get('forwarder/edit/{port_id}','Data\ForwarderController@edit');
Route::post('forwarder/edit/{port_id}','Data\ForwarderController@update');
Route::get('forwarder/delete/{port_id}','Data\ForwarderController@delete');
Route::get('forwarder/data','Data\ForwarderController@data');

// Dollor Exchange
Route::get('dollorexchanges','Data\DollorExchangeController@index');
Route::get('dollorexchange/create','Data\DollorExchangeController@create');
Route::post('dollorexchange/create','Data\DollorExchangeController@store');
Route::get('dollorexchange/edit/{dollor_exchange_id}','Data\DollorExchangeController@edit');
Route::post('dollorexchange/edit/{dollor_exchange_id}','Data\DollorExchangeController@update');
Route::get('dollorexchange/delete/{dollor_exchange_id}','Data\DollorExchangeController@delete');
Route::get('dollorexchange/data','Data\DollorExchangeController@data');

// Surveyors
Route::get('surveyors','Data\SurveyorController@index');
Route::get('surveyor/create','Data\SurveyorController@create');
Route::post('surveyor/create','Data\SurveyorController@store');
Route::get('surveyor/edit/{surveyor_id}','Data\SurveyorController@edit');
Route::post('surveyor/edit/{surveyor_id}','Data\SurveyorController@update');
Route::get('surveyor/delete/{surveyor_id}','Data\SurveyorController@delete');
Route::get('surveyor/data','Data\SurveyorController@data');

// Payment Term
Route::get('paymentterms','Data\PaymentTermController@index');
Route::get('paymentterm/create','Data\PaymentTermController@create');
Route::post('paymentterm/create','Data\PaymentTermController@store');
Route::get('paymentterm/edit/{paymentterm_id}','Data\PaymentTermController@edit');
Route::post('paymentterm/edit/{paymentterm_id}','Data\PaymentTermController@update');
Route::get('paymentterm/delete/{paymentterm_id}','Data\PaymentTermController@delete');
Route::get('paymentterm/data','Data\PaymentTermController@data');