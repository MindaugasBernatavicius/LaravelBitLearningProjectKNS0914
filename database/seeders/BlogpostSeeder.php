<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

class BlogpostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $user = new User();
        $user->name = 'mindaugas';
        $user->email = 'darbas.m@gmail.com';
        $user->password = Hash::make("mindaugas");
        $user->nickname = "nn";
        $user->save();


        $bp1 = new \App\Models\BlogPost();
        $bp1->title = "Title 1";
        $bp1->text = "Text 1";
        $bp1->user()->associate($user);
        $bp1->save();

        $bp2 = new \App\Models\BlogPost();
        $bp2->title = "Title 2";
        $bp2->text = "Text 2";
        $bp2->user()->associate($user);
        $bp2->save();
    }
}
