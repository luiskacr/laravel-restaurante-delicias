<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class DistrictSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/seeders/csv/Districts.csv';
        $this->tablename = 'districts';
        $this->aliases = ['DISTRITO' => 'name', 'Canton' => 'canton_id'];
        $this->delimiter = ';';
        $this->encode = false;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::disableQueryLog();
        parent::run();
    }
}
