<?php

namespace App\Models\rioAdmin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    private static $productCat, $productCatDel;

    public static function addPrductCat($product, $req) {

        foreach ($req->category as $category) {
            self::$productCat = new ProductCategory();
            self::$productCat->product_id = $product->id;
            self::$productCat->category_id = $category;
            self::$productCat->save();
        }

    }

    public static function updateProductCat($product, $req) {

        self::$productCat = ProductCategory::all()->where('product_id', $product->id);

        foreach (self::$productCat as $oldCategory) {
            self::$productCatDel = ProductCategory::find($oldCategory->id);
            self::$productCatDel->delete();
        }

        foreach ($req->category as $newCategory) {
            self::$productCat = new ProductCategory();
            self::$productCat->product_id = $product->id;
            self::$productCat->category_id = $newCategory;
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
