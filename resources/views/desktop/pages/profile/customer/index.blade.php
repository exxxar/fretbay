@extends("layouts.app")

@section("content")


    <header-component></header-component>
    <profile-customer-page>
      <template v-slot:any-error>
            @isset($errors)
                @foreach ($errors->all() as $error)
                    @if($error="success")
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ __('notifications.other.updated')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @else
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{ __('notifications.other.updated') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                @endforeach
            @endisset
        </template>

        <template v-slot:csrf>
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        </template>
    </profile-customer-page>
    <footer-component></footer-component>

@endsection

