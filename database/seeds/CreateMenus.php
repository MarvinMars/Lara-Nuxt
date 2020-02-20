<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
class CreateMenus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now()->toDateTimeString();
        $menus = [
            [
                'label'=> 'Work',
                'url'=> '/work',
                'type'=> 'header',
                'order'=> 1,
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'label'=> 'About',
                'url'=> '/about',
                'type'=> 'header',
                'order'=> 2,
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'label'=> 'Services',
                'url'=> '/services',
                'type'=> 'header',
                'order'=> 3,
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'label'=> 'Contact',
                'url'=> '/contact',
                'type'=> 'header',
                'order'=> 4,
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'label'=> 'TW',
                'url'=> '/#',
                'type'=> 'social',
                'order'=> 1,
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'label'=> 'FB',
                'url'=> '/#',
                'type'=> 'social',
                'order'=> 2,
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'label'=> 'IN',
                'url'=> '/#',
                'type'=> 'social',
                'order'=> 3,
                'created_at' => $date,
                'updated_at' => $date,
            ]
        ];
        foreach ($menus as $menu){
            DB::table('menus')->insert($menu);
        }
    }
}
