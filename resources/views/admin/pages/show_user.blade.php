@extends('admin.layout.app')

@section('content')
@if ($user)
<div class="row mb-1">
    <p class="col-sm-4 col-lg-2 fw-bold">Name:</p>
    <p class="col-sm-8 col-lg-10">{{ $user->name }}</p>
</div>

<div class="row mb-1">
    <p class="col-sm-4 col-lg-2 fw-bold">Username:</p>
    <p class="col-sm-8 col-lg-10">{{ $user->username }}</p>
</div>

<div class="row mb-1">
    <p class="col-sm-4 col-lg-2 fw-bold">Phone Number:</p>
    <p class="col-sm-8 col-lg-10">{{ $user->phone }}</p>
</div>

<div class="row mb-1">
    <p class="col-sm-4 col-lg-2 fw-bold">Available Balance:</p>
    <p class="col-sm-8 col-lg-10">USDT {{ number_format($user->available_balance, 2) }}</p>
</div>

<div class="row mb-1">
    <p class="col-sm-4 col-lg-2 fw-bold">Total Balance:</p>
    <p class="col-sm-8 col-lg-10">USDT {{ number_format($user->total_balance, 2) }}</p>
</div>

@php
    $date_joined = new DateTime($user->created_at);
    $date_joined = $date_joined->format('F d, Y');    
@endphp
<div class="row mb-1">
    <p class="col-sm-4 col-lg-2 fw-bold">Registration Date:</p>
    <p class="col-sm-8 col-lg-10">{{ $date_joined }}</p>
</div>

<div class="row mb-1">
    <p class="col-sm-4 col-lg-2 fw-bold">VIP Level:</p>
    <p class="col-sm-8 col-lg-10">{{ $user->vip->name }}</p>
</div>

<div class="row mb-1">
    <p class="col-sm-4 col-lg-2 fw-bold">Tasks Done Today:</p>
    <p class="col-sm-8 col-lg-10">{{ $user->today_task }} / {{ $user->vip->orders_per_day }}</p>
</div>

<div class="row mb-1">
    <p class="col-sm-4 col-lg-2 fw-bold">Overall Tasks Completed:</p>
    <p class="col-sm-8 col-lg-10">{{ $user->overall_task }}</p>
</div>

<div class="row mb-1">
    <p class="col-sm-4 col-lg-2 fw-bold">Profits Today:</p>
    <p class="col-sm-8 col-lg-10">USDT {{ number_format($user->today_profit, 2) }}</p>
</div>

<div class="row mb-1">
    <p class="col-sm-4 col-lg-2 fw-bold">Overall Profits:</p>
    <p class="col-sm-8 col-lg-10">USDT {{ number_format($user->overall_profit, 2) }}</p>
</div>



@else
<h3 class="my-5 mx-3">The user you are requesting does not exist.</h3>
@endif


@endsection

