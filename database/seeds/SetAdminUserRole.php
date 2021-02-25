<?php

use Illuminate\Database\Seeder;

class SetAdminUserRole extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->where('users.id','=','1')->update([
            'role_id' => '1'
        ]);
    }
}
