@extends('layouts.admin')

@section('admin-content')
<section class="col-8">
    <h1 class="my-3 fw-bold">All Appointments</h1>
    <table class="table table-dark">
        <tr>
            <th>Patient Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Doctor</th>
            <th>Date</th>
            <th>Message</th>
            <th>Status</th>
            <th colspan="2">Actions</th>
        </tr>
        @foreach($appointments as $app)
            <tr>
                <td> {{$app->name}} </td>
                <td> {{$app->email}} </td>
                <td> {{$app->phone}} </td>
                @php
                    $doc = App\Models\Doctor::find($app->doctor_id);
                @endphp
                <td> {{$doc->name}} --- {{$doc->specialty}} </td>
                <td> {{$app->date}} </td>
                <td> {{$app->message}} </td>
                <td> {{$app->status}} </td>
                <td class="d-flex"> 
                    @if($app->status != 'approved')
                        <a href="{{ url('approve_appointment', $app->id)}}" class="btn-sm btn-outline-success">Approve</a>
                    @endif
                    @if($app->status != 'disapproved')
                        <a href="{{ url('disapprove_appointment', $app->id)}}" class="btn-sm btn-outline-danger">Disapprove</a>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
    {{ $appointments->links() }}
</section>
@endsection

@section('admin-scripts')
@endsection
