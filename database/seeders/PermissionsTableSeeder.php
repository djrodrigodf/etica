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
                'title' => 'business_partner_create',
            ],
            [
                'id'    => 24,
                'title' => 'business_partner_edit',
            ],
            [
                'id'    => 25,
                'title' => 'business_partner_show',
            ],
            [
                'id'    => 26,
                'title' => 'business_partner_delete',
            ],
            [
                'id'    => 27,
                'title' => 'business_partner_access',
            ],
            [
                'id'    => 28,
                'title' => 'company_create',
            ],
            [
                'id'    => 29,
                'title' => 'company_edit',
            ],
            [
                'id'    => 30,
                'title' => 'company_show',
            ],
            [
                'id'    => 31,
                'title' => 'company_delete',
            ],
            [
                'id'    => 32,
                'title' => 'company_access',
            ],
            [
                'id'    => 33,
                'title' => 'construction_create',
            ],
            [
                'id'    => 34,
                'title' => 'construction_edit',
            ],
            [
                'id'    => 35,
                'title' => 'construction_show',
            ],
            [
                'id'    => 36,
                'title' => 'construction_delete',
            ],
            [
                'id'    => 37,
                'title' => 'construction_access',
            ],
            [
                'id'    => 38,
                'title' => 'exam_create',
            ],
            [
                'id'    => 39,
                'title' => 'exam_edit',
            ],
            [
                'id'    => 40,
                'title' => 'exam_show',
            ],
            [
                'id'    => 41,
                'title' => 'exam_delete',
            ],
            [
                'id'    => 42,
                'title' => 'exam_access',
            ],
            [
                'id'    => 43,
                'title' => 'occupation_create',
            ],
            [
                'id'    => 44,
                'title' => 'occupation_edit',
            ],
            [
                'id'    => 45,
                'title' => 'occupation_show',
            ],
            [
                'id'    => 46,
                'title' => 'occupation_delete',
            ],
            [
                'id'    => 47,
                'title' => 'occupation_access',
            ],
            [
                'id'    => 48,
                'title' => 'salary_create',
            ],
            [
                'id'    => 49,
                'title' => 'salary_edit',
            ],
            [
                'id'    => 50,
                'title' => 'salary_show',
            ],
            [
                'id'    => 51,
                'title' => 'salary_delete',
            ],
            [
                'id'    => 52,
                'title' => 'salary_access',
            ],
            [
                'id'    => 53,
                'title' => 'setup_access',
            ],
            [
                'id'    => 54,
                'title' => 'admission_create',
            ],
            [
                'id'    => 55,
                'title' => 'admission_edit',
            ],
            [
                'id'    => 56,
                'title' => 'admission_show',
            ],
            [
                'id'    => 57,
                'title' => 'admission_delete',
            ],
            [
                'id'    => 58,
                'title' => 'admission_access',
            ],
            [
                'id'    => 59,
                'title' => 'hiring_create',
            ],
            [
                'id'    => 60,
                'title' => 'hiring_edit',
            ],
            [
                'id'    => 61,
                'title' => 'hiring_show',
            ],
            [
                'id'    => 62,
                'title' => 'hiring_delete',
            ],
            [
                'id'    => 63,
                'title' => 'hiring_access',
            ],
            [
                'id'    => 64,
                'title' => 'third_party_registration_create',
            ],
            [
                'id'    => 65,
                'title' => 'third_party_registration_edit',
            ],
            [
                'id'    => 66,
                'title' => 'third_party_registration_show',
            ],
            [
                'id'    => 67,
                'title' => 'third_party_registration_delete',
            ],
            [
                'id'    => 68,
                'title' => 'third_party_registration_access',
            ],
            [
                'id'    => 69,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
