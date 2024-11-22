@extends('admin.layouts.layout')
@section('title-page', 'Quản lý news-video')
@section('active-news-video', 'active')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if (session('success'))
                <div id="hien-an" class="bg-success" style="height:50px"> {{ session('success') }}</div>
            @endif
            <form id="formNewsVideo" class=""
                action="@isset($newsVideo){{ route('news-video.update', ['news_video' => $newsVideo->id]) }} @endisset"
                method="post">
                @csrf
                @isset($newsVideo)
                    @method('put')
                @endisset
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
                    <select name="status" id="" class="form-control">
                        <option value="1"
                            @isset($newsVideo) @if ($newsVideo->status == 1) selected @endif @endisset>
                            Hiển thị</option>
                        <option value="0"
                            @isset($newsVideo) @if ($newsVideo->status == 0) selected @endif @endisset>
                            Ẩn</option>
                    </select>
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
                        <th scope="col">Delete</th>
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
                                    <iframe src="{{ $newsVideo->link }}" frameborder="0" width="60px" height="50px"
                                        encrypted-media frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                </td>
                                <td> <img src="{{ asset($newsVideo->image) }}" alt="no-image" style="width:50px"> </td>
                                <td> {{ $newsVideo->category()->first()->name }} </td>
                                <td id="news-video-status-{{$newsVideo->id}}">{{ $newsVideo->status == 1 ? 'Hiển thi' : 'Ẩn' }}</td>
                                <td>
                                    <form action="{{ route('news-video.edit', ['news_video' => $newsVideo->id]) }}"
                                        method="get"> @csrf<button type="submit" class="btn btn-primary"
                                            id="changeAction">Edit</button> </form>
                                </td>
                                <td>

                                    <button type="submit" class="btn btn-primary btn-delete-newsvideo" id="changeAction"
                                        data-id={{ $newsVideo->id }}>Delete</button>
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
@section('script')
    <script>
        const deleteNewsVideo = document.querySelectorAll('.btn-delete-newsvideo');

        deleteNewsVideo.forEach((btn) => {
            btn.onclick = () => {
                console.log(btn.dataset.id);
                let confirmDel = confirm('Bạn chắc chắn muốn xóa danh mục này?');
                if (confirmDel) {
                    const xhttp = new XMLHttpRequest();
                    xhttp.onload = () => {
                        btn.parentNode.parentNode.remove();
                        alert(JSON.parse(xhttp.responseText).success);
                    }
                    const token = '{{ csrf_token() }}'
                    xhttp.open('delete', `/admin/news-video/${btn.dataset.id}?_token=${token}`)
                    xhttp.send();
                }
            }
        })
    </script>
    <script>
        const url = new URL(window.location.href).pathname;
        const part = url.split('/');
        if (url === '/admin/' + part[2]) {
            const form = document.getElementById('formNewsVideo');
            form.method = "POST";
        }
        if (url === '/admin/news-video/' + part[3] + '/edit') {
            const form = document.getElementById('formNewsVideo');
            form.method = "POST";
        }

        const deleteNewsVideo = document.querySelectorAll('.btn-delete-newsvideo');

        deleteNewsVideo.forEach((btn) => {
            btn.onclick = () => {
                console.log(btn.dataset.id);
                let confirmDel = confirm('Bạn chắc chắn muốn xóa news-video này?');
                if (confirmDel) {
                    const xhttp = new XMLHttpRequest();
                    xhttp.onload = () => {
                        let newsVideo = document.getElementById(`news-video-status-${btn.dataset.id}`)
                        newsVideo.textContent = "Ẩn";
                        alert(JSON.parse(xhttp.responseText).success);
                    }
                    const token = '{{ csrf_token() }}'
                    xhttp.open('delete', `/admin/news-video/${btn.dataset.id}?_token=${token}`)
                    xhttp.send();
                }
            }
        })
    </script>
@endsection
