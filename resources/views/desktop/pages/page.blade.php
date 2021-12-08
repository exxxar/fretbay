@extends("layouts.app")

@section("seo")
    <meta name="description" content="{{$page->meta_description}}" />
    <meta name="keyword" content="{{$page->meta_keywords}}" />
    @endsection

@section("content")
    <header-component></header-component>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="post w-100" style="position: sticky; top:70px;">
                    <h1>{{ $page->title }}</h1>
                    <img src="{{ Voyager::image( $page->image ) }}" style="width:100%">


                    <p>{!! $page->body !!}</p>
                    <hr>
                    <small>Publish at {{$page->created_at}}</small>
                </div>

            </div>
        </div>
    </div>


    <footer-component></footer-component>


@endsection
