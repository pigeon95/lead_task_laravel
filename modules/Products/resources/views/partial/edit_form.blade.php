<form class="form-horizontal" method="POST" action="{{ route('products.update', $product) }}">
    {{ csrf_field() }}
    {{ method_field('PUT')}}
    <div class="form-group">
        <label for="name" class="col-md-4 control-label">@lang('products::main.form.name')</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control" name="name" value="{{ $product->name }}" required>
            @if ($errors->has('name'))
                <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label for="description" class="col-md-4 control-label">@lang('products::main.form.description')</label>
        <div class="col-md-6">
            <textarea id="description" class="form-control" name="description" required>{{ $product->description }}</textarea>
            @if ($errors->has('description'))
                <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label for="prices" class="col-md-4 control-label">@lang('products::main.form.prices')</label>
        <div class="col-md-6">
            <input id="name" type="text" class="form-control" name="prices" placeholder="12.99" data-role="tagsinput" pattern="((([0-9]{1,5}[.])?[0-9]{1,5}[,])*([0-9]{1,5}[.])?[0-9]{1,5})"
                   value="
                   @foreach($product->prices as $price)
                   {{$price->value}},
                   @endforeach"
                   required>
            @if ($errors->has('prices'))
                <span class="help-block">
                <strong>{{ $errors->first('prices') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                @lang('products::main.edit.title')
            </button>
        </div>
    </div>
</form>
