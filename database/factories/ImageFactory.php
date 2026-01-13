<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Image;
use Faker\Factory as FakerFactory;
use Smknstd\FakerPicsumImages\FakerPicsumImagesProvider;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $faker = FakerFactory::create();

        $faker->addProvider(new FakerPicsumImagesProvider($faker));

        return [
            'url' => 'courses/' .  $faker->image($dir = 'public/storage/courses', $width = 1280, $height = 960, $isFullPath = false),
        ];
    }
}
