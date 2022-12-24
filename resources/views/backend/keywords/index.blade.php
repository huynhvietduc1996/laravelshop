@extends('layouts.admin')

@section('title', 'Quản lý từ khóa - keyword page')

@section('content')
  <div class="box">
    <div class="box-body table-responsive no-padding">
      <div class="box-header">
        <h2 class="box-title">Quản lí từ khóa</h2>
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
        <a href="{{ route('admin.keyword.create') }}" class="btn btn-block btn-primary">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Thêm từ khóa
        </a>
      </div>

      <table class="table table-bordered">
        <tr>
          <th style="width: 50px" class="text-center">Id</th>
          <th style="width: 200px"class="text-center">Từ khóa</th>
          <th class="text-center" style="width: 100px">Nổi bật</th>
          <th class="text-center">Mô tả</th>
          <th style="width: 200px" class="text-center">Tác vụ</th>
          <th class="text-center">Ghi chú</th>
        </tr>

        @if (isset($keywords))
          @foreach ($keywords as $keyword)
            <tr>
              <td class="text-center">{{ $keyword->id }}</td>
              <td class="text-center">{{ $keyword->k_name }}</td>
              <td class="text-center">
                @if ($keyword->k_hot == 1)
                  <a class="label label-success" href="">Nổi bật</a>
                @else
                  <a class="label label-default" href="">Không</a>
                @endif
              </td>
              <td>{{ $keyword->k_description }}</td>
              <td class="text-center">
                <a href="{{ route('admin.keyword.edit', $keyword->id) }}">
                  <span class="glyphicon glyphicon-edit btn-xs btn-warning" aria-hidden="true">Sửa</span>
                </a>
                <a href="{{ route('admin.keyword.delete', $keyword->id) }}">
                  <span class="glyphicon glyphicon-trash btn-xs btn-danger" aria-hidden="true">Xóa</span>
                </a>
              </td>
              <td>
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
