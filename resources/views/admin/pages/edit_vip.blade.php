@extends('admin.layout.app')

@section('content')
@if ($vip)
    <!-- general form elements -->
    <form name="vip-level" action="{{ route('admin.vip.update', $vip->slug) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
        <div class="row">
            <div class="col-sm-6 mb-3">
                <label for="vip_name">VIP Level Name</label>
                <input type="text" id="vip_name" name="vip_name" value="{{ old('vip_name', $vip->name) }}" class="form-control">
                @error('vip_name')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="col-sm-6 mb-3">
                <label for="vip_amount">VIP Upgrade Amount</label>
                <input type="number" id="vip_amount" name="vip_amount" min="1" value="{{ old('vip_amount', $vip->amount) }}" class="form-control">
                @error('vip_amount')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="col-sm-6 mb-3">
                <label for="orders_per_day">Number of orders per day</label>
                <input type="number" id="orders_per_day" name="orders_per_day" min="1" value="{{ old('orders_per_day', $vip->orders_per_day) }}" class="form-control">
                @error('orders_per_day')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="col-sm-6 mb-3">
                <label for="sets">Number of sets</label>
                <input type="number" id="sets" name="sets" min="1" value="{{ old('sets', $vip->sets) }}" class="form-control">
                @error('sets')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="col-sm-6 mb-3">
                <label for="minimum_product_amount">Minimum Product Amount</label>
                <input type="number" id="minimum_product_amount" name="minimum_product_amount" min="1" value="{{ old('minimum_product_amount', $vip->min_prod_amount) }}" class="form-control">
                @error('minimum_product_amount')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="col-sm-6 mb-3">
                <label for="maximum_product_amount">Maximum Product Amount</label>
                <input type="number" id="maximum_product_amount" name="maximum_product_amount" value="{{ old('maximum_product_amount', $vip->max_prod_amount) }}" min="1" class="form-control">
                @error('maximum_product_amount')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="col-sm-6 mb-3">
                <label for="percentage_profit">Percentage Profit (%)</label>
                <input type="number" id="percentage_profit" name="percentage_profit" step="0.01" value="{{ old('percentage_profit', $vip->percentage_profit) }}" class="form-control">
                @error('percentage_profit')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="col-sm-6 mb-3">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" class="form-control">
                @error('image')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
                <div class="text-center">
                    <img src="{{ asset("uploads/images/vips/$vip->image") }}" alt="{{ $vip->name }}" style="width: 50px; height: 50px;">
                </div>
            </div>
            @foreach (json_decode($vip->description) as $index => $des)
            @if ($index == 0)
            <div class="col-sm-6 mb-3" id="desc_{{ ++$index }}">
                <label for="description1">Description {{ $index }}</label>
                <input type="text" id="description1" name="description[]" value="{{ old('description.*', $des) }}" class="form-control">
                @error('description.*')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            @else
            <div class="col-sm-6 mb-3" id="desc_{{ ++$index }}">
                <label for="description{{ $index }}">Description {{ $index }}</label>
                <input type="text" id="description{{ $index }}" name="description[]" value="{{ old('description.*', $des) }}" class="form-control">
                <button class="btn btn-danger p-2 mt-2" id="btn_{{ $index }}" type="button" onclick="removeDescription('{{ $index }}')">Remove</button>
            </div>
            @endif
            @endforeach
        </div>
        <div class="row mb-3">
            <button type="button" name="addDescription" class="btn btn-success">Add more description</button>
        </div>
        <input type="submit" class="btn btn-success d-flex mx-auto" value="Update VIP Level">
    </form>
@else
<h3 class="my-5 mx-3">The VIP level you are requesting does not exist.</h3>
@endif


@endsection

@section('js')
    <script>
        function removeDescription(id) {
            let new_id = `desc_${id}`;
            let dom = document.getElementById(new_id);
            dom.remove();
        }

        let i = {{ count(json_decode($vip->description)) + 1 }};

        let vipForm = document.forms['vip-level'];
        let btnAddMoreDescription = vipForm["addDescription"];
        btnAddMoreDescription.addEventListener("click", () => {
            let div_id = "desc_" + i;
            let node = document.createElement("div");
            node.setAttribute("id", div_id);
            node.classList.add("col-sm-6", "mb-3");

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
            elementNode2.setAttribute("id", `btn_${i}`);
            elementNode2.setAttribute("type", "button");
            elementNode2.setAttribute("onclick", `removeDescription(${i})`);

            node.append(elementLabel, elementNode1, elementNode2);

            btnAddMoreDescription.parentNode.previousElementSibling.appendChild(node);
            i++;
        });

    </script>
@endsection

