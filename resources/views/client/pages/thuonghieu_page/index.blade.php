s@extends('client.share.master');
@section('noi_dung')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="bread"><span><a href="/">Trang chủ</a></span> / <span>Thương hiệu</span> / <span>{{ $thuonghieu->ten_thuong_hieu }}</span></p>
                </div>
            </div>
        </div>
    </div>
    <input type="number" value="{{$thuonghieu->id}}" id="id_thuong_hieu" hidden>
    <div class="breadcrumbs-two">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="shop-hero">
                        @php
                        $brandBanners = [
                            'Apple'  => 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?w=1200&q=80',
                            'Lenovo' => 'https://images.unsplash.com/photo-1588872657578-7efd1f1555ed?w=1200&q=80',
                            'Asus'   => 'https://images.unsplash.com/photo-1593642632559-0c6d3fc62b89?w=1200&q=80',
                            'Msi'    => 'https://images.unsplash.com/photo-1603302576837-37561b2e2302?w=1200&q=80',
                            'Dell'   => 'https://images.unsplash.com/photo-1593642634367-d91a135587b5?w=1200&q=80',
                            'Acer'   => 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=1200&q=80',
                        ];
                        $brandLogos = [
                            'Apple'  => 'https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg',
                            'Lenovo' => 'https://upload.wikimedia.org/wikipedia/commons/b/b8/Lenovo_logo_2015.svg',
                            'Asus'   => 'https://upload.wikimedia.org/wikipedia/commons/2/2e/ASUS_Logo.svg',
                            'Msi'    => 'https://upload.wikimedia.org/wikipedia/vi/6/6c/Msi_logo.png',
                            'Dell'   => 'https://upload.wikimedia.org/wikipedia/commons/4/48/Dell_Logo.svg',
                            'Acer'   => 'https://upload.wikimedia.org/wikipedia/commons/a/a1/Acer_Logo.svg',
                        ];
                        $bannerUrl = !empty($thuonghieu->hinh_anh) ? $thuonghieu->hinh_anh : ($brandBanners[$thuonghieu->ten_thuong_hieu] ?? '');
                        $logoUrl = '';
                        @endphp
                        <div class="shop-hero__banner" style="background: linear-gradient(135deg,rgba(15,23,42,.7),rgba(15,23,42,.4)) {{ $bannerUrl ? ', url('.$bannerUrl.') center/cover no-repeat' : '' }}; min-height:220px; display:flex; align-items:center; justify-content:center; border-radius:16px; overflow:hidden; position:relative;">
                            @if($bannerUrl)
                            <img src="{{ $bannerUrl }}" alt="" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;z-index:0;opacity:0.6;">
                            @endif
                            <div style="position:relative;z-index:1;text-align:center;padding:40px 20px;">
                                <h2 style="color:#fff;font-size:36px;font-weight:900;margin:0;text-shadow:0 2px 12px rgba(0,0,0,.5);letter-spacing:-.02em;">{{ $thuonghieu->ten_thuong_hieu }}</h2>
                                <p style="color:rgba(255,255,255,.85);font-size:14px;margin:8px 0 0;font-weight:500;">Sản phẩm chính hãng — Bảo hành toàn quốc</p>
                            </div>
                        </div>
                        <nav class="menu shop-hero-submenu text-center" aria-label="Liên kết nhanh">
                            <p>
                                <a href="/home/all-product">Hàng mới</a>
                                <a href="/home/all-product">Bán chạy</a>
                                <a href="/home/all-product">Khuyến mãi</a>
                                <a href="/home/contact">Hỗ trợ</a>
                            </p>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="colorlib-product" id="app2">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
                    <h2>Sản phẩm — {{ $thuonghieu->ten_thuong_hieu }}</h2>
                </div>
            </div>
            <div class="row row-pb-md">
                <div class="col-12">
                    <div class="toolbar-mode shop-toolbar">
                        <div>
                            <div>
                                <label><h5>Sắp xếp theo</h5></label>
                                <div class="shop-toolbar__select-wrap">
                                <select class="form"  id="sortSelect" v-model="SortProd" v-on:change="SortProduct()">
                                    <option value="">Tùy chọn</option>
                                    <option value="PRICEASC">
                                        Sắp xếp theo giá: từ thấp
                                        đến cao
                                    </option>
                                    <option value="PRICEDESC">
                                        Sắp xếp theo giá: từ cao
                                        đến thấp
                                    </option>
                                    <option value="NAMEAZ">
                                        Sắp xếp theo alphabetically,
                                        A-Z
                                    </option>
                                    <option value="NAMEZA">
                                        Sắp xếp theo
                                        alphabetically: Z-A
                                    </option>
                                    <option value="DATENEW">
                                        Sắp xếp theo ngày: từ cũ
                                        đến mới
                                    </option>
                                    <option value="DATEOLD">
                                        Sắp xếp theo ngày: từ mới
                                        đến cũ
                                    </option>
                                    <option value="BESTSALE">
                                        Sắp xếp theo bán chạy nhất
                                    </option>
                                </select>
                                <i class="fa-solid fa-chevron-down shop-toolbar__select-chevron" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <template v-for="(v, k) in List_products.data">
                    <div class="col-md-3 col-lg-3 mb-4 text-center d-flex">
                        <div class="product-entry border product-entry--catalog w-100">
                            <a v-bind:href="'/home/product-detail/' + v.id" class="prod-img">
                                <img v-bind:src="v.hinh_anh" class="img-fluid" alt="Free html5 bootstrap 4 template">
                            </a>
                            <div class="desc product-card-fpt">
                                <h2 class="product-card-fpt__title"><a v-bind:href="'/home/product-detail/' + v.id">@{{ v.ten_san_pham }}</a></h2>
                                <span class="product-card-fpt__badge">Trả góp 0%</span>
                                <p class="product-card-fpt__price-row">
                                    <span class="price product-card-fpt__price"><span class="product-card-fpt__price-current">@{{ formatNumber(v.gia) }}₫</span></span>
                                </p>
                                <button type="button" class="product-card-fpt__compare" disabled aria-disabled="true">+ Thêm vào so sánh</button>
                            </div>
                        </div>
                    </div>
                </template>
                <div class="w-100"></div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="block-27">
                        <ul>
                            <!-- Nút "Trang trước" -->
                            <li v-if="currentPage > 1">
                                <a href="#" @click.prevent="changePage(currentPage - 1)">
                                    <<
                                </a>
                            </li>

                            <!-- Hiển thị các trang -->
                            <li v-for="page in lastPage" :key="page" :class="{ 'active': currentPage === page }">
                                <span v-if="currentPage === page">@{{ page }}</span>
                                <a v-else href="#" @click.prevent="changePage(page)">@{{ page }}</a>
                            </li>

                            <!-- Nút "Trang tiếp theo" -->
                            <li v-if="currentPage < lastPage">
                                <a href="#" @click.prevent="changePage(currentPage + 1)">
                                    >>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('js')
    <script>
        new Vue({
            el: '#app2',
            data: {
                List_products: {}, // Danh sách sản phẩm
                currentPage: 1, // Trang hiện tại
                lastPage: 1, // Tổng số trang
                SortProd : '',
            },
            created() {
                this.loadData();
            },
            methods: {
                loadData(page = 1) { // Truyền thêm trang (mặc định là 1)
                    var payload = {
                        id : $('#id_thuong_hieu').val(),
                    }
                    axios
                        .post('{{ Route('ThuongHieuDataProduct') }}', payload, {
                            page: page
                        })
                        .then((res) => {
                            this.List_products = res.data.data; // Lấy danh sách sản phẩm
                            this.currentPage = res.data.data.current_page; // Lấy trang hiện tại
                            this.lastPage = res.data.data.last_page; // Lấy tổng số trang
                        });
                },

                SortProduct()
                {
                    payload = {
                        'select' : this.SortProd,
                        'data'   : this.List_products,
                    };

                    axios
                        .post('{{Route('sortProducts')}}', payload)
                        .then((res) => {
                            this.List_products.data = res.data.data;
                        });

                },
                formatNumber(price)
                {
                    return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                },
                changePage(page) {
                    this.loadData(page);
                },
            },
        });
    </script>
<script>
(function() {
  var bgBlue  = [240, 244, 248];
  var bgPeach = [255, 241, 230];
  var duration = 60000;
  function lerp(a, b, f) { return Math.round(a + (b - a) * f); }
  function tick() {
    var elapsed = Date.now() % duration;
    var f = (Math.sin((elapsed / duration) * Math.PI * 2 - Math.PI / 2) + 1) / 2;
    var col = 'rgb('+lerp(bgBlue[0],bgPeach[0],f)+','+lerp(bgBlue[1],bgPeach[1],f)+','+lerp(bgBlue[2],bgPeach[2],f)+')';
    document.documentElement.style.setProperty('background', col, 'important');
    document.body.style.setProperty('background', col, 'important');
    var header = document.querySelector('.site-header.colorlib-nav');
    if (header) header.style.setProperty('background', col, 'important');
    ['#colorlib-page','#colorlib-wrapper','.colorlib-main'].forEach(function(sel){
      var el = document.querySelector(sel);
      if (el) el.style.setProperty('background', col, 'important');
    });
    requestAnimationFrame(tick);
  }
  requestAnimationFrame(tick);
})();
</script>
@endsection
