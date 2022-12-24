@extends('layouts.admin')

@section('title', 'Thêm danh mục mới')

@section('content')
  <div class="col-md-6">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Thêm mới danh mục sản phẩm</h3>
      </div>
      <!-- /.box-header -->

      <!-- form start -->
      <form action="" role="form" method="POST">
        @csrf

        <div class="box-body">
          <div class="form-group {{ $errors->first('c_name') ? 'has-error' : '' }}">
            <label for="c_name">Tên danh mục <span class="text-danger">(*)</span></label>
            <input type="text" class="form-control" id="c_name" name="c_name"
              placeholder="Nhập tên danh mục sản phẩm">

            @if ($errors->first('c_name'))
              <span class="text-danger">{{ $errors->first('c_name') }}</span>
            @endif
          </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <a href="{{ route('admin.category.index') }}" class="btn btn-primary">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            Quay lại
          </a>
          <button type="submit" class="btn btn-success">
            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
            Thêm mới
          </button>
        </div>
      </form>
    </div>
    <!-- /.box -->
  </div>
@endsection
