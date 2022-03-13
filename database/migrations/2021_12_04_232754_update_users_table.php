<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('g10_eng_unwh');
            $table->dropColumn('g7_eng_unwh');
            $table->dropColumn('g11old_organic_utl');
        });
        Schema::dropIfExists('g10_eng_unwhs');
        Schema::dropIfExists('g7_eng_unwhs');
        Schema::dropIfExists('g11old_organic_utls');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('g10_eng_unwh')->nullable()->after('updated_at');
            $table->text('g7_eng_unwh')->nullable()->after('g10_eng_unwh');
            $table->text('g11old_organic_utl')->nullable()->after('role');
        });
    }
}
