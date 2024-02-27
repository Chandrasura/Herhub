<?php

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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('role')->default('user');
            $table->string('name');
            $table->string('username')->unique();
            $table->bigInteger('vip_id')->unsigned()->nullable();
            $table->string('phone')->unique();
            $table->string('gender');
            $table->string('withdrawal_pin');
            $table->string('referral_code')->unique();
            $table->float('available_balance')->default(0.00);
            $table->float('total_balance')->default(0.00);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('wallet_address')->nullable();
            $table->rememberToken();
            $table->foreign('vip_id')->references('id')->on('vips')->onDelete('set null');
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
        Schema::dropIfExists('users');
    }
};
