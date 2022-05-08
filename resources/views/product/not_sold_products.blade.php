@extends('layouts2.master')
@section('title','Products Table,Control-panel')
    
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('admin_assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('admin_assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('admin_assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('admin_assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('admin_assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('admin_assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection

@section('content')
    
<!-- row opened -->
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">Product</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                <p class="tx-12 tx-gray-500 mb-2">Products Table</p>
            </div>
            
            <div class="card-body">
<div class="table-responsive" style="margin-top:10px">
    
<table class="table text-md-nowrap" id="example1" style="text-align: center">
    <thead>
        <tr style="text-transform: capitalize">
            <th class="wd-15p border-bottom-0">id</th>
            <th class="wd-15p border-bottom-0">name</th>
            <th class="wd-25p border-bottom-0">category</th>
            <th class="wd-20p border-bottom-0">price</th>
            <th class="wd-15p border-bottom-0">description</th>
            <th class="wd-10p border-bottom-0">image</th>
            <th class="wd-10p border-bottom-0">Status</th>
            <th class="wd-10p border-bottom-0">created at</th>
            <th class="wd-10p border-bottom-0">process</th>            
        </tr>
    </thead>
    <tbody>
        
        @foreach ($products as $product)
        
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->category->cat_name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->description}}</td>
                <td><img class="img-fluid rounded" src="uploads/{{$product->image}}" alt="..." /></td>
                <td>
                    @if ($product->status == 'Not sold')
                        <span class="text-danger">{{$product->status}}</span>
                    @elseif($product->status == 'sold')
                        <span class="text-success">{{$product->status}}</span>
                    @else
                        <span class="text-warning">{{$product->status}}</span>
                    @endif
                </td>
                <td>{{$product->created_at->toDayDateTimeString()}}</td>
                <td>
                    <div class="dropdown" style="width: 100px;height:100px">
                        <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-secondary"
                        data-toggle="dropdown" id="dropdownMenuButton" type="button">Dropdown Menu <i class="fas fa-caret-down ml-1"></i></button>
                        <div  class="dropdown-menu tx-13">
                            <a class="dropdown-item" href="{{route('products_delete',$product->id)}}">Delete <i style="float: left" class="fa fa-trash" aria-hidden="true"></i></a>
                            <a class="dropdown-item" data-toggle="modal" data-target="#ModalStatusForm" data-product_id="{{$product->id}}" href="">Edit_Status<i style="float: left" class="fab fa-amazon-pay"></i></a>
                        </div>
                    </div>
                </td>
                
                
            </tr>
        @endforeach
        
</tbody>
</table>

</div>

</div>
</div>
</div>
</div>

@endsection
{{-- Status Modal --}}
<!-- Modal HTML Markup -->
<div id="ModalStatusForm" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Edit Status</h1>
            </div>
            <div class="modal-body">
                <h1>Edit Status</h1>
                <form role="form" method="post" action="{{route('products.status')}}" enctype="multipart/form-data">
                
                    {{ csrf_field() }}
                    
                    <input type="hidden" name="csrf_token" value="">
                    <div class="form-group">
                        <input type="hidden" id="product_id" name="id">
                        <label class="control-label">Status</label>
                        <div>
                            <select class="form-control" name="status">
                                <option value="sold">sold</option>
                                <option value="Not sold">Not sold</option>
                            </select>
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

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
	$("#ModalStatusForm").on("show.bs.modal" , function(event){
		$button = $(event.relatedTarget);
		$product_id = $button.data("product_id");
		$modal = $(this);
		$modal.find(".modal-body #product_id").val($product_id);
	})
</script>
@endsection