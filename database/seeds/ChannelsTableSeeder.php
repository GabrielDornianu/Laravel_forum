<?php

use App\Channel;
use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel1 = ['title' => 'Laravel'];
        $channel2 = ['title' => 'Angular'];
        $channel3 = ['title' => 'Php'];
        $channel4 = ['title' => 'Javascript'];
        $channel5 = ['title' => 'Html'];
        $channel6 = ['title' => 'Mysql'];
        $channel7 = ['title' => 'Apache'];
        $channel8 = ['title' => 'Vuejs'];

        Channel::create($channel1);
        Channel::create($channel2);
        Channel::create($channel3);
        Channel::create($channel4);
        Channel::create($channel5);
        Channel::create($channel6);
        Channel::create($channel7);
        Channel::create($channel8);
    }
}
