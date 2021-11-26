<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Theme;
use App\Models\Site;
use App\Models\Slider;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       
        Slider::insert([
            
            'title'=>'visit nepal 2020',
            'image'=>'',
            'content'=>'traveling journey  is nalueless if you not visit nepal  ',
            'order'=>'1',
            'status'=>'1',
            'url'=>'nullable',
            

        ]);
    }
}
