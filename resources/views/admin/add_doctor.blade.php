<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.head')
  </head>
  <body>
    <div class="container-scroller">
      @include('admin.banner')
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper mt-5">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="container mt-5">
            @session('message')
                <div class="alert alert-success p-4" role="alert" id="alert">
                    {{ $value }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" id="alert-btn">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
            @endsession
            <form action="{{url('save_doctor')}}" enctype="multipart/form-data" method="POST" class="col-6 my-3 mx-auto border border-white p-4 rounded">
                @csrf
                <h1 class="pb-2 mb-4 fw-bold border-bottom border-white">Add Doctor</h1>
                
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" value="{{ old('name')}}" name="name" class="form-control text-white bg-dark" id="name" aria-describedby="nameHelp" placeholder="Enter name">
                  <small id="nameHelp" class="form-text text-danger {{ $errors->has('name') ? '' : 'd-none' }}">Full name is required</small>
                </div>

                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" value="{{ old('phone')}}" name="phone" class="form-control text-white bg-dark" id="phone" aria-describedby="phoneHelp" placeholder="Enter phone">
                  <small id="phoneHelp" class="form-text text-danger {{ $errors->has('phone') ? '' : 'd-none' }}">Valid phone 10 digit</small>
                </div>

                <div class="form-group">
                  <label for="roomnum">Room Number</label>
                  <input type="text" value="{{ old('roomnum')}}" name="roomnum" class="form-control text-white bg-dark" id="roomnum" aria-describedby="roomnumHelp" placeholder="Enter Room Number">
                  <small id="roomnumHelp" class="form-text text-danger {{ $errors->has('roomnum') ? '' : 'd-none' }}">Required</small>
                </div>

                <div class="form-group">
                    <label for="specialty">Specialty</label>
                    <select class="text-white bg-dark form-control" name="specialty" id="specialty">
                        <option value>--SELECT--</option>
                        <option value="ent" @if(old('specialty') && old('specialty') == 'ent') selected @endif>ENT</option>
                        <option value="cardiologist" @if(old('specialty') && old('specialty') == 'cardiologist') selected @endif>Cardiologist</option>
                        <option value="orthopedic" @if(old('specialty') && old('specialty') == 'orthopedic') selected @endif>Orthopedic</option>
                        <option value="skin" @if(old('specialty') && old('specialty') == 'skin') selected @endif>Skin</option>
                    </select>
                    <small id="specialtyHelp" class="form-text text-danger {{ $errors->has('specialty') ? '' : 'd-none' }}">Required</small>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control text-white bg-dark" name="image" id="image" accept="image/png">
                    <small id="imageHelp" class="form-text text-danger {{ $errors->has('image') ? '' : 'd-none' }}">Required</small>
                </div>
                
                <input type="submit" class="btn btn-primary btn-lg" value="Save Info">
              </form>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    @include('admin.scripts')
    <script>
        const elem = document.getElementById("alert-btn");
        if(elem) {
            elem.addEventListener("click", function(event) {
                this.parentElement.classList.toggle('d-none');
            });

        }
    </script>
  </body>
</html>