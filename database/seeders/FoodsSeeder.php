<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Foods;

class FoodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Foods::factory()->times(50)->create();
    }
}
