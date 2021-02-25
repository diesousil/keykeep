@section('title', 'Create a User')
@extends('layouts.master')

@section('content')
  {{Form::open(['action'=>'GroupController@save'])}}
    {{ Form::token() }}

      <div class="form-group">
        <label for="inputName">Name</label>
        <input type="text" id="inputName" class="form-control" name="name">
      </div>

      <div class="form-group">
        <label for="inputName">Email</label>
        <input type="email" id="inputName" class="form-control" name="email">
      </div>

      <div class="form-group">
        <label for="inputDescription">Password</label>
        <input type="password" id="inputDescription" class="form-control" rows="4" name="password">
      </div>
                
      <input type="submit" value="Save" class="btn btn-success float-right" style="float: right;margin-left:10px">
      <a href="#" class="btn btn-secondary"  style="float: right;">Cancel</a>
                
  {{ Form::close() }}
@stop