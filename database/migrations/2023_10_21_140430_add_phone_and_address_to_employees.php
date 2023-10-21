<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->string('emp_name',255)->nullable(false)->after('id');
            $table->text('phone')->nullable()->after('emp_name');
            $table->text('address')->nullable()->after('phone');
            $table->unsignedBigInteger('dept_id')->after('address');
            $table->foreign('dept_id')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn('emp_name');
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropForeign(['dept_id']);
            $table->dropColumn('dept_id');
        });
    }
};
