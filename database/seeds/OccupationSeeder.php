<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OccupationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $param = [
            'name' => '営業',
        ];
        DB::table('occupations')->insert($param);

        $param = [
            'name' => 'プログラマー',
        ];
        DB::table('occupations')->insert($param);

        $param = [
            'name' => '経理',
        ];
        DB::table('occupations')->insert($param);

        $param = [
            'name' => '事務',
        ];
        DB::table('occupations')->insert($param);

        $param = [
            'name' => '受付',
        ];
        DB::table('occupations')->insert($param);

    }
}
