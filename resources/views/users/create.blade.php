@extends('layouts.master')

@section('title', 'list')

@section('content')

<div class="wrapper">
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin: 0;">
    
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Group</h3>
            </div>
            <div class="card-body">
              <form method="POST" action="http://keykeep.test/users/save">
                {{ Form::token() }}
                <div class="form-group">
                  <label for="inputName">Nome</label>
                  <input type="text" id="inputName" class="form-control" name="name">
                </div>
                <div class="form-group">
                  <label for="inputName">Email</label>
                  <input type="email" id="inputName" class="form-control" name="email">
                </div>
                <div class="form-group">
                  <label for="inputDescription">password</label>
                  <input type="password" id="inputDescription" class="form-control" rows="4" name="password">
                </div>
                
                <input type="submit" value="Save" class="btn btn-success float-right" style="float: right;margin-left:10px">
                <a href="#" class="btn btn-secondary"  style="float: right;">Cancel</a>
                
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      <div class="row">
        <div class="col-12">
          
        </div>
      </div>
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