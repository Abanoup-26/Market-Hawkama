<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 21,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 22,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 23,
                'title' => 'setting_access',
            ],
            [
                'id'    => 24,
                'title' => 'about_access',
            ],
            [
                'id'    => 25,
                'title' => 'project_create',
            ],
            [
                'id'    => 26,
                'title' => 'project_edit',
            ],
            [
                'id'    => 27,
                'title' => 'project_show',
            ],
            [
                'id'    => 28,
                'title' => 'project_delete',
            ],
            [
                'id'    => 29,
                'title' => 'project_access',
            ],
            [
                'id'    => 30,
                'title' => 'subscribe_create',
            ],
            [
                'id'    => 31,
                'title' => 'subscribe_edit',
            ],
            [
                'id'    => 32,
                'title' => 'subscribe_show',
            ],
            [
                'id'    => 33,
                'title' => 'subscribe_delete',
            ],
            [
                'id'    => 34,
                'title' => 'subscribe_access',
            ],
            [
                'id'    => 35,
                'title' => 'payment_create',
            ],
            [
                'id'    => 36,
                'title' => 'payment_edit',
            ],
            [
                'id'    => 37,
                'title' => 'payment_show',
            ],
            [
                'id'    => 38,
                'title' => 'payment_delete',
            ],
            [
                'id'    => 39,
                'title' => 'payment_access',
            ],
            [
                'id'    => 40,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
