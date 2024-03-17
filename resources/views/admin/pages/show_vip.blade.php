@extends('admin.layout.app')

@section('content')
@if ($vip)
<div class="row mb-1">
    <p class="col-sm-4 col-lg-2 fw-bold">Name:</p>
    <p class="col-sm-8 col-lg-10">{{ $vip->name }}</p>
</div>

<div class="row mb-1">
    <p class="col-sm-4 col-lg-2 fw-bold">Upgrade Amount:</p>
    <p class="col-sm-8 col-lg-10">USDT {{ $vip->amount }}</p>
</div>

<div class="row mb-1">
    <p class="col-sm-4 col-lg-2 fw-bold">Orders per day:</p>
    <p class="col-sm-8 col-lg-10">{{ $vip->orders_per_day }}</p>
</div>

<div class="row mb-1">
    <p class="col-sm-4 col-lg-2 fw-bold">Number of Sets:</p>
    <p class="col-sm-8 col-lg-10">{{ $vip->sets }}</p>
</div>

<div class="row mb-1">
    <p class="col-sm-4 col-lg-2 fw-bold">Minimum Product Amount:</p>
    <p class="col-sm-8 col-lg-10">USDT {{ $vip->min_prod_amount }}</p>
</div>

<div class="row mb-1">
    <p class="col-sm-4 col-lg-2 fw-bold">Maximum Product Amount:</p>
    <p class="col-sm-8 col-lg-10">USDT {{ $vip->max_prod_amount }}</p>
</div>

<div class="row mb-1">
    <p class="col-sm-4 col-lg-2 fw-bold">Percentage Profit:</p>
    <p class="col-sm-8 col-lg-10">{{ $vip->percentage_profit }}%</p>
</div>

<div class="row mb-1">
    <p class="col-sm-4 col-lg-2 fw-bold">Description:</p>
    <ul class="col-sm-8 col-lg-10">
        @foreach (json_decode($vip->description) as $des)
        <li>{{ $des }}</li>
        @endforeach
    </ul>
</div>

<div class="row mb-1">
    <p class="col-sm-4 col-lg-2 fw-bold">Image:</p>
    <img src="{{ asset('uploads/images/vips/'. $vip->image) }}" alt="{{ $vip->name }}" class="img-fluid" srcset="">
</div>

<div class="row mt-3">
    <a href="{{ route('admin.vip.edit', $vip->slug) }}" class="btn col-1">
        <i class="fa fa-edit text-primary px-2" aria-hidden="true"></i>
    </a>                                                                                                                                                                                   
    <button type="button" class="btn col-1" data-toggle="modal" data-target="#delete">
        <i class="fa fa-trash text-danger px-2" aria-hidden="true"></i>
    </button>
</div>

<div class="modal fade" id="delete">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete VIP Level</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this VIP Level?
            </div>
            <div class="modal-footer">
                <form name="delete_form" action="{{ route('admin.vip.delete', $vip->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-success">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>


@else
<h3 class="my-5 mx-3">The VIP level you are requesting does not exist.</h3>
@endif


@endsection

