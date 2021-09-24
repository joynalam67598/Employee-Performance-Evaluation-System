<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('department_id');
            $table->integer('manager_id');
            $table->string('task_name');
            $table->string('task_official_id',150)->unique();
            $table->integer('days_to_complete');
            $table->date('task_deadline');
            $table->Integer('number_of_stage');
            $table->text('task_description');
            $table->text('task_file')->nullable();
            $table->string('task_status')->default('new');
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
        Schema::dropIfExists('tasks');
    }
}
