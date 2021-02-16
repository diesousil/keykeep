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
              <h3 class="card-title">Edit Group</h3>
            </div>
            <div class="card-body">
              <form method="POST" action="http://keykeep.test/groups/save">
                {{ Form::token() }}
                <input type="hidden" name="id" value="{{ $resultedit->id }}">
                <div class="form-group">
                  <label for="inputName">Nome</label>
                  <input type="text" id="inputName" class="form-control" name="name" value="{{ $resultedit->name }}">
                </div>
                <div class="form-group">
                  <label for="inputDescription">Description</label>
                  <textarea id="inputDescription" class="form-control" rows="4" name="description">{{ $resultedit->description }}</textarea>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <!-- select -->
                    <div class="form-group">
                      <label>Select</label>
                      <select class="form-control" name="parent_id">
                        <option value="0"> - Base Group -</option>
                        @foreach ($select2 as $resultado)
                          @if($resultado->id != $resultedit->id )
                            <option value="{{ $resultado->id }}" 
                              @if($resultado->id == $resultedit->parent_id )
                              selected
                              @endif 
                             > {{ $resultado->name }}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                  </div>
                  
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