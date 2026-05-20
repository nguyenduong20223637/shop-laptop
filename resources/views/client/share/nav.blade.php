<nav class="colorlib-nav site-header" role="navigation" id="app">

  {{-- Thanh thông báo trên cùng --}}
  <div class="site-topbar">
    <div class="container">
      <div class="site-topbar__inner">
        <span class="site-topbar__item"><i class="fa-solid fa-bolt" style="color:#fde68a"></i> Lên đổi tiết kiệm</span>
        <span class="site-topbar__sep">•</span>
        <span class="site-topbar__item"><i class="fa-solid fa-shield-halved" style="color:#86efac"></i> Sản phẩm <b>chính hãng</b> — Xuất VAT đầy đủ</span>
        <span class="site-topbar__sep">•</span>
        <span class="site-topbar__item"><i class="fa-solid fa-truck-fast" style="color:#7dd3fc"></i> Giao nhanh — <b>Miễn phí</b> cho đơn 300k+</span>
        <span class="site-topbar__sep">•</span>
        <span class="site-topbar__item"><i class="fa-solid fa-rotate-left" style="color:#fca5a5"></i> Thu cũ giá ngon</span>
        <span class="site-topbar__sep">•</span>
        <span class="site-topbar__item"><i class="fa-solid fa-headset" style="color:#c4b5fd"></i> <b>1800 xxxx</b></span>
      </div>
    </div>
  </div>

  {{-- Header chính --}}
  <div class="site-header-main">
    <div class="container">
      <div class="site-header-main__inner">

        {{-- Logo --}}
        <a href="/" class="site-header-logo" id="colorlib-logo">
          <span class="site-header-logo-mark">DT</span><span class="site-header-logo-text">Store</span>
        </a>

        {{-- Nút Danh mục với MEGA DROPDOWN --}}
        <div class="has-dropdown dd-danhmuc site-header-cat-btn mega-cat-wrap">
          <button class="site-cat-btn">
            <i class="fa-solid fa-bars"></i> Danh mục
            <i class="fa-solid fa-chevron-down" style="font-size:9px;margin-left:4px;transition:transform .25s;" class="mega-arrow"></i>
          </button>
          <div class="mega-dropdown">
            <div class="mega-dropdown__inner">

              {{-- Cột 1: Danh mục --}}
              <div class="mega-col mega-col--cats">
                <div class="mega-heading"><i class="fa-solid fa-list"></i> Danh mục</div>
                <a href="/home/danh-muc/1" class="mega-item">
                  <span class="mega-item__ic" style="background:linear-gradient(135deg,#ef4444,#f97316)"><i class="fa-solid fa-gamepad"></i></span>
                  <div><strong>Laptop Gaming</strong><small>RTX 4060, 144Hz</small></div>
                  <i class="fa-solid fa-chevron-right mega-item__arr"></i>
                </a>
                <a href="/home/danh-muc/2" class="mega-item">
                  <span class="mega-item__ic" style="background:linear-gradient(135deg,#3b82f6,#6366f1)"><i class="fa-solid fa-graduation-cap"></i></span>
                  <div><strong>Laptop Học tập</strong><small>Giá tốt, pin trâu</small></div>
                  <i class="fa-solid fa-chevron-right mega-item__arr"></i>
                </a>
                <a href="/home/danh-muc/3" class="mega-item">
                  <span class="mega-item__ic" style="background:linear-gradient(135deg,#f59e0b,#ef4444)"><i class="fa-solid fa-briefcase"></i></span>
                  <div><strong>Laptop Văn phòng</strong><small>Mỏng nhẹ, bền bỉ</small></div>
                  <i class="fa-solid fa-chevron-right mega-item__arr"></i>
                </a>
                <a href="/home/danh-muc/4" class="mega-item">
                  <span class="mega-item__ic" style="background:linear-gradient(135deg,#8b5cf6,#ec4899)"><i class="fa-solid fa-pen-ruler"></i></span>
                  <div><strong>Laptop Đồ họa</strong><small>4K, màu chuẩn</small></div>
                  <i class="fa-solid fa-chevron-right mega-item__arr"></i>
                </a>
                <a href="/home/all-product" class="mega-item mega-item--all">
                  <span class="mega-item__ic" style="background:linear-gradient(135deg,#0ea5e9,#22d3ee)"><i class="fa-solid fa-laptop"></i></span>
                  <div><strong>Tất cả Laptop</strong><small>Xem toàn bộ</small></div>
                  <i class="fa-solid fa-chevron-right mega-item__arr"></i>
                </a>
              </div>

              {{-- Cột 2: Thương hiệu + Giá --}}
              <div class="mega-col mega-col--brands">
                <div class="mega-heading"><i class="fa-solid fa-star"></i> Thương hiệu</div>
                <div class="mega-brand-grid">
                  <template v-for="(v,k) in list_thuonghieu">
                    <a :href="'/home/thuong-hieu/'+v.id" class="mega-brand">@{{ v.ten_thuong_hieu }}</a>
                  </template>
                </div>
                <div class="mega-heading" style="margin-top:14px;"><i class="fa-solid fa-tag"></i> Mức giá</div>
                <div class="mega-price-list">
                  <a href="/home/all-product" class="mega-price-item"><i class="fa-solid fa-circle-dot"></i> Dưới 10 triệu</a>
                  <a href="/home/all-product" class="mega-price-item"><i class="fa-solid fa-circle-dot"></i> 10 – 15 triệu</a>
                  <a href="/home/all-product" class="mega-price-item"><i class="fa-solid fa-circle-dot"></i> 15 – 20 triệu</a>
                  <a href="/home/all-product" class="mega-price-item"><i class="fa-solid fa-circle-dot"></i> Trên 20 triệu</a>
                </div>
              </div>

              {{-- Cột 3: Promo --}}
              <div class="mega-col mega-col--promo">
                <div class="mega-heading"><i class="fa-solid fa-bolt"></i> Ưu đãi nổi bật</div>
                <a href="/home/danh-muc/1" class="mega-promo mega-promo--1">
                  <div class="mega-promo__tag">🔥 HOT DEAL</div>
                  <div class="mega-promo__title">Gaming RTX 4060</div>
                  <div class="mega-promo__sub">Từ 22.990.000₫</div>
                  <div class="mega-promo__cta">Xem ngay <i class="fa-solid fa-arrow-right"></i></div>
                </a>
                <a href="/home/all-product" class="mega-promo mega-promo--2">
                  <div class="mega-promo__tag">⚡ FLASH SALE</div>
                  <div class="mega-promo__title">Giảm đến 3 triệu</div>
                  <div class="mega-promo__sub">Trả góp 0% lãi suất</div>
                  <div class="mega-promo__cta">Xem ngay <i class="fa-solid fa-arrow-right"></i></div>
                </a>
              </div>

            </div>
          </div>
        </div>

        {{-- Search --}}
        <div class="site-header-search-wrap">
          <i class="fa-solid fa-magnifying-glass site-search-icon-left"></i>
          <input type="text" class="site-search-input" placeholder="Tìm laptop theo tên, thương hiệu, cấu hình..." id="ttsearch">
          <button class="site-search-btn" id="btn_search" type="button">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </div>

        {{-- Right: account + cart --}}
        <div class="site-header-right">
          @if (Session::get('auth') == null)
          {{-- Chưa đăng nhập --}}
          <div class="nav-account-wrap" id="accountWrap">
            <a href="#" class="site-header-account-btn">
              <i class="fa-regular fa-user"></i>
              <span>Tài khoản</span>
            </a>
            <div class="acc-dropdown" id="accountDropdown">
              <div class="acc-dropdown__header">
                <div class="acc-dropdown__avatar"><i class="fa-solid fa-user"></i></div>
                <div>
                  <div class="acc-dropdown__title">Xin chào!</div>
                  <div class="acc-dropdown__sub">Đăng nhập để xem ưu đãi</div>
                </div>
              </div>
              <div class="acc-dropdown__actions">
                <a href="/home/login/" class="acc-dropdown__btn acc-dropdown__btn--primary">
                  <i class="fa-solid fa-right-to-bracket"></i> Đăng nhập
                </a>
                <a href="/home/register/" class="acc-dropdown__btn acc-dropdown__btn--ghost">
                  <i class="fa-solid fa-user-plus"></i> Đăng ký
                </a>
              </div>
              <div class="acc-dropdown__divider"></div>
              <div class="acc-dropdown__links">
                <a href="/home/order/" class="acc-dropdown__link"><i class="fa-solid fa-box"></i> Đơn hàng của tôi</a>
                <a href="#" class="acc-dropdown__link"><i class="fa-solid fa-heart"></i> Sản phẩm yêu thích</a>
                <a href="#" class="acc-dropdown__link"><i class="fa-solid fa-headset"></i> Hỗ trợ 24/7</a>
              </div>
            </div>
          </div>
          @else
          {{-- Đã đăng nhập --}}
          <div class="nav-account-wrap" id="accountWrap">
            <a href="#" class="site-header-account-btn acc-logged-btn">
              <div class="acc-avatar-sm">{{ strtoupper(substr(Session::get('auth')->ho_va_ten, 0, 1)) }}</div>
              <span>{{ Str::limit(Session::get('auth')->ho_va_ten, 12) }}</span>
            </a>
            <div class="acc-dropdown" id="accountDropdown">
              <div class="acc-dropdown__header acc-dropdown__header--logged">
                <div class="acc-avatar-lg">{{ strtoupper(substr(Session::get('auth')->ho_va_ten, 0, 1)) }}</div>
                <div>
                  <div class="acc-dropdown__title">{{ Session::get('auth')->ho_va_ten }}</div>
                  <div class="acc-dropdown__sub">Thành viên DTStore</div>
                </div>
              </div>
              <div class="acc-dropdown__divider"></div>
              <div class="acc-dropdown__links">
                <a href="/home/order/" class="acc-dropdown__link"><i class="fa-solid fa-box"></i> Đơn hàng của tôi</a>
                <a href="#" class="acc-dropdown__link"><i class="fa-solid fa-heart"></i> Sản phẩm yêu thích</a>
                <a href="#" class="acc-dropdown__link"><i class="fa-solid fa-gear"></i> Cài đặt tài khoản</a>
              </div>
              <div class="acc-dropdown__divider"></div>
              <a href="#" v-on:click="logout()" class="acc-dropdown__logout">
                <i class="fa-solid fa-right-from-bracket"></i> Đăng xuất
              </a>
            </div>
          </div>
          @endif
          <a href="/home/cart/" class="site-header-cart-btn">
            <i class="fa-solid fa-cart-shopping"></i>
            <span>Giỏ hàng</span>
            <span class="site-cart-badge" id="countofprod">0</span>
          </a>
        </div>

      </div>
    </div>
  </div>

  {{-- Quick links --}}
  <div class="site-quicklinks">
    <div class="container">
      <div class="site-quicklinks__inner">
        <a href="/home/danh-muc/1" class="site-ql"><i class="fa-solid fa-gamepad" style="color:#ef4444"></i> Gaming</a>
        <a href="/home/danh-muc/2" class="site-ql"><i class="fa-solid fa-graduation-cap" style="color:#3b82f6"></i> Học tập</a>
        <a href="/home/danh-muc/4" class="site-ql"><i class="fa-solid fa-pen-ruler" style="color:#8b5cf6"></i> Đồ họa</a>
        <a href="#" class="site-ql"><i class="fa-brands fa-apple" style="color:#374151"></i> MacBook</a>
        <a href="#" class="site-ql"><i class="fa-solid fa-feather" style="color:#10b981"></i> Laptop mỏng nhẹ</a>
        <a href="#" class="site-ql site-ql--hot"><i class="fa-solid fa-fire"></i> Dưới 15 triệu</a>
        <a href="#" class="site-ql"><i class="fa-solid fa-credit-card" style="color:#0ea5e9"></i> Trả góp 0%</a>
        <a href="/home/all-product" class="site-ql"><i class="fa-solid fa-laptop" style="color:#6366f1"></i> Tất cả sản phẩm</a>
        <a href="#" class="site-ql site-ql--sale"><i class="fa-solid fa-bolt"></i> Bán chạy</a>
        <a href="#" class="site-ql site-ql--new"><i class="fa-solid fa-star"></i> Khuyến mãi</a>
      </div>
    </div>
  </div>

  {{-- Info bar --}}
  <div class="site-infobar">
    <div class="container">
      <div class="site-infobar__inner">
        <a href="#" class="site-infobar__item">
          <i class="fa-solid fa-laptop"></i>
          <span>Laptop <b>hiệu năng cao</b></span>
        </a>
        <a href="#" class="site-infobar__item">
          <i class="fa-solid fa-rotate-left"></i>
          <span>Thu cũ đổi mới <b>giá tốt</b></span>
        </a>
        <a href="#" class="site-infobar__item">
          <i class="fa-solid fa-shield-halved" style="color:#fca5a5"></i>
          <span>Bảo hành <b>trọn đời</b></span>
        </a>
        <a href="#" class="site-infobar__item">
          <i class="fa-solid fa-tag" style="color:#fca5a5"></i>
          <span>Cam kết <b>giá tốt nhất</b></span>
        </a>
        <a href="#" class="site-infobar__item site-infobar__item--right">
          <i class="fa-solid fa-location-dot" style="color:#fca5a5"></i>
          <span>Chọn khu vực để xem ưu đãi <i class="fa-solid fa-chevron-down" style="font-size:9px;"></i></span>
        </a>
      </div>
    </div>
  </div>

</nav>

<style>
/* ===== HEADER FPT STYLE ===== */
.site-header.colorlib-nav { background:#f0f4f8 !important; box-shadow:none !important; padding:0 !important; }

/* Topbar */
.site-topbar { background:linear-gradient(135deg,#4a9fe8 0%,#7b6cf6 100%); padding:7px 0; }
.site-topbar__inner { display:flex; align-items:center; justify-content:center; gap:0; flex-wrap:wrap; }
.site-topbar__item {
  display:inline-flex; align-items:center; gap:6px;
  font-size:12px; font-weight:600; color:rgba(255,255,255,.95);
  white-space:nowrap; font-family:"Be Vietnam Pro",sans-serif;
  padding:0 20px;
  border-right:1px solid rgba(255,255,255,.2);
  transition:color .15s;
}
.site-topbar__item:last-child { border-right:none; }
.site-topbar__item:hover { color:#fff; }
.site-topbar__item i { font-size:13px; }
.site-topbar__item b { color:#fde68a; font-weight:700; }
.site-topbar__sep { display:none; }

/* Header main */
.site-header-main { padding:10px 0; background:transparent; }
.site-header-main .container { background:linear-gradient(135deg,#4a9fe8 0%,#7b6cf6 100%); border-radius:12px 12px 0 0; padding-top:10px; padding-bottom:10px; }
.site-header-main__inner { display:flex; align-items:center; gap:12px; }

/* Logo */
.site-header-logo {
  display:inline-flex; align-items:center; gap:0;
  text-decoration:none; flex-shrink:0;
  -webkit-font-smoothing:antialiased;
}
.site-header-logo-mark {
  font-size:1.8rem; font-weight:900; letter-spacing:-.04em;
  background:linear-gradient(135deg,#fff 0%,rgba(255,255,255,.85) 100%);
  -webkit-background-clip:text; background-clip:text; color:transparent;
  font-family:"Be Vietnam Pro",sans-serif;
}
.site-header-logo-text {
  font-size:1.8rem; font-weight:900; letter-spacing:-.04em;
  background:linear-gradient(135deg,#fde68a 0%,#fbbf24 100%);
  -webkit-background-clip:text; background-clip:text; color:transparent;
  font-family:"Be Vietnam Pro",sans-serif;
}
.site-header-logo:hover .site-header-logo-mark,
.site-header-logo:hover .site-header-logo-text { filter:brightness(1.1); }

/* Search icon left */
.site-header-search-wrap { position:relative; }
.site-search-icon-left {
  position:absolute; left:14px; top:50%; transform:translateY(-50%);
  color:#94a3b8; font-size:14px; pointer-events:none; z-index:1;
}
.site-search-input { padding-left:40px !important; }
.site-search-input:focus { box-shadow:0 0 0 3px rgba(255,255,255,.35) !important; }

/* Search button */
.site-search-btn {
  display:inline-flex !important; align-items:center; justify-content:center;
  position:absolute !important; right:4px !important; top:50% !important;
  transform:translateY(-50%) !important;
  width:36px !important; height:36px !important; padding:0 !important;
  font-size:14px !important; font-weight:700 !important;
  background:linear-gradient(135deg,#fff,rgba(255,255,255,.92)) !important;
  color:#4a9fe8 !important; border-radius:7px !important;
  box-shadow:0 2px 8px rgba(0,0,0,.1) !important;
  transition:box-shadow .2s, background .2s !important;
}
.site-search-btn:hover {
  transform:translateY(-50%) !important;
  box-shadow:0 4px 14px rgba(0,0,0,.15) !important;
  background:linear-gradient(135deg,#f0f9ff,#fff) !important;
  color:#0ea5e9 !important;
}

/* Quick links underline animation */
.site-ql { position:relative; transition:color .15s !important; }
.site-ql::after {
  content:''; position:absolute; bottom:-2px; left:50%; right:50%;
  height:2px; border-radius:1px;
  background:linear-gradient(90deg,#4a9fe8,#7b6cf6);
  transition:left .2s, right .2s;
}
.site-ql:hover::after { left:8px; right:8px; }

/* Topbar icon colors */
.site-topbar__item:nth-child(1) i { color:#fde68a !important; }
.site-topbar__item:nth-child(2) i { color:#86efac !important; }
.site-topbar__item:nth-child(3) i { color:#7dd3fc !important; }
.site-topbar__item:nth-child(4) i { color:#fca5a5 !important; }
.site-topbar__item:nth-child(5) i { color:#c4b5fd !important; }

/* Danh mục button */
.site-header-cat-btn { position:relative; flex-shrink:0; }
.site-cat-btn { display:inline-flex; align-items:center; gap:8px; padding:10px 18px; border-radius:8px; background:rgba(255,255,255,.2); border:1.5px solid rgba(255,255,255,.35); color:#fff; font-family:"Be Vietnam Pro",sans-serif; font-size:14px; font-weight:700; cursor:pointer; transition:all .2s; white-space:nowrap; }
.site-cat-btn:hover { background:rgba(255,255,255,.3); border-color:rgba(255,255,255,.6); color:#fff; }

/* Search */
.site-header-search-wrap { flex:1; position:relative; min-width:0; }
.site-search-input { width:100%; padding:10px 48px 10px 16px; border-radius:8px; border:1.5px solid rgba(255,255,255,.4); font-family:"Be Vietnam Pro",sans-serif; font-size:14px; color:#0f172a; outline:none; background:rgba(255,255,255,.92); transition:border-color .2s,box-shadow .2s; }
.site-search-input:focus { border-color:#fff; background:#fff; box-shadow:0 0 0 3px rgba(255,255,255,.3); }
.site-search-input::placeholder { color:#94a3b8; }
.site-search-btn { position:absolute; right:4px; top:50%; transform:translateY(-50%); width:36px; height:36px; border-radius:6px; background:rgba(255,255,255,.25); border:none; color:#fff; cursor:pointer; display:flex; align-items:center; justify-content:center; font-size:14px; }

/* Right */
.site-header-right { display:flex; align-items:center; gap:8px; flex-shrink:0; }
.site-header-account-btn { display:flex; align-items:center; gap:6px; padding:8px 14px; border-radius:8px; background:rgba(255,255,255,.2); border:1.5px solid rgba(255,255,255,.35); color:#fff; text-decoration:none; font-size:13px; font-weight:600; font-family:"Be Vietnam Pro",sans-serif; white-space:nowrap; transition:all .2s; }
.site-header-account-btn:hover { background:rgba(255,255,255,.3); color:#fff; }
.site-header-cart-btn { display:flex; align-items:center; gap:7px; padding:9px 18px; border-radius:8px; background:#fff; color:#4a9fe8; text-decoration:none; font-size:13px; font-weight:700; font-family:"Be Vietnam Pro",sans-serif; white-space:nowrap; box-shadow:0 4px 14px rgba(0,0,0,.15); transition:opacity .2s; }
.site-header-cart-btn:hover { opacity:.88; color:#4a9fe8; }

/* Quick links */
.site-quicklinks { background:transparent; border-bottom:none; padding:3px 0 0; }
.site-quicklinks .container {
  background:#fff;
  border-radius:0;
  border-left:1px solid #e2e8f0;
  border-right:1px solid #e2e8f0;
  border-bottom:none;
  border-top:none;
}
.site-quicklinks__inner { padding:5px 16px; display:flex; gap:0; overflow-x:auto; scrollbar-width:none; justify-content:space-between; border-bottom:1px solid #f1f5f9; }
.site-quicklinks__inner::-webkit-scrollbar { display:none; }
.site-ql { display:inline-block; padding:5px 10px; border-radius:6px; font-size:12px; font-weight:600; color:#475569; text-decoration:none; white-space:nowrap; transition:all .15s; font-family:"Be Vietnam Pro",sans-serif; }
.site-ql:hover { background:#f0f9ff; color:#0ea5e9; }

/* Info bar — ẩn đi vì trùng với topbar */
.site-infobar { display:none !important; }

/* Quick links — đẹp hơn */
.site-quicklinks .container {
  background:#fff;
  border-radius:0;
  border-left:none;
  border-right:none;
  border-top:none;
  border-bottom:2px solid #f1f5f9;
}
.site-quicklinks__inner {
  padding:0 16px;
  display:flex;
  gap:0;
  overflow-x:auto;
  scrollbar-width:none;
  justify-content:space-between;
}
.site-quicklinks__inner::-webkit-scrollbar { display:none; }
.site-ql {
  display:inline-flex; align-items:center; gap:5px;
  padding:8px 12px;
  border-radius:0;
  font-size:12.5px; font-weight:600; color:#475569;
  text-decoration:none; white-space:nowrap;
  transition:all .15s;
  font-family:"Be Vietnam Pro",sans-serif;
  border-bottom:2px solid transparent;
  position:relative;
}
.site-ql:hover {
  color:#4a9fe8;
  border-bottom-color:#4a9fe8;
  background:transparent;
}
.site-ql i { font-size:12px; }

/* Dropdown danh mục — VIP */
.site-header .has-dropdown .dropdown {
  display:none;
  position:absolute !important;
  top:calc(100% + 10px) !important;
  left:0 !important;
  z-index:9999;
  min-width:220px;
  background:#fff;
  border-radius:14px;
  border:1px solid rgba(14,165,233,.15);
  box-shadow:0 8px 32px rgba(15,23,42,.14), 0 2px 8px rgba(15,23,42,.06);
  padding:6px;
  list-style:none;
  margin:0;
  overflow:hidden;
}
.site-header .has-dropdown:hover .dropdown { display:block; }
.site-header .has-dropdown .dropdown li a {
  display:flex;
  align-items:center;
  gap:10px;
  padding:10px 14px;
  border-radius:9px;
  font-size:13px;
  font-weight:600;
  color:#334155;
  text-decoration:none;
  font-family:"Be Vietnam Pro",sans-serif;
  transition:background .15s,color .15s,padding-left .15s;
  text-transform:none !important;
  letter-spacing:0 !important;
}
.site-header .has-dropdown .dropdown li a::before {
  content:'';
  width:6px;height:6px;
  border-radius:50%;
  background:linear-gradient(135deg,#0ea5e9,#6366f1);
  flex-shrink:0;
  opacity:.5;
  transition:opacity .15s,transform .15s;
}
.site-header .has-dropdown .dropdown li a:hover {
  background:linear-gradient(90deg,rgba(14,165,233,.08),transparent);
  color:#0ea5e9;
  padding-left:18px;
}
.site-header .has-dropdown .dropdown li a:hover::before { opacity:1; transform:scale(1.3); }

/* Ẩn nav cũ */
.site-header .top-menu.site-header-inner,
.site-header .sale.site-header-sale { display:none !important; }

/* Trạng thái đã đăng nhập */
.site-header-account-logged { display:flex; align-items:center; gap:8px; flex-shrink:0; }
.site-header-account-name { display:flex; align-items:center; gap:6px; font-size:13px; font-weight:600; color:#334155; font-family:"Be Vietnam Pro",sans-serif; white-space:nowrap; }
.site-header-account-link { padding:6px 12px; border-radius:7px; font-size:12px; font-weight:600; color:#334155; text-decoration:none; border:1.5px solid #e2e8f0; background:#f8fafc; font-family:"Be Vietnam Pro",sans-serif; transition:all .2s; white-space:nowrap; }
.site-header-account-link:hover { border-color:#0ea5e9; color:#0ea5e9; background:#e0f2fe; }
.site-header-account-link--logout { color:#ef4444; border-color:#fecaca; background:#fff5f5; }
.site-header-account-link--logout:hover { border-color:#ef4444; background:#fee2e2; color:#dc2626; }

/* ================================================================
   ACCOUNT DROPDOWN — VIP
   ================================================================ */
.nav-account-wrap { position:relative; flex-shrink:0; }

/* Avatar nhỏ trên button khi đã đăng nhập */
.acc-logged-btn { gap:8px !important; }
.acc-avatar-sm {
  width:28px; height:28px; border-radius:50%;
  background:linear-gradient(135deg,#0ea5e9,#6366f1);
  color:#fff; font-size:12px; font-weight:800;
  display:flex; align-items:center; justify-content:center;
  flex-shrink:0;
}

/* Dropdown panel */
.acc-dropdown {
  display:none;
  position:absolute; top:calc(100% + 10px); right:0; left:auto;
  width:260px;
  background:#fff;
  border-radius:16px;
  border:1px solid rgba(14,165,233,.12);
  box-shadow:0 8px 40px rgba(15,23,42,.16), 0 2px 8px rgba(15,23,42,.06);
  overflow:hidden;
  z-index:9999;
  animation:acc-in .18s cubic-bezier(.4,0,.2,1);
}
@keyframes acc-in{from{opacity:0;transform:translateY(-8px);}to{opacity:1;transform:translateY(0);}}

/* Header */
.acc-dropdown__header {
  display:flex; align-items:center; gap:12px;
  padding:16px 16px 14px;
  background:linear-gradient(135deg,rgba(14,165,233,.06),rgba(99,102,241,.06));
  border-bottom:1px solid #f1f5f9;
}
.acc-dropdown__header--logged {
  background:linear-gradient(135deg,rgba(14,165,233,.08),rgba(99,102,241,.08));
}
.acc-avatar-lg {
  width:44px; height:44px; border-radius:50%;
  background:linear-gradient(135deg,#0ea5e9,#6366f1);
  color:#fff; font-size:18px; font-weight:800;
  display:flex; align-items:center; justify-content:center;
  flex-shrink:0; box-shadow:0 4px 12px rgba(14,165,233,.35);
}
.acc-dropdown__header .acc-avatar-lg i { font-size:18px; }
.acc-dropdown__header > div:not(.acc-avatar-lg) i {
  width:44px; height:44px; border-radius:50%;
  background:linear-gradient(135deg,#e2e8f0,#f1f5f9);
  color:#94a3b8; font-size:18px;
  display:flex; align-items:center; justify-content:center;
  flex-shrink:0;
}
.acc-dropdown__title { font-size:14px; font-weight:700; color:#0f172a; }
.acc-dropdown__sub { font-size:11px; color:#94a3b8; margin-top:2px; }

/* Action buttons */
.acc-dropdown__actions { display:grid; grid-template-columns:1fr 1fr; gap:8px; padding:12px 14px; }
.acc-dropdown__btn {
  display:flex; align-items:center; justify-content:center; gap:6px;
  padding:9px 12px; border-radius:9px;
  font-size:12.5px; font-weight:700; text-decoration:none;
  transition:all .18s; font-family:"Be Vietnam Pro",sans-serif;
}
.acc-dropdown__btn--primary {
  background:linear-gradient(135deg,#0ea5e9,#6366f1);
  color:#fff; box-shadow:0 4px 12px rgba(14,165,233,.3);
}
.acc-dropdown__btn--primary:hover { opacity:.9; transform:translateY(-1px); color:#fff; }
.acc-dropdown__btn--ghost {
  background:#f8fafc; border:1.5px solid #e2e8f0; color:#475569;
}
.acc-dropdown__btn--ghost:hover { border-color:#0ea5e9; color:#0ea5e9; background:#f0f9ff; }

/* Divider */
.acc-dropdown__divider { height:1px; background:#f1f5f9; margin:0; }

/* Links */
.acc-dropdown__links { padding:8px; }
.acc-dropdown__link {
  display:flex; align-items:center; gap:10px;
  padding:9px 12px; border-radius:9px;
  font-size:13px; font-weight:600; color:#334155;
  text-decoration:none; transition:all .15s;
  font-family:"Be Vietnam Pro",sans-serif;
}
.acc-dropdown__link i { font-size:13px; color:#94a3b8; width:16px; text-align:center; transition:color .15s; }
.acc-dropdown__link:hover { background:#f0f9ff; color:#0ea5e9; }
.acc-dropdown__link:hover i { color:#0ea5e9; }

/* Logout */
.acc-dropdown__logout {
  display:flex; align-items:center; gap:10px;
  padding:10px 20px; margin:0;
  font-size:13px; font-weight:600; color:#ef4444;
  text-decoration:none; transition:all .15s;
  font-family:"Be Vietnam Pro",sans-serif;
  background:#fff5f5; border-top:1px solid #fee2e2;
}
.acc-dropdown__logout i { font-size:13px; }
.acc-dropdown__logout:hover { background:#fee2e2; color:#dc2626; }

/* ================================================================
   MEGA DROPDOWN — 3 cột VIP
   ================================================================ */
.mega-cat-wrap { position:relative; flex-shrink:0; }
.mega-cat-wrap .site-cat-btn { display:inline-flex; align-items:center; gap:8px; }

.mega-dropdown {
  display:none;
  position:absolute;
  top:calc(100% + 12px);
  left:0;
  z-index:9999;
  width:660px;
  background:#fff;
  border-radius:16px;
  border:1px solid rgba(14,165,233,.15);
  box-shadow:0 20px 60px rgba(15,23,42,.18), 0 4px 16px rgba(15,23,42,.08);
  overflow:hidden;
  animation:mega-in .2s cubic-bezier(.4,0,.2,1);
}
@keyframes mega-in{from{opacity:0;transform:translateY(-10px);}to{opacity:1;transform:translateY(0);}}
.mega-cat-wrap:hover .mega-dropdown { display:block; }

.mega-dropdown__inner { display:grid; grid-template-columns:1fr 1fr 1fr; align-items:stretch; }

/* Columns */
.mega-col { padding:18px 16px; }
.mega-col--cats { border-right:1px solid #f1f5f9; }
.mega-col--brands { border-right:1px solid #f1f5f9; }
.mega-col--promo { display:flex; flex-direction:column; justify-content:space-between; gap:10px; }

.mega-heading {
  display:flex; align-items:center; gap:6px;
  font-size:10px; font-weight:800; color:#94a3b8;
  text-transform:uppercase; letter-spacing:.08em;
  margin-bottom:10px; padding:0 4px;
}
.mega-heading i { font-size:10px; color:#0ea5e9; }

/* Category items */
.mega-item {
  display:flex; align-items:center; gap:10px;
  padding:9px 10px; border-radius:10px;
  text-decoration:none; transition:all .18s; margin-bottom:2px;
  border:1px solid transparent;
}
.mega-item:hover { background:linear-gradient(90deg,rgba(14,165,233,.06),transparent); border-color:rgba(14,165,233,.12); }
.mega-item__ic {
  width:34px; height:34px; border-radius:9px;
  display:flex; align-items:center; justify-content:center;
  font-size:14px; color:#fff; flex-shrink:0;
  box-shadow:0 3px 8px rgba(0,0,0,.15);
  transition:transform .18s;
}
.mega-item:hover .mega-item__ic { transform:scale(1.1); }
.mega-item div { flex:1; min-width:0; }
.mega-item div strong { display:block; font-size:12.5px; font-weight:700; color:#1e293b; line-height:1.3; }
.mega-item div small { display:block; font-size:10.5px; color:#94a3b8; margin-top:1px; }
.mega-item:hover div strong { color:#0ea5e9; }
.mega-item__arr { font-size:9px; color:#cbd5e1; transition:all .18s; flex-shrink:0; }
.mega-item:hover .mega-item__arr { color:#0ea5e9; transform:translateX(3px); }
.mega-item--all { margin-top:6px; border-top:1px solid #f1f5f9; padding-top:11px; }

/* Brand grid */
.mega-brand-grid { display:grid; grid-template-columns:1fr 1fr; gap:5px; }
.mega-brand {
  padding:7px 10px; border-radius:8px;
  border:1.5px solid #e2e8f0; background:#f8fafc;
  font-size:12px; font-weight:700; color:#475569;
  text-decoration:none; text-align:center;
  transition:all .15s;
}
.mega-brand:hover { border-color:#0ea5e9; color:#0ea5e9; background:#f0f9ff; transform:translateY(-1px); }

/* Price list */
.mega-price-list { display:flex; flex-direction:column; gap:2px; }
.mega-price-item {
  display:flex; align-items:center; gap:8px;
  padding:7px 10px; border-radius:8px;
  font-size:12px; font-weight:600; color:#475569;
  text-decoration:none; transition:all .15s;
}
.mega-price-item i { font-size:8px; color:#0ea5e9; }
.mega-price-item:hover { background:#f0f9ff; color:#0ea5e9; padding-left:14px; }

/* Promo cards */
.mega-promo {
  display:flex; flex-direction:column; justify-content:space-between;
  border-radius:12px; padding:16px;
  text-decoration:none; flex:1;
  transition:transform .2s, box-shadow .2s;
  position:relative; overflow:hidden;
}
.mega-promo:last-child { margin-bottom:0; }
.mega-promo--1 { background:linear-gradient(135deg,#1e1b4b,#312e81); }
.mega-promo--2 { background:linear-gradient(135deg,#0c4a6e,#0369a1); }
.mega-promo:hover { transform:translateY(-2px); box-shadow:0 8px 24px rgba(0,0,0,.2); }
.mega-promo__tag { font-size:9px; font-weight:800; color:rgba(255,255,255,.6); text-transform:uppercase; letter-spacing:.08em; margin-bottom:4px; }
.mega-promo__title { font-size:14px; font-weight:800; color:#fff; margin-bottom:3px; }
.mega-promo__sub { font-size:11px; color:rgba(255,255,255,.65); margin-bottom:8px; }
.mega-promo__cta { display:inline-flex; align-items:center; gap:5px; font-size:11px; font-weight:700; color:#fff; background:rgba(255,255,255,.15); padding:4px 10px; border-radius:20px; transition:background .15s; }
.mega-promo:hover .mega-promo__cta { background:rgba(255,255,255,.25); }
</style>

<script>
    var currentUrl = window.location.pathname;
    var menuItems = document.querySelectorAll('.menu-1 ul li');
    menuItems.forEach(function(item) {
        var a = item.querySelector('a');
        if (a && currentUrl == a.getAttribute('href')) {
            item.classList.add('active');
        }
    });

    new Vue({
        el: '#app',
        data: { count: 0, list_danhmuc: [], list_thuonghieu: [] },
        created() { this.CountProduct(); this.loaddanhmuc(); this.loadthuonghieu(); },
        methods: {
            logout() {
                axios.post('{{ Route('clientLogout') }}').then((res) => {
                    if (res.data.status == 1) setTimeout(() => { window.location.href = '/'; }, 500);
                });
            },
            CountProduct() {
                axios.post('{{ Route('CountCart') }}').then((res) => {
                    $('#countofprod').text(res.data.status == 1 ? res.data.data : 0);
                }).catch(() => {});
            },
            loaddanhmuc() {
                axios.post('{{ Route('loadDanhMucMenu') }}').then((res) => {
                    if (res.data.status == 1) this.list_danhmuc = res.data.data;
                }).catch(() => {});
            },
            loadthuonghieu() {
                axios.post('{{ Route('loadThuongHieuMenu') }}').then((res) => {
                    if (res.data.status == 1) this.list_thuonghieu = res.data.data;
                }).catch(() => {});
            },
        },
    });

    $('#ttsearch').keydown(function(event) {
        if (event.keyCode === 13) {
            window.location.href = "/home/search/" + $('#ttsearch').val();
            return false;
        }
    });
    $('#btn_search').click(function() {
        window.location.href = "/home/search/" + $('#ttsearch').val();
    });

    // Sale ticker
    (function() {
        var items = document.querySelectorAll('.sale-ticker__item');
        if (!items.length) return;
        var current = 0;
        setInterval(function() {
            var next = (current + 1) % items.length;
            var cur = items[current], nxt = items[next];
            cur.style.transition = 'opacity .4s ease';
            cur.style.opacity = '0';
            setTimeout(function() {
                cur.classList.remove('active'); cur.style.transition = ''; cur.style.opacity = '';
                nxt.classList.add('active'); nxt.style.opacity = '0';
                nxt.style.transition = 'opacity .4s ease';
                setTimeout(function() { nxt.style.opacity = '1'; setTimeout(function() { nxt.style.transition = ''; nxt.style.opacity = ''; current = next; }, 400); }, 20);
            }, 400);
        }, 3500);
    })();
    // Account dropdown với delay để không bị ẩn khi di chuột
    (function() {
        var wrap = document.getElementById('accountWrap');
        var dropdown = document.getElementById('accountDropdown');
        if (!wrap || !dropdown) return;
        var timer;
        wrap.addEventListener('mouseenter', function() {
            clearTimeout(timer);
            dropdown.style.display = 'block';
        });
        wrap.addEventListener('mouseleave', function() {
            timer = setTimeout(function() {
                dropdown.style.display = 'none';
            }, 150);
        });
        dropdown.addEventListener('mouseenter', function() {
            clearTimeout(timer);
        });
        dropdown.addEventListener('mouseleave', function() {
            timer = setTimeout(function() {
                dropdown.style.display = 'none';
            }, 150);
        });
    })();</script>

<style>
/* ── VIP ENHANCEMENTS ── */
/* Logo icon glow */
.site-header-logo { align-items:center !important; gap:8px !important; }
.site-header-logo-icon {
  width:32px; height:32px; border-radius:8px;
  background:rgba(255,255,255,.22);
  display:inline-flex; align-items:center; justify-content:center;
  font-size:15px; color:#fff; border:1px solid rgba(255,255,255,.3);
  transition:transform .2s, background .2s, box-shadow .2s; flex-shrink:0;
}
.site-header-logo:hover .site-header-logo-icon {
  transform:rotate(-8deg) scale(1.1);
  background:rgba(255,255,255,.35);
  box-shadow:0 0 16px rgba(255,255,255,.3);
}
/* Search focus */
.site-header-search-wrap { position:relative; }
.site-search-icon-left {
  position:absolute; left:14px; top:50%; transform:translateY(-50%);
  color:#94a3b8; font-size:14px; pointer-events:none; z-index:1; transition:color .2s;
}
.site-header-search-wrap:focus-within .site-search-icon-left { color:#4a9fe8; }
.site-search-input { padding-left:40px !important; transition:all .2s !important; }
.site-search-input:focus { box-shadow:0 0 0 3px rgba(255,255,255,.35) !important; background:#fff !important; }
/* Quick links underline */
.site-ql { position:relative; transition:color .15s !important; }
.site-ql::after {
  content:''; position:absolute; bottom:-2px; left:50%; right:50%;
  height:2px; border-radius:1px;
  background:linear-gradient(90deg,#4a9fe8,#7b6cf6);
  transition:left .2s, right .2s;
}
.site-ql:hover::after { left:8px; right:8px; }
/* Topbar icon colors */
.site-topbar__item:nth-child(1) i { color:#fde68a !important; }
.site-topbar__item:nth-child(2) i { color:#86efac !important; }
.site-topbar__item:nth-child(3) i { color:#7dd3fc !important; }
.site-topbar__item:nth-child(4) i { color:#fca5a5 !important; }
.site-topbar__item:nth-child(5) i { color:#c4b5fd !important; }
/* Button hover glow */
.site-cat-btn:hover { box-shadow:0 0 16px rgba(255,255,255,.2) !important; }
.site-header-account-btn:hover { box-shadow:0 0 16px rgba(255,255,255,.2) !important; }
.site-header-cart-btn { transition:all .2s !important; }
.site-header-cart-btn:hover { transform:translateY(-1px) !important; box-shadow:0 6px 20px rgba(74,159,232,.35) !important; }
</style>

<style>
/* Topbar separator */
.site-topbar__sep { color:rgba(255,255,255,.3); font-size:10px; }
.site-topbar__item b { color:#fde68a; font-weight:700; }

/* Quick links special */
.site-ql--hot { color:#ef4444 !important; font-weight:700 !important; }
.site-ql--hot i { color:#ef4444 !important; }
.site-ql--hot:hover { color:#dc2626 !important; background:#fff5f5 !important; }
.site-ql--sale { color:#8b5cf6 !important; font-weight:700 !important; }
.site-ql--sale i { color:#8b5cf6 !important; }
.site-ql--sale:hover { color:#7c3aed !important; background:#faf5ff !important; }
.site-ql--new { color:#0ea5e9 !important; font-weight:700 !important; }
.site-ql--new i { color:#f59e0b !important; }
.site-ql--new:hover { color:#0284c7 !important; background:#f0f9ff !important; }

/* Info bar bold */
.site-infobar__item b { color:#fde68a; font-weight:700; }
.site-infobar__item:hover { color:#fff !important; }
</style>

<style>
/* ── LOGO VIP ANIMATION ── */
@keyframes logo-shimmer {
  0%   { background-position: -200% center; }
  100% { background-position: 200% center; }
}
@keyframes logo-glow {
  0%, 100% { filter: drop-shadow(0 0 6px rgba(255,255,255,.5)) drop-shadow(0 0 12px rgba(255,220,100,.3)); }
  50%       { filter: drop-shadow(0 0 14px rgba(255,255,255,.9)) drop-shadow(0 0 28px rgba(255,200,50,.6)); }
}
@keyframes logo-float {
  0%, 100% { transform: translateY(0px); }
  50%       { transform: translateY(-3px); }
}

.site-header-logo {
  display:inline-flex !important;
  align-items:center !important;
  gap:0 !important;
  text-decoration:none !important;
  flex-shrink:0 !important;
  animation: logo-float 3s ease-in-out infinite !important;
}

/* "DT" — shimmer trắng chạy qua */
.site-header-logo-mark {
  font-size:1.8rem !important;
  font-weight:900 !important;
  letter-spacing:-.04em !important;
  font-family:"Be Vietnam Pro",sans-serif !important;
  background: linear-gradient(90deg,
    #fff 0%, #fff 30%,
    #ffe066 45%, #fff 55%,
    #fff 100%
  ) !important;
  background-size: 200% auto !important;
  -webkit-background-clip: text !important;
  background-clip: text !important;
  -webkit-text-fill-color: transparent !important;
  color: transparent !important;
  animation: logo-shimmer 2.5s linear infinite, logo-glow 3s ease-in-out infinite !important;
}

/* "Store" — gradient vàng → cam chạy */
.site-header-logo-text {
  font-size:1.8rem !important;
  font-weight:900 !important;
  letter-spacing:-.04em !important;
  font-family:"Be Vietnam Pro",sans-serif !important;
  background: linear-gradient(90deg,
    #fde68a 0%, #fbbf24 20%,
    #fff 40%, #f97316 55%,
    #fde68a 70%, #fbbf24 100%
  ) !important;
  background-size: 200% auto !important;
  -webkit-background-clip: text !important;
  background-clip: text !important;
  -webkit-text-fill-color: transparent !important;
  color: transparent !important;
  animation: logo-shimmer 2s linear infinite reverse, logo-glow 3s ease-in-out infinite !important;
  animation-delay: 0s, .5s !important;
}
</style>

<style>
/* ── XANH → CAM — do JS điều khiển, không dùng CSS animation ── */
.site-topbar,
.site-header-main .container,
.hp-cat__head,
.hp-sb-head {
  /* background được set bởi JS animation loop */
}
</style>

<style>
/* Bo góc dưới thanh quick links */
.site-quicklinks .container {
  border-radius: 0 0 14px 14px !important;
  overflow: hidden !important;
}
.site-quicklinks {
  padding-bottom: 0 !important;
}
</style>

<script>
// Animation đồng bộ toàn trang — 1 loop duy nhất
(function() {
  var blue   = [74, 159, 232];   // #4a9fe8
  var orange = [238, 77, 45];    // #ee4d2d
  var bgBlue  = [240, 244, 248]; // #f0f4f8
  var bgPeach = [255, 241, 230]; // #fff1e6

  var duration = 60000; // 60 giây/chu kỳ — chuyển màu chậm, mượt

  function lerp(a, b, f) { return Math.round(a + (b - a) * f); }
  function toRgb(c) { return 'rgb(' + c[0] + ',' + c[1] + ',' + c[2] + ')'; }

  function tick() {
    var elapsed = Date.now() % duration; // dùng thời gian tuyệt đối — đồng bộ mọi trang
    var f = (Math.sin((elapsed / duration) * Math.PI * 2 - Math.PI / 2) + 1) / 2;

    // Gradient cho topbar, header-main, cat head, sb head
    var c1 = [lerp(blue[0], orange[0], f), lerp(blue[1], orange[1], f), lerp(blue[2], orange[2], f)];
    var c2 = [lerp(74, 249, f), lerp(159, 115, f), lerp(232, 22, f)];
    var grad = 'linear-gradient(135deg,' + toRgb(c1) + ',' + toRgb(c2) + ')';
    ['.site-topbar', '.site-header-main .container', '.hp-cat__head', '.hp-sb-head'].forEach(function(sel) {
      document.querySelectorAll(sel).forEach(function(el) {
        el.style.setProperty('background', grad, 'important');
      });
    });

    // Màu nền trang — cùng pha
    var r = lerp(bgBlue[0], bgPeach[0], f);
    var g = lerp(bgBlue[1], bgPeach[1], f);
    var b = lerp(bgBlue[2], bgPeach[2], f);
    var col = 'rgb(' + r + ',' + g + ',' + b + ')';

    document.documentElement.style.setProperty('background', col, 'important');
    document.body.style.setProperty('background', col, 'important');

    var header = document.querySelector('.site-header.colorlib-nav');
    if (header) header.style.setProperty('background', col, 'important');

    ['#colorlib-page', '#colorlib-wrapper', '.colorlib-main', '.fpt-page'].forEach(function(sel) {
      var el = document.querySelector(sel);
      if (el) el.style.setProperty('background', col, 'important');
    });

    document.querySelectorAll('.hp-card__badge, .hp-card__btn').forEach(function(el) {
      el.style.setProperty('background', grad, 'important');
    });

    // Chip active — để CSS xử lý (không override bằng JS)
    document.querySelectorAll('.hp-chip.active, .fpt-chip.active').forEach(function(el) {
      el.style.removeProperty('background');
      el.style.removeProperty('border-color');
      el.style.removeProperty('color');
      el.style.removeProperty('font-weight');
    });
    // Chip không active — reset
    document.querySelectorAll('.hp-chip:not(.active), .fpt-chip:not(.active)').forEach(function(el) {
      el.style.removeProperty('background');
      el.style.removeProperty('border-color');
      el.style.removeProperty('color');
    });

    // Nút active bộ lọc (chỉ trang chủ hp-*) — xanh nhạt như chip Nổi bật
    document.querySelectorAll('.hp-nb-btn.active, .hp-bb-btn.active, .hp-bb.on, .hp-bb--all.on').forEach(function(el) {
      el.style.setProperty('background', '#e0f2fe', 'important');
      el.style.setProperty('color', '#0ea5e9', 'important');
      el.style.setProperty('border', '2px solid #38bdf8', 'important');
      el.style.setProperty('outline', 'none', 'important');
      el.style.setProperty('box-shadow', 'none', 'important');
    });
    // Reset nút không active trang chủ
    document.querySelectorAll('.hp-nb-btn:not(.active), .hp-bb-btn:not(.active), .hp-bb:not(.on)').forEach(function(el) {
      el.style.removeProperty('background');
      el.style.removeProperty('color');
      el.style.removeProperty('border');
      el.style.removeProperty('border-color');
    });
    // fpt-* — để danhmuc JS xử lý, nav không can thiệp gì cả


    requestAnimationFrame(tick);
  }
  requestAnimationFrame(tick);
})();
</script>
