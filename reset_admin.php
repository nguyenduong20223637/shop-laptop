<?php
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

\App\Models\Admin::where('email', 'admin@master.com')->update([
    'password' => bcrypt('admin123')
]);

echo "Done! Email: admin@master.com | Password: admin123\n";
