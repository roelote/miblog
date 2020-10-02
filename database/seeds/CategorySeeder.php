<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  
        DB::table('categories')->insert([
            'title' => 'lima',
            'slug' => 'lima-peru',
            'content' => ' Phasellus vehicula vitae lectus a dictum. Nunc semper arcu neque, a sodales odio scelerisque consectetur. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc sed felis mi. Nunc leo metus, aliquet at dui vitae, mollis facilisis augue. Sed pulvinar tristique volutpat. Nulla augue eros, ultrices id pharetra at, tempor et elit. Proin maximus fermentum ante, ut finibus neque euismod id. Nulla posuere odio eu vestibulum hendrerit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur est nulla, bibendum elementum fermentum in, posuere a nisl. Suspendisse tristique augue lacus, et feugiat justo placerat porttitor. Praesent hendrerit metus id enim ornare hendrerit. '
        ]);

        DB::table('categories')->insert([
            'title' => 'cusco',
            'slug' => 'cusco-peru',
            'content' => ' Phasellus vehicula vitae lectus a dictum. Nunc semper arcu neque, a sodales odio scelerisque consectetur. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc sed felis mi. Nunc leo metus, aliquet at dui vitae, mollis facilisis augue. Sed pulvinar tristique volutpat. Nulla augue eros, ultrices id pharetra at, tempor et elit. Proin maximus fermentum ante, ut finibus neque euismod id. Nulla posuere odio eu vestibulum hendrerit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur est nulla, bibendum elementum fermentum in, posuere a nisl. Suspendisse tristique augue lacus, et feugiat justo placerat porttitor. Praesent hendrerit metus id enim ornare hendrerit. '
        ]);

    }
}
