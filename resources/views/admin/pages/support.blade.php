@extends('admin.layout.app')

@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-6">
      <!-- general form elements -->
      <form action="{{ route('admin.support.store') }}" method="post">
        @csrf
        @method('post')
        <div class="mb-3">
            <label for="support_name">Support Name</label>
            <input type="text" id="support_name" name="support_name" value="{{ old('support_name') }}" class="form-control">
            @error('support_name')
                <strong class="text-danger">{{ $message }}</strong>
            @enderror
        </div>
        <div class="mb-3">
            <label for="support_link">Support link</label>
            <input type="text" id="support_link" name="support_link" value="{{ old('support_link') }}" class="form-control">
            @error('support_link')
                <strong class="text-danger">{{ $message }}</strong>
            @enderror
        </div>
        <input type="submit" class="btn btn-success" value="Add Support">
      </form>
    </div>
    <!--/.col (left) -->
    <!-- right column -->
    <div class="col-md-6">

    </div>
    <!--/.col (right) -->
  </div>

  <div class="row mt-5">
    <div class="col-12 card">
        <div class="card-header">
            <h3 class="card-title">Supports</h3>
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
                                        aria-label="Rendering engine: activate to sort column descending">Name
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Link
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($supports as $support)
                                <tr class="odd">
                                    <td class="dtr-control sorting_1" tabindex="0">{{$support->name}}</td>
                                    <td>{{$support->link}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">Name</th>
                                    <th rowspan="1" colspan="1">Link</th>
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