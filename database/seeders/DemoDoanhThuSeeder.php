<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DemoDoanhThuSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['date' => '2026-05-13', 'amount' => 25000000],
            ['date' => '2026-05-14', 'amount' => 42000000],
            ['date' => '2026-05-15', 'amount' => 18500000],
            ['date' => '2026-05-16', 'amount' => 55000000],
            ['date' => '2026-05-17', 'amount' => 31000000],
            ['date' => '2026-05-18', 'amount' => 47500000],
        ];

        foreach ($data as $d) {
            DB::table('don_hangs')->insert([
                'user_id'              => 1,
                'tong_tien'            => $d['amount'],
                'ten_nguoi_nhan'       => 'Demo',
                'dia_chi'              => 'Ha Noi',
                'so_dien_thoai'        => '0900000000',
                'hinh_thuc_thanh_toan' => 1,
                'trang_thai'           => 4,
                'created_at'           => $d['date'] . ' 10:00:00',
                'updated_at'           => $d['date'] . ' 10:00:00',
            ]);
        }
        echo "Done\n";
    }
}
