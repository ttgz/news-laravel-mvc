@extends('admin.layouts.layout')
@section('active-category', 'active')
@section('title-page', 'Quản lý danh mục bài viết')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if (session('success'))
                <div id="hien-an" class="bg-success" style="height:50px"> {{ session('success') }}</div>
            @endif

            <form id="formCategory" class=""
                action="@isset($category){{ route('category.update', ['category' => $category->id]) }} @endisset">
                @csrf
                @isset($category)
                    @method('put')
                @endisset
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
                    <select name="status" id="" class="form-control" >
                        <option value="1" @isset($category) @if($category->status==1) selected @endif @endisset>Hiển thị</option>
                        <option value="0" @isset($category) @if($category->status==0) selected @endif @endisset>Ẩn</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" id="">Thêm/Sửa</button>
            </form>

        </div>

    </div>
    <hr>
    <div class="row container" style="margin-top:30px">
        <div class="col-lg-12">
            <div class="input-group">
                <form action="{{ route('category.search') }}" method="get">
                    @csrf
                    @method('get')
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
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($categories)
                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row"> {{ $category->id }}</th>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->status==1?"Hiển thị":"Ẩn" }}</td>
                                <td>
                                    <form action="{{ route('category.edit', ['category' => $category->id]) }}" method="get">
                                        @csrf<button type="submit" class="btn btn-primary" id="changeAction">Edit</button>
                                    </form>

                                </td>
                                <td>
                                    <button type="submit" class="btn btn-primary delete-btn" id="changeAction"
                                        data-id={{ $category->id }}>Delete</button>
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
@section('script-ajax')
    {{-- <script>
        const deleteBtn = document.querySelectorAll('.delete-btn');
        deleteBtn.forEach((btn) => {
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
                    xhttp.open('delete', `/admin/category/${btn.dataset.id}?_token=${token}`)
                    xhttp.send();
                }
            }
        })
    </script> --}}
    <script>
        const url = new URL(window.location.href).pathname;
        const part = url.split('/');
        if (url === '/admin/' + part[2]) {
            const form = document.getElementById('formCategory');
            form.method = "POST";
        }
        if (url === '/admin/category/' + part[3] + '/edit') {
            const form = document.getElementById('formCategory');
            form.method = "POST";

        }
    </script>
    <script>
        const deleteBtn = document.querySelectorAll('.delete-btn');
        deleteBtn.forEach((btn) => {
            btn.onclick = () => {
                // const formConfirm = `<div class="card" style="width: 35rem; border:1px solid rgb(189, 184, 184); top:45%;left:45%; position: absolute;">
            //                         <div class="card-body">
            //                          <h5 class="card-title"> Danh mục này có 5 bài viết. Bạn có chắc chắn muốn xóa??</h5>
            //                          <button class="btn btn-danger" id="btn-delete-category">Xóa</button> <button class="btn btn-successfuly"> Không Xóa</button>
            //                         </div>
            //                     </div>`;
                fetch('/api/get-sum-post-of-category/' + btn.dataset.id)
                    .then((data) => data.text())
                    .then((data) => {
                        data = JSON.parse(data);
                        createFormConfirmElement(data);
                        const notDeleteBtn = document.getElementById('btn-denied-delete');
                        notDeleteBtn.onclick = () => {
                            notDeleteBtn.parentNode.remove();
                        }
                        const deleteBtn = document.getElementById('btn-delete-category');
                        deleteBtn.onclick = () => {
                            notDeleteBtn.parentNode.remove();
                            fetch('/api/get-captcha')
                                .then((data) => data.text())
                                .then((data) => {
                                    data = JSON.parse(data);
                                    createCaptchaForm(data);
                                    const btnConfirmDel = document.getElementById(
                                        'btn-confirm-delete');
                                    const btnDeniedDel = document.getElementById(
                                        'btn-denied-confirm-delete');
                                    btnConfirmDel.onclick = () => {
                                        const code = document.getElementById('captcha').value;
                                        const codeElement = document.getElementById('captcha');
                                        fetch(`/admin/category/${btn.dataset.id}?captcha=${code}&_token={{ csrf_token() }}`, {
                                                method: "DELETE"
                                            })
                                            .then((data) => data.text())
                                            .then((data) => {
                                                data = JSON.parse(data);
                                                if (data.status === 'fail') {
                                                    if (!document.getElementById(
                                                        'message')) {
                                                        let message = document
                                                            .createElement('h5');
                                                        message.classList.add('card-title');
                                                        message.textContent =
                                                            `${data.message}`;
                                                        message.style.color = "red";
                                                        message.id = "message";
                                                        let divCard = codeElement
                                                        .parentNode;
                                                        divCard.insertBefore(message,
                                                            codeElement);
                                                    }

                                                } else {
                                                    btnConfirmDel.parentNode.remove();
                                                    createMessageForm(data.message);
                                                    const btnOK = document.getElementById(
                                                        'btn-ok');
                                                    btnOK.onclick = () => {
                                                        btnOK.parentNode.remove();
                                                        btn.parentNode.parentNode
                                                            .remove();
                                                    }
                                                }
                                            })

                                    }
                                    btnDeniedDel.onclick = () => {
                                        btnConfirmDel.parentNode.remove();
                                    }
                                })

                        }

                    })



            }
        })

        function createFormConfirmElement(sumOfPosts) {
            let formConfirm = document.createElement('div');
            formConfirm.classList.add('card');
            let divOfFormConfirm = document.createElement('div');
            divOfFormConfirm.classList.add('card-body');
            let content = document.createElement('h5');
            content.classList.add('card-title');
            content.textContent = `Danh mục này có ${sumOfPosts.sum} bài viết. Bạn có chắc chắn muốn xóa??`;
            let btnDelete = document.createElement('button');
            btnDelete.classList.add('btn');
            btnDelete.classList.add('btn-danger');
            btnDelete.id = 'btn-delete-category';
            btnDelete.textContent = "Xóa";
            let btnDenied = document.createElement('button');
            btnDenied.classList.add('btn');
            btnDenied.classList.add('btn-successfully');
            btnDenied.textContent = "Không Xóa";
            btnDenied.id = "btn-denied-delete";
            let btnNotDelete = document.createElement('button');

            formConfirm.style.width = "40rem";
            formConfirm.style.border = "1px solid rgb(189, 184, 184)";
            formConfirm.style.top = "45%";
            formConfirm.style.left = "45%";
            formConfirm.style.position = "fixed";
            formConfirm.style.background = "white";
            formConfirm.appendChild(divOfFormConfirm);
            formConfirm.appendChild(content);
            formConfirm.appendChild(btnDelete);
            formConfirm.appendChild(btnDenied);
            document.querySelector('body').appendChild(formConfirm);
        }

        function createCaptchaForm(code) {
            let formConfirm = document.createElement('div');
            formConfirm.classList.add('card');
            let divOfFormConfirm = document.createElement('div');
            divOfFormConfirm.classList.add('card-body');
            let content = document.createElement('h5');
            content.classList.add('card-title');
            content.textContent = `Nhập captcha để xác nhận xóa!!!`;
            let captcha = document.createElement('h5');
            captcha.classList.add('card-title');
            captcha.textContent = `${code.captcha}`;
            let btnDelete = document.createElement('button');
            btnDelete.classList.add('btn');
            btnDelete.classList.add('btn-danger');
            btnDelete.id = 'btn-confirm-delete';
            btnDelete.textContent = "Xác nhận";
            let btnDenied = document.createElement('button');
            btnDenied.classList.add('btn');
            btnDenied.classList.add('btn-successfully');
            btnDenied.textContent = "Không Xóa";
            btnDenied.id = "btn-denied-confirm-delete";
            let btnNotDelete = document.createElement('button');
            let inputCode = document.createElement('input');
            inputCode.classList.add('form-control');
            inputCode.name = "captcha";
            inputCode.id = "captcha";
            formConfirm.style.width = "35rem";
            formConfirm.style.border = "1px solid rgb(189, 184, 184)";
            formConfirm.style.top = "45%";
            formConfirm.style.left = "45%";
            formConfirm.style.position = "fixed";
            formConfirm.style.background = "white";
            formConfirm.appendChild(divOfFormConfirm);
            formConfirm.appendChild(content);
            formConfirm.appendChild(captcha);
            formConfirm.appendChild(inputCode);
            formConfirm.appendChild(btnDelete);
            formConfirm.appendChild(btnDenied);
            document.querySelector('body').appendChild(formConfirm);
        }

        function createMessageForm(message) {
            let frm = document.createElement('div');
            frm.classList.add('card');
            let divOfFormConfirm = document.createElement('div');
            divOfFormConfirm.classList.add('card-body');
            let content = document.createElement('h5');
            content.classList.add('card-title');
            content.textContent = `${message}`;
            let btnOk = document.createElement('button');
            btnOk.classList.add('btn');
            btnOk.classList.add('btn-successfully');
            btnOk.textContent = "Đóng";
            btnOk.id = "btn-ok";

            frm.style.width = "35rem";
            frm.style.border = "1px solid rgb(189, 184, 184)";
            frm.style.top = "45%";
            frm.style.left = "45%";
            frm.style.position = "fixed";
            frm.style.background = "white";
            frm.appendChild(divOfFormConfirm);
            frm.appendChild(content);
            frm.appendChild(btnOk);
            document.querySelector('body').appendChild(frm);
        }
    </script>
@endsection
