<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_attachments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('company_info_id')->default(0);
            $table->string('application_id');
            $table->string('attachment_title')->nullable();
            $table->string('attachment_title_en')->nullable();
            $table->string('attachment_file')->nullable();
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
        Schema::dropIfExists('company_attachments');
    }
}
