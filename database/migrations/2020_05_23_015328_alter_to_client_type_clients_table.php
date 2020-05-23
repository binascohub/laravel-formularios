<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterToClientTypeClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->string('document_number')->uniqid()->change();
            $table->date('date_birth')->nullable()->change();
            $table->string('sex', 1)->nullable()->change();
            $table->string('marital_status', array_keys(\App\Client::MARITAL_STATUS))->nullable()->change();
            $table->string('company_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropUnique('clients_document_number_unique');
            $table->date('date_birth')->change();
            $table->string('sex', 1)->change();
            $table->string('marital_status', array_keys(\App\Client::MARITAL_STATUS))
                ->change();
            $table->dropColumn('company_name');
        });
    }
}
