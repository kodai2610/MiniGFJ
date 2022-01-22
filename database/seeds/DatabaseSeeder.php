<?php

use App\Models\EmploymentType;
use App\Models\Industry;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call([
            OccupationSeeder::class,
            IndustrySeeder::class,
            PrefecturesTableSeeder::class,
            CitiesTableSeeder::class,
            EmploymentTypeSeeder::class,
        ]);
    }
}
