<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class MenusTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


       $faker = Faker::create();

       foreach (range(1,6) as $index) {

            DB::table('menus')->insert([
                'title' => $faker->name,
                'menu_order' => 0
            ]);

        }

        foreach (range(1,50) as $index) {

            DB::table('menus')->insert([
                'parent_id' => $faker->numberBetween(1,20),
                'title' => $faker->name,
                'menu_order' => 0
            ]);

        }


    }

}



