<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Currency Histories
    Route::apiResource('currency-histories', 'CurrencyHistoryApiController');

    // Resources
    Route::post('resources/media', 'ResourcesApiController@storeMedia')->name('resources.storeMedia');
    Route::apiResource('resources', 'ResourcesApiController');

<<<<<<< HEAD
=======
    // Users
    Route::apiResource('users', 'UsersApiController');

    // Currencies
    Route::apiResource('currencies', 'CurrenciesApiController');

    // Countries
    Route::apiResource('countries', 'CountriesApiController');

    // Currency Histories
    Route::apiResource('currency-histories', 'CurrencyHistoryApiController');

    // Companies
    Route::apiResource('companies', 'CompaniesApiController');

    // Companies Bank Holidays
    Route::apiResource('companies-bank-holidays', 'CompaniesBankHolidaysApiController');

    // Companies Holidays
    Route::apiResource('companies-holidays', 'CompaniesHolidaysApiController');

    // Resources
    Route::post('resources/media', 'ResourcesApiController@storeMedia')->name('resources.storeMedia');
    Route::apiResource('resources', 'ResourcesApiController');

>>>>>>> quickadminpanel_2020_06_28_07_35_51
    // House Holds
    Route::apiResource('house-holds', 'HouseHoldApiController');

    // Contracts
    Route::apiResource('contracts', 'ContractsApiController');

    // Salaries
    Route::apiResource('salaries', 'SalaryApiController');

    // Benefits
    Route::post('benefits/media', 'BenefitApiController@storeMedia')->name('benefits.storeMedia');
    Route::apiResource('benefits', 'BenefitApiController');

    // Education
    Route::apiResource('education', 'EducationApiController');
<<<<<<< HEAD

    // Holidays
    Route::apiResource('holidays', 'HolidaysApiController');

    // Job Experiences
    Route::post('job-experiences/media', 'JobExperienceApiController@storeMedia')->name('job-experiences.storeMedia');
    Route::apiResource('job-experiences', 'JobExperienceApiController');

    // Languages
    Route::apiResource('languages', 'LanguagesApiController');

    // Pmps
    Route::apiResource('pmps', 'PmpApiController');

    // Pmp Details
    Route::post('pmp-details/media', 'PmpDetailApiController@storeMedia')->name('pmp-details.storeMedia');
    Route::apiResource('pmp-details', 'PmpDetailApiController');

    // Presentations
    Route::apiResource('presentations', 'PresentationApiController');

    // Trainings
    Route::apiResource('trainings', 'TrainingApiController');
=======
>>>>>>> quickadminpanel_2020_06_28_07_35_51
});
