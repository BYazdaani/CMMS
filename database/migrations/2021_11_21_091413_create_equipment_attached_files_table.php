<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentAttachedFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment_attached_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('technical_file_id');
            $table->string("file");
            $table->foreign('technical_file_id')->on("technical_files")->references("id")->onDelete("cascade");
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

        Schema::table('equipment_attached_files', function (Blueprint $blueprint){
            $blueprint->dropForeign("equipment_attached_files_technical_file_id_foreign");
        });

        Schema::dropIfExists('equipment_attached_files');
    }
}
