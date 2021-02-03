<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNicknameToUsers extends Migration
{
    public function up(){
        Schema::table('users', function (Blueprint $table) {
            $table->string('nickname')->unique();
        });
    }

    public function down(){
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique('nickname');
            $table->dropColumn('nickname');
        });
    }
}