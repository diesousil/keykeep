@extends('layouts.master')

@section('title', 'list')

@section('content')

<div id="jsGrid1">
  <div class="jsgrid-grid-header">
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
                      <a href="<?php echo URL::to('/'); ?>/groups/edit?id={{ $group->id }}"  ><i class="fas fa-pen"></i></a>
                        <a href="<?php echo URL::to('/'); ?>/groups/delete?id={{ $group->id }}" style="margin-left: 5px;" onclick='return confirm("Tem certeza de que deseja excluir este grupo?");' ><i class="fas fa-trash"></i></a> 
                        
                    </td>
                </tr>
              @endif
            @endforeach
          </tbody>
      </table>
  </div>

</div>

@stop