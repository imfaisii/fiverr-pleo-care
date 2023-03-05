<?php

use App\Models\Company;
use App\Models\Employee;
use App\Models\Manager;
use App\Models\Shift;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('shift_proposals', function (Blueprint $table) {
            $table->id();
            $table->string('status')->default('submitted');
            $table->foreignIdFor(Shift::class);
            $table->foreignIdFor(Employee::class);
            $table->foreignIdFor(Manager::class)->nullable();
            $table->foreignIdFor(Company::class);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('shift_proposals');
    }
};
