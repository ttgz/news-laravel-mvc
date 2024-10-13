@extends('admin.layouts.layout')
@section('title-page',"Quản lý thông tin liên hệ")
@section('active-contact','active')
@section('content')
<div class="row">
    <div class="col-lg-12">
        @if (session('success'))
            <div id="hien-an" class="bg-success" style="height:50px"> {{ session('success') }}</div>
        @endif
        <form id="" class="" action="/admin/contact/edit" method="post">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="" class="form-label">ID</label>
                <input type="text" readonly name="id"
                    value="@isset($contact){{ $contact->id }}@endisset" class="form-control"
                    id="" aria-describedby="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" name="name"
                    value="@isset($contact){{ $contact->name }}@endisset" class="form-control"
                    id="" aria-describedby="">
            </div>
             <div class="mb-3">
                <label for="" class="form-label">number phone</label>
                <input type="text" name="numberphone"
                    value="@isset($contact){{ $contact->numberphone }}@endisset" class="form-control"
                    id="" aria-describedby="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">email</label>
                <input type="email" name="email"
                    value="@isset($contact){{ $contact->email }}@endisset" class="form-control"
                    id="" aria-describedby="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">address</label>
                <input type="text" name="address"
                    value="@isset($contact){{ $contact->address }}@endisset" class="form-control"
                    id="" aria-describedby="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">link facebook</label>
                <input type="text" name="facebook"
                    value="@isset($contact){{ $contact->facebook }}@endisset" class="form-control"
                    id="" aria-describedby="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">About</label>
                <input type="text" name="about"
                    value="@isset($contact){{ $contact->about }}@endisset" class="form-control"
                    id="" aria-describedby="">
            </div>
             <div class="mb-3">
                <label for="" class="form-label">Logo</label>
                <input type="text" name="logo"
                    value="@isset($contact){{ $contact->logo }}@endisset" class="form-control"
                    id="" aria-describedby="">
            </div>
             
             
            <button type="submit" class="btn btn-primary" id="">Sửa</button>
        </form>

    </div>

</div>
<hr>
 
@endsection