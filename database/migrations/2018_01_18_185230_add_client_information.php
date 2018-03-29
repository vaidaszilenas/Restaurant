<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\ServiceProvider;

class AddClientInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname');
            $table->integer('date_of_birth');
            $table->integer('phone_number');
            $table->string('address');
            $table->string('city');
            $table->integer('zip_code');
            $table->string('country');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
             $table->dropColumn(['surname', 'date_of_birth', 'phone_number', 'address', 'city', 'zip_code', 'country']);
        });
    }
}
