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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            ['name' => 'Alberto Galleguillos', 'email' => 'agalleguillos.tfs@gmail.com', 'password' => bcrypt('segasi1205')],
            ['name' => 'Adán Galaz', 'email' => 'agalaz.tfs@gmail.com', 'password' => bcrypt('segasi1205')],
            ['name' => 'Bryan Peña', 'email' => 'bpena.tfs@gmail.com', 'password' => bcrypt('segasi1205')],
            ['name' => 'Lucio Ugolini', 'email' => 'lucio.tfs@gmail.com', 'password' => bcrypt('segasi1205')]
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
