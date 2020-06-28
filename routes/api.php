<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Currency Histories
    Route::apiResource('currency-histories', 'CurrencyHistoryApiController');

    // Resources
    Route::post('resources/media', 'ResourcesApiController@storeMedia')->name('resources.storeMedia');
    Route::apiResource('resources', 'ResourcesApiController');

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
});
