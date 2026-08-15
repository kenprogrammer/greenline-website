<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contacts=DB::table('contacts')->first();

        if(empty($contacts)){
            DB::table('contacts')->insert([
                'phone'=>'+254724109039',
                'email'=>'kenmwe@gmail.com',
                'postal_address'=>'PO Box 80100 Mombasa',
                'office_location'=>'Ganjoni',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]);
        }
    }
}
