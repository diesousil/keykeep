@extends('layouts.master')

@section('content')
    <x-groupTreeView :treeData="$groupsTree" />
    
@stop