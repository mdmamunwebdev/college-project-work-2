<?php

namespace App\Models\rioHome;

use App\Models\rioAdmin\Order;
use App\Models\rioAdmin\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\rioHome\Cart;

class OrderedProduct extends Model
{
    use HasFactory;

    private static $product,$product_price, $cart;

    public static function orderedProduct($order, $req) {

        self::$cart = Cart::where('user_ip', $req->ip())->get();

        foreach (self::$cart as $item) {

            self::$product = new OrderedProduct();
            self::$product->order_id = $order->id;
            self::$product->product_id = $item->product_id;
            self::$product->category_id = $item->category_id;
            self::$product->product_qty = $item->product_qty;
            self::$product->user_ip = $item->user_ip;

            self::$product_price = Product::find($item->product_id); // Query for product sale price

            self::$product->sale_price = self::$product_price->sale_price;
            self::$product->total_price = ( self::$product_price->sale_price * $req->product_qty );
            self::$product->order_status = $order->order_status;
            self::$product->save();

            Cart::find( $item->id )->delete();
        }
    }

    public static function customOrderedProduct($req, $id) {

            self::$product = new OrderedProduct();
            self::$product->order_id = $req->order_id;
            self::$product->product_id = $req->product_id;
            self::$product->category_id = $req->category_id;
            self::$product->product_qty = $req->product_qty;
            self::$product->user_ip = 'custom_order';
            self::$product->order_status = Order::find($id)->order_status;

            self::$product_price = Product::find($req->product_id); // Query for product sale price

            self::$product->sale_price = self::$product_price->sale_price;
            self::$product->total_price = ( self::$product_price->sale_price * $req->product_qty );
            self::$product->save();

            return self::$product;
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
