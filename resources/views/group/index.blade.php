@extends('layouts.master')

@section('title', 'list')

@section('content')
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | jsGrid</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../public/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jsGrid -->
  <link rel="stylesheet" href="../../public/plugins/jsgrid/jsgrid.min.css">
  <link rel="stylesheet" href="../../public/plugins/jsgrid/jsgrid-theme.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../public/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin: 0;">
    
    <!-- Main content -->
    <section class="content">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
          <div id="jsGrid1">
            <div class="jsgrid-grid-header jsgrid-header-scrollbar">
                <table class="jsgrid-table">
                    <tr class="jsgrid-header-row">
                        <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 50px;">Codigo</th>
                        <th class="jsgrid-header-cell jsgrid-align-left jsgrid-header-sortable" style="width: 150px;">Nome</th>
                        <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 200px;">Descrição</th>
                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 200px;">Comandos</th>
                    </tr>
                
                </table>
            </div>
            <div class="jsgrid-grid-body">
                <table class="jsgrid-table">
                    <tbody>
                        <tr class="jsgrid-row">
                            <td class="jsgrid-cell" style="width: 50px;">2</td>
                            <td class="jsgrid-cell jsgrid-align-left" style="width: 150px;">José</td>
                            <td class="jsgrid-cell jsgrid-align-left" style="width: 200px;">dfnfgbfbhlghsabcvsbbiyhsaiosampiofgiojjoiroijvfskm</td>
                            <td class="jsgrid-cell jsgrid-align-center" style="width: 200px;">
                                <input type="checkbox" disabled="">
                                <input type="checkbox" disabled="">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.2
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jsGrid -->
<script src="../../public/plugins/jsgrid/demos/db.js"></script>
<script src="../../public/plugins/jsgrid/jsgrid.min.js"></script>
<!-- AdminLTE App -->
<script src="../../public/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../public/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#jsGrid1").jsGrid({
        height: "100%",
        width: "100%",
 
        sorting: true,
        paging: true,
 
        data: db.clients,
 
        fields: [
            { name: "Name", type: "text", width: 150 },
            { name: "Age", type: "number", width: 50 },
            { name: "Address", type: "text", width: 200 },
            { name: "Country", type: "select", items: db.countries, valueField: "Id", textField: "Name" },
            { name: "Married", type: "checkbox", title: "Is Married" }
        ]
    });
  });
</script>
</body>
</html>

@stop