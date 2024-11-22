@extends('admin.layouts.layout')
@section('title-page','Quản lý đăng ký')
@section('active-subcribe','active')
@section('content')
    <div class="row">
        
        <div class="col-lg-12">
            @if (session('success'))
                <div id="hien-an" class="bg-success" style="height:50px"> {{ session('success') }}</div>
            @endif

            
            <form id="formSubcribe" class="" action="@isset($subcribe){{route('subcribe.update',['subcribe'=>$subcribe->id])}} @endisset " method="post">
                @csrf
                @isset($subcribe) @method('put') @endisset
                <div class="mb-3">
                    <label for="" class="form-label">ID</label>
                    <input type="text" readonly name="id"
                        value="@isset($subcribe){{ $subcribe->id }}@endisset" class="form-control"
                        id="" aria-describedby="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Email Subcribe</label>
                    <input type="text" name="email"
                        @isset($subcribe) value="{{ $subcribe->email }}" @endisset class="form-control"
                        id="" aria-describedby="emailHelp">
                </div>
                 
                <button type="submit" class="btn btn-primary" id="">Thêm/Sửa</button>
            </form>

        </div>

    </div>
    <hr>
    <div class="row container" style="margin-top:30px">
        <div class="col-lg-12">
            <form action="{{route('subcribe.search')}}" method="get">
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
                        <th scope="col">Name Subcribe</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($subcribes)
                        @foreach ($subcribes as $subcribe)
                            <tr>
                                <th scope="row"> {{ $subcribe->id }}</th>
                                <td>{{ $subcribe->email }}</td>
                                <td>
                                    <form action="{{route('subcribe.edit',['subcribe'=>$subcribe->id])}}" method="get"> 
                                        @csrf
                                        <button type="submit" class="btn btn-primary" id="changeAction">Edit</button> 
                                    </form>
                                </td>
                                <td>
                                    <form action="{{route('subcribe.destroy',['subcribe'=>$subcribe->id])}}" method="post"> 
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-primary" id="changeAction">Delete</button> 
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    @endisset
                </tbody>
            </table>
            <nav aria-label="...">

                <ul class="pagination">
                    <li class="page-item @if ($subcribes->currentpage() == 1) disabled @endif">
                        <a class="page-link" href="{{ $subcribes->previousPageUrl() }}">Previous</a>
                    </li>
                    @if ($subcribes->lastpage() <= 3)
                        @for ($i = 1; $i <= $subcribes->lastpage(); $i++)
                            <li class="page-item  @if ($subcribes->currentpage() == $i) active @endif"><a class="page-link"
                                    href="{{ $subcribes->url($i) }}">{{ $i }}</a></li>
                        @endfor
                    @else
                        @for ($i = 1; $i <= 3; $i++)
                            <li class="page-item  @if ($subcribes->currentpage() == $i) active @endif"><a class="page-link"
                                    href="{{ $subcribes->url($i) }}">{{ $i }}</a></li>
                        @endfor
                    @endif
                    <li class="page-item  @if ($subcribes->currentpage() == $subcribes->lastpage()) disabled @endif">
                        <a class="page-link" href="{{ $subcribes->nextPageUrl() }} "> Next</a>
                    </li>
                </ul>

            </nav>
        </div>
    </div>
@endsection
