<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class Locale
{

    public const BASE_LOCALE = "en";
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $raw_locale = Session::get('locale')??self::BASE_LOCALE;     # Если пользователь уже был на нашем сайте,
        # то в сессии будет значение выбранного им языка.
        $config_locale = Config::get('app.locale')??self::BASE_LOCALE;

        Log::info("raw_locale=".print_r($raw_locale,true));
        Log::info("config_locale=".print_r($config_locale,true));

        if ($raw_locale==$config_locale ) {  # Проверяем, что у пользователя в сессии установлен доступный язык
            $locale = $raw_locale;                                # (а не какая-нибудь бяка)
        }                                                         # И присваиваем значение переменной $locale.
        else $locale = $config_locale;                 # В ином случае присваиваем ей язык по умолчанию

        App::setLocale($locale);                                  # Устанавливаем локаль приложения

        return $next($request);                                   # И позволяем приложению работать дальше
    }
}
