@php
    $discount = rand(10, 30);
    $oldPrice = $v->gia * (1 + $discount/100);
    $rating = rand(40, 50) / 10;
    $reviewCount = rand(50, 500);
    $soldPercent = rand(30, 85);
@endphp

<div class="product-card-vip">
    <!-- Image -->
    <div class="product-card-vip__image-wrapper">
        <a href="/home/product-detail/{{ $v->id }}">
            <img src="{{ $v->hinh_anh }}" alt="{{ $v->ten_san_pham }}" class="product-card-vip__image">
        </a>
        
        <!-- Badges -->
        <div class="product-card-vip__badges">
            @if($discount >= 25)
                <span class="product-card-vip__badge product-card-vip__badge--hot">
                    <i class="fas fa-fire"></i> Hot Deal
                </span>
            @endif
            <span class="product-card-vip__badge product-card-vip__badge--authentic">
                <i class="fas fa-shield-check"></i> Chính hãng
            </span>
            <span class="product-card-vip__badge product-card-vip__badge--installment">
                <i class="fas fa-credit-card"></i> Trả góp 0%
            </span>
        </div>
        
        <!-- Quick Actions -->
        <div class="product-card-vip__quick-actions">
            <button class="product-card-vip__quick-btn product-card-vip__quick-btn--favorite" title="Yêu thích">
                <i class="far fa-heart"></i>
            </button>
            <button class="product-card-vip__quick-btn" title="So sánh">
                <i class="fas fa-exchange-alt"></i>
            </button>
            <button class="product-card-vip__quick-btn" title="Xem nhanh">
                <i class="far fa-eye"></i>
            </button>
        </div>
        
        <!-- Hover Overlay -->
        <div class="product-card-vip__overlay">
            <h3 class="product-card-vip__overlay-title">{{ $v->ten_san_pham }}</h3>
            <a href="/home/product-detail/{{ $v->id }}" class="product-card-vip__overlay-btn">
                <i class="fas fa-info-circle"></i>
                Xem chi tiết
            </a>
            <button class="product-card-vip__overlay-btn" onclick="addToCart({{ $v->id }})">
                <i class="fas fa-shopping-cart"></i>
                Thêm vào giỏ
            </button>
        </div>
    </div>
    
    <!-- Content -->
    <div class="product-card-vip__content">
        <!-- Title -->
        <h3 class="product-card-vip__title">
            <a href="/home/product-detail/{{ $v->id }}">{{ $v->ten_san_pham }}</a>
        </h3>
        
        <!-- Rating -->
        <div class="product-card-vip__rating">
            <div class="product-card-vip__stars">
                @for($i = 1; $i <= 5; $i++)
                    @if($i <= floor($rating))
                        <i class="fas fa-star"></i>
                    @elseif($i - 0.5 <= $rating)
                        <i class="fas fa-star-half-alt"></i>
                    @else
                        <i class="far fa-star"></i>
                    @endif
                @endfor
            </div>
            <span class="product-card-vip__rating-count">({{ $reviewCount }})</span>
        </div>
        
        <!-- Specs (Optional) -->
        <div class="product-card-vip__specs">
            <span class="product-card-vip__spec"><i class="fas fa-microchip"></i> Intel i7</span>
            <span class="product-card-vip__spec"><i class="fas fa-memory"></i> 16GB RAM</span>
            <span class="product-card-vip__spec"><i class="fas fa-hdd"></i> 512GB SSD</span>
        </div>
        
        <!-- Price Section -->
        <div class="product-card-vip__price-section">
            <div class="product-card-vip__price-row">
                <span class="product-card-vip__price-current">{{ number_format($v->gia, 0, ',', '.') }}₫</span>
                <span class="product-card-vip__price-old">{{ number_format($oldPrice, 0, ',', '.') }}₫</span>
                <span class="product-card-vip__discount">-{{ $discount }}%</span>
            </div>
            
            <p class="product-card-vip__save">
                <i class="fas fa-tag"></i> Tiết kiệm {{ number_format($oldPrice - $v->gia, 0, ',', '.') }}₫
            </p>
            
            <!-- Stock Progress -->
            <div class="product-card-vip__stock">
                <div class="product-card-vip__stock-label">
                    <span><i class="fas fa-fire"></i> Đã bán {{ $soldPercent }}%</span>
                    <span>Còn {{ 100 - $soldPercent }}%</span>
                </div>
                <div class="product-card-vip__stock-bar">
                    <div class="product-card-vip__stock-fill" style="width: {{ $soldPercent }}%"></div>
                </div>
            </div>
            
            <!-- Actions -->
            <div class="product-card-vip__actions">
                <button class="product-card-vip__btn product-card-vip__btn-primary" onclick="addToCart({{ $v->id }})">
                    <i class="fas fa-shopping-cart"></i>
                    Thêm vào giỏ
                </button>
                <button class="product-card-vip__btn product-card-vip__btn-secondary" title="Mua ngay">
                    <i class="fas fa-bolt"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
function addToCart(productId) {
    // Animation effect
    const btn = event.target.closest('button');
    btn.innerHTML = '<i class="fas fa-check"></i> Đã thêm';
    btn.style.background = 'linear-gradient(135deg, #10b981 0%, #059669 100%)';
    
    setTimeout(() => {
        btn.innerHTML = '<i class="fas fa-shopping-cart"></i> Thêm vào giỏ';
        btn.style.background = '';
    }, 2000);
    
    // Add your cart logic here
    console.log('Added product:', productId);
}
</script>
