@extends('admin.layouts.layout')
@section('title-page', 'Quản lý tin nhắn khách hàng')
@section('active-contact-request','active')
@section('content')
 
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Danh sách chưa phản hồi</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Message</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Is response</th>

                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($contactRequestsHasNotRes)
                        @foreach ($contactRequestsHasNotRes as $contactRequest)
                            <tr>
                                <th scope="row"> {{ $contactRequest->id }}</th>
                                <td> {{ $contactRequest->name }}</td>
                                <td> {{ $contactRequest->email }}</td>
                                <td> {{ $contactRequest->subject }}</td>
                                <td> {{ $contactRequest->message }}</td>
                                <td> {{ $contactRequest->created_at }}</td>
                                <td>  @if (!$contactRequest->is_response)
                                    Chưa
                                @else
                                    Đã
                                @endif phản hồi</td>


                                <td>
                                    <form action="{{route('contact-request.update',['contact_request'=>$contactRequest->id])}}" method="post">
                                        @csrf
                                        @method('put') 
                                        <button type="submit" class="btn btn-primary" id="changeAction">
                                        Phản hồi
                                        </button> </form>
                                </td>

                            </tr>
                        @endforeach
                    @endisset
                </tbody>
            </table>
            <nav aria-label="...">
                @isset($contactRequestsHasNotRes)
                    <ul class="pagination">
                        <li class="page-item @if ($contactRequestsHasNotRes->currentpage() == 1) disabled @endif">
                            <a class="page-link" href="{{ $contactRequestsHasNotRes->previousPageUrl() }}">Previous</a>
                        </li>
                        @if ($contactRequestsHasNotRes->lastpage() <= 3)
                            @for ($i = 1; $i <= $contactRequestsHasNotRes->lastpage(); $i++)
                                <li class="page-item  @if ($contactRequestsHasNotRes->currentpage() == $i) active @endif"><a class="page-link"
                                        href="{{ $contactRequestsHasNotRes->url($i) }}">{{ $i }}</a></li>
                            @endfor
                        @else
                            @for ($i = 1; $i <= 3; $i++)
                                <li class="page-item  @if ($contactRequestsHasNotRes->currentpage() == $i) active @endif"><a class="page-link"
                                        href="{{ $contactRequestsHasNotRes->url($i) }}">{{ $i }}</a></li>
                            @endfor
                        @endif
                        <li class="page-item  @if ($contactRequestsHasNotRes->currentpage() == $contactRequestsHasNotRes->lastpage()) disabled @endif">
                            <a class="page-link" href="{{ $contactRequestsHasNotRes->nextPageUrl() }} "> Next</a>
                        </li>
                    </ul>
                @endisset
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Danh sách đã phản hồi</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Message</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Is response</th>
 
                    </tr>
                </thead>
                <tbody>
                    @isset($contactRequestsHasRes)
                        @foreach ($contactRequestsHasRes as $contactRequest)
                            <tr>
                                <th scope="row"> {{ $contactRequest->id }}</th>
                                <td> {{ $contactRequest->name }}</td>
                                <td> {{ $contactRequest->email }}</td>
                                <td> {{ $contactRequest->subject }}</td>
                                <td> {{ $contactRequest->message }}</td>
                                <td> {{ $contactRequest->created_at }}</td>
                                <td>  @if (!$contactRequest->is_response)
                                    Chưa
                                @else
                                    Đã
                                @endif phản hồi</td>
                            </tr>
                        @endforeach
                    @endisset
                </tbody>
            </table>
            <nav aria-label="...">
                @isset($contactRequestsHasRes)
                    <ul class="pagination">
                        <li class="page-item @if ($contactRequestsHasRes->currentpage() == 1) disabled @endif">
                            <a class="page-link" href="{{ $contactRequestsHasRes->previousPageUrl() }}">Previous</a>
                        </li>
                        @if ($contactRequestsHasRes->lastpage() <= 3)
                            @for ($i = 1; $i <= $contactRequestsHasRes->lastpage(); $i++)
                                <li class="page-item  @if ($contactRequestsHasRes->currentpage() == $i) active @endif"><a class="page-link"
                                        href="{{ $contactRequestsHasRes->url($i) }}">{{ $i }}</a></li>
                            @endfor
                        @else
                            @for ($i = 1; $i <= 3; $i++)
                                <li class="page-item  @if ($contactRequestsHasRes->currentpage() == $i) active @endif"><a class="page-link"
                                        href="{{ $contactRequestsHasRes->url($i) }}">{{ $i }}</a></li>
                            @endfor
                        @endif
                        <li class="page-item  @if ($contactRequestsHasRes->currentpage() == $contactRequestsHasRes->lastpage()) disabled @endif">
                            <a class="page-link" href="{{ $contactRequestsHasRes->nextPageUrl() }} "> Next</a>
                        </li>
                    </ul>
                @endisset
            </nav>
        </div>
    </div>
    
@endsection
