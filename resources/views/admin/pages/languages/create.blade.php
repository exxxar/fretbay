@extends('layouts.admin')

@section('content')

    <div class="panel w-1/2">

        <div class="panel-header">

            {{ __('translation.add_language') }}

        </div>

        <form action="{{ route('languages.store') }}" method="POST">

            <fieldset>

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="panel-body p-4">

                    @include('forms.text', ['field' => 'name', 'label' => __('translation.language_name'), ])

                    @include('forms.text', ['field' => 'locale', 'label' => __('translation.locale'), ])

                </div>

            </fieldset>

            <div class="panel-footer flex flex-row-reverse">

                <button class="button button-blue">
                    {{ __('translation.save') }}
                </button>

            </div>

        </form>

    </div>

@endsection
