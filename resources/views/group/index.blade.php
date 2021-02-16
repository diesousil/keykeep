@extends('layouts.master')

@section('title', 'list')

@section('content')

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


@stop