@extends('layouts.admin')

@section('content')
    <languages-page  :languages="{{json_encode($languages_array)}}"></languages-page>
{{--{{$languages}}--}}
{{--    @if(count($languages))--}}

{{--        <div class="panel w-1/2">--}}

{{--            <div class="panel-header">--}}

{{--                {{ __('translation.languages') }}--}}

{{--                <div class="flex flex-grow justify-end items-center">--}}

{{--                    <a href="{{ route('languages.create') }}" class="button">--}}
{{--                        {{ __('translation.add') }}--}}
{{--                    </a>--}}

{{--                </div>--}}

{{--            </div>--}}

{{--            <div class="panel-body">--}}

{{--                <table>--}}

{{--                    <thead>--}}
{{--                        <tr>--}}
{{--                            <th>{{ __('translation.language_name') }}</th>--}}
{{--                            <th>{{ __('translation.locale') }}</th>--}}
{{--                        </tr>--}}
{{--                    </thead>--}}

{{--                    <tbody>--}}
{{--                        @foreach($languages as $language => $name)--}}
{{--                            <tr>--}}
{{--                                <td>--}}
{{--                                    {{ $name }}--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <a href="{{ route('languages.translations.index', $language) }}">--}}
{{--                                        {{ $language }}--}}
{{--                                    </a>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
{{--                    </tbody>--}}
{{--                </table>--}}

{{--            </div>--}}

{{--        </div>--}}

{{--    @endif--}}

@endsection
