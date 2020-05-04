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
<div class="container " style="direction:rtl;">
    <div class="row justify-content-center py-5">

       

          
            

            
            
        
    </div>


    <div class="row justify-content-center py-5">
   
 
 




    <div class="row justify-content-center mt-5">
<div class="card py-5" style="width: 38rem; ">
    <form method="GET" action="/ticket/track">

  

{{ csrf_field() }}


<div class="form-group  px-5">

    <label class="float-right"></label>

    <input type='text'  name="sh_paygiri" class="form-control" placeholder="شماره پیگیری تیکت خود را وارد نمایید">

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
