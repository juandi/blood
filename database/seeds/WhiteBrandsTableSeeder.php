<?php

use Illuminate\Database\Seeder;

class WhiteBrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Public
        DB::table('white_brands')->insert([
            'name'          => 'ConejoX',
            'url'           => 'http://www.conejoX.com',
            'nat_cumloader' => 'MjYwNS4xLjI1LjQzLjAuMC4wLjAuMA',
            'nat_webcam'    => 'MjYwNS4xLjIuMi4wLjAuMC4wLjA',
            'css_path'      => 'conejox',
            'ga_code'       => 'UA-26020144-23',
        ]);

        DB::table('white_brands')->insert([
            'name'          => 'Babosas',
            'url'           => 'http://www.babosoas.com',
            'nat_cumloader' => 'MjYwNS4xLjI1LjQzLjAuMC4wLjAuMA',
            'nat_webcam'    => 'MjYwNS4xLjIuMi4wLjAuMC4wLjA',
            'css_path'      => 'babosas',
            'ga_code'       => 'UA-26020144-23',
        ]);

        DB::table('white_brands')->insert([
            'name'          => 'Cerdas',
            'url'           => 'http://www.cerdas.com',
            'nat_cumloader' => 'MjYwNS4xLjsadaqweawLjAuMA',
            'nat_webcam'    => 'MasdqccLjAuMC4wLjA',
            'css_path'      => 'cerdas',
            'ga_code'       => 'UA-26020144-23',
        ]);
    }
}
