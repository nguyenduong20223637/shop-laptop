@extends('client.share.master')

@section('noi_dung')
<link rel="stylesheet" href="{{ asset('assets_client/css/product-detail.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer"/>

<input type="number" id="id_san_pham" value="{{ $prod->id }}" hidden>

<div class="pd-page" id="app3" v-cloak>
  <div class="container">

    {{-- Breadcrumb --}}
    <div class="pd-breadcrumb">
      <a href="/">Trang chủ</a>
      <span class="sep">/</span>
      <span>Chi tiết sản phẩm</span>
    </div>

    {{-- ── Top card ── --}}
    <div class="pd-top-card">

      {{-- Gallery --}}
      <div class="pd-gallery">
        <div class="pd-main-img-wrap">
          <img :src="activeImage" alt="{{ $prod->ten_san_pham }}">
        </div>
        <div class="pd-thumbs">
          <div class="pd-thumb" :class="{ 'is-active': activeImage === '{{ $prod->hinh_anh }}' }"
               @click="activeImage = '{{ $prod->hinh_anh }}'">
            <img src="{{ $prod->hinh_anh }}" alt="">
          </div>
          @foreach ($colors as $v)
          <div class="pd-thumb" :class="{ 'is-active': activeImage === '{{ $v->hinh_anh }}' }"
               @click="activeImage = '{{ $v->hinh_anh }}'">
            <img src="{{ $v->hinh_anh }}" alt="{{ $v->ten_mau_sac }}">
          </div>
          @endforeach
        </div>
      </div>

      {{-- Info --}}
      <div class="pd-info">
        <div class="pd-badge-row">
          <span class="pd-badge"><i class="fa-solid fa-shield-halved"></i> Chính hãng</span>
          <span class="pd-badge green"><i class="fa-solid fa-circle-check"></i> Còn hàng</span>
        </div>

        <h1 class="pd-title">{{ $prod->ten_san_pham }}</h1>

        <div class="pd-rating-row">
          <div class="pd-stars">
            <i v-for="(s, i) in 5" :key="i" class="icon-star"
               :class="{ 'icon-star-full': i < tbstart, 'icon-star-empty': i >= tbstart }"></i>
          </div>
          <span class="pd-rating-text">(@{{ totalRatingCount }} đánh giá)</span>
        </div>

        <div class="pd-price-block">
          <div class="pd-price">
            <span v-if="size == -1">{{ number_format($prod->gia, 0, ',', '.') }} ₫</span>
            <span v-else>@{{ formatNumber(variant_price) }} ₫</span>
          </div>
          <div class="pd-price-note">Giá đã bao gồm VAT</div>
        </div>

        <hr class="pd-sep">

        {{-- Color --}}
        <div class="pd-opt-label">Màu sắc</div>
        <div class="pd-opt-group">
          @foreach ($colors as $v)
          <button type="button" class="pd-opt-btn"
            :class="{ 'is-active': color === {{ $v->id }} }"
            @click="load_options({{ $prod->id }}, {{ $v->id }}); activeImage = '{{ $v->hinh_anh }}'">
            {{ $v->ten_mau_sac }}
          </button>
          @endforeach
        </div>

        {{-- Size --}}
        <div class="pd-opt-label">Cấu hình</div>
        <div class="pd-opt-group" v-if="color !== -1">
          <button v-for="(v, k) in list_options" :key="k" type="button" class="pd-opt-btn"
            :class="{ 'is-active': size === v.cau_hinh_id }"
            @click="size = v.cau_hinh_id; prod_choosed.id = v.id; variant_price = v.gia_dieu_chinh">
            @{{ v.ten_cau_hinh }}
          </button>
        </div>
        <p class="pd-opt-hint" v-if="color === -1">Vui lòng chọn màu sắc để xem cấu hình</p>

        <hr class="pd-sep">

        {{-- Quantity --}}
        <div class="pd-qty-label">Số lượng</div>
        <div class="pd-qty-wrap">
          <button class="pd-qty-btn" type="button" onclick="giam()">
            <i class="fa-solid fa-minus"></i>
          </button>
          <input type="number" id="quantity" class="pd-qty-input" value="1" min="1" max="100">
          <button class="pd-qty-btn" type="button" onclick="tang()">
            <i class="fa-solid fa-plus"></i>
          </button>
        </div>

        {{-- CTA --}}
        <div class="pd-cta-row">
          @if (!Session::get('auth'))
            <div class="pd-login-warn w-100">
              <i class="fa-solid fa-circle-exclamation me-1"></i>
              Vui lòng <a href="/home/login/">đăng nhập</a> để mua hàng.
            </div>
          @else
            <button class="pd-btn-cart" type="button" @click="AddProduct()">
              <i class="fa-solid fa-cart-plus"></i> Thêm vào giỏ hàng
            </button>
            <button class="pd-btn-wish" type="button" title="Yêu thích">
              <i class="fa-regular fa-heart"></i>
            </button>
          @endif
        </div>

        {{-- Meta --}}
        <ul class="pd-meta">
          <li><i class="fa-solid fa-truck-fast"></i> Giao hàng toàn quốc 2–5 ngày làm việc</li>
          <li><i class="fa-solid fa-rotate-left"></i> Đổi trả trong 7 ngày nếu lỗi nhà sản xuất</li>
          <li><i class="fa-solid fa-shield-halved"></i> Bảo hành chính hãng 12 tháng</li>
          <li><i class="fa-solid fa-headset"></i> Hỗ trợ 24/7 — 1800 xxxx</li>
        </ul>
      </div>
    </div>

    {{-- ── Tabs ── --}}
    <div class="pd-tabs-card">
      <div class="pd-tabs-nav">
        <button class="pd-tab-btn is-active" type="button" onclick="pdTab(this,'pd-desc')">
          <i class="fa-solid fa-align-left"></i> Mô tả sản phẩm
        </button>
        <button class="pd-tab-btn" type="button" onclick="pdTab(this,'pd-review')">
          <i class="fa-solid fa-star"></i> Đánh giá (@{{ totalRatingCount }})
        </button>
      </div>

      {{-- Description --}}
      <div class="pd-tab-pane is-active" id="pd-desc">
        {!! $prod->mo_ta !!}
      </div>

      {{-- Review --}}
      <div class="pd-tab-pane" id="pd-review">
        <div class="row g-4">
          <div class="col-lg-8">
            <h5 style="font-weight:800;font-size:16px;margin-bottom:16px;">@{{ totalRatingCount }} Đánh giá</h5>

            @if (!Session::get('auth'))
              <div class="pd-login-warn mb-4">
                <i class="fa-solid fa-circle-exclamation me-1"></i>
                Vui lòng <a href="/home/login/">đăng nhập</a> để viết đánh giá.
              </div>
            @else
              <div class="pd-review-form mb-4">
                <textarea id="cmt-content" rows="4" placeholder="Chia sẻ cảm nhận của bạn về sản phẩm..."></textarea>
                <div style="display:flex;align-items:center;gap:12px;margin-top:10px;">
                  <span class="rate fa-lg" data-rating="1">
                    <i class="icon-star-empty"></i><i class="icon-star-empty"></i>
                    <i class="icon-star-empty"></i><i class="icon-star-empty"></i>
                    <i class="icon-star-empty"></i>
                  </span>
                  <button class="pd-review-submit" type="button" @click="comment()">
                    <i class="fa-solid fa-paper-plane me-1"></i> Gửi đánh giá
                  </button>
                </div>
              </div>
            @endif

            <div class="pd-cmt-list">
              <template v-for="(v, k) in list_cmt">
                <div class="pd-cmt-item">
                  <div class="pd-cmt-avatar">
                    <img src="https://static.thenounproject.com/png/5034901-200.png" alt="">
                  </div>
                  <div style="flex:1;min-width:0;">
                    <div style="display:flex;justify-content:space-between;align-items:center;gap:8px;">
                      <span class="pd-cmt-name">@{{ v.ho_va_ten }}</span>
                      <span class="pd-cmt-date">@{{ formatDate(v.created_at) }}</span>
                    </div>
                    <div class="pd-stars" style="margin:4px 0;">
                      <i v-for="(s,i) in 5" :key="i" class="icon-star"
                         :class="{'icon-star-full': i < v.ratting,'icon-star-empty': i >= v.ratting}"></i>
                    </div>
                    <p class="pd-cmt-text">@{{ v.content }}</p>
                  </div>
                </div>
              </template>
            </div>

            {{-- Pagination --}}
            <div class="pd-pagination">
              <button class="pd-page-btn" v-if="currentPage > 1" type="button"
                @click="changePage(currentPage-1)">‹</button>
              <button v-for="k in lastPage" :key="k" type="button" class="pd-page-btn"
                :class="{'is-active': currentPage === k}"
                @click="changePage(k)">@{{ k }}</button>
              <button class="pd-page-btn" v-if="currentPage < lastPage" type="button"
                @click="changePage(currentPage+1)">›</button>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="pd-rating-summary">
              <h6>Tổng quan đánh giá</h6>
              <template v-for="(v, k) in list_rating">
                <div class="pd-bar-row">
                  <div class="pd-bar-stars">
                    <i v-for="s in v.ratting" class="fa-solid fa-star" style="font-size:11px;color:#f59e0b;"></i>
                    <i v-for="s in (5 - v.ratting)" class="fa-regular fa-star" style="font-size:11px;color:#d1d5db;"></i>
                  </div>
                  <div class="pd-bar-track">
                    <div class="pd-bar-fill" :style="'width:' + v.percent + '%'"></div>
                  </div>
                  <div class="pd-bar-pct">@{{ v.percent }}%</div>
                </div>
              </template>
              <p style="text-align:center;font-size:12px;color:#94a3b8;margin:12px 0 0;">
                Dựa trên @{{ totalRatingCount }} đánh giá
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection

@section('js')
<script>
function pdTab(btn, id) {
  document.querySelectorAll('.pd-tab-btn').forEach(b => b.classList.remove('is-active'));
  document.querySelectorAll('.pd-tab-pane').forEach(p => p.classList.remove('is-active'));
  btn.classList.add('is-active');
  document.getElementById(id).classList.add('is-active');
}

new Vue({
  el: '#app3',
  data: {
    list_options: [], list_cmt: [], list_rating: [],
    color: -1, size: -1,
    prod_choosed: { id: -1, so_luong: 0 },
    variant_price: -1,
    activeImage: '{{ $prod->hinh_anh }}',
    currentPage: 1, lastPage: 1,
    totalRatingCount: 0, tbstart: 0,
  },
  created() { this.tangviewProduct(); this.loadcmt(); },
  methods: {
    loadcmt(page = 1) {
      axios.post('{{ Route("DataComment") }}', {
        page, payload: { product_id: $('#id_san_pham').val() }
      }).then(res => {
        this.list_cmt = res.data.data.data;
        this.list_rating = res.data.ratings;
        this.tbstart = res.data.tbstart;
        this.totalRatingCount = res.data.totalRatingCount;
        this.currentPage = res.data.data.current_page;
        this.lastPage = res.data.data.last_page;
      });
    },
    changePage(page) { this.loadcmt(page); },
    comment() {
      var rating = document.querySelector('.rate');
      axios.post('{{ Route("AddComment") }}', {
        product_id: $('#id_san_pham').val(),
        ratting: parseFloat(rating.getAttribute('data-rating')) - 5,
        content: $('#cmt-content').val(),
      }).then(res => {
        if (res.data.status == 1) { toastr.success(res.data.message); this.loadcmt(); }
        else toastr.error(res.data.message);
      }).catch(res => { $.each(res.response.data.errors, (k,v) => toastr.error(v[0])); });
    },
    load_options(prod_id, color_id) {
      this.color = color_id;
      axios.post('{{ Route("OptData") }}', { product_id: prod_id, mau_sac_id: color_id })
        .then(res => {
          if (res.data.status == 1) this.list_options = res.data.data;
          else toastr.error(res.data.message);
        });
    },
    AddProduct() {
      this.prod_choosed.so_luong = $('#quantity').val();
      axios.post('{{ Route("AddToCart") }}', this.prod_choosed)
        .then(res => {
          if (res.data.status) toastr.success(res.data.message);
          else toastr.error(res.data.message);
        }).catch(res => { $.each(res.response.data.errors, (k,v) => toastr.error(v[0])); });
      this.CountProduct();
    },
    CountProduct() {
      axios.post('{{ Route("CountCart") }}').then(res => { $('#countofprod').text(res.data.data); });
    },
    tangviewProduct() {
      axios.post('{{ Route("IncreaseProductV") }}', { id: $('#id_san_pham').val() });
    },
    formatNumber(p) { return p.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","); },
    formatDate(date) {
      if (!date) return '';
      const d = new Date(date);
      return `${d.getHours()}:${String(d.getMinutes()).padStart(2,'0')} ${d.getDate()}/${d.getMonth()+1}/${d.getFullYear()}`;
    },
  }
});

function tang() { var v = document.getElementById("quantity"); v.value = parseInt(v.value) + 1; }
function giam() { var v = document.getElementById("quantity"); if (parseInt(v.value) > 1) v.value = parseInt(v.value) - 1; }

// Star click for review
document.addEventListener('DOMContentLoaded', () => {
  const stars = document.querySelectorAll('.rate i');
  const rating = document.querySelector('.rate');
  if (!stars.length || !rating) return;
  stars.forEach((star, i) => {
    star.addEventListener('click', () => {
      rating.setAttribute('data-rating', i + 1);
      stars.forEach((s, j) => {
        s.classList.toggle('icon-star-full', j <= i);
        s.classList.toggle('icon-star-empty', j > i);
      });
    });
  });
});
</script>
@endsection
