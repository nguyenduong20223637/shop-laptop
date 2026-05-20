@extends('admin.share.master')

@section('css')
<style>
.page-vip{padding:28px 32px}
.vip-card{background:#fff;border-radius:16px;box-shadow:0 2px 12px rgba(0,0,0,.06)}
.vip-card-header{padding:20px 24px;border-bottom:1px solid #f1f5f9;display:flex;justify-content:space-between;align-items:center}
.vip-card-header h3{font-size:16px;font-weight:700;color:#0f172a;margin:0}
.vip-card-body{padding:24px}
.vip-form-group{margin-bottom:16px}
.vip-form-group label{display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px}
.vip-form-group input,.vip-form-group select{width:100%;padding:10px 14px;border:1.5px solid #e2e8f0;border-radius:10px;font-size:14px;outline:none;background:#fff;transition:all .2s}
.vip-form-group input:focus,.vip-form-group select:focus{border-color:#0ea5e9;box-shadow:0 0 0 3px rgba(14,165,233,.1)}
.vip-form-row{display:grid;grid-template-columns:1fr 1fr;gap:0 16px}
.url-preview-box{width:100%;height:130px;border-radius:10px;border:1.5px dashed #cbd5e1;background:#f8fafc;display:flex;flex-direction:column;align-items:center;justify-content:center;color:#94a3b8;font-size:13px;gap:6px;margin-top:8px}
.url-preview-box i{font-size:28px;color:#cbd5e1}
.url-preview-box img{width:100%;height:130px;object-fit:cover;border-radius:10px;border:1.5px solid #e2e8f0;display:block}
.btn-vip-primary{background:linear-gradient(135deg,#0ea5e9,#3b82f6);color:#fff;border:none;border-radius:10px;padding:10px 20px;font-size:14px;font-weight:700;cursor:pointer;display:inline-flex;align-items:center;gap:8px;transition:all .2s}
.btn-vip-primary:hover{transform:translateY(-1px);box-shadow:0 6px 16px rgba(14,165,233,.35)}
.btn-vip-danger{background:linear-gradient(135deg,#ef4444,#dc2626);color:#fff;border:none;border-radius:10px;padding:10px 20px;font-size:14px;font-weight:700;cursor:pointer}
.btn-vip-secondary{background:#f1f5f9;color:#64748b;border:none;border-radius:10px;padding:10px 20px;font-size:14px;font-weight:600;cursor:pointer}
.vip-table{width:100%;border-collapse:collapse}
.vip-table th{padding:12px 16px;text-align:left;font-size:11px;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:.5px;border-bottom:1px solid #e2e8f0}
.vip-table td{padding:10px 16px;border-bottom:1px solid #f1f5f9;font-size:14px;color:#0f172a;vertical-align:middle}
.vip-table tbody tr:hover{background:#f8fafc}
.banner-thumb{width:90px;height:50px;border-radius:8px;object-fit:cover;border:1px solid #e2e8f0;cursor:pointer;transition:transform .2s}
.banner-thumb:hover{transform:scale(1.05)}
.order-cell{display:flex;align-items:center;gap:6px}
.order-num{display:inline-flex;align-items:center;justify-content:center;min-width:28px;height:28px;border-radius:8px;background:#0ea5e9;color:#fff;font-size:13px;font-weight:700;padding:0 6px}
.order-arrows{display:flex;flex-direction:column;gap:2px}
.arrow-btn{width:22px;height:22px;border-radius:5px;border:1.5px solid #e2e8f0;background:#fff;color:#64748b;display:flex;align-items:center;justify-content:center;cursor:pointer;font-size:10px;transition:all .15s;padding:0;line-height:1}
.arrow-btn:hover{background:#0ea5e9;border-color:#0ea5e9;color:#fff}
.arrow-btn:disabled{opacity:.3;cursor:not-allowed}
.status-pill{padding:5px 12px;border-radius:20px;font-size:12px;font-weight:700;display:inline-flex;align-items:center;gap:4px;cursor:pointer;border:none}
.status-pill.active{background:#dcfce7;color:#16a34a}
.status-pill.inactive{background:#fee2e2;color:#dc2626}
.action-group{display:flex;gap:8px}
.action-btn{width:32px;height:32px;border-radius:8px;border:none;display:flex;align-items:center;justify-content:center;cursor:pointer;transition:all .2s;font-size:13px}
.action-btn.edit{background:#dbeafe;color:#0ea5e9}
.action-btn.edit:hover{background:#0ea5e9;color:#fff}
.action-btn.del{background:#fee2e2;color:#ef4444}
.action-btn.del:hover{background:#ef4444;color:#fff}
</style>
@endsection

@section('noi_dung')
<div class="page-vip" id="app">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:24px">
        <h2 style="font-size:22px;font-weight:800;color:#f1f5f9;margin:0">
            <i class="fa-solid fa-image" style="color:#0ea5e9"></i> Quản Lý Banner
        </h2>
    </div>
    <div class="row g-4">
        <div class="col-lg-4">
            <div class="vip-card">
                <div class="vip-card-header">
                    <h3><i class="fa-solid fa-plus" style="color:#0ea5e9"></i> Thêm Banner Mới</h3>
                </div>
                <div class="vip-card-body">
                    <div class="vip-form-group">
                        <label>Tên banner</label>
                        <input type="text" v-model="banner.ten_banner" placeholder="VD: Banner Gaming...">
                    </div>
                    <div class="vip-form-group">
                        <label>URL hình ảnh</label>
                        <input type="text" v-model="banner.hinh_anh" placeholder="https://...">
                        <div class="url-preview-box">
                            <img v-if="banner.hinh_anh" :src="banner.hinh_anh" alt="preview">
                            <template v-else>
                                <i class="fa-regular fa-image"></i>
                                <span>Nhập URL để xem trước</span>
                            </template>
                        </div>
                    </div>
                    <div class="vip-form-group">
                        <label>Đường dẫn khi click</label>
                        <input type="text" v-model="banner.duong_dan" placeholder="/home/danh-muc/1">
                    </div>
                    <div class="vip-form-row">
                        <div class="vip-form-group">
                            <label>Thứ tự</label>
                            <input type="number" v-model="banner.thu_tu" min="1">
                        </div>
                        <div class="vip-form-group">
                            <label>Trạng thái</label>
                            <select v-model="banner.trang_thai">
                                <option value="1">Hiển thị</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>
                    </div>
                    <button class="btn-vip-primary" v-on:click="themMoi()" style="width:100%;justify-content:center">
                        <i class="fa-solid fa-plus"></i> Thêm Mới
                    </button>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="vip-card">
                <div class="vip-card-header">
                    <h3><i class="fa-solid fa-list" style="color:#0ea5e9"></i> Danh Sách Banner</h3>
                    <span style="background:#f1f5f9;padding:4px 12px;border-radius:20px;font-size:13px;font-weight:700;color:#64748b">
                        @{{ list.length }} banner
                    </span>
                </div>
                <table class="vip-table">
                    <thead>
                        <tr>
                            <th>Thứ Tự</th>
                            <th>Hình Ảnh</th>
                            <th>Tên Banner</th>
                            <th>Trạng Thái</th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(v, k) in list" :key="v.id">
                            <td>
                                <div class="order-cell">
                                    <span class="order-num">@{{ k + 1 }}</span>
                                    <div class="order-arrows">
                                        <button class="arrow-btn" :disabled="k === 0" v-on:click="doiThuTu(k, k-1)">
                                            <i class="fa-solid fa-chevron-up"></i>
                                        </button>
                                        <button class="arrow-btn" :disabled="k === list.length - 1" v-on:click="doiThuTu(k, k+1)">
                                            <i class="fa-solid fa-chevron-down"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <img :src="v.hinh_anh" class="banner-thumb" alt="banner"
                                     onerror="this.style.opacity=0.2"
                                     v-on:click="xemAnh(v.hinh_anh)">
                            </td>
                            <td style="font-weight:600">@{{ v.ten_banner }}</td>
                            <td>
                                <button class="status-pill" :class="v.trang_thai==1?'active':'inactive'" v-on:click="doiStatus(v)">
                                    <i :class="v.trang_thai==1?'fa-solid fa-eye':'fa-solid fa-eye-slash'"></i>
                                    @{{ v.trang_thai==1 ? 'Hiển thị' : 'Đã ẩn' }}
                                </button>
                            </td>
                            <td>
                                <div class="action-group">
                                    <button class="action-btn edit" v-on:click="moSua(v)"><i class="fa-solid fa-pen"></i></button>
                                    <button class="action-btn del" v-on:click="moXoa(v)"><i class="fa-solid fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr v-if="list.length === 0">
                            <td colspan="5" style="text-align:center;padding:40px;color:#94a3b8">
                                <i class="fa-regular fa-image" style="font-size:32px;display:block;margin-bottom:8px"></i>
                                Chưa có banner nào
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalXemAnh" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content" style="background:transparent;border:none">
            <div style="position:relative">
                <button type="button" data-bs-dismiss="modal" style="position:absolute;top:-12px;right:-12px;z-index:10;width:32px;height:32px;border-radius:50%;background:#fff;border:none;font-size:16px;cursor:pointer;display:flex;align-items:center;justify-content:center;box-shadow:0 2px 8px rgba(0,0,0,.2)">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                <img id="xemAnhSrc" src="" style="width:100%;border-radius:12px;display:block" alt="preview">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalSua" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content" style="border-radius:16px;border:none">
            <div class="modal-header" style="background:linear-gradient(135deg,#f59e0b,#d97706);color:#fff;border-radius:16px 16px 0 0">
                <h5 class="modal-title" style="color:#fff;font-weight:700"><i class="fa-solid fa-pen"></i> Sửa Banner</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="padding:24px">
                <input type="hidden" id="sua-id">
                <div class="vip-form-group">
                    <label>Tên banner</label>
                    <input type="text" id="sua-ten" class="form-control">
                </div>
                <div class="vip-form-group">
                    <label>URL hình ảnh</label>
                    <input type="text" id="sua-hinh" class="form-control" oninput="suaPreview(this.value)">
                    <div id="sua-preview-box" style="width:100%;height:130px;border-radius:10px;border:1.5px dashed #cbd5e1;background:#f8fafc;display:flex;flex-direction:column;align-items:center;justify-content:center;color:#94a3b8;font-size:13px;gap:6px;margin-top:8px">
                        <i class="fa-regular fa-image" style="font-size:28px;color:#cbd5e1"></i>
                        <span>Nhập URL để xem trước</span>
                    </div>
                    <img id="sua-preview-img" src="" alt="preview" style="width:100%;height:130px;object-fit:cover;border-radius:10px;border:1.5px solid #e2e8f0;margin-top:8px;display:none">
                </div>
                <div class="vip-form-group">
                    <label>Đường dẫn khi click</label>
                    <input type="text" id="sua-duong-dan" class="form-control">
                </div>
                <div class="vip-form-group">
                    <label>Trạng thái</label>
                    <select id="sua-trang-thai" class="form-control">
                        <option value="1">Hiển thị</option>
                        <option value="0">Ẩn</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer" style="padding:16px 24px">
                <button class="btn-vip-secondary" data-bs-dismiss="modal">Hủy</button>
                <button class="btn-vip-primary" onclick="capNhat()"><i class="fa-solid fa-check"></i> Cập Nhật</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalXoa" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius:16px;border:none">
            <div class="modal-header" style="background:linear-gradient(135deg,#ef4444,#dc2626);color:#fff;border-radius:16px 16px 0 0">
                <h5 class="modal-title" style="color:#fff;font-weight:700"><i class="fa-solid fa-triangle-exclamation"></i> Xác Nhận Xóa</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="padding:24px">
                <div style="background:#fef2f2;border-left:4px solid #ef4444;padding:16px;border-radius:8px">
                    <p style="margin:0;font-weight:600">Bạn có chắc muốn xóa banner <strong id="xoa-ten"></strong>?</p>
                    <input type="hidden" id="xoa-id">
                </div>
            </div>
            <div class="modal-footer" style="padding:16px 24px">
                <button class="btn-vip-secondary" data-bs-dismiss="modal">Hủy</button>
                <button class="btn-vip-danger" onclick="xoa()"><i class="fa-solid fa-trash"></i> Xóa</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
var vueApp = new Vue({
    el: '#app',
    data: {
        list: [],
        banner: { ten_banner: '', hinh_anh: '', duong_dan: '', thu_tu: 1, trang_thai: 1 }
    },
    created: function() { this.load(); },
    methods: {
        load: function() {
            var self = this;
            axios.post('{{ Route("BannerData") }}').then(function(r) {
                self.list = r.data.data.sort(function(a, b) { return a.thu_tu - b.thu_tu; });
            });
        },
        themMoi: function() {
            if (!this.banner.ten_banner || !this.banner.hinh_anh) {
                toastr.error('Vui lòng nhập tên và URL hình ảnh');
                return;
            }
            var self = this;
            axios.post('{{ Route("BannerCreate") }}', this.banner).then(function(r) {
                if (r.data.status) {
                    toastr.success(r.data.message);
                    self.banner = { ten_banner: '', hinh_anh: '', duong_dan: '', thu_tu: self.list.length + 2, trang_thai: 1 };
                    self.load();
                } else {
                    toastr.error(r.data.message);
                }
            });
        },
        doiStatus: function(v) {
            var self = this;
            axios.post('{{ Route("BannerStatus") }}', { id: v.id }).then(function(r) {
                if (r.data.status) { toastr.success(r.data.message); self.load(); }
            });
        },
        doiThuTu: function(fromIdx, toIdx) {
            var listCopy = this.list.slice();
            var temp = listCopy[fromIdx];
            listCopy[fromIdx] = listCopy[toIdx];
            listCopy[toIdx] = temp;
            var self = this;
            var updates = [];
            for (var i = 0; i < listCopy.length; i++) {
                updates.push(axios.post('{{ Route("BannerUpdate") }}', {
                    id: listCopy[i].id,
                    ten_banner: listCopy[i].ten_banner,
                    hinh_anh: listCopy[i].hinh_anh,
                    duong_dan: listCopy[i].duong_dan,
                    trang_thai: listCopy[i].trang_thai,
                    thu_tu: i + 1
                }));
            }
            Promise.all(updates).then(function() {
                toastr.success('Đã cập nhật thứ tự');
                self.load();
            }).catch(function() {
                toastr.error('Lỗi cập nhật thứ tự');
            });
        },
        xemAnh: function(url) {
            document.getElementById('xemAnhSrc').src = url;
            new bootstrap.Modal(document.getElementById('ModalXemAnh')).show();
        },
        moSua: function(v) {
            document.getElementById('sua-id').value = v.id;
            document.getElementById('sua-ten').value = v.ten_banner;
            document.getElementById('sua-hinh').value = v.hinh_anh || '';
            document.getElementById('sua-duong-dan').value = v.duong_dan || '';
            document.getElementById('sua-trang-thai').value = v.trang_thai;
            suaPreview(v.hinh_anh || '');
            new bootstrap.Modal(document.getElementById('ModalSua')).show();
        },
        moXoa: function(v) {
            document.getElementById('xoa-id').value = v.id;
            document.getElementById('xoa-ten').textContent = v.ten_banner;
            new bootstrap.Modal(document.getElementById('ModalXoa')).show();
        }
    }
});

function suaPreview(url) {
    var img = document.getElementById('sua-preview-img');
    var box = document.getElementById('sua-preview-box');
    if (url) {
        img.src = url;
        img.style.display = 'block';
        box.style.display = 'none';
    } else {
        img.style.display = 'none';
        box.style.display = 'flex';
    }
}

function capNhat() {
    var id = document.getElementById('sua-id').value;
    var item = vueApp.list.find(function(x) { return x.id == id; });
    var data = {
        id: id,
        ten_banner: document.getElementById('sua-ten').value,
        hinh_anh: document.getElementById('sua-hinh').value,
        duong_dan: document.getElementById('sua-duong-dan').value,
        trang_thai: document.getElementById('sua-trang-thai').value,
        thu_tu: item ? item.thu_tu : 1
    };
    axios.post('{{ Route("BannerUpdate") }}', data).then(function(r) {
        if (r.data.status) {
            toastr.success(r.data.message);
            bootstrap.Modal.getInstance(document.getElementById('ModalSua')).hide();
            vueApp.load();
        } else {
            toastr.error(r.data.message);
        }
    });
}

function xoa() {
    axios.post('{{ Route("BannerDestroy") }}', { id: document.getElementById('xoa-id').value }).then(function(r) {
        if (r.data.status) {
            toastr.success(r.data.message);
            bootstrap.Modal.getInstance(document.getElementById('ModalXoa')).hide();
            vueApp.load();
        } else {
            toastr.error(r.data.message);
        }
    });
}
</script>
@endsection
