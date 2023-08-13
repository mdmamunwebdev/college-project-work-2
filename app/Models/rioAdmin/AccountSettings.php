<?php

namespace App\Models\rioAdmin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountSettings extends Model
{
    use HasFactory;

    private static $admin, $imgName, $imgExtension, $imgDir, $img, $imgFileDir;

    public static function adminImgDir($req) {
        self::$img = $req->file('image');
        self::$imgExtension = self::$img->getClientOriginalExtension();
        self::$imgDir = 'rioAdmin/assets/img/account-settings/';
        self::$imgName =  str_replace(' ', '-', $req->name).'-'.uniqid().'-'.time().'.'.self::$imgExtension;
        self::$img->move(self::$imgDir, self::$imgName);

        return self::$imgDir.self::$imgName;
    }

    public static function adminUpdate($req, $id) {
        self::$admin = Admin::find($id);
        self::$admin->name = $req->name;
        self::$admin->phone = $req->phone;
        self::$admin->email = $req->email;
        self::$admin->password = bcrypt($req->password);

        if ($req->file('image')) {

            if (file_exists(self::$admin->image)) {
                unlink(self::$admin->image);
            }

            self::$admin->image = self::adminImgDir($req);
        }
        else {
            self::$admin->image = self::$admin->image;
        }

        self::$admin->save();
        return self::$admin;
    }
}
