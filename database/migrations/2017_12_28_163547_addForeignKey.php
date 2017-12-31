<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('users', function (Blueprint $table) {
        //     $table->foreign('biodata_id')->references('id')->on('biodatas');
        // });

        // Schema::table('sarans', function (Blueprint $table) {
        //     $table->foreign('user_id')->references('id')->on('users');
        //     $table->foreign('target_id')->references('id')->on('targets');
        // });

        // Schema::table('comments', function (Blueprint $table) {
        //     $table->foreign('user_id')->references('id')->on('users');
        //     $table->foreign('saran_id')->references('id')->on('sarans');
        // });

        // Schema::table('biodatas', function (Blueprint $table) {
        //     $table->foreign('jurusan_id')->references('id')->on('jurusans');
        // });

        // Schema::table('supports', function (Blueprint $table) {
        //     $table->foreign('user_id')->references('id')->on('users');
        //     $table->foreign('saran_id')->references('id')->on('sarans');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
