<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmbedTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('embed_types')->insert([
            'name' => 'Youtube',
        ]);

        DB::table('embed_types')->insert([
            'name' => 'Discord',
        ]);

        DB::table('topic_types')->insert([
            'name' => 'Announcment',
        ]);

    }
}
