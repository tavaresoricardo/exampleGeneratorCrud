@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('products.edit', $product))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('app.edit.title', ['id' => $product->id])</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.update', ['product' => $product]) }}" method="post" name="edit">
                        @method('patch')
                        @csrf
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="control-label">@lang('products.name')</label>
    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : (isset($product->name) ? $product->name : '') }}" maxlength="255" required autofocus>
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
    <label for="description" class="control-label">@lang('products.description')</label>
    <textarea id="description" class="form-control" name="description" maxlength="255"  autofocus>{{ old('description') ? old('description') : (isset($product->description) ? $product->description : '') }}</textarea>
    @if ($errors->has('description'))
        <span class="help-block">
            <strong>{{ $errors->first('description') }}</strong>
        </span>
    @endif
</div>

        <div class="form-group{{ $errors->has('value') ? ' has-error' : '' }}">
    <label for="value" class="control-label">@lang('products.value')</label>
    <input id="value" type="text" class="form-control" name="value" value="{{ old('value') ? old('value') : (isset($product->value) ? $product->value : '') }}" required autofocus>
    @if ($errors->has('value'))
        <span class="help-block">
            <strong>{{ $errors->first('value') }}</strong>
        </span>
    @endif
</div>
@push('scripts')
    <script>
        $(function () {
            $('#value').mask('00000000,00', {reverse: true});
        });
    </script>
@endpush

        <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
    <label for="category_id" class="control-label">@lang('products.category_id')</label>
    <input id="category_id" type="number" class="form-control" name="category_id" value="{{ old('category_id') ? old('category_id') : (isset($product->category_id) ? $product->category_id : '') }}"   required autofocus>
    @if ($errors->has('category_id'))
        <span class="help-block">
            <strong>{{ $errors->first('category_id') }}</strong>
        </span>
    @endif
</div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">@lang('app.save')</button>
                            <button type="button" class="btn btn-outline-dark" onclick="location.href='{{ route('products.show', ['product' => $product]) }}'">@lang('app.cancel')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
