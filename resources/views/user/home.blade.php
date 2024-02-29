@extends('layouts.user')

@section('page_title')
Hospital Management System
@endsection

@section('page_content')

    @include('partials.hero')

    @include('partials.doctor')

    @include('partials.latest')

    @include('partials.appointment')

    {{-- @include('partials.banner') --}}

    

@endsection

@section('page_script')
    <script>
        const elem = document.getElementById("alert-btn-user");
        if(elem) {
            elem.addEventListener("click", function(event) {
                this.parentElement.classList.toggle('d-none');
            });

        }
    </script>
@endsection
