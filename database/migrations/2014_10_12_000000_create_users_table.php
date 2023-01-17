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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',25);
            $table->string('surname',25);
            $table->string('personal_id_number',11)->unique();
            $table->date('date_of_birth');
            $table->string('address');
            $table->string('phone_number',9);
            $table->string('email',)->unique();
            
            $table->string('password');
            $table->enum('status',['user','admin','employee','doctor']);
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
        Schema::dropIfExists('users');
    }
};
