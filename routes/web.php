<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);
// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::resource('users', 'UsersController', ['except' => ['destroy']]);

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Currencies
    Route::delete('currencies/destroy', 'CurrenciesController@massDestroy')->name('currencies.massDestroy');
    Route::resource('currencies', 'CurrenciesController');

    // Countries
    Route::delete('countries/destroy', 'CountriesController@massDestroy')->name('countries.massDestroy');
    Route::resource('countries', 'CountriesController');

    // Currency Histories
    Route::delete('currency-histories/destroy', 'CurrencyHistoryController@massDestroy')->name('currency-histories.massDestroy');
    Route::resource('currency-histories', 'CurrencyHistoryController');

    // Companies
    Route::delete('companies/destroy', 'CompaniesController@massDestroy')->name('companies.massDestroy');
    Route::resource('companies', 'CompaniesController');

    // Companies Bank Holidays
    Route::delete('companies-bank-holidays/destroy', 'CompaniesBankHolidaysController@massDestroy')->name('companies-bank-holidays.massDestroy');
    Route::resource('companies-bank-holidays', 'CompaniesBankHolidaysController');

    // Companies Holidays
    Route::delete('companies-holidays/destroy', 'CompaniesHolidaysController@massDestroy')->name('companies-holidays.massDestroy');
    Route::resource('companies-holidays', 'CompaniesHolidaysController');

    // Resources
    Route::delete('resources/destroy', 'ResourcesController@massDestroy')->name('resources.massDestroy');
    Route::post('resources/media', 'ResourcesController@storeMedia')->name('resources.storeMedia');
    Route::post('resources/ckmedia', 'ResourcesController@storeCKEditorImages')->name('resources.storeCKEditorImages');
    Route::resource('resources', 'ResourcesController');

    // House Holds
    Route::delete('house-holds/destroy', 'HouseHoldController@massDestroy')->name('house-holds.massDestroy');
    Route::resource('house-holds', 'HouseHoldController');

    // Contracts
    Route::delete('contracts/destroy', 'ContractsController@massDestroy')->name('contracts.massDestroy');
    Route::resource('contracts', 'ContractsController');

    // Salaries
    Route::delete('salaries/destroy', 'SalaryController@massDestroy')->name('salaries.massDestroy');
    Route::resource('salaries', 'SalaryController');

    // Benefits
    Route::delete('benefits/destroy', 'BenefitController@massDestroy')->name('benefits.massDestroy');
    Route::post('benefits/media', 'BenefitController@storeMedia')->name('benefits.storeMedia');
    Route::post('benefits/ckmedia', 'BenefitController@storeCKEditorImages')->name('benefits.storeCKEditorImages');
    Route::resource('benefits', 'BenefitController');

    // Company Calendars
    Route::resource('company-calendars', 'CompanyCalendarController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Education
    Route::delete('education/destroy', 'EducationController@massDestroy')->name('education.massDestroy');
    Route::resource('education', 'EducationController');

<<<<<<< HEAD
    // Holidays
    Route::delete('holidays/destroy', 'HolidaysController@massDestroy')->name('holidays.massDestroy');
    Route::resource('holidays', 'HolidaysController');

    // Job Grades
    Route::delete('job-grades/destroy', 'JobGradesController@massDestroy')->name('job-grades.massDestroy');
    Route::resource('job-grades', 'JobGradesController');

    // Job Experiences
    Route::delete('job-experiences/destroy', 'JobExperienceController@massDestroy')->name('job-experiences.massDestroy');
    Route::post('job-experiences/media', 'JobExperienceController@storeMedia')->name('job-experiences.storeMedia');
    Route::post('job-experiences/ckmedia', 'JobExperienceController@storeCKEditorImages')->name('job-experiences.storeCKEditorImages');
    Route::resource('job-experiences', 'JobExperienceController');

    // Languages
    Route::delete('languages/destroy', 'LanguagesController@massDestroy')->name('languages.massDestroy');
    Route::resource('languages', 'LanguagesController');

    // Pmps
    Route::delete('pmps/destroy', 'PmpController@massDestroy')->name('pmps.massDestroy');
    Route::resource('pmps', 'PmpController');

    // Pmp Details
    Route::delete('pmp-details/destroy', 'PmpDetailController@massDestroy')->name('pmp-details.massDestroy');
    Route::post('pmp-details/media', 'PmpDetailController@storeMedia')->name('pmp-details.storeMedia');
    Route::post('pmp-details/ckmedia', 'PmpDetailController@storeCKEditorImages')->name('pmp-details.storeCKEditorImages');
    Route::resource('pmp-details', 'PmpDetailController');

    // Presentations
    Route::delete('presentations/destroy', 'PresentationController@massDestroy')->name('presentations.massDestroy');
    Route::resource('presentations', 'PresentationController');

    // Trainings
    Route::delete('trainings/destroy', 'TrainingController@massDestroy')->name('trainings.massDestroy');
    Route::resource('trainings', 'TrainingController');

=======
>>>>>>> quickadminpanel_2020_06_28_07_35_51
    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
    }
});
