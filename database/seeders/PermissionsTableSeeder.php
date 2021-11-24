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
                'title' => 'auth_profile_edit',
            ],
            [
                'id'    => 2,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 3,
                'title' => 'permission_create',
            ],
            [
                'id'    => 4,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 5,
                'title' => 'permission_show',
            ],
            [
                'id'    => 6,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 7,
                'title' => 'permission_access',
            ],
            [
                'id'    => 8,
                'title' => 'role_create',
            ],
            [
                'id'    => 9,
                'title' => 'role_edit',
            ],
            [
                'id'    => 10,
                'title' => 'role_show',
            ],
            [
                'id'    => 11,
                'title' => 'role_delete',
            ],
            [
                'id'    => 12,
                'title' => 'role_access',
            ],
            [
                'id'    => 13,
                'title' => 'user_create',
            ],
            [
                'id'    => 14,
                'title' => 'user_edit',
            ],
            [
                'id'    => 15,
                'title' => 'user_show',
            ],
            [
                'id'    => 16,
                'title' => 'user_delete',
            ],
            [
                'id'    => 17,
                'title' => 'user_access',
            ],
            [
                'id'    => 18,
                'title' => 'product_management_access',
            ],
            [
                'id'    => 19,
                'title' => 'product_category_create',
            ],
            [
                'id'    => 20,
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 21,
                'title' => 'product_category_show',
            ],
            [
                'id'    => 22,
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 23,
                'title' => 'product_category_access',
            ],
            [
                'id'    => 24,
                'title' => 'product_tag_create',
            ],
            [
                'id'    => 25,
                'title' => 'product_tag_edit',
            ],
            [
                'id'    => 26,
                'title' => 'product_tag_show',
            ],
            [
                'id'    => 27,
                'title' => 'product_tag_delete',
            ],
            [
                'id'    => 28,
                'title' => 'product_tag_access',
            ],
            [
                'id'    => 29,
                'title' => 'product_create',
            ],
            [
                'id'    => 30,
                'title' => 'product_edit',
            ],
            [
                'id'    => 31,
                'title' => 'product_show',
            ],
            [
                'id'    => 32,
                'title' => 'product_delete',
            ],
            [
                'id'    => 33,
                'title' => 'product_access',
            ],
            [
                'id'    => 34,
                'title' => 'faq_management_access',
            ],
            [
                'id'    => 35,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 36,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 37,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 38,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 39,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 40,
                'title' => 'faq_question_create',
            ],
            [
                'id'    => 41,
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => 42,
                'title' => 'faq_question_show',
            ],
            [
                'id'    => 43,
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => 44,
                'title' => 'faq_question_access',
            ],
            [
                'id'    => 45,
                'title' => 'smart_wallet_access',
            ],
            [
                'id'    => 46,
                'title' => 'manual_bonu_create',
            ],
            [
                'id'    => 47,
                'title' => 'manual_bonu_edit',
            ],
            [
                'id'    => 48,
                'title' => 'manual_bonu_show',
            ],
            [
                'id'    => 49,
                'title' => 'manual_bonu_delete',
            ],
            [
                'id'    => 50,
                'title' => 'manual_bonu_access',
            ],
            [
                'id'    => 51,
                'title' => 'extra_bonu_create',
            ],
            [
                'id'    => 52,
                'title' => 'extra_bonu_edit',
            ],
            [
                'id'    => 53,
                'title' => 'extra_bonu_show',
            ],
            [
                'id'    => 54,
                'title' => 'extra_bonu_delete',
            ],
            [
                'id'    => 55,
                'title' => 'extra_bonu_access',
            ],
            [
                'id'    => 56,
                'title' => 'transaction_create',
            ],
            [
                'id'    => 57,
                'title' => 'transaction_edit',
            ],
            [
                'id'    => 58,
                'title' => 'transaction_show',
            ],
            [
                'id'    => 59,
                'title' => 'transaction_delete',
            ],
            [
                'id'    => 60,
                'title' => 'transaction_access',
            ],
            [
                'id'    => 61,
                'title' => 'wallet_create',
            ],
            [
                'id'    => 62,
                'title' => 'wallet_edit',
            ],
            [
                'id'    => 63,
                'title' => 'wallet_show',
            ],
            [
                'id'    => 64,
                'title' => 'wallet_delete',
            ],
            [
                'id'    => 65,
                'title' => 'wallet_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
