@extends('users.layouts.news-layout')
@section('content')
<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News</div>
                </div>
                @foreach($posts as $post)
                <div class="row pb-4">
                    <div class="col-md-5">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img"><img src="{{asset($post->image)}}" alt=""/></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="col-md-7 animate-box">
                        <a href="{{route('detail',['slug'=>$post->slug])}}" class="fh5co_magna py-2"> {{$post->title}} </a> <a href="{{route('detail',['slug'=>$post->slug])}}" class="fh5co_mini_time py-3"> {{$post->author}} -
                        {{$post->created_at}} </a>
                        <div class="fh5co_consectetur"> 
                            {{$post->summary_content}}
                        </div>
                    </div>
                </div>
                @endforeach
 
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
                @foreach($popularPosts as $post)
                <div class="row pb-3">
                    <div class="col-5 align-self-center">
                        <img src="{{$post->image}}" alt="img" class="fh5co_most_trading" />
                    </div>
                    <div class="col-7 paddding">
                        <div class="most_fh5co_treding_font"> {{$post->title}}</div>
                        <div class="most_fh5co_treding_font_123"> {{$post->created_at}}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="row mx-0">
            <div class="col-12 text-center pb-4 pt-4">
                <a href="#" class="btn_mange_pagging"><i class="fa fa-long-arrow-left"></i>&nbsp;&nbsp; Previous</a>
                <a href="#" class="btn_pagging">1</a>
                <a href="#" class="btn_pagging">2</a>
                <a href="#" class="btn_pagging">3</a>
                <a href="#" class="btn_pagging">...</a>
                <a href="#" class="btn_mange_pagging">Next <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp; </a>
             </div>
        </div>
    </div>
</div>
 
@endsection