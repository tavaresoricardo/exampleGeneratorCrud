@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('products.delete', $product))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('app.delete.title', ['id' => $product->id])</h2>
                    <p class="lead">@lang('app.delete.question', ['item' => __('products.show', ['product' => $product->id ])])</p>
                </div>
                <div class="card-body">
                    <div class="well">
                        <dl>
                            @foreach($product->getAttributes() as $key => $value)
                                <dt>@lang('products.'.$key)</dt>
                                <dd>{{ $value }}</dd>
                            @endforeach
                        </dl>
                    </div>
                    <div class="form-group">
                        <form action="{{ route('products.destroy', ['product' => $product]) }}" method="post" name="delete">
                            @method('delete')
                            @csrf
                            <button type="button" class="btn btn-outline-dark" onclick="location.href='{{ route('products.show', ['product' => $product]) }}'">@lang('app.cancel')</button>
                            <button type="submit" class="btn btn-primary">@lang('app.delete')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

