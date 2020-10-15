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
                        <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 50px;">Id</th>
                        <th class="jsgrid-header-cell jsgrid-align-left jsgrid-header-sortable" style="width: 150px;">Name</th>
                        <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 200px;">Description</th>
                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 200px;">Commands</th>
                    </tr>
                
                </table>
            </div>
            <div class="jsgrid-grid-body">
                <table class="jsgrid-table">
                    <tbody>
                      @foreach ($groups as $group)
                        @if($group->user_id == Auth::id('id'))
                          <tr class="jsgrid-row">
                              <td class="jsgrid-cell" style="width: 50px;">{{ $group->id }}</td>
                              <td class="jsgrid-cell jsgrid-align-left" style="width: 150px;">{{ $group->name }}</td>
                              <td class="jsgrid-cell jsgrid-align-left" style="width: 200px;">{{ $group->description }}</td>
                              <td class="jsgrid-cell jsgrid-align-center" style="width: 200px;">
                                <a href="http://keykeep.test/groups/edit?id={{ $group->id }}"  ><i class="fas fa-pen"></i></a>
                                  <a href="http://keykeep.test/groups/delete?id={{ $group->id }}" style="margin-left: 5px;" onclick='return confirm("Tem certeza de que deseja excluir este grupo?");' ><i class="fas fa-trash"></i></a> 
                                  
                              </td>
                          </tr>
                        @endif
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