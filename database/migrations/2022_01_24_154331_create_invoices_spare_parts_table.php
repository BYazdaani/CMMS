<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesSparePartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices_spare_parts', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("invoice_id");
            $table->unsignedBigInteger("spare_part_id");
            $table->integer("quantity");
            $table->foreign("invoice_id")->references("id")->on("invoices")->onDelete("cascade");
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

        Schema::table("invoices_spare_parts", function (Blueprint $table) {

            $table->dropForeign("invoices_spare_parts_invoice_id_foreign");
            $table->dropForeign("invoices_spare_parts_spare_part_id_foreign");

        });

        Schema::dropIfExists('invoices_spare_parts');
    }
}
