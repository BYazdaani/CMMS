<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_orders', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("work_request_id");
            $table->unsignedBigInteger("admin_id")->nullable();
            $table->unsignedBigInteger("maintenance_technician_id")->nullable();
            $table->string("type");
            $table->string("nature");
            $table->string("date");
            $table->string("hour");
            $table->text("description");
            $table->foreign('work_request_id')->on("work_requests")->references("id")->onDelete("cascade");
            $table->foreign('admin_id')->on("admins")->references("id")->onDelete("set null");
            $table->foreign('maintenance_technician_id')->on("maintenance_technicians")->references("id")->onDelete("set null");
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

        Schema::table('work_orders', function (Blueprint $blueprint){
            $blueprint->dropForeign("work_orders_work_request_id_foreign");
            $blueprint->dropForeign("work_orders_admin_id_foreign");
            $blueprint->dropForeign("work_orders_maintenance_technician_id_foreign");
        });

        Schema::dropIfExists('work_orders');
    }
}
