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
        Schema::table('categories', function (Blueprint $table) {
            $table->renameColumn('name', 'title');
            $table->string('keywords', 255)->nullable()->after('title');
            $table->dropForeign(['parent_id']);
            $table->dropColumn('slug');
            $table->integer('parent_id')->default(0)->change();
        });
    }

    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->renameColumn('title', 'name');
            $table->dropColumn('keywords');
            $table->string('slug')->unique()->nullable()->after('name');
            $table->unsignedBigInteger('parent_id')->nullable()->change();
            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('set null');
        });
    }
};
