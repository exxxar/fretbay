@extends("layouts.app")

@section("seo")
    <meta name="description" content="{{$page->meta_description}}" />
    <meta name="keyword" content="{{$page->meta_keywords}}" />
@endsection

@section("content")
    <header-component></header-component>
    <preloader-component></preloader-component>
    <index-page></index-page>



    <div class="container">
        <div class="border-top border-bottom space-2 space-3--md">
            <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-9"><span
                    class="u-label u-label--sm u-label--purple mb-3">  Our blog</span>
                <h2>Allotrans Blog</h2>
                <p> Global services using any means of transport, with regular lines or customized projects, customs
                    management and logistics..</p></div>
            <div class="row">
                @foreach($posts as $post)
                    <div class="card-wrap col-md-6 p-2" title="{{$post->seo_title}}">
                        <div class="card overflow-hidden mb-3 p-0 w-100" style="max-height: 250px;">
                            <img class="card-img-top" src="{{ Voyager::image( $post->image ) }}"
                                 alt="{{$post->seo_title}}" aria-label="{{$post->meta_description}}"
                                 style=" object-fit: cover;">

                            <a class="card-img-overlay" href="/post/{{ $post->slug }}"
                               style="background: rgba(0,0,0,0.8)">
                                <h5 class="card-title text-primary">{{ $post->title }}</h5>
                                <p class="card-text text-white card-overflow">{{ $post->excerpt }}</p>
                                <p class="card-text text-white">{{ $post->created_at }}</p>

                                @isset($post->category)
                                    <a href="/post-category/{{$post->category->slug}}" class="card-text text-primary"> #{{ $post->category->name }}</a>
                                @endisset

                            </a>


                        </div>


                    </div>



                @endforeach

            </div>
            <div class="d-flex justify-content-center ">

                {!! $posts->links() !!}

            </div>
        </div>
    </div>

    <footer-component></footer-component>


@endsection
