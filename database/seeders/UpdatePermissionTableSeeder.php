<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class UpdatePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $updatePermissions = [

            // Social Permissions
            [
                'name' => 'social-list',
                'main_group' => 'Social',
                'display_name' => 'View',
                'block_name' => 'social'
            ],
            [
                'name' => 'social-create',
                'main_group' => 'Social',
                'display_name' => 'Insert',
                'block_name' => 'social'
            ],
            [
                'name' => 'social-edit',
                'main_group' => 'Social',
                'display_name' => 'Update',
                'block_name' => 'social'
            ],
            [
                'name' => 'social-delete',
                'main_group' => 'Social',
                'display_name' => 'Delete',
                'block_name' => 'social'
            ],

            // Customer Permissions
            [
                'name' => 'customer-list',
                'main_group' => 'Customer',
                'display_name' => 'View',
                'block_name' => 'customer'
            ],
            [
                'name' => 'customer-create',
                'main_group' => 'Customer',
                'display_name' => 'Insert',
                'block_name' => 'customer'
            ],
            [
                'name' => 'customer-edit',
                'main_group' => 'Customer',
                'display_name' => 'Update',
                'block_name' => 'customer'
            ],
            [
                'name' => 'customer-delete',
                'main_group' => 'Customer',
                'display_name' => 'Delete',
                'block_name' => 'customer'
            ],

            // Testimonial Permissions
            [
                'name' => 'testimonial-list',
                'main_group' => 'Testimonial',
                'display_name' => 'View',
                'block_name' => 'testi'
            ],
            [
                'name' => 'testimonial-create',
                'main_group' => 'Testimonial',
                'display_name' => 'Insert',
                'block_name' => 'testi'
            ],
            [
                'name' => 'testimonial-edit',
                'main_group' => 'Testimonial',
                'display_name' => 'Update',
                'block_name' => 'testi'
            ],
            [
                'name' => 'testimonial-delete',
                'main_group' => 'Testimonial',
                'display_name' => 'Delete',
                'block_name' => 'testi'
            ],

            // Contact Us (Page) Permissions
            [
                'name' => 'contact-list',
                'main_group' => 'Contact Us (Page)',
                'display_name' => 'View',
                'block_name' => 'contactUs'
            ],
            [
                'name' => 'contact-create',
                'main_group' => 'Contact Us (Page)',
                'display_name' => 'Insert',
                'block_name' => 'contactUs'
            ],
            [
                'name' => 'contact-edit',
                'main_group' => 'Contact Us (Page)',
                'display_name' => 'Update',
                'block_name' => 'contactUs'
            ],
            [
                'name' => 'contact-delete',
                'main_group' => 'Contact Us (Page)',
                'display_name' => 'Delete',
                'block_name' => 'contactUs'
            ],

            // Affiliate (Page) Permissions
            [
                'name' => 'aff-list',
                'main_group' => 'Affiliate (Page)',
                'display_name' => 'View',
                'block_name' => 'aff'
            ],
            [
                'name' => 'aff-create',
                'main_group' => 'Affiliate (Page)',
                'display_name' => 'Insert',
                'block_name' => 'aff'
            ],
            [
                'name' => 'aff-edit',
                'main_group' => 'Affiliate (Page)',
                'display_name' => 'Update',
                'block_name' => 'aff'
            ],
            [
                'name' => 'aff-delete',
                'main_group' => 'Affiliate (Page)',
                'display_name' => 'Delete',
                'block_name' => 'aff'
            ],

            // Invoice Permissions
            [
                'name' => 'invoice-list',
                'main_group' => 'Invoice',
                'display_name' => 'View',
                'block_name' => 'inv'
            ],
            [
                'name' => 'invoice-create',
                'main_group' => 'Invoice',
                'display_name' => 'Insert',
                'block_name' => 'inv'
            ],
            [
                'name' => 'invoice-edit',
                'main_group' => 'Invoice',
                'display_name' => 'Update',
                'block_name' => 'inv'
            ],
            [
                'name' => 'invoice-delete',
                'main_group' => 'Invoice',
                'display_name' => 'Delete',
                'block_name' => 'inv'
            ]
        ];

        foreach ($updatePermissions as $permission) {
            Permission::create($permission);
        }
    }
}
