<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AboutUs;

class AboutUsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $about = AboutUs::first();

        if(empty($about)){
            AboutUs::create([
                'title'=>'About Us',
                'content'=>'Update with information about your company or organisation'
            ]);
        }
    }
}
