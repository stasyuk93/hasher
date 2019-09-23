<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class HashSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hashes =  \App\Services\Hasher\HasherFacade::getHashAlgorithmList();
        $array = [];
        foreach ($hashes as $hash){
            $array[] = ['name' => $hash];
        }
        DB::table('hashes')->insert($array);
    }
}
