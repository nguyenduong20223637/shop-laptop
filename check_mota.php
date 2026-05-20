<?php
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$p = \App\Models\Product::first();
echo "=== RAW mo_ta (first 500 chars) ===\n";
echo substr($p->mo_ta, 0, 500) . "\n";
echo "\n=== hex dump (first 100 bytes) ===\n";
echo bin2hex(substr($p->mo_ta, 0, 100)) . "\n";
