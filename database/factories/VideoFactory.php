<?php

namespace Database\Factories;



use App\Models\Video;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    /**
     * @var string
     */

    protected $model = Video::class;

    /**
     * @return array
     */
    
    public function definition()
    {
       
        return[
            'name'=>$this->faker->name(),
            'url'=>'https://file-examples-com.github.io/uploads/2017/04/file_example_MP4_1920_18MG.mp4',
            'length'=>$this->faker->randomNumber(3),
            'slug'=>$this->faker->slug(),
            'description'=>$this->faker->realtext(),
            'thumbnail'=>'https://loremflickr.com/446/240/world?random=' . rand(1, 99),
            'category_id'=>Category::find(2) ?? Category::Factory(),
        ];

    }
}
