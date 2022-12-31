<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->text('bio')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('skype_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->foreignIdFor(User::class);
            $table->timestamps();
        });
    }
};
