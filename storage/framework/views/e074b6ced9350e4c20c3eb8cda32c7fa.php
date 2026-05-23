<?php $__env->startSection('noi_dung'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous"/>
<style>
@import url('https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700;800&display=swap');
*{box-sizing:border-box;}
*:focus { outline: none !important; }
*:active { outline: none !important; }
button { outline: none !important; -webkit-tap-highlight-color: transparent !important; }
button:focus { outline: none !important; box-shadow: none !important; }
button:active { outline: none !important; }
.fpt-page{font-family:"Be Vietnam Pro",sans-serif;-webkit-font-smoothing:antialiased;min-height:80vh;overflow-x:hidden;}

/* Breadcrumb */
.fpt-bc{background:transparent;padding:8px 0;font-size:12px;color:#64748b;}
.fpt-bc a{color:#0ea5e9;text-decoration:none;font-weight:600;}

/* Page header */
.fpt-ph{background:#fff;padding:12px 0 0;border-bottom:1px solid #e2e8f0;}
.fpt-ph__title{font-size:20px;font-weight:800;color:#0f172a;margin:0 0 2px;letter-spacing:-.02em;}
.fpt-ph__sub{font-size:12px;color:#64748b;margin:0 0 10px;}

/* Banner */
.fpt-banner{width:100%;height:220px;border-radius:12px;overflow:hidden;background-size:cover;background-repeat:no-repeat;background-position:center;position:relative;margin:12px 0;image-rendering:-webkit-optimize-contrast;image-rendering:crisp-edges;}
.fpt-banner::after{content:'';position:absolute;inset:0;background:linear-gradient(90deg,rgba(10,20,40,.4) 0%,rgba(10,20,40,.1) 50%,transparent 100%);}
.fpt-banner__text{position:absolute;left:24px;top:50%;transform:translateY(-50%);z-index:1;}
.fpt-banner__text h2{font-size:20px;font-weight:800;color:#fff;margin:0 0 3px;text-shadow:0 2px 8px rgba(0,0,0,.4);}
.fpt-banner__text p{font-size:12px;color:rgba(255,255,255,.95);margin:0;text-shadow:0 1px 4px rgba(0,0,0,.4);}

/* Layout */
.fpt-layout{display:grid;grid-template-columns:220px 1fr;gap:12px;padding:12px 0 40px;align-items:start;}
@media(max-width:991px){.fpt-layout{grid-template-columns:1fr;}}

/* ── Sidebar ── */
.fpt-sb{background:rgba(255,255,255,0.65);backdrop-filter:blur(12px);border-radius:16px;border:1px solid rgba(255,255,255,0.8);position:sticky;top:76px;overflow-y:auto;max-height:calc(100vh - 90px);box-shadow:0 4px 24px rgba(15,23,42,.08);align-self:start;}
.fpt-sb__head{padding:9px 16px;display:flex;align-items:center;gap:8px;min-height:45px;}
.fpt-sb__head h3{font-size:13px;font-weight:800;color:#fff;margin:0;}
.fpt-sb__head i{font-size:13px;color:#fff;}

.fpt-fg{border-bottom:1px solid rgba(0,0,0,0.06);}
.fpt-fg__head{padding:11px 16px;display:flex;align-items:center;justify-content:space-between;cursor:pointer;user-select:none;}
.fpt-fg__head span{font-size:12px;font-weight:700;color:#1e293b;}
.fpt-fg__head i{font-size:10px;color:#94a3b8;transition:transform .2s;}
.fpt-fg__head.open i{transform:rotate(180deg);}
.fpt-fg__body{padding:6px 12px 14px;display:none;}
.fpt-fg__head.open + .fpt-fg__body{display:block;}

/* Brand grid */
.fpt-brand-grid{display:grid;grid-template-columns:1fr 1fr;gap:6px;margin-bottom:6px;}
.fpt-brand-btn{padding:8px 6px;border:1.5px solid rgba(200,210,230,0.6);border-radius:8px;background:rgba(255,255,255,0.6);font-size:11px;font-weight:700;color:#334155;cursor:pointer;text-align:center;transition:border-color .15s, color .15s;font-family:"Be Vietnam Pro",sans-serif;display:flex;align-items:center;justify-content:center;min-height:36px;outline:none;-webkit-tap-highlight-color:transparent;}
.fpt-brand-btn:focus,.fpt-brand-btn:active{outline:none !important;box-shadow:none !important;background:#e0f2fe !important;border:2px solid #38bdf8 !important;color:#0ea5e9 !important;}
.fpt-brand-btn:hover{border-color:#0ea5e9;color:#0ea5e9;background:rgba(14,165,233,.08);}
.fpt-brand-btn.active{background:#e0f2fe !important;border:2px solid #38bdf8 !important;color:#0ea5e9 !important;box-shadow:none !important;font-weight:700 !important;}
.fpt-brand-all-btn{width:100%;padding:9px;border:1.5px solid rgba(200,210,230,0.6);border-radius:8px;background:rgba(255,255,255,0.6);font-size:12px;font-weight:700;color:#334155;cursor:pointer;text-align:center;transition:border-color .15s, color .15s;font-family:"Be Vietnam Pro",sans-serif;display:flex;align-items:center;justify-content:center;min-height:38px;outline:none;-webkit-tap-highlight-color:transparent;}
.fpt-brand-all-btn:focus,.fpt-brand-all-btn:active{outline:none !important;box-shadow:none !important;background:#e0f2fe !important;border:2px solid #38bdf8 !important;color:#0ea5e9 !important;}
.fpt-brand-all-btn:hover{border-color:#0ea5e9;color:#0ea5e9;background:rgba(14,165,233,.08);}
.fpt-brand-all-btn.active{background:#e0f2fe !important;border:2px solid #38bdf8 !important;color:#0ea5e9 !important;box-shadow:none !important;font-weight:700 !important;}

/* Need grid */
.fpt-need-grid{display:grid;grid-template-columns:1fr 1fr;gap:6px;}
.fpt-need-btn{padding:9px 6px;border:1.5px solid rgba(200,210,230,0.6);border-radius:10px;background:rgba(255,255,255,0.6);font-size:10px;font-weight:600;color:#334155;cursor:pointer;text-align:center;transition:all .15s;display:flex;flex-direction:column;align-items:center;gap:5px;font-family:"Be Vietnam Pro",sans-serif;}
.fpt-need-btn i{font-size:17px;color:#0ea5e9;}
.fpt-need-btn:hover,.fpt-need-btn.active{border-color:#0ea5e9;color:#0ea5e9;background:rgba(14,165,233,.08);}
.fpt-need-btn.active i{color:#0ea5e9;}
/* Nút brand logo trong sidebar */
.fpt-brand-logo-btn{display:flex;align-items:center;justify-content:center;border:1.5px solid rgba(200,210,230,0.6);border-radius:8px;background:rgba(255,255,255,0.6);cursor:pointer;transition:all .15s;}
.fpt-brand-logo-btn:hover,.fpt-brand-logo-btn.active{border-color:#0ea5e9;background:rgba(14,165,233,.08);}
.fpt-brand-logo-btn img{filter:grayscale(1);opacity:.7;transition:all .15s;}
.fpt-brand-logo-btn:hover img,.fpt-brand-logo-btn.active img{filter:grayscale(0);opacity:1;}

/* Thanh thương hiệu nổi bật */
.fpt-brands-bar{display:flex;align-items:center;justify-content:space-between;gap:8px;background:rgba(255,255,255,0.65);backdrop-filter:blur(10px);border-radius:12px;border:1px solid rgba(255,255,255,0.8);padding:10px 14px;margin-bottom:8px;overflow-x:auto;scrollbar-width:none;box-shadow:0 2px 10px rgba(15,23,42,.06);}
.fpt-brands-bar::-webkit-scrollbar{display:none;}
.fpt-bb-btn{flex:1;height:38px;min-width:60px;padding:4px 12px;border:1.5px solid rgba(200,210,230,0.6);border-radius:9px;background:rgba(255,255,255,0.6);cursor:pointer;display:flex;align-items:center;justify-content:center;transition:all .15s;}
.fpt-bb-btn img{height:16px;object-fit:contain;max-width:60px;filter:grayscale(1);opacity:.7;transition:all .15s;}
.fpt-bb-btn:hover,.fpt-bb-btn.active{border-color:#0ea5e9;background:rgba(14,165,233,.08);}
.fpt-bb-btn:hover img,.fpt-bb-btn.active img{filter:grayscale(0);opacity:1;}
.fpt-bb-btn--all{font-size:11px;font-weight:700;color:#64748b;}
.fpt-bb-btn--all.active,.fpt-bb-btn--all:hover{color:#0ea5e9;}

/* Thanh nhu cầu */
.fpt-needs-bar{display:flex;align-items:center;justify-content:space-between;gap:8px;background:rgba(255,255,255,0.65);backdrop-filter:blur(10px);border-radius:12px;border:1px solid rgba(255,255,255,0.8);padding:10px 14px;margin-bottom:12px;overflow-x:auto;scrollbar-width:none;box-shadow:0 2px 10px rgba(15,23,42,.06);}
.fpt-needs-bar::-webkit-scrollbar{display:none;}
.fpt-nb-btn{flex:1;display:flex;align-items:center;justify-content:center;gap:6px;padding:8px 10px;border:1.5px solid rgba(200,210,230,0.6);border-radius:20px;background:rgba(255,255,255,0.6);font-size:12px;font-weight:600;color:#334155;cursor:pointer;transition:all .15s;white-space:nowrap;font-family:"Be Vietnam Pro",sans-serif;}
.fpt-nb-btn i{font-size:13px;color:#94a3b8;transition:color .15s;}
.fpt-nb-btn:hover,.fpt-nb-btn.active{border-color:#0ea5e9;color:#0ea5e9;background:rgba(14,165,233,.08);}
.fpt-nb-btn:hover i,.fpt-nb-btn.active i{color:#0ea5e9;}
.fpt-show-more{font-size:11px;color:#0ea5e9;font-weight:600;cursor:pointer;background:none;border:none;padding:2px 0;font-family:inherit;}

/* Radio list */
.fpt-radio-list{display:flex;flex-direction:column;gap:0;}
.fpt-radio-list label{display:flex;align-items:center;gap:8px;font-size:12px;color:#1e293b;cursor:pointer;font-weight:500;padding:6px 4px;border-radius:7px;transition:background .12s;line-height:1.4;}
.fpt-radio-list label:hover{background:rgba(14,165,233,.07);}
.fpt-radio-list input{accent-color:#0ea5e9;width:14px;height:14px;cursor:pointer;flex-shrink:0;}

/* Price range */
.fpt-price-inputs{display:flex;gap:6px;align-items:center;margin-top:10px;}
.fpt-price-inputs input{flex:1;min-width:0;padding:7px 10px;border:1.5px solid rgba(200,210,230,0.7);border-radius:8px;font-size:11px;font-family:inherit;outline:none;color:#0f172a;background:rgba(255,255,255,0.7);transition:border-color .2s,box-shadow .2s;}
.fpt-price-inputs input::-webkit-outer-spin-button,
.fpt-price-inputs input::-webkit-inner-spin-button{-webkit-appearance:none;margin:0;}
.fpt-price-inputs input[type=number]{-moz-appearance:textfield;}
.fpt-price-inputs input:focus{border-color:#0ea5e9;box-shadow:0 0 0 3px rgba(14,165,233,.12);}
.fpt-price-inputs span{font-size:12px;color:#94a3b8;flex-shrink:0;}
.fpt-price-hint{font-size:10px;color:#94a3b8;margin-top:5px;}
.fpt-price-apply{width:100%;margin-top:10px;padding:9px;border:none;border-radius:9px;color:#fff;font-family:inherit;font-size:12px;font-weight:700;cursor:pointer;letter-spacing:.01em;transition:opacity .2s;}
.fpt-price-apply:hover{opacity:.88;}
.fpt-price-inputs span{font-size:11px;color:#94a3b8;flex-shrink:0;}
.fpt-price-apply{width:100%;margin-top:8px;padding:7px;border:none;border-radius:7px;background:linear-gradient(135deg,#0ea5e9,#6366f1);color:#fff;font-family:inherit;font-size:11px;font-weight:700;cursor:pointer;}

/* ── Main ── */
.fpt-main{}

/* Filter chip bar */
.fpt-chipbar{background:rgba(255,255,255,0.65);backdrop-filter:blur(10px);border-radius:10px;border:1px solid rgba(255,255,255,0.8);padding:7px 10px;margin-bottom:10px;display:flex;align-items:center;gap:5px;flex-wrap:nowrap;overflow-x:auto;scrollbar-width:none;justify-content:space-between;box-shadow:0 2px 10px rgba(15,23,42,.06);}
.fpt-chipbar::-webkit-scrollbar{display:none;}
.fpt-chipbar__label{font-size:11px;font-weight:700;color:#64748b;white-space:nowrap;flex-shrink:0;}
.fpt-chip{flex:1;padding:4px 6px;border-radius:14px;border:1.5px solid #e2e8f0;background:transparent;font-size:11px;font-weight:600;color:#475569;cursor:pointer;transition:all .15s;white-space:nowrap;text-align:center;outline:none;}
.fpt-chip:hover{border-color:#94a3b8;color:#334155;background:rgba(255,255,255,0.5);}
.fpt-chip:focus, .fpt-chip:active { outline:none; box-shadow: 0 0 0 2px rgba(56,189,248,0.5) !important; }
.fpt-chip:focus:not(:focus-visible) { box-shadow: none !important; }
.fpt-chip.active{
  background:#e0f2fe !important;
  border:2px solid #38bdf8 !important;
  font-weight:700 !important;
  box-shadow:0 2px 12px rgba(56,189,248,.3) !important;
  color:#0ea5e9 !important;
  outline:none !important;
}

/* Result bar */
.fpt-rbar{display:flex;align-items:center;justify-content:space-between;margin-bottom:10px;flex-wrap:wrap;gap:6px;}
.fpt-rbar__count{font-size:12px;color:#64748b;}
.fpt-rbar__count strong{color:#0f172a;}
.fpt-rbar__sort{display:flex;align-items:center;gap:6px;font-size:12px;color:#64748b;}
.fpt-rbar__sort select{padding:5px 10px;border:1.5px solid rgba(255,255,255,0.7);border-radius:7px;font-size:11px;font-family:inherit;outline:none;color:#334155;background:rgba(255,255,255,0.6);backdrop-filter:blur(8px);cursor:pointer;}
.fpt-rbar__sort select:focus{border-color:#0ea5e9;}

/* Product grid */
.fpt-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:8px;}
@media(max-width:1199px){.fpt-grid{grid-template-columns:repeat(3,1fr);}}
@media(max-width:767px){.fpt-grid{grid-template-columns:repeat(2,1fr);}}

/* Product card */
.fpt-card{background:rgba(255,255,255,0.7);backdrop-filter:blur(8px);border-radius:10px;border:1px solid rgba(255,255,255,0.8);overflow:hidden;transition:transform .2s,box-shadow .2s;display:flex;flex-direction:column;position:relative;}
.fpt-card:hover{transform:translateY(-2px);box-shadow:0 8px 24px rgba(15,23,42,.12);border-color:rgba(14,165,233,.3);}
.fpt-card__img{padding:10px;background:rgba(255,255,255,0.8);position:relative;}
.fpt-card__img img{width:100%;height:120px;object-fit:contain;display:block;}
.fpt-card__badge{position:absolute;top:6px;left:6px;color:#fff;font-size:9px;font-weight:700;padding:3px 8px;border-radius:6px;letter-spacing:.02em;}
.fpt-card__body{padding:8px 10px 10px;flex:1;display:flex;flex-direction:column;}
.fpt-card__name{font-size:11px;font-weight:600;color:#0f172a;line-height:1.45;margin:0 0 5px;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;}
.fpt-card__name a{color:inherit;text-decoration:none;}
.fpt-card__name a:hover{color:#0ea5e9;}
.fpt-card__install{font-size:10px;color:#10b981;font-weight:600;margin-bottom:4px;}
.fpt-card__price{font-size:14px;font-weight:800;color:#0ea5e9;letter-spacing:-.02em;margin:0 0 8px;}
.fpt-card__actions{display:flex;gap:5px;margin-top:auto;}
.fpt-card__btn-main{flex:1;padding:9px 10px;border:none;border-radius:8px;background:linear-gradient(135deg,#0ea5e9,#6366f1);color:#fff !important;font-family:inherit;font-size:12px;font-weight:700;cursor:pointer;text-align:center;text-decoration:none;display:flex;align-items:center;justify-content:center;transition:opacity .2s;line-height:1;}
.fpt-card__btn-main:hover{opacity:.88;color:#fff !important;}
.fpt-card__btn-compare{padding:9px 10px;border:1.5px solid rgba(200,210,230,0.7);border-radius:8px;background:rgba(255,255,255,0.6);font-size:11px;font-weight:600;color:#64748b;cursor:pointer;white-space:nowrap;transition:all .15s;display:flex;align-items:center;justify-content:center;}
.fpt-card__btn-compare:hover{border-color:#0ea5e9;color:#0ea5e9;background:rgba(14,165,233,.1);}

/* Empty */
.fpt-empty{text-align:center;padding:40px 20px;color:#94a3b8;grid-column:1/-1;}
.fpt-empty i{font-size:36px;margin-bottom:10px;display:block;}

/* Pagination */
.fpt-pagi{display:flex;justify-content:center;gap:5px;margin-top:20px;flex-wrap:wrap;}
.fpt-pagi-btn{min-width:34px;height:34px;padding:0 8px;border-radius:7px;border:1.5px solid #e2e8f0;background:#fff;font-family:inherit;font-size:12px;font-weight:600;color:#334155;cursor:pointer;transition:all .15s;display:flex;align-items:center;justify-content:center;}
.fpt-pagi-btn:hover{border-color:#0ea5e9;color:#0ea5e9;}
.fpt-pagi-btn.active{background:#fff;border-color:#0ea5e9;color:#0ea5e9;font-weight:700;}

/* ── Deal banner ── */
.fpt-deal-banner{
  background:linear-gradient(135deg,#0f172a 0%,#0c4a6e 50%,#1e1b4b 100%);
  border-radius:16px; padding:32px;
  display:grid; grid-template-columns:25% 1fr; gap:32px; align-items:center;
  margin-top:28px; overflow:hidden; position:relative;
}
@media(max-width:991px){.fpt-deal-banner{grid-template-columns:1fr;}}
.fpt-deal-banner::before{
  content:''; position:absolute; inset:0;
  background:radial-gradient(ellipse 60% 80% at 0% 50%,rgba(14,165,233,.2),transparent);
  pointer-events:none;
}
.fpt-deal-banner__left{position:relative; z-index:1;}
.fpt-deal-banner__tag{
  display:inline-flex; align-items:center; gap:5px;
  background:rgba(14,165,233,.2); border:1px solid rgba(14,165,233,.35);
  color:#38bdf8; font-size:11px; font-weight:700;
  padding:3px 10px; border-radius:16px; margin-bottom:10px;
}
.fpt-deal-banner__title{font-size:22px;font-weight:800;color:#fff;margin:0 0 16px;line-height:1.3;letter-spacing:-.02em;}
.fpt-deal-banner__btn{
  display:inline-flex; align-items:center; gap:7px;
  padding:10px 24px; border-radius:8px;
  background:linear-gradient(135deg,#22d3ee,#0ea5e9);
  color:#fff; font-family:inherit; font-size:13px; font-weight:700;
  text-decoration:none; transition:opacity .2s;
}
.fpt-deal-banner__btn:hover{opacity:.88;color:#fff;}
.fpt-deal-banner__products{
  display:grid; grid-template-columns:repeat(4, 1fr); gap:12px;
  position:relative; z-index:1;
}
@media(max-width:991px){.fpt-deal-banner__products{grid-template-columns:repeat(2, 1fr);}}
@media(max-width:575px){.fpt-deal-banner__products{grid-template-columns:1fr;}}
.fpt-deal-item{
  background:rgba(255,255,255,.08);
  border:1px solid rgba(255,255,255,.12); border-radius:10px;
  padding:12px; text-align:center; text-decoration:none;
  transition:background .2s;
}
.fpt-deal-item:hover{background:rgba(255,255,255,.15);}
.fpt-deal-item img{width:100%;height:90px;object-fit:contain;display:block;margin-bottom:8px;}
.fpt-deal-item__name{font-size:11px;color:rgba(255,255,255,.8);margin:0 0 4px;line-height:1.4;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;}
.fpt-deal-item__price{font-size:13px;font-weight:700;color:#38bdf8;margin:0;}

/* ── Blog ── */
.fpt-blog{
  display:grid; grid-template-columns:1fr 1fr; gap:0;
  border-radius:16px; overflow:hidden;
  margin-top:20px; margin-bottom:40px;
  border:1px solid #e2e8f0;
}
@media(max-width:767px){.fpt-blog{grid-template-columns:1fr;}}
.fpt-blog__img img{width:100%;height:100%;object-fit:cover;display:block;min-height:260px;}
.fpt-blog__body{background:#fff;padding:36px 32px;display:flex;flex-direction:column;justify-content:center;}
.fpt-blog__tag{
  display:inline-flex; align-items:center; gap:5px;
  background:linear-gradient(135deg,rgba(14,165,233,.1),rgba(99,102,241,.1));
  border:1px solid rgba(14,165,233,.2);
  color:#0ea5e9; font-size:11px; font-weight:700;
  padding:3px 10px; border-radius:16px; margin-bottom:12px; width:fit-content;
}
.fpt-blog__title{font-size:20px;font-weight:800;color:#0f172a;margin:0 0 12px;line-height:1.3;letter-spacing:-.02em;}
.fpt-blog__text{font-size:13px;color:#64748b;line-height:1.7;margin:0 0 20px;}
.fpt-blog__btn{
  display:inline-flex; align-items:center; gap:7px;
  padding:9px 20px; border-radius:8px; width:fit-content;
  background:linear-gradient(135deg,#0ea5e9,#6366f1);
  color:#fff; font-family:inherit; font-size:12px; font-weight:700;
  text-decoration:none; transition:opacity .2s;
}
.fpt-blog__btn:hover{opacity:.88;color:#fff;}
</style>

<input type="number" value="<?php echo e($danhmuc->id); ?>" id="id_danh_muc" hidden>

<div class="fpt-page" id="app2" v-cloak>

  
  <div class="fpt-bc">
    <div class="container">
      <a href="/">Trang chủ</a> <span style="margin:0 5px;opacity:.4;">/</span>
      <a href="#">Danh mục</a> <span style="margin:0 5px;opacity:.4;">/</span>
      <span><?php echo e($danhmuc->ten_danh_muc); ?></span>
    </div>
  </div>

  <div class="container">

    
    <div class="fpt-banner" style="background-image:url('<?php echo e($danhmuc->hinh_anh); ?>')">
      <div class="fpt-banner__text">
        <h2><?php echo e($danhmuc->ten_danh_muc); ?></h2>
        <p>Laptop chính hãng — giá tốt nhất thị trường</p>
      </div>
    </div>

    
    <div class="fpt-brands-bar">
      <button class="fpt-bb-btn" :class="{active:brandFilter==='asus'}" @click="setBrand('asus')">
        <img src="https://upload.wikimedia.org/wikipedia/commons/2/2e/ASUS_Logo.svg" alt="ASUS">
      </button>
      <button class="fpt-bb-btn" :class="{active:brandFilter==='apple'}" @click="setBrand('apple')">
        <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg" alt="Apple">
      </button>
      <button class="fpt-bb-btn" :class="{active:brandFilter==='dell'}" @click="setBrand('dell')">
        <img src="https://upload.wikimedia.org/wikipedia/commons/4/48/Dell_Logo.svg" alt="Dell">
      </button>
      <button class="fpt-bb-btn" :class="{active:brandFilter==='hp'}" @click="setBrand('hp')">
        <img src="https://upload.wikimedia.org/wikipedia/commons/a/ad/HP_logo_2012.svg" alt="HP">
      </button>
      <button class="fpt-bb-btn" :class="{active:brandFilter==='lenovo'}" @click="setBrand('lenovo')">
        <img src="https://upload.wikimedia.org/wikipedia/commons/b/b8/Lenovo_logo_2015.svg" alt="Lenovo">
      </button>
      <button class="fpt-bb-btn" :class="{active:brandFilter==='acer'}" @click="setBrand('acer')">
        <img src="https://upload.wikimedia.org/wikipedia/commons/0/00/Acer_2011.svg" alt="Acer">
      </button>
      <button class="fpt-bb-btn" :class="{active:brandFilter==='msi'}" @click="setBrand('msi')">
        <span style="color:#cc0000;font-weight:900;font-size:13px;">MSI</span>
      </button>
      <button class="fpt-bb-btn fpt-bb-btn--all" :class="{active:brandFilter===''}" @click="setBrand('')">Tất cả</button>
    </div>

    
    <div class="fpt-needs-bar">
      <button class="fpt-nb-btn" :class="{active:needFilter==='gaming'}" @click="toggleNeed('gaming')">
        <i class="fa-solid fa-gamepad"></i><span>Gaming</span>
      </button>
      <button class="fpt-nb-btn" :class="{active:needFilter==='sinhvien'}" @click="toggleNeed('sinhvien')">
        <i class="fa-solid fa-graduation-cap"></i><span>Sinh viên</span>
      </button>
      <button class="fpt-nb-btn" :class="{active:needFilter==='mong'}" @click="toggleNeed('mong')">
        <i class="fa-solid fa-feather"></i><span>Mỏng nhẹ</span>
      </button>
      <button class="fpt-nb-btn" :class="{active:needFilter==='doanhnhan'}" @click="toggleNeed('doanhnhan')">
        <i class="fa-solid fa-briefcase"></i><span>Doanh nhân</span>
      </button>
      <button class="fpt-nb-btn" :class="{active:needFilter==='dohoa'}" @click="toggleNeed('dohoa')">
        <i class="fa-solid fa-pen-ruler"></i><span>Đồ họa</span>
      </button>
      <button class="fpt-nb-btn" :class="{active:needFilter==='vanphong'}" @click="toggleNeed('vanphong')">
        <i class="fa-solid fa-desktop"></i><span>Văn phòng</span>
      </button>
    </div>

    
    <div class="fpt-layout">

      
      <aside class="fpt-sb">
        <div class="fpt-sb__head">
          <i class="fa-solid fa-sliders"></i>
          <h3>Bộ lọc tìm kiếm</h3>
        </div>

        
        <div class="fpt-fg">
          <div class="fpt-fg__head open" onclick="toggleFg(this)">
            <span>Hãng sản xuất</span><i class="fa-solid fa-chevron-down"></i>
          </div>
          <div class="fpt-fg__body">
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:6px;">
              <button class="fpt-brand-btn" :class="{active:brandFilter==='asus'}" @click="setBrand('asus')">ASUS</button>
              <button class="fpt-brand-btn" :class="{active:brandFilter==='apple'}" @click="setBrand('apple')">Apple</button>
              <button class="fpt-brand-btn" :class="{active:brandFilter==='dell'}" @click="setBrand('dell')">Dell</button>
              <button class="fpt-brand-btn" :class="{active:brandFilter==='hp'}" @click="setBrand('hp')">HP</button>
              <button class="fpt-brand-btn" :class="{active:brandFilter==='lenovo'}" @click="setBrand('lenovo')">Lenovo</button>
              <button class="fpt-brand-btn" :class="{active:brandFilter==='acer'}" @click="setBrand('acer')">Acer</button>
              <button class="fpt-brand-btn" :class="{active:brandFilter==='msi'}" @click="setBrand('msi')">MSI</button>
            </div>
            <button class="fpt-brand-all-btn" :class="{active:brandFilter===''}" @click="setBrand('')">Tất cả</button>
          </div>
        </div>

        
        <div class="fpt-fg">
          <div class="fpt-fg__head open" onclick="toggleFg(this)">
            <span>Mức giá</span><i class="fa-solid fa-chevron-down"></i>
          </div>
          <div class="fpt-fg__body">
            <div class="fpt-radio-list">
              <label><input type="radio" name="price" value="" v-model="priceFilter"> Tất cả</label>
              <label><input type="radio" name="price" value="0-10" v-model="priceFilter"> Dưới 10 triệu</label>
              <label><input type="radio" name="price" value="10-15" v-model="priceFilter"> 10 – 15 triệu</label>
              <label><input type="radio" name="price" value="15-20" v-model="priceFilter"> 15 – 20 triệu</label>
              <label><input type="radio" name="price" value="20-25" v-model="priceFilter"> 20 – 25 triệu</label>
              <label><input type="radio" name="price" value="25-30" v-model="priceFilter"> 25 – 30 triệu</label>
              <label><input type="radio" name="price" value="30-999" v-model="priceFilter"> Trên 30 triệu</label>
            </div>
            <div class="fpt-price-inputs">
              <input type="number" v-model="priceMin" placeholder="VD: 10" min="0">
              <span>–</span>
              <input type="number" v-model="priceMax" placeholder="VD: 30" min="0">
            </div>
            <div class="fpt-price-hint">Đơn vị: triệu ₫ (VD: nhập 10 = 10 triệu)</div>
            <button class="fpt-price-apply" @click="applyCustomPrice">Áp dụng</button>
          </div>
        </div>

        
        <div class="fpt-fg">
          <div class="fpt-fg__head open" onclick="toggleFg(this)">
            <span>RAM</span><i class="fa-solid fa-chevron-down"></i>
          </div>
          <div class="fpt-fg__body">
            <div class="fpt-brand-grid">
              <button class="fpt-brand-btn" :class="{active:ramFilter===''}" @click="ramFilter=''">Tất cả</button>
              <button class="fpt-brand-btn" :class="{active:ramFilter==='8GB'}" @click="ramFilter='8GB'">8GB</button>
              <button class="fpt-brand-btn" :class="{active:ramFilter==='16GB'}" @click="ramFilter='16GB'">16GB</button>
              <button class="fpt-brand-btn" :class="{active:ramFilter==='32GB'}" @click="ramFilter='32GB'">32GB</button>
            </div>
          </div>
        </div>

        
        <div class="fpt-fg">
          <div class="fpt-fg__head open" onclick="toggleFg(this)">
            <span>Ổ cứng</span><i class="fa-solid fa-chevron-down"></i>
          </div>
          <div class="fpt-fg__body">
            <div class="fpt-brand-grid">
              <button class="fpt-brand-btn" :class="{active:storageFilter===''}" @click="storageFilter=''">Tất cả</button>
              <button class="fpt-brand-btn" :class="{active:storageFilter==='256GB'}" @click="storageFilter='256GB'">256GB</button>
              <button class="fpt-brand-btn" :class="{active:storageFilter==='512GB'}" @click="storageFilter='512GB'">512GB</button>
              <button class="fpt-brand-btn" :class="{active:storageFilter==='1TB'}" @click="storageFilter='1TB'">1TB</button>
            </div>
          </div>
        </div>

        
        <div class="fpt-fg">
          <div class="fpt-fg__head open" onclick="toggleFg(this)">
            <span>Nhu cầu</span><i class="fa-solid fa-chevron-down"></i>
          </div>
          <div class="fpt-fg__body">
            <div class="fpt-need-grid">
              <button class="fpt-need-btn" :class="{active:needFilter==='gaming'}" @click="toggleNeed('gaming')">
                <i class="fa-solid fa-gamepad"></i><span>Gaming - Đồ họa</span>
              </button>
              <button class="fpt-need-btn" :class="{active:needFilter==='sinhvien'}" @click="toggleNeed('sinhvien')">
                <i class="fa-solid fa-graduation-cap"></i><span>Sinh viên</span>
              </button>
              <button class="fpt-need-btn" :class="{active:needFilter==='mong'}" @click="toggleNeed('mong')">
                <i class="fa-solid fa-feather"></i><span>Mỏng nhẹ</span>
              </button>
              <button class="fpt-need-btn" :class="{active:needFilter==='doanhnhan'}" @click="toggleNeed('doanhnhan')">
                <i class="fa-solid fa-briefcase"></i><span>Doanh nhân</span>
              </button>
            </div>
          </div>
        </div>

        
        <div class="fpt-fg">
          <div class="fpt-fg__head open" onclick="toggleFg(this)">
            <span>GPU</span><i class="fa-solid fa-chevron-down"></i>
          </div>
          <div class="fpt-fg__body">
            <div class="fpt-radio-list">
              <label><input type="radio" name="gpu" value="" v-model="gpuFilter"> Tất cả</label>
              <label><input type="radio" name="gpu" value="RTX 40" v-model="gpuFilter"> NVIDIA RTX 40 Series</label>
              <label><input type="radio" name="gpu" value="RTX 30" v-model="gpuFilter"> NVIDIA RTX 30 Series</label>
              <label><input type="radio" name="gpu" value="GTX 16" v-model="gpuFilter"> NVIDIA GTX 16 Series</label>
              <label><input type="radio" name="gpu" value="Intel Iris" v-model="gpuFilter"> Intel Iris Xe</label>
              <label><input type="radio" name="gpu" value="AMD Radeon" v-model="gpuFilter"> AMD Radeon</label>
            </div>
          </div>
        </div>

        
        <div class="fpt-fg">
          <div class="fpt-fg__head open" onclick="toggleFg(this)">
            <span>RAM</span><i class="fa-solid fa-chevron-down"></i>
          </div>
          <div class="fpt-fg__body">
            <div class="fpt-brand-grid">
              <button class="fpt-brand-btn" :class="{active:ramFilter===''}" @click="ramFilter=''">Tất cả</button>
              <button class="fpt-brand-btn" :class="{active:ramFilter==='8GB'}" @click="ramFilter='8GB'">8GB</button>
              <button class="fpt-brand-btn" :class="{active:ramFilter==='16GB'}" @click="ramFilter='16GB'">16GB</button>
              <button class="fpt-brand-btn" :class="{active:ramFilter==='32GB'}" @click="ramFilter='32GB'">32GB</button>
              <button class="fpt-brand-btn" :class="{active:ramFilter==='64GB'}" @click="ramFilter='64GB'">64GB</button>
            </div>
          </div>
        </div>

        
        <div class="fpt-fg">
          <div class="fpt-fg__head open" onclick="toggleFg(this)">
            <span>Ổ cứng</span><i class="fa-solid fa-chevron-down"></i>
          </div>
          <div class="fpt-fg__body">
            <div class="fpt-brand-grid">
              <button class="fpt-brand-btn" :class="{active:storageFilter===''}" @click="storageFilter=''">Tất cả</button>
              <button class="fpt-brand-btn" :class="{active:storageFilter==='256GB'}" @click="storageFilter='256GB'">256GB</button>
              <button class="fpt-brand-btn" :class="{active:storageFilter==='512GB'}" @click="storageFilter='512GB'">512GB</button>
              <button class="fpt-brand-btn" :class="{active:storageFilter==='1TB'}" @click="storageFilter='1TB'">1TB</button>
              <button class="fpt-brand-btn" :class="{active:storageFilter==='2TB'}" @click="storageFilter='2TB'">2TB</button>
            </div>
          </div>
        </div>

        
        <div class="fpt-fg">
          <div class="fpt-fg__head open" onclick="toggleFg(this)">
            <span>Kích thước màn hình</span><i class="fa-solid fa-chevron-down"></i>
          </div>
          <div class="fpt-fg__body">
            <div class="fpt-brand-grid">
              <button class="fpt-brand-btn" :class="{active:screenFilter===''}" @click="screenFilter=''">Tất cả</button>
              <button class="fpt-brand-btn" :class="{active:screenFilter==='13'}" @click="screenFilter='13'">13"</button>
              <button class="fpt-brand-btn" :class="{active:screenFilter==='14'}" @click="screenFilter='14'">14"</button>
              <button class="fpt-brand-btn" :class="{active:screenFilter==='15'}" @click="screenFilter='15'">15"</button>
              <button class="fpt-brand-btn" :class="{active:screenFilter==='16'}" @click="screenFilter='16'">16"</button>
              <button class="fpt-brand-btn" :class="{active:screenFilter==='17'}" @click="screenFilter='17'">17"</button>
            </div>
          </div>
        </div>

      </aside>

      
      <div class="fpt-main">

        
        <div class="fpt-chipbar">
          <span class="fpt-chipbar__label">Xu hướng:</span>
          <button class="fpt-chip" :class="{active:SortProd===''}" @click="SortProd='';SortProduct()">Nổi bật</button>
          <button class="fpt-chip" :class="{active:SortProd==='PRICEASC'}" @click="SortProd='PRICEASC';SortProduct()">Giá tăng dần</button>
          <button class="fpt-chip" :class="{active:SortProd==='PRICEDESC'}" @click="SortProd='PRICEDESC';SortProduct()">Giá giảm dần</button>
          <button class="fpt-chip" :class="{active:SortProd==='BESTSALE'}" @click="SortProd='BESTSALE';SortProduct()">Bán chạy</button>
          <button class="fpt-chip" :class="{active:priceFilter==='0-10'}" @click="priceFilter='0-10'">Dưới 10 triệu</button>
          <button class="fpt-chip" :class="{active:priceFilter==='10-15'}" @click="priceFilter='10-15'">10–15 triệu</button>
          <button class="fpt-chip" :class="{active:priceFilter==='15-20'}" @click="priceFilter='15-20'">15–20 triệu</button>
        </div>

        
        <div class="fpt-rbar">
          <p class="fpt-rbar__count">Tìm thấy <strong>{{ filteredProducts.length }}</strong> sản phẩm</p>
          <div class="fpt-rbar__sort">
            <span>Sắp xếp:</span>
            <select v-model="SortProd" @change="SortProduct()">
              <option value="">Mặc định</option>
              <option value="PRICEASC">Giá thấp → cao</option>
              <option value="PRICEDESC">Giá cao → thấp</option>
              <option value="NAMEAZ">Tên A → Z</option>
              <option value="NAMEZA">Tên Z → A</option>
              <option value="BESTSALE">Bán chạy nhất</option>
            </select>
          </div>
        </div>

        
        <div class="fpt-grid">
          <template v-if="filteredProducts.length">
            <div class="fpt-card" v-for="(v,k) in filteredProducts" :key="k">
              <div class="fpt-card__img">
                <span class="fpt-card__badge">Chính hãng</span>
                <a :href="'/home/product-detail/'+v.id">
                  <img :src="v.hinh_anh" :alt="v.ten_san_pham">
                </a>
              </div>
              <div class="fpt-card__body">
                <p class="fpt-card__name"><a :href="'/home/product-detail/'+v.id">{{ v.ten_san_pham }}</a></p>
                <p class="fpt-card__install"><i class="fa-solid fa-credit-card" style="font-size:9px;"></i> Trả góp 0%</p>
                <p class="fpt-card__price">{{ formatNumber(v.gia) }}₫</p>
                <div class="fpt-card__actions">
                  <a :href="'/home/product-detail/'+v.id" class="fpt-card__btn-main">Xem chi tiết</a>
                  <button class="fpt-card__btn-compare" disabled>+ So sánh</button>
                </div>
              </div>
            </div>
          </template>
          <div class="fpt-empty" v-else>
            <i class="fa-solid fa-box-open"></i>
            <p style="font-size:14px;font-weight:600;color:#334155;">Không tìm thấy sản phẩm</p>
            <p style="font-size:12px;">Thử thay đổi bộ lọc</p>
          </div>
        </div>

        
        <div class="fpt-pagi">
          <button class="fpt-pagi-btn" v-if="currentPage>1" @click="changePage(currentPage-1)">
            <i class="fa-solid fa-chevron-left" style="font-size:10px;"></i>
          </button>
          <button v-for="page in lastPage" :key="page" class="fpt-pagi-btn"
            :class="{'active':currentPage===page}" @click="changePage(page)">{{ page }}</button>
          <button class="fpt-pagi-btn" v-if="currentPage<lastPage" @click="changePage(currentPage+1)">
            <i class="fa-solid fa-chevron-right" style="font-size:10px;"></i>
          </button>
        </div>

        
        <div class="fpt-load-more" v-if="currentPage < lastPage">
          <button class="fpt-load-more-btn" @click="changePage(currentPage+1)">
            Xem thêm {{ (lastPage - currentPage) * List_products.per_page }} kết quả
            <i class="fa-solid fa-chevron-down"></i>
          </button>
        </div>

      </div>
    </div>

    
    <div class="fpt-deal-banner">
      <div class="fpt-deal-banner__left">
        <div class="fpt-deal-banner__tag"><i class="fa-solid fa-bolt"></i> Đừng bỏ lỡ</div>
        <h3 class="fpt-deal-banner__title">Laptop giá chạm đáy.<br>Đừng bỏ lỡ!</h3>
        <a href="/home/all-product" class="fpt-deal-banner__btn">
          Khám phá ngay <i class="fa-solid fa-arrow-right"></i>
        </a>
      </div>
      <div class="fpt-deal-banner__products">
        <?php $__currentLoopData = array_slice($bestSales->all() ?? [], 0, 4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="/home/product-detail/<?php echo e($v->id); ?>" class="fpt-deal-item">
          <img src="<?php echo e($v->hinh_anh); ?>" alt="<?php echo e($v->ten_san_pham); ?>">
          <p class="fpt-deal-item__name"><?php echo e(Str::limit($v->ten_san_pham, 30)); ?></p>
          <p class="fpt-deal-item__price"><?php echo e(number_format($v->gia, 0, ',', '.')); ?>₫</p>
        </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>

    
    <div class="fpt-blog">
      <div class="fpt-blog__img">
        <img src="<?php echo e($danhmuc->hinh_anh); ?>" alt="<?php echo e($danhmuc->ten_danh_muc); ?>">
      </div>
      <div class="fpt-blog__body">
        <div class="fpt-blog__tag"><i class="fa-solid fa-lightbulb"></i> Tư vấn chọn laptop</div>
        <h3 class="fpt-blog__title">Bạn đang có kế hoạch mua một chiếc laptop mới?</h3>
        <p class="fpt-blog__text">
          Những không biết nên chọn mẫu laptop nào và cần xem xét những gì trước khi quyết định mua?
          Hãy để DT Store giúp bạn đưa ra quyết định đúng đắn. Chúng tôi tổng hợp tất cả các tiêu chí
          quan trọng nhất khi mua máy tính xách tay — từ hiệu năng, màn hình, pin đến thiết kế —
          để bạn có thể chọn được chiếc laptop phù hợp nhất với nhu cầu sử dụng của bạn.
        </p>
        <a href="/home/about-us/" class="fpt-blog__btn">
          Xem thêm <i class="fa-solid fa-chevron-down"></i>
        </a>
      </div>
    </div>

  </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
function toggleFg(el) {
  el.classList.toggle('open');
  var b = el.nextElementSibling;
  b.style.display = b.style.display === 'none' ? 'block' : 'none';
  // init: open by default
}
// init all open
document.querySelectorAll('.fpt-fg__head.open').forEach(function(el){
  el.nextElementSibling.style.display = 'block';
});

new Vue({
  el: '#app2',
  data: {
    List_products: {},
    currentPage: 1, lastPage: 1,
    SortProd: '',
    priceFilter: '',
    priceMin: '', priceMax: '',
    brandFilter: '',
    ramFilter: '',
    storageFilter: '',
    gpuFilter: '',
    screenFilter: '',
    needFilter: '',
  },
  computed: {
    filteredProducts() {
      if (!this.List_products.data) return [];
      var list = this.List_products.data;
      // Custom price range
      if (this.priceMin || this.priceMax) {
        var mn = (parseFloat(this.priceMin) || 0) * 1e6;
        var mx = (parseFloat(this.priceMax) || 999) * 1e6;
        list = list.filter(function(v){ return v.gia >= mn && v.gia <= mx; });
      } else if (this.priceFilter) {
        var p = this.priceFilter.split('-');
        var mn = parseFloat(p[0]) * 1e6, mx = parseFloat(p[1]) * 1e6;
        list = list.filter(function(v){ return v.gia >= mn && v.gia <= mx; });
      }
      // Brand
      if (this.brandFilter) {
        var b = this.brandFilter.toLowerCase();
        list = list.filter(function(v){ return v.ten_san_pham.toLowerCase().indexOf(b) !== -1; });
      }
      // RAM
      if (this.ramFilter) {
        var r = this.ramFilter;
        list = list.filter(function(v){ return v.ten_san_pham.indexOf(r) !== -1; });
      }
      // Storage
      if (this.storageFilter) {
        var s = this.storageFilter;
        list = list.filter(function(v){ return v.ten_san_pham.indexOf(s) !== -1; });
      }
      // GPU
      if (this.gpuFilter) {
        var g = this.gpuFilter;
        list = list.filter(function(v){ return v.ten_san_pham.indexOf(g) !== -1; });
      }
      // Screen
      if (this.screenFilter) {
        var sc = this.screenFilter;
        list = list.filter(function(v){ return v.ten_san_pham.indexOf(sc + '"') !== -1 || v.ten_san_pham.indexOf(sc + '.') !== -1; });
      }
      // Need
      var needMap = { gaming:'Gaming', sinhvien:'Sinh viên', mong:'Mỏng', doanhnhan:'Doanh nhân' };
      if (this.needFilter && needMap[this.needFilter]) {
        var nk = needMap[this.needFilter];
        list = list.filter(function(v){ return v.ten_san_pham.indexOf(nk) !== -1; });
      }
      return list;
    }
  },
  created() { this.loadData(); },
  methods: {
    loadData(page=1) {
      axios.post('<?php echo e(Route("DanhMucDataProduct")); ?>', { id: $('#id_danh_muc').val() }, { page })
        .then(res => {
          this.List_products = res.data.data;
          this.currentPage = res.data.data.current_page;
          this.lastPage = res.data.data.last_page;
        });
    },
    SortProduct() {
      if (!this.SortProd) { this.loadData(); return; }
      axios.post('<?php echo e(Route("sortProducts")); ?>', { select: this.SortProd, data: this.List_products })
        .then(res => { this.List_products.data = res.data.data; });
    },
    setBrand(b) { this.brandFilter = this.brandFilter === b ? '' : b; },
    toggleNeed(n) { this.needFilter = this.needFilter === n ? '' : n; },
    applyCustomPrice() { /* filter handled by computed */ },
    formatNumber(p) { return p.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","); },
    changePage(page) { this.loadData(page); },
  }
});
</script>

<script>
(function() {
  var bgBlue  = [240, 244, 248];
  var bgPeach = [255, 241, 230];
  var blue    = [74, 159, 232];
  var orange  = [238, 77, 45];
  var duration = 60000; // phải khớp với nav.blade.php

  function lerp(a, b, f) { return Math.round(a + (b - a) * f); }
  function rgb(r,g,b) { return 'rgb('+r+','+g+','+b+')'; }

  function tick() {
    // Dùng Date.now() % duration — giống hệt nav.blade.php để đồng bộ pha
    var elapsed = Date.now() % duration;
    var f = (Math.sin((elapsed / duration) * Math.PI * 2 - Math.PI / 2) + 1) / 2;

    // Background trang
    var col = rgb(lerp(bgBlue[0],bgPeach[0],f), lerp(bgBlue[1],bgPeach[1],f), lerp(bgBlue[2],bgPeach[2],f));
    document.documentElement.style.setProperty('background', col, 'important');
    document.body.style.setProperty('background', col, 'important');
    var header = document.querySelector('.site-header.colorlib-nav');
    if (header) header.style.setProperty('background', col, 'important');
    ['#colorlib-page','#colorlib-wrapper','.colorlib-main','.fpt-page'].forEach(function(sel){
      var el = document.querySelector(sel);
      if (el) el.style.setProperty('background', col, 'important');
    });

    // Gradient accent — cùng pha với topbar/header-main
    var c1 = rgb(lerp(blue[0],orange[0],f), lerp(blue[1],orange[1],f), lerp(blue[2],orange[2],f));
    var c2 = rgb(lerp(74,249,f), lerp(159,115,f), lerp(232,22,f));
    var grad = 'linear-gradient(135deg,'+c1+','+c2+')';

    // Nút Xem chi tiết
    document.querySelectorAll('.fpt-card__btn-main').forEach(function(el){
      el.style.setProperty('background', grad, 'important');
    });
    // Badge Chính hãng
    document.querySelectorAll('.fpt-card__badge').forEach(function(el){
      el.style.setProperty('background', grad, 'important');
    });
    // Thanh chipbar — giữ background trắng mờ
    document.querySelectorAll('.fpt-chipbar').forEach(function(el){
      el.style.setProperty('background', 'rgba(255,255,255,0.65)', 'important');
      el.style.setProperty('border-color', 'rgba(255,255,255,0.8)', 'important');
    });
    // Chip thường — reset về CSS
    document.querySelectorAll('.fpt-chip:not(.active)').forEach(function(el){
      el.style.removeProperty('background');
      el.style.removeProperty('color');
      el.style.removeProperty('border-color');
      el.style.removeProperty('border');
    });
    // Chip active — KHÔNG override, để CSS .fpt-chip.active tự xử lý
    document.querySelectorAll('.fpt-chip.active').forEach(function(el){
      el.style.removeProperty('background');
      el.style.removeProperty('color');
      el.style.removeProperty('border-color');
    });
    // Sidebar head
    var sbHead = document.querySelector('.fpt-sb__head');
    if (sbHead) sbHead.style.setProperty('background', grad, 'important');
    // Nút active bộ lọc — xanh nhạt như chip "Nổi bật"
    document.querySelectorAll('.fpt-bb-btn.active,.fpt-brand-btn.active,.fpt-nb-btn.active,.fpt-brand-logo-btn.active,.fpt-brand-all-btn.active').forEach(function(el){
      el.style.setProperty('background', '#e0f2fe', 'important');
      el.style.setProperty('color', '#0ea5e9', 'important');
      el.style.setProperty('border', '2px solid #38bdf8', 'important');
      el.style.setProperty('outline', 'none', 'important');
      el.style.setProperty('box-shadow', 'none', 'important');
    });
    // Nút KHÔNG active — reset về mặc định
    document.querySelectorAll('.fpt-bb-btn:not(.active),.fpt-brand-btn:not(.active),.fpt-nb-btn:not(.active),.fpt-brand-all-btn:not(.active)').forEach(function(el){
      el.style.removeProperty('background');
      el.style.removeProperty('color');
      el.style.removeProperty('border-color');
    });
    // Nút áp dụng giá
    document.querySelectorAll('.fpt-price-apply').forEach(function(el){
      el.style.setProperty('background', grad, 'important');
    });

    requestAnimationFrame(tick);
  }
  requestAnimationFrame(tick);
})();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('client.share.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Shop-laptop\resources\views/client/pages/danhmuc_page/index.blade.php ENDPATH**/ ?>