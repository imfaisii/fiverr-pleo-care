<?php

use App\Models\JobRole;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_role_payments', function (Blueprint $table) {
            $table->id();
            $table->string('day');
            $table->integer('day_number');
            $table->timestamp('from_time')->nullable();
            $table->timestamp('to_time')->nullable();
            $table->boolean('is_full_day')->default(false);
            $table->bigInteger('payment_amount');
            $table->foreignIdFor(JobRole::class);
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
        Schema::dropIfExists('job_role_payments');
    }
};
