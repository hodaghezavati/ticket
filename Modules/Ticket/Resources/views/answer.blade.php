<?php

namespace Modules\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Query\Builder;
use Modules\Ticket;
// use App\Ticket;
?>
@extends('layouts.app')

@section('content')
<div class="container " >
    <div class="row justify-content-center py-5">

       

            <?php $t_id = Auth::id();
            $ticket = DB::select('select * from tickets where id = '.$t_id);
            // print_r($ticket);
            $user_id=$ticket[0]->user_id;
            // echo $user_id;
            $users = DB::select('select * from users where id = '.$user_id);
            $user_name=$users[0]->name;
            ?>
            <div class="card " style="width: 38rem; " >
            <div class="card-body ">
                <h5 class="card-title text-right">
                                {{$user_name}}
                                نام کاربر:      </h5>
                <h6 class="card-subtitle mb-2 text-right">موضوع:
                                {{$ticket[0]->subject}}</h6>
                <p class="card-text text-right">
                                {{$ticket[0]->body}}
                                متن:</p>
            
            </div>
            </div>

            
            
        
    </div>


    <div class="row justify-content-center py-5">
   <?php $answer = DB::select('select * from tickets where ticket_id = '.$t_id);
   
   ?>
   @foreach ($answer as $object)
  <?php $user_id_an=$answer[0]->user_id;
    $users_an = DB::select('select * from users where id = '.$user_id_an);
    $user_name_an=$users_an[0]->name;
   ?>
      <div class="card mt-5" style="width: 38rem; " id=>
        <div class="card-body ">
            <h5 class="card-title text-right"> 
                                {{$user_name_an}}
                                نام کاربر: </h5>
                
                <p class="card-text text-right">
                                {{$object->body}}
                                متن: </p>
            
        </div>
    </div>
@endforeach
 




    <div class="row justify-content-center mt-5">
<div class="card py-5" style="width: 38rem; ">
    <form method="POST" action="/ticket/answersave">

  

{{ csrf_field() }}
<div class="form-group  px-5">

    

    <input  name="ticket_id" class="form-control d-none" placeholder="" value="{{$_GET['id']}}">

    <!-- @if ($errors->has('password'))

        <span class="text-danger">{{ $errors->first('password') }}</span>

    @endif -->

</div>

<div class="form-group  px-5">

    <label class="float-right">متن:</label>

    <textarea  name="body" class="form-control" placeholder=""></textarea>

    <!-- @if ($errors->has('password'))

        <span class="text-danger">{{ $errors->first('password') }}</span>

    @endif -->

</div>

<div class="form-group  px-5">

    <button class="btn btn-success btn-submit float-right">ثبت</button>

</div>

</form>     
</div>
</div>
</div>
@endsection
