@extends("layouts.app")

@section("content")
    <header-simple-component></header-simple-component>
    <register-customer-page>
        <template v-slot:any-error>
            @isset($errors)
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            @endisset
        </template>
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

        <template v-slot:error-phone>
            @error('phone')
            <p class="font-weight-bold text-danger">{{ $message }}</p>
            @enderror
        </template>

    </register-customer-page>
    <footer-component></footer-component>
@endsection
