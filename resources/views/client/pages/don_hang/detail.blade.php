@extends('client.share.master');
@section('noi_dung')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="bread"><span><a href="index.html">Home</a></span> / <span>Order-detail</span></p>
                </div>
            </div>
        </div>
    </div>


    <div class="colorlib-product" id="app6">
        <div class="container">
            <input type="text" value="{{ $id_don_hang }}" id="id_don_hang" hidden>
            <div class="row">
                <div class="col">
                    <div class="card" style="border-radius: 20px;">
                        <table class="table table-secondary table-hover table-bordered text-center align-middle">
                            <thead>
                                <th>#</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Tùy chọn</th>
                                <th>Màu sắc</th>
                                <th>Tổng</th>
                            </thead>
                            <tbody v-for="(v, k) in ct_donhang">
                                <td>@{{ k + 1 }}</td>
                                <td>@{{ v.ten_san_pham }}</td>
                                <td>@{{ v.so_luong }}</td>
                                <td>@{{ formatNumber(v.gia_dieu_chinh) }} ₫</td>
                                <td>@{{ v.ten_cau_hinh }}</td>
                                <td>@{{ v.ten_mau_sac }}</td>
                                <th>@{{ formatNumber(sumOne(v.gia_dieu_chinh, v.so_luong)) }} ₫</th>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <a class="btn btn-info mt-3" href="/home/order/">Quay lại</a>

            <div class="row">
                <div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
                    <h2>Related Products</h2>
                </div>
            </div>
            <div class="row">
                <template v-for="(v, k) in related_prod">
                    <div class="col-md-3 col-lg-3 mb-4 text-center">
                        <div class="product-entry border">
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

            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        new Vue({
            el: '#app6',
            data: {
                ct_donhang: [],
                related_prod: []
            },
            created() {
                this.orderDetail();
                this.relatedProduct();
            },
            methods: {
                orderDetail() {
                    var payload = {
                        'don_hang_id': $('#id_don_hang').val(),
                    };
                    axios
                        .post('{{ Route('OrderDetail') }}', payload)
                        .then((res) => {
                            if (res.data.status == 1)
                                this.ct_donhang = res.data.data;
                        });

                },

                formatDate(date) {
                    if (date) {
                        const dateObj = new Date(date);
                        const day = dateObj.getDate();
                        const month = dateObj.getMonth() + 1;
                        const year = dateObj.getFullYear();

                        // Định dạng lại ngày tháng
                        return `${day}/${month}/${year}`;
                    }
                    return '';
                },
                relatedProduct() {
                    axios
                        .post('{{ Route('TopViewProducts') }}')
                        .then((res) => {
                            this.related_prod = res.data.data;
                        });
                },
                formatNumber(price) {
                    return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                },
                sumOne(gia, so_luong) {
                    return gia * so_luong;
                },
            },
        });
    </script>
@endsection
