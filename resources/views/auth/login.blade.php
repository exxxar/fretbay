@extends("layouts.app")

@section("content")
    <header-component></header-component>
    <login-page>

        <template v-slot:any-error>
            @isset($errors)
                @foreach ($errors->all() as $error)

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ $error }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
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
    </login-page>

    <footer-component></footer-component>
@endsection

