@if($alert = session()->pull('alert'))
    <div class="alert alert-success mb-0 py-2 small rounded-0 text-center">
        {{$alert}}
    </div>
@endif
