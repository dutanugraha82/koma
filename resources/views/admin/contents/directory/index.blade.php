@extends('admin.master')
@section('pageTitle')
    Directory
@endsection
@section('title')
    Directory
@endsection
@section('content')
<div class="container-fluid">
    <div class="card p-2">
        <div class="my-3">
            <a href="{{ route('directory.create') }}" class="btn btn-primary">Create <sup>+</sup></a>
        </div>
        <table id="directory-table" class="table table-hover table-striped" style="width: 100%;">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Updated at</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection
@push('js')
<script type="text/javascript">
    $(function (){
        let table = $('#directory-table').DataTable({
            processing:true,
            serverSide:true,
            responsive:{
                details:{
                    type:'column'
                }
            },
            columnDefs:[{
                className:'dtr-control',
                orderable:false,
                targets:0
            }],
            ajax:"{{ route('directory.json') }}",
            columns: [
                {data: 'DT_RowIndex'},
                {data: 'title', name: 'title'},
                {data: 'category', name: 'category'},
                {data: 'created_at', name: 'created_at'},
                {data: 'updated_at', name: 'updated_at'},
                {data: 'action', name: 'action'},
            ]
        });
    });
</script>
    
@endpush