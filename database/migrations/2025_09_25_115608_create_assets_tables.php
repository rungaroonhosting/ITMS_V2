<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('assets', function (Blueprint $t) {
            $t->id();
            $t->string('code')->unique()->index();
            $t->string('name');
            $t->string('category')->nullable();
            $t->string('serial')->nullable()->index();
            $t->enum('status',['in_stock','assigned','repair','retired'])->default('in_stock')->index();
            $t->foreignId('assigned_employee_id')->nullable()->constrained('employees')->nullOnDelete();
            $t->date('purchased_at')->nullable();
            $t->date('warranty_until')->nullable();
            $t->text('notes')->nullable();
            $t->timestamps();
            $t->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
