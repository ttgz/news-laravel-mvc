@extends('users.layouts.layout')
@section('content')
    <div class="container-fluid paddding mb-5">
        <div class="row mx-0">
            <div class="col-md-6 col-12 paddding animate-box" data-animate-effect="fadeIn">
                <div class="fh5co_suceefh5co_height"><img src="{{ asset($advertisements[0]->image) }}" alt="img" />
                    <div class="fh5co_suceefh5co_height_position_absolute"></div>
                    <div class="fh5co_suceefh5co_height_position_absolute_font">
                        <div class=""><a href="#" class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;
                                {{ $advertisements[0]->created_at }}
                            </a></div>
                        <div class=""><a href="{{route('detail',['slug'=>$advertisements[0]->slug])}}" class="fh5co_good_font"> {!! $advertisements[0]->content !!}
                            </a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    @for ($i = 1; $i < 5; $i++)
                        <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                            <div class="fh5co_suceefh5co_height_2"><img src="{{ asset($advertisements[$i]->image) }}"
                                    alt="img" />
                                <div class="fh5co_suceefh5co_height_position_absolute"></div>
                                <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                                    <div class=""><a href="{{route('detail',['slug'=>$advertisements[$i]->slug])}}" class="color_fff"> <i
                                                class="fa fa-clock-o"></i>&nbsp;&nbsp;
                                            {{ $advertisements[$i]->created_at }}</a></div>
                                    <div class=""><a href="{{route('detail',['slug'=>$advertisements[$i]->slug])}}" class="fh5co_good_font_2">
                                            {!! $advertisements[$i]->content !!} </a></div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-3">
        <div class="container animate-box" data-animate-effect="fadeIn">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Trending</div>
            </div>
            <div class="owl-carousel owl-theme js" id="slider1">
                @foreach ($postTrending as $post)
                    <div class="item px-2">
                        <div class="fh5co_latest_trading_img_position_relative">
                            <div class="fh5co_latest_trading_img"><img src="{{ asset($post->image) }}" alt=""
                                    class="fh5co_img_special_relative" /></div>
                            <div class="fh5co_latest_trading_img_position_absolute"></div>
                            <div class="fh5co_latest_trading_img_position_absolute_1">
                                <a href="{{route('detail',['slug'=>$post->slug])}}" class="text-white"> {{ $post->summary_content }}
                                </a>
                                <div class="fh5co_latest_trading_date_and_name_color"> {{ $post->author }}
                                    -{{ $post->created_at }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <div class="container-fluid pb-4 pt-5">
        <div class="container animate-box">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News</div>
            </div>
            <div class="owl-carousel owl-theme" id="slider2">
                @foreach ($postsNews as $post)
                    <div class="item px-2">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img"><img src="{{ asset($post->image) }}" alt="" /></div>
                            <div>
                                <a href="{{route('detail',['slug'=>$post->slug])}}" class="d-block fh5co_small_post_heading"><span class="">
                                        {{ $post->title }}</span></a>
                                <div class="c_g"><i class="fa fa-clock-o"></i> {{ $post->created_at }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <div class="container-fluid fh5co_video_news_bg pb-4">
        <div class="container animate-box" data-animate-effect="fadeIn">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom pt-5 pb-2 mb-4  text-white">Video News</div>
            </div>
            <div>
                <div class="owl-carousel owl-theme" id="slider3">
                    @foreach ($newsVideos as $newsVideo)
                        <div class="item px-2">
                            <div class="fh5co_hover_news_img">
                                <div class="fh5co_hover_news_img_video_tag_position_relative">
                                    <div class="fh5co_news_img">
                                        <iframe id="video" width="100%" height="200" src="{{ $newsVideo->link }}"
                                            frameborder="0" allowfullscreen frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                    </div>
                                    <div class="fh5co_hover_news_img_video_tag_position_absolute fh5co_hide">
                                        <img src="{{ $newsVideo->image }}" alt="" />
                                    </div>
                                    <div class="fh5co_hover_news_img_video_tag_position_absolute_1 fh5co_hide"
                                        id="play-video">
                                        <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button_1">
                                            <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button">
                                                <span><i class="fa fa-play"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <a href="#" class="d-block fh5co_small_post_heading fh5co_small_post_heading_1">
                                        <span class="">{{ $newsVideo->title }}</span></a>
                                    <div class="c_g"><i class="fa fa-clock-o"></i> {{ $newsVideo->created_at }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pb-4 pt-4 paddding">
        <div class="container paddding">
            <div class="row mx-0">
                <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News</div>
                    </div>
                    @foreach ($posts as $post)
                        <div class="row pb-4">
                            <div class="col-md-5">
                                <div class="fh5co_hover_news_img">
                                    <div class="fh5co_news_img"><img src="{{asset($post->image)}}"
                                            alt="" />
                                    </div>
                                    <div></div>
                                </div>
                            </div>
                            <div class="col-md-7 animate-box">
                                <a href="{{route('detail',['slug'=>$post->slug])}}" class="fh5co_magna py-2"> {{$post->title}} </a> <a href="{{route('detail',['slug'=>$post->slug])}}"
                                    class="fh5co_mini_time py-3">
                                    {{$post->author}} -
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
            <div class="row mx-0 animate-box" data-animate-effect="fadeInUp">
                <div class="col-12 text-center pb-4 pt-4">
                    <a href="{{$posts->previousPageUrl()}}" class="btn_mange_pagging"><i class="fa fa-long-arrow-left"></i>&nbsp;&nbsp;
                        Previous</a>
                    @if ($posts->lastpage() <= 3)
                        @for ($i = 1; $i <= $posts->lastpage(); $i++)
                            <a href="{{$posts->url($i)}}" class="btn_pagging"> {{$i}}</a>
                        @endfor
                    @else
                        @for ($i = 1; $i <= 3; $i++)
                            <a href="{{$posts->url($i)}}" class="btn_pagging"> {{$i}} </a>
                        @endfor
                        <a href="{{ $posts->nextPageUrl() }}" class="btn_pagging">...</a>
                    @endif
                   
                    <a href="{{ $posts->nextPageUrl() }} " class="btn_mange_pagging">Next <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp;
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
