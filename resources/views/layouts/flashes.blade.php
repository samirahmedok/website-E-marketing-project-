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

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error')  }}
    </div>
@endif