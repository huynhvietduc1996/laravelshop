@extends('layouts.admin')

@section('title', 'Quản lý danh mục sản phẩm')

@section('content')
  <div class="box">
    <div class="box-body table-responsive no-padding">
      <div class="box-header">
        <h2 class="box-title">Quản lý danh mục sản phẩm</h2>
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
        <a href="{{ route('admin.category.create') }}" class="btn btn-block btn-primary">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Thêm danh mục
        </a>
      </div>

      <table class="table table-bordered">
        <tr>
          <th style="width: 50px" class="text-center">ID</th>
          <th style="width: 200px"class="text-center">Danh mục</th>
          <th class="text-center" style="width: 50px">Avatar</th>
          <th class="text-center" style="width: 100px">Trạng thái</th>
          <th class="text-center" style="width: 100px">Nổi bật</th>
          <th style="width: 200px" class="text-center">Tác vụ</th>
          <th class="text-center">Ghi chú</th>
        </tr>

        @if (isset($categories))
          @foreach ($categories as $category)
            <tr>
              <td class="text-center">{{ $category->id }}</td>
              <td>{{ $category->c_name }}</td>
              <td class="text-center">
                <img src="" alt="" style="width: 80px; height: 80px">
              </td>
              <td class="text-center">
                @if ($category->c_status == 1)
                  <a class="label label-success" href="{{ route('admin.category.active', $category->id) }}">Hiển thị</a>
                @else
                  <a class="label label-default" href="{{ route('admin.category.active', $category->id) }}">Ẩn</a>
                @endif
              </td>
              <td class="text-center">
                @if ($category->c_hot == 1)
                  <a class="label label-success" href="{{ route('admin.category.hot', $category->id) }}">Nổi bật</a>
                @else
                  <a class="label label-default" href="{{ route('admin.category.hot', $category->id) }}">Không</a>
                @endif
              </td>
              <td class="text-center">
                <a href="{{ route('admin.category.edit', $category->id) }}">
                  <span class="glyphicon glyphicon-edit btn-xs btn-warning" aria-hidden="true">Sửa</span>
                </a>
                <a href="{{ route('admin.category.delete', $category->id) }}">
                  <span class="glyphicon glyphicon-trash btn-xs btn-danger" aria-hidden="true">Xóa</span>
                </a>
              </td>
              <td></td>
            </tr>
          @endforeach
        @endif
      </table>
    </div>

    <div class="box-footer">
      {{ $categories->links() }}
    </div>
  </div>



@endsection
