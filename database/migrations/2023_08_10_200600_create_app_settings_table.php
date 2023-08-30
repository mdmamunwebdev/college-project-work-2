<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('app_settings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('shipping_fees')->default(4);
            $table->tinyInteger('shipping_fees_status')->default(1);
            $table->text('app_logo')->nullable();
            $table->tinyInteger('app_logo_status')->default(0);
            $table->text('footer_content')->default('<footer id="footer" class="footer footer-extra  neumo-primary my-2">
                <div class="copyright text-neumo">
                    2023 © Copyright
                    <strong><span> RIO. </span></strong> All Rights Reserved
                </div>
                <div class="credits text-neumo"> Developed By <a href="#" class="text-secondary-neumo">Abdullah Al Mamun</a></div>
            </footer>');
            $table->tinyInteger('footer_content_status')->default(0);
            $table->text('app_title')->default('RIO');
            $table->text('type_write_text')->default('Hi, Im Abdullah Al Mamun.", "I am Creative.", "I Love Foods.", "I Love to Cooking.');
            $table->tinyInteger('type_write_text_status')->default(0);
            $table->text('home_heading')->default('Enjoy Your Healthy
Delicious Food');
            $table->text('home_para')->default('Sed autem laudantium dolores. Voluptatem itaque ea consequatur eveniet. Eum quas beatae cumque eum quaerat.');
            $table->text('food_video')->default('https://www.youtube.com/watch?v=Lx0wy2-N2bg');
            $table->text('about_heading')->default('Learn More About Us');
            $table->text('about_hero_img')->nullable();
            $table->text('about_para')->default(' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.

    Ullamco laboris nisi ut aliquip ex ea commodo consequat.
    Duis aute irure dolor in reprehenderit in voluptate velit.
    Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.

Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident ');
            $table->text('contact_us_heading')->default('Need Help? Contact Us');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_settings');
    }
};
