@extends('layouts.master')
@section('title', 'Welcome, these are the news:')

@section('content')
    <x-groupTreeView :treeData="$groupsTree" />    
@stop