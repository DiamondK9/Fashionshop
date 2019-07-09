<?php

use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $model = new \App\Models\ProductType;
        $model->product_type_name = "Đồng Hồ";
        $model->active = 1;
        $model->save();

        $model = new \App\Models\ProductType;
        $model->product_type_name = "Giày Dép";
        $model->active = 1;
        $model->save();

        $model = new \App\Models\ProductType;
        $model->product_type_name = "Trang Sức";
        $model->active = 1;
        $model->save();

        $model = new \App\Models\ProductType;
        $model->product_type_name = "Áo khoác";
        $model->active = 1;
        $model->save();

        $model = new \App\Models\ProductType;
        $model->product_type_name = "Phụ kiện";
        $model->active = 1;
        $model->save();

        $model = new \App\Models\ProductType;
        $model->product_type_name = "Bộ Trang Phục";
        $model->active = 1;
        $model->save();

        $model = new \App\Models\ProductType;
        $model->product_type_name = "Mũ";
        $model->active = 1;
        $model->save();

    }
}
