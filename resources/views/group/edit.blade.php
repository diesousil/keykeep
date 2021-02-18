@section('title', 'Edit "' . $groupToEdit->name  . '" Group' )
@extends('layouts.master')

@section('content')

  {{Form::open(['action'=>'GroupController@save'])}}
    {{ Form::token() }}
    
    <input type="hidden" name="id" value="{{ $groupToEdit->id }}">
    
    <div class="form-group">
      <label for="inputName">Nome</label>
      <input type="text" id="inputName" class="form-control" name="name" value="{{ $groupToEdit->name }}">
    </div>
    
    <div class="form-group">
      <label for="inputDescription">Description</label>
      <textarea id="inputDescription" class="form-control" rows="4" name="description">{{ $groupToEdit->description }}</textarea>
    </div>

    <div class="row">
      <div class="col-sm-6">
        <!-- select -->
        <div class="form-group">
          <label>Parent Group</label>
          <select class="form-control" name="parent_id">
            <option value="0"> - This is a root group -</option>
            @foreach ($allGroups as $groupItem)
              @if($groupToEdit->id != $groupItem->id )
                <option value="{{ $groupItem->id }}" 
                  @if($groupItem->id == $groupToEdit->parent_id )
                    selected
                  @endif 
                  > {{ $groupItem->name }}</option>
              @endif
            @endforeach
          </select>
        </div>
      </div>
      
    </div>
    <input type="submit" value="Save" class="btn btn-success float-right" style="float: right;margin-left:10px">
    <a href="#" class="btn btn-secondary"  style="float: right;">Cancel</a>
  {{ Form::close() }}
@stop