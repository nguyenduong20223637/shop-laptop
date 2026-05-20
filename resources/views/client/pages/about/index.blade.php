@extends('client.share.master')
@section('noi_dung')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous"/>
<style>
@import url('https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700;800;900&display=swap');

.ab-page { font-family: "Be Vietnam Pro", sans-serif; color: #0f172a; -webkit-font-smoothing: antialiased; }

/* Breadcrumb */
.ab-breadcrumb { padding: 14px 0; font-size: 13px; color: #64748b; }
.ab-breadcrumb a { color: #0ea5e9; text-decoration: none; font-weight: 600; }
.ab-breadcrumb a:hover { text-decoration: underline; }

/* ── Hero ── */
.ab-hero {
  position: relative;
  background: linear-gradient(135deg, #0f172a 0%, #0c4a6e 50%, #1e1b4b 100%);
  overflow: hidden;
  padding: 80px 0 90px;
  text-align: center;
}
.ab-hero::before {
  content: '';
  position: absolute; inset: 0;
  background:
    radial-gradient(ellipse 60% 50% at 20% 50%, rgba(14,165,233,.25), transparent),
    radial-gradient(ellipse 50% 60% at 80% 30%, rgba(99,102,241,.2), transparent);
  pointer-events: none;
}
.ab-hero__tag {
  display: inline-flex; align-items: center; gap: 6px;
  background: rgba(14,165,233,.15);
  border: 1px solid rgba(14,165,233,.3);
  color: #38bdf8; font-size: 12px; font-weight: 700;
  padding: 5px 14px; border-radius: 20px;
  letter-spacing: .6px; text-transform: uppercase;
  margin-bottom: 20px;
}
.ab-hero__title {
  font-size: clamp(32px, 5vw, 56px);
  font-weight: 900; color: #fff;
  line-height: 1.15; letter-spacing: -.03em;
  margin: 0 0 20px;
}
.ab-hero__title span {
  background: linear-gradient(135deg, #22d3ee, #818cf8);
  -webkit-background-clip: text; background-clip: text; color: transparent;
}
.ab-hero__sub {
  font-size: 16px; color: rgba(255,255,255,.7);
  max-width: 560px; margin: 0 auto 36px;
  line-height: 1.7;
}
.ab-hero__btns { display: flex; gap: 12px; justify-content: center; flex-wrap: wrap; }
.ab-btn-primary {
  padding: 13px 28px;
  background: linear-gradient(135deg, #22d3ee, #0ea5e9, #6366f1);
  color: #fff; border: none; border-radius: 12px;
  font-family: inherit; font-size: 14px; font-weight: 700;
  cursor: pointer; text-decoration: none;
  box-shadow: 0 8px 24px rgba(14,165,233,.4);
  transition: transform .2s, box-shadow .2s;
  display: inline-flex; align-items: center; gap: 8px;
}
.ab-btn-primary:hover { transform: translateY(-2px); box-shadow: 0 12px 32px rgba(14,165,233,.5); color: #fff; }
.ab-btn-ghost {
  padding: 13px 28px;
  background: rgba(255,255,255,.08);
  color: rgba(255,255,255,.9); border: 1px solid rgba(255,255,255,.2);
  border-radius: 12px; font-family: inherit; font-size: 14px; font-weight: 600;
  cursor: pointer; text-decoration: none;
  transition: background .2s, border-color .2s;
  display: inline-flex; align-items: center; gap: 8px;
}
.ab-btn-ghost:hover { background: rgba(255,255,255,.14); border-color: rgba(255,255,255,.35); color: #fff; }

/* Floating shapes */
.ab-hero__shape {
  position: absolute; border-radius: 50%;
  background: linear-gradient(135deg, rgba(14,165,233,.15), rgba(99,102,241,.1));
  pointer-events: none;
}
.ab-hero__shape--1 { width: 300px; height: 300px; top: -80px; right: -60px; }
.ab-hero__shape--2 { width: 200px; height: 200px; bottom: -60px; left: -40px; }

/* ── Stats ── */
.ab-stats { padding: 0; margin-top: -1px; }
.ab-stats__inner {
  background: linear-gradient(135deg, #0ea5e9, #6366f1);
  padding: 40px 0;
}
.ab-stats__grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 0;
}
@media (max-width: 767px) { .ab-stats__grid { grid-template-columns: repeat(2, 1fr); } }
.ab-stat {
  text-align: center; padding: 16px 20px;
  border-right: 1px solid rgba(255,255,255,.2);
}
.ab-stat:last-child { border-right: none; }
.ab-stat__num {
  font-size: 36px; font-weight: 900; color: #fff;
  letter-spacing: -.03em; line-height: 1;
}
.ab-stat__label { font-size: 13px; color: rgba(255,255,255,.8); font-weight: 500; margin-top: 4px; }

/* ── Section wrapper ── */
.ab-section { padding: 72px 0; }
.ab-section--gray { background: #f8fafc; }
.ab-section-tag {
  display: inline-flex; align-items: center; gap: 6px;
  background: linear-gradient(135deg, rgba(14,165,233,.1), rgba(99,102,241,.1));
  border: 1px solid rgba(14,165,233,.2);
  color: #0ea5e9; font-size: 11px; font-weight: 700;
  padding: 4px 12px; border-radius: 20px;
  letter-spacing: .6px; text-transform: uppercase;
  margin-bottom: 12px;
}
.ab-section-title {
  font-size: clamp(24px, 3.5vw, 36px);
  font-weight: 800; letter-spacing: -.025em;
  color: #0f172a; margin: 0 0 12px; line-height: 1.2;
}
.ab-section-title span {
  background: linear-gradient(135deg, #0ea5e9, #6366f1);
  -webkit-background-clip: text; background-clip: text; color: transparent;
}
.ab-section-lead { font-size: 15px; color: #64748b; line-height: 1.7; max-width: 520px; }

/* ── Story ── */
.ab-story__img-wrap {
  border-radius: 20px; overflow: hidden;
  box-shadow: 0 24px 56px rgba(15,23,42,.14);
  position: relative;
}
.ab-story__img-wrap img { width: 100%; display: block; object-fit: cover; height: 420px; }
.ab-story__img-badge {
  position: absolute; bottom: 20px; left: 20px;
  background: rgba(255,255,255,.95);
  backdrop-filter: blur(10px);
  border-radius: 12px; padding: 12px 16px;
  box-shadow: 0 8px 24px rgba(15,23,42,.12);
  display: flex; align-items: center; gap: 10px;
}
.ab-story__img-badge-icon {
  width: 40px; height: 40px; border-radius: 10px;
  background: linear-gradient(135deg, #0ea5e9, #6366f1);
  display: flex; align-items: center; justify-content: center;
  color: #fff; font-size: 16px;
}
.ab-story__img-badge-text strong { display: block; font-size: 15px; font-weight: 800; color: #0f172a; }
.ab-story__img-badge-text span { font-size: 12px; color: #64748b; }

.ab-story__list { list-style: none; padding: 0; margin: 24px 0 0; }
.ab-story__list li {
  display: flex; align-items: flex-start; gap: 12px;
  padding: 10px 0; border-bottom: 1px solid #f1f5f9;
  font-size: 14px; color: #334155;
}
.ab-story__list li:last-child { border-bottom: none; }
.ab-story__list li i { color: #0ea5e9; font-size: 15px; margin-top: 1px; flex-shrink: 0; }

/* ── Values ── */
.ab-values__grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px; margin-top: 40px;
}
@media (max-width: 991px) { .ab-values__grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 575px) { .ab-values__grid { grid-template-columns: 1fr; } }

.ab-value-card {
  background: #fff;
  border: 1px solid rgba(15,23,42,.07);
  border-radius: 16px; padding: 28px 24px;
  transition: transform .25s, box-shadow .25s;
  position: relative; overflow: hidden;
}
.ab-value-card::before {
  content: '';
  position: absolute; top: 0; left: 0; right: 0; height: 3px;
  background: linear-gradient(90deg, #22d3ee, #6366f1);
  opacity: 0; transition: opacity .25s;
}
.ab-value-card:hover { transform: translateY(-4px); box-shadow: 0 16px 40px rgba(15,23,42,.1); }
.ab-value-card:hover::before { opacity: 1; }
.ab-value-icon {
  width: 48px; height: 48px; border-radius: 12px;
  background: linear-gradient(135deg, rgba(14,165,233,.12), rgba(99,102,241,.12));
  display: flex; align-items: center; justify-content: center;
  font-size: 20px; color: #0ea5e9; margin-bottom: 16px;
  transition: background .25s;
}
.ab-value-card:hover .ab-value-icon {
  background: linear-gradient(135deg, #0ea5e9, #6366f1);
  color: #fff;
}
.ab-value-card h4 { font-size: 15px; font-weight: 700; color: #0f172a; margin: 0 0 8px; }
.ab-value-card p { font-size: 13px; color: #64748b; line-height: 1.65; margin: 0; }

/* ── Team ── */
.ab-team__grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 20px; margin-top: 40px;
}
@media (max-width: 991px) { .ab-team__grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 575px) { .ab-team__grid { grid-template-columns: repeat(2, 1fr); } }

.ab-team-card {
  background: #fff;
  border: 1px solid rgba(15,23,42,.07);
  border-radius: 16px; overflow: hidden;
  text-align: center;
  transition: transform .25s, box-shadow .25s;
}
.ab-team-card:hover { transform: translateY(-4px); box-shadow: 0 16px 40px rgba(15,23,42,.1); }
.ab-team-card__img {
  height: 160px;
  background: linear-gradient(135deg, #e0f2fe, #e0e7ff);
  display: flex; align-items: center; justify-content: center;
  font-size: 52px; color: #0ea5e9;
  position: relative; overflow: hidden;
}
.ab-team-card__img::after {
  content: '';
  position: absolute; bottom: 0; left: 0; right: 0; height: 40px;
  background: linear-gradient(to top, #fff, transparent);
}
.ab-team-card__body { padding: 16px; }
.ab-team-card__name { font-size: 14px; font-weight: 700; color: #0f172a; margin: 0 0 3px; }
.ab-team-card__role { font-size: 12px; color: #0ea5e9; font-weight: 600; margin: 0 0 10px; }
.ab-team-card__socials { display: flex; justify-content: center; gap: 8px; }
.ab-team-card__socials a {
  width: 28px; height: 28px; border-radius: 8px;
  background: #f1f5f9; color: #64748b; font-size: 12px;
  display: flex; align-items: center; justify-content: center;
  text-decoration: none; transition: background .2s, color .2s;
}
.ab-team-card__socials a:hover { background: linear-gradient(135deg, #0ea5e9, #6366f1); color: #fff; }

/* ── CTA ── */
.ab-cta {
  background: linear-gradient(135deg, #0f172a 0%, #0c4a6e 50%, #1e1b4b 100%);
  padding: 72px 0; text-align: center; position: relative; overflow: hidden;
}
.ab-cta::before {
  content: '';
  position: absolute; inset: 0;
  background: radial-gradient(ellipse 70% 60% at 50% 50%, rgba(14,165,233,.15), transparent);
  pointer-events: none;
}
.ab-cta__title { font-size: clamp(24px, 4vw, 40px); font-weight: 900; color: #fff; margin: 0 0 14px; letter-spacing: -.025em; }
.ab-cta__title span { background: linear-gradient(135deg, #22d3ee, #818cf8); -webkit-background-clip: text; background-clip: text; color: transparent; }
.ab-cta__sub { font-size: 15px; color: rgba(255,255,255,.7); margin: 0 0 32px; }
</style>

<div class="ab-page">

  {{-- Breadcrumb --}}
  <div class="container">
    <div class="ab-breadcrumb">
      <a href="/">Trang chủ</a>
      <span style="margin:0 8px;opacity:.4;">/</span>
      <span>Giới thiệu</span>
    </div>
  </div>

  {{-- ── Hero ── --}}
  <section class="ab-hero">
    <div class="ab-hero__shape ab-hero__shape--1"></div>
    <div class="ab-hero__shape ab-hero__shape--2"></div>
    <div class="container" style="position:relative;z-index:1;">
      <div class="ab-hero__tag"><i class="fa-solid fa-store"></i> DT Store</div>
      <h1 class="ab-hero__title">Laptop chính hãng,<br><span>giá tốt nhất Việt Nam</span></h1>
      <p class="ab-hero__sub">Chúng tôi mang đến trải nghiệm mua sắm laptop đáng tin cậy — từ tư vấn, chọn máy đến bảo hành sau bán hàng.</p>
      <div class="ab-hero__btns">
        <a href="/" class="ab-btn-primary"><i class="fa-solid fa-laptop"></i> Xem sản phẩm</a>
        <a href="/home/contact/" class="ab-btn-ghost"><i class="fa-solid fa-headset"></i> Liên hệ ngay</a>
      </div>
    </div>
  </section>



  {{-- ── Story ── --}}
  <section class="ab-section">
    <div class="container">
      <div class="row align-items-center g-5">
        <div class="col-lg-5">
          <div class="ab-story__img-wrap">
            <img src="{{ asset('assets_client/images/about.jpg') }}" alt="DT Store">
            <div class="ab-story__img-badge">
              <div class="ab-story__img-badge-icon"><i class="fa-solid fa-award"></i></div>
              <div class="ab-story__img-badge-text">
                <strong>Top 1</strong>
                <span>Laptop store Đà Nẵng</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="ab-section-tag"><i class="fa-solid fa-circle-info"></i> Câu chuyện của chúng tôi</div>
          <h2 class="ab-section-title">Chào mừng bạn đến với <span>DT Store</span></h2>
          <p class="ab-section-lead">Trang web bán laptop uy tín và chất lượng hàng đầu Việt Nam. Tại đây, bạn có thể tìm thấy các sản phẩm laptop từ các thương hiệu nổi tiếng như Dell, Asus, HP, Lenovo, Acer và nhiều hơn nữa.</p>
          <p style="font-size:14px;color:#64748b;line-height:1.7;margin-top:12px;">Ngoài ra, DT Store còn cung cấp các dịch vụ hậu mãi tốt nhất như bảo hành, giao hàng, trả góp và hỗ trợ kỹ thuật. Hãy ghé thăm DT Store ngay hôm nay để khám phá và trải nghiệm những sản phẩm laptop tuyệt vời nhất trên thị trường.</p>
          <ul class="ab-story__list">
            <li><i class="fa-solid fa-circle-check"></i> Sản phẩm chính hãng 100%, có tem bảo hành đầy đủ</li>
            <li><i class="fa-solid fa-circle-check"></i> Giao hàng toàn quốc, nhanh chóng và an toàn</li>
            <li><i class="fa-solid fa-circle-check"></i> Hỗ trợ trả góp 0% lãi suất qua các ngân hàng lớn</li>
            <li><i class="fa-solid fa-circle-check"></i> Đội ngũ kỹ thuật viên chuyên nghiệp, hỗ trợ 24/7</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  {{-- ── Values ── --}}
  <section class="ab-section ab-section--gray">
    <div class="container">
      <div class="text-center">
        <div class="ab-section-tag" style="margin:0 auto 12px;"><i class="fa-solid fa-star"></i> Giá trị cốt lõi</div>
        <h2 class="ab-section-title">Tại sao chọn <span>DT Store?</span></h2>
        <p class="ab-section-lead" style="margin:0 auto;">Chúng tôi cam kết mang lại trải nghiệm mua sắm tốt nhất với những giá trị cốt lõi sau.</p>
      </div>
      <div class="ab-values__grid">
        <div class="ab-value-card">
          <div class="ab-value-icon"><i class="fa-solid fa-shield-halved"></i></div>
          <h4>Chính hãng 100%</h4>
          <p>Tất cả sản phẩm đều có nguồn gốc rõ ràng, tem bảo hành chính hãng từ nhà sản xuất.</p>
        </div>
        <div class="ab-value-card">
          <div class="ab-value-icon"><i class="fa-solid fa-tag"></i></div>
          <h4>Giá cạnh tranh</h4>
          <p>Cam kết giá tốt nhất thị trường. Tìm thấy giá rẻ hơn? Chúng tôi sẽ hoàn tiền chênh lệch.</p>
        </div>
        <div class="ab-value-card">
          <div class="ab-value-icon"><i class="fa-solid fa-truck-fast"></i></div>
          <h4>Giao hàng nhanh</h4>
          <p>Giao hàng toàn quốc trong 2–5 ngày làm việc. Miễn phí vận chuyển cho đơn từ 5 triệu.</p>
        </div>
        <div class="ab-value-card">
          <div class="ab-value-icon"><i class="fa-solid fa-rotate-left"></i></div>
          <h4>Đổi trả dễ dàng</h4>
          <p>Chính sách đổi trả trong 7 ngày nếu sản phẩm lỗi từ nhà sản xuất, không cần lý do.</p>
        </div>
        <div class="ab-value-card">
          <div class="ab-value-icon"><i class="fa-solid fa-headset"></i></div>
          <h4>Hỗ trợ 24/7</h4>
          <p>Đội ngũ tư vấn viên luôn sẵn sàng hỗ trợ bạn mọi lúc qua hotline, chat và email.</p>
        </div>
        <div class="ab-value-card">
          <div class="ab-value-icon"><i class="fa-solid fa-credit-card"></i></div>
          <h4>Thanh toán linh hoạt</h4>
          <p>Hỗ trợ nhiều hình thức thanh toán: tiền mặt, chuyển khoản, thẻ tín dụng, trả góp 0%.</p>
        </div>
      </div>
    </div>
  </section>

  {{-- ── Team ── --}}
  <section class="ab-section">
    <div class="container">
      <div class="text-center">
        <div class="ab-section-tag" style="margin:0 auto 12px;"><i class="fa-solid fa-users"></i> Đội ngũ</div>
        <h2 class="ab-section-title">Những người <span>đứng sau DT Store</span></h2>
        <p class="ab-section-lead" style="margin:0 auto;">Đội ngũ trẻ, nhiệt huyết và chuyên nghiệp — luôn đặt khách hàng làm trung tâm.</p>
      </div>
      <div class="ab-team__grid">
        <div class="ab-team-card">
          <div class="ab-team-card__img"><i class="fa-solid fa-user-tie"></i></div>
          <div class="ab-team-card__body">
            <div class="ab-team-card__name">Nguyễn Văn A</div>
            <div class="ab-team-card__role">Giám đốc điều hành</div>
            <div class="ab-team-card__socials">
              <a href="#"><i class="fab fa-linkedin-in"></i></a>
              <a href="#"><i class="fab fa-facebook-f"></i></a>
            </div>
          </div>
        </div>
        <div class="ab-team-card">
          <div class="ab-team-card__img" style="background:linear-gradient(135deg,#fce7f3,#ede9fe);color:#a855f7;"><i class="fa-solid fa-user"></i></div>
          <div class="ab-team-card__body">
            <div class="ab-team-card__name">Trần Thị B</div>
            <div class="ab-team-card__role">Trưởng phòng kinh doanh</div>
            <div class="ab-team-card__socials">
              <a href="#"><i class="fab fa-linkedin-in"></i></a>
              <a href="#"><i class="fab fa-facebook-f"></i></a>
            </div>
          </div>
        </div>
        <div class="ab-team-card">
          <div class="ab-team-card__img" style="background:linear-gradient(135deg,#dcfce7,#d1fae5);color:#10b981;"><i class="fa-solid fa-screwdriver-wrench"></i></div>
          <div class="ab-team-card__body">
            <div class="ab-team-card__name">Lê Văn C</div>
            <div class="ab-team-card__role">Trưởng kỹ thuật</div>
            <div class="ab-team-card__socials">
              <a href="#"><i class="fab fa-github"></i></a>
              <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
          </div>
        </div>
        <div class="ab-team-card">
          <div class="ab-team-card__img" style="background:linear-gradient(135deg,#fef3c7,#fde68a);color:#f59e0b;"><i class="fa-solid fa-bullhorn"></i></div>
          <div class="ab-team-card__body">
            <div class="ab-team-card__name">Phạm Thị D</div>
            <div class="ab-team-card__role">Marketing Manager</div>
            <div class="ab-team-card__socials">
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-facebook-f"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- ── CTA ── --}}
  <section class="ab-cta">
    <div class="container" style="position:relative;z-index:1;">
      <h2 class="ab-cta__title">Sẵn sàng tìm chiếc laptop <span>hoàn hảo?</span></h2>
      <p class="ab-cta__sub">Hàng nghìn sản phẩm chính hãng đang chờ bạn khám phá.</p>
      <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap;">
        <a href="/" class="ab-btn-primary"><i class="fa-solid fa-laptop"></i> Mua ngay</a>
        <a href="/home/contact/" class="ab-btn-ghost"><i class="fa-solid fa-phone"></i> Gọi tư vấn</a>
      </div>
    </div>
  </section>

</div>
@endsection
