@extends('layouts.frontend.layout')

@section('title', 'Chi tiết sản phẩm')

@section('content')
  <div class="container">
    <div class="row">
      <h2>Chi tiết sản phẩm</h2>
      <img src="{{ pare_url_file($product->p_avatar) }}" alt="">

      <h4>{{ $product->p_name }}</h4>

      <p>{{ $product->p_sale == 0 ? number_format($product->p_price) : number_format($product->p_sale) }}đ <span
          style="text-decoration-line: line-through">{{ $product->p_sale == 0 ? '' : number_format($product->p_price) }}đ</span>
      </p>
    </div>
  </div>
@endsection
