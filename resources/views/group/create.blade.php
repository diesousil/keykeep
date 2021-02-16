@extends('layouts.master')

@section('content')

  <form method="POST" action="<?php echo URL::to('/'); ?>/groups/save">
    {{ Form::token() }}

    <div class="form-group">
      <label for="inputName">Nome</label>
      <input type="text" id="inputName" class="form-control" name="name">
    </div>

    <div class="form-group">
      <label for="inputDescription">Description</label>
      <textarea id="inputDescription" class="form-control" rows="4" name="description"></textarea>
    </div>

    <div class="form-group">
      <label>Parent Group</label>
      <select class="form-control" name="parent_id">
        <option value="0"> - This is a root group -</option>
        @foreach ($parentGroups as $group)
          <option value="{{ $group->id }}"> {{ $group->name }}</option>
        @endforeach
      </select>
    </div>

    <input type="submit" value="Save" class="btn btn-success float-right">
    <a href="#" class="btn btn-secondary">Cancel</a>
    
  </form>
@stop