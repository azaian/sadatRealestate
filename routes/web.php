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

Route::get('/', 'SiteControllers\HomeController@index')->name('homePage');
Route::get('/realestate/{id}', 'SiteControllers\PagesController@showRealEstate')->name('realEstate');
Route::post('/listing', 'SiteControllers\PagesController@searchResult')->name('listing');
Route::get('/listing', 'SiteControllers\HomeController@index');
Route::get('/listing/{cat_id}/{type?}/', 'SiteControllers\PagesController@searchResult')->name('getlinting');
Route::get('/addrealestate', 'SiteControllers\PagesController@addrealestate')->name('addrealestate');
Route::post('/storerealestate', 'SiteControllers\PagesController@storerealestate')->name('storerealestate');

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('admin.logout');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contactus', 'SiteControllers\Contactuscontroller@index')->name('getcontactuspage');
Route::post('/postnewmessage', 'SiteControllers\Contactuscontroller@sendnewmessage')->name('sendnewpost');
Route::get('/aboutus', 'SiteControllers\Aboutuscontroller@index')->name('getaboutuspage');

Route::get('/getadvicespage', 'SiteControllers\Advicecontroller@GetAllAdvicesPage')->name('getadvicespage');
Route::get('/getadvicespage', 'SiteControllers\Advicecontroller@GetAllAdvicesPage')->name('getadvicespage');
Route::get('/getadvicepage/{advice_id}', 'SiteControllers\Advicecontroller@GetOneAdvicePage')->name('getadvicepage');
Route::get('/getnewspage', 'SiteControllers\Newscontroller@GetAllNewsPage')->name('getnewspage');
Route::get('/getnewpage/{new_id}', 'SiteControllers\Newscontroller@GetOneNewePage')->name('getnewpage');
Route::get('/filterprojectsbyprojectcategory_id/{projectcategory_id}', 'SiteControllers\ProjectController@index')->name('filterprojectsbyprojectcategory_id');
Route::get('/getprojectpage/{project_id}', 'SiteControllers\ProjectController@GetProjectPage')->name('getprojectpage');



Route::group(['prefix' => 'admin','middleware' => 'auth'], function () {
    Route::get('/', 'CpanelControllers\Homepagecontroller@index')->name('adminhome');
    Route::resource('/slider', 'CpanelControllers\Slidercontroller');
    Route::get('/slider/changeactivationstatus/{slide_id}', 'CpanelControllers\Slidercontroller@changeactivationstatus')->name('slider.changeactivationstatus');
    Route::get('/slider/delete/{slide_id}', 'CpanelControllers\Slidercontroller@delete')->name('slider.delete');

    Route::resource('/project', 'CpanelControllers\ProjectController');
    Route::get('/project/changeactivationstatus/{project_id}', 'CpanelControllers\ProjectController@changeactivationstatus')->name('project.changeactivationstatus');
    Route::get('/project/delete/{project_id}', 'CpanelControllers\ProjectController@delete')->name('project.delete');

    Route::resource('/projectcategory', 'CpanelControllers\ProjectcategoryController');
    Route::get('/projectcategory/changeactivationstatus/{projectcategory_id}', 'CpanelControllers\ProjectcategoryController@changeactivationstatus')->name('projectcategory.changeactivationstatus');
    Route::get('/projectcategory/delete/{projectcategory_id}', 'CpanelControllers\ProjectcategoryController@delete')->name('projectcategory.delete');

    Route::resource('/new', 'CpanelControllers\NewsController');
    Route::get('/new/changeactivationstatus/{new_id}', 'CpanelControllers\NewsController@changeactivationstatus')->name('new.changeactivationstatus');
    Route::get('/new/delete/{new_id}', 'CpanelControllers\NewsController@delete')->name('new.delete');

    Route::resource('/advice', 'CpanelControllers\AdviceController');
    Route::get('/advice/changeactivationstatus/{new_id}', 'CpanelControllers\AdviceController@changeactivationstatus')->name('advice.changeactivationstatus');
    Route::get('/advice/delete/{new_id}', 'CpanelControllers\AdviceController@delete')->name('advice.delete');

    Route::resource('/contactus', 'CpanelControllers\Contactuscontroller');
    Route::get('/contactus/delete/{message_id}', 'CpanelControllers\Contactuscontroller@delete')->name('contactus.delete');


    Route::resource('/mainsettings', 'CpanelControllers\Mainsettingscontroller');


    Route::resource('/aboutus', 'CpanelControllers\Aboutuscontroller');
    Route::get('/aboutus/delete/{id}', 'CpanelControllers\Aboutuscontroller@delete')->name('aboutus.delete');

    // my code
    Route::resource('/realestatecategory', 'CpanelControllers\RealestatecategoryController');

    Route::get('/realstatecategory/changeactivationstatus/{realstatscategory_id}', 'CpanelControllers\RealestatecategoryController@changeactivationstatus')->name('realestatecategory.changeactivationstatus');
    Route::get('/realstatecategory/delete/{realstatscategory_id}', 'CpanelControllers\RealestatecategoryController@delete')->name('realestatecategory.delete');
    //
    Route::resource('/categoryfeilds', 'CpanelControllers\categoryFeildsController');

    Route::resource('/realestates', 'CpanelControllers\realestateController');
    Route::get('/realestates/changeFlagStatus/{id}/{actionon}', 'CpanelControllers\realestateController@changeFlagStatus')->name("realestates.changeFlagStatus");

    Route::resource('/districts', 'CpanelControllers\DistrictsController');

    Route::resource('/recyclebin', 'CpanelControllers\RecycleBinController');
    Route::resource('/testinomial', 'CpanelControllers\testinomialController');
});
    Route::resource('/admins', 'CpanelControllers\Admincontroller')->middleware('checkpriv');


Route::post('/Ajax_get_districts_fields', 'CpanelControllers\RealestateController@Ajax_get_districts_fields')->name('Ajax_get_districts_fields');
Route::post('/Ajax_get_districts_fields_site', 'SiteControllers\PagesController@Ajax_get_districts_fields_site')->name('Ajax_get_districts_fields_site');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
