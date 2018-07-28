<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('phone');
            $table->unsignedInteger('department_id');
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('branch_id');
            $table->unsignedInteger('title_id')->nullable();
            $table->string('status');
            $table->timestamps();

        });

        Schema::table('employees', function($table) {

            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
           $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
          $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');

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
