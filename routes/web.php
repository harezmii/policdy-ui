<?php

use App\Http\Controllers\AccessControlController;
use App\Http\Controllers\AccountingController;
use App\Http\Controllers\AmavisRulesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckHeloController;
use App\Http\Controllers\CheckSpfController;
use App\Http\Controllers\GreyListingController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\QuotasController;
use App\Models\Access;
use App\Models\Accounting;
use App\Models\AccountingTracking;
use App\Models\AmavisRules;
use App\Models\CheckHeloBlackList;
use App\Models\CheckHeloTracking;
use App\Models\CheckHeloWhiteList;
use App\Models\CheckSpf;
use App\Models\Greylisting;
use App\Models\GreylistingAutoBlackList;
use App\Models\GreylistingAutoWhiteList;
use App\Models\GreylistingTracking;
use App\Models\GreyListingWhiteList;
use App\Models\Policy;
use App\Models\PolicyGroup;
use App\Models\PolicyGroupMember;
use App\Models\PolicyMember;
use App\Models\QuatasLimit;
use App\Models\QuatasTracking;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {

    if (Auth::check()) {
        return view('index');
    }

    return redirect('/login');

})->name('index');

Route::view('/register', 'register');
Route::view('/login', 'login')->name('login');

Route::post("/registerPost", [AuthController::class, "registerPost"])->name("registerPost");
Route::post("/loginPost", [AuthController::class, "loginPost"])->name("loginPost");
Route::get('/logout', [AuthController::class, "logout"])->name('logout');
Route::get('/token', function () {
    return
        response()->json([
            "token" => csrf_token()
        ]);
})->name("token");

Route::get('/app/blacklist', function () {
    $result = CheckHeloBlackList::all();

    return view("checkHeloBlackList", compact('result'));
})->name("blacklist");

Route::get('/app/whitelist', function () {
    $result = CheckHeloWhiteList::all();

    return view("checkHeloWhiteList", compact('result'));
})->name("whitelist");


// Amavis Rules START
Route::get('/amavis/rules', function () {
    $result = AmavisRules::all();

    return view("amavis_rules", compact('result'));
})->name("amavis_rules");


Route::post('/amavis/rules', [AmavisRulesController::class, "createAmavisRules"])->name('create_amavis_rules');
Route::delete('/amavis/rules/{id}', [AmavisRulesController::class, "deleteAmavisRules"])->name('delete_amavis_rules');
Route::post('/amavis/rules/{id}', [AmavisRulesController::class, "updateAmavisRules"])->name('update_amavis_rules');
// Amavis Rules END

// Policy Routes START
Route::get('/policy', function () {
    $result = Policy::all();

    return view("policy", compact('result'));
})->name("policy");


Route::post('/policy', [PolicyController::class, "createPolicy"])->name('create_policy');
Route::delete('/policy/{id}', [PolicyController::class, "deletePolicy"])->name('delete_policy');
Route::post('/policy/{id}', [PolicyController::class, "updatePolicy"])->name('update_policy');
// Policy Routes END


// Policy Group Routes START
Route::get('/policy/group', function () {
    $result = Policy::all();

    return view("policy_group", compact('result'));
})->name("policy_group");


Route::post('/policy/group', [PolicyController::class, "createPolicyGroup"])->name('create_policy_group');
Route::delete('/policy/group/{id}', [PolicyController::class, "deletePolicyGroup"])->name('delete_policy_group');
Route::post('/policy/group/{id}', [PolicyController::class, "updatePolicyGroup"])->name('update_policy_group');
// Policy Group Routes END

// Policy Members Routes START
Route::get('/policy/member', function () {
    $result = PolicyMember::all();

    return view("policy_member", compact('result'));
})->name("policy_member");


Route::post('/policy/member', [PolicyController::class, "createPolicyMember"])->name('create_policy_member');
Route::delete('/policy/member/{id}', [PolicyController::class, "deletePolicyMember"])->name('delete_policy_member');
Route::post('/policy/member/{id}', [PolicyController::class, "updatePolicyMember"])->name('update_policy_member');
// Policy Members Routes END

// Policy Group Members Routes START
Route::get('/policy/group/member', function () {
    $result = PolicyGroupMember::all();

   return view("policy_group_member", compact('result'));
})->name("policy_group_member");


Route::post('/policy/group/member', [PolicyController::class, "createPolicyGroupMember"])->name('create_policy_group_member');
Route::delete('/policy/group/member/{id}', [PolicyController::class, "deletePolicyGroupMember"])->name('delete_policy_group_member');
Route::post('/policy/group/member/{id}', [PolicyController::class, "updatePolicyGroupMember"])->name('update_policy_group_member');
// Policy Group Members Routes END


// CheckHelo SPF Routes START

Route::get('/spf', function () {
    $result = CheckSpf::all();

    return view("spf", compact('result'));
})->name("spf");

Route::post('/spf', [CheckSpfController::class, "createSpf"])->name('create_spf');
Route::delete('/spf/{id}', [CheckSpfController::class, "deleteSpf"])->name('delete_spf');
Route::post('/spf/{id}', [CheckSpfController::class, "updateSpf"])->name('update_spf');

// CheckHelo SPF Routes END


// CheckHelo Tracking Routes START

Route::get('/check/helo/tracking', function () {
    $result = CheckHeloTracking::all();

    return view("checkhelo_tracking", compact('result'));
})->name("check_helo_tracking");

Route::post('/check/helo/tracking', [CheckHeloController::class, "createTracking"])->name('create_check_helo_tracking');
Route::delete('/check/helo/tracking/{id}', [CheckHeloController::class, "deleteTracking"])->name('delete_check_helo_tracking');
Route::post('/check/helo/tracking/{id}', [CheckHeloController::class, "updateTracking"])->name('update_check_helo_tracking');

// CheckHelo Tracking Routes END

// AccessControl Routes Start

Route::get('/access/control', function () {
    $result = Access::all();
    //dd($result);
    return view("accessControl", compact('result'));
})->name("access_control");

Route::post('/access/control', [AccessControlController::class, "createAccessControl"])->name('create_access_control');
Route::delete('/access/control/{id}', [AccessControlController::class, "deleteAccessControl"])->name('delete_access_control');
Route::post('/access/control/{id}', [AccessControlController::class, "updateAccessControl"])->name('update_access_control');

// AccessControl Routes End

// Accounting Routes Start

Route::get('/accounting', function () {
    $result = Accounting::all();
    return view("accounting", compact('result'));
})->name("accounting");

Route::post('/accounting', [AccountingController::class, "createAccounting"])->name('create_accounting');
Route::delete('/accounting/{id}', [AccountingController::class, "deleteAccounting"])->name('delete_accounting');
Route::post('/accounting/{id}', [AccountingController::class, "updateAccounting"])->name('update_accounting');

// Accounting Routes End


// Accounting Tracking Routes Start

Route::get('/accounting/tracking', function () {
    $result = AccountingTracking::all();
    return view("accounting_tracking", compact('result'));
})->name("accounting_tracking");

Route::post('/accounting/tracking', [AccountingController::class, "createAccountingTracking"])->name('create_accounting_tracking');
Route::delete('/accounting/tracking/{id}', [AccountingController::class, "deleteAccountingTracking"])->name('delete_accounting_tracking');
Route::post('/accounting/tracking/{id}', [AccountingController::class, "updateAccountingTracking"])->name('update_accounting_tracking');

// Accounting Tracking Routes End


// GreyListing Routes Start

Route::get('/greylisting', function () {
    $result =  Greylisting::all();
    return view("greylisting", compact('result'));
})->name("greylisting");

Route::post('/greylisting', [GreyListingController::class, "createGreyListing"])->name('create_grey_listing');
Route::delete('/greylisting/{id}', [GreyListingController::class, "deleteGreyListing"])->name('delete_grey_listing');
Route::post('/greylisting/{id}', [GreyListingController::class, "updateGreyListing"])->name('update_grey_listing');

// GreyListing Routes End

// GreyListingWhitelist Routes Start

Route::get('/greylisting/whitelist', function () {
    $result = GreyListingWhiteList::all();
    return view("greylisting_whitelist", compact('result'));
})->name("greylisting_whitelist");

Route::post('/greylisting/whitelist', [GreyListingController::class, "createGreyListingWhiteList"])->name('create_grey_listing_white_list');
Route::delete('/greylisting/whitelist/{id}', [GreyListingController::class, "deleteGreyListingWhiteList"])->name('delete_grey_listing_white_list');
Route::post('/greylisting/whitelist/{id}', [GreyListingController::class, "updateGreyListingWhiteList"])->name('update_grey_listing_white_list');

// GreyListingWhitelist Routes End

// GreyListingAutoWhitelist Routes Start

Route::get('/greylisting/auto/whitelist', function () {
    $result = GreylistingAutoWhiteList::all();
    return view("greylisting_auto_white_list", compact('result'));
})->name("greylisting_auto_white_list");

Route::post('/greylisting/auto/whitelist', [GreyListingController::class, "createGreyListingAutoWhiteList"])->name('create_grey_listing_auto_white_list');
Route::delete('/greylisting/auto/whitelist/{id}', [GreyListingController::class, "deleteGreyListingAutoWhiteList"])->name('delete_grey_listing_auto_white_list');
Route::post('/greylisting/auto/whitelist/{id}', [GreyListingController::class, "updateGreyListingAutoWhiteList"])->name('update_grey_listing_auto_white_list');

// GreyListingWhitelist Routes End


// GreyListingAutoBlacklist Routes Start

Route::get('/greylisting/auto/blacklist', function () {
    $result = GreylistingAutoBlackList::all();
    return view("greylisting_auto_black_list", compact('result'));
})->name("greylisting_auto_black_list");

Route::post('/greylisting/auto/blacklist', [GreyListingController::class, "createGreyListingAutoBlackList"])->name('create_grey_listing_auto_black_list');
Route::delete('/greylisting/auto/blacklist/{id}', [GreyListingController::class, "deleteGreyListingAutoBlackList"])->name('delete_grey_listing_auto_black_list');
Route::post('/greylisting/auto/blacklist/{id}', [GreyListingController::class, "updateGreyListingAutoBlackList"])->name('update_grey_listing_auto_black_list');

// GreyListingBlacklist Routes End

// GreyListingTracking Routes Start

Route::get('/greylisting/tracking', function () {
    $result = GreylistingTracking::all();
    return view("greylisting_tracking", compact('result'));
})->name("greylisting_tracking");

Route::post('/greylisting/tracking', [GreyListingController::class, "createGreyListingTrackingList"])->name('create_grey_listing_tracking');
Route::delete('/greylisting/tracking/{id}', [GreyListingController::class, "deleteGreyListingTrackingList"])->name('delete_grey_listing_tracking');
Route::post('/greylisting/tracking/{id}', [GreyListingController::class, "updateGreyListingTrackingList"])->name('update_grey_listing_tracking');

// GreyListingTracking Routes End



// Quotas Routes Start

Route::get('/quotas', function () {
    $result = \App\Models\Quatas::all();

    return view("quotas", compact('result'));
})->name("quotas");

Route::post('/quotas', [QuotasController::class, "createQuotas"])->name('create_quotas');
Route::delete('/quotas/{id}', [QuotasController::class, "deleteQuotas"])->name('delete_quotas');
Route::post('/quotas/{id}', [QuotasController::class, "updateQuotas"])->name('update_quotas');

// Quotas Routes Start

// Quotas Tracking Routes Start

Route::get('/quotas/tracking', function () {
    $result = QuatasTracking::paginate(30);

    return view("quotas_tracking", compact('result'));
})->name("quotas_tracking");


// Quotas Tracking Routes End

// Quotas Limit Routes Start

Route::get('/quotas/limit', function () {
    $result = QuatasLimit::all();

    return view("quotas_limit", compact('result'));
})->name("quotas_limit");

Route::post('/quotas/limit', [QuotasController::class, "createQuotasLimit"])->name('create_quotas_limit');
Route::delete('/quotas/limit/{id}', [QuotasController::class, "deleteQuotasLimit"])->name('delete_quotas_limit');
Route::post('/quotas/limit/{id}', [QuotasController::class, "updateQuotasLimit"])->name('update_quotas_limit');
// Quotas Limit Routes End

Route::group(['prefix' => 'checkhelo'], function () {
    // CheckHelo Routes Start

    Route::get('/', [CheckHeloController::class, "indexHelo"])->name('checkhelo');;

    // CheckHelo Routes END

    // CheckHelo BlackList Routes START

    Route::get('/blacklist', [CheckHeloController::class, "indexBlackList"])->name('index_checkhelo_blacklist');
    Route::post('/blacklist', [CheckHeloController::class, "createBlackList"])->name('create_checkhelo_blacklist');
    Route::delete('/blacklist/{id}', [CheckHeloController::class, "deleteBlackList"])->name('delete_checkhelo_blacklist');
    Route::post('/blacklist/{id}', [CheckHeloController::class, "updateBlackList"])->name('update_checkhelo_blacklist');

    // CheckHelo BlackList Routes END


    // CheckHelo WhiteList Routes START

    Route::get('/whitelist', [CheckHeloController::class, "indexWhiteList"])->name('index_checkhelo_whitelist');
    Route::post('/whitelist', [CheckHeloController::class, "createWhiteList"])->name('create_checkhelo_whitelist');
    Route::delete('/whitelist/{id}', [CheckHeloController::class, "deleteWhiteList"])->name('delete_checkhelo_whitelist');
    Route::post('/whitelist/{id}', [CheckHeloController::class, "updateWhiteList"])->name('update_checkhelo_whitelist');

    // CheckHelo WhiteList Routes END

});



Route::get("/data", [AuthController::class, "getAccess"]);

Route::view('/analytics', 'analytics');
Route::view('/finance', 'finance');
Route::view('/crypto', 'crypto');

Route::view('/apps/chat', 'apps.chat');
Route::view('/apps/mailbox', 'apps.mailbox');
Route::view('/apps/todolist', 'apps.todolist');
Route::view('/apps/notes', 'apps.notes');
Route::view('/apps/scrumboard', 'apps.scrumboard');


Route::view('/apps/calendar', 'apps.calendar');

Route::view('/apps/invoice/list', 'apps.invoice.list');
Route::view('/apps/invoice/preview', 'apps.invoice.preview');
Route::view('/apps/invoice/add', 'apps.invoice.add');
Route::view('/apps/invoice/edit', 'apps.invoice.edit');

Route::view('/components/tabs', 'ui-components.tabs');
Route::view('/components/accordions', 'ui-components.accordions');
Route::view('/components/modals', 'ui-components.modals');
Route::view('/components/cards', 'ui-components.cards');
Route::view('/components/carousel', 'ui-components.carousel');
Route::view('/components/countdown', 'ui-components.countdown');
Route::view('/components/counter', 'ui-components.counter');
Route::view('/components/sweetalert', 'ui-components.sweetalert');
Route::view('/components/timeline', 'ui-components.timeline');
Route::view('/components/notifications', 'ui-components.notifications');
Route::view('/components/media-object', 'ui-components.media-object');
Route::view('/components/list-group', 'ui-components.list-group');
Route::view('/components/pricing-table', 'ui-components.pricing-table');
Route::view('/components/lightbox', 'ui-components.lightbox');

Route::view('/elements/alerts', 'elements.alerts');
Route::view('/elements/avatar', 'elements.avatar');
Route::view('/elements/badges', 'elements.badges');
Route::view('/elements/breadcrumbs', 'elements.breadcrumbs');
Route::view('/elements/buttons', 'elements.buttons');
Route::view('/elements/buttons-group', 'elements.buttons-group');
Route::view('/elements/color-library', 'elements.color-library');
Route::view('/elements/dropdown', 'elements.dropdown');
Route::view('/elements/infobox', 'elements.infobox');
Route::view('/elements/jumbotron', 'elements.jumbotron');
Route::view('/elements/loader', 'elements.loader');
Route::view('/elements/pagination', 'elements.pagination');
Route::view('/elements/popovers', 'elements.popovers');
Route::view('/elements/progress-bar', 'elements.progress-bar');
Route::view('/elements/search', 'elements.search');
Route::view('/elements/tooltips', 'elements.tooltips');
Route::view('/elements/treeview', 'elements.treeview');
Route::view('/elements/typography', 'elements.typography');

Route::view('/charts', 'charts');
Route::view('/widgets', 'widgets');
Route::view('/font-icons', 'font-icons');
Route::view('/dragndrop', 'dragndrop');

Route::view('/tables', 'tables');

Route::view('/datatables/advanced', 'datatables.advanced');
Route::view('/datatables/alt-pagination', 'datatables.alt-pagination');
Route::view('/datatables/basic', 'datatables.basic');
Route::view('/datatables/checkbox', 'datatables.checkbox');
Route::view('/datatables/clone-header', 'datatables.clone-header');
Route::view('/datatables/column-chooser', 'datatables.column-chooser');
Route::view('/datatables/export', 'datatables.export');
Route::view('/datatables/multi-column', 'datatables.multi-column');
Route::view('/datatables/multiple-tables', 'datatables.multiple-tables');
Route::view('/datatables/order-sorting', 'datatables.order-sorting');
Route::view('/datatables/range-search', 'datatables.range-search');
Route::view('/datatables/skin', 'datatables.skin');
Route::view('/datatables/sticky-header', 'datatables.sticky-header');

Route::view('/forms/basic', 'forms.basic');
Route::view('/forms/input-group', 'forms.input-group');
Route::view('/forms/layouts', 'forms.layouts');
Route::view('/forms/validation', 'forms.validation');
Route::view('/forms/input-mask', 'forms.input-mask');
Route::view('/forms/select2', 'forms.select2');
Route::view('/forms/touchspin', 'forms.touchspin');
Route::view('/forms/checkbox-radio', 'forms.checkbox-radio');
Route::view('/forms/switches', 'forms.switches');
Route::view('/forms/wizards', 'forms.wizards');
Route::view('/forms/file-upload', 'forms.file-upload');
Route::view('/forms/quill-editor', 'forms.quill-editor');
Route::view('/forms/markdown-editor', 'forms.markdown-editor');
Route::view('/forms/date-picker', 'forms.date-picker');
Route::view('/forms/clipboard', 'forms.clipboard');

Route::view('/users/profile', 'users.profile');
Route::view('/users/user-account-settings', 'users.user-account-settings');

Route::view('/pages/knowledge-base', 'pages.knowledge-base');
Route::view('/pages/contact-us-boxed', 'pages.contact-us-boxed');
Route::view('/pages/contact-us-cover', 'pages.contact-us-cover');
Route::view('/pages/faq', 'pages.faq');
Route::view('/pages/coming-soon-boxed', 'pages.coming-soon-boxed');
Route::view('/pages/coming-soon-cover', 'pages.coming-soon-cover');
Route::view('/pages/error404', 'pages.error404');
Route::view('/pages/error500', 'pages.error500');
Route::view('/pages/error503', 'pages.error503');
Route::view('/pages/maintenence', 'pages.maintenence');

Route::view('/auth/boxed-lockscreen', 'auth.boxed-lockscreen');
Route::view('/auth/boxed-signin', 'auth.boxed-signin');
Route::view('/auth/boxed-signup', 'auth.boxed-signup');
Route::view('/auth/boxed-password-reset', 'auth.boxed-password-reset');
Route::view('/auth/cover-login', 'auth.cover-login');
Route::view('/auth/cover-register', 'auth.cover-register');
Route::view('/auth/cover-lockscreen', 'auth.cover-lockscreen');
Route::view('/auth/cover-password-reset', 'auth.cover-password-reset');
