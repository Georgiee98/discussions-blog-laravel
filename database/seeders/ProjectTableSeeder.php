<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            'title' => 'Project A',
            'subtitle' => 'AAA',
            'description' => 'Some description here.',
            'image_url' => 'https://css-tricks.com/wp-content/uploads/2016/01/the-difference-placeholder.png',
            'url' => 'http://example.com',
        ]);
    }
}