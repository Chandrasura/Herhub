@extends('admin.layout.app')

@section('content')
<div class="row">
    <form action="{{ route('admin.withdraw.minimum') }}" method="POST" class="col-sm-6 col-md-4">
        @csrf
        @method('put')
        <div>
            <label for="minimum_withdrawal" class="form-label">Minimum Withdrawal</label>
            <input type="number" id="minimum_withdrawal" name="minimum_withdrawal" value="{{ $minimum_withdrawal->value }}" class="form-control">
            @error('minimum_withdrawal')
                <strong class="text-danger">{{ $message }}</strong>
            @enderror
        </div>
        <input type="submit" class="mt-3 btn btn-success" value="Update">
    </form>
</div>

  <div class="row mt-5">
    <div class="col-12 card">
        <div class="card-header">
            <h3 class="card-title">Pending Withdrawal</h3>
        </div>

        <div class="card-body">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6"></div>
                    <div class="col-sm-12 col-md-6"></div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                            aria-describedby="example2_info">
                            <thead>
                                <tr>
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">Username
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Amount (USDT)
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Wallet Account Name
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Wallet Address
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Wallet Name
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Wallet Network
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Date placed
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($withdrawals as $withdraw)
                                @if ($withdraw->status == 'pending')
                                <tr class="odd">
                                    <td class="dtr-control sorting_1" tabindex="0">{{$withdraw->user->username}}</td>
                                    <td>{{$withdraw->amount}}</td>
                                    <td>{{$withdraw->user->wallet_account_name}}</td>
                                    <td>{{$withdraw->user->wallet_address}}</td>
                                    <td>{{$withdraw->user->wallet_name}}</td>
                                    <td>{{$withdraw->user->wallet_network}}</td>
                                    <td>{{ \Carbon\Carbon::parse($withdraw->created_at)->format('M. d, Y') }}</td>
                                    <td>
                                        <button type="button" class="btn" title="Approve Withdrawal" data-toggle="modal" data-target="#action_form" onclick="action('{{ $withdraw->id }}', 'Approve')">
                                            <i class="fa fa-check text-success px-2" aria-hidden="true"></i>
                                        </button>                                                                                           
                                        <button type="button" class="btn" title="Reject Withdrawal" data-toggle="modal" data-target="#action_form" onclick="action('{{ $withdraw->id }}', 'Reject')">
                                            <i class="fa fa-trash text-danger px-2" aria-hidden="true"></i>
                                        </button>
                                    </td>    
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">Username</th>
                                    <th rowspan="1" colspan="1">Amount (USDT)</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Wallet Account Name
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Wallet Address
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Wallet Name
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Wallet Network
                                    </th>
                                    <th rowspan="1" colspan="1">Date placed</th>
                                    <th rowspan="1" colspan="1">Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
  </div>

  <div class="row mt-5">
    <div class="col-12 card">
        <div class="card-header">
            <h3 class="card-title">Successful Withdrawal</h3>
        </div>

        <div class="card-body">
            <div id="successful_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6"></div>
                    <div class="col-sm-12 col-md-6"></div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="successful" class="table table-bordered table-hover dataTable dtr-inline"
                            aria-describedby="successful_info">
                            <thead>
                                <tr>
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="successful" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">Username
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="successful" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Amount (USDT)
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="successful" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Wallet Account Name
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="successful" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Wallet Address
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="successful" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Wallet Name
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="successful" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Wallet Network
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="successful" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Date placed
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($withdrawals as $withdraw)
                                @if ($withdraw->status == 'successful')
                                <tr class="odd">
                                    <td class="dtr-control sorting_1" tabindex="0">{{$withdraw->user->username}}</td>
                                    <td>{{$withdraw->amount}}</td>
                                    <td>{{$withdraw->user->wallet_account_name}}</td>
                                    <td>{{$withdraw->user->wallet_address}}</td>
                                    <td>{{$withdraw->user->wallet_name}}</td>
                                    <td>{{$withdraw->user->wallet_network}}</td>
                                    <td>{{ \Carbon\Carbon::parse($withdraw->created_at)->format('M. d, Y') }}</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">Username</th>
                                    <th rowspan="1" colspan="1">Amount (USDT)</th>
                                    <th class="sorting" tabindex="0" aria-controls="successful" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Wallet Account Name
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="successful" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Wallet Address
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="successful" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Wallet Name
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="successful" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Wallet Network
                                    </th>
                                    <th rowspan="1" colspan="1">Date placed</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
  </div>


  <div class="row mt-5">
    <div class="col-12 card">
        <div class="card-header">
            <h3 class="card-title">Rejected Withdrawal</h3>
        </div>

        <div class="card-body">
            <div id="rejected_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6"></div>
                    <div class="col-sm-12 col-md-6"></div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="rejected" class="table table-bordered table-hover dataTable dtr-inline"
                            aria-describedby="rejected_info">
                            <thead>
                                <tr>
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="rejected" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">Username
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="rejected" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Amount (USDT)
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="rejected" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Wallet Account Name
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="rejected" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Wallet Address
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="rejected" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Wallet Name
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="rejected" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Wallet Network
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="rejected" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Date placed
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($withdrawals as $withdraw)
                                @if ($withdraw->status == 'rejected')
                                <tr class="odd">
                                    <td class="dtr-control sorting_1" tabindex="0">{{$withdraw->user->username}}</td>
                                    <td>{{$withdraw->amount}}</td>
                                    <td>{{$withdraw->user->wallet_account_name}}</td>
                                    <td>{{$withdraw->user->wallet_address}}</td>
                                    <td>{{$withdraw->user->wallet_name}}</td>
                                    <td>{{$withdraw->user->wallet_network}}</td>
                                    <td>{{ \Carbon\Carbon::parse($withdraw->created_at)->format('M. d, Y') }}</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">Username</th>
                                    <th rowspan="1" colspan="1">Amount (USDT)</th>
                                    <th class="sorting" tabindex="0" aria-controls="rejected" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Wallet Account Name
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="rejected" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Wallet Address
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="rejected" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Wallet Name
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="rejected" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Wallet Network
                                    </th>
                                    <th rowspan="1" colspan="1">Date placed</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
  </div>


  <div class="modal fade" id="action_form">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> <span id="action_title"></span> Withdrawal</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                Are you sure you want to <span id="action_message"></span> this Withdrawal?
            </div>
            <div class="modal-footer">
                <form name="action_form" action="" method="post">
                    @csrf
                    @method('put')
                    <button type="submit" class="btn btn-success">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>


  <script>

    let actionUrl = "{{ route('admin.withdraw.action', ['id' => '__id__', 'action' => '__action__']) }}"

    function action(id, action){
        let url = actionUrl.replace('__id__', id);
        url = url.replace('__action__', action.toLowerCase());

        let action_form = document.forms['action_form'];
        document.getElementById('action_title').innerHTML = action;
        document.getElementById('action_message').innerHTML = action.toLowerCase();
        
        action_form.action = url;
    }

</script>

@endsection

@section('js')
<script>
    $(function () {
      $('#successful').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });

    $(function () {
      $('#rejected').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });

</script>
  
@endsection