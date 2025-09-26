<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('incidents', function (Blueprint $t) {
            $t->id();
            $t->string('code')->unique();               // ex. INC-202409-0001
            $t->string('title');
            $t->text('description')->nullable();
            $t->enum('severity', ['low','medium','high','critical'])->default('low');
            $t->enum('status', ['open','in_progress','resolved','closed'])->default('open');
            $t->foreignId('reporter_id')->constrained('users')->cascadeOnDelete();
            $t->foreignId('assignee_id')->nullable()->constrained('users')->nullOnDelete();
            $t->timestamp('opened_at')->nullable();
            $t->timestamp('resolved_at')->nullable();
            $t->softDeletes();
            $t->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('incidents');
    }
};

