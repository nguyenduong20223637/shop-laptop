@php
  $discount = rand(5, 25); // % giảm giả lập
  $oldPrice = $v->gia * (1 + $discount/100);
@endphp
<div class="desc product-card-fpt">
    <h2 class="product-card-fpt__title">
        <a class="product-card-fpt__title-link" href="/home/product-detail/{{ $v->id }}">{{ $v->ten_san_pham }}</a>
    </h2>
    <span class="product-card-fpt__badge">Trả góp 0%</span>
    <p class="product-card-fpt__price-row">
        <span class="price product-card-fpt__price">
            <span class="product-card-fpt__price-current">{{ number_format($v->gia, 0, ',', '.') }}₫</span>
        </span>
        <span class="product-card-fpt__price-old">{{ number_format($oldPrice, 0, ',', '.') }}₫</span>
        <span class="product-card-fpt__discount">-{{ $discount }}%</span>
    </p>
    <p class="product-card-fpt__save">Giảm {{ number_format($oldPrice - $v->gia, 0, ',', '.') }}₫</p>
    <button type="button" class="product-card-fpt__compare" disabled aria-disabled="true">
        <i class="fa-solid fa-plus" style="font-size:9px;"></i> Thêm vào so sánh
    </button>
</div>
