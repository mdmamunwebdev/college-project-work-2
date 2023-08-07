<?php

namespace App\Models\rioAdmin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    private static $category, $imgName, $imgExtension, $imgDir, $img, $imgFileDir;
    private static $productCategory;

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

    public static function categoryUpdate($req, $id) {

        self::$category = Category::find($id);
        self::$category->name = $req->name;
        self::$category->description = $req->description;
        self::$category->status = $req->status;

        if ($req->file('image')) {
            if (file_exists(self::$category->image)) {
                unlink(self::$category->image);
            }
            self::$category->image = self::catImgUrl($req);
        }
        else {
            self::$category->image = self::$category->image;
        }

        self::$category->save();
    }

    public static function categoryStatus($id) {
        self::$category = Category::find($id);

        if (self::$category->status == 1) {
            self::$category->status = 0;
        }
        else {
            self::$category->status = 1;
        }

        self::$category->save();
    }

    public static function categoryDelete($id) {

        /**
         * Category Delete From productCategory Table.
         */

        self::$productCategory = ProductCategory::all()->where('category_id', $id);
        foreach (self::$productCategory as  $productCategory) {
            ProductCategory::find($productCategory->id)->delete();
        }

        /**
         * Category Delete From Category Table.
         */

        self::$category = Category::find($id);

        if (file_exists(self::$category->image)) {
            unlink(self::$category->image);
        }

        self::$category->delete();
    }


    public function productCategory() {
        return $this->hasMany(ProductCategory::class);
    }

}
