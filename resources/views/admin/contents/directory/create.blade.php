@extends('admin.master')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endpush
@section('pageTitle')
    create-directory
@endsection
@section('title')
    Create New Post Directory
@endsection
@section('content')
    <div class="card p-2">
        <div class="container-fluid">
            <form action="{{ route('directory.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="title">Title Post</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="category">Category</label>
                            <select class="form-control" name="category" id="" required>
                                <option value="">--- Choose Category ---</option>
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}"> {{ Str::ucfirst($item->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                        <label for="description">Description</label>
                        <textarea  name="description" id="summernote" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="image">Input image</label>
                            <input type="file" class="form-control" name="image" id="image" onchange="imgPreview()" required>
                        </div>
                        <img class="img-preview shadow rounded p-3" style="max-width: 50rem;">
                    </div>
                </div>
                <div class="mt-5 mb-3">
                    <button type="submit" class="btn btn-primary d-block ml-auto">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $('#summernote').summernote({
        placeholder: "Description type here, please don't input image!",
        tabsize: 2,
        height: 100
      });
    </script>
    <script>
         function imgPreview()
        {
            const image = document.querySelector('#image');
            const imagePreview = document.querySelector('.img-preview');

            imagePreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent){
                imagePreview.src = oFREvent.target.result;
            }
        }
    </script>
@endpush