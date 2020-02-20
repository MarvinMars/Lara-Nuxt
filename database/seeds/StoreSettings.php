<?php

use Illuminate\Database\Seeder;

class StoreSettings extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fields = [
            "logo"=> [
                    "image"=> "/img/logo-ring.svg", "alt_text"=> "Logo Icon"
            ],
            "copyright"=> "<p>© 2019 '' - <a href=\"/contact-us\">Contact Us</a></p>",
            "logo_mini"=> [
                "image"=> "/img/gray-logo-mini.svg",
                "alt_text"=> "Logo Text"
            ],
            "contact_tel"=> [
                "link"=> "tel=>",
                "text"=> "Logo Text"
            ],
            "contact_email"=> [
                "link"=> "mailto:",
                "text"=> "''"
            ]
        ];
        $footer = [
            'slug'=>'footer',
            'fields'=>json_encode($fields),
        ];
        DB::table('settings')->insert($footer);
    }
}
