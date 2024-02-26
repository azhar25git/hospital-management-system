<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.head')
  </head>
  <body>
    <div class="container-scroller">
      {{-- @include('admin.banner') --}}
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        @include('admin.body')
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    @include('admin.scripts')
  </body>
</html>