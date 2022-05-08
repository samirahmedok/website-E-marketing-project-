@extends('layouts2.master')
@section('title','Category Table,Control-panel')

@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('admin_assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('admin_assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('admin_assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('admin_assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('admin_assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('admin_assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection

@section('content')
    
<!-- row opened -->
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">Category</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                <p class="tx-12 tx-gray-500 mb-2">Categories Table</p>
            </div>
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
            <div class="card-body">
<div class="table-responsive" style="margin-top:10px">
<table style="text-align: center" class="table text-md-nowrap" id="example1">
    <thead>
        <tr>
            <th class="wd-15p border-bottom-0">Id</th>
            <th class="wd-15p border-bottom-0">Name</th>
            <th class="wd-15p border-bottom-0">Image</th>
            <th class="wd-15p border-bottom-0">created at</th>
            <th class="wd-15p border-bottom-0">process</th>
            
        </tr>
    </thead>
    <tbody style="text-transform: uppercase">
       
            @foreach ($categories as $category)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$category->cat_name}}</td>
            <td><img class="img-fluid rounded" src="uploads/{{$category->image}}" alt="..." /></td>
            <td>{{$category->created_at}}</td>
            <td>
                <div class="dropdown" style="width: 100px;height:100px">
                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-secondary"
                    data-toggle="dropdown" id="dropdownMenuButton" type="button">Dropdown Menu <i class="fas fa-caret-down ml-1"></i></button>
                    <div  class="dropdown-menu tx-13">
                        <a class="dropdown-item" href="{{route('categories_delete',$category->id)}}">Delete <i style="float: left" class="fa fa-trash" aria-hidden="true"></i></a>
                        <a class="dropdown-item" href="{{route('categories_edit',$category->id)}}">Edit<i style="float: left" class="fas fa-edit"></i></a>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
</tbody>
</table>
</div>
<button data-toggle="modal" data-target="#ModalAddForm" class="btn btn-primary form-control"
 style="margin-top:5px;font-size:20px;text-shadow: 2px 0px 2px black;font-weight:bold;color:green">ADD</button>

 {{-- Add Modal --}}
<!-- Modal HTML Markup -->
<div id="ModalAddForm" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Add Product</h1>
            </div>
            <div class="modal-body">
                <h1>Adding New Product</h1>
                <form role="form" method="post" action="{{route('categories.store')}}" enctype="multipart/form-data">
                
                    {{ csrf_field() }}
                    
                    <input type="hidden" name="csrf_token" value="">
                    <div class="form-group">
                        <label class="control-label">Name</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="name" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Image</label>
                        <div>
                            <input type="file" class="form-control input-lg" name="image" id="image"
                            accept=".gif,.pdf,.jpg, .png, image/jpeg, image/png">
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
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
</div>
</div>
</div>

@endsection

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