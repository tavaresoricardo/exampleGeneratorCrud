<?php

use \Illuminate\Support\Facades\Lang;

Breadcrumbs::for('index', function ($breadcrumbs) {
    $breadcrumbs->push(Lang::get('app.index'), route('index'));
});

Breadcrumbs::for('products.index', function ($breadcrumbs) {
   $breadcrumbs->push(Lang::get('products.index'), route('products.index'));
});

Breadcrumbs::for('products.create', function ($breadcrumbs) {
   $breadcrumbs->parent('products.index');
   $breadcrumbs->push(Lang::get('products.create'), route('products.create'));
});

Breadcrumbs::for('products.show', function ($breadcrumbs, $product) {
   $breadcrumbs->parent('products.index');
   $breadcrumbs->push(Lang::get('products.show', ['product' => $product->id]), route('products.show', $product->id));
});

Breadcrumbs::for('products.edit', function ($breadcrumbs, $product) {
   $breadcrumbs->parent('products.show', $product);
   $breadcrumbs->push(Lang::get('products.edit', ['product' => $product->id]), route('products.edit', $product->id));
});

Breadcrumbs::for('products.delete', function ($breadcrumbs, $product) {
   $breadcrumbs->parent('products.show', $product);
   $breadcrumbs->push(Lang::get('products.delete', ['product' => $product->id]), route('products.delete', $product->id));
});
