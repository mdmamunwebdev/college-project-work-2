<?php

namespace App\Models\rioAdmin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    private static $productCat;

    public static function addPrductCat($product, $req) {

        foreach ($req->category as $category) {
            self::$productCat = new ProductCategory();
            self::$productCat->product_id = $product->id;
            self::$productCat->category_id = $category;
            self::$productCat->save();
        }

    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }


}
