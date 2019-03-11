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

Route::get('/',['as' => 'index', 'uses' => 'frontend\PagesController@getOfferedModels']);
Route::get('/offered-models',['as' => 'models', 'uses' => 'frontend\PagesController@getOfferedModels']);
Route::get('changeLanguage', ['as' => 'change_language', 'uses' => 'frontend\PagesController@changeLanguage']);

//configurations
Route::get('/configurations/create', ['as' => 'configuration_model_create', 'uses' => 'frontend\ConfigurationsController@createModel']);
Route::post('configurations/model/store',['as' => 'configuration_model_store', 'uses' => 'frontend\ConfigurationsController@storeModel']);
Route::get('/configurations/type', ['as' => 'configuration_type_create', 'uses' => 'frontend\ConfigurationsController@createType']);
Route::post('configurations/type/store',['as' => 'configuration_type_store', 'uses' => 'frontend\ConfigurationsController@storeType']);
Route::get('configurations/dimensions',['as' => 'configuration_dimensions_create', 'uses' => 'frontend\ConfigurationsController@createDimensions']);
Route::post('configurations/dimensions/store',['as' => 'configuration_dimensions_store', 'uses' => 'frontend\ConfigurationsController@storeDimensions']);

Route::get('/configuration-{id}', ['as' => 'created_configuration', 'uses' => 'frontend\ConfigurationsController@createdConfiguration']);
Route::get('/configurationDetails-{id}', ['as' => 'configuration_details', 'uses' => 'frontend\ConfigurationsController@configurationDetails']);
Route::post('/updateConfiguration/{id}', ['as' => 'updateConfiguration', 'uses' => 'frontend\ConfigurationsController@updateConfiguration']);
Route::post('/addToCart/{id}', ['as' => 'add_to_cart', 'uses' => 'frontend\ConfigurationsController@addToCart']);
Route::get('/cart-review', ['as' => 'cartReview', 'uses' => 'frontend\ConfigurationsController@cartReview']);
Route::post('/updateCart/{rowids}',['as' => 'updateCart', 'uses' => 'frontend\ConfigurationsController@updateCart']);
Route::get('/removeFromCart{id}', ['as' => 'removeFromCart', 'uses' => 'frontend\ConfigurationsController@removeFromCart']);
Route::get('/checkout', ['as' => 'checkout', 'uses' => 'frontend\ConfigurationsController@checkout']);
Route::post('/billing', ['as' => 'billing', 'uses' => 'frontend\CheckoutController@billing']);
Route::get('/conditions', ['as' => 'conditions', 'uses' => 'frontend\CheckoutController@conditions']);
Route::get('/shopping-result/{ids}', ['as' => 'shoppingResult', 'uses' => 'frontend\CheckoutController@shoppingResult']);

//classicConfig
Route::get('configurations/c/filing', ['as' => 'classic_config_filing_create', 'uses' => 'frontend\ClassicConfigurationsController@createFiling']);
Route::post('configurations/c/filing/store', ['as' => 'classic_config_filing_store', 'uses' => 'frontend\ClassicConfigurationsController@storeFiling']);
Route::get('configurations/c/treatment', ['as' => 'classic_config_treatment_create', 'uses' => 'frontend\ClassicConfigurationsController@createTreatment']);
Route::post('configurations/c/treatment/store', ['as' => 'classic_config_treatment_store', 'uses' => 'frontend\ClassicConfigurationsController@storeTreatment']);
Route::get('configurations/c/kanelura', ['as' => 'classic_config_kanelura_create', 'uses' => 'frontend\ClassicConfigurationsController@createKanelura']);
Route::post('configurations/c/kanelura/store', ['as' => 'classic_config_kanelura_store', 'uses' => 'frontend\ClassicConfigurationsController@storeKanelura']);
Route::get('configurations/c/pervajz', ['as' => 'classic_config_pervajz_create', 'uses' => 'frontend\ClassicConfigurationsController@createPervajz']);
Route::post('configurations/c/pervajz/store', ['as' => 'classic_config_pervajz_store', 'uses' => 'frontend\ClassicConfigurationsController@storePervajz']);
Route::get('configurations/c/hinges', ['as' => 'classic_config_hinges_create', 'uses' => 'frontend\ClassicConfigurationsController@createHinges']);
Route::post('configurations/c/hinges/store', ['as' => 'classic_config_hinges_store', 'uses' => 'frontend\ClassicConfigurationsController@storeHinges']);
Route::get('configurations/c/doorstep', ['as' => 'classic_config_doorstep_create', 'uses' => 'frontend\ClassicConfigurationsController@createDoorstep']);
Route::post('configurations/c/doorstep/store', ['as' => 'classic_config_doorstep_store', 'uses' => 'frontend\ClassicConfigurationsController@storeDoorstep']);
Route::get('configurations/c/doorlock_kind', ['as' => 'classic_config_doorlock_kind_create', 'uses' => 'frontend\ClassicConfigurationsController@createDoorlockKind']);
Route::post('configurations/c/doorlock_kind/store', ['as' => 'classic_config_doorlock_kind_store', 'uses' => 'frontend\ClassicConfigurationsController@storeDoorlockKind']);
Route::get('configurations/c/doorlock_type', ['as' => 'classic_config_doorlock_type_create', 'uses' => 'frontend\ClassicConfigurationsController@createDoorlockType']);
Route::post('configurations/c/doorlock_type/store', ['as' => 'classic_config_doorlock_type_store', 'uses' => 'frontend\ClassicConfigurationsController@storeDoorlockType']);
Route::get('configurations/c/door_handle', ['as' => 'classic_config_door_handle_create', 'uses' => 'frontend\ClassicConfigurationsController@createDoorHandle']);
Route::post('configurations/c/door_handle/store', ['as' => 'classic_config_door_handle_store', 'uses' => 'frontend\ClassicConfigurationsController@storeDoorHandle']);
Route::get('configurations/c/opening_way', ['as' => 'classic_config_opening_way_create', 'uses' => 'frontend\ClassicConfigurationsController@createOpeningWay']);
Route::post('configurations/c/opening_way/store', ['as' => 'classic_config_opening_way_store', 'uses' => 'frontend\ClassicConfigurationsController@storeOpeningWay']);
Route::get('configurations/c/ventilation_grid', ['as' => 'classic_config_ventilation_grid_create', 'uses' => 'frontend\ClassicConfigurationsController@createVentilationGrid']);
Route::post('configurations/c/ventilation_grid/store', ['as' => 'classic_config_ventilation_grid_store', 'uses' => 'frontend\ClassicConfigurationsController@storeVentilationGrid']);
Route::get('configurations/c/stopper', ['as' => 'classic_config_stopper_create', 'uses' => 'frontend\ClassicConfigurationsController@createStopper']);
Route::post('configurations/c/stopper/store', ['as' => 'classic_config_stopper_store', 'uses' => 'frontend\ClassicConfigurationsController@storeStopper']);

//ambarConfig
Route::get('configurations/a/filing', ['as' => 'ambar_config_filing_create', 'uses' => 'frontend\AmbarConfigurationsController@createFiling']);
Route::post('configurations/a/filing/store', ['as' => 'ambar_config_filing_store', 'uses' => 'frontend\AmbarConfigurationsController@storeFiling']);
Route::get('configurations/a/treatment', ['as' => 'ambar_config_treatment_create', 'uses' => 'frontend\AmbarConfigurationsController@createTreatment']);
Route::post('configurations/a/treatment/store', ['as' => 'ambar_config_treatment_store', 'uses' => 'frontend\AmbarConfigurationsController@storeTreatment']);
Route::get('configurations/a/kanelura', ['as' => 'ambar_config_kanelura_create', 'uses' => 'frontend\AmbarConfigurationsController@createKanelura']);
Route::post('configurations/a/kanelura/store', ['as' => 'ambar_config_kanelura_store', 'uses' => 'frontend\AmbarConfigurationsController@storeKanelura']);
Route::get('configurations/a/kanelura', ['as' => 'ambar_config_kanelura_create', 'uses' => 'frontend\AmbarConfigurationsController@createKanelura']);
Route::post('configurations/a/kanelura/store', ['as' => 'ambar_config_kanelura_store', 'uses' => 'frontend\AmbarConfigurationsController@storeKanelura']);
Route::get('configurations/a/doorlock_kind', ['as' => 'ambar_config_doorlock_kind_create', 'uses' => 'frontend\AmbarConfigurationsController@createDoorlockKind']);
Route::post('configurations/a/doorlock_kind/store', ['as' => 'ambar_config_doorlock_kind_store', 'uses' => 'frontend\AmbarConfigurationsController@storeDoorlockKind']);
Route::get('configurations/a/track', ['as' => 'ambar_config_track_create', 'uses' => 'frontend\AmbarConfigurationsController@createTrack']);
Route::post('configurations/a/track/store', ['as' => 'ambar_config_track_store', 'uses' => 'frontend\AmbarConfigurationsController@storeTrack']);

Auth::routes();

//user Profile
Route::get('/profile', ['as' => 'profile', 'uses' => 'backend\ProfilesController@show']);
Route::post('/updateprofile', ['as' => 'updateprofile', 'uses' => 'backend\ProfilesController@updateprofile']);
Route::post('/updatepassword', ['as' => 'updatepassword', 'uses' => 'backend\ProfilesController@updatepassword']);

// orders
Route::resource('orders', 'backend\OrderController');

//order_items
Route::resource('order_items', 'backend\OrderItemController');
// generate bills
Route::get('/export_excel', 'backend\OrderController@export_excel')->name('Export_excel');
Route::get('/export_word', 'backend\OrderController@export_word')->name('Export_word');
Route::get('/export_pdf/{id}', 'backend\OrderController@export_pdf')->name('Export_pdf');

// statistics
Route::resource('statistics', 'backend\StatisticController');

