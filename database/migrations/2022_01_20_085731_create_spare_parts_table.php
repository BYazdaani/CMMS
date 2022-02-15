<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSparePartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spare_parts', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("stock_site_id");
            $table->unsignedBigInteger("spare_part_category_id");
            $table->string("code");
            $table->string("emplacement");
            $table->string("designation");
            $table->integer("init_stock");
            $table->integer("actual_stock");
            $table->string("alert_threshold");
            $table->float("unite_price");
            $table->string("description");
            $table->string("observation");
            $table->integer("in_stock")->default(0);
            $table->integer("out_stock")->default(0);
            $table->foreign("stock_site_id")->on("stock_sites")->references("id")->onDelete("cascade");
            $table->foreign("spare_part_category_id")->on("spare_part_categories")->references("id")->onDelete("cascade");
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

        Schema::table("spare_parts", function (Blueprint $blueprint) {

            $blueprint->dropForeign('spare_parts_stock_site_id_foreign');
            $blueprint->dropForeign('spare_parts_spare_part_category_id_foreign');

        });

        Schema::dropIfExists('spare_parts');
    }
}
