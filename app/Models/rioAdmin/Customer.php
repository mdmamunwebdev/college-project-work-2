<?php

namespace App\Models\rioAdmin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    private static $customer, $imgName, $imgExtension, $imgDir, $img, $imgFileDir;
    private static $cart, $wishList;

    public static function customerImgDir($req) {
        self::$img = $req->file('image');
        self::$imgExtension = self::$img->getClientOriginalExtension();
        self::$imgDir = 'rioAdmin/assets/img/customer/';
        self::$imgName =  str_replace(' ', '-', $req->name).'-'.uniqid().'-'.time().'.'.self::$imgExtension;
        self::$img->move(self::$imgDir, self::$imgName);

        return self::$imgDir.self::$imgName;
    }

    public static function customerAdd($req) {
        //
    }

    public static function customerUpdate($req, $id) {
        //
    }

    public static function customerDelete($id) {
        //
    }

}
