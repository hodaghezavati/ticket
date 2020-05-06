
@extends('user::layouts.master')

@section('content')
<div class="container" style="direction:rtl;">


    <div class="row justify-content-center">
<?php
$users = DB::select('select * from users ');
    $level=[
        1 => 'ادمین',
        2 => 'کاربر',
     
    ];
?>


<table class="table table-striped">
  <thead>
    <tr>
        <th scope='col'></th>
        <th scope="col">نام</th>
        <th scope="col">ایمیل</th>
        <th scope="col">سطح</th>
        
    </tr>
  </thead>
  <tbody>
  @foreach ($users as $object)
    <tr>
    <td scope='col'><a href="{{ url('/user/edit?id='.$object->id) }}" class="btn btn-info">ویرایش</a></td>
        <td> {{ $object->name }}</td>
        <td>{{ $object->email }}</td>
        @if ( $object->lvl==1)
        <td>ادمین</td>
        @endif
        @if ( $object->lvl==0)
        <td>کاربر</td>
        @endif
        
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>

@endsection
