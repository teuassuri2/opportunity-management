<?php

                use Illuminate\Database\Migrations\Migration;
                use Illuminate\Database\Schema\Blueprint;
                use Illuminate\Support\Facades\Schema;

                return new class extends Migration
                {
                    /**
                     * Run the migrations.
                     *
                     * @return void
                     */
                    public function up()
                    {
                        Schema::create("opportunitys_status", function (Blueprint $table) {
                            $table->id();$table->integer("status"); 
 
$table->unsignedBigInteger("users_id"); 
 
$table->foreign("users_id")->references("id")->on("users"); 
 
$table->unsignedBigInteger("opportunitys_id"); 
 
$table->foreign("opportunitys_id")->references("id")->on("opportunitys"); 
 

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
                        Schema::dropIfExists("opportunitys_status");
                    }
                };
                