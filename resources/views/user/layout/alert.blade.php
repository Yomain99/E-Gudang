<div class="container">
@if (session('success'))
<div class="alert alert-success" role="alert">
    {{session('success')}}
</div>
    
@endif

@if (session('fail'))
<div class="alert alert-danger" role="alert">
    {{session('fail')}}
</div>
    
@endif
</div>