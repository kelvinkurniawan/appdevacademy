<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopicTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('topic_types')->insert([
            'name' => 'Theory',
        ]);

        DB::table('topic_types')->insert([
            'name' => 'Assignment',
        ]);

        DB::table('topic_types')->insert([
            'name' => 'Announcment',
        ]);

    }
}
