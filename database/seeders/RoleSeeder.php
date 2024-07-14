<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        $roles = [
//            ['name' => 'admin'],
//            ['name' => 'hr-manager'],
//            ['name' => 'director'],
//            ['name' => 'employee'],
//        ];
        $roles = [
            ['name' => 'admin', 'display_name' => 'Admin', 'group' => 'system'],
            ['name' => 'director', 'display_name' => 'Director', 'group' => 'system'],
            ['name' => 'hr-manager', 'display_name' => 'Hr Manager', 'group' => 'system'],
            ['name' => 'employee', 'display_name' => 'Employee', 'group' => 'system'],
        ];
        foreach ($roles as $role) {
            Role::firstOrCreate($role);
        }

//        $permissions = [
//            ['name' => 'view-system'],
//            ['name' => 'manage-employees'],
//            ['name' => 'request-leave'],
//            ['name' => 'manage-roles'],
//            ['name' => 'approve-leave-request'],
////            ['name' => 'view-all'],
//            ['name' => 'view-self'], // employee xem thông tin cá nhân
//            ['name' => 'send-leave-request'], // thêm quyền này
//            ['name' => 'approve-leave-request'], // thêm quyền này
//            ['name' => 'view-attendance'],
//        ];

        $permissions = [
//          manage-employees
            ['name' => 'create-employees', 'display_name' => 'Tạo nhân viên', 'group' => 'Nhân viên'],
            ['name' => 'update-employees', 'display_name' => 'Sửa nhân viên', 'group' => 'Nhân viên'],
            ['name' => 'show-employees', 'display_name' => 'Hiển thị tất cả nhân viên', 'group' => 'Nhân viên'],
            ['name' => 'status-employees', 'display_name' => 'Trạng thái nhân viên', 'group' => 'Nhân viên'],
//           manage-roles
            ['name' => 'create-role', 'display_name' => 'Tạo role', 'group' => 'Role'],
            ['name' => 'update-role', 'display_name' => 'Sửa role', 'group' => 'Role'],
            ['name' => 'show-role', 'display_name' => 'Hiển thị role', 'group' => 'Role'],
            ['name' => 'delete-role', 'display_name' => 'Xóa nhân viên', 'group' => 'Role'],
//            manage-users
            ['name' => 'create-user', 'display_name' => 'Thêm user', 'group' => 'User'],
            ['name' => 'update-user', 'display_name' => 'Sửa user', 'group' => 'User'],
            ['name' => 'show-user', 'display_name' => 'Hiển thị user', 'group' => 'User'],
            ['name' => 'status-user', 'display_name' => 'Trạng thái user', 'group' => 'User'],

//           send-request-leave
            [
                'name' => 'create-send-request-leave',
                'display_name' => 'Gửi yêu cầu nghỉ phép',
                'group' => 'Yêu cầu nghỉ phép'
            ],
            [
                'name' => 'update-send-request-leave',
                'display_name' => 'Sửa yêu cầu nghỉ phép',
                'group' => 'Yêu cầu nghỉ phép'
            ],
            [
                'name' => 'show-send-request-leave',
                'display_name' => 'Hiển thị yêu cầu nghỉ phép',
                'group' => 'Yêu cầu nghỉ phép'
            ],
            [
                'name' => 'delete-send-request-leave',
                'display_name' => 'Xóa yêu cầu nghỉ phép',
                'group' => 'Yêu cầu nghỉ phép'
            ],
//          approve-leave-request
            [
                'name' => 'approve-leave-request',
                'display_name' => 'Phê duyệt yêu cầu nghỉ phép',
                'group' => 'Phê duyệt yêu cầu nghỉ phép'
            ],

//          view-attendance
            ['name' => 'view-attendance', 'display_name' => 'Xem chấm công', 'group' => 'Chấm công'],


//             Job Position
            ['name' => 'create-job-position', 'display_name' => 'Tạo vị trí công việc', 'group' => 'Vị trí công việc'],
            ['name' => 'update-job-position', 'display_name' => 'Sửa vị trí công việc', 'group' => 'Vị trí công việc'],
            ['name' => 'show-job-position', 'display_name' => 'Xem vị trí công việc', 'group' => 'Vị trí công việc'],

            // Job Posting
            ['name' => 'create-job-posting', 'display_name' => 'Tạo tin tuyển dụng', 'group' => 'Bài đăng tuyển dụng'],
            ['name' => 'update-job-posting', 'display_name' => 'Sửa tin tuyển dụng', 'group' => 'Bài đăng tuyển dụng'],
            ['name' => 'show-job-posting', 'display_name' => 'Xem tin tuyển dụng', 'group' => 'Bài đăng tuyển dụng'],
//            ['name' => 'detail-job-posting', 'display_name' => 'Detail Job Posting', 'group' => 'Job Posting'],

//            Candidate
            ['name' => 'show-candidate', 'display_name' => 'Hiển thị ứng viên', 'group' => 'Danh sách ứng viên'],
            ['name' => 'detail-candidate', 'display_name' => 'Chi tiết ứng viên', 'group' => 'Danh sách ứng viên'],
            ['name' => 'email-candidate', 'display_name' => 'Gửi email ứng viên', 'group' => 'Danh sách ứng viên'],

//            InterviewSchedule
            [
                'name' => 'show-status-candidate',
                'display_name' => 'Hiển thị trạng thái ứng viên',
                'group' => 'Trạng thái ứng viên'
            ],
            [
                'name' => 'create-status-candidate',
                'display_name' => 'Tạo trạng thái ứng viên',
                'group' => 'Trạng thái ứng viên'
            ],
            [
                'name' => 'show-interview-schedule',
                'display_name' => 'Hiển thị lịch phỏng vấn',
                'group' => 'Lịch trình phỏng vấn'
            ],
            [
                'name' => 'create-interview-schedule',
                'display_name' => 'Tạo lịch phỏng vấn',
                'group' => 'Lịch trình phỏng vấn'
            ],

            // `InterviewResult`
            [
                'name' => 'show-interview-result',
                'display_name' => 'Hiển thị kết quả phỏng vấn',
                'group' => 'Kết quả phỏng vấn'
            ],
            [
                'name' => 'create-interview-result',
                'display_name' => 'Tạo kết quả phỏng vấn',
                'group' => 'Kết quả phỏng vấn'
            ],
            [
                'name' => 'email-interview-result',
                'display_name' => 'Kết quả phỏng vấn qua email',
                'group' => 'Kết quả phỏng vấn'
            ],
        ];

        foreach ($permissions as $item) {
            Permission::firstOrCreate($item);
        }

        // Tạo và gán permissions cho 'admin'
        $adminRole = Role::findByName('admin');
        $adminRole->givePermissionTo(Permission::all());

        $adminUser = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678'),
        ]);
        $adminUser->assignRole($adminRole);

        // Tạo và gán permissions cho 'hr-manager'
        $hrRole = Role::findByName('hr-manager');
//        $hrPermissions = ['manage-employees', 'request-leave', 'send-leave-request', 'view-all'];
        $hrPermissions = [
            'create-employees',
            'update-employees',
            'show-employees',
            'status-employees',
            'create-send-request-leave',
            'show-send-request-leave',
            'update-send-request-leave',
            'delete-send-request-leave',
            'view-attendance',
            'create-user',
            'update-user',
            'show-user',
            'status-user',
//            job-position
            'create-job-position',
            'update-job-position',
            'show-job-position',
//            Job Posting
            'create-job-posting',
            'update-job-posting',
            'show-job-posting',
//            Candidate
            'show-candidate',
            'detail-candidate',
            'email-candidate',
//            InterviewSchedule
            'show-status-candidate',
            'create-status-candidate',
            'show-interview-schedule',
            'create-interview-schedule',
            // `InterviewResult`
            'show-interview-result',
            'create-interview-result',
            'email-interview-result'

        ];
        foreach ($hrPermissions as $permission) {
            $hrRole->givePermissionTo($permission);
        }

        $hrUser = User::create([
            'name' => 'HR Manager',
            'email' => 'hrmanager@example.com',
            'password' => Hash::make('12345678'),
        ]);
        $hrUser->assignRole($hrRole);

        // Tạo và gán permissions cho 'director'
        $directorRole = Role::findByName('director');
//        $directorPermissions = ['manage-employees','manage-roles', 'approve-leave-request', 'view-all'];
        $directorPermissions = [
            'create-employees',
            'update-employees',
            'show-employees',
            'status-employees',
            'create-role',
            'update-role',
            'show-role',
            'delete-role',
            'approve-leave-request',
            'view-attendance',
            'create-user',
            'update-user',
            'show-user',
            'status-user',
//            job-position
            'create-job-position',
            'update-job-position',
            'show-job-position',
//            Job Posting
            'create-job-posting',
            'update-job-posting',
            'show-job-posting',
//            Candidate
            'show-candidate',
            'detail-candidate',
            'email-candidate',
//            InterviewSchedule
            'show-status-candidate',
            'create-status-candidate',
            'show-interview-schedule',
            'create-interview-schedule',
            // `InterviewResult`
            'show-interview-result',
            'create-interview-result',
            'email-interview-result'
        ];
        foreach ($directorPermissions as $permission) {
            $directorRole->givePermissionTo($permission);
        }

        $directorUser = User::create([
            'name' => 'Director',
            'email' => 'director@example.com',
            'password' => Hash::make('12345678'),
        ]);
        $directorUser->assignRole($directorRole);

        // Tạo và gán permissions cho 'employee'
        $employeeRole = Role::findByName('employee');
        $employeePermissions = [
            'create-send-request-leave',
            'show-send-request-leave',
            'update-send-request-leave',
            'delete-send-request-leave',
            'show-interview-schedule',

        ]; // thêm quyền này
        foreach ($employeePermissions as $permission) {
            $employeeRole->givePermissionTo($permission);
        }

        $employeeUser = User::create([
            'name' => 'Employee',
            'email' => 'employee@example.com',
            'password' => Hash::make('12345678'),
        ]);
        $employeeUser->assignRole($employeeRole);
    }
}
