@extends('admin.layouts.layout')
@section('title-page','Quản lý quảng cáo')
@section('active-ad','active')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if (session('success'))
                <div id="hien-an" class="bg-success" style="height:50px"> {{ session('success') }}</div>
            @endif
            <form id="formAd" class="" action="@isset($advertisement){{route('advertisement.update',['advertisement'=>$advertisement->id])}} @endisset" method="post">
                @csrf
                @isset($advertisement) @method('put') @endisset
                <div class="mb-3">
                    <label for="" class="form-label">ID</label>
                    <input type="text" readonly name="id"
                        value="@isset($advertisement){{ $advertisement->id }}@endisset" class="form-control"
                        id="" aria-describedby="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Content</label>
                    <input type="text" name="content"
                        @isset($advertisement) value="{{ $advertisement->content }}" @endisset class="form-control"
                        id="" aria-describedby="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Published at</label>
                    <input type="text" name="published_at"
                        @isset($advertisement) value="{{ $advertisement->published_at }}" @endisset class="form-control"
                        id="" aria-describedby="emailHelp" readonly>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Image</label>
                    <input type="text" name="image"
                        @isset($advertisement) value="{{ $advertisement->image }}" @endisset class="form-control"
                        id="" aria-describedby="" >
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Status</label>
                    <input type="text" name="status"
                        @isset($advertisement) value="{{ $advertisement->status }}" @endisset class="form-control"
                        id="" aria-describedby="" >
                </div>

                <button type="submit" class="btn btn-primary" id="">Thêm/Sửa</button>
            </form>

        </div>

    </div>
    <hr>
    <div class="row container" style="margin-top:30px">
        <div class="col-lg-12">
            <form action="{{route('advertisement.search')}}" method="get">
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
                        <th scope="col">Content</th>
                        <th scope="col">Published At</th>
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($advertisements)
                        @foreach ($advertisements as $advertisement)
                            <tr>
                                <th scope="row"> {{ $advertisement->id }}</th>
                                <td>{{ $advertisement->content}}</td>
                                <td>{{ $advertisement->published_at}}</td>
                                <td> <img src="{{asset($advertisement->image)}}" alt="" style="width:60px"> </td>
                                <td>{{ $advertisement->status}}</td>
                                <td>
                                    <form action="{{route('advertisement.edit',['advertisement'=>$advertisement->id])}}" method="get"> @csrf<button
                                            type="submit" class="btn btn-primary" id="changeAction">Edit</button> </form>
                                </td>
                                <td>
                                    <form action="{{route('advertisement.destroy',['advertisement'=>$advertisement->id])}}" method="post"> 
                                        @csrf 
                                        @method("delete")
                                        <button type="submit" class="btn btn-primary" id="changeAction">Delete</button> </form>
                                </td>
                            </tr>
                        @endforeach
                    @endisset
                </tbody>
            </table>
            <nav aria-label="...">

                <ul class="pagination">
                    <li class="page-item @if ($advertisements->currentpage() == 1) disabled @endif">
                        <a class="page-link" href="{{ $advertisements->previousPageUrl() }}">Previous</a>
                    </li>
                    @if ($advertisements->lastpage() <= 3)
                        @for ($i = 1; $i <= $advertisements->lastpage(); $i++)
                            <li class="page-item  @if ($advertisements->currentpage() == $i) active @endif"><a class="page-link"
                                    href="{{ $advertisements->url($i) }}">{{ $i }}</a></li>
                        @endfor
                    @else
                        @for ($i = 1; $i <= 3; $i++)
                            <li class="page-item  @if ($advertisements->currentpage() == $i) active @endif"><a class="page-link"
                                    href="{{ $advertisements->url($i) }}">{{ $i }}</a></li>
                        @endfor
                    @endif
                    <li class="page-item  @if ($advertisements->currentpage() == $advertisements->lastpage()) disabled @endif">
                        <a class="page-link" href="{{ $advertisements->nextPageUrl() }} "> Next</a>
                    </li>
                </ul>

            </nav>
        </div>
    </div>
@endsection
