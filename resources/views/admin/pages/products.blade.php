@extends('admin.layout.app')

@section('content')
    <!-- general form elements -->
    <form name="vip-level" action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('post')
        <div class="row">
            <div class="col-6 mb-3">
                <label for="image">Image(s)</label>
                <input type="file" id="image" name="images[]" class="form-control" multiple>
                @error('images')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
                @error('images.*')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>
        <input type="submit" class="btn btn-success mx-3" value="Add Product">
    </form>

  <div class="row mt-5">
    <div class="col-12 card">
        <div class="card-header">
            <h3 class="card-title">Products</h3>
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
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Amount (USDT)
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">VIP Level
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Image
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $index => $product)
                                <tr class="odd">
                                    <td class="dtr-control sorting_1" tabindex="0">{{ ++$index }}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->amount}}</td>
                                    <td>{{ $product->vip->name }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/images/products/' . $product->image) }}" style="width: 30px; height: 30px" alt="{{ $product->name }}" />
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
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Amount (USDT)
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">VIP Level
                                    </th>
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Image
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
@endsection

