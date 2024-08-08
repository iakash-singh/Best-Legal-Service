<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

            // Role Permissions
            [
                'name' => 'role-list',
                'main_group' => 'Role',
                'display_name' => 'View',
                'block_name' => 'role'
            ],
            [
                'name' => 'role-create',
                'main_group' => 'Role',
                'display_name' => 'Insert',
                'block_name' => 'role'
            ],
            [
                'name' => 'role-edit',
                'main_group' => 'Role',
                'display_name' => 'Update',
                'block_name' => 'role'
            ],
            [
                'name' => 'role-delete',
                'main_group' => 'Role',
                'display_name' => 'Delete',
                'block_name' => 'role'
            ],

            // User Permissions
            [
                'name' => 'user-list',
                'main_group' => 'User',
                'display_name' => 'View',
                'block_name' => 'user'
            ],
            [
                'name' => 'user-create',
                'main_group' => 'User',
                'display_name' => 'Insert',
                'block_name' => 'user'
            ],
            [
                'name' => 'user-edit',
                'main_group' => 'User',
                'display_name' => 'Update',
                'block_name' => 'user'
            ],
            [
                'name' => 'user-delete',
                'main_group' => 'User',
                'display_name' => 'Delete',
                'block_name' => 'user'
            ],

            // Ticket Permissions
            [
                'name' => 'ticket-list',
                'main_group' => 'Ticket',
                'display_name' => 'View',
                'block_name' => 'ticket'
            ],
            [
                'name' => 'ticket-create',
                'main_group' => 'Ticket',
                'display_name' => 'Insert',
                'block_name' => 'ticket'
            ],
            [
                'name' => 'ticket-edit',
                'main_group' => 'Ticket',
                'display_name' => 'Update',
                'block_name' => 'ticket'
            ],
            [
                'name' => 'ticket-delete',
                'main_group' => 'Ticket',
                'display_name' => 'Delete',
                'block_name' => 'ticket'
            ],

            // Blog Post Permissions
            [
                'name' => 'post-list',
                'main_group' => 'Blog Post',
                'display_name' => 'View',
                'block_name' => 'blogPost'
            ],
            [
                'name' => 'post-create',
                'main_group' => 'Blog Post',
                'display_name' => 'Insert',
                'block_name' => 'blogPost'
            ],
            [
                'name' => 'post-edit',
                'main_group' => 'Blog Post',
                'display_name' => 'Update',
                'block_name' => 'blogPost'
            ],
            [
                'name' => 'post-delete',
                'main_group' => 'Blog Post',
                'display_name' => 'Delete',
                'block_name' => 'blogPost'
            ],

            // Blog Post Category Permissions
            [
                'name' => 'post-category-list',
                'main_group' => 'Blog Post Category',
                'display_name' => 'View',
                'block_name' => 'blogCat'
            ],
            [
                'name' => 'post-category-create',
                'main_group' => 'Blog Post Category',
                'display_name' => 'Insert',
                'block_name' => 'blogCat'
            ],
            [
                'name' => 'post-category-edit',
                'main_group' => 'Blog Post Category',
                'display_name' => 'Update',
                'block_name' => 'blogCat'
            ],
            [
                'name' => 'post-category-delete',
                'main_group' => 'Blog Post Category',
                'display_name' => 'Delete',
                'block_name' => 'blogCat'
            ],

            // Blog Post Tag Permissions
            [
                'name' => 'post-tag-list',
                'main_group' => 'Blog Post Tag',
                'display_name' => 'View',
                'block_name' => 'blogTag'
            ],
            [
                'name' => 'post-tag-create',
                'main_group' => 'Blog Post Tag',
                'display_name' => 'Insert',
                'block_name' => 'blogTag'
            ],
            [
                'name' => 'post-tag-edit',
                'main_group' => 'Blog Post Tag',
                'display_name' => 'Update',
                'block_name' => 'blogTag'
            ],
            [
                'name' => 'post-tag-delete',
                'main_group' => 'Blog Post Tag',
                'display_name' => 'Delete',
                'block_name' => 'blogTag'
            ],

            // All Services Permissions
            [
                'name' => 'service-list',
                'main_group' => 'All Services',
                'display_name' => 'View',
                'block_name' => 'service'
            ],
            [
                'name' => 'service-create',
                'main_group' => 'All Services',
                'display_name' => 'Insert',
                'block_name' => 'service'
            ],
            [
                'name' => 'service-edit',
                'main_group' => 'All Services',
                'display_name' => 'Update',
                'block_name' => 'service'
            ],
            [
                'name' => 'service-delete',
                'main_group' => 'All Services',
                'display_name' => 'Delete',
                'block_name' => 'service'
            ],

            // Main Category Permissions
            [
                'name' => 'service-category-list',
                'main_group' => 'Main Category',
                'display_name' => 'View',
                'block_name' => 'srvCat'
            ],
            [
                'name' => 'service-category-create',
                'main_group' => 'Main Category',
                'display_name' => 'Insert',
                'block_name' => 'srvCat'
            ],
            [
                'name' => 'service-category-edit',
                'main_group' => 'Main Category',
                'display_name' => 'Update',
                'block_name' => 'srvCat'
            ],
            [
                'name' => 'service-category-delete',
                'main_group' => 'Main Category',
                'display_name' => 'Delete',
                'block_name' => 'srvCat'
            ]
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
