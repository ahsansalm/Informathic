<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SendParcelController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\QuotesController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\ProblemController;
use App\Http\Controllers\ToDoListController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\UserController;

use Illuminate\Foundation\Auth\EmailVerificationRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Str;


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
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified');
Route::get('User/detail/{id}', [HomeController::class, 'userDetail'])->name('userDetail')->middleware('verified');
Route::get('user/disabled/{id}', [HomeController::class, 'userDisabled'])->name('userDisabled')->middleware('verified');




Auth::routes();
Route::get('/', function () {
    return view('auth.login');
});


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');



Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');





// forgot password
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');



Route::post('/forgot-password', function (Request $request) {
    $validateData = $request->validate([
        'email' => 'required',
    ],
    [
        'email.required' => 'Email (requis',
     
    ]);

 
    $status = Password::sendResetLink(
        $request->only('email')
    );
 
    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __("Nous avons envoyé votre lien de réinitialisation de mot de passe par e-mail !")])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');


Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');





Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);
 
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );
 
    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');










// admin login
Route::get('/adminRegister',[ProfileController::class, 'adminLogin'])->name('adminLogin');


// register route
Route::post('/profile',[ProfileController::class, 'profile'])->name('profile');
// admin login form 
Route::post('/adminLoginForm',[ProfileController::class, 'adminLoginForm'])->name('adminLoginForm');


// my profile page
Route::get('/MyProfile',[ProfileController::class, 'MyProfile'])->name('MyProfile');
// profile update
Route::post('/profile/update/{id}',[ProfileController::class, 'ProfileUpdate']);
// profile update
Route::post('/profile/update/password/{id}',[ProfileController::class, 'ProfileUpdatePass']);
// change password page
Route::get('/change/password',[ProfileController::class, 'ChangPas']);




// send a parcel
Route::get('/SendParcel',[SendParcelController::class, 'sendParcel'])->name('SendParcel');
Route::get('/SuccessParcel',[SendParcelController::class, 'successParcel'])->name('successParcel');

// insert parcel
Route::post('/insert/parcel',[SendParcelController::class, 'insert']);

// my devices page
Route::get('/MyDevices',[DeviceController::class, 'myDevices'])->name('myDevices');
// device edit page
Route::get('/Parcel/Detail/{id}',[DeviceController::class, 'EditDevice'])->name('EditDevice');
// device note page
Route::get('/Parcel/Note/{id}',[DeviceController::class, 'NoteParcel'])->name('NoteParcel');
// device delete page
Route::get('/Parcel/Delete/{id}',[DeviceController::class, 'DeleteDevice'])->name('DeleteDevice');


// MyQuotes page
Route::get('/MyQuotes',[QuotesController::class, 'myQuotes'])->name('myQuotes');
// quotes value order now
Route::post('/quotes/value/{id}',[QuotesController::class, 'quotesValue']);




//MySupport page
Route::get('/MySupport',[SupportController::class, 'mySupport'])->name('mySupport');
// support detail
Route::get('/Support/Detail/{id}',[SupportController::class, 'EditSupport'])->name('EditSupport');
// add support
Route::post('/support/add',[SupportController::class, 'AddSupport']);
// add support new
Route::post('/support/add/new',[SupportController::class, 'AddSupportNew']);







//MyOrder Page
Route::get('/MyOrder',[OrderController::class, 'myOrder'])->name('MyOrder');
// user orders
Route::get('/userOrder',[OrderController::class, 'userorder'])->name('userorder')->middleware('userOrder');
// user orders approved
Route::post('/order/approved/{id}',[OrderController::class, 'orderApproved'])->name('orderApproved');
// Approved/order/detail
Route::get('Approved/order/detail/{id}',[OrderController::class, 'ApprovedOrderDetail'])->name('ApprovedOrderDetail');
// approved order note
Route::get('Approved/order/notes/{id}',[OrderController::class, 'ApprovedOrderNotes'])->name('ApprovedOrderNotes');
// add notes
Route::post('/order/notes/{id}',[OrderController::class, 'orderNotes'])->name('orderNotes');

// approved order
Route::get('/ApprovedOrder',[OrderController::class, 'ApprovedOrder'])->name('ApprovedOrder');
// refuse order
Route::post('/order/refuse',[OrderController::class, 'RefuseOrder']);
// recieved order
Route::post('/order/recieved',[OrderController::class, 'recievedOrder']);
// progress order
Route::post('/order/progress',[OrderController::class, 'progressOrder']);
// waiting order
Route::post('/order/waiting',[OrderController::class, 'waitingOrder']);
// repair order
Route::post('/order/repair',[OrderController::class, 'repairOrder']);
// return order
Route::post('/order/return',[OrderController::class, 'returnOrder']);
// quotes order
Route::get('/userQuotes',[OrderController::class, 'userQuotes'])->name('userQuotes')->middleware('userQuotes');
// quotes approved
Route::post('/quotes/approved/{id}',[OrderController::class, 'quotesApproved'])->name('quotesApproved');








// my bill page
Route::get('/MyBill',[BillController::class, 'myBill'])->name('myBill');
// bill edit page
Route::get('/Mybill/Detail/{id}',[BillController::class, 'EditBill'])->name('EditBill');



// user problem page
Route::get('/problem',[ProblemController::class, 'problem'])->middleware('admin');
// problem detail page
Route::get('/problem/Detail/{id}',[ProblemController::class, 'problemDetail'])->name('problemDetail');
// probelm reply 
Route::post('/problem/reply',[ProblemController::class, 'ReplyProb']);



// Notfication page
Route::get('/notification',[NotificationController::class, 'notification'])->name('notification');
// notification detail
Route::get('/notification/detail/{id}',[NotificationController::class, 'notiDetail'])->name('notiDetail');


// s upport wallet
Route::get('/SupportWallet',[OrderController::class, 'SupportWallet'])->name('SupportWallet');




// payment
Route::post('/pay',[PaymentController::class, 'pay'])->name('payment');
Route::get('success', [PaymentController::class, 'success']);
Route::get('error', [PaymentController::class, 'error']);








////////////////////////////////////////////////////// new routes/////////////////////////////////////////////// 


// configuration
Route::get('/configuration',[ConfigurationController::class, 'index'])->name('index');
// brand
Route::get('/configuration/Marque',[ConfigurationController::class, 'brands']);
// yajra for brand
Route::get('/configuration/brands',[ConfigurationController::class, 'getbrands'])->name('datatables.data');
// add brand
Route::post('/config/brand/add',[ConfigurationController::class, 'addBrands']);
// edit barnd page
Route::get('/brand/edit/{id}',[ConfigurationController::class, 'editBrand']);
// update brand
Route::post('/config/brand/update/{id}',[ConfigurationController::class, 'updateBrands']);
// delete barnd page
Route::get('/brand/delete/{id}',[ConfigurationController::class, 'DeleteBrand']);



// product page
Route::get('/configuration/Produit',[ConfigurationController::class, 'Products']);
// yajra for brand
Route::get('/configuration/Product',[ConfigurationController::class, 'getproducts'])->name('products.data');
// add product
Route::post('/config/product/add',[ConfigurationController::class, 'addProducts']);
// edit product page
Route::get('/product/edit/{id}',[ConfigurationController::class, 'editProducts']);
// update product
Route::post('/config/product/update/{id}',[ConfigurationController::class, 'updateProducts']);
// delete product page
Route::get('/product/delete/{id}',[ConfigurationController::class, 'DeleteProducts']);


// services page
Route::get('/configuration/Services',[ConfigurationController::class, 'Services']);
// yajra for service
Route::get('/configuration/service',[ConfigurationController::class, 'getservices'])->name('services.data');

// add service
Route::post('/config/service/add',[ConfigurationController::class, 'addServices']);
// edit service page
Route::get('/service/edit/{id}',[ConfigurationController::class, 'editServices']);
// update service
Route::post('/config/service/update/{id}',[ConfigurationController::class, 'updateServices']);
// delete service page
Route::get('/service/delete/{id}',[ConfigurationController::class, 'DeleteServices']);
// fetch product data
Route::get('/product/fetch/data',[ConfigurationController::class, 'fetchProduct']);



// to do list
Route::get('/todolist',[ToDoListController::class, 'index']);
// add new task
Route::post('/add/task',[ToDoListController::class, 'addTask']);
// yajra for to do list
Route::get('/get/task',[ToDoListController::class, 'gettask'])->name('todolist.data');
// edit task page
Route::get('/task/edit/page/{id}',[ToDoListController::class, 'TaskEditPage']);
// update service
Route::post('/update/task/{id}',[ToDoListController::class, 'updateTask']);


// edit task page
Route::get('/task/edit/{id}',[ToDoListController::class, 'editTask']);
// edit task incom
Route::get('/task/incom/{id}',[ToDoListController::class, 'incomTask']);
// edit task fav
Route::get('/task/fav/{id}',[ToDoListController::class, 'favTask']);


// completeb task list
Route::get('/comlist',[ToDoListController::class, 'comlist']);
// yajra boc for complete list
Route::get('/com/task',[ToDoListController::class, 'getcom'])->name('comlist.data');


// fav list page
Route::get('/favlist',[ToDoListController::class, 'favlist']);
// yajra boc for complete list
Route::get('/fav/task',[ToDoListController::class, 'getfav'])->name('favlist.data');




// vendor list
Route::get('/vendorlist',[ToDoListController::class, 'vendorlist']);
// yajra for to do vendor
Route::get('/get/vendor',[ToDoListController::class, 'getvendor'])->name('vendorlist.data');
// add vendor
Route::post('/add/vendor',[ToDoListController::class, 'addVendor']);
// edit vendor page
Route::get('/vendor/edit/page/{id}',[ToDoListController::class, 'vendorEditPage']);
// update vendor
Route::post('/update/vendor/{id}',[ToDoListController::class, 'updatevendor']);
// update vendor
Route::post('/update/vendor/{id}',[ToDoListController::class, 'updatevendor']);
// delete vendor page
Route::get('/vendor/delete/{id}',[ToDoListController::class, 'DeleteVendor']);
// vendor fav
Route::get('/vendor/fav/{id}',[ToDoListController::class, 'favvendor']);
// vendor detail
Route::get('/vendor/detail/{id}',[ToDoListController::class, 'detailVendor']);

// vendorfavlist
Route::get('/vendorfavlist',[ToDoListController::class, 'vendorfavlist']);
// yajra boc for complete list
Route::get('/fav/vendor',[ToDoListController::class, 'getvendorfav'])->name('venforfavlist.data');




////////////////////////////////////// Ua=ser sdie///////////////////////////////////
// brnad fetach data on user 
Route::get('/brand/fetach/data',[UserController::class, 'fetchbrandproduct']);
// product fetach data on user 
Route::get('/product/fetach/data',[UserController::class, 'fetchproducctservice']);










