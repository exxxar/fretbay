<?php
namespace App\Traits;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Spatie\Translatable\HasTranslations as BaseHasTranslations;

trait HasTranslations
{
    use BaseHasTranslations;
    /**
    * Convert the model instance to an array.
    *
    * @return array
    */
    public function toArray()
    {
        $attributes = parent::toArray();
        $locale1 = App::getLocale();
        $locale = Session::get('lang');
        $lang = 'en';
        if($locale == null) {
            if($locale1 !== null) {
                $lang = $locale1;
            }
        }
        else {
            $lang = $locale;
        }
        Log::info('Это локализация '.$locale.' 1'.$locale1);
        foreach ($this->getTranslatableAttributes() as $field) {
            $attributes[$field] = $this->getTranslation($field, $lang);
        }
//        Session::put('lang', $lang);
        Log::info('Получилась локализация '.$locale.' 1'.$locale1);
        return $attributes;
    }
}
