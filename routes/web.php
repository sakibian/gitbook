<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


/*
  |-----------------------------------
  | Admin Panel
  |--------- -------------------------
  */
Route::group(['middleware' => 'role'], function () {

    // Upgrades
    Route::get('update/{version}', [UpgradeController::class, 'update']);

    // Dashboard
    Route::get('panel/admin', [AdminController::class, 'admin'])->name('dashboard');

    // Settings
    Route::get('panel/admin/settings', [AdminController::class, 'settings'])->name('general');
    Route::post('panel/admin/settings', [AdminController::class, 'saveSettings']);

    // Limits
    Route::get('panel/admin/settings/limits', [AdminController::class, 'settingsLimits'])->name('general');
    Route::post('panel/admin/settings/limits', [AdminController::class, 'saveSettingsLimits']);

    // BILLING
    Route::view('panel/admin/billing', 'admin.billing')->name('billing');
    Route::post('panel/admin/billing', [AdminController::class, 'billingStore']);

    // EMAIL SETTINGS
    Route::view('panel/admin/settings/email', 'admin.email-settings')->name('email');
    Route::post('panel/admin/settings/email', [AdminController::class, 'emailSettings']);

    // Test SMTP
    Route::post('panel/admin/settings/test-smtp', [AdminController::class, 'testSMTP']);

    // STORAGE
    Route::view('panel/admin/storage', 'admin.storage')->name('storage');
    Route::post('panel/admin/storage', [AdminController::class, 'storage']);

    // THEME
    Route::get('panel/admin/theme', [AdminController::class, 'theme'])->name('theme');
    Route::post('panel/admin/theme', [AdminController::class, 'themeStore']);

    //Withdrawals
    Route::get('panel/admin/withdrawals', [AdminController::class, 'withdrawals'])->name('withdrawals');
    Route::get('panel/admin/withdrawal/{id}', [AdminController::class, 'withdrawalsView'])->name('withdrawals');
    Route::post('panel/admin/withdrawals/paid/{id}', [AdminController::class, 'withdrawalsPaid']);

    // Subscriptions
    Route::get('panel/admin/subscriptions', [AdminController::class, 'subscriptions'])->name('subscriptions');

    // Transactions
    Route::get('panel/admin/transactions', [AdminController::class, 'transactions'])->name('transactions');
    Route::post('panel/admin/transactions/cancel/{id}', [AdminController::class, 'cancelTransaction']);

    // Members
    Route::get('panel/admin/members', [AdminController::class, 'index'])->name('members');

    // EDIT MEMBER
    Route::get('panel/admin/members/edit/{id}', [AdminController::class, 'edit'])->name('members');

    // EDIT MEMBER POST
    Route::post('panel/admin/members/edit/{id}', [AdminController::class, 'update']);

    // DELETE MEMBER
    Route::post('panel/admin/members/{id}', [AdminController::class, 'destroy']);

    // Pages
    Route::get('panel/admin/pages', [PagesController::class, 'index'])->name('pages');

    // ADD NEW PAGES
    Route::get('panel/admin/pages/create', [PagesController::class, 'create'])->name('pages');

    // ADD NEW PAGES POST
    Route::post('panel/admin/pages/create', [PagesController::class, 'store']);

    // EDIT PAGES
    Route::get('panel/admin/pages/edit/{id}', [PagesController::class, 'edit'])->name('pages');

    // EDIT PAGES POST
    Route::post('panel/admin/pages/edit/{id}', [PagesController::class, 'update']);

    // DELETE PAGES
    Route::post('panel/admin/pages/{id}', [PagesController::class, 'destroy']);

    // Verification Requests
    Route::get('panel/admin/verification/members', [AdminController::class, 'memberVerification'])->name('verification_requests');
    Route::post('panel/admin/verification/members/{action}/{id}/{user}', [AdminController::class, 'memberVerificationSend']);

    // Payments Settings
    Route::get('panel/admin/payments', [AdminController::class, 'payments'])->name('payments');
    Route::post('panel/admin/payments', [AdminController::class, 'savePayments']);

    Route::get('panel/admin/payments/{id}', [AdminController::class, 'paymentsGateways'])->name('payments');
    Route::post('panel/admin/payments/{id}', [AdminController::class, 'savePaymentsGateways']);

    // Profiles Social
    Route::get('panel/admin/profiles-social', [AdminController::class, 'profiles_social'])->name('profiles_social');
    Route::post('panel/admin/profiles-social', [AdminController::class, 'update_profiles_social']);

    // Categories
    Route::get('panel/admin/categories', [AdminController::class, 'categories'])->name('categories');
    Route::get('panel/admin/categories/add', [AdminController::class, 'addCategories'])->name('categories');
    Route::post('panel/admin/categories/add', [AdminController::class, 'storeCategories']);
    Route::get('panel/admin/categories/edit/{id}', [AdminController::class, 'editCategories'])->name('categories');
    Route::post('panel/admin/categories/update', [AdminController::class, 'updateCategories']);
    Route::post('panel/admin/categories/delete/{id}', [AdminController::class, 'deleteCategories']);

    // Posts
    Route::get('panel/admin/posts', [AdminController::class, 'posts'])->name('posts');
    Route::post('panel/admin/posts/delete/{id}', [AdminController::class, 'deletePost']);

    // Approve post
    Route::post('panel/admin/posts/approve/{id}', [AdminController::class, 'approvePost']);

    // Reports
    Route::get('panel/admin/reports', [AdminController::class, 'reports'])->name('reports');
    Route::post('panel/admin/reports/delete/{id}', [AdminController::class, 'deleteReport']);

    // Social Login
    Route::view('panel/admin/social-login', 'admin.social-login')->name('social_login');
    Route::post('panel/admin/social-login', [AdminController::class, 'updateSocialLogin']);

    // Google
    Route::get('panel/admin/google', [AdminController::class, 'google'])->name('google');
    Route::post('panel/admin/google', [AdminController::class, 'update_google']);

    //***** Languages
    Route::get('panel/admin/languages', [LangController::class, 'index'])->name('languages');

    // ADD NEW
    Route::get('panel/admin/languages/create', [LangController::class, 'create'])->name('languages');

    // ADD NEW POST
    Route::post('panel/admin/languages/create', [LangController::class, 'store']);

    // EDIT LANG
    Route::get('panel/admin/languages/edit/{id}', [LangController::class, 'edit'])->name('languages');

    // EDIT LANG POST
    Route::post('panel/admin/languages/edit/{id}', [LangController::class, 'update']);

    // DELETE LANG
    Route::post('panel/admin/languages/{id}', [LangController::class, 'destroy']);

    // Maintenance mode
    Route::view('panel/admin/maintenance/mode', 'admin.maintenance_mode')->name('maintenance_mode');
    Route::post('panel/admin/maintenance/mode', [AdminController::class, 'maintenanceMode']);

    // Clear Cache
    Route::get('panel/admin/clear-cache', 'AdminController@clearCache')->name('maintenance_mode');

    Route::post("ajax/upload/image", [AdminController::class, 'uploadImageEditor'])->name("upload.image");

    // Blog
    Route::get('panel/admin/blog', [AdminController::class, 'blog'])->name('blog');
    Route::post('panel/admin/blog/delete/{id}', [AdminController::class, 'deleteBlog']);

    // Add Blog Post
    Route::view('panel/admin/blog/create', 'admin.create-blog')->name('blog');
    Route::post('panel/admin/blog/create', [AdminController::class, 'createBlogStore']);

    // Edit Blog Post
    Route::get('panel/admin/blog/{id}', [AdminController::class, 'editBlog'])->name('blog');
    Route::post('panel/admin/blog/update', [AdminController::class, 'updateBlog']);

    // Resend confirmation email
    Route::get('panel/admin/resend/email/{id}', [AdminController::class, 'resendConfirmationEmail'])->name('members');

    // Deposits
    Route::get('panel/admin/deposits', [AdminController::class, 'deposits'])->name('deposits');
    Route::get('panel/admin/deposits/{id}', [AdminController::class, 'depositsView'])->name('deposits');
    Route::post('approve/deposits', [AdminController::class, 'approveDeposits']);
    Route::post('delete/deposits', [AdminController::class, 'deleteDeposits']);

    // Login as User
    Route::post('panel/admin/login/user/{id}', [AdminController::class, 'loginAsUser']);

    // Custom CSS/JS
    Route::view('panel/admin/custom-css-js', 'admin.css-js')->name('custom_css_js');
    Route::post('panel/admin/custom-css-js', [AdminController::class, 'customCssJs']);

    // PWA
    Route::view('panel/admin/pwa', 'admin.pwa')->name('pwa');
    Route::post('panel/admin/pwa', [AdminController::class, 'pwa']);

    // Role and permissions
    Route::get('panel/admin/members/roles-and-permissions/{id}', [AdminController::class, 'roleAndPermissions'])->name('members');
    Route::post('panel/admin/members/roles-and-permissions/{id}', [AdminController::class, 'storeRoleAndPermissions']);

    // Shop Categories
    Route::get('panel/admin/shop-categories', [AdminController::class, 'shopCategories'])->name('shop_categories');
    Route::get('panel/admin/shop-categories/add', [AdminController::class, 'addShopCategories'])->name('shop_categories');
    Route::post('panel/admin/shop-categories/add', [AdminController::class, 'storeShopCategories']);
    Route::get('panel/admin/shop-categories/edit/{id}', [AdminController::class, 'editShopCategories'])->name('shop_categories');
    Route::post('panel/admin/shop-categories/update', [AdminController::class, 'updateShopCategories']);
    Route::post('panel/admin/shop-categories/delete/{id}', [AdminController::class, 'deleteShopCategories']);

    // Push notification
    Route::view('panel/admin/push-notifications', 'admin.push_notifications')->name('push_notifications');
    Route::post('panel/admin/push-notifications', [AdminController::class, 'savePushNotifications']);

    // Get data Earnings Dashboard Admin
    Route::post('get/earnings/admin/{range}', [AdminController::class, 'getDataChart'])->name('dashboard.earnings');

    Route::get('panel/admin/referrals', [AdminController::class, 'referrals'])->name('referrals');

    Route::view('panel/admin/shop', 'admin.shop')->name('shop');
    Route::post('panel/admin/shop',  [AdminController::class, 'shopStore']);

    Route::get('panel/admin/products', [AdminController::class, 'products'])->name('products');
    Route::post('panel/admin/product/delete/{id}', [AdminController::class, 'productDelete']);

    Route::get('panel/admin/sales', [AdminController::class, 'sales'])->name('sales');
    Route::post('panel/admin/sales/refund/{id}', [AdminController::class, 'salesRefund']);

    Route::get('panel/admin/tax-rates', [TaxRatesController::class, 'show'])->name('tax');
    Route::view('panel/admin/tax-rates/add', 'admin.add-tax')->name('tax');
    Route::post('panel/admin/tax-rates/add', [TaxRatesController::class, 'store']);
    Route::get('panel/admin/tax-rates/edit/{id}', [TaxRatesController::class, 'edit'])->name('tax');
    Route::post('panel/admin/tax-rates/update', [TaxRatesController::class, 'update']);
    Route::post('panel/admin/ajax/states', [TaxRatesController::class, 'getStates']);

    Route::get('panel/admin/countries', [CountriesStatesController::class, 'countries'])->name('countries_states');
    Route::view('panel/admin/countries/add', 'admin.add-country')->name('countries_states');
    Route::post('panel/admin/countries/add', [CountriesStatesController::class, 'addCountry']);
    Route::get('panel/admin/countries/edit/{id}', [CountriesStatesController::class, 'editCountry'])->name('countries_states');
    Route::post('panel/admin/countries/update', [CountriesStatesController::class, 'updateCountry']);
    Route::post('panel/admin/countries/delete/{id}', [CountriesStatesController::class, 'deleteCountry']);

    Route::get('panel/admin/states', [CountriesStatesController::class, 'states'])->name('countries_states');
    Route::view('panel/admin/states/add', 'admin.add-state')->name('countries_states');
    Route::post('panel/admin/states/add', [CountriesStatesController::class, 'addState']);
    Route::get('panel/admin/states/edit/{id}', [CountriesStatesController::class, 'editState'])->name('countries_states');
    Route::post('panel/admin/states/update', [CountriesStatesController::class, 'updateState']);
    Route::post('panel/admin/states/delete/{id}', [CountriesStatesController::class, 'deleteState']);

    Route::get('file/verification/{filename}', [AdminController::class, 'getFileVerification']);

    Route::view('panel/admin/announcements', 'admin.announcements')->name('announcements');
    Route::post('panel/admin/announcements', [AdminController::class, 'storeAnnouncements']);

    Route::view('panel/admin/live-streaming', 'admin.live_streaming')->name('live_streaming');
    Route::post('panel/admin/live-streaming', [AdminController::class, 'saveLiveStreaming']);

    // Stories
    Route::view('panel/admin/stories/settings', 'admin.stories-settings')->name('stories');
    Route::post('panel/admin/stories/settings', [AdminController::class, 'saveStoriesSettings']);

    // Stories Posts
    Route::get('panel/admin/stories/posts', [AdminController::class, 'storiesPosts'])->name('stories');
    Route::post('panel/admin/stories/posts/delete/{id}', [AdminController::class, 'deleteStory']);

    // Stories Backgrounds
    Route::get('panel/admin/stories/backgrounds', [AdminController::class, 'storiesBackgrounds'])->name('stories');
    Route::post('panel/admin/stories/backgrounds/add', [AdminController::class, 'addStoryBackground']);
    Route::post('panel/admin/stories/backgrounds/delete/{id}', [AdminController::class, 'deleteStoryBackground']);

    // Stories Fonts
    Route::get('panel/admin/stories/fonts', [AdminController::class, 'storiesFonts'])->name('stories');
    Route::post('panel/admin/stories/fonts/add', [AdminController::class, 'addStoryFont']);
    Route::post('panel/admin/stories/fonts/delete/{id}', [AdminController::class, 'deleteStoryFont']);
});
 //==== End Panel Admin




Route::get('/', function () {
    return view('welcome');
});
