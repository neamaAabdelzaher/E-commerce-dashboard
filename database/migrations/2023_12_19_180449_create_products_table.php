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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar',100);
            $table->string('name_en',100);
            $table->boolean('status')->default(true);
            $table->integer('code')->check('code ~ \'^[0-9]{1,5}\'')->unique();
            $table->decimal('price',8,2);
            $table->integer('quantity')->check('quantity ~ \'^[0-9]{1,4}\'')->default(1);
            $table->string('image',100);
            $table->text('des_ar');
            $table->text('des_en');
            $table->foreignId('sub_category_id')->constrained('sub_categories');
            $table->foreignId('brand_id')->nullable()->constrained('brands');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
