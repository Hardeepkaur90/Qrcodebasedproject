<?php

use App\Http\Controllers\menuController;
use App\Http\Controllers\paymentController;
use App\Http\Livewire\Addcategory;
use App\Http\Livewire\Additem;
use App\Http\Livewire\ExampleLaravel\Addemp;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Billing;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\ExampleLaravel\UserManagement;
use App\Http\Livewire\ExampleLaravel\UserProfile;
use App\Http\Livewire\Notifications;
use App\Http\Livewire\Profile;
use App\Http\Livewire\RTL;
use App\Http\Livewire\StaticSignIn;
use App\Http\Livewire\StaticSignUp;
use App\Http\Livewire\Tables;
use App\Http\Livewire\Managerole;
use App\Http\Livewire\Addrole;
use App\Http\Livewire\Displaymenu;
use App\Http\Livewire\Editcategory;
use App\Http\Livewire\editchef;
use App\Http\Livewire\Edititem;
use App\Http\Livewire\Edittable;
use App\Http\Livewire\Edituser;
use App\Http\Livewire\Managecategory;
use App\Http\Livewire\Manageitem;
use App\Http\Livewire\chefmanagement;
use App\Http\Livewire\Addchef;
use App\Http\Livewire\Editorder;
use App\Http\Livewire\Managemenu;
use App\Http\Livewire\Managetable;
use App\Http\Livewire\Manageuser;
use App\Http\Livewire\OrderManagement;
use App\Http\Livewire\Tabledata;
use App\Http\Livewire\VirtualReality;
use GuzzleHttp\Middleware;


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

Route::get('/dispalymenu/{id?}/{catid?}', [menuController::class,'index'])->name('main-menu');
Route::post('/add-to-cart', [menuController::class,'addtocart']);
Route::get('my-cart/{id}', [menuController::class,'mycart']);
Route::post('/remove-item',[menuController::class,'removeitem']);
Route::post('/change-qty',[menuController::class,'changeqty']);
Route::post('search',[menuController::class,'searchinAdd'])->name('search');

//paypal routes
// Route::get('/payment',[paymentController::class,'index']);
Route::post('/charge',[paymentController::class,'charge']);
Route::get('/success',[paymentController::class,'success']);
Route::get('/error',[paymentController::class,'error']);

// Route::get('/search-item',[menuController::class,'searchinMe'])->name('search-item');



// livewire front end components starts
// Route::get('display-menu', Displaymenu::class);
// livewire front end components ends

Route::get('/editorder',[Editorder::class,'editorder']);
// payment routes starts
Route::get('/checkout-initiate', [menuController::class,'checkout']);
// payment routes starts


Route::get('/', function () {
    return redirect('sign-in');
});

Route::get('forgot-password', ForgotPassword::class)->middleware('guest')->name('password.forgot');
Route::get('reset-password/{id}', ResetPassword::class)->middleware('signed')->name('reset-password');



Route::get('sign-up', Register::class)->middleware('guest','cors')->name('register');
Route::get('sign-in', Login::class)->middleware('guest','cors')->name('login');

Route::get('user-profile', UserProfile::class)->middleware('auth')->name('user-profile');
Route::get('user-management', Addemp::class)->middleware('auth')->name('user-management');


Route::get('chef-management', Chefmanagement::class)->middleware('auth')->name('chefmanagement');
Route::get('add-chef', Addchef::class)->middleware('auth')->name('addchef');

Route::get('order-management',OrderManagement::class)->name('ordermanagement');

Route::get('table', Tabledata::class)->middleware('auth')->name('table');
Route::get('manage-table', Managetable::class)->middleware('auth')->name('managetable');
Route::get('edit-table/{id}',Edittable::class)->middleware('auth')->name('edittable');


Route::get('managemenu', Managemenu::class)->middleware('auth')->name('managemenu');


Route::group(['middleware' => 'admin','cors'], function () {
    Route::get('adduser', Addemp::class)->middleware('auth')->name('adduser');
    Route::get('manageuser', Manageuser::class)->middleware('auth')->name('manageuser');
    Route::get('managerole', Managerole::class)->middleware('auth')->name('managerole');
    Route::get('addrole', Addrole::class)->middleware('auth')->name('addrole');
    Route::get('manage-category', Managecategory::class)->middleware('auth')->name('managecategory');
    Route::get('add-category', Addcategory::class)->middleware('auth')->name('addcategory');
    Route::get('edit-category/{id}',Editcategory::class)->middleware('auth')->name('editcategory');
   
});

Route::get('edit-chef-info/{id}',editchef::class)->middleware('auth')->name('edit-chef-info');

Route::get('additem', Additem::class)->middleware('auth')->name('additem');
Route::get('manageitem', Manageitem::class)->middleware('auth')->name('manageitem');
Route::get('edititem/{id}', Edititem::class)->middleware('auth')->name('edititem');


Route::get('edit-user/{id}', Edituser::class)->middleware('auth')->name('edituser');




Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get('billing', Billing::class)->name('billing');
    Route::get('profile', Profile::class)->name('profile');
    Route::get('tables', Tables::class)->name('tables');
    Route::get('notifications', Notifications::class)->name("notifications");
    Route::get('virtual-reality', VirtualReality::class)->name('virtual-reality');
    Route::get('static-sign-in', StaticSignIn::class)->name('static-sign-in');
    Route::get('static-sign-up', StaticSignUp::class)->name('static-sign-up');
    Route::get('rtl', RTL::class)->name('rtl');
});

