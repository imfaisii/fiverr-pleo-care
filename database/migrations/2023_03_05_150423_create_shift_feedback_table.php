<?php

use App\Models\Shift;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('shift_feedback', function (Blueprint $table) {
            $table->id();
            $table->text('comments');
            $table->float('rating')->default(1);
            $table->foreignIdFor(Shift::class);
            $table->timestamps();
        });
    }
};
