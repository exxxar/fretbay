@extends("layouts.app")

@section("content")
    <header-simple-component></header-simple-component>
    <login-page>

        <template v-slot:csrf>
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        </template>

        <template v-slot:error-email>
            @error('email')
            <p class="font-weight-bold text-danger">{{ $message }}</p>
            @enderror
        </template>

        <template v-slot:error-password>
            @error('password')
            <p class="font-weight-bold text-danger">{{ $message }}</p>
            @enderror
        </template>
    </login-page>

    <footer-component></footer-component>
@endsection

