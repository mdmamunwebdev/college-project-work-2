<?php

namespace App\Models\rioAdmin;

use App\Models\rioHome\Cart;
use App\Models\rioHome\OrderedProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    private static $product, $imgName, $imgExtension, $imgDir, $img, $imgFileDir;
    private static $cart, $orderedProduct, $wishList;

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
        self::$product->width  = $req->width;

        self::$product->condition = $req->condition;

        self::$product->save();

        return self::$product;
    }

    public static function productUpdate($req, $id) {

        self::$product = Product::find($id);
        self::$product->name = $req->name;
        self::$product->description = $req->description;

        if ($req->file('image')) {
            if (file_exists(self::$product->image)) {
                unlink(self::$product->image);
            }
            self::$product->image = self::productImgDir($req);
        }
        else {
            self::$product->image = self::$product->image;
        }

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

    public static function productDelete($id) {

        /**
         * All Cart Product Delete From Cart Table
         */

        self::$cart = Cart::all()->where('product_id', $id);
        foreach (self::$cart as $cartProduct) {
            Cart::find($cartProduct->id)->delete();
        }

        /**
         * All Ordered Product Delete From OrderedProduct Table
         */

        self::$orderedProduct = OrderedProduct::all()->where('product_id', $id);
        foreach (self::$orderedProduct as $orderedProduct) {
            OrderedProduct::find($orderedProduct->id)->delete();
        }

        /**
         * Product Delete From Product Table
         */

        self::$product = Product::find($id);

        if (file_exists(self::$product->image)) {
            unlink(self::$product->image);
        }

        self::$product->delete();

    }

    public function productCategory() {
        return $this->hasMany(ProductCategory::class);
    }

    public function orderedProduct() {
        return $this->hasMany(OrderedProduct::class);
    }
}
