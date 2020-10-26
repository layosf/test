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
Auth::routes();

Route::get('/admin', function(){
    return 'you are admin';
})->middleware(['auth', 'auth.admin']);

Route::get('/','MenuController@dashboard');
Route::get('/home', 'MenuController@dashboard')->name('home');
Route::get('/getlanguage/{id}', 'LanguageController@index')->name('language.index');

Route::prefix('master')->name('master.')->middleware(['auth', 'auth.admin'])->group(function(){
    //suplier
    Route::get('/supplier', 'SupplierController@index')->name('supplier');
    Route::post('/supplier/store', 'SupplierController@store')->name('supplier.store');
    Route::get('/supplier/edit/{id}', 'SupplierController@edit')->name('supplier.edit');
    Route::post('/supplier/update/{id}', 'SupplierController@update')->name('supplier.update');
    Route::get('/supplier/delete/{id}', 'SupplierController@destroy')->name('supplier.delete');
    Route::get('/supplier/get_province/{id}', 'SupplierController@get_province');
    Route::get('/supplier/get_city/{id}', 'SupplierController@get_city');
    Route::get('/supplier/list', 'SupplierController@list')->name('supplier.list');

    //species
    Route::get('/species', 'SpeciesController@index')->name('species');
    Route::get('/species/list', 'SpeciesController@list')->name('species.list');
    Route::post('/species/store', 'SpeciesController@store')->name('species.store');
    Route::get('/species/edit/{id}', 'SpeciesController@edit')->name('species.edit');
    Route::post('/species/update/{id}', 'SpeciesController@update')->name('species.update');
    Route::get('/species/delete/{id}', 'SpeciesController@destroy')->name('species.delete');

    //productionline
    Route::get('/productionline', 'ProductionlineController@index')->name('productionline');
    Route::get('/productionline/list', 'ProductionlineController@list')->name('productionline.list');
    Route::post('/productionline/store', 'ProductionlineController@store')->name('productionline.store');
    Route::get('/productionline/edit/{id}', 'ProductionlineController@edit')->name('productionline.edit');
    Route::post('/productionline/update/{id}', 'ProductionlineController@update')->name('productionline.update');
    Route::get('/productionline/delete/{id}', 'ProductionlineController@destroy')->name('productionline.delete');

    //buyer
    Route::get('/buyer', 'BuyerController@index')->name('buyer');
    Route::get('/buyer/list', 'BuyerController@list')->name('buyer.list');
    Route::post('/buyer/store', 'BuyerController@store')->name('buyer.store');
    Route::get('/buyer/edit/{id}', 'BuyerController@edit')->name('buyer.edit');
    Route::post('/buyer/update/{id}', 'BuyerController@update')->name('buyer.update');
    Route::get('/buyer/delete/{id}', 'BuyerController@destroy')->name('buyer.delete');

    //bank
    Route::get('/bank', 'BankController@index')->name('bank');
    
    //bankaccount
    Route::get('/bankaccount', 'BankAccountController@index')->name('bankaccount');

    //category
    Route::get('/category', 'CategoryController@list')->name('category');
    Route::post('/category/store', 'CategoryController@store')->name('category.store');

    //grade
    Route::get('/grade', 'GradeController@index')->name('grade');
    Route::post('/grade/store', 'GradeController@store')->name('grade.store');
    Route::get('/grade/delete/{id}', 'GradeController@destroy')->name('grade.delete');
    Route::get('/grade/edit/{id}', 'GradeController@edit')->name('grade.edit');
    Route::post('/grade/update/{id}', 'GradeController@update')->name('grade.update');
});

//PO
Route::prefix('po')->name('po.')->group(function(){
    Route::get('/', 'POcontroller@index')->name('index');
    Route::get('/list', 'POcontroller@list')->name('list');
    Route::post('/store', 'POcontroller@general_store')->name('general.store');
});
