@extends('layouts.admin')

@section('admin-content')
<section class="col-8 my-5 mx-auto">
    <h1 class="my-3 fw-bold">My Appointments</h1>
    <table class="table table-dark">
        <tr>
            <th>Patient Name</th>
            <th>Doctor Name</th>
            <th>Date</th>
            <th>Message</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        @foreach($appointments as $app)
            <tr>
                <td> {{$app->name}} </td>
                @php
                    $doc = App\Models\Doctor::find($app->doctor_id);
                @endphp
                <td> {{$doc->name}} --- {{$doc->specialty}} </td>
                <td> {{$app->date}} </td>
                <td> {{$app->message}} </td>
                <td> {{$app->status}} </td>
                <td> 
                    <form action="{{ url('cancel_appointment', $app->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="Cancel" class="btn-sm btn-outline-danger">
                    </form>
            </td>
            </tr>
        @endforeach
    </table>
</section>
@endsection

@section('admin-scripts')
@endsection
