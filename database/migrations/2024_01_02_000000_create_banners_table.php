<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('ten_banner');
            $table->string('hinh_anh');
            $table->string('duong_dan')->default('/home/all-product');
            $table->integer('thu_tu')->default(0);
            $table->integer('trang_thai')->default(1);
            $table->timestamps();
        });

        DB::table('banners')->insert([
            ['ten_banner' => 'Banner 1 - Học tập', 'hinh_anh' => '/assets_client/imagesbanner/banner1.jpg', 'duong_dan' => '/home/danh-muc/2', 'thu_tu' => 1, 'trang_thai' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['ten_banner' => 'Banner 2 - Sale', 'hinh_anh' => '/assets_client/imagesbanner/banner2.jpg', 'duong_dan' => '/home/danh-muc/4', 'thu_tu' => 2, 'trang_thai' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['ten_banner' => 'Banner 3 - Gaming', 'hinh_anh' => '/assets_client/imagesbanner/banner3.jpg', 'duong_dan' => '/home/danh-muc/1', 'thu_tu' => 3, 'trang_thai' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
