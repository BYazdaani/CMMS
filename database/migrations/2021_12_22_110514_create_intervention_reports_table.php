<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterventionReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intervention_reports', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("work_order_id");
            $table->string("nature");
            $table->string("observation");
            $table->foreign("work_order_id")->on("work_orders")->references("id")->onDelete("cascade");
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

        Schema::table('intervention_reports', function (Blueprint $blueprint){
            $blueprint->dropForeign("intervention_reports_work_order_id_foreign");
        });

        Schema::dropIfExists('intervention_reports');
    }
}
