<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Drivers\Translation;
use App\Http\Requests\LanguageRequest;
use Illuminate\Support\Facades\File;

class LanguageController extends Controller
{
    private $translation;

    public function __construct(Translation $translation)
    {
        $this->translation = $translation;
    }

    public function index(Request $request)
    {
        return view('admin.pages.languages.index' );
    }

    public function getLanguages()
    {
        $languages = Language::all();
        return response()->json([
            'languages' => $languages,
            'status' => 'success',
            'message' => 'Список языков успешно получен'
        ],200);
    }
    public function getActiveLanguages()
    {
        $languages = Language::where('is_active', true)->get();
        return response()->json([
            'languages' => $languages,
            'status' => 'success',
            'message' => 'Список языков успешно получен'
        ],200);
    }

    public function update(Request $request)
    {
//        $lang = Language::where('locale_name', $request->locale_name)->first();
        $lang = Language::find($request->id);
        $lang->name = $request->name;
        $lang->is_active = $request->is_active;
//        $lang->locale_name = $request->locale_name;
        $lang->save();
        return response()->json([
            'language' => $lang,
            'status' => 'success',
            'message' => 'Язык и его файлы успешно обновлены'
        ],200);
    }

    public function store(LanguageRequest $request)
    {
        if (!$this->translation->languageExists($request->locale_name)) {
            $lang = Language::create([
                'name' => $request->name,
                'locale_name' => $request->locale_name,
                'is_active' => $request->is_active,
            ]);
            $this->translation->addLanguage($request->locale_name, $request->name);
            return response()->json([
                'language' => $lang,
                'status' => 'success',
                'message' => 'Язык и его файлы успешно созданы'
            ],200);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Произошла ошибка: такой язык уже существует. Язык и его файлы не созданы'
        ],500);

    }

    public function remove(Request $request)
    {
        try {
            $language = $request->get('language');
            $lang = Language::where('locale_name', $language)->delete();
            $groups = $this->translation->getGroupsFor($language)->merge('single');
            File::deleteDirectory(resource_path('lang/'.$language));
            $storage = resource_path("/js/vue-translations.json");
            $file = file_get_contents($storage);
            $object = json_decode($file);
            foreach ($groups as $group) {
                $initial_key = $language.'.'.$group;

                if (isset($object->$initial_key)) {
                    unset($object->$initial_key);
//                    throw new \Exception('Произошла ошибка. Свойства языка "'.$initial_key.'" не существует');
                }
            }
            file_put_contents($storage, json_encode($object));
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Произошла ошибка. Не удалось удалить язык и его файлы'
            ],500);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Язык и его файлы успешно удалены'
        ],200);
    }

    public function getGroups($language = 'en') {
        $groups = $this->translation->getGroupsFor($language)->merge('single');
        return response()->json([
            'groups' => $groups
        ]);
    }

    public function syncLanguages()
    {
        $files_languages = array_keys($this->translation->allLanguages()->toArray());
        $languages = Language::all();

        foreach ($languages as $language) {
            if (!in_array($language->locale_name, $files_languages)) {
                $this->translation->addLanguage($language->locale_name, $language->name);
            }
        }
        foreach ($files_languages as $language) {
           if (!$languages->contains(Language::where('locale_name', $language)->first()))
           {
               $lang = Language::create([
                   'name' =>$language,
                   'locale_name' => $language,
                   'is_active' => true,
               ]);
           }
        }
        $languages = Language::all();
        return response()->json([
            'languages' => $languages,
            'status' => 'success',
            'message' => 'Список языков успешно получен'
        ],200);
    }
}
