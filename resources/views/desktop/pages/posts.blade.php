@extends("layouts.app")


@section("content")
    <header-component></header-component>
    <div class="container mt-5">
        <div class="row">


                @foreach($posts as $post)
                    <div class="card-wrap col-md-6 p-2">
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


        </div>
        <div class="row">
            <div class="d-flex justify-content-center">
                {!! $posts->links() !!}
            </div>
        </div>
    </div>


    <footer-component></footer-component>


@endsection
