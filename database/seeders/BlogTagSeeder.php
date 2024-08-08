<?php

namespace Database\Seeders;

use App\Models\blogTag;
use Illuminate\Database\Seeder;

class BlogTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        blogTag::factory()->count(10)->create();
    }
}
