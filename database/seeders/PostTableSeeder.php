<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//import package
use DB;
class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $post = [
            ['title' => 'Belajar Laravel', 'Content'=> 'Lorem Ipsum'],
            ['title' => 'Tips Belajar Laravel', 'content' => 'Lorem Ipsum'],
            ['title' => 'Jadwal Latihan Workout bulanan', 'Content' => 'lorem ipsum']
        ];

        DB::table('posts')->insert($post);
    }
}
