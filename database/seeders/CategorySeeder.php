<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => '1',
            'name' => 'Electronics',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
            DB::table('categories')->insert([
                'id' => '2',
                'name' => 'Laptops',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('categories')->insert([
                'id' => '3',
                'name' => 'Mobiles',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('categories')->insert([
                'id' => '4',
                'name' => 'Tablets',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('categories')->insert([
                'id' => '5',
                'name' => 'Other Electronics',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        DB::table('categories')->insert([
            'id' => '6',
            'name' => 'Restaurants',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
            DB::table('categories')->insert([
                'id' => '7',
                'name' => 'Cafe',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('categories')->insert([
                'id' => '8',
                'name' => 'Fast Food',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('categories')->insert([
                'id' => '9',
                'name' => 'General Restaurant',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('categories')->insert([
                'id' => '10',
                'name' => 'Food Track',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        DB::table('categories')->insert([
            'id' => '11',
            'name' => 'Real Estate',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
            DB::table('categories')->insert([
                'id' => '12',
                'name' => 'Farms',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('categories')->insert([
                'id' => '13',
                'name' => 'Gym',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('categories')->insert([
                'id' => '14',
                'name' => 'Hospitals',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('categories')->insert([
                'id' => '15',
                'name' => 'Parlors',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        DB::table('categories')->insert([
            'id' => '16',
            'name' => 'Apparel & Clothing',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
            DB::table('categories')->insert([
                'id' => '17',
                'name' => 'Mens Wears',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('categories')->insert([
                'id' => '18',
                'name' => 'Accessories',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('categories')->insert([
                'id' => '19',
                'name' => 'Kids Wears',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('categories')->insert([
                'id' => '20',
                'name' => 'Womens Wear',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        DB::table('categories')->insert([
            'id' => '21',
            'name' => 'Jobs',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
            DB::table('categories')->insert([
                'id' => '22',
                'name' => 'IT Jobs',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('categories')->insert([
                'id' => '23',
                'name' => 'Cleaning and Washing',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('categories')->insert([
                'id' => '24',
                'name' => 'Management',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('categories')->insert([
                'id' => '25',
                'name' => 'Other Jobs',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        DB::table('categories')->insert([
            'id' => '26',
            'name' => 'Vehicles',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
            DB::table('categories')->insert([
                'id' => '27',
                'name' => 'Buses',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('categories')->insert([
                'id' => '28',
                'name' => 'Cars',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('categories')->insert([
                'id' => '29',
                'name' => 'Motorbikes',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('categories')->insert([
                'id' => '30',
                'name' => 'Other Vehicles',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        DB::table('categories')->insert([
            'id' => '31',
            'name' => 'Pets',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
            DB::table('categories')->insert([
                'id' => '32',
                'name' => 'Cats',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('categories')->insert([
                'id' => '33',
                'name' => 'Dogs',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('categories')->insert([
                'id' => '34',
                'name' => 'Birds',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('categories')->insert([
                'id' => '35',
                'name' => 'Other Pets',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        DB::table('categories')->insert([
            'id' => '36',
            'name' => 'Services',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
            DB::table('categories')->insert([
                'id' => '37',
                'name' => 'Cleaning',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('categories')->insert([
                'id' => '38',
                'name' => 'Car Washing',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('categories')->insert([
                'id' => '39',
                'name' => 'Clothing Services',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('categories')->insert([
                'id' => '40',
                'name' => 'Business',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
    }
}
