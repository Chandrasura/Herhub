@extends('admin.layout.app')

@section('content')
<div class="row">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>{{ session('success') }}</strong>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>{{ session('error') }}</strong>
        </div>
    @endif

    <!-- left column -->
    <div class="col-md-6">
      <!-- general form elements -->
      <form action="{{ route('admin.deposit.store') }}" method="post">
        @csrf
        @method('post')
        <div class="mb-3">
            <label for="user">User</label>
            <select name="user" id="user" class="form-control">
                <option value="">Select user</option>
                @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ old('user') == $user->id ? 'selected' : "" }}>{{ $user->username }}</option>
                @endforeach
            </select>
            @error('user')
                <strong class="text-danger">{{ $message }}</strong>
            @enderror
        </div>
        <div class="mb-3">
            <label for="amount">Deposit Amount</label>
            <input type="number" id="amount" name="amount" value="{{ old('amount') }}" step="0.01" class="form-control">
            @error('amount')
                <strong class="text-danger">{{ $message }}</strong>
            @enderror
        </div>
        <input type="submit" class="btn btn-success" value="Deposit">
      </form>
    </div>
    <!--/.col (left) -->
    <!-- right column -->
    <div class="col-md-6">

    </div>
    <!--/.col (right) -->
  </div>
@endsection