<?php

namespace Database\Factories;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_kategori' => Kategori::factory(),
            'nama_program' => $this->faker->sentence(3),
            'foto' => 'program-images/' . $this->faker->image('public/storage/program-images', 640, 580, null, false),
            'keterangan' => $this->faker->sentence(10)
        ];
    }
}
