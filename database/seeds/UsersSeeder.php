<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        DB::table('users')->insert([
            'name'=>'System',
            'email'=>'admin@ackosoft.com',
            'password'=>bcrypt('admin')
        ]);

        for($i=1;$i<=100; $i++){
            DB::table('users')->insert([
                'name'=>$faker->firstNameMale,
                'email'=>$faker->freeEmail,
                'password'=>bcrypt('123')
            ]);
        }
    }
}
