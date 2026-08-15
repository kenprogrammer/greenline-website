<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class SocialMediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (DB::table('social_media')->doesntExist()) {
            DB::table('social_media')->insert([
                ['platform' => 'facebook', 'url' => 'https://facebook.com','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
                ['platform' => 'linkedIn', 'url' => 'https://linkedin.com','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
                ['platform' => 'instagram', 'url' => 'https://instagram.com','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
                ['platform' => 'x', 'url' => 'https://x.com','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
                ['platform' => 'tikTok', 'url' => 'https://tiktok.com','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ]);
        }
    }
}
