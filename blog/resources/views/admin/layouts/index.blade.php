<!DOCTYPE html>
<html lang="en">

@include('admin.layouts.style')

<body class="">
  <div class="wrapper ">
    @include('admin.layouts.sidebar')
    <div class="main-panel">
      @include('admin.layouts.navbar')
      <div class="content">
        <div class="container-fluid">
          @yield('content')
        </div>
      </div>
      @include('admin.layouts.footer')
    </div>
  </div>

  @include('admin.layouts.script')
</body>

</html>
