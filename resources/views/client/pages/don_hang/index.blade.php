@extends('client.share.master');
@section('noi_dung')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="bread"><span><a href="index.html">Home</a></span> / <span>Orders</span></p>
                </div>
            </div>
        </div>
    </div>


    <div class="colorlib-product" id="app6">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card" style="border-radius: 20px;">
                        <table class="table table-secondary table-hover table-bordered text-center align-middle">
                            <thead>
                                <th>Mã đơn hàng</th>
                                <th>Tổng tiền</th>
                                <th>Hình thức thanh toán</th>
                                <th>Trạng thái</th>
                                <th>Ngày đặt</th>
                                <th>Action</th>
                            </thead>
                            <tbody v-for="(v, k) in List_Orders">
                                <tr>
                                    <td>@{{ v.id }}</td>
                                    <td>@{{ formatNumber(v.tong_tien)}} ₫</td>
                                    <td>
                                        <button v-if="v.hinh_thuc_thanh_toan==1" class="btn btn-info">thanh toán khi nhận
                                            hàng</button>
                                    </td>
                                    <td>
                                        <button v-if="v.trang_thai==1" class="btn-warning btn">Đang xử lý</button>
                                        <button v-if="v.trang_thai==2" class="btn-warning btn">Đã xác nhận</button>
                                        <button v-if="v.trang_thai==3" class="btn-info btn">Đang giao</button>
                                        <button v-if="v.trang_thai==4" class="btn-success btn">Đã giao</button>
                                        <button v-if="v.trang_thai==0" class="btn-danger btn">Đã Hủy</button>
                                    </td>
                                    <td>@{{ formatDate(v.created_at) }}</td>
                                    <td>
                                        <button class="btn btn-danger" v-on:click="deleteCart(v.id)" v-if="v.trang_thai == 1">X</button>
                                        <a class="btn btn-success" v-on:click="orderDetail(v.id)" v-bind:href="'/home/order/detail/' + v.id">Chi Tiết</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
                    <h2>Related Products</h2>
                </div>
            </div>
            <div class="row" >
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
                List_Orders: [],
                ct_donhang: [],
                related_prod : [],
            },
            created() {
                this.loadData();
                this.relatedProduct();
            },
            methods: {
                loadData() {
                    axios
                        .post('{{ Route('OrderData') }}')
                        .then((res) => {
                            if (res.data.status == 1)
                                this.List_Orders = res.data.data;
                        });
                },

                orderDetail($id) {
                    var payload = {
                        'don_hang_id': $id,
                    };
                    axios
                        .post('{{ Route('OrderDetail') }}', payload)
                        .then((res) => {
                            if (res.data.status == 1)
                                this.ct_donhang = res.data.data;
                        });

                },

                deleteCart($id)
                {
                    var payload = {
                        'id' : $id
                    };
                    axios
                        .post('{{Route('OrderDelete')}}', payload)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message, 'Success');
                                this.loadData();
                            } else {
                                toastr.error(res.data.message, 'Error');
                            }
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0], 'Error');
                            });
                        });
                },
                relatedProduct()
                {
                    axios
                        .post('{{Route('TopViewProducts')}}')
                        .then((res) => {
                            this.related_prod = res.data.data;
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
                formatNumber(price) {
                    return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                },
            },
        });
    </script>
@endsection
