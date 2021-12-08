<?php

namespace App\Classes;

use TCG\Voyager\Models\Page;

class PageFactory
{

    public static function mainPage(){
        return Page::where("status","ACTIVE")->where('slug', '=', 'main-page')->firstOrFail();
    }

    public static function privacyPage(){
        return Page::where("status","ACTIVE")->where('slug', '=', 'privacy')->firstOrFail();
    }

    public static function faqPage(){
        return Page::where("status","ACTIVE")->where('slug', '=', 'faq')->firstOrFail();
    }

    public static function helpPage(){
        return Page::where("status","ACTIVE")->where('slug', '=', 'how-does-it-work')->firstOrFail();
    }
}
