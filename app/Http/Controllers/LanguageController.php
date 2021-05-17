<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Drivers\Translation;
use App\Http\Requests\LanguageRequest;

class LanguageController extends Controller
{
    private $translation;

    public function __construct(Translation $translation)
    {
        $this->translation = $translation;
    }

    public function index(Request $request)
    {
        $languages = $this->translation->allLanguages();
        $languages_array = [];
       foreach ($languages as $language => $name)
       {
           $lang = (object)[];
           $lang->name = $name;
           $lang->locale_name = $language;
           array_push( $languages_array, $lang);
       }

        return view('admin.pages.languages.index', compact('languages', 'languages_array'));
    }

    public function create()
    {
        return view('admin.pages.languages.create');
    }

    public function store(LanguageRequest $request)
    {
        $this->translation->addLanguage($request->locale_name, $request->name);

        return redirect()
            ->route('admin.pages.languages.index')
            ->with('success', __('translation.language_added'));
    }
}
