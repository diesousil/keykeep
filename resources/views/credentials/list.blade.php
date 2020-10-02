@extends('layouts.master')

@section('title', 'list')

@section('content')

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
                        <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 200px;">senha</th>
                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 200px;">Comandos</th>
                    </tr>
                
                </table>
            </div>
            <div class="jsgrid-grid-body">
                <table class="jsgrid-table">
                    <tbody>
                      @foreach ($Credentials as $Credentials)
                        <tr class="jsgrid-row">
                            <td class="jsgrid-cell" style="width: 50px;">{{ $Credentials->id }}</td>
                            <td class="jsgrid-cell jsgrid-align-left" style="width: 150px;">{{ $Credentials->title }}</td>
                            <td class="jsgrid-cell jsgrid-align-left" style="width: 200px;">{{ $Credentials->description }}</td>
                            <td class="jsgrid-cell jsgrid-align-left" style="width: 200px;">{{ $Credentials->password }}</td>
                            <td class="jsgrid-cell jsgrid-align-center" style="width: 200px;">
                                <input type="checkbox" disabled="">
                                <input type="checkbox" disabled="">
                            </td>
                        </tr>
                      @endforeach
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


@stop