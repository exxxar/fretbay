<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use App\Drivers\Translation;
use App\Http\Requests\TranslationRequest;

class LanguageTranslationController extends Controller
{
    private $translation;

    public function __construct(Translation $translation)
    {
        $this->translation = $translation;
    }

    public function index()
    {
        // dd($this->translation->getSingleTranslationsFor('en'));
//        if ($request->has('language') && $request->get('language') !== $language) {
//            return redirect()
//                ->route('admin.pages.languages.translations.index', ['language' => $request->get('language'), 'group' => $request->get('group'), 'filter' => $request->get('filter')]);
//        }
//
        $all_languages = $this->translation->allLanguages();
        $languages_array = [];
        foreach ($all_languages as $language => $name)
        {
            $lang = (object)[];
            $lang->name = $name;
            $lang->locale_name = $language;
            array_push( $languages_array, $lang);
        }
        $groups = $this->translation->getGroupsFor(config('app.locale'))->merge('single');
//        $translations = $this->translation->filterTranslationsFor($language, $request->get('filter'));
//
//        if ($request->has('group') && $request->get('group')) {
//            if ($request->get('group') === 'single') {
//                $translations = $translations->get('single');
//                $translations = new Collection(['single' => $translations]);
//            } else {
//                $translations = $translations->get('group')->filter(function ($values, $group) use ($request) {
//                    return $group === $request->get('group');
//                });
//
//                $translations = new Collection(['group' => $translations]);
//            }
//        }
        $translations_by_groups = $this->translation->getAllTranslations();
        $translations = [];
        foreach ($translations_by_groups as $group=>$keys)
        {
            foreach ($keys as $key=>$languages) {
                $record = (object)[];
                $record->group = $group;
                $record->key = $key;
                foreach ($languages as $language=>$translation) {
                    $record->{$language} = $translation;
                }
                array_push($translations, $record);
            }
        }

        return view('admin.pages.languages.translations.index', compact( 'languages_array', 'groups', 'translations'));
    }

    public function create(Request $request, $language)
    {
        return view('admin.pages.languages.translations.create', compact('language'));
    }

    public function store(TranslationRequest $request, $language)
    {
        if ($request->filled('group')) {
            $namespace = $request->has('namespace') && $request->get('namespace') ? "{$request->get('namespace')}::" : '';
            $this->translation->addGroupTranslation($language, "{$namespace}{$request->get('group')}", $request->get('key'), $request->get('value') ?: '');
        } else {
            $this->translation->addSingleTranslation($language, 'single', $request->get('key'), $request->get('value') ?: '');
        }

        return redirect()
            ->route('admin.pages.languages.translations.index', $language)
            ->with('success', __('translation.translation_added'));
    }

    public function update(Request $request, $language)
    {
        if (! Str::contains($request->get('group'), 'single')) {
            $this->translation->addGroupTranslation($language, $request->get('group'), $request->get('key'), $request->get('value') ?: '');
        } else {
            $this->translation->addSingleTranslation($language, $request->get('group'), $request->get('key'), $request->get('value') ?: '');
        }

        return ['success' => true];
    }

    public function translations()
    {
//        $this->translation->saveMissingTranslations();
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
        return $records;
    }
}
