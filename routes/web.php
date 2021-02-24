<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\billprintcontroller;
use App\Http\Controllers\categorycontroller;
use App\Http\Controllers\companydatacontroller;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerCreditController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\productcontroller;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleReportController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
// for test route





// route for login
Route::get('/login',[LoginController::class,'index']);
Route::get('/',[LoginController::class,'index'])->name('login');
Route::get('/login',[LoginController::class,'index']);
Route::post('/login',[LoginController::class,'authenticate']);


// route for auth for user

Route::middleware(['auth'])->group(function () {

    // route to sall product
    Route::view('/pos', 'pos');

    // Route to add and delete category livewire done here
    Route::get('/categories',[categorycontroller::class,'index']);
    Route::post('/categories',[categorycontroller::class,'add_category']);
    Route::get('/categories/{id}',[categorycontroller::class,'edit_product_category']);
    Route::post('/categories-update',[categorycontroller::class,'update_product_category']);
    Route::get('/categories-delete/{id}', [categorycontroller::class,'delete_category'])->name('category.delete');


    // Route for product add and delete and show
    Route::get('/product', [productcontroller::class,'index']);
    Route::get('/add-product', [productcontroller::class,'product']);
    Route::post('/product', [productcontroller::class,'addproduct']);
    Route::get('/product-edit/{id}', [productcontroller::class,'edit_product']);
    Route::post('/product-update', [productcontroller::class,'update_product']);
    Route::get('/product-delete/{id}', [productcontroller::class,'deleteproduct'])->name('product.delete');

    // Route for expense
    Route::get('/expense-list', [ExpenseController::class,'index']);
    Route::get('/expense-category', [ExpenseController::class,'show_expense_category']);
    Route::post('/expense-category', [ExpenseController::class,'add_expense_category']);
    Route::get('/expense-category/{id}',[ExpenseController::class,'edit_expense_category']);
    Route::post('/expense-category-update',[ExpenseController::class,'update_expense_category']);
    Route::get('/expense-category-delete/{id}',[ExpenseController::class,'delete_expense_category']);
    Route::get('/expense-add', [ExpenseController::class,'show_expense_add']);
    Route::post('/expense-add', [ExpenseController::class,'add_expense_list']);

    // route for purchase
    Route::get('/purchase-list', [ExpenseController::class,'index']);
    Route::get('/purchase-category', [PurchaseController::class,'show_purchase_category']);
    Route::post('/purchase-category', [PurchaseController::class,'add_purchase_category']);
    Route::get('/purchase-category/{id}',[PurchaseController::class,'edit_purchase_category']);
    Route::post('/purchase-category-update',[ExpenseController::class,'update_expense_category']);
    Route::get('/purchase-category-delete/{id}',[ExpenseController::class,'delete_expense_category']);
    Route::get('/purchase-add', [ExpenseController::class,'show_expense_add']);
    Route::post('/purchase-add', [ExpenseController::class,'add_expense_list']);



    // route for show total biil and generate bill
    Route::get('billprint/{id}',[billprintcontroller::class,'index'])->name('bill.print');
    Route::get('kotprint/{id}',[billprintcontroller::class,'kot_bill'])->name('kot.print');
    Route::get('test',[billprintcontroller::class,'test']);

    // route for table
    Route::get('/table',[TableController::class,'index']);
    Route::get('/table/{id}',[TableController::class,'table_edit']);
    Route::post('/table',[TableController::class,'tableadd']);
    Route::post('/table-update',[TableController::class,'table_update']);
    Route::get('/table-delete/{id}',[TableController::class,'tabledelete']);

    // route for dashboard

    // route for company profile
    Route::get('/companyprofile',[companydatacontroller::class,'index']);
    Route::post('/companyprofile',[companydatacontroller::class,'update_company'])->name('company.update');

    // route for dashboard
    Route::get('/dashboard',[DashboardController::class,'index']);
    Route::get('/export-orders',[DashboardController::class,'export']);
    Route::get('/export-orders-pdf',[DashboardController::class,'exportpdf']);

    // route for add user
    Route::get('/adduser',[UserController::class,'index']);
    Route::post('/adduser',[UserController::class,'adduser'])->name('user.add');
    Route::get('/userlist',[UserController::class,'userlist'])->name('user.list');
    Route::get('/user-delete/{id}',[UserController::class,'userdelete'])->name('user.delete');

    // route for add user
    Route::get('/customer',[CustomerController::class,'index']);
    Route::post('/customer',[CustomerController::class,'add_customer']);
    Route::get('/customer/{id}',[CustomerController::class,'edit_customer']);
    Route::post('/customer-update',[CustomerController::class,'update_customer']);
    Route::get('/customer-delete/{id}',[CustomerController::class,'delete_customer']);


    // route for report
    Route::get('/total-sale',[SaleReportController::class,'index_total_sale']);
    Route::get('/cash-sale',[SaleReportController::class,'index_cash_sale']);
    Route::get('/credit-sale',[SaleReportController::class,'index_credit_sale']);
    //route for assets
    Route::get('/assets', [AssetController::class,'index']);
    Route::post('/assets', [AssetController::class,'add_assets']);
    Route::get('/assets/{id}', [AssetController::class,'edit_assets']);
    Route::post('/assets-update', [AssetController::class,'update_assets']);
    Route::get('/assets-delete/{id}', [AssetController::class,'delete_assets']);

    // route for credit
    Route::get('/credits',[CustomerCreditController::class,'index']);
    Route::post('/credits',[CustomerCreditController::class,'update_credit']);
    // Route::post('/credit-search',[CustomerCreditController::class,'search_customer']);
    Route::get('/credits/{id}', [CustomerCreditController::class,'single_credit_show']);
    Route::post('/credit-pay', [CustomerCreditController::class,'single_credit_update']);

    // route for logout
    Route::get('/logout',[LoginController::class,'logout']);



});

