<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create("users", function (Blueprint $table) {
            $table->id();
            $table->string("name");

            $table->string("phone");

            $table->string("email");

            $table->string("remember_token");

            $table->string("password");

            $table->unsignedBigInteger("types_users_id");

            $table->foreign("types_users_id")->references("id")->on("types_users");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists("users");
    }
};
