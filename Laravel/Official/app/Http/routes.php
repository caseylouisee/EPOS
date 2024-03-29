<?php
use App\Equipment;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {  
    return view('welcome');
});

Route::get('/home', function(){    
    return view('pages.home');
}); 

// customers
Route::model('customers', 'Customer');
Route::resource('customers', 'Customer\CustomerController', ['only'=> ['index','create','store']]);
Route::get('customersearch', array('as' => 'customers.search', 'uses' => 'Customer\CustomerController@search'));
Route::get('customers/{id}/edit', 'Customer\CustomerController@edit');
Route::delete('customers/{id}', 'Customer\CustomerController@destroy');
Route::patch('customers/{id}/update', array('as' => 'customers.update', 'uses' =>'Customer\CustomerController@update'));
Route::get('customers/{id}', 'Customer\CustomerController@show');

// contracts
Route::model('contracts', 'Contract');
Route::resource('contracts', 'Contract\ContractController', ['only'=> ['index','create','store']]);
Route::get('contracts/{id}/edit', 'Contract\ContractController@edit');
Route::delete('contracts/{id}', 'Contract\ContractController@destroy');
Route::patch('contracts/{id}/update', array('as' => 'contracts.update', 'uses' =>'Contract\ContractController@update'));
Route::get('contracts/{id}', 'Contract\ContractController@show');

// manufacturers
Route::model('manufacturers', 'Manufacturer');
Route::resource('manufacturers', 'Manufacturer\ManufacturerController', ['only'=> ['index','create','store']]);
Route::get('manufacturersearch', array('as' => 'manufacturers.search', 'uses' => 'Manufacturer\ManufacturerController@search'));
Route::get('manufacturers/{id}/edit', 'Manufacturer\ManufacturerController@edit');
Route::delete('manufacturers/{id}', 'Manufacturer\ManufacturerController@destroy');
Route::patch('manufacturers/{id}/update', array('as' => 'manufacturers.update', 'uses' =>'Manufacturer\ManufacturerController@update'));
Route::get('manufacturers/{id}', 'Manufacturer\ManufacturerController@show');

// equipments
Route::model('equipments', 'equipment');
Route::resource('equipments', 'Equipment\EquipmentController', ['only'=> ['index','create','store']]);

Route::get('equipmentsearch', array('as' => 'equipments.search', 'uses' => 'Equipment\EquipmentController@search'));
Route::get('equipmentfilter', array('as' => 'equipments.filter', 'uses' => 'Equipment\EquipmentController@filter'));
Route::get('equipmentmanufacturerwarranty', array('as' => 'equipments.manufacturerwarranty', 'uses' => 'Equipment\EquipmentController@manufacturerwarranty'));
Route::get('equipmentinternalwarranty', array('as' => 'equipments.internalwarranty', 'uses' => 'Equipment\EquipmentController@internalwarranty'));
Route::get('equipmentaddedinthelastweek', array('as' => 'equipments.addedinthelastweek', 'uses' => 'Equipment\EquipmentController@addedinthelastweek'));

Route::get('equipments/{id}/edit', 'Equipment\EquipmentController@edit');
Route::delete('equipments/{id}', 'Equipment\EquipmentController@destroy');
Route::patch('equipments/{id}/update', array('as' => 'equipments.update', 'uses' =>'Equipment\EquipmentController@update'));
Route::get('equipments/{id}', 'Equipment\EquipmentController@show');

//PDF Downloads
Route::controller('downloads', 'Download\DownloadController');
//Equipments
Route::get('downloadEquipments', array('as'=>'downloads.equipments', 'uses'=>'Download\DownloadController@equipments'));
Route::get('/downloadEquipmentInternalWarrantyExpired', array('as'=>'downloads.equipmentInternalWarrantyExpired', 'uses'=>'Download\DownloadController@equipmentInternalWarrantyExpired'));
Route::get('/downloadEquipmentInternalWarrantyExpiringThisWeek', array('as'=>'downloads.equipmentInternalWarrantyExpiringThisWeek', 'uses'=>'Download\DownloadController@equipmentInternalWarrantyExpiringThisWeek'));
//Contracts
Route::get('downloadContracts', array('as'=>'downloads.contracts', 'uses'=>'Download\DownloadController@contracts'));
Route::get('downloadContractsExpired', array('as'=>'downloads.contractsExpired', 'uses'=>'Download\DownloadController@contractsExpired'));
Route::get('downloadContractsExpiringThisWeek', array('as'=>'downloads.contractsExpiringThisWeek', 'uses'=>'Download\DownloadController@contractsExpiringThisWeek'));


