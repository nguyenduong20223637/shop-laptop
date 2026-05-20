@extends('admin.share.master')

@section('css')
<style>
.page-vip { padding: 28px 32px; }
.page-header-vip { display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; }
.page-title-vip { font-size: 22px; font-weight: 800; color: #f1f5f9; display: flex; align-items: center; gap: 10px; }
.page-title-vip i { color: #0ea5e9; }
.vip-card { background: #fff; border-radius: 16px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); }
.vip-card-header { padding: 20px 24px; border-bottom: 1px solid #f1f5f9; display: flex; justify-content: space-between; align-items: center; }
.vip-card-header h3 { font-size: 16px; font-weight: 700; color: #0f172a; margin: 0; }
.vip-card-body { padding: 24px; }
.vip-form-group { margin-bottom: 18px; }
.vip-form-group label { display: block; font-size: 13px; font-weight: 600; color: #374151; margin-bottom: 6px; }
.vip-form-group input, .vip-form-group select, .vip-form-group textarea { width: 100%; padding: 10px 14px; border: 1.5px solid #e2e8f0; border-radius: 10px; font-size: 14px; outline: none; transition: all 0.2s; background: #fff; }
.btn-vip-primary { background: linear-gradient(135deg, #0ea5e9, #3b82f6); color: #fff; border: none; border-radius: 10px; padding: 10px 20px; font-size: 14px; font-weight: 700; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; }
.btn-vip-danger { background: linear-gradient(135deg, #ef4444, #dc2626); color: #fff; border: none; border-radius: 10px; padding: 10px 20px; font-size: 14px; font-weight: 700; cursor: pointer; }
.btn-vip-secondary { background: #f1f5f9; color: #64748b; border: none; border-radius: 10px; padding: 10px 20px; font-size: 14px; font-weight: 600; cursor: pointer; }
.vip-table { width: 100%; border-collapse: collapse; }
.vip-table th { padding: 14px 16px; text-align: left; font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 1px solid #e2e8f0; }
.vip-table td { padding: 14px 16px; border-bottom: 1px solid #f1f5f9; font-size: 14px; color: #0f172a; vertical-align: middle; }
.vip-table tbody tr:hover { background: #f8fafc; }
.brand-cell { display: flex; align-items: center; gap: 12px; }
.brand-img { width: 44px; height: 44px; border-radius: 10px; object-fit: contain; background: #f8fafc; border: 1px solid #e2e8f0; padding: 4px; }
.brand-name { font-weight: 600; color: #0f172a; }
.status-pill { padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: 700; display: inline-flex; align-items: center; gap: 4px; cursor: pointer; border: none; }
.status-pill.active { background: #dcfce7; color: #16a34a; }
.status-pill.inactive { background: #fee2e2; color: #dc2626; }
.action-group { display: flex; gap: 8px; }
.action-btn { width: 32px; height: 32px; border-radius: 8px; border: none; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.2s; font-size: 13px; }
.action-btn.edit { background: #dbeafe; color: #0ea5e9; }
.action-btn.edit:hover { background: #0ea5e9; color: #fff; }
.action-btn.del { background: #fee2e2; color: #ef4444; }
.action-btn.del:hover { background: #ef4444; color: #fff; }
.action-btn.view { background: #e0f2fe; color: #0284c7; }
.action-btn.view:hover { background: #0284c7; color: #fff; }
.preview-img { width: 100%; height: 120px; object-fit: contain; border-radius: 10px; border: 1.5px dashed #e2e8f0; background: #f8fafc; margin-top: 8px; }
</style>
@endsection

@section('noi_dung')
<div class="page-vip" id="app">
    <div class="page-header-vip">
        <div class="page-title-vip"><i class="fa-solid fa-copyright"></i> Quản Lý Thương Hiệu</div>
    </div>
    <div class="row g-4">
        <div class="col-lg-4">
            <div class="vip-card">
                <div class="vip-card-header"><h3><i class="fa-solid fa-plus" style="color:#0ea5e9;"></i> Thêm Thương Hiệu</h3></div>
                <div class="vip-card-body">
                    <div class="vip-form-group">
                        <label>Tên thương hiệu</label>
                        <input type="text" v-model="thuong_hieu.ten_thuong_hieu" placeholder="VD: Dell, Asus, Lenovo...">
                    </div>
                    <div class="vip-form-group">
                        <label>URL Hình ảnh (Logo)</label>
                        <input type="text" v-model="thuong_hieu.hinh_anh" placeholder="https://...">
                        <img v-if="thuong_hieu.hinh_anh" :src="thuong_hieu.hinh_anh" class="preview-img" alt="preview">
                    </div>
                    <div class="vip-form-group">
                        <label>URL Banner (Ảnh trang thương hiệu)</label>
                        <input type="text" v-model="thuong_hieu.banner" placeholder="https://... (ảnh nền banner rộng)">
                        <img v-if="thuong_hieu.banner" :src="thuong_hieu.banner" class="preview-img" alt="banner preview" style="height:80px;object-fit:cover;">
                    </div>
                    <div class="vip-form-group">
                        <label>Trạng thái</label>
                        <select v-model="thuong_hieu.trang_thai">
                            <option value="1">Hiển thị</option>
                            <option value="0">Ẩn</option>
                        </select>
                    </div>
                    <div class="vip-form-group">
                        <label>Mô tả</label>
                        <textarea id="mota" rows="4" style="width:100%;padding:8px;border:1.5px solid #e2e8f0;border-radius:10px;resize:vertical;font-size:14px;"></textarea>
                    </div>
                    <button class="btn-vip-primary" v-on:click="taoTH()" style="width:100%;justify-content:center;">
                        <i class="fa-solid fa-plus"></i> Thêm Mới
                    </button>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="vip-card">
                <div class="vip-card-header">
                    <h3><i class="fa-solid fa-list" style="color:#0ea5e9;"></i> Danh Sách Thương Hiệu</h3>
                    <span style="background:#f1f5f9;padding:4px 12px;border-radius:20px;font-size:13px;font-weight:700;color:#64748b;">@{{ List_TH.length }} thương hiệu</span>
                </div>
                <table class="vip-table">
                    <thead><tr><th>#</th><th>Thương Hiệu</th><th>Trạng Thái</th><th>Mô Tả</th><th>Thao Tác</th></tr></thead>
                    <tbody>
                        <tr v-for="(v, k) in List_TH" :key="v.id">
                            <td style="color:#94a3b8;font-weight:600;">@{{ k + 1 }}</td>
                            <td>
                                <div class="brand-cell">
                                    <img :src="v.hinh_anh" class="brand-img" alt="brand" onerror="this.style.background='#f1f5f9';this.src='data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'44\' height=\'44\' viewBox=\'0 0 44 44\'%3E%3Crect width=\'44\' height=\'44\' fill=\'%23f1f5f9\'/%3E%3Ctext x=\'50%25\' y=\'50%25\' dominant-baseline=\'middle\' text-anchor=\'middle\' font-size=\'10\' fill=\'%2394a3b8\'%3ENo img%3C/text%3E%3C/svg%3E'">
                                    <div class="brand-name">@{{ v.ten_thuong_hieu }}</div>
                                </div>
                            </td>
                            <td>
                                <button class="status-pill" :class="v.trang_thai == 1 ? 'active' : 'inactive'" v-on:click="doiStatus(v)">
                                    <i :class="v.trang_thai == 1 ? 'fa-solid fa-eye' : 'fa-solid fa-eye-slash'"></i>
                                    @{{ v.trang_thai == 1 ? 'Hiển thị' : 'Đã ẩn' }}
                                </button>
                            </td>
                            <td>
                                <button class="action-btn view" v-on:click="xemMoTa(v)"><i class="fa-regular fa-message"></i></button>
                            </td>
                            <td>
                                <div class="action-group">
                                    <button class="action-btn edit" v-on:click="moModalSua(v)"><i class="fa-solid fa-pen"></i></button>
                                    <button class="action-btn del" v-on:click="moModalXoa(v)"><i class="fa-solid fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>{{-- end app --}}

<!-- Modals nằm NGOÀI #app -->
<div class="modal fade" id="DesciptionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content" style="border-radius:16px;border:none;">
            <div class="modal-header" style="background:linear-gradient(135deg,#0ea5e9,#3b82f6);color:#fff;border-radius:16px 16px 0 0;">
                <h5 class="modal-title" style="color:#fff;font-weight:700;"><i class="fa-regular fa-message"></i> Mô Tả</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="mo-ta-body" style="padding:24px;"></div>
            <div class="modal-footer" style="padding:16px 24px;">
                <button class="btn-vip-secondary" data-bs-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="EditModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content" style="border-radius:16px;border:none;">
            <div class="modal-header" style="background:linear-gradient(135deg,#f59e0b,#d97706);color:#fff;border-radius:16px 16px 0 0;">
                <h5 class="modal-title" style="color:#fff;font-weight:700;"><i class="fa-solid fa-pen"></i> Chỉnh Sửa Thương Hiệu</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="padding:24px;">
                <input type="hidden" id="edit-id">
                <div class="vip-form-group">
                    <label>Tên thương hiệu</label>
                    <input type="text" id="edit-ten" class="form-control">
                </div>
                <div class="vip-form-group">
                    <label>URL Hình ảnh (Logo)</label>
                    <input type="text" id="edit-hinh-anh" class="form-control" oninput="document.getElementById('edit-preview').src=this.value;document.getElementById('edit-preview').style.display='block'">
                    <img id="edit-preview" src="" style="width:100%;height:120px;object-fit:contain;border-radius:10px;border:1.5px dashed #e2e8f0;background:#f8fafc;margin-top:8px;display:none;">
                </div>
                <div class="vip-form-group">
                    <label>URL Banner (Ảnh trang thương hiệu)</label>
                    <input type="text" id="edit-banner" class="form-control" oninput="document.getElementById('edit-banner-preview').src=this.value;document.getElementById('edit-banner-preview').style.display='block'" placeholder="https://... (ảnh nền banner rộng)">
                    <img id="edit-banner-preview" src="" style="width:100%;height:80px;object-fit:cover;border-radius:10px;border:1.5px dashed #e2e8f0;background:#f8fafc;margin-top:8px;display:none;">
                </div>
                <div class="vip-form-group">
                    <label>Trạng thái</label>
                    <select id="edit-trang-thai" class="form-control">
                        <option value="1">Hiển thị</option>
                        <option value="0">Ẩn</option>
                    </select>
                </div>
                <div class="vip-form-group">
                    <label>Mô tả</label>
                    <textarea id="edit-mo-ta" rows="4" class="form-control" style="resize:vertical;"></textarea>
                </div>
            </div>
            <div class="modal-footer" style="padding:16px 24px;">
                <button class="btn-vip-secondary" data-bs-dismiss="modal">Hủy</button>
                <button class="btn-vip-primary" onclick="capNhatTH()"><i class="fa-solid fa-check"></i> Cập Nhật</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="DelBackdrop" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius:16px;border:none;">
            <div class="modal-header" style="background:linear-gradient(135deg,#ef4444,#dc2626);color:#fff;border-radius:16px 16px 0 0;">
                <h5 class="modal-title" style="color:#fff;font-weight:700;"><i class="fa-solid fa-triangle-exclamation"></i> Xác Nhận Xóa</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="padding:24px;">
                <div style="background:#fef2f2;border-left:4px solid #ef4444;padding:16px;border-radius:8px;">
                    <p style="margin:0;font-weight:600;">Bạn có chắc muốn xóa <strong id="del-ten"></strong>?</p>
                    <input type="hidden" id="del-id">
                </div>
            </div>
            <div class="modal-footer" style="padding:16px 24px;">
                <button class="btn-vip-secondary" data-bs-dismiss="modal">Hủy</button>
                <button class="btn-vip-danger" onclick="xoaTH()"><i class="fa-solid fa-trash"></i> Xóa</button>
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
        thuong_hieu: { mo_ta: '', trang_thai: 1 },
        List_TH: [],
    },
    created() { this.loadData(); },
    methods: {
        taoTH() {
            this.thuong_hieu.mo_ta = document.getElementById('mota').value;
            if (!this.thuong_hieu.ten_thuong_hieu) { toastr.error('Vui lòng nhập tên thương hiệu'); return; }
            axios.post("{{ Route('ThuongHieuCreate') }}", this.thuong_hieu)
                .then((res) => {
                    if (res.data.status == 1) { toastr.success(res.data.message); this.loadData(); this.thuong_hieu = {mo_ta:'',trang_thai:1}; document.getElementById('mota').value=''; }
                    else toastr.error(res.data.message);
                });
        },
        doiStatus(payload) {
            axios.post('{{ Route('ThuongHieuStatus') }}', payload)
                .then((res) => {
                    if (res.data.status == 1) { toastr.success(res.data.message); this.loadData(); }
                    else toastr.error(res.data.message);
                });
        },
        xemMoTa(v) {
            document.getElementById('mo-ta-body').innerHTML = v.mo_ta || '';
            new bootstrap.Modal(document.getElementById('DesciptionModal')).show();
        },
        moModalSua(v) {
            document.getElementById('edit-id').value = v.id;
            document.getElementById('edit-ten').value = v.ten_thuong_hieu;
            document.getElementById('edit-hinh-anh').value = v.hinh_anh || '';
            document.getElementById('edit-banner').value = v.banner || '';
            document.getElementById('edit-trang-thai').value = v.trang_thai;
            document.getElementById('edit-mo-ta').value = v.mo_ta || '';
            var prev = document.getElementById('edit-preview');
            if (v.hinh_anh) { prev.src = v.hinh_anh; prev.style.display = 'block'; } else { prev.style.display = 'none'; }
            var bannerPrev = document.getElementById('edit-banner-preview');
            if (v.banner) { bannerPrev.src = v.banner; bannerPrev.style.display = 'block'; } else { bannerPrev.style.display = 'none'; }
            new bootstrap.Modal(document.getElementById('EditModal')).show();
        },
        moModalXoa(v) {
            document.getElementById('del-id').value = v.id;
            document.getElementById('del-ten').textContent = v.ten_thuong_hieu;
            new bootstrap.Modal(document.getElementById('DelBackdrop')).show();
        },
        loadData() {
            axios.post('{{ Route('ThuongHieuData') }}')
                .then((res) => { this.List_TH = res.data.data; });
        }
    },
});

function capNhatTH() {
    var data = {
        id: document.getElementById('edit-id').value,
        ten_thuong_hieu: document.getElementById('edit-ten').value,
        hinh_anh: document.getElementById('edit-hinh-anh').value,
        banner: document.getElementById('edit-banner').value,
        trang_thai: document.getElementById('edit-trang-thai').value,
        mo_ta: document.getElementById('edit-mo-ta').value,
    };
    axios.post('{{ Route('ThuongHieuUpdate') }}', data)
        .then((res) => {
            if (res.data.status == 1) {
                toastr.success(res.data.message);
                bootstrap.Modal.getInstance(document.getElementById('EditModal')).hide();
                vueApp.loadData();
            } else toastr.error(res.data.message);
        });
}

function xoaTH() {
    var data = { id: document.getElementById('del-id').value };
    axios.post('{{ Route('ThuongHieuDestroy') }}', data)
        .then((res) => {
            if (res.data.status == 1) {
                toastr.success(res.data.message);
                bootstrap.Modal.getInstance(document.getElementById('DelBackdrop')).hide();
                vueApp.loadData();
            } else toastr.error(res.data.message);
        });
}
</script>
@endsection
