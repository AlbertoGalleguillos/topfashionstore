<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uid')->unique();
            $table->string('name');
            $table->string('photo_url')->default('user-icon.png');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            ['name' => 'Alberto Galleguillos', 'uid' => 'agalleguillos', 'password' => bcrypt('segasi1205')],
            ['name' => 'Lucio Ugolini', 'uid' => 'lucio', 'password' => bcrypt('tfs.2018')]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
