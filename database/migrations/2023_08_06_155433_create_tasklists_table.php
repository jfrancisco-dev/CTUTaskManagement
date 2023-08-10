<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasklistsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('tasklists')) {
            Schema::create('tasklists', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('desc');
                $table->unsignedBigInteger('user_id');
                $table->timestamps();

                $table->foreign('user_id')
                    ->references('id')
                    ->on('users');
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('tasklists');
    }
}
