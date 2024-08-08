<?php

namespace Database\Seeders;

use App\Models\blogCategory;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        blogCategory::factory()->count(10)->create();
    }
}
