
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


@foreach ($level as $key => $node)
<div class="form-check" id="lvl">
  <input class="form-check-input" type="radio" name="lvl" data-name=" {{ $node }}" id="{{ $key }}" value="{{ $key }}" <?php if($users[0]->lvl ==$key) {echo 'checked';} ?> >
  <div class="clearfix"></div>

  <label class="form-check-label" for="exampleRadios1">
   {{ $node }}
  </label>
</div>
@endforeach




</br>
<div class="d-block">
<a href="{{ url('/user/save/'.$user_id) }}" class="btn btn-success">ذخیره</a>
</div>
</div>
</div>

@endsection
