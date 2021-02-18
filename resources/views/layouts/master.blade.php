<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title><?php echo config("app.name"); ?> | @section("title"){{$title}}@show</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo URL::to('/'); ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo URL::to('/'); ?>/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- jsGrid -->
  <link rel="stylesheet" href="<?php echo URL::to('/'); ?>/plugins/jsgrid/jsgrid.min.css">
  <link rel="stylesheet" href="<?php echo URL::to('/'); ?>/plugins/jsgrid/jsgrid-theme.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- customization -->
  <link rel="stylesheet" href="<?php echo URL::to('/'); ?>/css/customizations.css?v=<?php echo rand(0,10000000);?>">

</head>
<body class="hold-transition sidebar-mini @if(isset($actionIsList) && $actionIsList) list @endif">
<!-- Site wrapper -->
<div class="wrapper">
  @section('topbar')
    @include("layouts.topbar")
  @show
  @section('sidebar')
	  @include("layouts.sidebar")
  @show

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          
          <!--<div class="col-sm-6">
            <h1></h1>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Advanced Form</li>
            </ol>
          </div>
          -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="container-fluid">
      <div class="card card-default">
        
        <!-- /.card-header -->
        <div class="card-header">
            <h5 class="card-title">@section("title"){{$title}}@show</h5>
            
            <div class="card-tools">
              <!--<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>-->
              <!--<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>-->
            </div>
        </div>
        
        <!-- /.card-body -->
        <div class="card-body">
          @yield('content')
        </div>

        <div class="card-footer">
            
        </div>

        
      </div>
    </div>

      <!-- Default box -->
      <div class="card">
        
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  @section('footer')
	@include("layouts.footer")
  @show
  
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo URL::to('/'); ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo URL::to('/'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo URL::to('/'); ?>/js/adminlte.min.js"></script>
<!-- Keykeep Script -->
<script src="<?php echo URL::to('/'); ?>/js/keykeep.js"></script>

</body>
</html>