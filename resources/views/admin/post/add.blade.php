@extends('admin.layouts.layout')
@section('title-page','quản lí bài viết')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <form id="formpost" action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="" class="form-label">ID</label>
                <input type="text" readonly name="id"
                    value="@isset($post){{ $post->id }}@endisset" class="form-control"
                    id="" aria-describedby="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Title</label>
                <input type="text" name="title"
                    value="@isset($post){{ $post->title }}@endisset" class="form-control"
                    id="" aria-describedby="">
            </div>
           
            <div class="mb-3" >
                <label for="" class="form-label">Content</label>
                <textarea  name="content" id="editor"   style="height:500px; width: 100%;display:block">
                    @isset($post){{ $post->content }}@endisset
                 </textarea>
            </div>
            <div class="mb-3" >
                <label for="" class="form-label">Sumary Content</label>
                <input type="text" name="summary-content" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Author</label>
                <input type="text" name="author"
                    value="@isset($post){{ $post->author }}@endisset" class="form-control"
                    id="" aria-describedby="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">created at</label>
                <input type="text" name="created_at" disabled
                    value="@isset($post){{ $post->created_at }}@endisset" class="form-control"
                    id="" aria-describedby="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">updated_at</label>
                <input type="text" name="updated_at" readonly
                    value="@isset($post){{ $post->updated_at }}@endisset " class="form-control"
                    id="updated_at" aria-describedby="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Image</label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="select-image" id="select-image">
                    <option value="url" selected>URL</option>
                    <option value="upload">Upload</option>
                     
                </select>
                  
                   
                <input type="text" name="image"
                    value="@isset($post){{ $post->image }}@endisset" class="form-control"
                    id="image" aria-describedby="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">category</label>
                <select name="category" id="" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            @isset($post)@if ($category->id == $post->category) selected @endif @endisset>
                            {{ $category->name }}</option>
                    @endforeach
                </select>

            </div>
            <div class="mb-3">
                <label for="" class="form-label">Status</label>
                <select name="status" id="" class="form-control">
                    <option value="1" >Hiển thị</option>
                    <option value="0">Ẩn</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary" id="">Thêm</button>
        </form>

    </div>

</div>
<hr>
@endsection

@section('script')
<script src="{{ asset('/assets/vendor/ckeditor5/ckeditor5.js') }}"></script>
<script type="importmap">
    {
        "imports": {
            "ckeditor5": "{{asset('/assets/vendor/ckeditor5/ckeditor5.js')}}",
            "ckeditor5/": "{{asset('/assets/vendor/ckeditor5')}}"
        }
    }
</script>
<script type="module">
    import {
        ClassicEditor,
        Essentials,
        Paragraph,
        Bold,
        Italic,
        Font,
        Image,
        ImageUpload,
 
    } from 'ckeditor5';

    ClassicEditor
        .create(document.querySelector('#editor'), {
            height: '300px',
            width: '800px',
            plugins: [Essentials, Paragraph, Bold, Italic, Font, Image, ImageUpload],
            toolbar: [
                'undo', 'redo',
                '|', 'bold', 'italic',
                '|', 'uploadImage',
                '|', 'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
            ],
           

        })
        .then(editor => {
            window.editor = editor;
        })
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    const selectImage = document.getElementById('select-image');
    selectImage.onchange = () =>{
        if(selectImage.value==="url")
            document.getElementById('image').type="text";
        else
            document.getElementById('image').type="file";
    }
</script>
@endsection
