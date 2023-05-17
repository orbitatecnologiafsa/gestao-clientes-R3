{{-- @if (Session::has('msg-success'))
    <span id="msg-success" class="alert alert-success mb-3">{!! Session::get('msg-success') !!} </span>
@endif
@if (Session::has('msg-error'))
    <span id="msg-error" class="alert alert-danger mb-3">{!! Session::get('msg-error') !!} </span>
@endif --}}

@push('javascript')
    <script>
        @php 
        if (Session::has('msg-error')){
        @endphp
        swal("Good job!", {!! Session::get('msg-error') !!}, "success");
        
        @php
        }
        @endphp
     
       
    </script>
@endpush
