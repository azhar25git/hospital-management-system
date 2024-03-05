<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.partials.head')
  </head>
  <body>
    <div class="container-scroller">
      {{-- @include('admin.partials.banner') --}}
      <!-- partial:partials/_sidebar.html -->
      @include('admin.partials.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.partials.navbar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @session('message')
                    <div class="alert alert-success p-4" role="alert" id="admin-alert">
                        {{ $value }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close" id="alert-btn">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endsession
                @yield('admin-content')
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            @include('admin.partials.footer')
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

    <script>
        const elem = document.getElementById("admin-alert");
        if (elem) {
            elem.addEventListener("click", function(event) {
                this.parentElement.classList.toggle('d-none');
            });
    
        }
    </script>

    @include('admin.partials.scripts')

    {{-- page specific scripts --}}
    @yield('admin-scripts')

  </body>
</html>