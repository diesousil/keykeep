<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCredentialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credentials', function (Blueprint $table) {
            $table->bigIncrements('id');
			
			$table->string('title');
			$table->text('description');
			$table->string('url');
			$table->string('login');
			$table->string('password');
			$table->text('observations');
			
			$table->bigInteger('group_id')->unsigned()->nullable(false);
			$table->foreign('group_id')->references('id')->on('groups');
			
			$table->bigInteger('user_id')->unsigned()->nullable(false);
			$table->foreign('user_id')->references('id')->on('users');
			
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credential');
    }
}
