<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintenanceContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('wall_group_id');
            $table->string('name');
            $table->string('title');
            $table->string('phone')->nullable();
            $table->string('mobile_phone')->nullable();
            $table->string('email');
            $table->integer('contact_type_id')->nullable();
            $table->integer('priority_contact_method_id')->nullable();
            $table->integer('secondary_contact_method_id')->nullable();
            $table->integer('spoken_language_id')->nullable();
            $table->string('street')->nullable();
            $table->string('street2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('country')->nullable();
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
        Schema::dropIfExists('maintenance_contacts');
    }
}
