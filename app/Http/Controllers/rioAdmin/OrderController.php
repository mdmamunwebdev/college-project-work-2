<?php

namespace App\Http\Controllers\rioAdmin;

use App\Http\Controllers\Controller;
use App\Models\rioAdmin\Category;
use App\Models\rioAdmin\Coupon;
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
        Order::updateOrder($request, $id);
        OrderedProduct::statusUpdateOrderedProduct($request, $id);
        return back()->with('order_update_msg', 'Your Order Is Updated.');
    }

    public function orderCouponUpdate(Request $request, $id) {

        $coupon = Coupon::where('code', $request->coupon_code)->first();

        if ($coupon) {
            if ($coupon->status == 1) {

                $order = Order::find($id);
                $order->coupon_id = $coupon->id;
                $order->coupon_code = $coupon->code;
                $order->coupon_discount_price = $coupon->price;
                $order->coupon_calculation = $coupon->calculation;

                if ($order->ship_method == 0) {
                    if ($coupon->calculation == 1) {
                        $price = $coupon->price / 100;
                        $discount = $order->subtotal * $price;
                        $order->total = ($order->subtotal + $order->shipping_fees) - $discount;

                        $order->save();

                        $price_cal = [
                            'price'     =>  $coupon->price.'%',
                            'total'     =>  $order->total
                        ];

                        return $price_cal;
                    }
                    else {
                        $order->total = ($order->subtotal + $order->shipping_fees) - $coupon->price;
                        $order->save();

                        $price_cal = [
                            'price'     =>  $coupon->price.'$',
                            'total'     =>  $order->total
                        ];

                        return $price_cal;
                    }
                }
                else {
                    if ($coupon->calculation == 1) {
                        $price = $coupon->price / 100;
                        $discount = $order->subtotal * $price;
                        $order->total = $order->subtotal - $discount;
                        $order->save();

                        $price_cal = [
                            'price'     =>  $coupon->price.'%',
                            'total'     =>  $order->total
                        ];

                        return $price_cal;
                    }
                    else {
                        $order->total = $order->subtotal - $coupon->price;
                        $order->save();
                        $price_cal = [
                            'price'     =>  $coupon->price.'$',
                            'total'     =>  $order->total
                        ];

                        return $price_cal;
                    }
                }
            }
            else{

                $order = Order::find($id);

                if ($order->coupon_discount_price) {
                    $price_cal = [
                        'price'     =>  $order->coupon_discount_price,
                        'total'     =>  $order->total
                    ];
                }
                else {
                    $price_cal = [
                        'price'     =>  'N/A',
                        'total'     =>  $order->total
                    ];
                }

                return $price_cal;
            }
        }
        else{

            $order = Order::find($id);

            if ($order->coupon_discount_price) {
                $price_cal = [
                    'price'     =>  $order->coupon_discount_price,
                    'total'     =>  $order->total
                ];
            }
            else {
                $price_cal = [
                    'price'     =>  'N/A',
                    'total'     =>  $order->total
                ];
            }

            return $price_cal;

        }

    }

    public function orderShipFeesUpdate(Request $request, $id) {

        $order = Order::find($id);
        $order->shipping_fees = $request->shipping_fees;


        if ($order->ship_method == 0) { // Here $order->ship_method == 0 means "Home delivery"

            if ($order->coupon_discount_price) {

                if ($order->coupon_calculation == 1) {
                    $price = $order->coupon_discount_price / 100;
                    $discount = $order->subtotal * $price;
                    $order->total = ($order->subtotal + $order->shipping_fees) - $discount;

                    $price_cal = [
                        'shipping_fees'     =>  $order->shipping_fees,
                        'total'     =>  $order->total
                    ];
                }
                else {
                    $order->total = ($order->subtotal + $order->shipping_fees) - $order->coupon_discount_price;

                    $price_cal = [
                        'shipping_fees'     =>  $order->shipping_fees,
                        'total'     =>  $order->total
                    ];
                }

            }
            else {
                $order->total = $order->subtotal + $order->shipping_fees;

                $price_cal = [
                    'shipping_fees'     =>  $order->shipping_fees,
                    'total'     =>  $order->total
                ];
            }

        }else {
            $price_cal = [
                'shipping_fees'     =>  'N/A',
                'total'     =>  $order->total
            ];
        }

        $order->save();

        return $price_cal;

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

    public function customOrderedProduct(Request $request, $id) {

        $orderedProduct =  OrderedProduct::customOrderedProduct($request, $id);

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

        if ($order->ship_method == 0) {  // Here $order->ship_method == 0 means 'Home Delivery'
            if ($order->coupon_discount_price != null) {

                if ($order->coupon_calculation == 1) {

                    $price = $order->coupon_discount_price / 100;
                    $discount = $price * $this->sub_total;
                    $this->total =  ($this->sub_total + $order->shipping_fees) - $discount; // Total amount calculation According to Percentage

                }else {
                    $this->total =  ($this->sub_total + $order->shipping_fees ) - $order->coupon_discount_price; // Total amount calculation According to Substruction
                }
            }else {
                $this->total = $this->sub_total +  $order->shipping_fees ; // Total amount calculation
            }
        }
        else {
            if ($order->coupon_discount_price != null) {

                if ($order->coupon_calculation == 1) {
                    $price = $order->coupon_discount_price / 100;
                    $discount = $price * $this->sub_total;
                    $this->total = $this->sub_total - $discount; // Total amount calculation According to Percentage
                }
                else{
                    $this->total = $this->sub_total - $order->coupon_discount_price; // Total amount calculation According to Substruction
                }

            }else {
                $this->total = $this->sub_total ; // Total amount calculation
            }
        }

        $order->subtotal = $this->sub_total;

        if ($order->subtotal === 0) {
            $order->total = 0;
        }
        else {
            $order->total = $this->total;
        }

        $order->save();


        $price_cal = [
            'sub_total' =>  $order->subtotal,
            'total'     =>  $order->total
        ];

        return $price_cal;
    }
}
