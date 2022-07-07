<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyApplicantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_applicant', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('company_info_id');
            $table->string('application_id');
            $table->string('applicant_name')->nullable();
            $table->string('citizen_image', 200)->nullable();
            $table->string('applicant_phone')->nullable();
            $table->string('applicant_email')->nullable();
            $table->string('applicant_nid')->nullable();
            $table->string('applicant_designation_id')->nullable();
            $table->string('applicant_address')->nullable();
            $table->string('applicant_parmanent_address')->nullable();
            $table->string('is_owner', 20)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_applicant');
    }
}
