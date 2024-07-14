<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\NationalController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ReligionController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\EthiniciteController;
use App\Http\Controllers\JobPostingController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\JobPositionController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\InterviewResultController;
use App\Http\Controllers\InterviewScheduleController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\BasicSalaryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('admin.layouts.main');
// });
// Route::get('/', function () {
//     return view('layouts.app');
// });


Route::middleware(['auth'])->group(function () {

    // Route::get('', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('checkStatus');
    Route::get('/home', [AdminDashboardController::class, 'countId'])->name('route_admin_dashboard_index');


    //employee
    // Route::get('employees/boxDetail', [EmployeeController::class, 'boxDetail'])->name('employees.boxDetail');
    Route::get('employees/export/', [EmployeeController::class, 'export'])->name('employees-export');
    Route::get('employees/detail/{employee}', [EmployeeController::class, 'detail'])->name('employees.detail');
    Route::match(['GET', 'POST'], 'employees/detail/edit/{employee}', [
        EmployeeController::class,
        'editDetailEmployee'
    ])->name('employees.editDetail')->middleware('checkEmployeeStatus');
    Route::match(['GET', 'POST'], 'employees/detail/edit/personal/{employee}', [
        EmployeeController::class,
        'editDetailPersonalEmployee'
    ])->name('employees.editDetailPersonal')->middleware('checkEmployeeStatus');
    Route::post('employees/search', [EmployeeController::class, 'search'])->name('employees.search');
    Route::post('employees/active/{employee}', [EmployeeController::class, 'activeEmployee'])->name('employees.active')->middleware('permission:status-employees');
    //    Route::resource('employees', EmployeeController::class);
    Route::prefix('employees')->controller(EmployeeController::class)->name('employees.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store')->middleware('permission:create-employees');
        Route::get('/create', 'create')->name('create')->middleware('permission:create-employees');
        Route::get('/edit/{employee}/', 'edit')->name('edit')->middleware('permission:update-employees');
        Route::put('/{employee}', 'update')->name('update')->middleware('permission:update-employees');
    });
    Route::resource('ethinicite', EthiniciteController::class);

    // SEARCH

    // religion route
    Route::resource('religion', ReligionController::class);

    // status_employee route
    Route::get(
        '/status_employee',
        [App\Http\Controllers\StatusEmployeeController::class, 'index']
    )->name('route_status_employee_index');
    Route::match(
        ['GET', 'POST'],
        '/status_employee/add',
        [App\Http\Controllers\StatusEmployeeController::class, 'add']
    )->name('route_status_employee_add');
    Route::match(
        ['GET', 'POST'],
        '/status_employee/edit/{id}',
        [App\Http\Controllers\StatusEmployeeController::class, 'edit']
    )->name('route_status_employee_edit');
    Route::get(
        '/status_employee/delete/{id}',
        [App\Http\Controllers\StatusEmployeeController::class, 'delete']
    )->name('route_status_employee_delete');

    // Job Position

    Route::get('/job_position', [
        JobPositionController::class,
        'index'
    ])->name('route_job_position_index')->middleware('permission:show-job-position');
    Route::post('/job_position', [
        JobPositionController::class,
        'index'
    ])->name('route_search_job_position')->middleware('permission:show-job-position');
    Route::match(
        ['GET', 'POST'],
        '/job_position/add',
        [JobPositionController::class, 'add']
    )->name('route_job_position_add')->middleware('permission:create-job-position');
    Route::match(
        ['GET', 'POST'],
        '/job_position/edit/{id}',
        [JobPositionController::class, 'edit']
    )->name('route_job_position_edit')->middleware('permission:update-job-position');
    Route::get(
        '/job_position/delete/{id}',
        [JobPositionController::class, 'delete']
    )->name('route_job_position_delete')->middleware('permission:create-job-position');

    // Job Posting

    Route::get('/job_posting', [
        JobPostingController::class,
        'index'
    ])->name('route_job_posting_index');
    Route::post('/job_posting', [
        JobPostingController::class,
        'index'
    ])->name('route_search_job_posting')->middleware('permission:show-job-posting');
    Route::match(
        ['GET', 'POST'],
        '/job_posting/add',
        [JobPostingController::class, 'add']
    )->name('route_job_posting_add')->middleware('permission:create-job-posting');
    Route::match(
        ['GET', 'POST'],
        '/job_posting/edit/{id}',
        [JobPostingController::class, 'edit']
    )->name('route_job_posting_edit')->middleware('permission:update-job-posting');
    Route::get('/job_posting/delete/{id}', [
        JobPostingController::class,
        'delete'
    ])->name('route_job_posting_delete');

    // Candidate
    Route::get(
        '/candidate',
        [CandidateController::class, 'index']
    )->name('route_candidate_index')->middleware('permission:show-candidate');
    Route::post(
        '/candidate',
        [CandidateController::class, 'index']
    )->name('route_search_candidate')->middleware('permission:show-candidate');
    Route::match(
        ['GET', 'POST'],
        '/candidate/detail/{id}',
        [CandidateController::class, 'detail']
    )->name('route_candidate_detail')->middleware('permission:detail-candidate');
    Route::get(
        '/candidate/send_refuse_mail/{id}',
        [CandidateController::class, 'sendRefuseEmail']
    )->name('route_candidate_send_refuse_email')->middleware('permission:email-candidate');
    Route::match(
        ['GET', 'POST'],
        '/candidate/send_invite_mail/{id}',
        [CandidateController::class, 'sendInviteEmail']
    )->name('route_candidate_send_invite_email')->middleware('permission:email-candidate');

    // InterviewSchedule
    Route::match(
        ['GET', 'POST'],
        '/status_candidate',
        [
            InterviewScheduleController::class,
            'index'
        ]
    )->name('route_status_candidate_index')->middleware('permission:show-status-candidate');
    Route::match(
        ['GET', 'POST'],
        '/status_candidate/detail/{id}',
        [
            InterviewScheduleController::class,
            'detail'
        ]
    )->name('route_status_candidate_detail')->middleware('permission:create-status-candidate');
    Route::match(
        ['GET', 'POST'],
        '/interview_schedule',
        [
            InterviewScheduleController::class,
            'indexAdd'
        ]
    )->name('route_interview_schedule_index')->middleware('permission:show-interview-schedule');
    Route::match(
        ['GET', 'POST'],
        '/interview_schedule/detail/{id}',
        [
            InterviewScheduleController::class,
            'addSchedule'
        ]
    )->name('route_interview_schedule_detail')->middleware('permission:show-interview-schedule');

    Route::get('/interview_schedule/status/{id}', [InterviewScheduleController::class, 'interviewScheduleStatus'])->name('interview_schedule_status');

    // `InterviewResult`
    Route::get('/interview_result', [
        InterviewResultController::class,
        'index'
    ])->name('route_interview_result_index')->middleware('permission:show-interview-result');
    Route::post(
        '/interview_result',
        [InterviewResultController::class, 'index']
    )->name('route_search_interview_result');
    Route::match(
        ['GET', 'POST'],
        '/interview_result/detail/{id}',
        [InterviewResultController::class, 'detail']
    )->name('route_interview_result_detail')->middleware('permission:create-interview-result');
    Route::get(
        '/interview_result/send_failed_interview_mail/{id}',
        [
            InterviewResultController::class,
            'sendFailedEmail'
        ]
    )->name('route_interview_result_failed_email')->middleware('permission:email-interview-result');
    Route::match(
        ['GET', 'POST'],
        '/interview_result/send_pass_interview_mail/{id}',
        [
            InterviewResultController::class,
            'sendPassEmail'
        ]
    )->name('route_interview_result_pass_email')->middleware('permission:email-interview-result');;

    // position route
    Route::get('/position', [PositionController::class, 'index'])->name('route_position_index');
    Route::post('/position', [PositionController::class, 'index'])->name('route_search_position');
    Route::match(['GET', 'POST'], '/position/add', [PositionController::class, 'add'])->name('route_position_add');
    Route::match(
        ['GET', 'POST'],
        '/position/edit/{id}',
        [PositionController::class, 'edit']
    )->name('route_position_edit');
    Route::get('/position/delete/{id}', [PositionController::class, 'delete'])->name('route_position_delete');

    // contract route
    Route::match(['GET', 'POST'], '/contract', [ContractController::class, 'index'])->name('route_contract_index');
    Route::match(['GET', 'POST'], '/contract/add', [ContractController::class, 'add'])->name('route_contract_add');
    Route::match(
        ['GET', 'POST'],
        '/contract/edit/{id}',
        [ContractController::class, 'edit']
    )->name('route_contract_edit');
    Route::delete('/contract/delete/{id}', [ContractController::class, 'delete'])->name('route_contract_delete');
    Route::get('/contracts/{id}', [ContractController::class, 'show'])->name('route_contract_show');
    // user và phân quyền
    //    Route::resource('roles', RoleController::class)->middleware('role:director');
    Route::prefix('roles')->controller(RoleController::class)->name('roles.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:show-role');
        Route::post('/search', 'search')->name('search')->middleware('permission:show-role');
        Route::post('/', 'store')->name('store')->middleware('permission:create-role');
        Route::get('/create', 'create')->name('create')->middleware('permission:create-role');
        Route::get('/{role}/edit', 'edit')->name('edit')->middleware('permission:update-role');
        Route::put('/{role}', 'update')->name('update')->middleware('permission:update-role');
        Route::delete('/{role}', 'destroy')->name('destroy')->middleware('permission:delete-role');
    });

    //    Route::resource('users', UserController::class);
    Route::prefix('users')->controller(UserController::class)->name('users.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:show-user');;
        Route::post('/search', 'search')->name('search')->middleware('permission:show-user');
        Route::get('/create', 'create')->name('create')->middleware('permission:create-user');
        Route::post('/', 'store')->name('store')->middleware('permission:create-user');
        Route::get('/{user}/edit', 'edit')->name('edit')->middleware('permission:update-user');
        Route::put('/{user}', 'update')->name('update')->middleware('permission:update-user');
        Route::get('/activate/{user}', [UserController::class, 'activate'])->middleware('permission:status-user');
        Route::get('/deactivate/{user}', [UserController::class, 'deactivate'])->middleware('permission:status-user');
    });
    //kích hoạt user

    //nghỉ phép
    Route::prefix('leave_requests')->controller(LeaveRequestController::class)->name('leave_requests.')
        ->group(function () {
            Route::get('/', 'index')->name('index')->middleware('permission:show-send-request-leave');
            Route::post('/search', 'index')->name('search')->middleware('permission:show-send-request-leave');
            Route::get('/create', 'create')->name('create')->middleware('permission:create-send-request-leave');
            Route::post('/', 'store')->name('store')->middleware('permission:create-send-request-leave');
            Route::get('edit/{leaveRequest}', 'edit')->name('edit')->middleware('permission:update-send-request-leave');
            Route::put('/{leaveRequest}', 'update')->name('update')->middleware('permission:update-send-request-leave');
            Route::delete(
                '/{leaveRequest}',
                'destroy'
            )->name('.destroy')->middleware('permission:delete-send-request-leave');
            Route::get('/approve-requests', 'approveRequests')->name('approveRequests')->middleware('permission:approve-leave-request');
            Route::post('/approve-requests', 'approveRequests')->name('filterRequests')->middleware('permission:approve-leave-request');
            Route::post('/approve/{id}', 'approve')->name('approve')->middleware('permission:approve-leave-request');
            Route::post('/rejected/{id}', 'rejected')->name('rejected')->middleware('permission:approve-leave-request');

            // thống kê nghỉ phép
            Route::get(
                '/employee_statistics',
                'statistics'
            )->name('statistics')->middleware('permission:approve-leave-request');
        });

    //    Route::get('/admin_dashboard', [AdminDashboardController::class, 'showClients'])->name('route_admin_dashboard_index');

    Route::get('/markAsRead', [NotificationController::class, 'markAsRead']);

    //Attendance
    Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
    Route::post('/attendance', [AttendanceController::class, 'store'])->name('attendance.store');
    Route::post('/attendance/update', [AttendanceController::class, 'update'])->name('attendance.update');
    Route::get('/attendance/admin', [AttendanceController::class, 'indexAdmin'])->name('attendance.indexAdmin');
    Route::get('/attendance/admin/{id}', [AttendanceController::class, 'getAdminFind']);
    Route::post('/attendance/admin/{id}', [AttendanceController::class, 'postAdminFind']);
    Route::post('/attendance/search', [AttendanceController::class, 'search'])->name('attendance.search');
    Route::get('/attendance/client/search', [AttendanceController::class, 'clientSearch'])->name('attendance.client-search');


    //tính lương

    Route::prefix('salary')->controller(SalaryController::class)->name('salary.')->group(function () {
        Route::get('/','index')->name('index');
        Route::get('client/{id}','viewClient')->name('viewClient');
    });

    Route::prefix('holiday')->controller(HolidayController::class)->name('holiday.')->group(function () {
        Route::get('/', 'index')->name('index');
        // create
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        // edit
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        // delete
        Route::delete('/delete/{id}', 'delete')->name('delete');
    });

    Route::prefix('basicSalary')->controller(BasicSalaryController::class)->name('basicSalary.')->group(function () {
        Route::get('/', 'index')->name('index');
        // create
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        // edit
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::match(['GET','POST'],'/update/{id}', 'update')->name('update');
        // delete
        Route::delete('/delete/{id}', 'delete')->name('delete');
        Route::match(['GET','POST'],'/search', 'index')->name('search');

    });
});

Route::auth();
// Giao diện bài đăng tuyển dụng và gửi hồ sơ ứng viên
Route::get('/career/{id}', [JobPostingController::class, 'detail'])->name('route_job_posting_detail');
Route::match(['GET', 'POST'], '/candidate/add', [CandidateController::class, 'add'])->name('route_candidate_add');
Route::get('/', [JobPostingController::class, 'list_vacancies'])->name('route_procedure');
