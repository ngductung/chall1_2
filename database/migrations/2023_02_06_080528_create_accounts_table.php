<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('username', 50);
            $table->string('password', 50)->default('123');
            $table->string('name', 50);
            $table->string('email', 50)->nullable();
            $table->string('phone', 15)->nullable();
            $table->boolean('role')->default(0); //1 = teacher, 0 = student
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('accounts');
    }
};
