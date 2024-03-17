@extends('admin.layout.app')

@section('content')
  <div class="row mt-5">
    <div class="col-12 card">
        <div class="card-header">
            <h3 class="card-title">VIP Levels</h3>
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
                                        aria-label="Rendering engine: activate to sort column descending">S/N
                                    </th>
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">Name
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Upgrade Amount
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Orders per day
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Number of Sets
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Minimum Product Amount
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Maximum  Product Amount
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Percentage Profit (%)
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Description
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Image
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vips as $index => $vip)
                                <tr class="odd">
                                    <td class="dtr-control sorting_1" tabindex="0">{{ ++$index }}</td>
                                    <td>{{$vip->name}}</td>
                                    <td>{{$vip->amount}}</td>
                                    <td>{{ $vip->orders_per_day }}</td>
                                    <td>{{ $vip->sets }}</td>
                                    <td>{{ $vip->min_prod_amount }}</td>
                                    <td>{{ $vip->max_prod_amount }}</td>
                                    <td>{{ $vip->percentage_profit }}</td>
                                    <td>
                                        <ul>
                                            @foreach (json_decode($vip->description) as $des)
                                            <li>{{ $des }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <img src="{{ asset('uploads/images/vips/' . $vip->image) }}" style="width: 30px; height: 30px" alt="{{ $vip->name }}" />
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.vip.show', $vip->slug) }}" class="btn">
                                            <i class="fa fa-eye text-success px-2" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.vip.edit', $vip->slug) }}" class="btn">
                                            <i class="fa fa-edit text-primary px-2" aria-hidden="true"></i>
                                        </a>                                                                                                                                                                                   
                                        <button type="button" class="btn" data-toggle="modal" data-target="#delete" onclick="deleteVip('{{ $vip->id }}')">
                                            <i class="fa fa-trash text-danger px-2" aria-hidden="true"></i>
                                        </button>    
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
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Upgrade Amount
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Orders per day
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Number of Sets
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Minimum Product Amount
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Maximum  Product Amount
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Percentage Profit (%)
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Description
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Image
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
                <form name="delete_form" action="" method="post">
                    @csrf
                    @method('delete')
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
        let deleteBaseUrl = "{{ route('admin.vip.delete', ['id' => '__id__']) }}"

        function deleteVip(id){
            let deleteUrl = deleteBaseUrl.replace('__id__', '') + id;

            let delete_form = document.forms['delete_form'];        
            delete_form.action = deleteUrl;
        }

    </script>
@endsection
