<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('credentials', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUUid('user_id')->constrained("users", "id")->nullable()->index();
            $table->string("title", 255);
            $table->text("description");
            $table->string("url", 255);
            $table->string("username", 255);
            $table->string("password", 255);
            $table->string("ckey", 255);
            $table->text("observations");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credentials');
    }
};
