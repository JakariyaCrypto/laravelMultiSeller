@if(session()->has('success'))
<div class="alert  alert-success alert-dismissible fade show" role="alert" id="alert">
        <span>{{ session()->get('success') }}</span>
        
    </div>
@endif

@if(session()->has('warning'))
<div class="alert  alert-warning alert-dismissible fade show" role="alert" id="alert">
        <span>{{ session()->get('warning') }}</span>
        
    </div>
@endif