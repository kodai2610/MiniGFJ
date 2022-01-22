<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //クエリビルダ

class EmploymentTypeSeeder extends Seeder
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
            ['name' => '正社員'],
            ['name' => '契約社員'],
            ['name' => 'アルバイト・パート'],
            ['name' => 'インターン'],
            ['name' => '業務委託'],
            ['name' => 'FCオーナー'],
        ];
        foreach($params as $param) {
            DB::table('employment_types')->insert($param);
        }
    }
}
