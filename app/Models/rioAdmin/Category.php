<?php

namespace App\Models\rioAdmin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    private static $category, $imgName, $imgExtension, $imgDir, $img, $imgFileDir;

    public static function catImgUrl($req) {
        self::$img = $req->file('image');
        self::$imgExtension = self::$img->getClientOriginalExtension();
        self::$imgDir = 'rioAdmin/assets/img/product/category/';
        self::$imgName =  str_replace(' ', '-', $req->title).'-'.uniqid().'-'.time().'.'.self::$imgExtension;
        self::$img->move(self::$imgDir, self::$imgName);
        return self::$imgFileDir = self::$imgDir.self::$imgName;
    }

    public static function categoryNew($req) {
        self::$category = new Category();
        self::$category->name = $req->name;
        self::$category->description = $req->description;
        self::$category->status = $req->status;
        self::$category->image = self::catImgUrl($req);
        self::$category->save();
        return self::$category;
    }

    public function productCategory() {
        return $this->hasMany(ProductCategory::class);
    }

}
