<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_requests', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("equipment_id");
            $table->unsignedBigInteger("user_id");
            $table->string("priority");
            $table->string("date");
            $table->string("hour");
            $table->string("lot");
            $table->text("description");
            $table->integer("status")->default(0);
            $table->foreign('equipment_id')->on("equipment")->references("id")->onDelete("cascade");
            $table->foreign('user_id')->on("users")->references("id")->onDelete("cascade");
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

        Schema::table('work_requests', function (Blueprint $blueprint){
            $blueprint->dropForeign("work_requests_equipment_id_foreign");
            $blueprint->dropForeign("work_requests_user_id_foreign");
        });

        Schema::dropIfExists('work_requests');
    }
}
