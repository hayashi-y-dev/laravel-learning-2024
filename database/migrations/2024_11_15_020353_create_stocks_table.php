<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // 商品名
            $table->enum('category', ['回復', '弾', '調合素材', 'その他']); // 種別
            $table->integer('quantity'); // 個数
            $table->text('memo')->nullable(); // メモ
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
    
};
