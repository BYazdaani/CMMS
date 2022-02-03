<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterventionReportSpareParts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intervention_report_spare_parts', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("intervention_report_id");
            $table->unsignedBigInteger("spare_part_id");
            $table->integer("quantity");
            $table->foreign("intervention_report_id")->references("id")->on("intervention_reports")->onDelete("cascade");
            $table->foreign("spare_part_id")->references("id")->on("spare_parts")->onDelete("cascade");
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
        Schema::table("intervention_report_spare_parts", function (Blueprint $table) {

            $table->dropForeign("intervention_report_spare_parts_intervention_report_id_foreign");
            $table->dropForeign("intervention_report_spare_parts_spare_part_id_foreign");

        });

        Schema::dropIfExists('intervention_report_spare_parts');
    }
}
