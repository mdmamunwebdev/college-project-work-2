<?php

namespace App\Http\Controllers\rioAdmin;

use App\Http\Controllers\Controller;
use App\Models\rioAdmin\Category;
use App\Models\rioAdmin\Order;
use App\Models\rioAdmin\Product;
use App\Models\rioAdmin\ProductCategory;
use App\Models\rioHome\OrderedProduct;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public  $name = [], $id = [], $price = [], $qty = [], $sub_total = 0, $total = 0;

    public function index() {
        return view('rioAdmin.order.index', ['order' => Order::orderBy('id', 'desc')->get()]);
    }

    public function orderCreateForm() {
        //
    }

    public function orderUpdateForm($id) {
        return view('rioAdmin.order.update', ['order' => Order::find($id), 'category' => Category::all(), 'product' => 0]);
    }

    public function orderUpdate(Request $request, $id) {
        return $request;
    }

    public function productQtyUpdate($ordered_product_id, $product_qty) {

        $orderedProduct =  OrderedProduct::find($ordered_product_id);
        $orderedProduct->product_qty = $product_qty;
        $orderedProduct->save();

        $price_cal = $this->priceCal($orderedProduct->order_id);

        $response = [
            'data'    => $orderedProduct,
            'sub_total' => $price_cal['sub_total'],
            'total' => $price_cal['total']
        ];

        return response()->json($response);
    }

    public function productSearchByCat($cat_id, $order_id) {

        $product = ProductCategory::where('category_id', $cat_id)->get();

        foreach ( $product as $productItem ) {

            $orderedProduct = OrderedProduct::where(['order_id' => $order_id, 'category_id' => $cat_id, 'product_id' => $productItem->product->id])->first();

            if ( !$orderedProduct ) {
                array_push($this->name, $productItem->product->name);
                array_push($this->id, $productItem->product->id);
            }

        }

        // Prepare the response
        $response = [
            'product_name' => $this->name,
            'product_id'   => $this->id
        ];

        return response()->json($response);
    }

    public function customOrderedProduct(Request $request) {

        $orderedProduct =  OrderedProduct::customOrderedProduct($request);

        $price_cal = $this->priceCal($request->order_id);

        $response = [
            'id'    => $orderedProduct->id,
            'name'  => $orderedProduct->product->name,
            'price' => $orderedProduct->sale_price,
            'qty'   => $orderedProduct->product_qty,
            'sub_total' => $price_cal['sub_total'],
            'total' => $price_cal['total']
        ];

        return response()->json($response);
    }

    public function orderedProductDel($ordered_product_id, $order_id) {

        $product = OrderedProduct::find($ordered_product_id);
        $product->delete();

        $orderedProduct = OrderedProduct::where('order_id', $order_id)->get();

        foreach ( $orderedProduct as $orderedProductItem ) {
            array_push($this->name, $orderedProductItem->product->name);
            array_push($this->price, $orderedProductItem->sale_price);
            array_push($this->qty, $orderedProductItem->product_qty);
            array_push($this->id, $orderedProductItem->id);
        }

        $price_cal = $this->priceCal($order_id);

        $response = [
            'name' => $this->name,
            'price' => $this->price,
            'qty' => $this->qty,
            'id' => $this->id,
            'sub_total' => $price_cal['sub_total'],
            'total' => $price_cal['total']
        ];

        return response()->json($response);
    }

    public function priceCal($order_id) {

        $orderedProductCal = OrderedProduct::where('order_id', $order_id)->get();

        foreach ($orderedProductCal as $orderedProductCalItem) {
            $this->sub_total += ($orderedProductCalItem->sale_price*$orderedProductCalItem->product_qty);
        }

        $order = Order::find($order_id);

        $this->total = $this->sub_total + abs( ($order->coupon_discount - $order->shipping_fees) ) ; // Total amount calculation

        $order->subtotal = $this->sub_total;

        if ($order->subtotal === 0) {
            $order->amount = 0;
        }
        else {
            $order->amount = $this->total;
        }

        $order->save();


        $price_cal = [
            'sub_total' =>  $order->subtotal,
            'total'     =>  $order->amount
        ];

        return $price_cal;
    }
}
