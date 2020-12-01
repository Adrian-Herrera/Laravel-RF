<?php

namespace Database\Factories;

use App\Models\Articulo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class ArticuloFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Articulo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence();
        return [
            'title' => $title,
            'slug' => Str::slug($title,'-'),
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'text' => $this->faker->paragraph($nbSentences = 200),
            'active' => $this->faker->boolean($chanceOfGettingTrue = 50),
            'imgURL' => $this->faker->imageUrl(640, 360, 'Finanzas')
        ];
    }
}
