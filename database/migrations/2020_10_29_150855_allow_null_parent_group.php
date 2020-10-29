<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AllowNullParentGroup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('groups', function (Blueprint $table) {
            $table->bigInteger('parent_id')->unsigned()->nullable(true)->change();
        });
        Schema::enableForeignKeyConstraints(); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('groups', function (Blueprint $table) {
            $table->bigInteger('parent_id')->unsigned()->nullable(false)->change();
        });
        Schema::enableForeignKeyConstraints(); 
    }
}
