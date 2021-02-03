<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BlogpostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $bp1 = new \App\Models\BlogPost();
        $bp1->title = "Title 1";
        $bp1->text = "Text 1";
        $bp1->save();

        $bp2 = new \App\Models\BlogPost();
        $bp2->title = "Title 2";
        $bp2->text = "Text 2";
        $bp2->save();
    }
}
