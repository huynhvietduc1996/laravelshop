<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title') - Cửa hàng bán Apple chính hãng tại Việt Nam</title>

  <!-- BOOTSTRAP CSS -->
  <link rel="stylesheet" href="{{ asset('bootstrap-3.4.1-dist/css/bootstrap.min.css') }}">
</head>

<body>

  <nav class="navbar navbar-default">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
          data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('get.index') }}">TopApple</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          @if (isset($categories))

            @foreach ($categories as $category)
              <li>
                <a href="{{ $category->c_slug }}">
                  {{ $category->c_name }}
                </a>
              </li>
            @endforeach
          @endif
        </ul>
        <form class="navbar-form navbar-left">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">
            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
          </button>
        </form>
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="#">
              <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
            </a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
              aria-expanded="false">Tài khoản <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Đăng nhập</a></li>
              <li><a href="#">Đăng kí</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

  @yield('content')

  {{-- <footer>
    <div class="container">
      <div class="row">
        <div class="col site-footer">
          <h6>
            Tổng đài
          </h6>

          <ul>
            <li>
              <a href="">Mua hàng: 1900.9696.42 (7:30 - 22:00)</a>
            </li>

            <li>
              <a href=""> CSKH: 1900.9868.43 (8:00 - 21:30)</a>
            </li>

            <li>
              <a href="">Kỹ thuật: 1900.8668.54 (7:30 - 22:00)</a>
            </li>
          </ul>

          <h6>Kết nối với chúng tôi</h6>

        </div>
        <div class="col site-footer">
          <h6>Hệ thống cửa hàng</h6>
          <ul>
            <li>
              <a href="/he-thong-cua-hang">
                Xem 100 cửa hàng
              </a>
            </li>
            <li>
              <a href="/noi-quy-cua-hang">
                Nội quy cửa hàng
              </a>
            </li>
            <li>
              <a href="/chat-luong-phuc-vu">
                Chất lượng phục vụ
              </a>
            </li>
            <li>
              <a href="/bao-hanh-doi-tra">
                Chính sách bảo hành &amp; đổi trả
              </a>
            </li>
          </ul>
        </div>

        <div class="col site-footer">
          <h6>Hỗ trợ khách hàng</h6>

          <ul>
            <li>
              <a href="/dieu-kien-giao-dich">
                Điều kiện giao dịch chung
              </a>
            </li>

            <li>
              <a href="/huong-dan-mua-hang">
                Hướng dẫn mua hàng online
              </a>
            </li>

            <li>
              <a href="/giao-hang">
                Chính sách giao hàng
              </a>
            </li>

            <li>
              <a href="/thanh-toan">
                Hướng dẫn thanh toán
              </a>
            </li>
          </ul>
        </div>

        <div class="col site-footer">
          <h6>Về thương hiệu TopAppe</h6>
          <ul>
            <li>
              <a href="/tekzone/tat-tan-tat-thong-tin-ve-app-tich-diem-hoan-toan-moi-1480642#gioithieu"
                class="color-link">
                Tích điểm Quà tặng VIP
              </a>
            </li>

            <li>
              <a href="/gioi-thieu">
                Giới thiệu TopZone
              </a>
            </li>

            <li>
              <a href="https://www.thegioididong.com/b2b">
                Bán hàng doanh nghiệp
              </a>
            </li>

            <li>
              <a href="/bao-mat-thong-tin">
                Chính sách bảo mật thông tin
              </a>
            </li>

            <li><a rel="nofollow" href="https://www.topzone.vn/?sclient=mobile">Xem bản mobile</a></li>
          </ul>
        </div>

        <div class="col site-footer">
          <h6>Trung tâm bảo hành TopCare</h6>

          <ul>
            <li>
              <a href="#">Giới thiệu TopCare</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer> --}}

  <script src="{{ asset('jquery/jquery-3.6.2.min.js') }}"></script>
  <script src="{{ asset('bootstrap-3.4.1-dist/js/bootstrap.min.js') }}"></script>
</body>

</html>
