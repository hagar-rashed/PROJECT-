<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Governorate;

class GovernorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $governorates = [
            'القاهرة', 'الإسكندرية', 'الجيزة', 'القليوبية', 'بورسعيد', 'السويس', 'الأقصر', 'أسوان', 'أسيوط',
            'البحيرة', 'بني سويف', 'الدقهلية', 'دمياط', 'الفيوم', 'الغربية', 'الإسماعيلية', 'كفر الشيخ',
            'مطروح', 'المنيا', 'المنوفية', 'الوادي الجديد', 'شمال سيناء', 'قنا', 'البحر الأحمر', 'الشرقية', 'سوهاج', 'جنوب سيناء'
        ];

        foreach ($governorates as $governorate) {
            Governorate::create(['name' => $governorate]);
        }
    }
}
