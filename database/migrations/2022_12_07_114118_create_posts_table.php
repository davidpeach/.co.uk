<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
    {
        public function up(): void
        {
            Schema::create('posts', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->text('excerpt');
                $table->text('content_markdown');
                $table->timestamp('published_at')->default(DB::raw('CURRENT_TIMESTAMP'));
                $table->timestamps();
            });
        }

        public function down(): void
        {
            Schema::dropIfExists('posts');
        }
    };
