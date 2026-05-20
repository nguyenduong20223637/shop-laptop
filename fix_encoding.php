<?php
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

// Lấy tất cả sản phẩm và fix encoding mô tả
$products = \App\Models\Product::all();
$fixed = 0;

foreach ($products as $product) {
    $mo_ta = $product->mo_ta;
    
    // Thử fix encoding từ latin1 sang utf8
    $fixed_mo_ta = mb_convert_encoding($mo_ta, 'UTF-8', 'UTF-8');
    
    // Nếu vẫn có ký tự lạ, thử convert từ latin1
    if (preg_match('/\?{3,}/', $fixed_mo_ta)) {
        $fixed_mo_ta = mb_convert_encoding($mo_ta, 'UTF-8', 'ISO-8859-1');
    }
    
    if ($fixed_mo_ta !== $mo_ta) {
        $product->mo_ta = $fixed_mo_ta;
        $product->save();
        $fixed++;
        echo "Fixed: " . $product->ten_san_pham . "\n";
    }
}

echo "Done! Fixed $fixed products.\n";
