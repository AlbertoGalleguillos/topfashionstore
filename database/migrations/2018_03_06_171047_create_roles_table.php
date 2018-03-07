<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });

        DB::table('roles')->insert([
            ['name' => 'superAdmin', 'description' => 'Super Administrador', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'manager', 'description' => 'Gerente', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'ticketAdmin', 'description' => 'Administrador de Requerimientos', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'ticketAssign', 'description' => 'Encargado de resolver requerimientos', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
