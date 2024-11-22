@extends('users.layouts.news-layout')
@section('single', 'class=single')
@section('content')
    <div id="fh5co-title-box" style="background-image: url({{ asset($post->image) }}); background-position: 50% 90.5px;"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="page-title">
            <img src="images/person_1.jpg" alt="Free HTML5 by FreeHTMl5.co">
            <span>{{ $post->created_at }}</span>
            <h2>{{ $post->title }}</h2>
        </div>
    </div>
    <div id="fh5co-single-content" class="container-fluid pb-4 pt-4 paddding">
        <div class="container paddding">
            <div class="row mx-0">
                <div class="col-md-8 animate-box format-image" data-animate-effect="fadeInLeft">
                    {!! $post->content !!}
                </div>
                <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tags</div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="fh5co_tags_all">
                        @foreach($categories as $category)
                        <a href="/search?category={{$category->id}}" class="fh5co_tagg">{{$category->name}}</a>
                    @endforeach
                    </div>
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Most Popular</div>
                    </div>
                    @foreach ($popularPosts as $post)
                        <div class="row pb-3">
                            <div class="col-5 align-self-center">
                                <img src="{{ $post->image }}" alt="img" class="fh5co_most_trading" />
                            </div>
                            <div class="col-7 paddding">
                                <div class="most_fh5co_treding_font"> {{ $post->title }}</div>
                                <div class="most_fh5co_treding_font_123"> {{ $post->created_at }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
