@extends('layouts.frontend.layout')

@section('title', 'TopApple - Đại lý ủy quyền của Apple, bán hàng trả góp 0% lãi xuất')

@section('content')
  <div class="container">
    <div class="row">

      @if (isset($apples))
        <h2>Apple</h2>
        @foreach ($apples as $apple)
          <a href="{{ route('get.product.detail', $apple->p_slug . '-' . $apple->id) }}">
            <div class="col-md-3">
              <img class="card-img-top" style="width: 90%" src="{{ pare_url_file($apple->p_avatar) }}" alt="">

              <h4>{{ $apple->p_name }}</h4>

              <p>{{ $apple->p_sale == 0 ? number_format($apple->p_price) : number_format($apple->p_sale) }}đ <span
                  style="text-decoration-line: line-through">{{ $apple->p_sale == 0 ? '' : number_format($apple->p_price) }}đ</span>
              </p>
            </div>
          </a>
        @endforeach
      @endif

      @if (isset($macs))
        <h2>Mac</h2>
        @foreach ($macs as $mac)
          <a href="{{ route('get.product.detail', $mac->p_slug . '-' . $mac->id) }}">
            <div class="col-md-3">
              <img class="card-img-top" style="width: 90%" src="{{ pare_url_file($mac->p_avatar) }}" alt="">

              <h4>{{ $mac->p_name }}</h4>

              <p>{{ $mac->p_sale == 0 ? number_format($mac->p_price) : number_format($mac->p_sale) }}đ <span
                  style="text-decoration-line: line-through">{{ $mac->p_sale == 0 ? '' : number_format($mac->p_price) }}đ</span>
              </p>
            </div>
          </a>
        @endforeach
      @endif
    </div>
  </div>
@endsection
