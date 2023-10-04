<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ $PageTitle }}</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

  
</head>
<style>

</style>

<body>
  <div class="container">
      <div class="row mt-5">
        <div class="col-md-6">
          <h3>Task Manager</h3>
        </div>
        <div class="col-md-6 text-right">
          <p>{{ session('name')}}</p>
          <a href="{{route('auth-logout-process') }}" class="btn btn-warning">Logout</a>
        </div>
      </div>
      @yield('main')
  </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  
  
  <!-- Sweet Alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://kit.fontawesome.com/416cc87537.js"></script>
  
  @yield('script')
</body>

</html>