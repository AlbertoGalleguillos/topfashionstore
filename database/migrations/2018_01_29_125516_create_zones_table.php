<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        DB::table('zones')->insert([
            ['name' => 'Stgo. Sur/Oriente', 'created_at' => now()],
            ['name' => 'Stgo. 1', 'created_at' => now()],
            ['name' => 'Stgo. 2', 'created_at' => now()],
            ['name' => 'V Región', 'created_at' => now()],
            ['name' => 'Los Lagos', 'created_at' => now()],
            ['name' => 'Por Mayor', 'created_at' => now()]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zones');
    }
}
