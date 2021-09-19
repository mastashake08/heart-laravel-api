<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfessionalTypeToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('account_type');
            $table->string('professional_type')->nullable();
            $table->string('business_name')->nullable();
            $table->longText('group_affiliation')->nullable();
            $table->json('address');
            $table->string('mental_health_license_type');
            $table->string('mental_health_license_number');
            $table->string('mental_health_license_state');
            $table->string('certification')->nullable();
            $table->string('certification_2')->nullable();
            $table->string('certification_3')->nullable();
            $table->string('malpractice_insurance_npi_number')->nullable();
            $table->string('malpractice_insurance_npi_carrier')->nullable();
            $table->string('malpractice_expiration_date')->nullable();
            $table->string('ceu_state')->nullable();
            $table->boolean('ceu_heart_interest')->default(false);
            $table->string('primary_language')->nullable();
            $table->string('secondary_language')->nullable();
            $table->string('mental_health_specialy')->nullable();
            $table->string('mental_health_specialy_2')->nullable();
            $table->string('mental_health_specialy_3')->nullable();
            $table->string('mental_health_treatment_preference')->nullable();
            $table->string('mental_health_treatment_preference_2')->nullable();
            $table->string('client_focus_age')->nullable();
            $table->string('client_focus_faith')->nullable();
            $table->string('client_focus_group_type')->nullable();
            $table->string('client_focus_group_name')->nullable();
            $table->decimal('client_focus_group_cost', 8, 2)->nullable();
            $table->string('client_focus_group_ethnicity')->nullable();
            $table->json('client_fluent_languages')->nullable();
            $table->decimal('session_costs', 8, 2)->nullable();
            $table->json('session_payment_methods')->nullable();
            $table->boolean('session_insurance')->default(false);
            $table->longText('bio')->nullable();
            $table->longText('covid_statement')->nullable();
            $table->boolean('teleheath_services')->default(false);
            $table->text('profile_video_path')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
