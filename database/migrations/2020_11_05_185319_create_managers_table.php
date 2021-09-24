<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('managers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('department_id');
            $table->string('manager_official_id',150)->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email',150)->unique();
            $table->string('phone_number');
            $table->string('gender');
            $table->date('date_of_birth');
            $table->bigInteger('manager_salary');
            $table->string('manager_account_number');
            $table->string('qualification');
            $table->string('user_name',150)->unique();
            $table->string('password');
            $table->text('address');
            $table->text('manager_image');
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
        Schema::dropIfExists('managers');
    }
}
