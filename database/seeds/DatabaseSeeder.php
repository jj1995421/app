<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

<<<<<<< HEAD
        // $this->call(UserTableSeeder::class);
=======
        $this->call(ArticleTableSeeder::class);
>>>>>>> b4f9e5ada2715e0b4391c95dcab71fa699c6bc7d

        Model::reguard();
    }
}
