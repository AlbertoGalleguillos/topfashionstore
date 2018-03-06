<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        DB::table('ticket_statuses')->insert([
            ['name' => 'En Espera', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Detenido', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'En Progreso', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Terminado', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_statuses');
    }
}
