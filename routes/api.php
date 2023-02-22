<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Business Partner
    Route::apiResource('business-partners', 'BusinessPartnerApiController');

    // Company
    Route::apiResource('companies', 'CompanyApiController');

    // Construction
    Route::apiResource('constructions', 'ConstructionApiController');

    // Exam
    Route::apiResource('exams', 'ExamApiController');

    // Occupation
    Route::apiResource('occupations', 'OccupationApiController');

    // Salary
    Route::apiResource('salaries', 'SalaryApiController');

    // Admission
    Route::apiResource('admissions', 'AdmissionApiController');

    // Hiring
    Route::apiResource('hirings', 'HiringApiController');

    // Third Party Registration
    Route::apiResource('third-party-registrations', 'ThirdPartyRegistrationApiController');

    // Transfer
    Route::apiResource('transfers', 'TransferApiController');
});
