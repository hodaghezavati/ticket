<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Database\Query\Builder;
?>
@extends('layouts.app')

@section('content')
<div class="container">
<!-- <a href="{{ url('/ticket/create') }}" class="btn btn-success">create a ticket</a> -->

    <div class="row justify-content-center">
    <?php 
    $userId = Auth::id();
    echo $userId."*****";
    // $ticket = DB::table('ticket')->where('user_id',$userId)->first();;
    $ticket = DB::select('select * from tickets where user_id = '.$userId);

    ?>


<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">موضوع</th>
      <th scope="col">متن</th>
      <th scope="col">اولویت</th>
      <th scope="col">وضغیت</th>
      <th scope="col">زمان</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($ticket as $object)
    <tr>
      <th scope="row"></th>
      <td>{{ $object->subject }}</td>
      <td> {{ $object->body }}</td>
      <td>{{ $object->status }}</td>
      <td>{{ $object->if_closed }}</td>
      <td>{{ $object->time }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
    <!-- @foreach ($ticket as $object)
        {{ $object->subject }}
        {{ $object->body }}
        {{ $object->status }}
        {{ $object->if_closed }}
        {{ $object->time }}
    @endforeach -->
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
