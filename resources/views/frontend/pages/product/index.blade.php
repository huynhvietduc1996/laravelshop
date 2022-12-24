@extends('layouts.frontend.layout')

@section('title', 'Danh sách sản phẩm')

@section('content')
    <div class="container">
        <div class="row">
            @if (isset($products))
                @foreach ($products as $product)
                    <a href="{{ route('get.product.detail', $product->p_slug . '-' . $product->id) }}">
                        <div class="col-md-3">
                            <img class="card-img-top" style="width: 90%" src="{{ pare_url_file($product->p_avatar) }}" alt="">

                            <h4>{{ $product->p_name }}</h4>

                            <p>{{ $product->p_sale == 0 ? number_format($product->p_price) : number_format($product->p_sale) }}đ <span
                                    style="text-decoration-line: line-through">{{ $product->p_sale == 0 ? '' : number_format($product->p_price) }}đ</span>
                            </p>
                        </div>
                    </a>
                @endforeach
            @endif
        </div>
    </div>
@endsection
