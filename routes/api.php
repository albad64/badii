<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Currency Histories
    Route::apiResource('currency-histories', 'CurrencyHistoryApiController');

    // Resources
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

    // Teams
    Route::apiResource('teams', 'TeamApiController');

    // Task Statuses
    Route::apiResource('task-statuses', 'TaskStatusApiController');

    // Task Tags
    Route::apiResource('task-tags', 'TaskTagApiController');

    // Tasks
    Route::post('tasks/media', 'TaskApiController@storeMedia')->name('tasks.storeMedia');
    Route::apiResource('tasks', 'TaskApiController');
});
