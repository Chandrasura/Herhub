@extends('admin.layout.app')

@section('content')
    <!-- general form elements -->
    <form name="vip-level" action="{{ route('admin.levels.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('post')
        <div class="row">
            <div class="col-6 mb-3">
                <label for="vip_name">VIP Level Name</label>
                <input type="text" id="vip_name" name="vip_name" value="{{ old('vip_name') }}" class="form-control">
                @error('vip_name')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="col-6 mb-3">
                <label for="vip_amount">VIP Minimum Amount</label>
                <input type="number" id="vip_amount" name="vip_amount" value="{{ old('vip_amount') }}" class="form-control">
                @error('vip_amount')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="col-6 mb-3">
                <label for="orders_per_day">Number of orders per day</label>
                <input type="number" id="orders_per_day" name="orders_per_day" value="{{ old('orders_per_day') }}" class="form-control">
                @error('orders_per_day')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="col-6 mb-3">
                <label for="percentage_profit">Percentage Profit</label>
                <input type="number" id="percentage_profit" name="percentage_profit" value="{{ old('percentage_profit') }}" class="form-control">
                @error('percentage_profit')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="col-6 mb-3">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" class="form-control">
                @error('image')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="col-6 mb-3">
                <label for="description1">Description 1</label>
                <input type="text" id="description1" name="description[]" value="{{ old('description.*') }}" class="form-control">
                @error('description.*')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <button type="button" name="addDescription" class="btn btn-success">Add more description</button>
        </div>
        <input type="submit" class="btn btn-success d-flex mx-auto" value="Add VIP Level">
    </form>

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
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Minimum Amount
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Orders per day
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vips as $index => $vip)
                                <tr class="odd">
                                    <td class="dtr-control sorting_1" tabindex="0">{{ ++$index }}</td>
                                    <td>{{$vip->name}}</td>
                                    <td>{{$vip->amount}}</td>
                                    <td>{{ $vip->orders_per_day }}</td>
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
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Minimum Amount
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Orders per day
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

@section('js')
    <script>
        function removeDescription(id) {
            let new_id = `desc_${id}`;
            let dom = document.getElementById(new_id);
            dom.remove();
        }

        let i = 2;

        let vipForm = document.forms['vip-level'];
        let btnAddMoreDescription = vipForm["addDescription"];
        btnAddMoreDescription.addEventListener("click", () => {
            let div_id = "desc_" + i;
            let node = document.createElement("div");
            node.setAttribute("id", div_id);
            node.classList.add("col-sm-6", "my-3");

            let elementLabel = document.createElement("label");
            elementLabel.setAttribute("for", `description${i}`);
            elementLabel.innerHTML = `Description ${i}`;

            let elementNode1 = document.createElement("input");

            let inputAttribute = {
                type: "text",
                id: `description${i}`,
                name: "description[]",
                class: "form-control",
            };
            for (let attr in inputAttribute) {
                elementNode1.setAttribute(attr, inputAttribute[attr]);
            }

            let elementNode2 = document.createElement("button");
            elementNode2.classList.add("btn", "btn-danger", "p-2", "mt-2");
            elementNode2.append("Remove");
            elementNode2.setAttribute("id", i);
            elementNode2.setAttribute("type", "button");
            elementNode2.setAttribute("onclick", `removeDescription(${i})`);

            node.append(elementLabel, elementNode1, elementNode2, elementNode2);

            btnAddMoreDescription.parentNode.previousElementSibling.appendChild(node);
            i++;
        });

    </script>
@endsection