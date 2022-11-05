<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Catalog;


class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Catalog::create(['name'=>'Mix Fight','type'=>'foto']);
        Catalog::create(['name'=>'MMA','type'=>'foto']);
        Catalog::create(['name'=>'Club life','type'=>'foto']);
        Catalog::create(['name'=>'Trainers','type'=>'video']);



    }
}
