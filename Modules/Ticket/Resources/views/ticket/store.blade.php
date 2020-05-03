<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Database\Query\Builder;
?>
@extends('layouts.app')

@section('content')
<div class="container">
<a href="{{ url('/ticket/create') }}" class="btn btn-success">create a ticket</a>

    <div class="row justify-content-center">
    <?php 
    $userId = Auth::id();
    // $ticket = DB::table('ticket')->where('user_id',$userId)->first();;
    $ticket = DB::select('select * from ticket where user_id = '.$userId);

    ?>
    @if(count($errors)>0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif 

@if(session('success'))
  
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    
@endif 

@if(session('error'))
  
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
    
@endif 
    <!-- <ul>
        <li>
          
        <li>
        <li>
           
        <li>
        <li>
            
        <li>
        <li>
           
        <li>
    </ul> -->
    </div>
</div>
@endsection
