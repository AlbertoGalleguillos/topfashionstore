<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type'); // RT or XM
            $table->string('unix'); // 2 String code
            $table->boolean('closed')->default(false);
            $table->integer('zone_id')->unsigned();
            $table->foreign('zone_id')->references('id')->on('zones');
            $table->integer('brand_id')->unsigned();
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->date('open_date')->default(null);
            $table->date('close_date')->nullable();
            $table->timestamps();
        });

        DB::table('stores')->insert([
            ['name' => 'Compañía', 'type' => 'RT', 'unix' => 'CO', 'zone_id' => 1, 'brand_id' => 1, 'open_date' => '2009-12-03', 'closed' => true, 'created_at' => now()],
            ['name' => 'Carlos Antúnez', 'type' => 'RT', 'unix' => 'CA', 'zone_id' => 3, 'brand_id' => 1, 'open_date' => '2010-01-11', 'closed' => true, 'created_at' => now()],
            ['name' => 'Bascuñán', 'type' => 'RT', 'unix' => 'BA', 'zone_id' => 1, 'brand_id' => 1, 'open_date' => '1900-01-01', 'closed' => true, 'created_at' => now()],
            ['name' => 'Catedral', 'type' => 'RT', 'unix' => 'CT', 'zone_id' => 3, 'brand_id' => 1, 'open_date' => '2009-12-14', 'closed' => true, 'created_at' => now()],
            ['name' => 'Monjitas', 'type' => 'RT', 'unix' => 'MJ', 'zone_id' => 3, 'brand_id' => 1, 'open_date' => '2009-12-22', 'closed' => false, 'created_at' => now()],
            ['name' => 'Macul', 'type' => 'RT', 'unix' => 'MC', 'zone_id' => 1, 'brand_id' => 2, 'open_date' => '2010-01-19', 'closed' => true, 'created_at' => now()],
            ['name' => 'San Agustín', 'type' => 'RT', 'unix' => 'GU', 'zone_id' => 3, 'brand_id' => 1, 'open_date' => '2009-12-31', 'closed' => true, 'created_at' => now()],
            ['name' => 'Plaza Italia', 'type' => 'RT', 'unix' => 'IT', 'zone_id' => 3, 'brand_id' => 2, 'open_date' => '2010-01-19', 'closed' => false, 'created_at' => now()],
            ['name' => 'Moneda', 'type' => 'RT', 'unix' => 'MO', 'zone_id' => 2, 'brand_id' => 1, 'open_date' => '2009-11-13', 'closed' => false, 'created_at' => now()],
            ['name' => 'Chile-España', 'type' => 'RT', 'unix' => 'CE', 'zone_id' => 1, 'brand_id' => 1, 'open_date' => '2010-04-13', 'closed' => false, 'created_at' => now()],
            ['name' => 'Irarrázaval', 'type' => 'RT', 'unix' => 'IR', 'zone_id' => 1, 'brand_id' => 2, 'open_date' => '2010-01-16', 'closed' => true, 'created_at' => now()],
            ['name' => 'Merced', 'type' => 'RT', 'unix' => 'MD', 'zone_id' => 3, 'brand_id' => 2, 'open_date' => '2010-03-08', 'closed' => false, 'created_at' => now()],
            ['name' => 'La Florida', 'type' => 'RT', 'unix' => 'LF', 'zone_id' => 1, 'brand_id' => 1, 'open_date' => '2010-04-01', 'closed' => false, 'created_at' => now()],
            ['name' => 'Los Leones', 'type' => 'RT', 'unix' => 'LE', 'zone_id' => 1, 'brand_id' => 1, 'open_date' => '2010-01-11', 'closed' => true, 'created_at' => now()],
            ['name' => 'Providencia', 'type' => 'RT', 'unix' => 'PR', 'zone_id' => 1, 'brand_id' => 1, 'open_date' => '2010-01-11', 'closed' => true, 'created_at' => now()],
            ['name' => 'Agustinas', 'type' => 'RT', 'unix' => 'AG', 'zone_id' => 3, 'brand_id' => 1, 'open_date' => '2009-12-31', 'closed' => false, 'created_at' => now()],
            ['name' => '21 de Mayo', 'type' => 'RT', 'unix' => 'VM', 'zone_id' => 1, 'brand_id' => 1, 'open_date' => '2009-12-03', 'closed' => true, 'created_at' => now()],
            ['name' => 'Suecia', 'type' => 'RT', 'unix' => 'SU', 'zone_id' => 1, 'brand_id' => 1, 'open_date' => '2009-11-26', 'closed' => true, 'created_at' => now()],
            ['name' => 'Alameda', 'type' => 'XM', 'unix' => 'A0', 'zone_id' => 6, 'brand_id' => 1, 'open_date' => '1900-01-01', 'closed' => true, 'created_at' => now()],
            ['name' => 'General Velázquez', 'type' => 'XM', 'unix' => 'GV', 'zone_id' => 6, 'brand_id' => 1, 'open_date' => '1900-01-01', 'closed' => false, 'created_at' => now()],
            ['name' => 'Puente Alto', 'type' => 'RT', 'unix' => 'PA', 'zone_id' => 1, 'brand_id' => 1, 'open_date' => '2010-06-17', 'closed' => false, 'created_at' => now()],
            ['name' => 'Las Rejas', 'type' => 'RT', 'unix' => 'LR', 'zone_id' => 1, 'brand_id' => 3, 'open_date' => '2010-06-29', 'closed' => true, 'created_at' => now()],
            ['name' => 'Bodegas Prendas', 'type' => 'RT', 'unix' => 'BP', 'zone_id' => 2, 'brand_id' => 1, 'open_date' => '2013-12-19', 'closed' => false, 'created_at' => now()],
            ['name' => 'Mapocho', 'type' => 'RT', 'unix' => 'MA', 'zone_id' => 2, 'brand_id' => 3, 'open_date' => '2010-09-07', 'closed' => true, 'created_at' => now()],
            ['name' => 'Morande', 'type' => 'RT', 'unix' => 'MR', 'zone_id' => 1, 'brand_id' => 1, 'open_date' => '2010-10-14', 'closed' => false, 'created_at' => now()],
            ['name' => 'Orrego Luco', 'type' => 'RT', 'unix' => 'OR', 'zone_id' => 3, 'brand_id' => 1, 'open_date' => '2010-12-01', 'closed' => false, 'created_at' => now()],
            ['name' => 'Mac-Iver', 'type' => 'RT', 'unix' => 'MI', 'zone_id' => 3, 'brand_id' => 1, 'open_date' => '2011-01-06', 'closed' => false, 'created_at' => now()],
            ['name' => 'San Pablo', 'type' => 'RT', 'unix' => 'SP', 'zone_id' => 2, 'brand_id' => 3, 'open_date' => '2011-01-20', 'closed' => true, 'created_at' => now()],
            ['name' => 'Nicasio Retamales', 'type' => 'RT', 'unix' => 'NR', 'zone_id' => 6, 'brand_id' => 1, 'open_date' => '1900-01-01', 'closed' => false, 'created_at' => now()],
            ['name' => 'Puente', 'type' => 'RT', 'unix' => 'PU', 'zone_id' => 2, 'brand_id' => 1, 'open_date' => '2011-04-12', 'closed' => false, 'created_at' => now()],
            ['name' => 'Bustamante', 'type' => 'RT', 'unix' => 'BU', 'zone_id' => 1, 'brand_id' => 1, 'open_date' => '2011-06-28', 'closed' => false, 'created_at' => now()],
            ['name' => 'Valparaíso', 'type' => 'RT', 'unix' => 'VA', 'zone_id' => 4, 'brand_id' => 2, 'open_date' => '2011-10-14', 'closed' => false, 'created_at' => now()],
            ['name' => 'Esmeralda', 'type' => 'RT', 'unix' => 'ES', 'zone_id' => 4, 'brand_id' => 1, 'open_date' => '2011-11-29', 'closed' => true, 'created_at' => now()],
            ['name' => 'Ecuador', 'type' => 'RT', 'unix' => 'CU', 'zone_id' => 4, 'brand_id' => 1, 'open_date' => '2011-12-13', 'closed' => true, 'created_at' => now()],
            ['name' => 'Padre Mariano', 'type' => 'RT', 'unix' => 'PM', 'zone_id' => 3, 'brand_id' => 1, 'open_date' => '2012-03-27', 'closed' => true, 'created_at' => now()],
            ['name' => 'Luis Thayer Ojeda', 'type' => 'RT', 'unix' => 'LT', 'zone_id' => 3, 'brand_id' => 2, 'open_date' => '2012-05-03', 'closed' => false, 'created_at' => now()],
            ['name' => 'San Antonio', 'type' => 'RT', 'unix' => 'SA', 'zone_id' => 2, 'brand_id' => 1, 'open_date' => '2012-07-06', 'closed' => true, 'created_at' => now()],
            ['name' => 'Talagante', 'type' => 'RT', 'unix' => 'TA', 'zone_id' => 1, 'brand_id' => 1, 'open_date' => '2012-06-23', 'closed' => false, 'created_at' => now()],
            ['name' => 'San Martín', 'type' => 'RT', 'unix' => 'SM', 'zone_id' => 2, 'brand_id' => 1, 'open_date' => '2012-06-12', 'closed' => true, 'created_at' => now()],
            ['name' => 'San Felipe', 'type' => 'RT', 'unix' => 'SF', 'zone_id' => 4, 'brand_id' => 1, 'open_date' => '2012-10-05', 'closed' => true, 'created_at' => now()],
            ['name' => 'Los Andes', 'type' => 'RT', 'unix' => 'LA', 'zone_id' => 4, 'brand_id' => 1, 'open_date' => '2012-10-24', 'closed' => true, 'created_at' => now()],
            ['name' => 'Peñalolén', 'type' => 'RT', 'unix' => 'PE', 'zone_id' => 2, 'brand_id' => 2, 'open_date' => '2012-11-21', 'closed' => false, 'created_at' => now()],
            ['name' => 'Sumar', 'type' => 'RT', 'unix' => 'OS', 'zone_id' => 1, 'brand_id' => 1, 'open_date' => '2012-11-12', 'closed' => true, 'created_at' => now()],
            ['name' => 'Santa Lucía', 'type' => 'RT', 'unix' => 'SL', 'zone_id' => 2, 'brand_id' => 1, 'open_date' => '2012-11-03', 'closed' => false, 'created_at' => now()],
            ['name' => 'Arica', 'type' => 'RT', 'unix' => 'AR', 'zone_id' => 1, 'brand_id' => 1, 'open_date' => '2012-10-30', 'closed' => true, 'created_at' => now()],
            ['name' => 'Salinas', 'type' => 'RT', 'unix' => 'SS', 'zone_id' => 4, 'brand_id' => 2, 'open_date' => '2012-11-30', 'closed' => false, 'created_at' => now()],
            ['name' => 'Villa Alemana', 'type' => 'RT', 'unix' => 'VI', 'zone_id' => 4, 'brand_id' => 1, 'open_date' => '2012-12-07', 'closed' => false, 'created_at' => now()],
            ['name' => 'Pedro Montt', 'type' => 'RT', 'unix' => 'PT', 'zone_id' => 4, 'brand_id' => 3, 'open_date' => '2013-01-21', 'closed' => true, 'created_at' => now()],
            ['name' => 'Limache', 'type' => 'RT', 'unix' => 'LI', 'zone_id' => 4, 'brand_id' => 1, 'open_date' => '2013-02-01', 'closed' => false, 'created_at' => now()],
            ['name' => 'Santa Marta', 'type' => 'RT', 'unix' => 'SN', 'zone_id' => 2, 'brand_id' => 2, 'open_date' => '2012-12-22', 'closed' => false, 'created_at' => now()],
            ['name' => 'Calera', 'type' => 'RT', 'unix' => 'LC', 'zone_id' => 4, 'brand_id' => 1, 'open_date' => '2013-05-30', 'closed' => false, 'created_at' => now()],
            ['name' => 'San Bernardo', 'type' => 'RT', 'unix' => 'SB', 'zone_id' => 1, 'brand_id' => 1, 'open_date' => '2013-06-14', 'closed' => false, 'created_at' => now()],
            ['name' => 'Puerto Varas', 'type' => 'RT', 'unix' => 'PV', 'zone_id' => 5, 'brand_id' => 2, 'open_date' => '2013-06-10', 'closed' => false, 'created_at' => now()],
            ['name' => 'Puerto Montt', 'type' => 'RT', 'unix' => 'TT', 'zone_id' => 5, 'brand_id' => 2, 'open_date' => '2013-07-03', 'closed' => false, 'created_at' => now()],
            ['name' => 'Osorno', 'type' => 'RT', 'unix' => 'NO', 'zone_id' => 5, 'brand_id' => 1, 'open_date' => '2013-07-10', 'closed' => false, 'created_at' => now()],
            ['name' => 'Centro Puerto Montt', 'type' => 'RT', 'unix' => 'P2', 'zone_id' => 5, 'brand_id' => 1, 'open_date' => '2013-07-24', 'closed' => false, 'created_at' => now()],
            ['name' => 'J.J. Mira', 'type' => 'XM', 'unix' => 'JM', 'zone_id' => 6, 'brand_id' => 1, 'open_date' => '1900-01-01', 'closed' => false, 'created_at' => now()],
            ['name' => 'Con-Con', 'type' => 'RT', 'unix' => 'CC', 'zone_id' => 4, 'brand_id' => 2, 'open_date' => '2013-08-09', 'closed' => false, 'created_at' => now()],
            ['name' => 'Padre las Casas', 'type' => 'RT', 'unix' => 'PL', 'zone_id' => 5, 'brand_id' => 1, 'open_date' => '2013-09-05', 'closed' => false, 'created_at' => now()],
            ['name' => 'Barrio Inglés', 'type' => 'RT', 'unix' => 'BI', 'zone_id' => 5, 'brand_id' => 2, 'open_date' => '2013-09-04', 'closed' => false, 'created_at' => now()],
            ['name' => 'Melipilla', 'type' => 'RT', 'unix' => 'ME', 'zone_id' => 1, 'brand_id' => 2, 'open_date' => '2013-10-28', 'closed' => false, 'created_at' => now()],
            ['name' => 'Arturo Prat', 'type' => 'RT', 'unix' => 'O2', 'zone_id' => 5, 'brand_id' => 2, 'open_date' => '2013-11-16', 'closed' => false, 'created_at' => now()],
            ['name' => 'Los Volcanes', 'type' => 'RT', 'unix' => 'LV', 'zone_id' => 1, 'brand_id' => 1, 'open_date' => '1900-01-01', 'closed' => true, 'created_at' => now()],
            ['name' => 'Paine', 'type' => 'RT', 'unix' => 'NE', 'zone_id' => 1, 'brand_id' => 1, 'open_date' => '1900-01-01', 'closed' => true, 'created_at' => now()],
            ['name' => 'Mercado Negro', 'type' => 'RT', 'unix' => 'MN', 'zone_id' => 1, 'brand_id' => 1, 'open_date' => '2014-01-11', 'closed' => false, 'created_at' => now()],
            ['name' => 'Alerces', 'type' => 'RT', 'unix' => 'AL', 'zone_id' => 5, 'brand_id' => 1, 'open_date' => '2014-07-27', 'closed' => false, 'created_at' => now()],
            ['name' => 'Villarica', 'type' => 'RT', 'unix' => 'VR', 'zone_id' => 5, 'brand_id' => 2, 'open_date' => '2014-08-25', 'closed' => false, 'created_at' => now()],
            ['name' => 'Santa Raquel', 'type' => 'RT', 'unix' => 'SR', 'zone_id' => 1, 'brand_id' => 1, 'open_date' => '2014-08-25', 'closed' => false, 'created_at' => now()],
            ['name' => 'Temuco', 'type' => 'RT', 'unix' => 'TE', 'zone_id' => 5, 'brand_id' => 1, 'open_date' => '2014-10-30', 'closed' => false, 'created_at' => now()],
            ['name' => 'Valdivia', 'type' => 'RT', 'unix' => 'VD', 'zone_id' => 5, 'brand_id' => 2, 'open_date' => '2015-01-08', 'closed' => false, 'created_at' => now()],
            ['name' => 'Condell', 'type' => 'RT', 'unix' => 'LL', 'zone_id' => 4, 'brand_id' => 1, 'open_date' => '2015-04-06', 'closed' => false, 'created_at' => now()],
            ['name' => 'Bosquemar', 'type' => 'RT', 'unix' => 'BM', 'zone_id' => 5, 'brand_id' => 2, 'open_date' => '2015-06-07', 'closed' => false, 'created_at' => now()],
            ['name' => 'Victoria', 'type' => 'RT', 'unix' => 'VT', 'zone_id' => 5, 'brand_id' => 1, 'open_date' => '2015-07-01', 'closed' => false, 'created_at' => now()],
            ['name' => 'Labranza', 'type' => 'RT', 'unix' => 'LB', 'zone_id' => 5, 'brand_id' => 1, 'open_date' => '1900-01-01', 'closed' => false, 'created_at' => now()],
            ['name' => 'Los Carrera', 'type' => 'XM', 'unix' => 'CO', 'zone_id' => 6, 'brand_id' => 1, 'open_date' => '1900-01-01', 'closed' => false, 'created_at' => now()],
            ['name' => 'Quilicura', 'type' => 'RT', 'unix' => 'QA', 'zone_id' => 2, 'brand_id' => 1, 'open_date' => '1900-01-01', 'closed' => false, 'created_at' => now()],
            ['name' => 'Chillán', 'type' => 'RT', 'unix' => 'CH', 'zone_id' => 5, 'brand_id' => 1, 'open_date' => '1900-01-01', 'closed' => false, 'created_at' => now()],
            ['name' => 'Carlos Valdovinos', 'type' => 'RT', 'unix' => 'CV', 'zone_id' => 1, 'brand_id' => 2, 'open_date' => '1900-01-01', 'closed' => false, 'created_at' => now()],
            ['name' => 'Independencia', 'type' => 'RT', 'unix' => 'IN', 'zone_id' => 2, 'brand_id' => 1, 'open_date' => '1900-01-01', 'closed' => true, 'created_at' => now()],
            ['name' => 'Chillán Centro', 'type' => 'RT', 'unix' => '5A', 'zone_id' => 5, 'brand_id' => 1, 'open_date' => '1900-01-01', 'closed' => false, 'created_at' => now()],
            ['name' => 'Andalue', 'type' => 'RT', 'unix' => 'AN', 'zone_id' => 5, 'brand_id' => 2, 'open_date' => '1900-01-01', 'closed' => false, 'created_at' => now()],
            ['name' => 'Reñaca', 'type' => 'RT', 'unix' => 'RE', 'zone_id' => 4, 'brand_id' => 2, 'open_date' => '1900-01-01', 'closed' => false, 'created_at' => now()],
            ['name' => 'Casa Blanca', 'type' => 'RT', 'unix' => 'CB', 'zone_id' => 4, 'brand_id' => 1, 'open_date' => '1900-01-01', 'closed' => false, 'created_at' => now()],
            ['name' => 'Pudahuel', 'type' => 'RT', 'unix' => 'PD', 'zone_id' => 2, 'brand_id' => 2, 'open_date' => '1900-01-01', 'closed' => false, 'created_at' => now()],
            ['name' => 'Quillota', 'type' => 'RT', 'unix' => 'QI', 'zone_id' => 4, 'brand_id' => 1, 'open_date' => '1900-01-01', 'closed' => false, 'created_at' => now()],
            ['name' => 'Recoleta', 'type' => 'RT', 'unix' => 'RC', 'zone_id' => 2, 'brand_id' => 1, 'open_date' => '1900-01-01', 'closed' => false, 'created_at' => now()],
            ['name' => 'Urmeneta', 'type' => 'RT', 'unix' => 'UR', 'zone_id' => 5, 'brand_id' => 2, 'open_date' => '1900-01-01', 'closed' => false, 'created_at' => now()],
            ['name' => 'Buin', 'type' => 'RT', 'unix' => 'BN', 'zone_id' => 1, 'brand_id' => 2, 'open_date' => '1900-01-01', 'closed' => false, 'created_at' => now()],
            ['name' => 'Bodega Prendas Sur', 'type' => 'RT', 'unix' => 'BS', 'zone_id' => 5, 'brand_id' => 1, 'open_date' => '1900-01-01', 'closed' => false, 'created_at' => now()],
            ['name' => 'Herrera', 'type' => 'RT', 'unix' => 'HE', 'zone_id' => 2, 'brand_id' => 1, 'open_date' => '1900-01-01', 'closed' => false, 'created_at' => now()],
            ['name' => 'Panguipulli', 'type' => 'RT', 'unix' => 'PP', 'zone_id' => 5, 'brand_id' => 1, 'open_date' => '1900-01-01', 'closed' => false, 'created_at' => now()],
            ['name' => 'Aldunate', 'type' => 'RT', 'unix' => 'DU', 'zone_id' => 5, 'brand_id' => 2, 'open_date' => '1900-01-01', 'closed' => false, 'created_at' => now()],
            ['name' => 'Matta', 'type' => 'RT', 'unix' => 'MT', 'zone_id' => 2, 'brand_id' => 1, 'open_date' => '1900-01-01', 'closed' => false, 'created_at' => now()],
            ['name' => 'El Bosque', 'type' => 'RT', 'unix' => 'EB', 'zone_id' => 1, 'brand_id' => 1, 'open_date' => '1900-01-01', 'closed' => false, 'created_at' => now()]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
}
