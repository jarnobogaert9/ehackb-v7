<?php

use Illuminate\Database\Seeder;

class SponsorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        factory(App\Sponsor::class, 5)->create();

        $sponsors = [
            ['name' => 'Accenture', 'tier' => '1', 'logo' => 'accenture.png', 'url' => 'https://www.accenture.com/be-en'],
            ['name' => 'Alliantie', 'tier' => '1', 'logo' => 'alliantie-metketting transparant.png', 'url' => 'https://www.hogent.be'],
            ['name' => 'Delaware', 'tier' => '1', 'logo' => 'Delaware.jpg', 'url' => 'https://www.tesla.com/nl_be'],
            ['name' => 'Axxes', 'tier' => '2', 'logo' => 'axxes.png', 'url' => 'https://axxes.com/'],
            ['name' => 'Hogent', 'tier' => '2', 'logo' => 'HOGENT_Logo_Pos_rgb.jpg', 'url' => 'http://www.themostamazingwebsiteontheinternet.com/'],
            ['name' => 'Lenovo', 'tier' => '2', 'logo' => 'lenovo.png', 'url' => 'http://www.themostamazingwebsiteontheinternet.com/'],
            ['name' => 'Stuvo', 'tier' => '2', 'logo' => 'stuvo-ehb.png', 'url' => 'http://www.themostamazingwebsiteontheinternet.com/'],
            ['name' => 'Biasc', 'tier' => '3', 'logo' => 'BIASC.png', 'url' => 'https://honim.typepad.com/biasc/'],
            ['name' => 'Belnet', 'tier' => '3', 'logo' => 'Belnet.jpg', 'url' => 'https://www.belnet.be/nl/home'],
            ['name' => 'Cisco Networking Academy', 'tier' => '3', 'logo' => 'cisco_logo_large.png', 'url' => 'http://www.themostamazingwebsiteontheinternet.com/'],
            ['name' => 'Cisco_Meraki', 'tier' => '3', 'logo' => 'cisco_meraki.jpg', 'url' => 'http://www.themostamazingwebsiteontheinternet.com/'],
            ['name' => 'Innoviris', 'tier' => '3', 'logo' => 'innoviris.png', 'url' => 'http://www.themostamazingwebsiteontheinternet.com/'],
            ['name' => 'Signpost', 'tier' => '3', 'logo' => 'signpost.jpg', 'url' => 'http://www.themostamazingwebsiteontheinternet.com/'],
        ];

        foreach($sponsors as $sponsor){
            \App\Sponsor::create($sponsor);
        }
    }
}
