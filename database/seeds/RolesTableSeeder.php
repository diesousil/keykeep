<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dt = Carbon::now();
        $dateNow = $dt->toDateTimeString();
		
        DB::table('roles')->insert([
            'name' => 'Administrator',
            'description' => 'Users that administrates other users accounts',
			'created_at' => $dateNow,
			'updated_at' => $dateNow,
        ]);

        DB::table('roles')->insert([
            'name' => 'Keeper',
            'description' => 'Users that saves their credentials on KeyKeep',
			'created_at' => $dateNow,
			'updated_at' => $dateNow,
        ]);
    }
}
