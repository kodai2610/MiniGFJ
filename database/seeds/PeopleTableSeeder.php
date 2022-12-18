<?php

use Illuminate\Database\Seeder;

class PeopleTableSeeder extends Seeder
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
            'name' => 'jiro',
            'mail' => 'jiro@jiro.com',
            'age' => '18',
        ];
        DB::table('people')->insert($param);

        $param = [
            'name' => 'taro',
            'mail' => 'taro@taro.com',
            'age' => '47',
        ];
        DB::table('people')->insert($param);

        $param = [
            'name' => 'mei',
            'mail' => 'mei@mei.com',
            'age' => '100',
        ];
        DB::table('people')->insert($param);

        $param = [
            'name' => 'mei',
            'mail' => 'mei@mei.com',
            'age' => '37',
        ];
        DB::table('people')->insert($param);

        $param = [
            'name' => 'kakeru',
            'mail' => 'kakeru@kakeru.com',
            'age' => '88',
        ];
        DB::table('people')->insert($param);

        $param = [
            'name' => 'lola',
            'mail' => 'lola@lola.com',
            'age' => '20',
        ];
        DB::table('people')->insert($param);

        $param = [
            'name' => 'yama',
            'mail' => 'yama@yama.com',
            'age' => '19',
        ];
        DB::table('people')->insert($param);

        $param = [
            'name' => 'nei',
            'mail' => 'nei@nei.com',
            'age' => '60',
        ];
        DB::table('people')->insert($param);
    }
}
