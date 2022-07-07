<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyOwnerInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_owner_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('company_info_id');
            $table->string('application_id');
            $table->string('owner_name');
            $table->string('owner_phone');
            $table->string('owner_parmanent_address')->nullable();
            $table->string('owner_email');
            $table->string('owner_nid');
            $table->string('owner_designation_id');
            $table->string('owner_address');
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_owner_infos');
    }
}
