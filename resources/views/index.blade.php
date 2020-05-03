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
    @foreach ($ticket as $object)
        {{ $object->subject }}
        {{ $object->body }}
        {{ $object->status }}
        {{ $object->if_closed }}
        {{ $object->time }}
    @endforeach
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
