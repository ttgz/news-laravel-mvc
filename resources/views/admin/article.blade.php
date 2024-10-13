@extends('admin.layouts.layout')
@section('title-page', 'Quản lý bài viết')
@section('active-article','active')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if (session('success'))
                <div id="hien-an" class="bg-success" style="height:50px"> {{ session('success') }}</div>
            @endif
            <form id="formArticle"  action="" method="post">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="" class="form-label">ID</label>
                    <input type="text" readonly name="id"
                        value="@isset($article){{ $article->id }}@endisset" class="form-control"
                        id="" aria-describedby="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Title</label>
                    <input type="text" name="title"
                        value="@isset($article){{ $article->title }}@endisset" class="form-control"
                        id="" aria-describedby="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Content</label>
                    <input type="text" name="content"
                        value="@isset($article){{ $article->content }}@endisset" class="form-control"
                        id="" aria-describedby="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Author</label>
                    <input type="text" name="author"
                        value="@isset($article){{ $article->author }}@endisset" class="form-control"
                        id="" aria-describedby="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">created at</label>
                    <input type="text" name="created_at" disabled
                        value="@isset($article){{ $article->created_at }}@endisset" class="form-control"
                        id="" aria-describedby="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">updated_at</label>
                    <input type="text" name="updated_at" readonly
                        value="@isset($article){{ $article->updated_at }}@endisset " class="form-control"
                        id="updated_at" aria-describedby="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">image</label>
                    <input type="text" name="image"
                        value="@isset($article){{ $article->image }}@endisset" class="form-control"
                        id="" aria-describedby="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">category</label>
                    <select name="category" id="" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" @isset($article)@if($category->id== $article->category) selected @endif @endisset>{{$category->name}}</option>
                        @endforeach
                    </select>
                     
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Status</label>
                    <input type="text" name="status"
                        value="@isset($article){{ $article->status }}@endisset" class="form-control"
                        id="" aria-describedby="">
                </div>

                <button type="submit" class="btn btn-primary" id="">Thêm/Sửa</button>
            </form>

        </div>

    </div>
    <hr>
    <div class="row container" style="margin-top:30px">
        <div class="col-lg-12">
            <form action="/admin/article/search">
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
                        <th scope="col">Author</th>
                        <th scope="col">Created_at</th>
                        <th scope="col">Updated_at</th>
                        <th scope="col">Image</th>
                        <th scope="col">category</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($articles)
                        @foreach ($articles as $article)
                            <tr>
                                <th scope="row"> {{ $article->id }}</th>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->content }}</td>
                                <td>{{ $article->author }}</td>
                                <td>{{ $article->created_at }}</td>
                                <td>{{ $article->updated_at }}</td>
                                <td> <img src="{{asset($article->image) }}" alt="no-image" style="width:60px"></td>
                                <td>{{ $article->category()->get()[0]['name'] }}</td>
                                <td>{{ $article->status }}</td>
                                <td>
                                    <form action="/admin/article/edit/{{ $article->id }}" method="post"> @csrf<button
                                            type="submit" class="btn btn-primary" id="changeAction">Edit</button> </form>
                                </td>

                            </tr>
                        @endforeach
                    @endisset
                </tbody>
            </table>
            <nav aria-label="...">

                <ul class="pagination">
                    <li class="page-item @if ($articles->currentpage() == 1) disabled @endif">
                        <a class="page-link" href="{{ $articles->previousPageUrl() }}">Previous</a>
                    </li>
                    @if ($articles->lastpage() <= 3)
                        @for ($i = 1; $i <= $articles->lastpage(); $i++)
                            <li class="page-item  @if ($articles->currentpage() == $i) active @endif"><a class="page-link"
                                    href="{{ $articles->url($i) }}">{{ $i }}</a></li>
                        @endfor
                    @else
                        @for ($i = 1; $i <= 3; $i++)
                            <li class="page-item  @if ($articles->currentpage() == $i) active @endif"><a class="page-link"
                                    href="{{ $articles->url($i) }}">{{ $i }}</a></li>
                        @endfor
                    @endif
                    <li class="page-item  @if ($articles->currentpage() == $articles->lastpage()) disabled @endif">
                        <a class="page-link" href="{{ $articles->nextPageUrl() }} "> Next</a>
                    </li>
                </ul>

            </nav>
        </div>
    </div>
@endsection
