<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companyinfo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('citizen_id');
            $table->string('community_member_radio_check');
            $table->string('community_member')->nullable();
            $table->text('community_member_number')->nullable();
            $table->string('company_name_bangla');
            $table->string('company_name');
            $table->string('business_web_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->text('company_address_bangla');
            $table->text('company_address');
            $table->string('company_phone_no');
            $table->string('company_mobile_no');
            $table->string('company_email');
            $table->string('company_year', 50);
            $table->string('ubid_business_category');
            $table->string('ubid_business_type');
            $table->string('company_trade_license', 200)->nullable();
            $table->string('company_bin', 200)->nullable();
            $table->string('company_tin', 200)->nullable();
            $table->tinyInteger('status')->default(0)->comment('0 = Dreft, 1=Submit, 3=Accept, 4=Processing, 5=Done,6=Rejected');
            $table->string('application_id');
            $table->string('tracking_no');
            $table->integer('com_user_id')->nullable();
            $table->bigInteger('ubid')->nullable();
            $table->boolean('note')->default(false);
            $table->string('certificate_link')->nullable();
            $table->string('commit_workflow')->nullable();
            $table->integer('n_doptor_user_id')->nullable();
            $table->boolean('is_view')->default(false);
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
        Schema::dropIfExists('companyinfo');
    }
}
