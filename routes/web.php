<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\EmailController;

// ADMIN
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\InventoryController as AdminInventoryController;
use App\Http\Controllers\Admin\ReportController as AdminReportController;


// STAFF
use App\Http\Controllers\Staff\ProductController as StaffProductController;
use App\Http\Controllers\Staff\OrderController as StaffOrderController;
use App\Http\Controllers\Staff\DeliveryController as StaffDeliveryController;
use App\Http\Controllers\Staff\InventoryController as StaffInventoryController;
use App\Http\Controllers\Staff\EmailController as StaffEmailController;



/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    return redirect()->route('login');

});

//EMAIL 

Route::get('/', function () {

    return redirect()->route('login');

});

Route::get('/test-email', [EmailController::class, 'sendTestEmail']);



/*
|--------------------------------------------------------------------------
| AUTHENTICATION
|--------------------------------------------------------------------------
|
| Login and Register are only accessible when the user is NOT logged in.
|
*/

Route::middleware('guest')->group(function () {

    Route::get(
        '/login',
        [AuthController::class, 'showLogin']
    )->name('login');

    Route::post(
        '/login',
        [AuthController::class, 'login']
    )->name('login.submit');

    Route::get(
        '/register',
        [AuthController::class, 'showRegister']
    )->name('register');

    Route::post(
        '/register',
        [AuthController::class, 'register']
    )->name('register.submit');

});


/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/

Route::post(
    '/logout',
    [AuthController::class, 'logout']
)->name('logout');


/*
|--------------------------------------------------------------------------
| GENERIC ACCOUNT
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'prevent.back'
])->group(function () {

    Route::get(
        '/account',
        [AccountController::class, 'index']
    )->name('account');

});


/*
|--------------------------------------------------------------------------
| CUSTOMER ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'customer',
    'prevent.back'
])
->prefix('customer')
->name('customer.')
->group(function () {


    /*
    |--------------------------------------------------------------------------
    | CUSTOMER DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', function () {

        $orders = \App\Models\Order::where(
            'customer_name',
            auth()->user()->name
        )
        ->latest()
        ->get();


        $totalOrders =
            $orders->count();


        $pendingOrders =
            $orders
                ->filter(function ($order) {

                    return strtolower(
                        trim(
                            $order->status ?? ''
                        )
                    ) === 'pending';

                })
                ->count();


        $confirmedOrders =
            $orders
                ->filter(function ($order) {

                    return strtolower(
                        trim(
                            $order->status ?? ''
                        )
                    ) === 'confirmed';

                })
                ->count();


        $deliveredOrders =
            $orders
                ->filter(function ($order) {

                    return strtolower(
                        trim(
                            $order->status ?? ''
                        )
                    ) === 'delivered';

                })
                ->count();


        $cancelledOrders =
            $orders
                ->filter(function ($order) {

                    return in_array(
                        strtolower(
                            trim(
                                $order->status ?? ''
                            )
                        ),
                        [
                            'cancelled',
                            'canceled'
                        ]
                    );

                })
                ->count();


        $products =
            \App\Models\Product::latest()
                ->take(6)
                ->get();


        $totalProducts =
            \App\Models\Product::count();


        $recentOrders =
            $orders->take(5);


        return view(
            'customer.dashboard',
            compact(
                'totalOrders',
                'pendingOrders',
                'confirmedOrders',
                'deliveredOrders',
                'cancelledOrders',
                'totalProducts',
                'products',
                'recentOrders'
            )
        );

    })->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | CUSTOMER PRODUCTS
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/products',
        [
            \App\Http\Controllers\Customer\OrderController::class,
            'products'
        ]
    )->name('products');


    /*
    |--------------------------------------------------------------------------
    | CUSTOMER CREATE ORDER
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/products/{product}/order',
        [
            \App\Http\Controllers\Customer\OrderController::class,
            'create'
        ]
    )->name('orders.create');


    /*
    |--------------------------------------------------------------------------
    | CUSTOMER STORE ORDER
    |--------------------------------------------------------------------------
    */

    Route::post(
        '/products/{product}/order',
        [
            \App\Http\Controllers\Customer\OrderController::class,
            'store'
        ]
    )->name('orders.store');


    /*
    |--------------------------------------------------------------------------
    | CUSTOMER MY ORDERS
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/orders',
        [
            \App\Http\Controllers\Customer\OrderController::class,
            'orders'
        ]
    )->name('orders');


    /*
    |--------------------------------------------------------------------------
    | CUSTOMER EDIT ORDER
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/orders/{order}/edit',
        [
            \App\Http\Controllers\Customer\OrderController::class,
            'edit'
        ]
    )->name('orders.edit');


    /*
    |--------------------------------------------------------------------------
    | CUSTOMER UPDATE ORDER
    |--------------------------------------------------------------------------
    */

    Route::put(
        '/orders/{order}',
        [
            \App\Http\Controllers\Customer\OrderController::class,
            'update'
        ]
    )->name('orders.update');


    /*
    |--------------------------------------------------------------------------
    | CUSTOMER TRACK ORDER
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/orders/{order}/tracking',
        [
            \App\Http\Controllers\Customer\OrderController::class,
            'tracking'
        ]
    )->name('orders.tracking');


    /*
    |--------------------------------------------------------------------------
    | CUSTOMER CANCEL ORDER
    |--------------------------------------------------------------------------
    */

    Route::patch(
        '/orders/{order}/cancel',
        [
            \App\Http\Controllers\Customer\OrderController::class,
            'cancel'
        ]
    )->name('orders.cancel');


    /*
    |--------------------------------------------------------------------------
    | CUSTOMER ACCOUNT
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/account',
        [
            AccountController::class,
            'customerAccount'
        ]
    )->name('account');


    Route::put(
        '/account',
        [
            AccountController::class,
            'update'
        ]
    )->name('account.update');


    Route::put(
        '/account/password',
        [
            AccountController::class,
            'updatePassword'
        ]
    )->name('account.password');

});


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'admin',
    'prevent.back'
])
->prefix('admin')
->name('admin.')
->group(function () {


    /*
    |--------------------------------------------------------------------------
    | ADMIN DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', function () {

        $totalUsers =
            \App\Models\User::count();


        $totalProducts =
            \App\Models\Product::count();


        $totalOrders =
            \App\Models\Order::count();


        $deliveredOrders =
            \App\Models\Order::where(
                'status',
                'Delivered'
            )->count();


        $recentOrders =
            \App\Models\Order::latest()
                ->take(5)
                ->get();


        $totalRevenue =
            \App\Models\Order::where(
                'status',
                'Delivered'
            )
            ->sum('total_amount');


        $waterUnitsSold =
            \App\Models\Order::where(
                'status',
                'Delivered'
            )
            ->sum('quantity');


        $averageOrderValue =
            $deliveredOrders > 0
                ? $totalRevenue / $deliveredOrders
                : 0;


        $totalStock =
            \App\Models\Product::sum('stock');


        $lowStock =
            \App\Models\Product::where(
                'stock',
                '>',
                0
            )
            ->where(
                'stock',
                '<=',
                10
            )
            ->count();


        $outOfStock =
            \App\Models\Product::where(
                'stock',
                '<=',
                0
            )
            ->count();


        $usersFill =
            min(
                $totalUsers,
                100
            );


        $productsFill =
            min(
                $totalProducts,
                100
            );


        $ordersFill =
            min(
                $totalOrders,
                100
            );


        $deliveredFill =
            min(
                $deliveredOrders,
                100
            );


        return view(
            'admin.users.dashboard',
            compact(
                'totalUsers',
                'totalProducts',
                'totalOrders',
                'deliveredOrders',
                'recentOrders',
                'totalRevenue',
                'waterUnitsSold',
                'averageOrderValue',
                'totalStock',
                'lowStock',
                'outOfStock',
                'usersFill',
                'productsFill',
                'ordersFill',
                'deliveredFill'
            )
        );

    })->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | ADMIN USERS
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'users',
        AdminUserController::class
    );

     /*
     |--------------------------------------------------------------------------
     | ADMIN PRODUCTS
    |--------------------------------------------------------------------------
     */

/*
|--------------------------------------------------------------------------
| ADMIN PRODUCTS - VIEW ONLY
|--------------------------------------------------------------------------
*/

Route::resource(
    'products',
    AdminProductController::class
)->only([
    'index',
    'show'
]);
    /*
    |--------------------------------------------------------------------------
    | ADMIN ORDERS
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'orders',
        AdminOrderController::class
    );


    /*
    |--------------------------------------------------------------------------
    | ADMIN INVENTORY
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/inventory',
        [
            AdminInventoryController::class,
            'index'
        ]
    )->name('inventory.index');


    Route::get(
        '/inventory/low-stock',
        [
            AdminInventoryController::class,
            'lowStock'
        ]
    )->name('inventory.low');


    Route::get(
        '/inventory/out-of-stock',
        [
            AdminInventoryController::class,
            'outOfStock'
        ]
    )->name('inventory.out');


    /*
    |--------------------------------------------------------------------------
    | ADMIN REPORTS
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/reports',
        [
            AdminReportController::class,
            'index'
        ]
    )->name('reports');


    /*
    |--------------------------------------------------------------------------
    | ADMIN ACCOUNT
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/account',
        [
            AccountController::class,
            'adminAccount'
        ]
    )->name('account');


    Route::put(
        '/account',
        [
            AccountController::class,
            'update'
        ]
    )->name('account.update');


    Route::put(
        '/account/password',
        [
            AccountController::class,
            'updatePassword'
        ]
    )->name('account.password');

});


/*
|--------------------------------------------------------------------------
| STAFF ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'staff',
    'prevent.back'
])
->prefix('staff')
->name('staff.')
->group(function () {


    /*
    |--------------------------------------------------------------------------
    | STAFF DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', function () {

        $totalOrders =
            \App\Models\Order::count();


        $pendingOrders =
            \App\Models\Order::where(
                'status',
                'Pending'
            )->count();


        $confirmedOrders =
            \App\Models\Order::where(
                'status',
                'Confirmed'
            )->count();


        $deliveredOrders =
            \App\Models\Order::where(
                'status',
                'Delivered'
            )->count();


        $totalProducts =
            \App\Models\Product::count();


        $recentOrders =
            \App\Models\Order::latest()
                ->take(5)
                ->get();


        $products =
            \App\Models\Product::latest()
                ->take(6)
                ->get();


        return view(
            'staff.dashboard',
            compact(
                'totalOrders',
                'pendingOrders',
                'confirmedOrders',
                'deliveredOrders',
                'totalProducts',
                'recentOrders',
                'products'
            )
        );

    })->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | STAFF PRODUCTS
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/products',
        [
            StaffProductController::class,
            'index'
        ]
    )->name('products.index');


    Route::get(
        '/products/create',
        [
            StaffProductController::class,
            'create'
        ]
    )->name('products.create');


    Route::post(
        '/products',
        [
            StaffProductController::class,
            'store'
        ]
    )->name('products.store');


    Route::get(
        '/products/{product}/edit',
        [
            StaffProductController::class,
            'edit'
        ]
    )->name('products.edit');


    Route::get(
        '/products/{product}',
        [
            StaffProductController::class,
            'show'
        ]
    )->name('products.show');


    Route::put(
        '/products/{product}',
        [
            StaffProductController::class,
            'update'
        ]
    )->name('products.update');


    Route::delete(
        '/products/{product}',
        [
            StaffProductController::class,
            'destroy'
        ]
    )->name('products.destroy');


    /*
    |--------------------------------------------------------------------------
    | STAFF INVENTORY
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/inventory',
        [
            StaffInventoryController::class,
            'index'
        ]
    )->name('inventory.index');


    /*
    |--------------------------------------------------------------------------
    | STAFF ORDERS
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/orders',
        [
            StaffOrderController::class,
            'index'
        ]
    )->name('orders.index');


    Route::get(
        '/orders/{order}/print',
        [
            StaffOrderController::class,
            'print'
        ]
    )->name('orders.print');


    Route::get(
        '/orders/{order}',
        [
            StaffOrderController::class,
            'show'
        ]
    )->name('orders.show');


    Route::patch(
        '/orders/{order}/status',
        [
            StaffOrderController::class,
            'updateStatus'
        ]
    )->name('orders.updateStatus');


    /*
    |--------------------------------------------------------------------------
    | STAFF DELIVERIES
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/deliveries',
        [
            StaffDeliveryController::class,
            'index'
        ]
    )->name('deliveries.index');


    Route::patch(
        '/deliveries/{order}/status',
        [
            StaffDeliveryController::class,
            'updateStatus'
        ]
    )->name('deliveries.updateStatus');

    /*
|--------------------------------------------------------------------------
| STAFF EMAIL NOTIFICATIONS
|--------------------------------------------------------------------------
*/

Route::get(
    '/emails',
    [StaffEmailController::class, 'create']
)->name('emails.create');


Route::post(
    '/emails/send',
    [StaffEmailController::class, 'send']
)->name('emails.send');


    /*
    |--------------------------------------------------------------------------
    | STAFF ACCOUNT
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/account',
        [
            AccountController::class,
            'staffAccount'
        ]
    )->name('account');


    Route::put(
        '/account',
        [
            AccountController::class,
            'update'
        ]
    )->name('account.update');


    Route::put(
        '/account/password',
        [
            AccountController::class,
            'updatePassword'
        ]
    )->name('account.password');

});