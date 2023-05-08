@extends('admin.master')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endpush
@section('pageTitle')
    {{ $directory->slug }}
@endsection
@section('title')
    Edit {{ $directory->title }}
@endsection
@section('content')
    <div class="card p-2">
        <div class="container-fluid">
            <form action="/admin/directory/{{ $directory->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="title">Title Post</label>
                            <input type="text" class="form-control" name="title" value="{{ $directory->title }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="title">Author</label>
                            <input type="text" class="form-control" name="author" value="{{ Str::ucfirst($directory->author) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="category">Category</label>
                            <select class="form-control" name="category" id="" required>
                                <option value="{{ $directory->category_id }}">{{ Str::ucfirst($directory->category->name) }}</option>
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}"> {{ Str::ucfirst($item->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" id="summernote" required>{{ $directory->description }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4">
                            <img src="{{ asset('/storage'.'/'.$directory->thumbnail) }}" class="col-8" alt="">
                            <input type="hidden" name="oldImage" value="{{ $directory->thumbnail }}">
                        </div>
                        <div class="mb-4">
                            <label for="image">Update Thumbnail</label>
                            <input type="file" class="form-control" name="thumbnail" id="image" onchange="imgPreview()">
                        </div>
                        <img class="img-preview col-5 shadow rounded p-3" style="max-width: 50rem;">
                    </div>
                </div>
                <div class="mt-5 mb-3">
                    <button type="submit" class="btn btn-primary d-block ml-auto" onclick="javascript: return confirm('Update data {{ $directory->title }} ?')">Update</button>
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