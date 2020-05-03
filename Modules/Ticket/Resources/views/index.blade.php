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
<!-- @include('inc.messages') -->
@if (session()->has('success'))
    <div class="alert alert-dismissable alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>
            {!! session()->get('success') !!}
        </strong>
    </div>
@endif
<?php


$userId = Auth::id();
    $users = DB::select('select * from users where  id = '.$userId);

?>

<div >
<?php
if($users[0]->lvl==1){
    $n=0;
    $q = DB::select('select * from tickets ');
    foreach ($q as $object){
        if(empty($object->ticket_id ) and $object->if_closed==0 ){
            $n++;
        }
    }   
}
?>

</div>
    <div class="row justify-content-center">
    <span class="badge badge-info  mb-3 justify-content-center"><h5>شما <?php echo $n ;?> تیکت پاسخ نداده دارید</h5></span>

    <?php 
    
    
    // $ticket = DB::table('ticket')->where('user_id',$userId)->first();;
    // $ticket =DB::table('tickets')
              
    //           ->where('user_id', $userId);
    if($users[0]->lvl!=1){
    $ticket = DB::select('select * from tickets where  user_id = '.$userId);
    }elseif($users[0]->lvl==1){
        $ticket = DB::select('select * from tickets ');
    }
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
        
        <th scope="col">اولویت</th>
        <th scope="col">وضعیت</th>
     
    </tr>
  </thead>
  <tbody>
  @foreach ($ticket as $object)
    @if(empty($object->ticket_id ))
    <tr>
<td><?php if($users[0]->lvl==1){ ?><a href="{{ url('/ticket/answer?id='.$object->id) }}" class="btn btn-info">بیشتر</a><?php } ?></td>
        <td>{{ $object->subject }}</td>
      
        <td>{{ $arr_priority[$object->status]  }}</td>
        <td><span class="badge " style="background-color:<?=$color_status[$object->if_closed ]?>">{{ $arr_status[$object->if_closed ]}}</span></td>
       
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
