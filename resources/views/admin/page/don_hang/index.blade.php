@extends('admin.share.master');
@section('noi_dung')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <h6 class="mb-0 text-uppercase">QUẢN LÝ ĐƠN HÀNG</h6>
        </div>
    </div>
    <hr />
    <div class="row" id="app">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered rounded text-center align-middle text-nowrap">
                            <thead>
                                <th>#</th>
                                <th>Tên tài khoản</th>
                                <th>Tên người nhận</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Hình thức thanh toán</th>
                                <th>Tổng tiền</th>
                                <th>Ngày đặt</th>
                                <th>Trạng thái</th>
                                <th>Action</th>
                            </thead>
                            <tbody v-for="(v, k) in list_order">
                                <tr>
                                    <td>@{{ k + 1 }}</td>
                                    <td>@{{ v.ho_va_ten }}</td>
                                    <td>@{{ v.ten_nguoi_nhan }}</td>
                                    <td>@{{ v.dia_chi }}</td>
                                    <td>@{{ v.so_dien_thoai }}</td>
                                    <td>
                                        <button class="btn btn-success" v-if="v.hinh_thuc_thanh_toan == 1">Thanh toán khi
                                            nhận
                                            hàng</button>
                                        <button class="btn btn-danger" v-if="v.hinh_thuc_thanh_toan == 2">Thanh toán trực
                                            tuyến</button>
                                    </td>
                                    <td>
                                        @{{ convertToVND(v.tong_tien) }}
                                    </td>
                                    <td>@{{ formatDate(v.created_at) }}</td>
                                    <td>
                                        <Select class="form-control" v-model="v.trang_thai" v-on:change="changeStatus(v)">
                                            <option value="1">Đang xử lý</option>
                                            <option value="2">Đã xác nhận</option>
                                            <option value="3">Đang giao</option>
                                            <option value="4">Đã giao</option>
                                            <option value="0">Đã hủy</option>
                                        </Select>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger" v-on:click="don_hang_del = Object.assign({}, v);"
                                            data-bs-toggle="modal" data-bs-target="#DelBackdrop">X</button>
                                        <button class="btn btn-info" v-on:click="infoOrder(v)" data-bs-toggle="modal"
                                            data-bs-target="#InfoBackdrop">Chi tiết </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="card-footer text-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li v-if="currentPage > 1" class="page-item">
                                <a class="page-link" href="#" v-on:click="changePage(currentPage-1)"
                                    aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <template v-for="k in lastPage">
                                <li class="page-item" :class="{ 'active': currentPage === k }">
                                    <a class="page-link" href="#"
                                        v-on:click="changePage(k)">@{{ k }}</a>
                                </li>
                            </template>
                            <li class="page-item" v-if="currentPage < lastPage">
                                <a class="page-link" href="#" v-on:click="changePage(currentPage+1)"
                                    aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <!-- InfoModal -->
        <div class="modal fade" id="InfoBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Chi tiết đơn hàng</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table align-middle text-center table-bordered ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                    </tr>
                                </thead>
                                <tbody v-for="(v, k) in don_hang_info">
                                    <tr>
                                        <td>@{{ k + 1 }}</td>
                                        <td>@{{ v.ten_san_pham }} - @{{ v.ten_mau_sac }} - @{{ v.ten_cau_hinh }}</td>
                                        <td>@{{ convertToVND(v.gia_dieu_chinh) }}</td>
                                        <td>@{{ v.so_luong }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- DelModal -->
        <div class="modal fade" id="DelBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Cảnh báo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-warning d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                aria-label="Warning:">
                                <use xlink:href="#exclamation-triangle-fill" />
                            </svg>
                            <div>
                                Bạn có chắc muốn xóa đơn hàng số <b>@{{ don_hang_del.id }}</b> này không ?
                                Tổng tiền: <b>@{{ convertToVND(don_hang_del.tong_tien) }}</b>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary"
                            v-on:click="deleteOrder(don_hang_del)">Xóa</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        new Vue({
            el: '#app',
            data: {
                list_order: [],
                don_hang_del: {},
                don_hang_info: [],
                currentPage: 1,
                lastPage: 1,
            },
            created() {
                this.loadData();
            },
            methods: {
                loadData() {
                    axios
                        .post('{{ Route('AllOrder') }}')
                        .then((res) => {
                            this.list_order = res.data.data.data;
                            this.currentPage = res.data.data.current_page;
                            this.lastPage = res.data.data.last_page;
                        });

                },
                changeStatus($value) {
                    axios
                        .post('{{ Route('StatusOrder') }}', $value)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success(res.data.message, 'Success');
                            } else {
                                toastr.error(res.data.message, 'Error');
                            }
                        });
                },
                infoOrder($value) {
                    axios
                        .post('{{ Route('InfoOrder') }}', $value)
                        .then((res) => {
                            if (res.data.status) {
                                this.don_hang_info = res.data.data;
                            } else {
                                toastr.error(res.data.message, 'Error');
                            }
                        });
                },

                deleteOrder($value) {
                    axios
                        .post('{{ Route('DeleteOrder') }}', $value)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success(res.data.message, 'Success');
                                this.loadData();
                                $('DelBackdrop').modal('hide');
                            } else {
                                toastr.error(res.data.message, 'Error');
                            }
                        });
                },

                convertToVND(value) {
                    const formatter = new Intl.NumberFormat('vi-VN', {
                        style: 'currency',
                        currency: 'VND',
                        minimumFractionDigits: 0,
                        maximumFractionDigits: 0,
                    });

                    return formatter.format(value);
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
            },
        });
    </script>
@endsection
