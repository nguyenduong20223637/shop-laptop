<?php $__env->startSection('css'); ?>
<style>
.page-vip { padding: 28px 32px; }
.vip-card { background: #fff; border-radius: 16px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); }
.vip-card-header { padding: 20px 24px; border-bottom: 1px solid #f1f5f9; display: flex; justify-content: space-between; align-items: center; }
.vip-card-header h3 { font-size: 16px; font-weight: 700; color: #0f172a; margin: 0; }
.vip-card-body { padding: 24px; }
.vip-form-group { margin-bottom: 18px; }
.vip-form-group label { display: block; font-size: 13px; font-weight: 600; color: #374151; margin-bottom: 6px; }
.vip-form-group input, .vip-form-group select { width: 100%; padding: 10px 14px; border: 1.5px solid #e2e8f0; border-radius: 10px; font-size: 14px; outline: none; background: #fff; }
.btn-vip-primary { background: linear-gradient(135deg, #0ea5e9, #3b82f6); color: #fff; border: none; border-radius: 10px; padding: 10px 20px; font-size: 14px; font-weight: 700; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; }
.btn-vip-danger { background: linear-gradient(135deg, #ef4444, #dc2626); color: #fff; border: none; border-radius: 10px; padding: 10px 20px; font-size: 14px; font-weight: 700; cursor: pointer; }
.btn-vip-secondary { background: #f1f5f9; color: #64748b; border: none; border-radius: 10px; padding: 10px 20px; font-size: 14px; font-weight: 600; cursor: pointer; }
.vip-table { width: 100%; border-collapse: collapse; }
.vip-table th { padding: 14px 16px; text-align: left; font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 1px solid #e2e8f0; }
.vip-table td { padding: 14px 16px; border-bottom: 1px solid #f1f5f9; font-size: 14px; color: #0f172a; vertical-align: middle; }
.vip-table tbody tr:hover { background: #f8fafc; }
.status-pill { padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: 700; display: inline-flex; align-items: center; gap: 4px; cursor: pointer; border: none; }
.status-pill.active { background: #dcfce7; color: #16a34a; }
.status-pill.inactive { background: #fee2e2; color: #dc2626; }
.action-group { display: flex; gap: 8px; }
.action-btn { width: 32px; height: 32px; border-radius: 8px; border: none; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.2s; font-size: 13px; }
.action-btn.edit { background: #dbeafe; color: #0ea5e9; }
.action-btn.edit:hover { background: #0ea5e9; color: #fff; }
.action-btn.del { background: #fee2e2; color: #ef4444; }
.action-btn.del:hover { background: #ef4444; color: #fff; }
.preview-img { width: 100%; height: 100px; object-fit: contain; border-radius: 10px; border: 1.5px dashed #e2e8f0; background: #f8fafc; margin-top: 8px; }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('noi_dung'); ?>
<div class="page-vip" id="app">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:24px;">
        <h2 style="font-size:22px;font-weight:800;color:#f1f5f9;margin:0;"><i class="fa-solid fa-folder-open" style="color:#0ea5e9;"></i> Quản Lý Danh Mục</h2>
    </div>
    <div class="row g-4">
        <div class="col-lg-4">
            <div class="vip-card">
                <div class="vip-card-header"><h3><i class="fa-solid fa-plus" style="color:#0ea5e9;"></i> Thêm Danh Mục</h3></div>
                <div class="vip-card-body">
                    <div class="vip-form-group">
                        <label>Tên danh mục</label>
                        <input type="text" v-model="danh_muc.ten_danh_muc" placeholder="VD: Gaming, Học tập...">
                    </div>
                    <div class="vip-form-group">
                        <label>URL Hình ảnh</label>
                        <input type="text" v-model="danh_muc.hinh_anh" placeholder="https://...">
                        <img v-if="danh_muc.hinh_anh" :src="danh_muc.hinh_anh" class="preview-img" alt="preview">
                    </div>
                    <div class="vip-form-group">
                        <label>Trạng thái</label>
                        <select v-model="danh_muc.trang_thai">
                            <option value="1">Hiển thị</option>
                            <option value="0">Ẩn</option>
                        </select>
                    </div>
                    <button class="btn-vip-primary" v-on:click="taoDM()" style="width:100%;justify-content:center;">
                        <i class="fa-solid fa-plus"></i> Thêm Mới
                    </button>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="vip-card">
                <div class="vip-card-header">
                    <h3><i class="fa-solid fa-list" style="color:#0ea5e9;"></i> Danh Sách Danh Mục</h3>
                    <span style="background:#f1f5f9;padding:4px 12px;border-radius:20px;font-size:13px;font-weight:700;color:#64748b;">{{ List_DM.length }} danh mục</span>
                </div>
                <table class="vip-table">
                    <thead><tr><th>#</th><th>Tên Danh Mục</th><th>Hình Ảnh</th><th>Trạng Thái</th><th>Thao Tác</th></tr></thead>
                    <tbody>
                        <tr v-for="(v, k) in List_DM" :key="v.id">
                            <td style="color:#94a3b8;font-weight:600;">{{ k + 1 }}</td>
                            <td style="font-weight:600;">{{ v.ten_danh_muc }}</td>
                            <td><img :src="v.hinh_anh" style="width:44px;height:44px;border-radius:8px;object-fit:cover;" alt="img"></td>
                            <td>
                                <button class="status-pill" :class="v.trang_thai == 1 ? 'active' : 'inactive'" v-on:click="doiStatus(v)">
                                    <i :class="v.trang_thai == 1 ? 'fa-solid fa-eye' : 'fa-solid fa-eye-slash'"></i>
                                    {{ v.trang_thai == 1 ? 'Hiển thị' : 'Đã ẩn' }}
                                </button>
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
</div>

<!-- Modal Sửa - NGOÀI #app -->
<div class="modal fade" id="EditModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content" style="border-radius:16px;border:none;">
            <div class="modal-header" style="background:linear-gradient(135deg,#f59e0b,#d97706);color:#fff;border-radius:16px 16px 0 0;">
                <h5 class="modal-title" style="color:#fff;font-weight:700;"><i class="fa-solid fa-pen"></i> Sửa Danh Mục</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="padding:24px;">
                <input type="hidden" id="edit-id">
                <div class="vip-form-group">
                    <label>Tên danh mục</label>
                    <input type="text" id="edit-ten" class="form-control">
                </div>
                <div class="vip-form-group">
                    <label>URL Hình ảnh</label>
                    <input type="text" id="edit-hinh-anh" class="form-control">
                </div>
                <div class="vip-form-group">
                    <label>Trạng thái</label>
                    <select id="edit-trang-thai" class="form-control">
                        <option value="1">Hiển thị</option>
                        <option value="0">Ẩn</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer" style="padding:16px 24px;">
                <button class="btn-vip-secondary" data-bs-dismiss="modal">Hủy</button>
                <button class="btn-vip-primary" onclick="capNhatDM()"><i class="fa-solid fa-check"></i> Cập Nhật</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Xóa - NGOÀI #app -->
<div class="modal fade" id="DelBackdrop" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius:16px;border:none;">
            <div class="modal-header" style="background:linear-gradient(135deg,#ef4444,#dc2626);color:#fff;border-radius:16px 16px 0 0;">
                <h5 class="modal-title" style="color:#fff;font-weight:700;"><i class="fa-solid fa-triangle-exclamation"></i> Xác Nhận Xóa</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="padding:24px;">
                <div style="background:#fef2f2;border-left:4px solid #ef4444;padding:16px;border-radius:8px;">
                    <p style="margin:0;font-weight:600;">Bạn có chắc muốn xóa danh mục <strong id="del-ten"></strong>?</p>
                    <input type="hidden" id="del-id">
                </div>
            </div>
            <div class="modal-footer" style="padding:16px 24px;">
                <button class="btn-vip-secondary" data-bs-dismiss="modal">Hủy</button>
                <button class="btn-vip-danger" onclick="xoaDM()"><i class="fa-solid fa-trash"></i> Xóa</button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
var vueApp = new Vue({
    el: '#app',
    data: {
        danh_muc: { trang_thai: 1 },
        List_DM: [],
    },
    created() { this.loadData(); },
    methods: {
        taoDM() {
            if (!this.danh_muc.ten_danh_muc) { toastr.error('Vui lòng nhập tên danh mục'); return; }
            axios.post("<?php echo e(Route('DanhMucCreate')); ?>", this.danh_muc)
                .then((res) => {
                    if (res.data.status == 1) { toastr.success(res.data.message); this.loadData(); this.danh_muc = {trang_thai:1}; }
                    else toastr.error(res.data.message);
                });
        },
        doiStatus(payload) {
            axios.post('<?php echo e(Route('DanhMucStatus')); ?>', payload)
                .then((res) => {
                    if (res.data.status == 1) { toastr.success(res.data.message); this.loadData(); }
                    else toastr.error(res.data.message);
                });
        },
        moModalSua(v) {
            document.getElementById('edit-id').value = v.id;
            document.getElementById('edit-ten').value = v.ten_danh_muc;
            document.getElementById('edit-hinh-anh').value = v.hinh_anh || '';
            document.getElementById('edit-trang-thai').value = v.trang_thai;
            new bootstrap.Modal(document.getElementById('EditModal')).show();
        },
        moModalXoa(v) {
            document.getElementById('del-id').value = v.id;
            document.getElementById('del-ten').textContent = v.ten_danh_muc;
            new bootstrap.Modal(document.getElementById('DelBackdrop')).show();
        },
        loadData() {
            axios.post('<?php echo e(Route('DanhMucData')); ?>')
                .then((res) => { this.List_DM = res.data.data; });
        }
    },
});

function capNhatDM() {
    var data = {
        id: document.getElementById('edit-id').value,
        ten_danh_muc: document.getElementById('edit-ten').value,
        hinh_anh: document.getElementById('edit-hinh-anh').value,
        trang_thai: document.getElementById('edit-trang-thai').value,
    };
    axios.post('<?php echo e(Route('DanhMucUpdate')); ?>', data)
        .then((res) => {
            if (res.data.status == 1) {
                toastr.success(res.data.message);
                bootstrap.Modal.getInstance(document.getElementById('EditModal')).hide();
                vueApp.loadData();
            } else toastr.error(res.data.message);
        });
}

function xoaDM() {
    axios.post('<?php echo e(Route('DanhMucDestroy')); ?>', { id: document.getElementById('del-id').value })
        .then((res) => {
            if (res.data.status == 1) {
                toastr.success(res.data.message);
                bootstrap.Modal.getInstance(document.getElementById('DelBackdrop')).hide();
                vueApp.loadData();
            } else toastr.error(res.data.message);
        });
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.share.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Shop-laptop\resources\views/admin/page/danh-muc/index.blade.php ENDPATH**/ ?>