<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Business Partner
    Route::delete('business-partners/destroy', 'BusinessPartnerController@massDestroy')->name('business-partners.massDestroy');
    Route::post('business-partners/parse-csv-import', 'BusinessPartnerController@parseCsvImport')->name('business-partners.parseCsvImport');
    Route::post('business-partners/process-csv-import', 'BusinessPartnerController@processCsvImport')->name('business-partners.processCsvImport');
    Route::resource('business-partners', 'BusinessPartnerController');

    // Company
    Route::delete('companies/destroy', 'CompanyController@massDestroy')->name('companies.massDestroy');
    Route::post('companies/parse-csv-import', 'CompanyController@parseCsvImport')->name('companies.parseCsvImport');
    Route::post('companies/process-csv-import', 'CompanyController@processCsvImport')->name('companies.processCsvImport');
    Route::resource('companies', 'CompanyController');

    // Construction
    Route::delete('constructions/destroy', 'ConstructionController@massDestroy')->name('constructions.massDestroy');
    Route::post('constructions/parse-csv-import', 'ConstructionController@parseCsvImport')->name('constructions.parseCsvImport');
    Route::post('constructions/process-csv-import', 'ConstructionController@processCsvImport')->name('constructions.processCsvImport');
    Route::resource('constructions', 'ConstructionController');

    // Exam
    Route::delete('exams/destroy', 'ExamController@massDestroy')->name('exams.massDestroy');
    Route::post('exams/parse-csv-import', 'ExamController@parseCsvImport')->name('exams.parseCsvImport');
    Route::post('exams/process-csv-import', 'ExamController@processCsvImport')->name('exams.processCsvImport');
    Route::resource('exams', 'ExamController');

    // Occupation
    Route::delete('occupations/destroy', 'OccupationController@massDestroy')->name('occupations.massDestroy');
    Route::post('occupations/parse-csv-import', 'OccupationController@parseCsvImport')->name('occupations.parseCsvImport');
    Route::post('occupations/process-csv-import', 'OccupationController@processCsvImport')->name('occupations.processCsvImport');
    Route::resource('occupations', 'OccupationController');

    // Salary
    Route::delete('salaries/destroy', 'SalaryController@massDestroy')->name('salaries.massDestroy');
    Route::post('salaries/parse-csv-import', 'SalaryController@parseCsvImport')->name('salaries.parseCsvImport');
    Route::post('salaries/process-csv-import', 'SalaryController@processCsvImport')->name('salaries.processCsvImport');
    Route::resource('salaries', 'SalaryController');

    // Admission
    Route::delete('admissions/destroy', 'AdmissionController@massDestroy')->name('admissions.massDestroy');
    Route::post('admissions/parse-csv-import', 'AdmissionController@parseCsvImport')->name('admissions.parseCsvImport');
    Route::post('admissions/process-csv-import', 'AdmissionController@processCsvImport')->name('admissions.processCsvImport');
    Route::resource('admissions', 'AdmissionController');

    // Hiring
    Route::delete('hirings/destroy', 'HiringController@massDestroy')->name('hirings.massDestroy');
    Route::post('hirings/parse-csv-import', 'HiringController@parseCsvImport')->name('hirings.parseCsvImport');
    Route::post('hirings/process-csv-import', 'HiringController@processCsvImport')->name('hirings.processCsvImport');
    Route::resource('hirings', 'HiringController');

    // Third Party Registration
    Route::delete('third-party-registrations/destroy', 'ThirdPartyRegistrationController@massDestroy')->name('third-party-registrations.massDestroy');
    Route::post('third-party-registrations/parse-csv-import', 'ThirdPartyRegistrationController@parseCsvImport')->name('third-party-registrations.parseCsvImport');
    Route::post('third-party-registrations/process-csv-import', 'ThirdPartyRegistrationController@processCsvImport')->name('third-party-registrations.processCsvImport');
    Route::resource('third-party-registrations', 'ThirdPartyRegistrationController');

    // Transfer
    Route::delete('transfers/destroy', 'TransferController@massDestroy')->name('transfers.massDestroy');
    Route::resource('transfers', 'TransferController');

    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
