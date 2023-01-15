<?php

use App\Constants\Constant;
use App\Models\Client;
use App\Models\Employee;
use App\Models\JobRole;
use App\Models\Manager;
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
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('name');
            $table->text('description');
            $table->timestamp('start_time');
            $table->timestamp('end_time');
            $table->text('address_address');
            $table->string('address_latitude');
            $table->string('address_longitude');
            $table->string('status')->default(Constant::CREATED);
            $table->foreignIdFor(JobRole::class);
            $table->foreignIdFor(Client::class);
            $table->foreignIdFor(Employee::class)->nullable();
            $table->foreignIdFor(Manager::class);
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
        Schema::dropIfExists('shifts');
    }
};
