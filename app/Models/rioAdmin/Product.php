<?php

namespace App\Models\rioAdmin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    private static $product, $imgName, $imgExtension, $imgDir, $img, $imgFileDir;

    public static function productImgDir($req) {
        self::$img = $req->file('image');
        self::$imgExtension = self::$img->getClientOriginalExtension();
        self::$imgDir = 'rioAdmin/assets/img/product/';
        self::$imgName =  str_replace(' ', '-', $req->name).'-'.uniqid().'-'.time().'.'.self::$imgExtension;
        self::$img->move(self::$imgDir, self::$imgName);

        return self::$imgDir.self::$imgName;
    }

    public static function productAdd($req) {

        self::$product = new Product();
        self::$product->name = $req->name;
        self::$product->description = $req->description;
        self::$product->image = self::productImgDir($req);

        self::$product->status = $req->status;
        self::$product->visibility = $req->visibility;
        self::$product->published_date = $req->published_date;

        self::$product->regular_price = $req->regular_price;
        self::$product->sale_price = $req->sale_price;
        self::$product->start_sale_price_date = $req->start_sale_price_date;
        self::$product->end_sale_price_date = $req->end_sale_price_date;

        self::$product->stock_status = $req->stock_status;

        self::$product->weight = $req->weight;
        self::$product->length = $req->length;
        self::$product->height = $req->height;
        self::$product->width = $req->width;

        self::$product->condition = $req->condition;

        self::$product->save();

        return self::$product;
    }

    public function productCategory() {
        return $this->hasMany(ProductCategory::class);
    }
}
