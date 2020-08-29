<?php

    Auth::routes();

  Route::get('/home', 'AdminController@index')->name('home');

  //Cornfirm Email account
Route::get('/confirm/{code}', 'AdminController@confirmAccount');
// Auth::routes();
Route::match(['get','post'],'/', 'AdultController@addAdult');
Route::match(['get','post'],'/children-service', 'ChildrenController@addChild')->name('children-service');

Route::get('admin/login', 'AdminLoginController@ShowLoginForm');
Route::post('admin/login', 'AdminLoginController@login');
Route::get('admin/logout', 'AdminController@logout');
Route::match(['get','post'],'admin-forgot-password','AdminController@forgotPassword');


Route::group(['prefix' => 'admin', 'middleware' => ['adminlogin']], function() {

    Route::get('/dashboard', 'AdminController@dashboard');
    Route::get('/settings', 'AdminController@settings')->name('admin.settings');
    Route::get('/check-pwd', 'AdminController@chkPassword');
    Route::match(['get','post'],'/update-pwd', 'AdminController@updatePassword');

    //collection route
    Route::match(['get','post'],'/add-collection', 'CollectionController@addCollection')->name('admin.add-collection');


    //title route
    Route::match(['get','post'],'/add-title', 'TitleController@addTitle')->name('admin.add-title');
    Route::get('/view-titles', 'TitleController@viewTitles');
    Route::match(['get','post'],'/edit-title/{id}', 'TitleController@editTitle')->name('admin.edit-title');
    Route::match(['get','post'],'/delete-title/{id}', 'TitleController@deleteTitle');

    //Bible Class route
    Route::match(['get','post'],'/add-class', 'TitleController@addClass')->name('admin.add-class');
    Route::get('/view-classes', 'TitleController@viewClasses');
    Route::match(['get','post'],'/edit-class/{id}', 'TitleController@editClass')->name('admin.edit-class');
    Route::match(['get','post'],'/delete-class/{id}', 'TitleController@deleteClass');

    //organisation route
    Route::match(['get','post'],'/add-organisation', 'TitleController@addOrganisation')->name('admin.add-organisation');
    Route::get('/view-organisations', 'TitleController@viewOrganisations');
    Route::match(['get','post'],'/edit-organisation/{id}', 'TitleController@editOrganisation')->name('admin.edit-organisation');
    Route::get('/delete-organisation/{id}', 'TitleController@deleteOrganisation');

    //Service Type route
    Route::match(['get','post'],'/add-service_type', 'TitleController@addService')->name('admin.add-service_type');
    Route::get('/view-service_types', 'TitleController@viewServices');
    Route::match(['get','post'],'/edit-service_type/{id}', 'TitleController@editService')->name('admin.edit-service_type');
    Route::get('/delete-service_type/{id}', 'TitleController@deleteService');

    //Class Leaders route
    Route::match(['get','post'],'/add-class_leader', 'TitleController@addClassleader')->name('admin.add-class_leader');
    Route::get('/view-class_leaders', 'TitleController@viewClassleaders');
    Route::match(['get','post'],'/edit-class_leader/{id}', 'TitleController@editClassleader')->name('admin.edit-class_leader');
    Route::match(['get','post'],'/delete-class_leader/{id}', 'TitleController@deleteClassleader');
    Route::get('/delete-class_leader-image/{id}', 'TitleController@deleteClassleaderImage');

    //Children Class route
    Route::match(['get','post'],'/add-childclass', 'TitleController@addChildClass')->name('admin.add-childclass');
    Route::get('/view-childclasses', 'TitleController@viewChildClasses');
    Route::match(['get','post'],'/edit-childclass/{id}', 'TitleController@editChildClass')->name('admin.edit-childclass');
    Route::match(['get','post'],'/delete-class/{id}', 'TitleController@deleteChildClass');

    //view children first service
    Route::get('/view-children_first-service', 'ChildrenController@viewChildFirstService');
    Route::get('/view-children_firstservice/{id}', 'ChildrenController@viewChildFirstServiceDetails');
    Route::match(['get','post'],'/edit-children_firstservice/{id}', 'ChildrenController@editChildFirstService');
    Route::get('/delete-children_first-service/{id}', 'ChildrenController@deleteChildFirstService');

    //view children second service
    Route::get('/view-children_second-service', 'ChildrenController@viewChildSecondService');
    Route::get('/view-children_secondservice/{id}', 'ChildrenController@viewChildSecondServiceDetails');
    Route::match(['get','post'],'/edit-children_secondservice/{id}', 'ChildrenController@editChildSecondService');
    Route::get('/delete-children_second-service/{id}', 'ChildrenController@deleteChildSecondService');

    //Exams Year route
    Route::match(['get','post'],'/add-year', 'AttendanceController@addYear')->name('admin.add-year');
    Route::post('/edit-year/{id}', 'AttendanceController@editYear')->name('admin.edit-year');

    //Children Marks
    Route::get('/marks', 'MarksController@marks')->name('admin.marks');
    Route::post('/marks', 'MarksController@marksList')->name('admin.marks');
    Route::post('/save-marks', 'MarksController@saveMarks')->name('admin.save.marks');
    Route::get('/view-marks', 'MarksController@view');
    Route::get('/mark/edit/{month}', 'MarksController@edit');
    Route::get('/mark/details/{month_id}', 'MarksController@details')->name('admin.mark-details');

    //children attendance
    Route::get('/attendance', 'AttendanceController@attendance')->name('admin.attendance');
    Route::post('/attendance', 'AttendanceController@attendList')->name('admin.attendance');
    Route::get('/attend-view', 'AttendanceController@view')->name('admin.attend-view');
    Route::post('/attend/store', 'AttendanceController@store')->name('admin.save.attendance');
    Route::get('/attend/edit/{date}', 'AttendanceController@edit');
    Route::get('/attend/details/{date}', 'AttendanceController@details')->name('admin.attend-details');

    //Marks route
    // Route::get('/add-marks','MarksController@add')->name('marks.add');
    // Route::get('/store-marks','MarksController@store')->name('admin.marks-store');
    // Route::get('/get-children','MarksController@getChildren')->name('get-children');

    //view-teacher first service
    Route::get('/view-teachers_first-service', 'ChildrenController@viewTeacherFirstService');
    Route::get('/view-teachers_firstservice/{id}', 'ChildrenController@viewTeacherFirstServiceDetails');
    Route::match(['get','post'],'/edit-teachers_firstservice/{id}', 'ChildrenController@editTeacherFirstService');
    Route::get('/delete-teachers_first-service/{id}', 'ChildrenController@deleteTeacherFirstService');

    //view-teacher second service
    Route::get('/view-teachers_second-service', 'ChildrenController@viewTeacherSecondService');
    Route::get('/view-teachers_secondservice/{id}', 'ChildrenController@viewTeacherSecondServiceDetails');
    Route::match(['get','post'],'/edit-teachers_secondservice/{id}', 'ChildrenController@editTeacherSecondService');
    Route::get('/delete-teachers_second-service/{id}', 'ChildrenController@deleteTeacherSecondService');

    //view-adult First service
    Route::get('/view-adult_first-service', 'AdultController@viewAdultFirstService');
    Route::get('/view-adult_firstservice/{id}', 'AdultController@viewAdultFirstServiceDetails');
    Route::match(['get','post'],'/edit-adult_firstservice/{id}', 'AdultController@editAdultFirstService');
    Route::get('/delete-adult_first-service/{id}', 'AdultController@deleteAdultFirstService');


    //view-adult Second service
    Route::get('/view-adult_second-service', 'AdultController@viewAdultSecondService');
    Route::get('/view-adult_secondservice/{id}', 'AdultController@viewAdultSecondServiceDetails');
    Route::match(['get','post'],'/edit-adult_secondservice/{id}', 'AdultController@editAdultSecondService');
    Route::get('/delete-adult_second-service/{id}', 'AdultController@deleteAdultSecondService');


    //Admin/Sub-Admins Route
    Route::get('/view-admins', 'AdminController@viewAdmins');
    //add Admin/Sub-Admins Route
    Route::match(['get','post'], '/add-admin', 'AdminController@addAdmin')->name('admin.add-admin');
    //edit Admin/Sub-Admins Route
    Route::match(['get','post'], '/edit-admin/{id}', 'AdminController@editAdmin');
});

