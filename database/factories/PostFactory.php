<?php

namespace Database\Factories;

use App\Models\Berita;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Berita>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Berita::class;
    public function definition(): array
    {
        return [
            'judul' => $this->faker->sentence, //membuat judul berita
            'isi' => $this->faker->paragraph,   //membuat isi berita
            'tanggal_berita' => $this->faker->dateTimeThisYear,   //membuat tanggal berita (tahun ini)

        ];
    }
}
