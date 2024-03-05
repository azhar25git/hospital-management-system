@extends('layouts.admin')

@section('admin-content')
<section class="col-8">
    <h1 class="my-3 fw-bold">All Appointments</h1>
    <table class="table table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Specialty</th>
            <th>Room No.</th>
            <th>Image</th>
            <th colspan="2">Actions</th>
        </tr>
        @foreach($doctors as $doctor)
            <tr>
                <td> {{$doctor->id}} </td>
                <td> {{$doctor->name}} </td>
                <td> {{$doctor->phone}} </td>
                <td> {{$doctor->specialty}} </td>
                <td> {{$doctor->roomnum}} </td>
                <td> <img src="storage/doctorfiles/{{$doctor->image}}" alt="" class="thumbnail"> </td>
                <td> 
                        <a href="{{ url('add_doctor_view', ['id'=>$doctor->id])}}" class="btn-sm btn-outline-primary">Edit</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $doctors->links() }}
</section>
@endsection

@section('admin-scripts')
@endsection
