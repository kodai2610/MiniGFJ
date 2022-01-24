<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //クエリビルダ

class FeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $params = [
            ['name' => '第二新卒可'],
            ['name' => '学歴不問'],
            ['name' => '2年連続成長'],
            ['name' => '長期休暇制度'],
            ['name' => '社会保険完備'],
            ['name' => '交通費別途支給'],
            ['name' => '未経験歓迎'],
            ['name' => '年間休日120日以上'],
            ['name' => '経験者優遇'],
            ['name' => '資格取得支援制度'],
            ['name' => '研修制度充実'],
            ['name' => '残業少なめ'],
            ['name' => '駅から徒歩10分以内'],
            ['name' => '転勤なし'],
            ['name' => '平均年齢20代'],
        ];
        foreach($params as $param) {
            DB::table('features')->insert($param);
        }
    }
}
