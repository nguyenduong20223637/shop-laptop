@extends('client.share.master')
@section('noi_dung')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous"/>
<style>
@import url('https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700;800&display=swap');
.ct-page { font-family:"Be Vietnam Pro",sans-serif; -webkit-font-smoothing:antialiased; }

/* Breadcrumb */
.ct-breadcrumb { padding:14px 0; font-size:13px; color:#64748b; }
.ct-breadcrumb a { color:#0ea5e9; text-decoration:none; font-weight:600; }

/* Hero */
.ct-hero {
  background: linear-gradient(135deg,#0f172a 0%,#0c4a6e 50%,#1e1b4b 100%);
  padding: 56px 0 64px; text-align:center; position:relative; overflow:hidden;
}
.ct-hero::before {
  content:''; position:absolute; inset:0;
  background: radial-gradient(ellipse 70% 60% at 50% 50%, rgba(14,165,233,.18), transparent);
  pointer-events:none;
}
.ct-hero__tag {
  display:inline-flex; align-items:center; gap:6px;
  background:rgba(14,165,233,.15); border:1px solid rgba(14,165,233,.3);
  color:#38bdf8; font-size:12px; font-weight:700;
  padding:4px 14px; border-radius:20px; letter-spacing:.6px; text-transform:uppercase;
  margin-bottom:16px;
}
.ct-hero__title {
  font-size:clamp(28px,4vw,44px); font-weight:900; color:#fff;
  letter-spacing:-.03em; margin:0 0 12px; line-height:1.15;
}
.ct-hero__title span { background:linear-gradient(135deg,#22d3ee,#818cf8); -webkit-background-clip:text; background-clip:text; color:transparent; }
.ct-hero__sub { font-size:15px; color:rgba(255,255,255,.7); margin:0; }

/* Info cards */
.ct-info-section { padding:48px 0 0; }
.ct-info-grid {
  display:grid; grid-template-columns:repeat(4,1fr); gap:16px; margin-bottom:40px;
}
@media(max-width:991px){ .ct-info-grid{ grid-template-columns:repeat(2,1fr); } }
@media(max-width:575px){ .ct-info-grid{ grid-template-columns:1fr 1fr; } }

.ct-info-card {
  background:#fff; border:1px solid rgba(15,23,42,.07);
  border-radius:16px; padding:22px 18px; text-align:center;
  transition:transform .25s, box-shadow .25s;
}
.ct-info-card:hover { transform:translateY(-3px); box-shadow:0 12px 32px rgba(15,23,42,.1); }
.ct-info-card__icon {
  width:48px; height:48px; border-radius:12px; margin:0 auto 12px;
  background:linear-gradient(135deg,rgba(14,165,233,.12),rgba(99,102,241,.12));
  display:flex; align-items:center; justify-content:center;
  font-size:18px; color:#0ea5e9;
  transition:background .25s;
}
.ct-info-card:hover .ct-info-card__icon { background:linear-gradient(135deg,#0ea5e9,#6366f1); color:#fff; }
.ct-info-card__label { font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:.6px; color:#94a3b8; margin-bottom:4px; }
.ct-info-card__value { font-size:14px; font-weight:600; color:#0f172a; }
.ct-info-card__value a { color:inherit; text-decoration:none; }
.ct-info-card__value a:hover { color:#0ea5e9; }

/* Main section */
.ct-main { padding:0 0 64px; }
.ct-card {
  background:rgba(255,255,255,.9); backdrop-filter:blur(16px);
  border:1px solid rgba(255,255,255,.95); border-radius:20px;
  box-shadow:0 4px 24px rgba(15,23,42,.08), 0 20px 48px rgba(15,23,42,.06);
  padding:36px;
}

/* Form */
.ct-form-title { font-size:20px; font-weight:800; color:#0f172a; margin:0 0 6px; letter-spacing:-.02em; }
.ct-form-sub { font-size:13px; color:#64748b; margin:0 0 24px; }
.ct-field { margin-bottom:16px; }
.ct-field label { display:block; font-size:12px; font-weight:700; color:#334155; text-transform:uppercase; letter-spacing:.5px; margin-bottom:6px; }
.ct-field input, .ct-field textarea, .ct-field select {
  width:100%; box-sizing:border-box;
  padding:11px 14px; font-family:inherit; font-size:14px;
  border:1.5px solid #e2e8f0; border-radius:12px;
  background:#f8fafc; color:#0f172a;
  transition:border-color .2s, box-shadow .2s, background .2s;
  outline:none;
}
.ct-field input:focus, .ct-field textarea:focus {
  border-color:rgba(14,165,233,.6); background:#fff;
  box-shadow:0 0 0 4px rgba(14,165,233,.12);
}
.ct-field textarea { resize:vertical; min-height:130px; }
.ct-btn-send {
  width:100%; padding:13px; border:none; border-radius:12px;
  background:linear-gradient(135deg,#22d3ee,#0ea5e9,#6366f1);
  color:#fff; font-family:inherit; font-size:14px; font-weight:700;
  cursor:pointer; box-shadow:0 8px 24px rgba(14,165,233,.35);
  transition:transform .2s, box-shadow .2s;
  display:flex; align-items:center; justify-content:center; gap:8px;
}
.ct-btn-send:hover { transform:translateY(-2px); box-shadow:0 12px 32px rgba(14,165,233,.45); }

/* Map */
.ct-map-wrap { border-radius:16px; overflow:hidden; height:100%; min-height:420px; }
.ct-map-wrap iframe { width:100%; height:100%; min-height:420px; border:none; display:block; }

/* Social */
.ct-social-row { display:flex; gap:10px; margin-top:20px; }
.ct-social-btn {
  width:40px; height:40px; border-radius:10px;
  background:#f1f5f9; color:#64748b; font-size:15px;
  display:flex; align-items:center; justify-content:center;
  text-decoration:none; transition:background .2s, color .2s, transform .2s;
  border:1px solid #e2e8f0;
}
.ct-social-btn:hover { background:linear-gradient(135deg,#0ea5e9,#6366f1); color:#fff; border-color:transparent; transform:translateY(-2px); }
</style>

<div class="ct-page" style="background:linear-gradient(160deg,#f0f9ff 0%,#f8fafc 50%,#eef2ff 100%); min-height:60vh;">

  <div class="container">
    <div class="ct-breadcrumb">
      <a href="/">Trang chủ</a>
      <span style="margin:0 8px;opacity:.4;">/</span>
      <span>Liên hệ</span>
    </div>
  </div>

  {{-- Hero --}}
  <div class="ct-hero">
    <div class="container" style="position:relative;z-index:1;">
      <div class="ct-hero__tag"><i class="fa-solid fa-headset"></i> Hỗ trợ khách hàng</div>
      <h1 class="ct-hero__title">Chúng tôi luôn sẵn sàng<br><span>lắng nghe bạn</span></h1>
      <p class="ct-hero__sub">Liên hệ với đội ngũ DT Store — phản hồi trong vòng 24 giờ làm việc.</p>
    </div>
  </div>

  <div class="ct-info-section">
    <div class="container">
      <div class="ct-info-grid">
        <div class="ct-info-card">
          <div class="ct-info-card__icon"><i class="fa-solid fa-location-dot"></i></div>
          <div class="ct-info-card__label">Địa chỉ</div>
          <div class="ct-info-card__value">Hòa An, Cẩm Lệ,<br>Đà Nẵng</div>
        </div>
        <div class="ct-info-card">
          <div class="ct-info-card__icon"><i class="fa-solid fa-phone"></i></div>
          <div class="ct-info-card__label">Hotline</div>
          <div class="ct-info-card__value"><a href="tel:+123523559">+1235 2355 98</a></div>
        </div>
        <div class="ct-info-card">
          <div class="ct-info-card__icon"><i class="fa-solid fa-envelope"></i></div>
          <div class="ct-info-card__label">Email</div>
          <div class="ct-info-card__value"><a href="mailto:lemanhhien2002@gmail.com">lemanhhien2002<br>@gmail.com</a></div>
        </div>
        <div class="ct-info-card">
          <div class="ct-info-card__icon"><i class="fa-solid fa-clock"></i></div>
          <div class="ct-info-card__label">Giờ làm việc</div>
          <div class="ct-info-card__value">T2–T7: 8:00–21:00<br>CN: 9:00–18:00</div>
        </div>
      </div>
    </div>
  </div>

  {{-- Form + Map --}}
  <div class="ct-main">
    <div class="container">
      <div class="row g-4 align-items-stretch">

        {{-- Form --}}
        <div class="col-lg-5">
          <div class="ct-card h-100">
            <p class="ct-form-title">Gửi tin nhắn cho chúng tôi</p>
            <p class="ct-form-sub">Điền thông tin bên dưới, chúng tôi sẽ phản hồi sớm nhất có thể.</p>
            <form action="#" method="POST">
              <div class="row g-3">
                <div class="col-6">
                  <div class="ct-field">
                    <label>Họ</label>
                    <input type="text" placeholder="Nguyễn">
                  </div>
                </div>
                <div class="col-6">
                  <div class="ct-field">
                    <label>Tên</label>
                    <input type="text" placeholder="Văn A">
                  </div>
                </div>
              </div>
              <div class="ct-field">
                <label>Email</label>
                <input type="email" placeholder="you@email.com">
              </div>
              <div class="ct-field">
                <label>Tiêu đề</label>
                <input type="text" placeholder="Tôi cần hỗ trợ về...">
              </div>
              <div class="ct-field">
                <label>Nội dung</label>
                <textarea placeholder="Mô tả chi tiết vấn đề của bạn..."></textarea>
              </div>
              <button type="submit" class="ct-btn-send">
                <i class="fa-solid fa-paper-plane"></i> Gửi tin nhắn
              </button>
            </form>
            <div class="ct-social-row">
              <a href="#" class="ct-social-btn" title="Facebook"><i class="fab fa-facebook-f"></i></a>
              <a href="#" class="ct-social-btn" title="Zalo"><i class="fa-solid fa-comment-dots"></i></a>
              <a href="#" class="ct-social-btn" title="Instagram"><i class="fab fa-instagram"></i></a>
              <a href="#" class="ct-social-btn" title="YouTube"><i class="fab fa-youtube"></i></a>
            </div>
          </div>
        </div>

        {{-- Map --}}
        <div class="col-lg-7">
          <div class="ct-card h-100" style="padding:8px;">
            <div class="ct-map-wrap">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.3!2d108.2!3d16.0!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zSMOyYSBBbiwgQ-G6qW0gTOG7hywgxJDDoCBO4bq1bmc!5e0!3m2!1svi!2svn!4v1"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
              </iframe>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

</div>
@endsection
