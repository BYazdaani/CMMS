<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('zone_id');
            $table->unsignedBigInteger('department_id');
            $table->string("name");
            $table->string("code");
            $table->string("serial_number");
            $table->string("model");
            $table->foreign('zone_id')->on("zones")->references("id")->onDelete("cascade");
            $table->foreign('department_id')->on("departments")->references("id")->onDelete("cascade");
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

        Schema::table('equipment', function (Blueprint $blueprint){
           $blueprint->dropForeign("equipment_zone_id_foreign");
           $blueprint->dropForeign("equipment_department_id_foreign");
        });

        Schema::dropIfExists('equipment');
    }
}
