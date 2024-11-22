@extends('users.layouts.layout')
@section('trending')
    <div class="container-fluid pb-4 pt-5">
        <div class="container animate-box">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Trending</div>
            </div>
            <div class="owl-carousel owl-theme" id="slider2">
                @foreach($postTrending as $post)
                <div class="item px-2">
                    <div class="fh5co_hover_news_img">
                        <div class="fh5co_news_img"><img style="max-width:100%"src="{{ asset($post->image) }}"
                                alt="" /></div>
                        <div>
                            <a href="{{route('detail',['slug'=>$post->slug])}}" class="d-block fh5co_small_post_heading"><span class=""> {{$post->title}}</span></a>
                            <div class="c_g"><i class="fa fa-clock-o"></i> {{$post->created_at}}</div>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function loadTrending() {
            fetch('/api/get-post-trending')
                .then(data => data.text())
                .then((data) => {
                    data = JSON.parse(data);
                    const htmlTrending = data.map((post) => {
                        return `<div class="item px-2">
                                    <div class="fh5co_hover_news_img">
                                    <div class="fh5co_news_img"><img src="{{ asset('/images/39-324x235.jpg') }}" alt=""/></div>
                                    <div>
                                    <a href="#" class="d-block fh5co_small_post_heading"><span class="">The top 10 best computer speakers in the market</span></a>
                                <div class="c_g"><i class="fa fa-clock-o"></i> Oct 16,2017</div>
                                </div>
                                 </div>
                                 </div> `;
                    })
                    const slide = document.getElementById('slider2');
                    slide.innerHTML = htmlTrending.join('');
                })
        }
        // loadTrending();
    </script>
@endsection
