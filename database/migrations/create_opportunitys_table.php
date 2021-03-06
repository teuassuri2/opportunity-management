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
        Schema::create("opportunitys", function (Blueprint $table) {
            $table->id();
            $table->string("title");

            $table->string("description");

            $table->unsignedBigInteger("users_id");

            $table->foreign("users_id")->references("id")->on("users");

            $table->unsignedBigInteger("customers_id");

            $table->foreign("customers_id")->references("id")->on("customers");

            $table->unsignedBigInteger("products_id");
            $table->integer("description");
            $table->foreign("products_id")->references("id")->on("products");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists("opportunitys");
    }
};
