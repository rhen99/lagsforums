@if (session('error'))
    <div class="flash flash-error">
        {{session('error')}}
    </div>
@endif
@if (session('success'))
    <div class="flash flash-success">
        {{session('success')}}
    </div>
@endif