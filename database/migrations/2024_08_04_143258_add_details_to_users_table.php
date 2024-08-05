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
        Schema::table('users', function (Blueprint $table) {
            $table->string('alamat')->nullable();
            $table->string('jabatan')->nullable();
            $table->date('tgl_mcu')->nullable();
            $table->date('induksi')->nullable();
            $table->date('tgl_masuk')->nullable();
            $table->date('tgl_keluar')->nullable();
            $table->string('no_hp')->nullable();
            $table->text('keterangan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('alamat');
            $table->dropColumn('jabatan');
            $table->dropColumn('tgl_mcu');
            $table->dropColumn('induksi');
            $table->dropColumn('tgl_masuk');
            $table->dropColumn('tgl_keluar');
            $table->dropColumn('no_hp');
            $table->dropColumn('keterangan');
        });
    }
};
