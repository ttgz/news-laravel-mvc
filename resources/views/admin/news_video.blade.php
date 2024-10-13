@extends('admin.layouts.layout')
@section('title-page', 'Quản lý news-video')
@section('active-news-video', 'active')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if (session('success'))
                <div id="hien-an" class="bg-success" style="height:50px"> {{ session('success') }}</div>
            @endif
            <form id="formNewsVideo" class="" action="" method="post">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="" class="form-label">ID</label>
                    <input type="text" readonly name="id"
                        value="@isset($newsVideo){{ $newsVideo->id }}@endisset" class="form-control"
                        id="" aria-describedby="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Title</label>
                    <input type="text" name="title"
                        @isset($newsVideo) value="{{ $newsVideo->title }}" @endisset class="form-control"
                        id="" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Create At</label>
                    <input type="text" name="created_at" disabled
                        @isset($newsVideo) value="{{ $newsVideo->created_at }}" @endisset
                        class="form-control" id="" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Video</label>
                    <input type="text" name="link"
                        @isset($newsVideo) value="{{ $newsVideo->link }}" @endisset class="form-control"
                        id="" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Image</label>
                    <input type="text" name="image"
                        @isset($newsVideo) value="{{ $newsVideo->image }}" @endisset class="form-control"
                        id="" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Category</label>
                    <select name="category" id="" class="form-control">
                        @isset($categories)
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    @isset($newsVideo) @if ($category->id == $newsVideo->category) selected @endif @endisset>
                                    {{ $category->name }}</option>
                            @endforeach
                        @endisset
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Status</label>
                    <input type="text" name="status"
                        @isset($newsVideo) value="{{ $newsVideo->status }}" @endisset class="form-control"
                        id="" aria-describedby="emailHelp">
                </div>

                <button type="submit" class="btn btn-primary" id="">Thêm/Sửa</button>
            </form>

        </div>

    </div>
    <hr>
    <div class="row container" style="margin-top:30px">
        <div class="col-lg-12">
            <form action="/admin/news-video/search">
                <div class="input-group">
                    <div class="form-outline" data-mdb-input-init>
                        <input type="search" id="form1" name="key"class="form-control" />
                        <label class="form-label" for="form1">Search</label>
                    </div>
                    <button type="submit" class="btn btn-primary" data-mdb-ripple-init>
                        Search
                    </button>
                </div>
            </form>

        </div>

    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Video</th>
                        <th scope="col">Image</th>
                        <th scope="col">Category</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($newsVideos)
                        @foreach ($newsVideos as $newsVideo)
                            <tr>
                                <th scope="row"> {{ $newsVideo->id }}</th>
                                <td> {{ $newsVideo->title }}</th>
                                <td>{{ $newsVideo->created_at }}</td>
                                <td> 
                                    <iframe src="{{$newsVideo->link}}" frameborder="0" width="60px" height="50px" encrypted-media></iframe> 
                                </td>
                                <td>  <img src="{{asset($newsVideo->image)}}" alt="no-image" style="width:50px"> </td>
                                <td>{{ $newsVideo->category()->get()[0]->name }}</td>
                                <td>{{ $newsVideo->status }}</td>
                                <td>
                                    <form action="/admin/news-video/edit/{{ $newsVideo->id }}" method="post"> @csrf<button
                                            type="submit" class="btn btn-primary" id="changeAction">Edit</button> </form>
                                </td>

                            </tr>
                        @endforeach
                    @endisset
                </tbody>
            </table>
            <nav aria-label="...">
                @isset($newsVideos)
                    <ul class="pagination">
                        <li class="page-item @if ($newsVideos->currentpage() == 1) disabled @endif">
                            <a class="page-link" href="{{ $newsVideos->previousPageUrl() }}">Previous</a>
                        </li>
                        @if ($newsVideos->lastpage() <= 3)
                            @for ($i = 1; $i <= $newsVideos->lastpage(); $i++)
                                <li class="page-item  @if ($newsVideos->currentpage() == $i) active @endif"><a class="page-link"
                                        href="{{ $newsVideos->url($i) }}">{{ $i }}</a></li>
                            @endfor
                        @else
                            @for ($i = 1; $i <= 3; $i++)
                                <li class="page-item  @if ($newsVideos->currentpage() == $i) active @endif"><a class="page-link"
                                        href="{{ $newsVideos->url($i) }}">{{ $i }}</a></li>
                            @endfor
                        @endif
                        <li class="page-item  @if ($newsVideos->currentpage() == $newsVideos->lastpage()) disabled @endif">
                            <a class="page-link" href="{{ $newsVideos->nextPageUrl() }} "> Next</a>
                        </li>
                    </ul>
                @endisset
            </nav>
        </div>
    </div>
@endsection
