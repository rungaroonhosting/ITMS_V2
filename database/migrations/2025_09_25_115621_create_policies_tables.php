<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('policies', function (Blueprint $t) {
            $t->id();
            $t->string('title');
            $t->string('version')->default('1.0');
            $t->timestamp('published_at')->nullable();
            $t->string('file_path')->nullable();
            $t->timestamps();
        });

        Schema::create('policy_acceptances', function (Blueprint $t) {
            $t->id();
            $t->foreignId('policy_id')->constrained()->cascadeOnDelete();
            $t->foreignId('user_id')->constrained()->cascadeOnDelete();
            $t->timestamp('accepted_at')->nullable();
            $t->string('signature_name')->nullable();
            $t->ipAddress('ip')->nullable();
            $t->timestamps();
            $t->unique(['policy_id','user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('policy_acceptances');
        Schema::dropIfExists('policies');
    }
};
