<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
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
		
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@keykeep.com',
            'email_verified_at' => $dateNow,
			'created_at' => $dateNow,
			'updated_at' => $dateNow,
            'password' => Hash::make('4dm1nP4ss#')
        ]);
    }
}
