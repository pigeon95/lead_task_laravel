<table class="table">
    <thead class="thead-light">
    <th>#</th>
    <th>@lang('products::main.list.name')</th>
    <th>@lang('products::main.list.description')</th>
    <th>@lang('products::main.list.prices')</th>
    <th>@lang('products::main.list.created_at')</th>
    <th>@lang('products::main.list.updated_at')</th>
    <th>@lang('products::main.list.actions')</th>
    </thead>
    <tbody>

    @foreach ($products as $product)
        <tr>
            <th>{{ $product->id }}</th>
            <td>{{ $product->name }}</td>
            <td>{{ substr($product->description, 0, 20)}}{{strlen($product->description) > 20 ? "..." : ""}}</td>
            <td>
                @foreach ($product->prices as $price)
                {{ $price->value }} PLN <br>
                @endforeach
            </td>
            <td>{{ $product->created_at }}</td>
            <td>{{ $product->updated_at }}</td>
            <td>
                <form method="POST" action="{{ route('products.delete', $product) }}">
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-primary btn-sm">@lang('products::main.list.edit')</a>
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger btn-sm delete-product">@lang('products::main.list.delete')</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>