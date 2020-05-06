
@extends('user::layouts.master')

@section('content')
<div class="container" style="direction:rtl;">


    <div class="row justify-content-center">
<?php
$user_id= $_GET['id'];
$users = DB::select('select * from users where id='.$user_id);

//  print_r($users);
//  print_r ($users[0]);
    $level=[
        1 => 'ادمین',
        2 => 'کاربر',
     
    ];
    $str_lvl='lvl';
    $access=[
        1 => 'دیدن لیست کاربران',
        2 => 'ویرایش لیست کاربران',
     
    ];
?>
<div class="row justify-content-center mt-5">
<div class="card py-5" style="width: 38rem; ">
    <form method="POST" action="/user/store">
    {{ csrf_field() }}
@foreach ($level as $key => $node)
<div class="form-check" id="lvl">
  <input class="form-check-input" type="radio" name="lvl" data-name=" {{ $node }}" id="{{ $key }}" value="{{ $key }}" <?php if($users[0]->lvl ==$key) {echo 'checked';} ?> >
  <div class="clearfix"></div>
  <input  name="id" class="form-control d-none" placeholder="" value="{{$_GET['id']}}" style="display:none;">

  <label class="form-check-label" for="exampleRadios1">
   {{ $node }}
  </label>
</div>
@endforeach




</br>
<div class="d-block">
<button class="btn btn-success btn-submit float-right">ذخیره</button>
</div>
</div>
</div>
</form>     
</div>
</div>
@endsection
