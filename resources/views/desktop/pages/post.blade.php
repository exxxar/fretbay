@extends("layouts.app")

@section("seo")
    <meta name="description" content="{{$post->meta_description}}" />
    <meta name="keyword" content="{{$post->meta_keywords}}" />
    @endsection

@section("content")
    <header-component></header-component>
    <div class="container mt-5 p-0">
        <div class="row p-0">
            <div class="col-md-8 col-md-offset-2 p-0">
                <div class="post w-100" style="position: sticky; top:70px;">
                    <h1>{{ $post->title }}</h1>
                    <img src="{{ Voyager::image( $post->image ) }}" style="width:100%">
                    <p>{!! $post->body !!}</p>
                    <hr>
                    <small><strong>Posted at {{$post->created_at}}</strong></small>
                    <hr>
                    <comments-component post-id="{{$post->id}}"></comments-component>
                </div>

            </div>
            <div class="col-md-4">
                @foreach($posts as $post)
                    <div class="card-wrap col-md-12 p-2">
                        <div class="card overflow-hidden mb-3 p-0 w-100">
                            <img class="card-img-top" src="{{ Voyager::image( $post->image ) }}" alt="{{$post->seo_title}}"
                                 style="height:150px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ $post->excerpt }}</p>
                            </div>
                            <div class="card-footer border-top-0 p-5 pr-9"><a href="/post/{{ $post->slug }}"
                                                                              class="font-weight-medium btn btn-outline-primary w-100">Read
                                    more</a>
                            </div>
                        </div>
                    </div>

                @endforeach
                <div class="d-flex justify-content-center">
                    {!! $posts->links() !!}
                </div>
            </div>
        </div>
    </div>


    <footer-component></footer-component>


@endsection
