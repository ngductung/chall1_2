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
        Schema::create('turn_in_asses', function (Blueprint $table) {
            $table->id();
            $table->string('username_turnIn', 50);
            $table->bigInteger('id_Ass')->unsigned();
            $table->string('link', 1000);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreign('username_turnIn')->references('username')->on('accounts');
            $table->foreign('id_Ass')->references('id')->on('assignments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turn_in_asses');
    }
};
