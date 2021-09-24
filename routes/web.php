<?php

use Illuminate\Support\Facades\Route;




//---------------------------------USER-LOGIN-------------------------------

    Route::get('/login/user',[
            App\Http\Controllers\DashboardController::class,'showUserLogin']
    )->name('user-login');
    
    Route::post('/user/sign-in', [
            App\Http\Controllers\DashboardController::class, 'signInUser']
    )->name('user-sign-in');




// ----------------------- ADMIN -------------------------

    Route::middleware(['checkAdminAuth'])->group(function () {

        //----------------department ---------------------

        Route::get('/department/add',[
                App\Http\Controllers\DepartmentController::class,'showAddDepartment']
        )->name('add-department');

        Route::get('/department/manage',[
                App\Http\Controllers\DepartmentController::class,'showManageDepartment']
        )->name('manage-department');
        Route::post('/department/save',[
                App\Http\Controllers\DepartmentController::class,'saveDepartment']
        )->name('new-department');
        Route::get('/department/delete/{id}',[
                App\Http\Controllers\DepartmentController::class,'deleteDepartment']
        )->name('delete-department');

        //----------------manager ---------------------

        Route::get('/manager/add',[
                App\Http\Controllers\ManagerController::class,'showAddManager']
        )->name('add-manager');

        Route::get('/manager/manage',[
                App\Http\Controllers\ManagerController::class,'showManageManager']
        )->name('manage-manager');

        Route::post('/manager/save',[
                App\Http\Controllers\ManagerController::class,'saveManager']
        )->name('new-manager');

        Route::get('/manager/details/{id}',[
                App\Http\Controllers\ManagerController::class,'showManagerDetails']
        )->name('view-details');

        Route::get('/manager/delete/{id}',[
                App\Http\Controllers\ManagerController::class,'deleteManager']
        )->name('delete-manager');
        Route::post('/manager/save',[
                App\Http\Controllers\ManagerController::class,'saveManager']
        )->name('new-manager');

        Route::get('/manager/details/{id}',[
                App\Http\Controllers\ManagerController::class,'showManagerDetails']
        )->name('view-manager-details');

        Route::get('/manager/delete/{id}',[
                App\Http\Controllers\ManagerController::class,'deleteManager']
        )->name('delete-manager');

        //----------------task ---------------------

        Route::get('/task/add',[
                App\Http\Controllers\TaskController::class,'showAddTask']
        )->name('add-task');

        Route::get('/task/manage',[
                App\Http\Controllers\TaskController::class,'showManageTask']
        )->name('manage-task');

        Route::get('/get/managers/{id}',[App\Http\Controllers\TaskController::class,'getManagers']);

        Route::post('/task/save',[
                App\Http\Controllers\TaskController::class,'saveTask']
        )->name('new-task');

        Route::get('/task/details/{id}',[
                App\Http\Controllers\TaskController::class,'showTaskDetails']
        )->name('view-task-details');

        Route::get('/task/file-view/{id}',[
                App\Http\Controllers\TaskController::class,'showTaskFile']
        )->name('view-task-file');

        Route::get('/task/file-download/{file}',[
                App\Http\Controllers\TaskController::class,'downloadTaskFile']
        )->name('download-task-file');

        Route::get('/task/edit/{id}',[
                App\Http\Controllers\TaskController::class,'showEditTask']
        )->name('edit-task');

        Route::post('/task/update',[
                App\Http\Controllers\TaskController::class,'updateTask']
        )->name('update-task');




    });

    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//---------------------------MANAGER-----------------------------

    Route::middleware(['checkManagerAuth'])->group(function () {


        //----------------------------auth--------------------

        Route::get('/manager',[
                App\Http\Controllers\DashboardController::class,'showManagerDashboard']
        )->name('manager');

        Route::post('/user/sign-out',[
                App\Http\Controllers\DashboardController::class,'signOutUser']
        )->name('user-sign-out');


        //---------------------------manager---------------------

        Route::get('/manager/profile', [
                App\Http\Controllers\ManagerController::class, 'showManagerProfile']
        )->name('manager-profile');

        Route::get('/manager/profile-edit', [
                App\Http\Controllers\ManagerController::class, 'editManagerProfile']
        )->name('edit-manager-profile');

        Route::post('/manager/profile-edit', [
                App\Http\Controllers\ManagerController::class, 'updateManagerProfile']
        )->name('update-manger-info');

        //---------------------------task------------------------

        Route::get('/manager/new-task', [
                App\Http\Controllers\TaskController::class, 'showNewTask']
        )->name('manager-show-new-task');

        Route::get('/manager/task/details/{id}', [
                App\Http\Controllers\TaskController::class, 'showTaskDetailsToManager']
        )->name('manager-view-task-details');

        Route::get('/manager/task/assign/{id}', [
                App\Http\Controllers\TaskController::class, 'showTaskAssignByManager']
        )->name('manager-assign-task');

        Route::post('/manager/task/assign/new', [
                App\Http\Controllers\TaskController::class, 'AssignNewTaskToEmployee']
        )->name('assign-new-task');

        Route::get('/manager/task/show', [
                App\Http\Controllers\TaskController::class, 'showPendingTaskToManager']
        )->name('manager-show-pending-task');

        Route::get('/manager/show/pending-task-details/{id}', [
                App\Http\Controllers\TaskController::class, 'showPendingTaskDetailsToManager']
        )->name('manager-view-pending-task-details');

        Route::get('/manager/show/submitted-task', [
                App\Http\Controllers\TaskController::class, 'showSubmittedTaskToManager']
        )->name('manager-show-submitted-task');

        Route::get('/manager/show/completed-task', [
                App\Http\Controllers\TaskController::class, 'showCompletedTaskToManager']
        )->name('manager-show-completed-task');

        //---------------------------employee------------------------

        Route::get('/employee/add', [
                App\Http\Controllers\EmployeeController::class, 'showAddEmployee']
        )->name('add-employee');
        Route::post('/employee/save', [
                App\Http\Controllers\EmployeeController::class, 'saveEmployee']
        )->name('new-employee');

        // shared

        //---------------------------report------------------------
        //shared

        //---------------------------rating------------------------

        Route::get('/manager/show/employee/rating/{id}', [
                App\Http\Controllers\RatingController::class, 'showGiveRatingToManager']
        )->name('manager-give-rating');

        Route::post('/manager/employee/rating/submit', [
                App\Http\Controllers\RatingController::class, 'submitRatingByManager']
        )->name('submit-employee-rating');

        //shared

    });


//---------------------------EMPLOYEE----------------------------

    Route::middleware(['checkEmployeeAuth'])->group(function () {

        //----------------------------auth--------------------

        Route::get('/employee',[
                App\Http\Controllers\DashboardController::class,'showEmployeeDashboard']
        )->name('employee');

        Route::post('/user/sign-out',[
                App\Http\Controllers\DashboardController::class,'signOutUser']
        )->name('user-sign-out');


        //-----------------------employee---------------------------

        Route::get('/employee/profile',[
                App\Http\Controllers\EmployeeController::class,'showEmployeeProfile']
        )->name('employee-profile');

        Route::get('/employee/profile-edit',[
                App\Http\Controllers\EmployeeController::class,'editEmployeeProfile']
        )->name('edit-employee-profile');

        Route::post('/employee/profile-edit',[
                App\Http\Controllers\EmployeeController::class,'updateEmployeeProfile']
        )->name('update-employee-info');

        //-----------------------task---------------------------

        Route::get('/employee/new-task',[
                App\Http\Controllers\TaskController::class,'showNewTaskToEmployee']
        )->name('employee-show-new-task');

        Route::get('/employee/task/details/{id}',[
                App\Http\Controllers\TaskController::class,'showTaskDetailsToEmployee']
        )->name('employee-view-task-details');

        Route::get('/employee/submit/task-report/{id}',[
                App\Http\Controllers\TaskController::class,'showTaskDetailsToEmployee']
        )->name('employee-assign-task');

        Route::get('/employee/task/done/{id}',[
                App\Http\Controllers\TaskController::class,'markTaskAsDoneByEmployee']
        )->name('mark-employee-task-done');

        Route::get('/employee/completed/task/details/{id}',[
                App\Http\Controllers\TaskController::class,'showCompletedTaskDetailsByEmployee']
        )->name('employee-view-completed-task-details');

        Route::get('/employee/task/complete',[
                App\Http\Controllers\TaskController::class,'showCompleteTaskToEmployee']
        )->name('employee-show-complete-task');

        //-----------------------report---------------------------

        Route::get('/employee/show/report/submit/{id}',[
                App\Http\Controllers\ReportController::class,'showTaskReportToEmployee']
        )->name('show-task-report-submit');

        Route::post('/employee/task/report-submit',[
                App\Http\Controllers\ReportController::class,'submitTaskReportByEmployee']
        )->name('employee-submit-task-report');

        Route::get('/show/report/{id}',[
                App\Http\Controllers\ReportController::class,'showReportFile']
        )->name('view-task-report');

        //-----------------------rating---------------------------

        Route::get('/employee/rating/co-worker',[
                App\Http\Controllers\RatingController::class,'showCoWorkerRating']
        )->name('give-rating-to-co-worker');


    });




    //----------------------SHARED--------------------------

    Route::middleware(['checkSharedAuth'])->group(function () {

        //--------------------------employee---------------------

        Route::get('/manage-employee',[
                App\Http\Controllers\EmployeeController::class,'showManageEmployee']
        )->name('manage-employee');

        Route::get('/employee/details/{id}',[
                App\Http\Controllers\EmployeeController::class,'showEmployeeDetails']
        )->name('view-employee-details');

        Route::get('/employee/delete/{id}',[
                App\Http\Controllers\EmployeeController::class,'deleteEmployee']
        )->name('delete-employee');

        //---------------------------report------------------------

        Route::get('/show/task-report/{id}',[
                App\Http\Controllers\ReportController::class,'showTaskReport']
        )->name('show-task-report');

        //---------------------------rating-----------------------

        Route::get('show/employee-rating',[
                App\Http\Controllers\RatingController::class,'showEmployeeRating']
        )->name('show-employee-rating');

    });





