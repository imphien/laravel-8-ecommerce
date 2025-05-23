<?php

// Auth
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

//  Email verification
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\VerifyEmailController;

// Others
use App\Http\Controllers\Admin\AdminAccountController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\UserController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NewController;
use App\Http\Controllers\ContactController;



Route::get('/', [ShopController::class, 'home'])->name('home');
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/product/{product}', ProductDetailsController::class)->name('product');
Route::get('/news', [NewController::class, 'index'])->name('new');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');


// guest routes
Route::middleware('guest')->group(function(){
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});


Route::middleware('auth')->group(function(){
    // Admin routes
    Route::middleware('admin')->name('admin.')->prefix('admin')->group(function(){

        Route::get('/dashboard', DashboardController::class)->name('dashboard');
        Route::resource('transactions', TransactionController::class)->only(['index', 'update']);
        // account
        Route::get('/account', [AdminAccountController::class, 'general'])->name('account');
        Route::post('/account', [AdminAccountController::class, 'update'])->name('account.update');
        Route::post('/account/password', [AdminAccountController::class, 'updatePassword'])->name('account.pwd');
        // customers
        Route::get('customers', function () {
            return view('admin.customer', ['users' => User::all()]);
        })->name('customers');
        Route::delete('/customers/{id}', [UserController::class, 'destroy'])->name('customers.destroy');
        // categories
        Route::resource('categories', CategoryController::class)->except(['show'])->parameters(['categories' => 'category']);
        // products
        Route::resource('products', ProductController::class)->except(['show']);
        // orders
        Route::resource('orders', AdminOrderController::class)->only(['index', 'show', 'update']);

    });

    Route::name('user.')->prefix('user')->group(function(){
        Route::get('/profile', [UserController::class, 'show'])->name('profile');
        Route::post('/{id}', [UserController::class, 'update'])->name('update');
        Route::resource('orders', OrderController::class)->only(['index', 'show', 'update']);
        Route::view('/ship_info', 'user.ship_info')->name('ship_info');
        Route::view('/setting', 'user.setting')->name('setting');

    });

    Route::middleware('verified')->group(function(){

        Route::get('/checkout', [CheckoutController::class, 'showForm'])->name('checkout');
        Route::post('/checkout', [CheckoutController::class, 'createOrder'])->name('checkout');

    });

    //GET USER ADDRESS
    Route::get('/address', function(){

        /** @var App\Models\User $user **/
        $user = Auth::user();
        return collect($user->only(['first_name', 'last_name', 'email', 'mobile']))
                    ->merge($user->addresses()->first(['address_line', 'city', 'postal_code', 'country']));
    });

    // USER CART
    Route::post('/add_to_cart/{product}', [CartController::class, 'store'])->name('atc');
    Route::delete('/remove_from_cart/{product}', [CartController::class, 'destroy'])->name('rfc');
    Route::put('update_cart/{product}/{quantity}', [CartController::class, 'update'])->name('uc');

   
    Route::post('fake_address', function(){
        App\Models\Address::factory()->create(['user_id' => Auth::id()]);
        return back();
    })->name('fake_addr');

    Route::post('fake_payment', function(){
        App\Models\Payment::factory()->create(['user_id' => Auth::id(), 'card_holder' => strtoupper(auth()->user()->full_name)]);
        return back();
    })->name('fake_pay');


    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

});
