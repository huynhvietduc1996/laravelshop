@extends('layouts.admin')

@section('title', 'Cập nhật từ khóa')

@section('content')
  <div class="col-md-6">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Cập nhật từ khóa</h3>
      </div>
      <!-- /.box-header -->

      <!-- form start -->
      <form action="" role="form" method="POST">
        @csrf

        <div class="box-body">
          <div class="form-group {{ $errors->first('k_name') ? 'has-error' : '' }}">
            <label for="c_name">Tên từ khóa <span class="text-danger">(*)</span></label>
            <input type="text" class="form-control" id="k_name" name="k_name" placeholder="Nhập tên từ khóa"
              value="{{ $keyword->k_name }}">

            @if ($errors->first('k_name'))
              <span class="text-danger">{{ $errors->first('k_name') }}</span>
            @endif
          </div>
        </div>

        <div class="box-body">
          <div class="form-group">
            <label for="c_name">Mô tả</label>
            <textarea style="resize: none" rows="4" type="text" class="form-control" id="k_description"
              name="k_description" placeholder="Nhập mô tả từ khóa" value="{{ $keyword->k_description }}"></textarea>
          </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <a href="{{ route('admin.keyword.index') }}" class="btn btn-primary">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            Quay lại
          </a>
          <button type="submit" class="btn btn-success">
            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
            Cập nhật
          </button>
        </div>
      </form>
    </div>
    <!-- /.box -->
  </div>
@endsection
