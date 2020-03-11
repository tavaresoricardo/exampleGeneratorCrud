@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('products.show', $product))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('app.show.title', ['item' => __('products.show', ['product' => $product->id])])</h2>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <button type="button" class="btn btn-outline-primary"
                                onclick="location.href='{{ route('products.edit', ['product' => $product]) }}'"
                                title="@lang('app.edit.title', ['id' => $product->id])">
                            @lang('app.edit')
                        </button>
                        <button class="btn btn-outline-danger"
                                onclick="window.location='{{ route('products.delete', ['product' => $product]) }}'"
                                title="@lang('app.delete.title', ['id' => $product->id])">
                            @lang('app.delete')
                        </button>
                    </div>
                    <div class="well">
                        <dl>
                            @foreach($product->toArray() as $key => $value)
                                <dt>@lang('products.'.$key)</dt>
                                <dd>{{ $value }}</dd>
                            @endforeach
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
