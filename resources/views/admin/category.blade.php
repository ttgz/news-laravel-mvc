@extends('admin.layouts.layout')
@section('active-category','active')
@section('title-page','Quản lý danh mục bài viết')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if (session('success'))
                <div id="hien-an" class="bg-success" style="height:50px"> {{ session('success') }}</div>
            @endif
            <form id="formCategory" class="" action="" method="post">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="" class="form-label">ID</label>
                    <input type="text" readonly name="id"
                        value="@isset($category){{ $category->id }}@endisset" class="form-control"
                        id="" aria-describedby="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Name Category</label>
                    <input type="text" name="name"
                        @isset($category) value="{{ $category->name }}" @endisset class="form-control"
                        id="" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Status</label>
                    <input type="text" name="status"
                        @if (isset($category)) value="{{ $category->status }}" @else value="1" @endif
                        class="form-control" id="">
                </div>
                <button type="submit" class="btn btn-primary" id="">Thêm/Sửa</button>
            </form>

        </div>

    </div>
    <hr>
    <div class="row container" style="margin-top:30px">
        <div class="col-lg-12">
            <div class="input-group">
                <form action="/admin/category/search">
                    @csrf
                    <div class="form-outline" data-mdb-input-init>
                        <input type="search" id="form1" name="key" class="form-control" />
                        <label class="form-label" for="form1">Search</label>
                    </div>
                    <button type="submit" class="btn btn-primary" data-mdb-ripple-init>
                        Search
                    </button>
                </form>

            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($categories)
                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row"> {{ $category->id }}</th>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->status }}</td>
                                <td>
                                    <form action="/admin/category/edit/{{ $category->id }}" method="post"> @csrf<button
                                            type="submit" class="btn btn-primary" id="changeAction">Edit</button> </form>
                                </td>

                            </tr>
                        @endforeach
                    @endisset
                </tbody>
            </table>
            <nav aria-label="...">

                <ul class="pagination">
                    <li class="page-item @if ($categories->currentpage() == 1) disabled @endif">
                        <a class="page-link" href="{{ $categories->previousPageUrl() }}">Previous</a>
                    </li>
                    @if ($categories->lastpage() <= 3)
                        @for ($i = 1; $i <= $categories->lastpage(); $i++)
                            <li class="page-item  @if ($categories->currentpage() == $i) active @endif"><a class="page-link"
                                    href="{{ $categories->url($i) }}">{{ $i }}</a></li>
                        @endfor
                    @else
                        @for ($i = 1; $i <= 3; $i++)
                            <li class="page-item  @if ($categories->currentpage() == $i) active @endif"><a class="page-link"
                                    href="{{ $categories->url($i) }}">{{ $i }}</a></li>
                        @endfor
                    @endif
                    <li class="page-item  @if ($categories->currentpage() == $categories->lastpage()) disabled @endif">
                        <a class="page-link" href="{{ $categories->nextPageUrl() }} "> Next</a>
                    </li>
                </ul>

            </nav>



        </div>
    </div>
@endsection
