<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Government;

class GovernmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $governments = [
            'القاهرة', 'الإسكندرية', 'الجيزة', 'القليوبية', 'بورسعيد', 'السويس', 'الأقصر', 'أسوان', 'أسيوط',
            'البحيرة', 'بني سويف', 'الدقهلية', 'دمياط', 'الفيوم', 'الغربية', 'الإسماعيلية', 'كفر الشيخ',
            'مطروح', 'المنيا', 'المنوفية', 'الوادي الجديد', 'شمال سيناء', 'قنا', 'البحر الأحمر', 'الشرقية', 'سوهاج', 'جنوب سيناء'
        ];

        foreach ($governments as $government) {
            Government::create(['name' => $government]);
        }
    }
}
