<?php $__env->startSection('css'); ?>
<style>
.page-vip { padding: 28px 32px; }
.vip-card { background: #fff; border-radius: 16px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); }
.vip-card-header { padding: 20px 24px; border-bottom: 1px solid #f1f5f9; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px; }
.vip-card-header h3 { font-size: 16px; font-weight: 700; color: #0f172a; margin: 0; }
.btn-vip-primary { background: linear-gradient(135deg, #0ea5e9, #3b82f6); color: #fff; border: none; border-radius: 10px; padding: 10px 20px; font-size: 14px; font-weight: 700; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; transition: all 0.2s; }
.btn-vip-primary:hover { transform: translateY(-1px); box-shadow: 0 6px 16px rgba(14,165,233,0.35); }
.btn-vip-danger { background: linear-gradient(135deg, #ef4444, #dc2626); color: #fff; border: none; border-radius: 10px; padding: 10px 20px; font-size: 14px; font-weight: 700; cursor: pointer; }
.btn-vip-secondary { background: #f1f5f9; color: #64748b; border: none; border-radius: 10px; padding: 10px 20px; font-size: 14px; font-weight: 600; cursor: pointer; }
.vip-table { width: 100%; border-collapse: collapse; }
.vip-table th { padding: 12px 16px; text-align: left; font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 1px solid #e2e8f0; }
.vip-table td { padding: 12px 16px; border-bottom: 1px solid #f1f5f9; font-size: 14px; color: #0f172a; vertical-align: middle; }
.vip-table tbody tr:hover { background: #f8fafc; }
.user-cell { display: flex; align-items: center; gap: 10px; }
.user-avatar { width: 36px; height: 36px; border-radius: 50%; background: linear-gradient(135deg,#0ea5e9,#6366f1); display: flex; align-items: center; justify-content: center; color: #fff; font-size: 14px; font-weight: 700; flex-shrink: 0; }
.user-name { font-weight: 600; color: #0f172a; }
.user-email { font-size: 12px; color: #64748b; }
.status-pill { padding: 4px 10px; border-radius: 20px; font-size: 11px; font-weight: 700; display: inline-flex; align-items: center; gap: 4px; cursor: pointer; border: none; white-space: nowrap; }
.status-pill.active { background: #dcfce7; color: #16a34a; }
.status-pill.inactive { background: #fee2e2; color: #dc2626; }
.status-pill.blocked { background: #fef3c7; color: #d97706; }
.status-pill.unblocked { background: #dbeafe; color: #2563eb; }
.action-group { display: flex; gap: 6px; }
.action-btn { width: 30px; height: 30px; border-radius: 8px; border: none; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.2s; font-size: 12px; }
.action-btn.edit { background: #dbeafe; color: #0ea5e9; }
.action-btn.edit:hover { background: #0ea5e9; color: #fff; }
.action-btn.del { background: #fee2e2; color: #ef4444; }
.action-btn.del:hover { background: #ef4444; color: #fff; }
.vip-form-group { margin-bottom: 14px; }
.vip-form-group label { display: block; font-size: 12px; font-weight: 600; color: #374151; margin-bottom: 5px; }
.vip-form-group input, .vip-form-group select, .vip-form-group textarea { width: 100%; padding: 9px 12px; border: 1.5px solid #e2e8f0; border-radius: 8px; font-size: 13px; outline: none; background: #fff; }
.vip-form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 0 16px; }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('noi_dung'); ?>
<div class="page-vip" id="app">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:24px;flex-wrap:wrap;gap:12px;">
        <h2 style="font-size:22px;font-weight:800;color:#f1f5f9;margin:0;"><i class="fa-solid fa-users" style="color:#0ea5e9;"></i> Quản Lý Tài Khoản</h2>
        <button class="btn-vip-primary" v-on:click="moModalThem()"><i class="fa-solid fa-user-plus"></i> Tài Khoản Mới</button>
    </div>

    <div class="vip-card">
        <div class="vip-card-header">
            <h3><i class="fa-solid fa-list" style="color:#0ea5e9;"></i> Danh Sách Tài Khoản</h3>
            <span style="background:#f1f5f9;padding:4px 12px;border-radius:20px;font-size:13px;font-weight:700;color:#64748b;">{{ list_tai_khoan.length }} tài khoản</span>
        </div>
        <div style="overflow-x:auto;">
            <table class="vip-table">
                <thead>
                    <tr><th>#</th><th>Người Dùng</th><th>Số Điện Thoại</th><th>Kích Hoạt</th><th>Trạng Thái</th><th>Thao Tác</th></tr>
                </thead>
                <tbody>
                    <tr v-for="(v, k) in list_tai_khoan" :key="v.id">
                        <td style="color:#94a3b8;font-weight:600;">{{ k+1 }}</td>
                        <td>
                            <div class="user-cell">
                                <div class="user-avatar">{{ v.ho_va_ten ? v.ho_va_ten[0].toUpperCase() : 'U' }}</div>
                                <div>
                                    <div class="user-name">{{ v.ho_va_ten }}</div>
                                    <div class="user-email">{{ v.email }}</div>
                                </div>
                            </div>
                        </td>
                        <td style="color:#64748b;">{{ v.so_dien_thoai }}</td>
                        <td>
                            <button class="status-pill" :class="v.tinh_trang==1?'unblocked':'blocked'" v-on:click="doiTrangThai(v)">
                                <i :class="v.tinh_trang==1?'fa-solid fa-check-circle':'fa-solid fa-clock'"></i>
                                {{ v.tinh_trang==1?'Đã kích hoạt':'Chưa kích hoạt' }}
                            </button>
                        </td>
                        <td>
                            <button class="status-pill" :class="v.tinh_trang==1?'active':'inactive'" v-on:click="doiTrangThai(v)">
                                <i :class="v.tinh_trang==1?'fa-solid fa-circle-dot':'fa-solid fa-circle-xmark'"></i>
                                {{ v.tinh_trang==1?'Hoạt động':'Dừng' }}
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


<div class="modal fade" id="themModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content" style="border-radius:16px;border:none;">
            <div class="modal-header" style="background:linear-gradient(135deg,#0ea5e9,#3b82f6);color:#fff;border-radius:16px 16px 0 0;">
                <h5 class="modal-title" style="color:#fff;font-weight:700;"><i class="fa-solid fa-user-plus"></i> Thêm Tài Khoản Mới</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="padding:24px;">
                <div class="vip-form-grid">
                    <div class="vip-form-group"><label>Email</label><input type="email" id="add-email" placeholder="you@email.com"></div>
                    <div class="vip-form-group"><label>Mật khẩu</label><input type="text" id="add-password" placeholder="Mật khẩu"></div>
                    <div class="vip-form-group"><label>Họ và tên</label><input type="text" id="add-ten" placeholder="Nguyễn Văn A"></div>
                    <div class="vip-form-group"><label>Số điện thoại</label><input type="tel" id="add-sdt" placeholder="09xxxxxxxx"></div>
                    <div class="vip-form-group"><label>Ngày sinh</label><input type="date" id="add-ngaysinh"></div>
                    <div class="vip-form-group"><label>Địa chỉ</label><input type="text" id="add-diachi" placeholder="Địa chỉ"></div>
                    <div class="vip-form-group">
                        <label>Kích hoạt</label>
                        <select id="add-isblock"><option value="1">Đã kích hoạt</option><option value="0">Chưa kích hoạt</option></select>
                    </div>
                    <div class="vip-form-group">
                        <label>Trạng thái</label>
                        <select id="add-tinhtrang"><option value="1">Hoạt động</option><option value="0">Dừng</option></select>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="padding:16px 24px;">
                <button class="btn-vip-secondary" data-bs-dismiss="modal">Hủy</button>
                <button class="btn-vip-primary" onclick="themTK()"><i class="fa-solid fa-check"></i> Thêm Mới</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content" style="border-radius:16px;border:none;">
            <div class="modal-header" style="background:linear-gradient(135deg,#f59e0b,#d97706);color:#fff;border-radius:16px 16px 0 0;">
                <h5 class="modal-title" style="color:#fff;font-weight:700;"><i class="fa-solid fa-pen"></i> Cập Nhật Tài Khoản</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="padding:24px;">
                <input type="hidden" id="edit-id">
                <div class="vip-form-grid">
                    <div class="vip-form-group"><label>Email</label><input type="email" id="edit-email"></div>
                    <div class="vip-form-group"><label>Mật khẩu mới</label><input type="text" id="edit-password" placeholder="Để trống nếu không đổi"></div>
                    <div class="vip-form-group"><label>Họ và tên</label><input type="text" id="edit-ten"></div>
                    <div class="vip-form-group"><label>Số điện thoại</label><input type="tel" id="edit-sdt"></div>
                    <div class="vip-form-group"><label>Ngày sinh</label><input type="date" id="edit-ngaysinh"></div>
                    <div class="vip-form-group"><label>Địa chỉ</label><input type="text" id="edit-diachi"></div>
                    <div class="vip-form-group">
                        <label>Kích hoạt</label>
                        <select id="edit-isblock"><option value="1">Đã kích hoạt</option><option value="0">Chưa kích hoạt</option></select>
                    </div>
                    <div class="vip-form-group">
                        <label>Trạng thái</label>
                        <select id="edit-tinhtrang"><option value="1">Hoạt động</option><option value="0">Dừng</option></select>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="padding:16px 24px;">
                <button class="btn-vip-secondary" data-bs-dismiss="modal">Hủy</button>
                <button class="btn-vip-primary" onclick="capNhatTK()"><i class="fa-solid fa-check"></i> Cập Nhật</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="deleteModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius:16px;border:none;">
            <div class="modal-header" style="background:linear-gradient(135deg,#ef4444,#dc2626);color:#fff;border-radius:16px 16px 0 0;">
                <h5 class="modal-title" style="color:#fff;font-weight:700;"><i class="fa-solid fa-triangle-exclamation"></i> Xác Nhận Xóa</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="padding:24px;">
                <div style="background:#fef2f2;border-left:4px solid #ef4444;padding:16px;border-radius:8px;">
                    <p style="margin:0;font-weight:600;">Bạn có chắc muốn xóa tài khoản <strong id="del-ten"></strong>?</p>
                    <input type="hidden" id="del-id">
                </div>
            </div>
            <div class="modal-footer" style="padding:16px 24px;">
                <button class="btn-vip-secondary" data-bs-dismiss="modal">Hủy</button>
                <button class="btn-vip-danger" onclick="xoaTK()"><i class="fa-solid fa-trash"></i> Xóa</button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
var vueApp = new Vue({
    el: '#app',
    data: { list_tai_khoan: [] },
    created() { this.loadData(); },
    methods: {
        loadData() {
            axios.post('<?php echo e(Route('taiKhoanData')); ?>').then(r => { this.list_tai_khoan = r.data.xxx || []; });
        },
        doiTrangThaiBlock(v) {
            axios.post('<?php echo e(Route('taiKhoanBlock')); ?>', v).then(r => {
                if (r.data.status) { toastr.success(r.data.message); this.loadData(); }
                else toastr.error(r.data.message);
            });
        },
        doiTrangThai(v) {
            axios.post('<?php echo e(Route('taiKhoanStatus')); ?>', v).then(r => {
                if (r.data.status) { toastr.success(r.data.message); this.loadData(); }
                else toastr.error(r.data.message);
            });
        },
        moModalThem() { new bootstrap.Modal(document.getElementById('themModal')).show(); },
        moModalSua(v) {
            document.getElementById('edit-id').value = v.id;
            document.getElementById('edit-email').value = v.email || '';
            document.getElementById('edit-password').value = '';
            document.getElementById('edit-ten').value = v.ho_va_ten || '';
            document.getElementById('edit-sdt').value = v.so_dien_thoai || '';
            document.getElementById('edit-ngaysinh').value = v.ngay_sinh || '';
            document.getElementById('edit-diachi').value = v.dia_chi || '';
            document.getElementById('edit-isblock').value = v.is_block;
            document.getElementById('edit-tinhtrang').value = v.tinh_trang;
            new bootstrap.Modal(document.getElementById('editModal')).show();
        },
        moModalXoa(v) {
            document.getElementById('del-id').value = v.id;
            document.getElementById('del-ten').textContent = v.ho_va_ten;
            new bootstrap.Modal(document.getElementById('deleteModal')).show();
        },
    },
});

function themTK() {
    var data = {
        email: document.getElementById('add-email').value,
        password: document.getElementById('add-password').value,
        ho_va_ten: document.getElementById('add-ten').value,
        so_dien_thoai: document.getElementById('add-sdt').value,
        ngay_sinh: document.getElementById('add-ngaysinh').value,
        dia_chi: document.getElementById('add-diachi').value,
        is_block: document.getElementById('add-isblock').value,
        tinh_trang: document.getElementById('add-tinhtrang').value,
    };
    axios.post('<?php echo e(Route('taiKhoanStore')); ?>', data).then(r => {
        if (r.data.status) { toastr.success(r.data.message); bootstrap.Modal.getInstance(document.getElementById('themModal')).hide(); vueApp.loadData(); }
        else toastr.error(r.data.message);
    });
}

function capNhatTK() {
    var data = {
        id: document.getElementById('edit-id').value,
        email: document.getElementById('edit-email').value,
        password: document.getElementById('edit-password').value,
        ho_va_ten: document.getElementById('edit-ten').value,
        so_dien_thoai: document.getElementById('edit-sdt').value,
        ngay_sinh: document.getElementById('edit-ngaysinh').value,
        dia_chi: document.getElementById('edit-diachi').value,
        is_block: document.getElementById('edit-isblock').value,
        tinh_trang: document.getElementById('edit-tinhtrang').value,
    };
    axios.post('<?php echo e(Route('taiKhoanUpdate')); ?>', data).then(r => {
        if (r.data.status) { toastr.success(r.data.message); bootstrap.Modal.getInstance(document.getElementById('editModal')).hide(); vueApp.loadData(); }
        else toastr.error(r.data.message);
    });
}

function xoaTK() {
    axios.post('<?php echo e(Route('taiKhoanDel')); ?>', { id: document.getElementById('del-id').value }).then(r => {
        if (r.data.status) { toastr.success(r.data.message); bootstrap.Modal.getInstance(document.getElementById('deleteModal')).hide(); vueApp.loadData(); }
        else toastr.error(r.data.message);
    });
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.share.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Shop-laptop\resources\views/admin/page/danh_sach_tai_khoan/index.blade.php ENDPATH**/ ?>