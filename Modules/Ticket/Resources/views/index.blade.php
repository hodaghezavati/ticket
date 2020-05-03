<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Database\Query\Builder;
?>

@extends('layouts.app')

@section('content')
<div class="container" style="direction:rtl;">
<div class="row mb-4">
<a href="{{ url('/ticket/create') }}" class="btn btn-success float-right"> ثبت تیکت جدید </a>
</div>
    <div class="row justify-content-center">
    <?php 
    $userId = Auth::id();
    $users = DB::select('select * from users where  id = '.$userId);
    // $ticket = DB::table('ticket')->where('user_id',$userId)->first();;
    // $ticket =DB::table('tickets')
              
    //           ->where('user_id', $userId);
    $ticket = DB::select('select * from tickets where  user_id = '.$userId);
    $arr_priority=[
        1 => 'فوری',
        2 => 'معمولی',
        3 => 'کم اهمیت'
    ];
    $arr_status=[
        0 => 'خوانده نشده',
        1 => 'پاسخ داده',
        2 => 'در حال پیگیری',
        3 => 'بسته شده',
    ];
    $color_status=[
        0 => '#ffc107',
        1 => '#007bff',
        2 => '#28a745',
        3 => '#6c757d',
    ];
    // echo $date = Jalalian::forge('last sunday')->format('datetime');;
    ?>
    
    <table class="table table-striped">
  <thead>
    <tr>
    <th scope="col"></th>
        <th scope="col">موضوع</th>
        <th scope="col">متن</th>
        <th scope="col">اولویت</th>
        <th scope="col">وضعیت</th>
        <th scope="col">زمان</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($ticket as $object)
    @if(empty($object->ticket_id ))
    <tr>
<td><?php if($users[0]->lvl==1){ ?><a href="{{ url('/ticket/answer?id='.$object->id) }}" class="btn btn-info">بیشتر</a><?php } ?></td>
        <td>{{ $object->subject }}</td>
        <td> {{ $object->body }}</td>
        <td>{{ $arr_priority[$object->status]  }}</td>
        <td><span class="badge " style="background-color:<?=$color_status[$object->if_closed ]?>">{{ $arr_status[$object->if_closed ]}}</span></td>
        <td>{{ $object->created_at }}</td>
    </tr>
        @endif
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
