@extends('layouts.admin')

@section('title', 'Quản lý sản phẩm')

@section('content')
  <div class="box">
    <div class="box-body table-responsive no-padding">
      <div class="box-header">
        <h2 class="box-title">Quản lý sản phẩm</h2>
        <div class="box-tools">
          <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
            <input type="text" name="table_search" class="form-control pull-right" placeholder="Tìm kiếm">

            <div class="input-group-btn">
              <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </div>
      </div>

      <div class="box-header col-md-2">
        <a href="{{ route('admin.product.create') }}" class="btn btn-block btn-primary">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Thêm sản phẩm
        </a>
      </div>

      <table class="table table-bordered">
        <tr>
          <th style="width: 50px" class="text-center">Id</th>
          <th style="width: 200px"class="text-center">Tên sản phẩm</th>
          <th class="text-center" style="width: 80px">Avatar</th>
          <th style="width: 70px" class="text-center">Status</th>
          <th class="text-center" style="width: 100px">Nổi bật</th>
          <th style="width: 400px" class="text-center">Content</th>
          <th style="width: 150px" class="text-center">Tác vụ</th>
        </tr>

        @if (isset($products))
          @foreach ($products as $product)
            <tr>
              <td class="text-center">{{ $product->id }}</td>
              <td class="text-center">{{ $product->p_name }}</td>
              <td>
                <img style="width: 100%" src="{{ pare_url_file($product->p_avatar) }}" alt="">
              </td>
              <td class="text-center">
                @if ($product->p_active == 1)
                  <a class="label label-success" href="{{ route('admin.product.active', $product->id) }}">Hiển thị</a>
                @else
                  <a class="label label-default" href="{{ route('admin.product.active', $product->id) }}">Ẩn</a>
                @endif
              </td>
              <td class="text-center">
                @if ($product->p_hot == 1)
                  <a class="label label-success" href="{{ route('admin.product.hot', $product->id) }}">Nổi bật</a>
                @else
                  <a class="label label-default" href="{{ route('admin.product.hot', $product->id) }}">Không</a>
                @endif
              </td>
              <td>{{ $product->p_description }}</td>
              <td class="text-center">
                <a href="{{ route('admin.product.edit', $product->id) }}">
                  <span class="glyphicon glyphicon-edit btn-xs btn-warning" aria-hidden="true">Sửa</span>
                </a>
                <a href="{{ route('admin.product.delete', $product->id) }}">
                  <span class="glyphicon glyphicon-trash btn-xs btn-danger" aria-hidden="true">Xóa</span>
                </a>
              </td>
            </tr>
          @endforeach
        @endif
      </table>
    </div>

    <div class="box-footer">
      {{-- {{ $keywords->links() }} --}}
    </div>
  </div>



@endsection
