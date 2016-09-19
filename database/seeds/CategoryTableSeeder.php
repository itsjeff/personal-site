<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('category')->insert([
			'title'     => 'Uncategorized',
            'slug'      => 'uncategorized',
            'parent_id' => 0,
			'order'     => 0,
		]);
    }
}
