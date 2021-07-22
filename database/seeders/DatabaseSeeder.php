<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UsersTableSeeder::class]);
        $this->call(RolesSeeder::class);
        $this->call(TopicTypeSeeder::class);
        $this->call(EmbedTypeSeeder::class);
        $this->call(UserRoles::class);
    }
}
