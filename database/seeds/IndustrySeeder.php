<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //クエリビルダ SQLに近い

class IndustrySeeder extends Seeder
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
            'name' => '食品・農林・水産'
        ];
        DB::table('industries')->insert($param);

        $param = [
            'name' => '建設・住宅・インテリア'
        ];
        DB::table('industries')->insert($param);

        $param = [
            'name' => 'スポーツ'
        ];
        DB::table('industries')->insert($param);

        $param = [
            'name' => '商社'
        ];
        DB::table('industries')->insert($param);

        $param = [
            'name' => 'コンビニ・スーパー・百貨店'
        ];
        DB::table('industries')->insert($param);

        $param = [
            'name' => 'ソフトウェア'
        ];
        DB::table('industries')->insert($param);

        $param = [
            'name' => '広告'
        ];
        DB::table('industries')->insert($param);

    }
}
