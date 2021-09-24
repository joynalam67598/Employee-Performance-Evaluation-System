<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('department_id');
            $table->integer('manager_id');
            $table->string('employee_official_id',150)->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email',150)->unique();
            $table->string('phone_number');
            $table->integer('employee_status')->default('1');
            $table->integer('rating')->default('300');
            $table->string('gender');
            $table->date('date_of_birth');
            $table->bigInteger('employee_salary');
            $table->string('employee_account_number');
            $table->string('qualification');
            $table->string('user_name',150)->unique();
            $table->string('password');
            $table->text('address');
            $table->text('employee_image');
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
        Schema::dropIfExists('employees');
    }
}
