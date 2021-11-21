<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechnicalFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technical_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('equipment_id');
            $table->string("picture");
            $table->string("power");
            $table->string("frequency");
            $table->string("electric_ower");
            $table->string("voltage");
            $table->string("weight");
            $table->string("capacity");
            $table->string("compressed_air_pressure");
            $table->string("start");
            $table->string("dimension");
            $table->string("description");
            $table->string("electrical_schema");
            $table->string("plan");
            $table->string("special_tools");
            $table->string("manufacturer");
            $table->string("address");
            $table->string("phone_number");
            $table->string("email");
            $table->string("cost");
            $table->string("date_of_manufacture");
            $table->string("date_of_purchase");
            $table->string("installation_date");
            $table->string("commissioning_date");
            $table->foreign('equipment_id')->on("equipment")->references("id")->onDelete("cascade");
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

        Schema::table('technical_files', function (Blueprint $blueprint){
            $blueprint->dropForeign("technical_equipment_id_foreign");
        });

        Schema::dropIfExists('technical_files');
    }
}
