<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

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
});
