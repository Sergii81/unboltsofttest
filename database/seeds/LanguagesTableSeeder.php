<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            [
            'id' => 1,
            'code' => 'ua',            
            'label' => 'ua'                               
            ],
            [            
            'id' => 2,
            'code' => 'en',            
            'label' => 'en'
            ],
            [            
            'id' => 3,
            'code' => 'de',            
            'label' => 'de'
            ],
        ]);
        
    }
}
