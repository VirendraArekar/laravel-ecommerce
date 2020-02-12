<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;
use App\Models\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        // Output: 54esmdr0qf
        $sku = "sku_".substr(str_shuffle($permitted_chars), 0, 15);
        // $sku = substr(md5(time()), 0, 16);

            $product = new Product;
            $product->sku = "sku_".substr(str_shuffle($permitted_chars), 0, 15);
            $product->name = "Men Printed Round Neck T-shirt";
            $product->color = json_encode([3,1,4,5]);
            $product->size = json_encode([3,1,4,5]);
            $product->price = 330;
            $product->brand = 4;
            $product->images = json_encode(['https://assets.myntassets.com/h_1440,q_90,w_1080/v1/assets/images/4318138/2018/5/4/11525433792765-HERENOW-Men-Black-Printed-Round-Neck-T-shirt-2881525433792598-1.jpg','https://assets.myntassets.com/h_1440,q_90,w_1080/v1/assets/images/4318138/2018/5/4/11525433792736-HERENOW-Men-Black-Printed-Round-Neck-T-shirt-2881525433792598-2.jpg']);
            $product->category = 3;
            $product->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
            $product->tags = json_encode(['tshirt','mens']);
            $product->created_at = Carbon::now();
            $product->updated_at = Carbon::now();
            $product->deleted_at = null;
            $product->save();


            $product = new Product;
            $product->sku = "sku_".substr(str_shuffle($permitted_chars), 0, 15);
            $product->name = "Men Printed Round Neck T-Shirt";
            $product->color = json_encode([3,1,4,5]);
            $product->size = json_encode([3,1,4,5]);
            $product->price = 130;
            $product->brand = 3;
            $product->images = json_encode(['https://assets.myntassets.com/h_1440,q_90,w_1080/v1/assets/images/1700944/2019/6/8/972c9498-3a37-4d5d-976c-4493b4d5c0021559989322793-HRX-by-Hrithik-Roshan-Men-Yellow-Printed-Round-Neck-T-Shirt--1.jpg','https://assets.myntassets.com/h_1440,q_90,w_1080/v1/assets/images/1700944/2019/6/8/c3d336e4-8c86-4434-94b2-c9b28b6dd6471559989322777-HRX-by-Hrithik-Roshan-Men-Yellow-Printed-Round-Neck-T-Shirt--2.jpg']);
            $product->category = 2;
            $product->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
            $product->tags = json_encode(['tshirt','mens']);
            $product->created_at = Carbon::now();
            $product->updated_at = Carbon::now();
            $product->deleted_at = null;
            $product->save();


            $product = new Product;
            $product->sku = "sku_".substr(str_shuffle($permitted_chars), 0, 15);
            $product->name = "Men Solid Round Neck T-shirt";
            $product->color = json_encode([3,1,4,5]);
            $product->size = json_encode([3,1,4,5]);
            $product->price = 490;
            $product->brand = 1;
            $product->images = json_encode(['https://assets.myntassets.com/h_1440,q_90,w_1080/v1/assets/images/11077774/2019/12/24/29bdd2c8-3e2f-43aa-8ce5-55f3a501a4fa1577166621272-Difference-of-Opinion-Men-Sea-Green-Solid-Round-Neck-T-shirt-1.jpg','https://assets.myntassets.com/h_1440,q_90,w_1080/v1/assets/images/11077774/2019/12/24/2e3bf45f-91fd-4c4d-9122-9c78d8525a6c1577166621181-Difference-of-Opinion-Men-Sea-Green-Solid-Round-Neck-T-shirt-3.jpg']);
            $product->category = 5;
            $product->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
            $product->tags = json_encode(['tshirt','mens']);
            $product->created_at = Carbon::now();
            $product->updated_at = Carbon::now();
            $product->deleted_at = null;
            $product->save();

            $product = new Product;
            $product->sku = "sku_".substr(str_shuffle($permitted_chars), 0, 15);
            $product->name = "Men Printed Round Neck T-Shirt";
            $product->color = json_encode([3,1,4,5]);
            $product->size = json_encode([3,1,4,5]);
            $product->price = 550;
            $product->brand = 1;
            $product->images = json_encode(['https://assets.myntassets.com/h_1440,q_90,w_1080/v1/assets/images/2297835/2018/3/14/11521020286596-Roadster-Men-Tshirts-4241521020286395-1.jpg','https://assets.myntassets.com/h_1440,q_90,w_1080/v1/assets/images/2297835/2018/3/14/11521020286536-Roadster-Men-Tshirts-4241521020286395-3.jpg']);
            $product->category = 5;
            $product->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
            $product->tags = json_encode(['tshirt','mens']);
            $product->created_at = Carbon::now();
            $product->updated_at = Carbon::now();
            $product->deleted_at = null;
            $product->save();

    }
}
