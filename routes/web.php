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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('manage')->middleware('auth')->group(function(){
	
	Route::get('/', 'HomeController@dashboard')->name('dashboard');

	Route::resource('/types', 'Web\Manage\TypeController');
	Route::resource('/preferences', 'Web\Manage\PreferenceController');
	Route::resource('/customers', 'Web\Manage\CustomerController');
	Route::get('/customers/type/{type}', 'Web\Manage\CustomerController@list')->name('customers.type');
	
	Route::resource('/users', 'Web\Manage\UserController');
	Route::resource('/items', 'Web\Manage\ItemController');
	Route::resource('/expenses', 'Web\Manage\ExpenseController');
	Route::resource('/transactions', 'Web\Manage\TransactionController', array('except' => array('create')));
	Route::get('/transactions/create/{id?}', 'Web\Manage\TransactionController@create')->name('transactions.create');
	Route::put('/transactions/delivery/{id}', 'Web\Manage\TransactionController@updateDelivery')->name('transactions.update_delivery');
	Route::get('/transactions/reciept/{id}', 'Web\Manage\TransactionController@reciept')->name('transactions.reciept');
	Route::get('/customerTransactions/{id}', 'Web\Manage\CustomerController@customerTransactions')->name('customer.transactions');

	Route::get('/debts', 'Web\Manage\ReportsController@debts')->name('reports.debt');
	Route::get('/today', 'Web\Manage\ReportsController@todayDelivery')->name('reports.today');
	Route::get('/pending', 'Web\Manage\ReportsController@pendingDelivery')->name('reports.pending');
	Route::get('/overdue', 'Web\Manage\ReportsController@overdueDelivery')->name('reports.overdue');
	Route::get('/highestspend', 'Web\Manage\ReportsController@highestSpender')->name('reports.highspend');
	Route::get('/birthday', 'Web\Manage\ReportsController@monthBirthday')->name('reports.birthday');

	Route::put('/reset_password', 'Web\Manage\UserController@reset')->name('reset_password');


	Route::post('/preferences_value', 'Web\Manage\PreferenceController@preferences_value')->name('preferences_value');
	Route::post('/add_client_preference', 'Web\Manage\CustomerController@add_client_preference')->name('add_client_preference');


});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/customers/search', 'Web\Manage\CustomerController@searchCustomer');
Route::get('/items/getByCategory/{category_id}/{service_type}', 'Web\Manage\ItemController@getItemByCategory');
Route::get('/items/getById/{id}', 'Web\Manage\ItemController@getById');
Route::post('/transactions/new', 'Web\Manage\TransactionController@newTransaction');

Route::get('/transactions/transactionData', 'Web\Manage\TransactionController@transactionData');
Route::get('/expenses/expenditureData', 'Web\Manage\ExpenseController@expenditureData');