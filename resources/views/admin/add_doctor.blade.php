@extends('layouts.admin')

@section('admin-content')
    <form 
        action="{{ url('save_doctor') }}"
        enctype="multipart/form-data"
        method="POST"
        class="col-6 my-3 mx-auto border border-white p-4 rounded"
    >
        <h1 class="pb-2 mb-4 fw-bold border-bottom border-white">Add Doctor</h1>

        @csrf

        @if(isset($doctor))
            <input type="hidden" value="{{ $doctor->id }}" name="id" class="col-10 text-white bg-dark" id="id">
        @endif

        <div class="d-flex mb-4">
            <label class="col-2 p-2" for="name">Name</label>
            <input type="text" value="{{ $doctor->name ?? old('name') }}" name="name" class="col-10 text-white bg-dark" id="name"
                aria-describedby="nameHelp" placeholder="Enter name">
            <small id="nameHelp" class="form-text text-danger {{ $errors->has('name') ? '' : 'd-none' }}">Full name is
                required</small>
        </div>

        <div class="d-flex mb-4">
            <label class="col-2 p-2" for="phone">Phone</label>
            <input type="text" value="{{ $doctor->phone ?? old('phone') }}" name="phone" class="col-10 text-white bg-dark"
                id="phone" aria-describedby="phoneHelp" placeholder="Enter phone">
            <small id="phoneHelp" class="form-text text-danger {{ $errors->has('phone') ? '' : 'd-none' }}">Valid phone 10
                digit</small>
        </div>

        <div class="d-flex mb-4">
            <label class="col-2 p-2" for="roomnum">Room No.</label>
            <input type="text" value="{{ $doctor->roomnum ?? old('roomnum') }}" name="roomnum" class="col-10 text-white bg-dark"
                id="roomnum" aria-describedby="roomnumHelp" placeholder="Enter Room Number">
            <small id="roomnumHelp"
                class="form-text text-danger {{ $errors->has('roomnum') ? '' : 'd-none' }}">Required</small>
        </div>

        <div class="d-flex mb-4">
            <label class="col-2 p-2" for="specialty">Specialty</label>
            <select class="text-white bg-dark col-10" name="specialty" id="specialty">
                <option value>--SELECT--</option>
                <option value="ent" @if (($doctor->specialty ?? old('specialty')) && ($doctor->specialty ?? old('specialty')) == 'ent') selected @endif>ENT</option>
                <option value="cardiologist" @if (($doctor->specialty ?? old('specialty')) && ($doctor->specialty ?? old('specialty')) == 'cardiologist') selected @endif>Cardiologist</option>
                <option value="orthopedic" @if (($doctor->specialty ?? old('specialty')) && ($doctor->specialty ?? old('specialty')) == 'orthopedic') selected @endif>Orthopedic</option>
                <option value="skin" @if (($doctor->specialty ?? old('specialty')) && ($doctor->specialty ?? old('specialty')) == 'skin') selected @endif>Skin</option>
            </select>
            <small id="specialtyHelp"
                class="form-text text-danger {{ $errors->has('specialty') ? '' : 'd-none' }}">Required</small>
        </div>

        <div class="d-flex mb-4">
            <label class="col-2 p-2" for="image">Image</label>
            <input type="file" class="col-10 text-white bg-dark px-3 py-2" name="image" id="image"
                accept="image/png">
            <small id="imageHelp" class="form-text text-danger {{ $errors->has('image') ? '' : 'd-none' }}">Required</small>
        </div>
        @if(isset($doctor))
        <img src="storage/doctorfiles/{{$doctor->image}}" alt="" class="thumbnail">
        @endif

        <input type="submit" class="btn btn-primary btn-lg" value="Save Info">
    </form>
@endsection

@section('admin-scripts')
@endsection
