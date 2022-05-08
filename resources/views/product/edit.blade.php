@extends('layouts2.master')
@section('title','Products Edit')
    
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('admin_assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('admin_assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('admin_assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('admin_assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('admin_assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('admin_assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">



@endsection
<div class="container" style="padding: 10px">
    <div style='color:red'>
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>{{ $error }}</strong> 
        </div>
        @endforeach          
    </div>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>{{ session('success') }}</strong> 
    </div>
    @endif
@section('content')
    <fieldset>
        <legend>Product Editing</legend>
    
<form role="form" method="post" action="{{route('products_update')}}" enctype="multipart/form-data">
    {{-- {{ method_field('patch') }} --}}
    {{ csrf_field() }}
    
    <input type="hidden" name="id" value="{{$products->id}}">
    <div class="form-group">
        <label class="control-label">Name</label>
        <div>
            <input type="text" class="form-control input-lg" name="name" value="{{$products->name}}">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label">Description</label>
        <div>
            <input type="text" class="form-control input-lg" name="description" value="{{$products->description}}">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label">Price</label>
        <div>
            <input type="number" class="form-control input-lg" name="price" value="{{$products->price}}">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label">category</label>
        <div>
            <select name="category" class="form-control">
                <option value=" {{ $products->category->id }}">
                    {{ $products->category->cat_name }}
                </option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->cat_name}}</option>
                @endforeach
                
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label">Image</label>
        <div>
            <input type="file" class="form-control input-lg" name="image" id="image"
            accept=".gif,.pdf,.jpg, .png, image/jpeg, image/png" value="{{$products->image}}"><br>
            <img src="{{ asset('uploads/'.$products->image) }}" style="max-width: 200px">
        </div>
    </div>
    <div class="form-group">
        <div>
            <button type="submit" class="btn btn-success">
                Confirm
            </button>
        </div>
    </div>
</form>
</fieldset>
@endsection
</div>

@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('admin_assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('admin_assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('admin_assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('admin_assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('admin_assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('admin_assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('admin_assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('admin_assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('admin_assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('admin_assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('admin_assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('admin_assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('admin_assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('admin_assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('admin_assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('admin_assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('admin_assets/js/table-data.js')}}"></script>

@endsection