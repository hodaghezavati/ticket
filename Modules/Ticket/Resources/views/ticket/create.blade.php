<?php

namespace Modules\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use Illuminate\Database\Query\Builder;
use Modules\Ticket;
// use App\Ticket;
?>
@extends('layouts.app')

@section('content')
<div class="container" style="direction:rtl;">
    <div class="row justify-content-center">

<div class="col-md-8 ">
<div class="card py-3">
                       
<form method="POST" action="/ticket/store">

  

            {{ csrf_field() }}

  

            <div class="form-group  px-5">

                <label class="float-right">موضوع:</label>

                <input type="text" name="subject" class="form-control" placeholder="موضوع">

                <!-- @if ($errors->has('name'))

                    <span class="text-danger">{{ $errors->first('name') }}</span>

                @endif -->

            </div>

   

            <div class="form-group  px-5">

                <label class="float-right">متن:</label>

                <textarea  name="body" class="form-control" placeholder="متن"></textarea>

                <!-- @if ($errors->has('password'))

                    <span class="text-danger">{{ $errors->first('password') }}</span>

                @endif -->

            </div>

    

            <div class="form-group  px-5">
            <label class="float-right">نوع تیکت:</label>
                

                <select name="status" class="form-control">
                                <option value="1">فوری</option>
                                <option value="2">معمولی</option>
                                <option value="3">کم اهمیت</option>
                            </select>

                <!-- @if ($errors->has('email'))

                    <span class="text-danger">{{ $errors->first('email') }}</span>

                @endif -->

            </div>

   

            <div class="form-group  px-5">

                <button class="btn btn-success btn-submit float-right">ثبت</button>

            </div>

        </form>
        </div>
        </div>
        </div>
        </div>
        </div>
@endsection
