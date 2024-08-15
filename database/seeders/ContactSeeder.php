<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Contact::truncate();
        for($i=0;$i<5;$i++){
        Contact::create([
          "name"=>"Sharif $i",
          "email"=>"sharif$i@gmail.com",
          "phone"=>"0173873755$i",
          "address"=>"Mirpur-$i, Dhaka-1217"
        ]);
    }
    }
}
