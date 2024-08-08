<?php

use App\Http\Controllers\admin\AffiliateController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\CustomAuthController;
use App\Http\Controllers\admin\CustomerController as AdminCustomerController;
use App\Http\Controllers\admin\InvoiceController;
use App\Http\Controllers\admin\PostCategoryController;
use App\Http\Controllers\admin\PostController as AdminPostController;
use App\Http\Controllers\admin\PostTagController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\ServiceCategoryController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\SingleServiceController;
use App\Http\Controllers\admin\SocialController;
use App\Http\Controllers\admin\TestimonialController;
use App\Http\Controllers\admin\TicketController as AdminTicketController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Customer\TicketController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\PostController;
use App\Http\Controllers\front\ServiceController as FrontServiceController;
use App\Http\Controllers\front\SitemapController;
use Illuminate\Support\Facades\Route;

// Front Section Start
Route::controller(HomeController::class)->group(function() {
    Route::get('/', 'index')->name('home');
    Route::get('Blog', 'blog')->name('blog');
    Route::get('post/tag/{tag}', 'tag')->name('tag');
    Route::get('post/category/{category}', 'category')->name('category');
    Route::get('All-Services', 'allServices')->name('allServices');
    Route::post('contact/store', 'contactStore')->name('contact.store');
    Route::post('affiliate/store', 'affiliateStore')->name('affiliate.store');
    Route::post('review', 'reviewStore')->name('review.store');
    Route::get('testimonials', 'viewAllTestimonial')->name('viewAllTestimonial');
    Route::get('thankyou', 'thankyou')->name('thankyou');
    Route::get('thankyouStore', 'thankyouStore')->name('thankyouStore');
});

//Custom View Pages
Route::view('contact', 'front.contact')->name('contact');
Route::view('offers', 'front.coming-soon')->name('offers');
Route::view('careers', 'front.careers')->name('carrers');
Route::view('faq', 'front.faq')->name('faq');
Route::view('affiliate', 'front.affiliate')->name('affiliates');
Route::view('about', 'front.about')->name('about');
Route::view('terms-and-condition', 'front.terms')->name('terms');
Route::view('cancellation-policy', 'front.cancellation')->name('cancelPolicy');
Route::view('privacy-policy', 'front.privacy')->name('privacy');

Route::controller(SitemapController::class)->group(function() {
    Route::get('/sitemap.xml', 'index');
});

Route::get('/post/{slug}', [PostController::class, 'post'])->name('post');
Route::get('/services/{slug}', [FrontServiceController::class, 'singleService'])->name('singleService');
Route::Post('/services/singleForm/', [FrontServiceController::class, 'singleServiceForm'])->name('singleServiceForm.store');
// Front Section End

Route::name('admin.')->middleware(['guest:web'])->group(function () {
    Route::get('/login', [CustomAuthController::class, 'login'])->name('login');
    Route::post('/login-create', [CustomAuthController::class, 'login_create'])->name('login.create');
});

Route::name('customer.helpdesk.')->middleware(['guest:customer'])->group(function () {
    Route::controller(CustomerController::class)->group(function() {
        Route::get('helpdesk/customer/register', 'register')->name('register');
        Route::post('helpdesk/customer/register-create', 'register_create')->name('register.create');
        Route::get('helpdesk/customer/verifyOtp/{token}', 'verifyOtp')->name('register.verifyOtp');
        Route::post('helpdesk/customer/OtpSuccess', 'OtpSuccess')->name('register.OtpSuccess');
        Route::get('helpdesk/customer/login', 'login')->name('login');
        Route::post('helpdesk/customer/login-create', 'login_create')->name('login.create');
        Route::get('helpdesk/customer/verifyLoginOtp/', 'loginOtp')->name('login.loginOtp');
        Route::match(['get', 'post'], 'helpdesk/customer/LoginOtpSuccess', 'LoginOtpSuccess')->name('login.OtpSuccess');
        Route::get('helpdesk/customer/verify/resend', 'resend')->name('verify.resend');
    });
});

Route::group(['middleware' => 'PreventBackHistory'], function () {
    Route::name('customer.helpdesk.')->middleware(['auth:customer'])->group(function () {
        // Customer Dashboard
        Route::post('helpdesk/customer/logout', [CustomerController::class, 'logout'])->name('logout');
        Route::get('helpdesk/customer/dashboard/', [CustomerController::class, 'dashboard'])->name('dashboard');
        Route::get('helpdesk/customer/dashboard/document', [CustomerController::class, 'document'])->name('dashboard.document');
        Route::controller(TicketController::class)->group(function() {
            Route::post('helpdesk/customer/createTicket', 'createTicket')->name('ticket.create');
            Route::get('helpdesk/customer/fetchActiveTickets', 'fetchActiveTickets')->name('dashboard.fetchActiveTickets');
            Route::get('helpdesk/customer/fetchCompletedTickets', 'fetchCompletedTickets')->name('dashboard.fetchCompletedTickets');
            Route::get('helpdesk/customer/fetchAllTickets', 'fetchAllTickets')->name('dashboard.fetchAllTickets');
            Route::get('/helpdesk/customer/viewTicket/{id}', 'viewTicket')->name('dashboard.viewTicket');
            Route::post('/helpdesk/customer/replyTo/', 'replyTo')->name('dashboard.replyTo');
            Route::post('/helpdesk/customer/getMsgs', 'getMsgs')->name('dashboard.getMsgs');
        });
    });

    Route::name('admin.')->middleware(['auth:web'])->group(function () {
        Route::post('/logout', [CustomAuthController::class, 'logout'])->name('logout');

        /*------------------------------- User,Role & Permsission Side --------------------------------------*/
        Route::resource('admin/roles', RoleController::class);
        Route::resource('admin/users', UserController::class);

        /*------------------------------- Post Side --------------------------------------*/
        Route::post('admin/Blog/changeCheckedPost', [AdminPostController::class, 'changeCheckedPost'])->name('blog.changeCheckedPost');
        Route::resource('admin/Blog', AdminPostController::class);
        Route::resource('admin/category', PostCategoryController::class);
        Route::resource('admin/tag', PostTagController::class);

        /*------------------------------- Category Side --------------------------------------*/
        Route::post('admin/ServiceCategory/changeStatus/{id}', [ServiceCategoryController::class, 'changeStatus'])->name('ServiceCategory.changeStatus');
        Route::resource('admin/ServiceCategory', ServiceCategoryController::class);

        /*------------------------------- Service Side --------------------------------------*/
        Route::controller(ServiceController::class)->group(function () {
            Route::get('/admin/Service/listService', 'index')->name('service.listService');
            Route::get('admin/Service/addService', 'create')->name('service.addService');
            Route::post('/admin/Service/insertService', 'store')->name('service.insertService');
            Route::get('admin/Service/editService/{slug}', 'edit')->name('service.editService');
            Route::patch('admin/Service/editService/{slug}', 'update')->name('service.updateService');
            Route::get('admin/Service/deleteService/{slug}', 'destroy')->name('service.deleteService');
            Route::post('admin/Service/changeStatus', 'changeStatus')->name('service.changeStatus');
            Route::post('admin/Service/changeCheckedService', 'changeCheckedService')->name('service.changeCheckedService');
            Route::get('/admin/Service/onChangeSubCategory/{id}', 'onChangeSubCategory')->name('service.onChangeSubCategory');
        });

        /*------------------------------- Testimonial Side --------------------------------------*/
        Route::post('admin/Testimonial/changeStatus', [TestimonialController::class, 'changeStatus'])->name('Testimonial.changeStatus');
        Route::resource('admin/Testimonial', TestimonialController::class);

        /*------------------------------- Social Share Side --------------------------------------*/
        Route::match(['get', 'post'], 'admin/Social/Show', [SocialController::class, 'store'])->name('social.store');

        /*------------------------------- Contact Side --------------------------------------*/
        Route::resource('admin/Contact', ContactController::class);

        /*------------------------------- Affiliate Side --------------------------------------*/
        Route::resource('admin/Affiliate', AffiliateController::class);

        /*------------------------------- Single Service Side --------------------------------------*/
        Route::get('admin/SingleService/list', [SingleServiceController::class, 'index'])->name('singleService.list');

        /*------------------------------- Customer Side --------------------------------------*/
        Route::resource('admin/Customer', AdminCustomerController::class);

        /*------------------------------- Invoice Side --------------------------------------*/
        route::controller(InvoiceController::class)->group(function() {
            Route::get('/admin/Invoice/generate-pdf/{id}', 'generatePdf')->name('generate.pdf');
            Route::get('admin/Invoice/InvoiceList', 'index')->name('invoice.list');
            Route::get('admin/Invoice/InvoiceCreate', 'create')->name('invoice.create');
            Route::get('admin/Invoice/getCustomerAdd/{id}', 'getCustomerAdd')->name('invoice.getCustomerAdd');
            Route::get('admin/Invoice/InvoiceExport', 'export')->name('invoice.export');
            Route::post('admin/Invoice/InvoiceStore/', 'store')->name('invoice.store');
            Route::get('admin/Invoice/InvoiceShow/{id}', 'Show')->name('invoice.show');
            Route::get('admin/Invoice/InvoiceEdit/{id}', 'edit')->name('invoice.edit');
            Route::patch('admin/Invoice/InvoiceUpdate/{id}', 'update')->name('invoice.update');
            Route::delete('admin/Invoice/InvoiceDelete/{id}', 'destroy')->name('invoice.destroy');
            Route::post('admin/Invoice/InvoicePaid/', 'aspaid')->name('invoice.aspaid');
            Route::match(['get', 'post'], 'admin/Invoice/generate/{tktid}/customer/{custid}', 'generateInvoice')->name('invoice.generate');
        });

        /*------------------------------- Ticket Reply Side --------------------------------------*/
        route::controller(AdminTicketController::class)->group(function() {
            Route::get('/admin/Ticket/List-tickets', 'index')->name('ticket.listticket');
            Route::post('/admin/Ticket/changeStatus', 'changeStatus')->name('ticket.changeStatus');
            Route::get('/admin/Ticket/replyToCustomer/{id}', 'create')->name('ticket.replyToCustomer');
            Route::get('/admin/Ticket/showTicketStatusData/{status}', 'showTicketStatusData')->name('ticket.showTicketStatusData');
            Route::post('/admin/Ticket/assignTo', 'assignTo')->name('ticket.assignTo');
            Route::post('/admin/Ticket/replyTo/', 'replyTo')->name('ticket.replyTo');
            Route::post('/admin/Ticket/getMsgs', 'getMsgs')->name('ticket.getMsgs');
            Route::get('/admin/Ticket/Invoice/{tktid}/customer/{custid}', 'getInvoice')->name('ticket.getInvoice');
        });
    });
});
