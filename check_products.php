<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\ThuongHieu;

$brands = ThuongHieu::select('id','ten_thuong_hieu','hinh_anh')->get();
foreach($brands as $b) {
    echo "ID {$b->id}: {$b->ten_thuong_hieu} -> " . ($b->hinh_anh ?: 'KHÔNG CÓ ẢNH') . "\n";
}
