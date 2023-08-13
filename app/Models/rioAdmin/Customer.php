<?php

namespace App\Models\rioAdmin;

use App\Models\User;
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
        self::$customer = User::find($id);
        self::$customer->name = $req->name;
        self::$customer->phone = $req->phone;
        self::$customer->email = $req->email;
        self::$customer->password = bcrypt($req->password);

        if ($req->file('image')) {

            if (file_exists(self::$customer->image)) {
                unlink(self::$customer->image);
            }

            self::$customer->image = self::customerImgDir($req);
        }
        else {
            self::$customer->image = self::$customer->image;
        }

        self::$customer->save();
        return self::$customer;
    }

    public static function customerDelete($id) {

        self::$customer = User::find($id);

        if (file_exists(self::$customer->image)) {
            unlink(self::$customer->image);
        }

        self::$customer->delete();
    }

}
