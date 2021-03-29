<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZIPModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zip_models', function (Blueprint $table) {
            $table->id();
            $table->string("zip", 12);
            $table->decimal("lat",13,8);
            $table->decimal("lng",13,8);
            $table->string("city",64);
            $table->string("state_id",64);
            $table->string("state_name",64);
            $table->boolean("zcta");
            $table->string("parent_zcta",64);
            $table->string("population", 64);
            $table->string("density",128);
            $table->string("county_fips",128);
            $table->string("county_name",128);
            $table->string("county_weights",128);
            $table->string("county_names_all",128);
            $table->string("county_fips_all",128);
            $table->boolean("imprecise");
            $table->boolean("military");
            $table->string("timezone",64);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zip_models');
    }
}
