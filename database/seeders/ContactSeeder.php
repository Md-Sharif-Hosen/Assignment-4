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
    //     for($i=0;$i<5;$i++){
    //     Contact::create([
    //       "name"=>"Sharif $i",
    //       "email"=>"sharif$i@gmail.com",
    //       "phone"=>"0173873755$i",
    //       "address"=>"Mirpur-$i, Dhaka-1217"
    //     ]);
    // }
    Contact::create([
        "name"=>"Sharif",
        "email"=>"sharif@gmail.com",
        "phone"=>"01738737552",
        "address"=>"Mirpur-1, Dhaka-1217"
      ]);
      Contact::create([
        "name"=>"Rana",
        "email"=>"rana@gmail.com",
        "phone"=>"01738737555",
        "address"=>"Mirpur-6, Dhaka-1217"
      ]);
      Contact::create([
        "name"=>"Rayhan",
        "email"=>"Rayhan@gmail.com",
        "phone"=>"01738737556",
        "address"=>"Mirpur-2, Dhaka-1217"
      ]);
      Contact::create([
        "name"=>"Ahsan",
        "email"=>"Ahsan@gmail.com",
        "phone"=>"01738737553",
        "address"=>"Mirpur-10, Dhaka-1217"
      ]);
      Contact::create([
        "name"=>"Juton",
        "email"=>"Juton@gmail.com",
        "phone"=>"01738737554",
        "address"=>"Mirpur-11, Dhaka-1217"
      ]);
      Contact::create([
        "name"=>"tarek",
        "email"=>"tarek@gmail.com",
        "phone"=>"01738737552",
        "address"=>"Mirpur-12, Dhaka-1217"
      ]);
    }
}
