
<?php $__env->startSection('noi_dung'); ?>
<link rel="stylesheet" href="/assets_client/css/home-v2.css">

<?php
$allProds = collect($bestSales)->merge($ht_vv_products)->merge($gamming_products)->merge($dh_kt_products)->unique('id')->values();
$allProdsJson = json_encode($allProds->map(function($v){ return ['id'=>$v->id,'ten_san_pham'=>$v->ten_san_pham,'hinh_anh'=>$v->hinh_anh,'gia'=>$v->gia]; })->values());
?>



<div class="hp" id="home-app" v-cloak>
  <div class="container" style="padding-top:4px;">

    
    <div class="hp-hero3">

      
      <div class="hp-cat">
        <div class="hp-cat__head"><i class="fa-solid fa-bars-staggered"></i> Danh mục sản phẩm</div>
        <ul class="hp-cat__list">
          <li><a href="/home/danh-muc/1" class="hp-cat__link">
            <i class="fa-solid fa-gamepad" style="color:#ef4444"></i>
            <span>Laptop Gaming</span>
            <em>HOT</em>
          </a></li>
          <li><a href="/home/danh-muc/2" class="hp-cat__link">
            <i class="fa-solid fa-graduation-cap" style="color:#3b82f6"></i>
            <span>Laptop Học tập</span>
          </a></li>
          <li><a href="/home/danh-muc/3" class="hp-cat__link">
            <i class="fa-solid fa-briefcase" style="color:#f59e0b"></i>
            <span>Laptop Văn phòng</span>
          </a></li>
          <li><a href="/home/danh-muc/4" class="hp-cat__link">
            <i class="fa-solid fa-pen-ruler" style="color:#8b5cf6"></i>
            <span>Laptop Đồ họa</span>
          </a></li>
          <li><a href="/home/all-product" class="hp-cat__link hp-cat__link--all">
            <i class="fa-solid fa-laptop" style="color:#0ea5e9"></i>
            <span>Tất cả Laptop</span>
            <i class="fa-solid fa-arrow-right hp-cat__more"></i>
          </a></li>
          <li class="hp-cat__sep-line"><span>Thương hiệu</span></li>
          <?php
          $brandLogosMenu = [
            'Apple'  => 'https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg',
            'Lenovo' => 'https://upload.wikimedia.org/wikipedia/commons/b/b8/Lenovo_logo_2015.svg',
            'Asus'   => 'https://upload.wikimedia.org/wikipedia/commons/2/2e/ASUS_Logo.svg',
            'Msi'    => 'https://upload.wikimedia.org/wikipedia/vi/6/6c/Msi_logo.png',
            'Dell'   => 'https://upload.wikimedia.org/wikipedia/commons/4/48/Dell_Logo.svg',
            'Acer'   => 'https://upload.wikimedia.org/wikipedia/commons/a/a1/Acer_Logo.svg',
          ];
          ?>
          <?php $__currentLoopData = \App\Models\ThuongHieu::where('trang_thai',1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $th): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><a href="/home/thuong-hieu/<?php echo e($th->id); ?>" class="hp-cat__brand">
            <?php if(isset($brandLogosMenu[$th->ten_thuong_hieu])): ?>
              <img src="<?php echo e($brandLogosMenu[$th->ten_thuong_hieu]); ?>" alt="<?php echo e($th->ten_thuong_hieu); ?>">
            <?php else: ?>
              <i class="fa-solid fa-tag"></i>
            <?php endif; ?>
            <span><?php echo e($th->ten_thuong_hieu); ?></span>
          </a></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>

      
      <div class="hp-hero">
        <div class="hp-slides" id="hpSlides">
          <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <a href="<?php echo e($banner->duong_dan); ?>" class="hp-slide" style="background-image:url('<?php echo e($banner->hinh_anh); ?>')"></a>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php if($banners->isEmpty()): ?>
          <a href="/home/all-product" class="hp-slide" style="background-image:url('<?php echo e(asset('assets_client/imagesbanner/banner1.jpg')); ?>')"></a>
          <?php endif; ?>
        </div>
        <div class="hp-dots" id="hpDots">
          <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="hp-dot <?php echo e($k === 0 ? 'active' : ''); ?>" onclick="hpGoTo(<?php echo e($k); ?>)"></div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php if($banners->isEmpty()): ?>
          <div class="hp-dot active" onclick="hpGoTo(0)"></div>
          <?php endif; ?>
        </div>
      </div>

    </div>

    
    <?php
    $brandLogos = [
        'Apple'  => 'https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg',
        'Lenovo' => 'https://upload.wikimedia.org/wikipedia/commons/b/b8/Lenovo_logo_2015.svg',
        'Asus'   => 'https://upload.wikimedia.org/wikipedia/commons/2/2e/ASUS_Logo.svg',
        'Msi'    => 'https://upload.wikimedia.org/wikipedia/vi/6/6c/Msi_logo.png',
        'Dell'   => 'https://upload.wikimedia.org/wikipedia/commons/4/48/Dell_Logo.svg',
        'Acer'   => 'https://upload.wikimedia.org/wikipedia/commons/a/a1/Acer_Logo.svg',
    ];
    ?>
    <div class="hp-brands-row">
        <div class="hp-brands-row__label">Thương hiệu nổi bật</div>
        <div class="hp-brands-row__list">
            <?php $__currentLoopData = \App\Models\ThuongHieu::where('trang_thai',1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $th): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="/home/thuong-hieu/<?php echo e($th->id); ?>" class="hp-brand-card">
                <?php if(isset($brandLogos[$th->ten_thuong_hieu])): ?>
                    <img src="<?php echo e($brandLogos[$th->ten_thuong_hieu]); ?>" alt="<?php echo e($th->ten_thuong_hieu); ?>" class="hp-brand-card__logo">
                <?php endif; ?>
                <span class="hp-brand-card__name"><?php echo e($th->ten_thuong_hieu); ?></span>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <div class="hp-layout">

      
      <div class="hp-sb-wrapper">
        <aside class="hp-sb">
        <div class="hp-sb-head">
          <i class="fa-solid fa-sliders" style="color:#0ea5e9;font-size:13px;"></i>
          <span>Bộ lọc tìm kiếm</span>
        </div>
        <div class="hp-fg">
          <div class="hp-fg-h open" onclick="hpFg(this)"><span>Hãng sản xuất</span><i class="fa-solid fa-chevron-down"></i></div>
          <div class="hp-fg-b">
            <div class="hp-bg">
              <button class="hp-bb" :class="{on:brand==='asus'}" @click="brand=brand==='asus'?'':'asus'">ASUS</button>
              <button class="hp-bb" :class="{on:brand==='apple'}" @click="brand=brand==='apple'?'':'apple'">Apple</button>
              <button class="hp-bb" :class="{on:brand==='dell'}" @click="brand=brand==='dell'?'':'dell'">Dell</button>
              <button class="hp-bb" :class="{on:brand==='lenovo'}" @click="brand=brand==='lenovo'?'':'lenovo'">Lenovo</button>
              <button class="hp-bb" :class="{on:brand==='acer'}" @click="brand=brand==='acer'?'':'acer'">Acer</button>
              <button class="hp-bb" :class="{on:brand==='msi'}" @click="brand=brand==='msi'?'':'msi'">MSI</button>
            </div>
            <button class="hp-bb hp-bb--all" :class="{on:brand===''}" @click="brand=''">Tất cả</button>
          </div>
        </div>
        <div class="hp-fg">
          <div class="hp-fg-h open" onclick="hpFg(this)"><span>Mức giá</span><i class="fa-solid fa-chevron-down"></i></div>
          <div class="hp-fg-b">
            <div class="hp-rl">
              <label><input type="radio" name="hpprice" value="" v-model="price"> Tất cả</label>
              <label><input type="radio" name="hpprice" value="0-10" v-model="price"> Dưới 10 triệu</label>
              <label><input type="radio" name="hpprice" value="10-15" v-model="price"> 10 – 15 triệu</label>
              <label><input type="radio" name="hpprice" value="15-20" v-model="price"> 15 – 20 triệu</label>
              <label><input type="radio" name="hpprice" value="20-30" v-model="price"> 20 – 30 triệu</label>
              <label><input type="radio" name="hpprice" value="30-999" v-model="price"> Trên 30 triệu</label>
            </div>
          </div>
        </div>
        <div class="hp-fg">
          <div class="hp-fg-h open" onclick="hpFg(this)"><span>Nhu cầu</span><i class="fa-solid fa-chevron-down"></i></div>
          <div class="hp-fg-b">
            <div class="hp-need">
              <button class="hp-nb" :class="{on:need==='gaming'}" @click="need=need==='gaming'?'':'gaming'"><i class="fa-solid fa-gamepad"></i><span>Gaming</span></button>
              <button class="hp-nb" :class="{on:need==='sinhvien'}" @click="need=need==='sinhvien'?'':'sinhvien'"><i class="fa-solid fa-graduation-cap"></i><span>Sinh viên</span></button>
              <button class="hp-nb" :class="{on:need==='mong'}" @click="need=need==='mong'?'':'mong'"><i class="fa-solid fa-feather"></i><span>Mỏng nhẹ</span></button>
              <button class="hp-nb" :class="{on:need==='doanhnhan'}" @click="need=need==='doanhnhan'?'':'doanhnhan'"><i class="fa-solid fa-briefcase"></i><span>Doanh nhân</span></button>
            </div>
          </div>
        </div>
        <div class="hp-fg">
          <div class="hp-fg-h open" onclick="hpFg(this)"><span>RAM</span><i class="fa-solid fa-chevron-down"></i></div>
          <div class="hp-fg-b">
            <div class="hp-bg">
              <button class="hp-bb" :class="{on:ram===''}" @click="ram=''">Tất cả</button>
              <button class="hp-bb" :class="{on:ram==='8GB'}" @click="ram=ram==='8GB'?'':'8GB'">8GB</button>
              <button class="hp-bb" :class="{on:ram==='16GB'}" @click="ram=ram==='16GB'?'':'16GB'">16GB</button>
              <button class="hp-bb" :class="{on:ram==='32GB'}" @click="ram=ram==='32GB'?'':'32GB'">32GB</button>
            </div>
          </div>
        </div>
        <button class="hp-sb-reset" @click="brand='';price='';need='';ram='';sort=''">
          <i class="fa-solid fa-rotate-left"></i> Xóa bộ lọc
        </button>
      </aside>
      </div>

      
      <div class="hp-main">
        <div class="hp-chipbar">
          <span style="font-size:11px;font-weight:700;color:#64748b;white-space:nowrap;">Xu hướng:</span>
          <button class="hp-chip" :class="{on:sort===''}" @click="sort=''">Nổi bật</button>
          <button class="hp-chip" :class="{on:sort==='asc'}" @click="sort='asc'">Giá tăng dần</button>
          <button class="hp-chip" :class="{on:sort==='desc'}" @click="sort='desc'">Giá giảm dần</button>
          <button class="hp-chip" :class="{on:price==='0-10'}" @click="price='0-10'">Dưới 10 triệu</button>
          <button class="hp-chip" :class="{on:price==='10-15'}" @click="price='10-15'">10–15 triệu</button>
          <button class="hp-chip" :class="{on:price==='15-20'}" @click="price='15-20'">15–20 triệu</button>
        </div>
        <div style="font-size:12px;color:#64748b;margin-bottom:10px;">
          Tìm thấy <strong style="color:#0f172a;">{{ filtered.length }}</strong> sản phẩm
        </div>
        <div class="hp-grid">
          <div class="hp-card" v-for="(v,k) in filtered" :key="k">
            <div class="hp-card__img">
              <span class="hp-card__badge">Chính hãng</span>
              <a :href="'/home/product-detail/'+v.id"><img :src="v.hinh_anh" :alt="v.ten_san_pham"></a>
            </div>
            <div class="hp-card__body">
              <p class="hp-card__name"><a :href="'/home/product-detail/'+v.id">{{ v.ten_san_pham }}</a></p>
              <p class="hp-card__install"><i class="fa-solid fa-credit-card" style="font-size:9px;"></i> Trả góp 0%</p>
              <p class="hp-card__price">{{ fmt(v.gia) }}₫</p>
              <a :href="'/home/product-detail/'+v.id" class="hp-card__btn">Xem chi tiết</a>
            </div>
          </div>
          <div v-if="filtered.length===0" style="grid-column:1/-1;text-align:center;padding:40px;color:#94a3b8;">
            <i class="fa-solid fa-box-open" style="font-size:32px;display:block;margin-bottom:10px;"></i>
            Không tìm thấy sản phẩm phù hợp
          </div>
        </div>
      </div>
    </div>

    <div class="hp-feats">
      <div class="hp-feat"><div class="hp-feat__icon"><i class="fa-solid fa-shield-halved"></i></div><div class="hp-feat__text"><strong>Chính hãng 100%</strong><span>Tem bảo hành đầy đủ</span></div></div>
      <div class="hp-feat"><div class="hp-feat__icon"><i class="fa-solid fa-truck-fast"></i></div><div class="hp-feat__text"><strong>Giao hàng nhanh</strong><span>Toàn quốc 2–5 ngày</span></div></div>
      <div class="hp-feat"><div class="hp-feat__icon"><i class="fa-solid fa-rotate-left"></i></div><div class="hp-feat__text"><strong>Đổi trả 7 ngày</strong><span>Nếu lỗi nhà sản xuất</span></div></div>
      <div class="hp-feat"><div class="hp-feat__icon"><i class="fa-solid fa-headset"></i></div><div class="hp-feat__text"><strong>Hỗ trợ 24/7</strong><span>Tư vấn miễn phí</span></div></div>
    </div>
  </div>
</div>

<?php
$allProds = collect($bestSales)->merge($ht_vv_products)->merge($gamming_products)->merge($dh_kt_products)->unique('id')->values();
$allProdsJson = json_encode($allProds->map(function($v){ return ['id'=>$v->id,'ten_san_pham'=>$v->ten_san_pham,'hinh_anh'=>$v->hinh_anh,'gia'=>$v->gia]; })->values());
?>

<div class="hp" id="home-app" v-cloak>

  <div class="container">

    
    <div class="deal-banner-wrap" onclick="window.location='/home/all-product'">
      <img src="<?php echo e(asset('assets_client/imagesbanner/banner2.jpg')); ?>" class="deal-banner-img" alt="Deal laptop">
      <div class="deal-banner-overlay">
        <div class="deal-banner-tag">⚡ <span class="tag-text">Deal xuyên màn đêm</span></div>
      </div>
    </div>

    
    <div style="background:#fff;border-radius:12px;border:1px solid #e2e8f0;padding:16px 20px;margin:14px 0 10px;">
      <p style="font-size:11px;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:.6px;margin:0 0 12px;">Thương hiệu nổi bật</p>
      <div style="display:flex;gap:8px;align-items:center;">
        <a href="#" class="brand-logo-btn" style="flex:1;"><img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg" style="height:20px;" alt="Apple"></a>
        <a href="#" class="brand-logo-btn" style="flex:1;"><img src="https://upload.wikimedia.org/wikipedia/commons/2/2e/ASUS_Logo.svg" style="height:22px;" alt="Asus"></a>
        <a href="#" class="brand-logo-btn" style="flex:1;"><span style="font-size:15px;font-weight:900;color:#cc0000;letter-spacing:-.5px;">MSI</span></a>
        <a href="#" class="brand-logo-btn" style="flex:1;"><img src="https://upload.wikimedia.org/wikipedia/commons/4/48/Dell_Logo.svg" style="height:22px;" alt="Dell"></a>
        <a href="#" class="brand-logo-btn" style="flex:1;"><img src="https://upload.wikimedia.org/wikipedia/commons/a/ad/HP_logo_2012.svg" style="height:26px;" alt="HP"></a>
        <a href="#" class="brand-logo-btn" style="flex:1;"><img src="https://upload.wikimedia.org/wikipedia/commons/0/00/Acer_2011.svg" style="height:22px;" alt="Acer"></a>
        <a href="#" class="brand-logo-btn" style="flex:1;"><img src="https://upload.wikimedia.org/wikipedia/commons/b/b8/Lenovo_logo_2015.svg" style="height:18px;" alt="Lenovo"></a>
      </div>
    </div>

    
    <?php
      $needItems = [
        ['label'=>'Gaming — Đồ họa',      'url'=>'/home/danh-muc/1', 'prods'=>$gamming_products, 'icon'=>'fa-gamepad',       'grad'=>'linear-gradient(135deg,#ef4444,#f97316)', 'bg'=>'#fff5f5'],
        ['label'=>'Sinh viên — Văn phòng', 'url'=>'/home/danh-muc/2', 'prods'=>$ht_vv_products,  'icon'=>'fa-graduation-cap','grad'=>'linear-gradient(135deg,#3b82f6,#6366f1)', 'bg'=>'#eff6ff'],
        ['label'=>'Mỏng nhẹ',             'url'=>'/home/all-product', 'prods'=>$bestSales,        'icon'=>'fa-feather',       'grad'=>'linear-gradient(135deg,#10b981,#06b6d4)', 'bg'=>'#f0fdf4'],
        ['label'=>'Doanh nhân',            'url'=>'/home/all-product', 'prods'=>$dh_kt_products,  'icon'=>'fa-briefcase',     'grad'=>'linear-gradient(135deg,#8b5cf6,#ec4899)', 'bg'=>'#faf5ff'],
      ];
    ?>
    <div class="nc-section">
      <div class="nc-section__hd">
        <span class="nc-section__title">Nhu cầu sử dụng</span>
        <a href="/home/all-product" class="nc-section__more">Xem tất cả <i class="fa-solid fa-arrow-right"></i></a>
      </div>
      <div class="nc-grid">
        <?php $__currentLoopData = $needItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e($n['url']); ?>" class="nc-card" style="--nc-bg:<?php echo e($n['bg']); ?>">
          <div class="nc-card__top">
            <div class="nc-card__icon-wrap" style="background:<?php echo e($n['grad']); ?>">
              <i class="fa-solid <?php echo e($n['icon']); ?>"></i>
            </div>
            <span class="nc-card__label"><?php echo e($n['label']); ?></span>
            <span class="nc-card__arrow"><i class="fa-solid fa-arrow-right"></i></span>
          </div>
          <div class="nc-card__img-wrap">
            <?php if($n['prods']->count()): ?>
              <img src="<?php echo e($n['prods']->first()->hinh_anh); ?>" alt="<?php echo e($n['label']); ?>">
            <?php else: ?>
              <i class="fa-solid fa-laptop nc-card__placeholder"></i>
            <?php endif; ?>
          </div>
        </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>

    
    <div class="feat-bar">
      <div class="feat-item">
        <div class="feat-item__ic" style="background:linear-gradient(135deg,#0ea5e9,#6366f1)"><i class="fa-solid fa-shield-halved"></i></div>
        <div><strong>Chính hãng 100%</strong><span>Tem bảo hành đầy đủ</span></div>
      </div>
      <div class="feat-item">
        <div class="feat-item__ic" style="background:linear-gradient(135deg,#f59e0b,#ef4444)"><i class="fa-solid fa-truck-fast"></i></div>
        <div><strong>Giao hàng nhanh</strong><span>Toàn quốc 2–5 ngày</span></div>
      </div>
      <div class="feat-item">
        <div class="feat-item__ic" style="background:linear-gradient(135deg,#10b981,#06b6d4)"><i class="fa-solid fa-rotate-left"></i></div>
        <div><strong>Đổi trả 7 ngày</strong><span>Nếu lỗi nhà sản xuất</span></div>
      </div>
      <div class="feat-item">
        <div class="feat-item__ic" style="background:linear-gradient(135deg,#8b5cf6,#ec4899)"><i class="fa-solid fa-headset"></i></div>
        <div><strong>Hỗ trợ 24/7</strong><span>Tư vấn miễn phí</span></div>
      </div>
    </div>
  </div>
</div>

<?php $__env->startSection('js'); ?>
<script>
var hpIdx=0,hpTotal=3,hpAuto;
function hpGoTo(i){hpIdx=i;document.getElementById('hpSlides').style.transform='translateX(-'+(i*100)+'%)';document.querySelectorAll('.hp-dot').forEach(function(d,j){d.classList.toggle('active',j===i);});}
function hpSlide(d){hpIdx=(hpIdx+d+hpTotal)%hpTotal;hpGoTo(hpIdx);clearInterval(hpAuto);hpAuto=setInterval(function(){hpSlide(1);},5000);}
hpAuto=setInterval(function(){hpSlide(1);},5000);
function hpFg(el){el.classList.toggle('open');var b=el.nextElementSibling;b.style.display=b.style.display==='none'?'block':'none';}
document.querySelectorAll('.hp-fg-h.open').forEach(function(el){el.nextElementSibling.style.display='block';});
var allProds=<?php echo $allProdsJson; ?>;
new Vue({
  el:'#home-app',
  data:{allProds:allProds,brand:'',price:'',need:'',ram:'',gpu:'',sort:''},
  computed:{
    filtered(){
      var list=this.allProds.slice();
      if(this.brand){var b=this.brand;list=list.filter(function(v){return v.ten_san_pham.toLowerCase().indexOf(b)!==-1;});}
      if(this.price){var p=this.price.split('-');var mn=parseFloat(p[0])*1e6,mx=parseFloat(p[1])*1e6;list=list.filter(function(v){return v.gia>=mn&&v.gia<=mx;});}
      if(this.ram){var r=this.ram;list=list.filter(function(v){return v.ten_san_pham.indexOf(r)!==-1;});}
      if(this.gpu){var g=this.gpu;list=list.filter(function(v){return v.ten_san_pham.indexOf(g)!==-1;});}
      var needMap={gaming:'Gaming',sinhvien:'Sinh viên',mong:'Mỏng',doanhnhan:'Doanh nhân'};
      if(this.need&&needMap[this.need]){var nk=needMap[this.need];list=list.filter(function(v){return v.ten_san_pham.indexOf(nk)!==-1;});}
      if(this.sort==='asc')list.sort(function(a,b){return a.gia-b.gia;});
      if(this.sort==='desc')list.sort(function(a,b){return b.gia-a.gia;});
      return list;
    }
  },
  methods:{fmt:function(p){return p.toString().replace(/\B(?=(\d{3})+(?!\d))/g,',');}}
});
</script>

<script>
// Kéo dài wrapper sidebar bằng chiều cao cột sản phẩm
function matchSidebarHeight() {
    var wrapper = document.querySelector('.hp-sb-wrapper');
    var products = document.querySelector('.hp-main');
    if (wrapper && products) {
        wrapper.style.minHeight = products.offsetHeight + 'px';
    }
}
// Chạy khi load và khi resize
window.addEventListener('load', matchSidebarHeight);
window.addEventListener('resize', matchSidebarHeight);
// Chạy lại sau khi Vue render xong
setTimeout(matchSidebarHeight, 500);
setTimeout(matchSidebarHeight, 1500);
</script><?php $__env->stopSection(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('client.share.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Shop-laptop\resources\views/client/pages/home.blade.php ENDPATH**/ ?>