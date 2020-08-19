<?php

use App\PostImage;
use Illuminate\Database\Seeder;

class PostImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PostImage::class, 50)->create();
    }
}
