<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class KortingscodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = public_path('storage/vissen.csv');
        $codes = $this->readCSV($file, array('delimiter' => ','));
    
        for ($i = 0; $i < count($codes); $i ++)
        {
            DB::table('kortingscodes')->insert([
                'code' => $codes[$i][0],
            ]);
        }
    }

    public function readCSV($csvFile, $array)
    {
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $line_of_text[] = fgetcsv($file_handle, 0, $array['delimiter']);
        }
        fclose($file_handle);
        return $line_of_text;
    }
}
