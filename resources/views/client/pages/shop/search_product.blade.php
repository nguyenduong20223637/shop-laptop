@extends('client.share.master');
@section('noi_dung')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="bread"><span><a href="/">Trang chủ</a></span> / <span>Tìm kiếm</span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="colorlib-product" id="app2">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
                    <h2>Kết quả tìm kiếm</h2>
                </div>
            </div>
            <div class="row row-pb-md">
                <div class="col-12">
                    <div class="toolbar-mode shop-toolbar">
                        <div>
                            <div>
                                <label>
                                    <h5>Sắp xếp theo</h5>
                                </label>
                                <div class="shop-toolbar__select-wrap">
                                <select class="form" id="sortSelect" v-model="SortProd" v-on:change="SortProduct()">
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
                @if (isset($ttsearch))
                    @foreach ($ttsearch as $k => $v)
                        <div class="col-md-3 col-lg-3 mb-4 text-center d-flex">
                            <div class="product-entry border product-entry--catalog w-100">
                                <a href="/home/product-detail/{{ $v->id }}" class="prod-img">
                                    <img src="{{ $v->hinh_anh }}" class="img-fluid" alt="{{ $v->ten_san_pham }}">
                                </a>
                                @include('client.share.product_card_desc', ['v' => $v])
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="row">
                        <div class="col">
                            <h2>Không tìm thấy sản phẩm nào</h2>
                        </div>
                    </div>
                @endif

                <div class="w-100"></div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
