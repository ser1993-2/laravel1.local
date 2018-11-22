<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BrandList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand_list', function (Blueprint $table) {
            $table->increments('id');
            $table->string('brand_name',100);
        });

        DB::table('brand_list')->insert(['brand_name' => "Toyota"]);
        DB::table('brand_list')->insert(['brand_name' => "Nissan"]);
        DB::table('brand_list')->insert(['brand_name' => "KIA"]);
        DB::table('brand_list')->insert(['brand_name' => "Opel"]);
        DB::table('brand_list')->insert(['brand_name' => "BMW"]);
        DB::table('brand_list')->insert(['brand_name' => "Mercedes-Benz"]);
        DB::table('brand_list')->insert(['brand_name' => "Mazda"]);
        DB::table('brand_list')->insert(['brand_name' => "Volkswagen"]);
        DB::table('brand_list')->insert(['brand_name' => "Honda"]);
        DB::table('brand_list')->insert(['brand_name' => "Audi"]);
        DB::table('brand_list')->insert(['brand_name' => "LADA"]);
        DB::table('brand_list')->insert(['brand_name' => "Mitsubishi"]);
        DB::table('brand_list')->insert(['brand_name' => "Hyundai"]);
        DB::table('brand_list')->insert(['brand_name' => "Chevrolet"]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brand_list');
    }
}
