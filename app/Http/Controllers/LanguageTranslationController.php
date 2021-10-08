<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use App\Drivers\Translation;
use App\Http\Requests\TranslationRequest;
use Illuminate\Support\Facades\Artisan;


class LanguageTranslationController extends Controller
{
    private $translation;

    public function __construct(Translation $translation)
    {
        $this->translation = $translation;
    }

    public function index($language='en')
    {
        return view('admin.pages.languages.translations.index', compact( 'language'));
    }

    public function getTranslations()
    {
        $translations_by_groups = $this->translation->getAllTranslations();
        $records = [];
        foreach ($translations_by_groups as $group=>$keys)
        {
            foreach ($keys as $key=>$languages) {
                $record = (object)[];
                $record->group = $group;
                $record->key = $key;
                foreach ($languages as $language=>$translation) {
                    $record->{$language} = $translation;
                }
                array_push($records, $record);
            }
        }
        return response()->json([
            'translations' => $records,
            'message' => 'Список ключей переводов успешно получен'
        ]);
    }

    public function store(TranslationRequest $request)
    {
        try {
            $language = $request->get('language');
            $group = $request->get('group');

//            if ($request->filled('group')) {
                $namespace = $request->has('namespace') && $request->get('namespace') ? "{$request->get('namespace')}::" : '';
                $this->translation->addGroupTranslation($language, "{$namespace}{$group}", $request->get('key'), $request->get('value') ?: '');
//            } else {
//                $this->translation->addSingleTranslation($language , 'single', $request->get('key'), $request->get('value') ?: '');
//            }

            $storage = resource_path("/js/vue-translations.json");
            $file = file_get_contents($storage);
            $object = json_decode($file, true);
            $initial_key = $language.'.'.$group;
            $translations = $this->translation->getGroupTranslationsFor($language);
            $group_translations = $translations->get($group);
            $object[$initial_key] = collect($group_translations);
            file_put_contents($storage, json_encode($object));

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error'
            ]);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Ключ перевода успешно создан'
        ]);
    }

    public function update(Request $request)
    {
        $language = $request->get('language');
        $group = $request->get('group');

//        if (! Str::contains($request->get('group'), 'single')) {
            $this->translation->addGroupTranslation(  $language ,$group, $request->get('key'), $request->get('value') ?: '');
//        } else {
//            $this->translation->addSingleTranslation( $language , $group, $request->get('key'), $request->get('value') ?: '');
//        }

        $storage = resource_path("/js/vue-translations.json");
        $file = file_get_contents($storage);
        $object = json_decode($file, true);
        $initial_key = $language.'.'.$group;
        $translations = $this->translation->getGroupTranslationsFor($language);
        $group_translations = $translations->get($group);
        $object[$initial_key] = collect($group_translations);
        file_put_contents($storage, json_encode($object));


        return response()->json([
            'status' => 'success',
            'message' => 'Ключ перевода успешно обновлён'
        ]);
    }

    public function removeTranslationKey(Request $request) {
        try {
//             $language = $request->get('language');
            $group = $request->get('group');
            $all_languages = $this->translation->allLanguages();
            $storage = resource_path("/js/vue-translations.json");
            $file = file_get_contents($storage);
            $object = json_decode($file, true);
            foreach ($all_languages as $language => $name)
            {
                if ($request->filled('group')) {
                    $namespace = $request->has('namespace') && $request->get('namespace') ? "{$request->get('namespace')}::" : '';
                    $this->translation->removeGroupTranslation( $language , "{$namespace}{$group}", $request->get('key'));
                } else {
                    $this->translation->removeGroupTranslation( $language , 'single', $request->get('key'));
                }

                $initial_key = $language.'.'.$group;
                $translations = $this->translation->getGroupTranslationsFor($language);
                $group_translations = $translations->get($group);
                $object[$initial_key] = collect($group_translations);
            }
            file_put_contents($storage, json_encode($object));
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error'
            ]);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Ключ перевода успешно удалён'
        ]);
    }

    public function updateVueTranslations() {
        try {
            $exitCode = Artisan::call('lang:js resources/js/vue-translations.js --no-lib --quiet');
            $exitCode = Artisan::call('lang:js resources/js/vue-translations.json --quiet');
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error'
            ]);
        }
        return response()->json([
            'status' => 'success'
        ]);
    }

    public function syncTranslations(Request $request) {
        $language = $request->get('language') ?: false;

        try {
            // if we have a language, pass it in, if not the method will
            // automagically sync all languages
            $this->translation->saveMissingTranslations($language);
            return response()->json([
                'status' => 'success',
                'message' => 'Список ключей переводов успешно синхронизирован'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error'
            ],500);
        }
    }

}
