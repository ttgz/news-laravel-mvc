@extends('admin.layouts.layout')
@section('title-page', 'Quản lý bài viết')
@section('content')
    @if (session('success'))
        <div id="hien-an" class="bg-success" style="height:50px"> {{ session('success') }}</div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('post.create') }}" class="btn">Thêm</a>
        </div>
    </div>
    <div class="row container" style="margin-top:30px">
        <div class="col-lg-12">
            <form action="{{ route('post.search') }}">
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
                        <th scope="col">Content</th>
                        <th scope="col">Sumary Content</th>
                        <th scope="col">Author</th>
                        <th scope="col">Created_at</th>
                        <th scope="col">Updated_at</th>
                        <th scope="col">Image</th>
                        <th scope="col">category</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($posts)
                        @foreach ($posts as $post)
                            <tr>
                                <th scope="row"> {{ $post->id }}</th>
                                <td style="max-width: 100px;overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $post->title }}</td>
                                <td style="max-width: 100px;overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{ $post->content }}</td>
                                <td style="max-width: 100px;overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{ $post->summary_content }}</td>
                                <td>{{ $post->author }}</td>
                                <td>{{ $post->created_at }}</td>
                                <td>{{ $post->updated_at }}</td>
                                <td> <img src="{{ asset($post->image) }}" alt="no-image" style="width:60px"></td>
                                <td>{{ $post->category()->get()[0]['name'] }}</td>
                                <td id="post-status-{{$post->id}}">{{ $post->status==1?'Hiển thị': 'Ẩn' }}</td>
                                <td>

                                    <form action="{{ route('post.edit', ['post' => $post->slug]) }}" method="get"> @csrf <button
                                            type="submit" class="btn btn-primary" id="changeAction">Edit</button> </form>
                                </td>
                                <td>

                                    <button type="submit" class="btn btn-primary btn-delete-post"  data-id={{ $post->id }}>Delete</button>
                                </td>

                            </tr>
                        @endforeach
                    @endisset
                </tbody>
            </table>
            <nav aria-label="...">

                <ul class="pagination">
                    <li class="page-item @if ($posts->currentpage() == 1) disabled @endif">
                        <a class="page-link" href="{{ $posts->previousPageUrl() }}">Previous</a>
                    </li>
                    @if ($posts->lastpage() <= 3)
                        @for ($i = 1; $i <= $posts->lastpage(); $i++)
                            <li class="page-item  @if ($posts->currentpage() == $i) active @endif"><a class="page-link"
                                    href="{{ $posts->url($i) }}">{{ $i }}</a></li>
                        @endfor
                    @else
                        @for ($i = 1; $i <= 3; $i++)
                            <li class="page-item  @if ($posts->currentpage() == $i) active @endif"><a class="page-link"
                                    href="{{ $posts->url($i) }}">{{ $i }}</a></li>
                        @endfor
                    @endif
                    <li class="page-item  @if ($posts->currentpage() == $posts->lastpage()) disabled @endif">
                        <a class="page-link" href="{{ $posts->nextPageUrl() }} "> Next</a>
                    </li>
                </ul>
                {{ $posts->links() }}
            </nav>

        </div>
    </div>

@endsection
@section('script')
    <script defer>
       
        const deletePost = document.querySelectorAll('.btn-delete-post');
    
    deletePost.forEach((btn)=>{
        btn.onclick= ()=>{
            console.log(btn.dataset.id);
            let confirmDel = confirm('Bạn chắc chắn muốn xóa bài viết này?');
            if(confirmDel)
            {
                const xhttp = new XMLHttpRequest();
                xhttp.onload = ()=>{
                    let statusPost = document.getElementById(`post-status-${btn.dataset.id}`)
                    statusPost.textContent = "Ẩn";
                    alert(JSON.parse(xhttp.responseText).success);
                }
                const token = '{{csrf_token()}}'
                xhttp.open('delete',`/admin/post/${btn.dataset.id}?_token=${token}`)
                xhttp.send();
            }
        }
    })
    </script>
@endsection
