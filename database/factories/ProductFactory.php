<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $products = [
            "Jabón líquido para manos",
            "Detergente en polvo para ropa",
            "Limpiador multiusos",
            "Desinfectante de superficies",
            "Limpiador de vidrios",
            "Limpiador de baño",
            "Limpiador de cocina",
            "Esponja multiusos",
            "Toallitas desinfectantes",
            "Aromatizante ambiental",
            "Suavizante de telas",
            "Limpiador de pisos",
            "Cepillo para inodoro",
            "Trapeador",
            "Escoba",
            "Guantes de limpieza",
            "Bayeta microfibra",
            "Limpiador de alfombras",
            "Quitamanchas",
            "Limpia muebles",
            "Jabón en barra",
            "Limpia hornos",
            "Limpiador de acero inoxidable",
            "Limpiador de tapicería",
            "Desengrasante industrial",
            "Limpiaparabrisas",
            "Cera para pisos",
            "Limpiador de madera",
            "Limpiador de cuero",
            "Abrillantador de metales"
        ];

        return [
            'name'        => $this->faker->randomElement($products),
            'description' => $this->faker->sentence(),
            'price'       => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}
