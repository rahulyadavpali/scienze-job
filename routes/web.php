<?php

Route::get('/login', function () { return redirect('/login'); });

// Web-Scraper ---
Route::get('/web-scrapper', 'Admin\ScraperController@index');

// Front-End Start ---
Route::get('/', 'HomeController@index');
Route::get('/home', 'Front\HomeController@index');

// Employer-Resgistration Start---
Route::get('/sign-up', 'Front\SignupController@select');
Route::get('/employer-signup', 'Front\SignupController@employer');
Route::post('/creat-employer', 'Front\SignupController@createemployer')->name('create.employer');
Route::get('/edit-employer/{id?}', 'Front\SignupController@edit')->name('auth.edit.employer');
Route::post('/update-employer/{id?}', 'Front\SignupController@updateemployer')->name('auth.update.employer');

Route::get('/your-jobs', 'Front\DashboardController@jobs')->name('your.jobs');
Route::get('/your-application', 'Front\DashboardController@application')->name('your.application');

// User Profile Routes ---
Route::get('/user', 'Front\DashboardController@index')->name('auth.user');
Route::get('/create-job', 'Front\JobController@create')->name('auth.create.job');
Route::post('/store-job', 'Front\JobController@store')->name('auth.create.store');
Route::get('/posting-job-successfully', 'Front\JobController@sucess')->name('posting.job.successfully');

Route::post('api/fetch-subcategory', 'Front\JobController@fetchSubcategory')->name('api.fetch.subcategory');

Route::get('/view-job/{id?}', 'Front\JobController@viewjob')->name('auth.job.view');
Route::get('/edit-job/{id?}', 'Front\JobController@editjob')->name('auth.edit.job');
Route::post('/update-job/{id?}', 'Front\JobController@updatejob')->name('auth.update.job');

Route::post('/in-activate-job/{id?}', 'Front\JobController@inactivate')->name('auth.job.inactive');

Route::get('/apply-job/{id?}', 'Front\JobController@apply_job')->name('auth.apply.job');
Route::post('/send-application', 'Front\JobController@send_application')->name('auth.send.application');

Route::get('/review-us/{id?}', 'Front\JobController@review')->name('auth.employer.review');
Route::post('/store-review', 'Front\JobController@store_review')->name('auth.employer.review.store');

// Email-Subscribe ---
Route::post('/subscribe-email/{id?}', 'Front\NewsletterController@subscribe')->name('auth.subscribe.email');
Route::post('/unsubscribe-email/{id?}', 'Front\NewsletterController@unsubscribe')->name('auth.unsubscribe.email');

// Job-Seeker-Resgistration Start---
Route::get('/job-seeker-signup', 'Front\SignupController@job_seeker');
Route::post('/creat-job-seeker', 'Front\SignupController@createseeker')->name('create.job-seeker');

Route::get('/creat-password', 'Front\SignupController@createpassword')->name('creat.password');
Route::post('/creating-user', 'Front\SignupController@storeuser')->name('creating.user');

Route::get('/edit-job-seeker/{id?}', 'Front\SignupController@editseeker')->name('auth.edit.seeker');
Route::post('/update-job-seeker/{id?}', 'Front\SignupController@updateseeker')->name('auth.update.jobseeker');

Route::get('/register-successfully', 'Front\RegisterController@success');

Route::get('/user-review/{id?}', 'Front\SignupController@review')->name('auth.seeker.review');

Route::get('/job-seeker-pdf', 'PdfController@jobseeker')->name('job.seeker.pdf');

// Advertisement-Resgistration Start---
Route::get('/advertiser-login', 'Front\AdvertisementController@login')->name('advertiser.login');
Route::post('login-advertisement', 'Auth\AdsController@login')->name('auth.login-advertisement');
Route::post('logout-advertisement', 'Auth\AdsController@logout')->name('auth.logout-advertisement');

Route::get('/advertiser-user', 'Front\DashboardadsController@index')->name('auth.user-advertiser');

Route::get('/advertiser-user/select-advertiser-plan/{id?}', 'Front\AdvertisementController@selectplan')->name('auth.user.select.advertiser.plan');
Route::get('/advertiser-user/create-ads/{id?}', 'Front\AdvertisementController@creatads')->name('auth.seller.create.ads');
Route::post('/advertiser-user/create-advertise', 'Front\AdvertisementController@createadvertise')->name('auth.seller.createadvertise');

Route::get('/advertisement-signup', 'Front\AdvertisementController@index');
Route::post('/creating-advertiser', 'Front\AdvertisementController@store')->name('creating.advertiser');
Route::get('/edit-advertiser/{id?}', 'Front\AdvertisementController@edit')->name('auth.edit.advertiser');
Route::post('/update-advertiser', 'Front\AdvertisementController@updateadvertiser')->name('auth.update.advertiser');

Route::get('/edit-advertiser-password/{id?}', 'Front\AdvertisementController@editpassword')->name('auth.edit.advertiser.password');
Route::post('/update-advertiser-password', 'Front\AdvertisementController@updatepassword')->name('auth.update.advertiser.password');

// Job-Info Start ---
Route::post('/save-posting-job', 'Front\JobController@creat_job')->name('save.job.posting');
Route::get('/posting-job-successfully', 'Front\JobController@sucess')->name('posting.job.successfully');

Route::get('/job', 'Front\JobController@index')->name('job.index');
Route::get('/show-all-jobs', 'Front\JobController@alljobs')->name('job.alljobs');
Route::get('/job-view/{id?}', 'Front\JobController@show')->name('job.show');
Route::get('/employer-detail/{id?}', 'Front\JobController@employer_detail')->name('employer.detail');

Route::get('/post-job', 'Front\JobController@apply')->name('job.apply');
Route::post('/save-job', 'Front\JobController@save_apply')->name('job.apply.save');

// Data-Scraping-Info ---
Route::get('/other-official-jobs', 'Front\ScrapingController@index')->name('other.official.jobs');
Route::post('/feed-search', 'Front\ScrapingController@search')->name('feed.search');

// Filter Start ---
Route::post('/job-search', 'Front\FilterConntroller@search')->name('job.search');
Route::get('/job-type/{id?}', 'Front\FilterConntroller@jobType')->name('job.type');
Route::get('/job-category/{id?}', 'Front\FilterConntroller@jobCategory')->name('job.category');
Route::get('/job-designation/{id?}', 'Front\FilterConntroller@jobDesignation')->name('job.designation');
Route::get('/job-location/{id?}', 'Front\FilterConntroller@jobLocation')->name('job.location');

// Plans Start ---
Route::get('/plan', 'Front\PlanController@index')->name('plans.index');

// Blog Start ---
Route::resource('blog', 'Front\BlogController');
Route::get('/blog', 'Front\BlogController@index')->name('blog.index');

// Contact Start ---
Route::get('/contact', 'Front\ContactController@index');
Route::post('/store-contact', 'Front\ContactController@capthcaFormValidate');
Route::get('/reload-captcha', 'Front\ContactController@reloadCaptcha');

// Register Start ---
Route::resource('register', 'Front\RegisterController');
Route::get('/register', 'Front\RegisterController@index')->name('register.index');
Route::post('/save-registration', 'Front\RegisterController@store')->name('save.registration');

// Information Start ---
Route::get('/terms-and-conditions', 'Front\InformationController@terms');
Route::get('/privacy-policy', 'Front\InformationController@privacy');
Route::get('/about-us', 'Front\InformationController@about');
Route::get('/faqs', 'Front\InformationController@faqs');
Route::get('/advertising-with-us', 'Front\InformationController@advertising');

// User Authentication Routes ---
Route::get('/user-login', 'Front\LoginController@index');
Route::post('login-user', 'Auth\UserController@login')->name('auth.login-user');
Route::post('logout-user', 'Auth\UserController@logout')->name('auth.logout-user');

// Authentication Routes ---
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('auth.login');
Route::post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Admin Routes...
Route::get('home', 'Admin\HomeController@index')->name('auth.home');

// Home-Page-Banner
Route::get('admin/home/banner/{id?}', 'Admin\HomeController@view_banner')->name('admin.home.banner.show');
Route::get('admin/home/edit-banner/{id?}', 'Admin\HomeController@edit_banner')->name('admin.home.banner.edit');
Route::post('home/update-banner/', 'Admin\HomeController@update_banner')->name('admin.home.banner.update');

// Top-Companies
Route::get('admin/home/top-companies/', 'Admin\HomeController@view_companies')->name('admin.home.view.companies');
Route::get('admin/home/edit-top-companies/{id?}', 'Admin\HomeController@edit_companies')->name('admin.home.edit.companies');
Route::post('admin/home/update-top-company/', 'Admin\HomeController@update_companies')->name('admin.home.company.update');

// Top-Companies
Route::get('admin/home/client-review/', 'Admin\HomeController@client_review')->name('admin.home.client');
Route::get('admin/home/offers-section/', 'Admin\HomeController@offer_section')->name('admin.home.offers');
Route::get('admin/home/offers-section/create', 'Admin\HomeController@offer_create')->name('admin.home.offers.create');
Route::post('admin/home/offers-section/store', 'Admin\HomeController@offer_store')->name('admin.home.offers.store');
Route::get('admin/home/offers-section/edit/{id?}', 'Admin\HomeController@offer_edit')->name('admin.home.offers.edit');
Route::post('admin/home/offers-section/update/{id?}', 'Admin\HomeController@offer_update')->name('admin.home.offers.update');
Route::DELETE('admin/home/offers-section/delete/{id?}', 'Admin\HomeController@offer_destroy')->name('admin.home.offers.delete');

Route::get('form_list', 'Admin\FormController@index')->name('auth.form_list');

Route::get('form/create_table/{id?}', 'Admin\FormController@create_table')->name('admin.form.create_table');
Route::post('form/add_table/', 'Admin\FormController@add_table')->name('admin.form.add_table');
Route::get('form/edit_table/{id?}', 'Admin\FormController@edit_table')->name('admin.form.edit_table');
Route::post('form/update_table/{id?}', 'Admin\FormController@update_table')->name('admin.form.update_table');

Route::get('information_list', 'Admin\InformationController@index')->name('auth.information_list');

Route::get('enquiry_list', 'Admin\InformationController@contactlist')->name('auth.enquiry_list');
Route::get('registration_list', 'Admin\RegistrationController@index')->name('auth.registration_list');

Route::get('admin/job/applicant/{id?}', 'Admin\JobController@view_applicant')->name('auth.admin.applicants');

Route::get('admin/job/view-institutes-job/{id?}', 'Admin\JobController@job_list')->name('admin.job.list');
Route::post('admin/job/delete-institute-job/{id?}', 'Admin\JobController@delete_job')->name('admin.job.deletes');

// Change Password Routes...
Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function (){
    Route::get('/dashboard', 'Admin\DashboardController@index');

    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);

    // Setting-Managment-routes ---
    Route::resource('setting', 'Admin\SettingController');
    Route::post('setting_mass_destroy', ['uses' => 'Admin\SettingController@massDestroy', 'as' => 'setting.mass_destroy']);
    Route::post('get-setting', ['uses' => 'Admin\SettingController@getSetting', 'as' => 'get.setting']);

    // Job-Managment-routes ---
    Route::resource('job', 'Admin\JobController');
    Route::post('job_mass_destroy', ['uses' => 'Admin\JobController@massDestroy', 'as' => 'job.mass_destroy']);
    Route::post('get-job', ['uses' => 'Admin\JobController@getJob', 'as' => 'get.job']);

    // SEO-Managment-routes ---
    Route::resource('seo', 'Admin\SeoController');
    Route::post('seo_mass_destroy', ['uses' => 'Admin\SeoController@massDestroy', 'as' => 'seo.mass_destroy']);
    Route::post('get-seo', ['uses' => 'Admin\SeoController@getSeo', 'as' => 'get.seo']);

    // Home-Managment-routes ---
    Route::resource('home', 'Admin\HomeController');
    Route::post('home_mass_destroy', ['uses' => 'Admin\HomeController@massDestroy', 'as' => 'home.mass_destroy']);
    Route::post('get-home', ['uses' => 'Admin\HomeController@getHome', 'as' => 'get.home']);

    // Plans-Managment-routes ---
    Route::resource('plan', 'Admin\PlanController');
    Route::post('plan_mass_destroy', ['uses' => 'Admin\PlanController@massDestroy', 'as' => 'plan.mass_destroy']);
    Route::post('get-plan', ['uses' => 'Admin\PlanController@getPlan', 'as' => 'get.plan']);
    Route::post('update-plans', 'Admin\PlanController@update')->name('plan.update');

    // Website-Managment-routes ---
    Route::resource('website', 'Admin\WebsiteController');
    Route::post('website_mass_destroy', ['uses' => 'Admin\WebsiteController@massDestroy', 'as' => 'website.mass_destroy']);
    Route::post('get-website', ['uses' => 'Admin\WebsiteController@getWebsite', 'as' => 'get.website']);
    Route::post('update-website', 'Admin\WebsiteController@update')->name('website.update');

    // Advertisment-Managment-routes ---
    Route::resource('advertisment', 'Admin\AdvertisementController');
    Route::post('advertisment_mass_destroy', ['uses' => 'Admin\AdvertisementController@massDestroy', 'as' => 'advertisment.mass_destroy']);
    Route::post('get-advertisment', ['uses' => 'Admin\AdvertisementController@getPlan', 'as' => 'get.advertisment']);
    Route::post('update-advertisment', 'Admin\AdvertisementController@update')->name('advertisment.update');

    // FAQ-Managment-routes ---
    Route::resource('faq', 'Admin\FaqController');
    Route::post('faq_mass_destroy', ['uses' => 'Admin\FaqController@massDestroy', 'as' => 'faq.mass_destroy']);
    Route::post('get-faq', ['uses' => 'Admin\FaqController@getFaq', 'as' => 'get.faq']);

    // Blog-Managment-routes ---
    Route::resource('blog', 'Admin\BlogController');
    Route::post('blog_mass_destroy', ['uses' => 'Admin\BlogController@massDestroy', 'as' => 'blog.mass_destroy']);
    Route::post('get-blog', ['uses' => 'Admin\BlogController@getBlog', 'as' => 'get.blog']);

    // Category-Managment-routes ---
    Route::resource('category', 'Admin\CategoryController');
    Route::post('category_mass_destroy', ['uses' => 'Admin\CategoryController@massDestroy', 'as' => 'category.mass_destroy']);
    Route::post('get-category', ['uses' => 'Admin\CategoryController@getCategory', 'as' => 'get.category']);

    // Sub-Category-Managment-routes ---
    Route::resource('subcategory', 'Admin\SubcategoryController');
    Route::post('subcategory_mass_destroy', ['uses' => 'Admin\SubcategoryController@massDestroy', 'as' => 'subcategory.mass_destroy']);
    Route::post('get-subcategory', ['uses' => 'Admin\SubcategoryController@getJob', 'as' => 'get.subcategory']);

    // Job-Designation-Managment-routes ---
    Route::resource('designation', 'Admin\DesignationController');
    Route::post('designation_mass_destroy', ['uses' => 'Admin\DesignationController@massDestroy', 'as' => 'designation.mass_destroy']);
    Route::post('get-designation', ['uses' => 'Admin\DesignationController@getJob', 'as' => 'get.designation']);

    // Job-Type-Managment-routes ---
    Route::resource('jobtype', 'Admin\JobtypeController');
    Route::post('jobtype_mass_destroy', ['uses' => 'Admin\JobtypeController@massDestroy', 'as' => 'jobtype.mass_destroy']);
    Route::post('get-jobtype', ['uses' => 'Admin\JobtypeController@getJob', 'as' => 'get.jobtype']);

    // Job-Location-Managment-routes ---
    Route::resource('joblocation', 'Admin\JoblocationController');
    Route::post('joblocation_mass_destroy', ['uses' => 'Admin\JoblocationController@massDestroy', 'as' => 'joblocation.mass_destroy']);
    Route::post('get-joblocation', ['uses' => 'Admin\JoblocationController@getJob', 'as' => 'get.joblocation']);

    // Form-routes ---
    Route::resource('form', 'Admin\FormController');
    Route::post('form_mass_destroy', ['uses' => 'Admin\FormController@massDestroy', 'as' => 'form.mass_destroy']);
    Route::post('get-form', ['uses' => 'Admin\FormController@getForm', 'as' => 'get.form']);

    // Information-routes ---
    Route::resource('information', 'Admin\InformationController');
    Route::post('information_mass_destroy', ['uses' => 'Admin\InformationController@massDestroy', 'as' => 'information.mass_destroy']);
    Route::post('get-information', ['uses' => 'Admin\InformationController@getInformation', 'as' => 'get.information']);

    // Registration-routes ---
    Route::resource('registration', 'Admin\RegistrationController');
    Route::post('registration', ['uses' => 'Admin\RegistrationController@massDestroy', 'as' => 'registration.mass_destroy']);
    Route::post('get-registration', ['uses' => 'Admin\RegistrationController@getRegistration', 'as' => 'get.registration']);
    Route::post('registration_deactivate/{id}', ['uses' => 'Admin\RegistrationController@deactivate', 'as' => 'registration.deactivate']);
    Route::post('registration_active/{id}', ['uses' => 'Admin\RegistrationController@active', 'as' => 'registration.active']);

    // Contact-routes ---
    Route::post('mass_destroy_contact', ['uses' => 'Admin\InformationController@mass_destroy_contact', 'as' => 'contact.mass_destroy_contact']);

});
