<?php

use Illuminate\Database\Seeder;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'user_management_access',],
            ['id' => 2, 'title' => 'permission_access',],
            ['id' => 3, 'title' => 'permission_create',],
            ['id' => 4, 'title' => 'permission_edit',],
            ['id' => 5, 'title' => 'permission_view',],
            ['id' => 6, 'title' => 'permission_delete',],
            ['id' => 7, 'title' => 'role_access',],
            ['id' => 8, 'title' => 'role_create',],
            ['id' => 9, 'title' => 'role_edit',],
            ['id' => 10, 'title' => 'role_view',],
            ['id' => 11, 'title' => 'role_delete',],
            ['id' => 12, 'title' => 'user_access',],
            ['id' => 13, 'title' => 'user_create',],
            ['id' => 14, 'title' => 'user_edit',],
            ['id' => 15, 'title' => 'user_view',],
            ['id' => 16, 'title' => 'user_delete',],
            ['id' => 17, 'title' => 'contact_management_access',],
            ['id' => 18, 'title' => 'contact_management_create',],
            ['id' => 19, 'title' => 'contact_management_edit',],
            ['id' => 20, 'title' => 'contact_management_view',],
            ['id' => 21, 'title' => 'contact_management_delete',],
            ['id' => 22, 'title' => 'contact_company_access',],
            ['id' => 23, 'title' => 'contact_company_create',],
            ['id' => 24, 'title' => 'contact_company_edit',],
            ['id' => 25, 'title' => 'contact_company_view',],
            ['id' => 26, 'title' => 'contact_company_delete',],
            ['id' => 27, 'title' => 'contact_access',],
            ['id' => 28, 'title' => 'contact_create',],
            ['id' => 29, 'title' => 'contact_edit',],
            ['id' => 30, 'title' => 'contact_view',],
            ['id' => 31, 'title' => 'contact_delete',],
            ['id' => 32, 'title' => 'user_action_access',],
            ['id' => 33, 'title' => 'user_action_create',],
            ['id' => 34, 'title' => 'user_action_edit',],
            ['id' => 35, 'title' => 'user_action_view',],
            ['id' => 36, 'title' => 'user_action_delete',],
            ['id' => 38, 'title' => 'content_management_create',],
            ['id' => 39, 'title' => 'content_management_edit',],
            ['id' => 40, 'title' => 'content_management_view',],
            ['id' => 41, 'title' => 'content_management_delete',],
            ['id' => 57, 'title' => 'gittest_access',],
            ['id' => 58, 'title' => 'gittest_create',],
            ['id' => 59, 'title' => 'gittest_edit',],
            ['id' => 60, 'title' => 'gittest_view',],
            ['id' => 61, 'title' => 'gittest_delete',],
            ['id' => 62, 'title' => 'gittest2_access',],
            ['id' => 63, 'title' => 'gittest2_create',],
            ['id' => 64, 'title' => 'gittest2_edit',],
            ['id' => 65, 'title' => 'gittest2_view',],
            ['id' => 66, 'title' => 'gittest2_delete',],
            ['id' => 67, 'title' => 'gittest3_access',],
            ['id' => 68, 'title' => 'gittest3_create',],
            ['id' => 69, 'title' => 'gittest3_edit',],
            ['id' => 70, 'title' => 'gittest3_view',],
            ['id' => 71, 'title' => 'gittest3_delete',],

        ];

        foreach ($items as $item) {
            \App\Permission::create($item);
        }
    }
}
