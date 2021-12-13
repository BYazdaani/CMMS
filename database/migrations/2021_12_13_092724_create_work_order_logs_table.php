<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkOrderLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_order_logs', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("work_order_id");
            $table->string("status");
            $table->foreign('work_order_id')->on("work_orders")->references("id")->onDelete("cascade");
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

        Schema::table('work_order_logs', function (Blueprint $blueprint){
            $blueprint->dropForeign("work_order_logs_work_order_id_foreign");
        });

        Schema::dropIfExists('work_order_logs');
    }
}
