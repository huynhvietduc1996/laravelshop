@extends('layouts.admin')

@section('title', 'Cập nhật sản phẩm')

@section('content')
  <div class="box">
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Cập nhật sản phẩm</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="col-md-8">
            <div class="box-body">
              <div class="form-group">
                <label for="p_name">Tên sản phẩm <span class="text-danger">(*)</span></label>
                <input type="text" class="form-control" id="p_name" name="p_name"
                  placeholder="Nhập tên sản phẩm" value="{{ $product->p_name }}">

                @if ($errors->first('p_name'))
                  <span class="text-danger">{{ $errors->first('p_name') }}</span>
                @endif
              </div>



              {{-- <div class="form-group">
                <label>Tags</label>
                <select class="form-control" name="keywords">
                  <option>--- Chọn tag cho sản phẩm ---</option>
                  <option>option 1</option>
                  <option>option 2</option>
                  <option>option 3</option>
                  <option>option 4</option>
                  <option>option 5</option>
                </select>
              </div> --}}

              <div class="form-group">
                <label for="">Mô tả <span class="text-danger">(*)</span></label>
                <textarea class="form-control" rows="3" placeholder="Nhập mô tả sản phẩm" name="p_description">
                  {{ $product->p_description }}
                </textarea>

                @if ($errors->first('p_description'))
                  <span class="text-danger">{{ $errors->first('p_description') }}</span>
                @endif
              </div>

              <div class="form-group">
                <label for="">Nội dung <span class="text-danger">(*)</span></label>
                <textarea class="form-control" rows="3" placeholder="Nhập nội dung sản phẩm" name="p_content">
                  {{ $product->p_content }}
                </textarea>

                @if ($errors->first('p_content'))
                  <span class="text-danger">{{ $errors->first('p_content') }}</span>
                @endif
              </div>
            </div>

            <div class="box-footer">
              <a href="{{ route('admin.product.index') }}" class="btn btn-primary">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                Quay lại
              </a>
              <button type="submit" class="btn btn-success">
                <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
                Cập nhật
              </button>
            </div>
          </div>

          <div class="col-md-4">
            <div class="box-body">
              <div class="form-group">
                <label class="control-label" for="p_category_id">Danh mục sản phẩm <span
                    class="text-danger">(*)</span></label>
                <select class="form-control" name="p_category_id">
                  <option>--- Chọn danh mục cho sản phẩm ---</option>
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                      {{ $product->p_category_id == $category->id ? "selected='selected'" : '' }}>
                      {{ $category->c_name }}
                    </option>
                  @endforeach
                </select>

                @if ($errors->first('p_category_id'))
                  <span class="text-danger">{{ $errors->first('p_category_id') }}</span>
                @endif
              </div>

              <div class="form-group">
                <div class="input-group col-md-12">
                  <label for="p_price">Giá sản phẩm <span class="text-danger">(*)</span></label>
                  <input type="number" class="form-control" name="p_price" value="{{ $product->p_price }}">
                </div>

                @if ($errors->first('p_price'))
                  <span class="text-danger">{{ $errors->first('p_price') }}</span>
                @endif
              </div>

              <div class="form-group">
                <div class="input-group col-md-12">
                  <label for="p_price">Giảm giá</label>
                  <input type="number" class="form-control" name="p_sale"
                    value="{{ $product->p_sale ?? old('p_sale') }}">
                </div>
              </div>

              <div class="form-group">
                <label for="">Hình ảnh sản phẩm</label>
                <input type="file" name="p_avatar" id="">
              </div>
            </div>
          </div>

        </form>
      </div>
      <!-- /.box -->


    </div>

    <div class="box-footer">
      {{-- {{ $keywords->links() }} --}}
    </div>
  </div>



@endsection
