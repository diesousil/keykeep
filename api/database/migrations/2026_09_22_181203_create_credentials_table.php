<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('credentials', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUUid('user_id')->nullable()->index()->constrained("users", "id");
            $table->string("title", 255);
            $table->text("description")->nullable(true);
            $table->string("url", 255)->nullable(true);
            $table->string("username", 255)->nullable(true);
            $table->string("password", 255);
            $table->string("ckey", 255);
            $table->text("observations")->nullable(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('credentials');
    }
};
