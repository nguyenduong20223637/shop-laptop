@extends('admin.share.master')
@section('noi_dung')
    <div class="page-breadcrumb">
       <div class="row">
            <div class="col-3">
                <h5>DANH SÁCH SẢN PHẨM</h5>
            </div>
            <div class="col-9">
                <button class="btn btn-info float-end mr-5" data-bs-toggle="modal"
                data-bs-target="#ThemMoiModal">Thêm sản phẩm</button>
            </div>
       </div>
    </div>
    <hr />
    <div class="row" id="app">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm" v-model="search_value" v-on:keyup="search()">
                </div>

                <div class="card-body">
                    <table class="table table-responsive table-bordered text-center align-middle">
                        <thead>
                            <th>#</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Thương hiệu</th>
                            <th>Giá</th>
                            <th>Tình trạng</th>
                            <th>Action</th>
                        </thead>
                        <tbody v-for="(v, k) in List_products">
                            <td>@{{ k }}</td>
                            <td>@{{ v.ten_san_pham }}</td>
                            <td><img v-bind:src="v.hinh_anh" class="product-img-2" alt="product img"></td>
                            <td>@{{ v.ten_thuong_hieu }}</td>
                            <td>@{{ convertToVND(v.gia) }}</td>
                            <td>
                                <button class="badge bg-gradient-quepal text-white shadow-sm w-100" v-if="v.tinh_trang == 1"
                                    v-on:click="doiStatus(v)">Hiển thị</button>
                                <button class="badge bg-gradient-bloody text-white shadow-sm w-100" v-else
                                    v-on:click="doiStatus(v)">Ẩn</button>
                            </td>

                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal"
                                        data-bs-target="#EditModal" v-on:click="sanphamEdit(v)"><i
                                            class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-dark"
                                        v-on:click="sanpham_del = Object.assign({}, v)" data-bs-toggle="modal"
                                        data-bs-target="#DelBackdrop"><i class="bx bx-trash-alt me-0"></i></i>
                                    </button>
                                </div>
                            </td>
                        </tbody>
                    </table>
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


        <!-- Modal -->
        <div class="modal fade" id="ThemMoiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm mới sản phẩm</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="">Tên sản phẩm</label>
                                            <input type="text" class="form-control" v-model="sanpham.ten_san_pham">
                                        </div>

                                        <div class="mb-3">
                                            <label for="">Gia</label>
                                            <input type="number" class="form-control" v-model="sanpham.gia">
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Hãng sản phẩm</label>
                                            <select name="" id="" class="form-control"
                                                v-model="sanpham.thuong_hieu_id">
                                                @foreach ($thuonghieus as $k => $v)
                                                    <option value="{{ $v->id }}">{{ $v->ten_thuong_hieu }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="">Hình ảnh</label>
                                            <input type="text" class="form-control" v-model="sanpham.hinh_anh">
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Danh mục</label>
                                            <select name="" id="" class="form-control"
                                                v-model="sanpham.danh_muc_id">
                                                @foreach ($danhmucs as $k => $v)
                                                    <option value="{{ $v->id }}">{{ $v->ten_danh_muc }}</option>
                                                @endforeach
                                            </select>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="">Tình trạng</label>
                                            <select name="" id="" class="form-control"
                                                v-model="sanpham.tinh_trang">
                                                <option value="1">Hiển thị</option>
                                                <option value="0">Khóa</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="">Mô tả</label>
                                    <textarea name="mota" rows="30" cols="10"></textarea>
                                </div>

                                <div class="mb-3">
                                    <div id="variants" class="row">
                                        <div class="variant col">
                                            <label for="size">Cấu hình:</label>
                                            <select name="size" class="form-control" v-model="opt.cau_hinh_id">
                                                @foreach ($cauhinhs as $k => $v)
                                                    <option value="{{ $v->id }}">{{ $v->ten_cau_hinh }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="variant col">
                                            <label for="color">Màu sắc:</label>
                                            <select name="color" class="form-control" v-model="opt.mau_sac_id">
                                                @foreach ($mausacs as $k => $v)
                                                    <option value="{{ $v->id }}">{{ $v->ten_mau_sac }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="variant col">
                                            <label for="">Giá điều chỉnh</label>
                                            <input type="text" class="form-control" v-model="opt.gia_dieu_chinh">
                                        </div>

                                        <div class="variant col">
                                            <label for="">Hình ảnh</label>
                                            <input type="text" class="form-control" v-model="opt.hinh_anh">
                                        </div>
                                        <div class="variant col">
                                            <label for="stock">Số lượng tồn kho:</label>
                                            <input type="number" name="stock" class="form-control"
                                                v-model="opt.so_luong" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="mb-3">
                                    <button type="button" class="btn btn-info" id="addVariant"
                                        v-on:click="PushOpt(opt)">Add Option</button>
                                </div>

                                <div class="mb-3">


                                    <table class="table table-responsive table-bordered text-center align-middle">
                                        <thead>
                                            <tr>
                                                <th>Cấu hình</th>
                                                <th>Màu sắc</th>
                                                <th>Hình ảnh</th>
                                                <th>Giá điều chỉnh</th>
                                                <th>Số lượng</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <template v-for="(v, k) in List_Opt">
                                                <tr>
                                                    <td>
                                                        <select name="size" class="form-control"
                                                            v-model="v.cau_hinh_id">
                                                            @foreach ($cauhinhs as $k => $v)
                                                                <option value="{{ $v->id }}">
                                                                    {{ $v->ten_cau_hinh }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="color" class="form-control"
                                                            v-model="v.mau_sac_id">
                                                            @foreach ($mausacs as $k => $v)
                                                                <option value="{{ $v->id }}">{{ $v->ten_mau_sac }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <img v-bind:src="v.hinh_anh" alt=""
                                                            style="max-height: 50px;">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            v-model="v.gia_dieu_chinh">
                                                    </td>
                                                    <td>
                                                        <input type="number" name="stock" class="form-control"
                                                            v-model="v.so_luong" required>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-danger mt-1"
                                                            v-on:click="RemoveOpt(k)">X</button>
                                                    </td>
                                                </tr>
                                            </template>

                                        </tbody>
                                    </table>

                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" v-on:click="TaoProDuct()">Thêm mới</button>
                    </div>
                </div>
            </div>
        </div>

        <!--Edit Modal -->
        <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sửa sản phẩm</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="">Tên sản phẩm</label>
                                            <input type="text" class="form-control"
                                                v-model="sanpham_edit.ten_san_pham">
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Gia</label>
                                            <input type="number" class="form-control" v-model="sanpham_edit.gia">
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Hãng sản phẩm</label>
                                            <select name="" id="" class="form-control"
                                                v-model="sanpham_edit.thuong_hieu_id">
                                                @foreach ($thuonghieus as $k => $v)
                                                    <option value="{{ $v->id }}">{{ $v->ten_thuong_hieu }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="">Hình ảnh</label>
                                            <input type="text" class="form-control" v-model="sanpham_edit.hinh_anh">
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Danh mục</label>
                                            <select name="" id="" class="form-control"
                                                v-model="sanpham_edit.danh_muc_id">
                                                @foreach ($danhmucs as $k => $v)
                                                    <option value="{{ $v->id }}">{{ $v->ten_danh_muc }}</option>
                                                @endforeach
                                            </select>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="">Tình trạng</label>
                                            <select name="" id="" class="form-control"
                                                v-model="sanpham_edit.tinh_trang">
                                                <option value="1">Hiển thị</option>
                                                <option value="0">Khóa</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="">Mô tả</label>
                                    <textarea name="mota_edit" rows="30" cols="10"></textarea>
                                </div>

                                <div class="mb-3">
                                    <div id="variants" class="row">
                                        <div class="variant col">
                                            <label for="size">cấu hình:</label>
                                            <select name="size" class="form-control" v-model="opt_edit.cau_hinh_id">
                                                @foreach ($cauhinhs as $k => $v)
                                                    <option value="{{ $v->id }}">{{ $v->ten_cau_hinh }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="variant col">
                                            <label for="prices">giá điều chỉnh:</label>
                                            <input name="prices" type="number" class="form-control"
                                                v-model="opt_edit.gia_dieu_chinh">
                                        </div>
                                        <div class="variant col">
                                            <label for="color">Màu sắc:</label>
                                            <select name="color" class="form-control" v-model="opt_edit.mau_sac_id">
                                                @foreach ($mausacs as $k => $v)
                                                    <option value="{{ $v->id }}">{{ $v->ten_mau_sac }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="variant col">
                                            <label for="">Hình ảnh</label>
                                            <input type="text" class="form-control" v-model="opt_edit.hinh_anh">
                                        </div>

                                        <div class="variant col">
                                            <label for="stock">Số lượng tồn kho:</label>
                                            <input type="number" name="stock" class="form-control"
                                                v-model="opt_edit.so_luong" required>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-info mb-3" id="addVariant"
                                    v-on:click="PushOpt_edit(opt_edit)">Add Option</button>
                                <div class="mb-3">
                                    <table class="table table-responsive table-bordered text-center align-middle">
                                        <thead>
                                            <tr>
                                                <th>Cấu hình</th>
                                                <th>màu sắc</th>
                                                <th>giá điều chỉnh</th>
                                                <th>Hình ảnh</th>
                                                <th>số lượng</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <template v-for="(v, k) in  List_Opt_Edit">
                                                <tr>
                                                    <td>
                                                        <select name="size" class="form-control"
                                                            v-model="v.cau_hinh_id">
                                                            @foreach ($cauhinhs as $k => $v)
                                                                <option value="{{ $v->id }}">
                                                                    {{ $v->ten_cau_hinh }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="color" class="form-control"
                                                            v-model="v.mau_sac_id">
                                                            @foreach ($mausacs as $k => $v)
                                                                <option value="{{ $v->id }}">{{ $v->ten_mau_sac }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td><input type="number" v-model="v.gia_dieu_chinh"
                                                            class="form-control"></td>
                                                    <td>@{{ v.so_luong }}</td>
                                                    <td><img v-bind:src="v.hinh_anh" alt=""
                                                            style="max-height: 50px;"></td>
                                                    <td>
                                                        <div>
                                                            <button class="btn btn-info">Edit</button>
                                                            <button class="btn btn-danger"
                                                                v-on:click="RemoveOptEdit(k)">X</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </template>

                                        </tbody>
                                    </table>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" v-on:click="ProUpdate()">Cập nhật</button>
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
                                Bạn có chắc muốn xóa <b>@{{ sanpham_del.ten_san_pham }}</b> này không ?
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" v-on:click="ProDel()">Xóa</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                sanpham_del: {},
                sanpham_edit: {},
                sanpham: {
                    mo_ta: '',
                },
                opt: {},
                opt_edit: {},
                List_products: [],
                List_Opt: [],
                List_Opt_Edit: [],
                currentPage: 1,
                lastPage: 1,
                hinh_anh_new: '',
                search_value: ''
            },
            created() {
                this.loadData();
            },
            methods: {
                TaoProDuct() {
                    this.sanpham.mo_ta = CKEDITOR.instances['mota'].getData();
                    var payload = {
                        'sanpham': this.sanpham,
                        'options': this.List_Opt,
                    }
                    axios
                        .post("{{ Route('ProductCreate') }}", payload)
                        .then((res) => {
                            if (res.data.status == 1) {
                                toastr.success(res.data.message);
                                $('#ThemMoiModal').modal('hide');
                                this.loadData();
                            } else {
                                toastr.error(res.data.message, 'lỗi');
                            }
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0], 'Error');
                            });
                        });

                },

                RemoveOpt(index) {
                    this.List_Opt.splice(index, 1);
                },

                RemoveOptEdit(index) {
                    this.List_Opt_Edit.splice(index, 1);
                },

                PushOpt(value) {
                    var opt2 = Object.assign({}, this.opt);
                    this.List_Opt.push(opt2);
                },

                PushOpt_edit(value) {
                    var opt2 = Object.assign({}, this.opt_edit);
                    this.List_Opt_Edit.push(opt2);
                },

                search(page = 1)
                {
                    var payload = {
                        'search_value' : this.search_value
                    };
                    axios
                        .post('{{ Route('ProductSearch') }}', payload, {
                            page: page,
                        })
                        .then((res) => {
                            this.List_products = res.data.data.data;
                            this.currentPage = res.data.data.current_page;
                            this.lastPage = res.data.data.last_page;
                        });
                },
                doiStatus(payload) {
                    axios
                        .post('{{ Route('ProductStatus') }}', payload)
                        .then((res) => {
                            if (res.data.status == 1) {
                                toastr.success(res.data.message);
                                this.loadData();
                            } else
                                toastr.error(res.data.message);
                        });
                },

                sanphamEdit(payload) {
                    this.sanpham_edit = Object.assign({}, payload);
                    CKEDITOR.instances.mota_edit.setData(payload.mo_ta);

                    axios
                        .post('{{ Route('OptData2') }}', payload)
                        .then((res) => {
                            this.List_Opt_Edit = res.data.data;
                        });
                },

                ProUpdate() {
                    this.sanpham_edit.mo_ta = CKEDITOR.instances['mota_edit'].getData();
                    var payload = {
                        'sanpham': this.sanpham_edit,
                        'options': this.List_Opt_Edit,
                    };
                    axios
                        .post('{{ Route('ProductUpdate') }}', payload)
                        .then((res) => {
                            if (res.data.status == 1) {
                                toastr.success(res.data.message);
                                $('#EditModal').modal('hide');
                                this.loadData();
                            } else
                                toastr.error(res.data.message);
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0], 'Error');
                            });
                        });
                },

                ProDel() {
                    axios
                        .post('{{ Route('ProductDestroy') }}', this.sanpham_del)
                        .then((res) => {
                            if (res.data.status == 1) {
                                toastr.success(res.data.message);
                                $('#DelBackdrop').modal('hide');
                                this.loadData();
                            } else
                                toastr.error(res.data.message);
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


                loadData(page = 1) {
                    axios
                        .post('{{ Route('ProductData') }}', {
                            page: page
                        })
                        .then((res) => {
                            this.List_products = res.data.data.data;
                            this.currentPage = res.data.data.current_page;
                            this.lastPage = res.data.data.last_page;
                        });
                },

                changePage(page) {
                    console.log(page);
                    this.loadData(page);
                },
            },
        });
    </script>
    <script>
        $(document).ready(function() {
            CKEDITOR.replace('mota');
            CKEDITOR.replace('mota_edit');
        });
    </script>
@endsection
