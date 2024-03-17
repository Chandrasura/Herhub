@extends('admin.layout.app')

@section('content')
  <div class="row mt-5">
    <div class="col-12 card">
        <div class="card-header">
            <h3 class="card-title">Users</h3>
        </div>

        <div class="card-body">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6"></div>
                    <div class="col-sm-12 col-md-6"></div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline text-center"
                            aria-describedby="example2_info">
                            <thead>
                                <tr>
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">S/N
                                    </th>
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">Name
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Username
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Phone Number
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Available Balance (USDT)
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Registration Date
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">VIP Level
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Upgrade VIP Level
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $index => $user)
                                @php
                                    $date_joined = new DateTime($user->created_at);
                                    $date_joined = $date_joined->format('F d, Y');    
                                @endphp

                                <tr class="odd">
                                    <td class="dtr-control sorting_1" tabindex="0">{{ ++$index }}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{number_format($user->available_balance, 2)}}</td>
                                    <td>{{ $date_joined }}</td>
                                    <td>{{ $user->vip->name }}</td>
                                    <td>
                                      <form action="{{ route('admin.upgradeUserVip') }}" method="POST">
                                        @method('post')
                                        @csrf
                                        <input type="hidden" name="user" value="{{ $user->id }}">
                                        <select name="upgrade" id="" class="form-select form-control">
                                          @foreach ($user->upgrade as $upgrade)
                                              <option value="{{ $upgrade->id }}">{{ $upgrade->name }}</option>
                                          @endforeach
                                        </select>
                                        <button type="submit" class="mt-2 btn btn-success">Upgrade</button>
                                      </form>
                                    </td>
                                    <td>
                                      <a href="{{ route('admin.user.show', $user->id) }}" class="btn">
                                          <i class="fa fa-eye text-success px-2" aria-hidden="true"></i>
                                      </a>
                                      @if ($status = $user->setCompletion($user->id))
                                        @if ($status->status == "reset")
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#reset" onclick="resetUser('{{ $user->id }}')">
                                                Reset Today Set
                                        </button>    
                                        @endif
                                    @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                  <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                  colspan="1" aria-sort="ascending"
                                  aria-label="Rendering engine: activate to sort column descending">S/N
                              </th>
                              <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                  colspan="1" aria-sort="ascending"
                                  aria-label="Rendering engine: activate to sort column descending">Name
                              </th>
                              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                  colspan="1" aria-label="Browser: activate to sort column ascending">Username
                              </th>
                              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                  colspan="1" aria-label="Browser: activate to sort column ascending">Phone Number
                              </th>
                              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                  colspan="1" aria-label="Browser: activate to sort column ascending">Available Balance (USDT)
                              </th>
                              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                  colspan="1" aria-label="Browser: activate to sort column ascending">Registration Date
                              </th>
                              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                  colspan="1" aria-label="Browser: activate to sort column ascending">VIP Level
                              </th>
                              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                  colspan="1" aria-label="Browser: activate to sort column ascending">Upgrade VIP Level
                              </th>
                              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                  colspan="1" aria-label="Browser: activate to sort column ascending">Action
                              </th>
                          </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
  </div>

  <div class="modal fade" id="reset">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Reset User Today Task</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                Are you sure you want to reset this user Today task?
            </div>
            <div class="modal-footer">
                <form name="reset_form" action="" method="post">
                    @csrf
                    @method('put')
                    <button type="submit" class="btn btn-success">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
    <script>
        let resetBaseUrl = "{{ route('admin.user.reset', ['id' => '__id__']) }}"

        function resetUser(id){
            let resetUrl = resetBaseUrl.replace('__id__', '') + id;

            let reset_form = document.forms['reset_form'];        
            reset_form.action = resetUrl;
        }

    </script>
@endsection
