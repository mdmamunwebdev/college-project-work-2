<?php

namespace App\Models\rioAdmin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppSettings extends Model
{
    use HasFactory;

    private static $imgName, $imgExtension, $imgDir, $img, $imgFileDir;
    private static $app_settings;


    public static function appLogoImgUrl($req) {
        self::$img = $req->file('app_logo');
        self::$imgExtension = self::$img->getclientOriginalExtension();
        self::$imgDir = 'rioAdmin/assets/img/app-image/';
        self::$imgName =  str_replace(' ', '-', $req->title).'-'.uniqid().'-'.time().'.'.self::$imgExtension;
        self::$img->move(self::$imgDir, self::$imgName);
        return self::$imgFileDir = self::$imgDir.self::$imgName;
    }

    public static function aboutPageImgUrl($req) {
        self::$img = $req->file('about_hero_img');
        self::$imgExtension = self::$img->getclientOriginalExtension();
        self::$imgDir = 'rioAdmin/assets/img/app-image/';
        self::$imgName =  str_replace(' ', '-', $req->title).'-'.uniqid().'-'.time().'.'.self::$imgExtension;
        self::$img->move(self::$imgDir, self::$imgName);
        return self::$imgFileDir = self::$imgDir.self::$imgName;
    }

    public static function appSettingsStart() {
        self::$app_settings = new AppSettings();
        self::$app_settings->app_title = env('APP_NAME');
        self::$app_settings->save();
    }

    public static function appSettingsUpdate($req) {
        self::$app_settings = AppSettings::find(1);
        self::$app_settings->app_title = $req->app_title;
        self::$app_settings->shipping_fees = $req->shipping_fees;

        if ($req->file('app_logo')) {
            if (file_exists(self::$app_settings->app_logo)) {
                unlink(self::$app_settings->app_logo);
            }
            self::$app_settings->app_logo = self::appLogoImgUrl($req);
        }
        else {
            self::$app_settings->app_logo = self::$app_settings->app_logo;
        }

        self::$app_settings->footer_content = $req->footer_content;
        self::$app_settings->type_write_text = $req->type_write_text;
        self::$app_settings->home_heading = $req->home_heading;
        self::$app_settings->home_para = $req->home_para;
        self::$app_settings->food_video = $req->food_video;
        self::$app_settings->about_heading = $req->about_heading;

        if ($req->file('about_hero_img')) {
            if (file_exists(self::$app_settings->about_hero_img)) {
                unlink(self::$app_settings->about_hero_img);
            }
            self::$app_settings->about_hero_img = self::aboutPageImgUrl($req);
        }
        else {
            self::$app_settings->about_hero_img = self::$app_settings->about_hero_img;
        }

        self::$app_settings->about_para = $req->about_para;
        self::$app_settings->contact_us_heading = $req->contact_us_heading;
        self::$app_settings->save();
    }
}
