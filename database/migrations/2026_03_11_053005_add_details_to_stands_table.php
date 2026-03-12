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
        Schema::table('stands', function (Blueprint $table) {
            if (!Schema::hasColumn('stands', 'platillo')) {
                $table->string('platillo')->nullable()->after('nombre');
            }
            if (!Schema::hasColumn('stands', 'descripcion')) {
                $table->text('descripcion')->nullable()->after('platillo');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stands', function (Blueprint $table) {
            $table->dropColumn(['platillo', 'descripcion']);
        });
    }
};
