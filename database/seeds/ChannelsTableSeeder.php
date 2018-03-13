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
        $channel1 = ['title' => 'Laravel', 'slug' => 'laravel'];
        $channel2 = ['title' => 'Angular', 'slug' => 'angular'];
        $channel3 = ['title' => 'Php', 'slug' => 'php'];
        $channel4 = ['title' => 'Javascript', 'slug' => 'javascript'];
        $channel5 = ['title' => 'Html', 'slug' => 'html'];
        $channel6 = ['title' => 'Mysql', 'slug' => 'mysql'];
        $channel7 = ['title' => 'Apache', 'slug' => 'apache'];
        $channel8 = ['title' => 'Vuejs', 'slug' => 'vuejs'];

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
