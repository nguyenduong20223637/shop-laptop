@extends('admin.share.master')

@section('css')
<style>
    /* Override old styles and apply VIP design */
    .page-content {
        background: #f8fafc !important;
        padding: 0 !important;
    }
    
    .content-vip {
        padding: 32px;
    }
    
    /* Stats Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 24px;
        margin-bottom: 32px;
    }
    
    .stat-card {
        background: #fff;
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        transition: all 0.3s;
        position: relative;
        overflow: hidden;
    }
    
    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #0ea5e9 0%, #8b5cf6 100%);
    }
    
    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    }
    
    .stat-card-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 16px;
    }
    
    .stat-card-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: #fff;
    }
    
    .stat-card-icon.primary {
        background: linear-gradient(135deg, #0ea5e9 0%, #3b82f6 100%);
    }
    
    .stat-card-icon.success {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    }
    
    .stat-card-icon.warning {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    }
    
    .stat-card-icon.danger {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    }
    
    .stat-card-trend {
        padding: 4px 8px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 700;
    }
    
    .stat-card-trend.up {
        background: #dcfce7;
        color: #16a34a;
    }
    
    .stat-card-trend.down {
        background: #fee2e2;
        color: #dc2626;
    }
    
    .stat-card-title {
        font-size: 13px;
        color: #64748b;
        font-weight: 600;
        margin-bottom: 8px;
    }
    
    .stat-card-value {
        font-size: 28px;
        font-weight: 800;
        color: #0f172a;
    }
    
    /* Table Card */
    .table-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }
    
    .table-card-header {
        padding: 24px;
        border-bottom: 1px solid #e2e8f0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .table-card-title {
        font-size: 20px;
        font-weight: 800;
        color: #0f172a;
        margin: 0;
    }
    
    .table-card-actions {
        display: flex;
        gap: 12px;
    }
    
    .btn-vip {
        padding: 10px 20px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 700;
        border: none;
        cursor: pointer;
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    
    .btn-primary {
        background: linear-gradient(135deg, #0ea5e9 0%, #3b82f6 100%);
        color: #fff;
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(14, 165, 233, 0.3);
    }
    
    .btn-secondary {
        background: #f1f5f9;
        color: #64748b;
    }
    
    .btn-secondary:hover {
        background: #e2e8f0;
    }
    
    /* Table */
    .table-vip {
        width: 100%;
        border-collapse: collapse;
    }
    
    .table-vip thead {
        background: #f8fafc;
    }
    
    .table-vip th {
        padding: 16px 24px;
        text-align: left;
        font-size: 12px;
        font-weight: 700;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border: none;
    }
    
    .table-vip td {
        padding: 16px 24px;
        border-top: 1px solid #e2e8f0;
        font-size: 14px;
        color: #0f172a;
        vertical-align: middle;
    }
    
    .table-vip tbody tr {
        transition: all 0.3s;
    }
    
    .table-vip tbody tr:hover {
        background: #f8fafc;
    }
    
    .product-cell {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .product-img {
        width: 50px;
        height: 50px;
        border-radius: 8px;
        object-fit: cover;
        background: #f1f5f9;
    }
    
    .product-info {
        display: flex;
        flex-direction: column;
    }
    
    .product-name {
        font-weight: 600;
        color: #0f172a;
        margin-bottom: 4px;
    }
    
    .product-brand {
        font-size: 12px;
        color: #64748b;
    }
    
    .status-badge {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        display: inline-flex !important;
        align-items: center;
        gap: 4px;
        border: none;
        width: auto !important;
        height: auto !important;
        cursor: pointer;
    }
    
    .status-badge.active {
        background: #dcfce7;
        color: #16a34a;
    }
    
    .status-badge.inactive {
        background: #fee2e2;
        color: #dc2626;
    }
    
    .action-btns {
        display: flex;
        gap: 8px;
    }
    
    .action-btn {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s;
    }
    
    .action-btn.edit {
        background: #dbeafe;
        color: #0ea5e9;
    }
    
    .action-btn.edit:hover {
        background: #0ea5e9;
        color: #fff;
    }
    
    .action-btn.delete {
        background: #fee2e2;
        color: #ef4444;
    }
    
    .action-btn.delete:hover {
        background: #ef4444;
        color: #fff;
    }
    
    /* Pagination */
    .pagination-vip {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
        padding: 24px;
    }
    
    .pagination-btn {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        border: 1px solid #e2e8f0;
        background: #fff;
        color: #64748b;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
    }
    
    .pagination-btn:hover,
    .pagination-btn.active {
        background: #0ea5e9;
        color: #fff;
        border-color: #0ea5e9;
    }
    
    .pagination-btn:disabled {
        opacity: 0.5;
        cursor: not-allowed !important;
    }
    
    .pagination-btn:disabled:hover {
        background: #fff;
        color: #64748b;
        border-color: #e2e8f0;
    }
    
    @media (max-width: 1200px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    
    @media (max-width: 768px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('noi_dung')
    <div class="content-vip" id="app-product">
        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-card-header">
                    <div class="stat-card-icon primary">
                        <i class="fa-solid fa-laptop"></i>
                    </div>
                    <div class="stat-card-trend up">
                        <i class="fa-solid fa-arrow-up"></i> 12%
                    </div>
                </div>
                <div class="stat-card-title">Tổng Laptop</div>
                <div class="stat-card-value">@{{ totalProducts }}</div>
            </div>

            <div class="stat-card">
                <div class="stat-card-header">
                    <div class="stat-card-icon success">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                    <div class="stat-card-trend up">
                        <i class="fa-solid fa-arrow-up"></i> 8%
                    </div>
                </div>
                <div class="stat-card-title">Đang Hiển Thị</div>
                <div class="stat-card-value">@{{ countActive }}</div>
            </div>

            <div class="stat-card">
                <div class="stat-card-header">
                    <div class="stat-card-icon warning">
                        <i class="fa-solid fa-box"></i>
                    </div>
                    <div class="stat-card-trend down">
                        <i class="fa-solid fa-arrow-down"></i> 3%
                    </div>
                </div>
                <div class="stat-card-title">Tồn Kho</div>
                <div class="stat-card-value">@{{ totalStock }}</div>
            </div>

            <div class="stat-card">
                <div class="stat-card-header">
                    <div class="stat-card-icon danger">
                        <i class="fa-solid fa-eye-slash"></i>
                    </div>
                    <div class="stat-card-trend down">
                        <i class="fa-solid fa-arrow-down"></i> 5%
                    </div>
                </div>
                <div class="stat-card-title">Đã Ẩn</div>
                <div class="stat-card-value">@{{ countInactive }}</div>
            </div>
        </div>

        <!-- Products Table -->
        <div class="table-card">
            <div class="table-card-header">
                <h2 class="table-card-title">
                    <i class="fa-solid fa-laptop"></i> Quản Lý Laptop
                </h2>
                <div class="table-card-actions">
                    <button class="btn-vip btn-secondary">
                        <i class="fa-solid fa-filter"></i> Lọc
                    </button>
                    <button class="btn-vip btn-primary" data-bs-toggle="modal" data-bs-target="#ThemMoiModal">
                        <i class="fa-solid fa-plus"></i> Thêm Laptop
                    </button>
                </div>
            </div>

            <table class="table-vip">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Sản Phẩm</th>
                        <th>Thương Hiệu</th>
                        <th>Giá</th>
                        <th>Màu Sắc</th>
                        <th>Cấu Hình</th>
                        <th>Tình Trạng</th>
                        <th>Số Lượng</th>
                        <th>Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(v, k) in List_Giay" :key="v.id">
                        <td>@{{ (pagination.current_page - 1) * pagination.per_page + k + 1 }}</td>
                        <td>
                            <div class="product-cell">
                                <img v-bind:src="v.hinh_anh || v.Hinh_Anh" class="product-img" alt="product" 
                                     style="width:50px;height:50px;border-radius:8px;object-fit:cover;background:#f1f5f9;"
                                     onerror="this.style.background='#f1f5f9'">
                                <div style="display:flex;flex-direction:column;margin-left:12px;">
                                    <div style="font-weight:600;color:#0f172a;">@{{ v.ten_san_pham }}</div>
                                    <div style="font-size:12px;color:#94a3b8;">ID: @{{ v.id }}</div>
                                </div>
                            </div>
                        </td>
                        <td>@{{ v.ten_thuong_hieu }}</td>
                        <td style="font-weight: 700; color: #0ea5e9;">@{{ convertToVND(v.gia) }}</td>
                        <td>
                            <div style="width: 30px; height: 30px; border-radius: 50%; border: 2px solid #e2e8f0; background: #f1f5f9;"></div>
                        </td>
                        <td>N/A</td>
                        <td>
                            <span class="status-badge" :class="v.tinh_trang == 1 ? 'active' : 'inactive'" 
                                  v-on:click="doiStatus(v)" style="cursor: pointer;">
                                <i :class="v.tinh_trang == 1 ? 'fa-solid fa-eye' : 'fa-solid fa-eye-slash'"></i>
                                @{{ v.tinh_trang == 1 ? 'Hiển thị' : 'Đã ẩn' }}
                            </span>
                        </td>
                        <td>
                            <span style="font-weight: 700;">@{{ v.so_luong }}</span>
                        </td>
                        <td>
                            <div class="action-btns">
                                <button class="action-btn edit" data-bs-toggle="modal" data-bs-target="#EditModal" 
                                        v-on:click="giayEdit(v)" title="Chỉnh sửa">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button class="action-btn delete" v-on:click="giay_del = Object.assign({}, v)" 
                                        data-bs-toggle="modal" data-bs-target="#DelBackdrop" title="Xóa">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div style="padding: 16px 24px; border-top: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: center;">
                <div style="font-size: 13px; color: #64748b;">
                    Hiển thị <strong>@{{ (pagination.current_page - 1) * pagination.per_page + 1 }}</strong> 
                    đến <strong>@{{ Math.min(pagination.current_page * pagination.per_page, pagination.total) }}</strong> 
                    trong tổng số <strong>@{{ pagination.total }}</strong> sản phẩm
                </div>
            </div>

            <div class="pagination-vip">
                <button class="pagination-btn" @click="changePage(pagination.current_page - 1)" :disabled="pagination.current_page === 1">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
                <button 
                    v-for="page in getPageNumbers()" 
                    :key="page"
                    class="pagination-btn" 
                    :class="{ active: page === pagination.current_page }"
                    @click="page !== '...' && changePage(page)"
                    :disabled="page === '...'"
                    style="cursor: pointer;">
                    @{{ page }}
                </button>
                <button class="pagination-btn" @click="changePage(pagination.current_page + 1)" :disabled="pagination.current_page === pagination.last_page">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
        </div>

        <!-- Modal Thêm Mới -->
        <div class="modal fade" id="ThemMoiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content" style="border-radius: 16px; border: none;">
                    <div class="modal-header" style="background: linear-gradient(135deg, #0ea5e9 0%, #3b82f6 100%); color: white; border-radius: 16px 16px 0 0;">
                        <h5 class="modal-title" id="exampleModalLabel">
                            <i class="fa-solid fa-laptop"></i> Thêm Laptop Mới
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="" style="font-weight: 600; color: #0f172a; margin-bottom: 8px;">
                                                <i class="fa-solid fa-laptop"></i> Tên Laptop
                                            </label>
                                            <input type="text" class="form-control" v-model="giay.Ten_San_Pham" 
                                                   style="border-radius: 10px; border: 2px solid #e2e8f0; padding: 10px 16px;"
                                                   placeholder="VD: Dell XPS 15, MacBook Pro M2...">
                                        </div>

                                        <div class="mb-3">
                                            <label for="" style="font-weight: 600; color: #0f172a; margin-bottom: 8px;">
                                                <i class="fa-solid fa-dollar-sign"></i> Giá
                                            </label>
                                            <input type="number" class="form-control" v-model="giay.Gia"
                                                   style="border-radius: 10px; border: 2px solid #e2e8f0; padding: 10px 16px;"
                                                   placeholder="VD: 25000000">
                                        </div>

                                        <div class="mb-3">
                                            <label for="" style="font-weight: 600; color: #0f172a; margin-bottom: 8px;">
                                                <i class="fa-solid fa-box"></i> Số Lượng
                                            </label>
                                            <input type="number" class="form-control" v-model="giay.So_Luong"
                                                   style="border-radius: 10px; border: 2px solid #e2e8f0; padding: 10px 16px;"
                                                   placeholder="VD: 50">
                                        </div>

                                        <div class="mb-3">
                                            <label for="" style="font-weight: 600; color: #0f172a; margin-bottom: 8px;">
                                                <i class="fa-solid fa-microchip"></i> Cấu Hình
                                            </label>
                                            <select name="" id="" class="form-control" v-model="giay.Size_Id"
                                                    style="border-radius: 10px; border: 2px solid #e2e8f0; padding: 10px 16px;">
                                                @foreach ($cauhinhs as $k => $v)
                                                    <option value="{{ $v->id }}">{{ $v->ten_cau_hinh }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="" style="font-weight: 600; color: #0f172a; margin-bottom: 8px;">
                                                <i class="fa-solid fa-palette"></i> Màu Sắc
                                            </label>
                                            <select name="" id="" class="form-control" v-model="giay.Mau_Sac_Id"
                                                    style="border-radius: 10px; border: 2px solid #e2e8f0; padding: 10px 16px;">
                                                @foreach ($mausacs as $k => $v)
                                                    <option value="{{ $v->id }}">{{ $v->ten_mau_sac }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="" style="font-weight: 600; color: #0f172a; margin-bottom: 8px;">
                                                <i class="fa-solid fa-image"></i> Hình Ảnh (URL)
                                            </label>
                                            <input type="text" class="form-control" v-model="giay.Hinh_Anh"
                                                   style="border-radius: 10px; border: 2px solid #e2e8f0; padding: 10px 16px;"
                                                   placeholder="https://...">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" style="font-weight: 600; color: #0f172a; margin-bottom: 8px;">
                                                <i class="fa-solid fa-folder"></i> Danh Mục
                                            </label>
                                            <select name="" id="" class="form-control" v-model="giay.Danh_Muc_Id"
                                                    style="border-radius: 10px; border: 2px solid #e2e8f0; padding: 10px 16px;">
                                                @foreach ($danhmucs as $k => $v)
                                                    <option value="{{ $v->id }}">{{ $v->ten_danh_muc }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" style="font-weight: 600; color: #0f172a; margin-bottom: 8px;">
                                                <i class="fa-solid fa-copyright"></i> Thương Hiệu
                                            </label>
                                            <select name="" id="" class="form-control" v-model="giay.Thuong_Hieu_Id"
                                                    style="border-radius: 10px; border: 2px solid #e2e8f0; padding: 10px 16px;">
                                                @foreach ($thuonghieus as $k => $v)
                                                    <option value="{{ $v->id }}">{{ $v->ten_thuong_hieu }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" style="font-weight: 600; color: #0f172a; margin-bottom: 8px;">
                                                <i class="fa-solid fa-venus-mars"></i> Giới Tính
                                            </label>
                                            <select name="" id="" class="form-control" v-model="giay.Gioi_Tinh"
                                                    style="border-radius: 10px; border: 2px solid #e2e8f0; padding: 10px 16px;">
                                                <option value="0">Nam</option>
                                                <option value="1">Nữ</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" style="font-weight: 600; color: #0f172a; margin-bottom: 8px;">
                                                <i class="fa-solid fa-toggle-on"></i> Tình Trạng
                                            </label>
                                            <select name="" id="" class="form-control" v-model="giay.Tinh_Trang"
                                                    style="border-radius: 10px; border: 2px solid #e2e8f0; padding: 10px 16px;">
                                                <option value="1">Hiển thị</option>
                                                <option value="0">Ẩn</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="" style="font-weight: 600; color: #0f172a; margin-bottom: 8px;">
                                        <i class="fa-solid fa-align-left"></i> Mô Tả Chi Tiết
                                    </label>
                                    <textarea name="mota" id="mota" rows="6" style="width:100%;padding:8px;border:1px solid #dee2e6;border-radius:6px;resize:vertical;"></textarea>
                                </div>


                            </div>

                        </div>

                    </div>
                    <div class="modal-footer" style="border-top: 1px solid #e2e8f0; padding: 20px;">
                        <button type="button" class="btn-vip btn-secondary" data-bs-dismiss="modal">
                            <i class="fa-solid fa-xmark"></i> Đóng
                        </button>
                        <button type="button" class="btn-vip btn-primary" v-on:click="taogiay()">
                            <i class="fa-solid fa-check"></i> Thêm Mới
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!--Edit Modal -->
        <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content" style="border-radius: 16px; border: none;">
                    <div class="modal-header" style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); color: white; border-radius: 16px 16px 0 0;">
                        <h5 class="modal-title" id="exampleModalLabel">
                            <i class="fa-solid fa-pen"></i> Chỉnh Sửa Laptop
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="" style="font-weight: 600; color: #0f172a; margin-bottom: 8px;">
                                                <i class="fa-solid fa-laptop"></i> Tên Laptop
                                            </label>
                                            <input type="text" class="form-control" v-model="giay_edit.ten_san_pham"
                                                   style="border-radius: 10px; border: 2px solid #e2e8f0; padding: 10px 16px;">
                                        </div>

                                        <div class="mb-3">
                                            <label for="" style="font-weight: 600; color: #0f172a; margin-bottom: 8px;">
                                                <i class="fa-solid fa-dollar-sign"></i> Giá
                                            </label>
                                            <input type="number" class="form-control" v-model="giay_edit.gia"
                                                   style="border-radius: 10px; border: 2px solid #e2e8f0; padding: 10px 16px;">
                                        </div>

                                        <div class="mb-3">
                                            <label for="" style="font-weight: 600; color: #0f172a; margin-bottom: 8px;">
                                                <i class="fa-solid fa-box"></i> Số Lượng
                                            </label>
                                            <input type="number" class="form-control" v-model="giay_edit.so_luong"
                                                   style="border-radius: 10px; border: 2px solid #e2e8f0; padding: 10px 16px;">
                                        </div>

                                        <div class="mb-3">
                                            <label for="" style="font-weight: 600; color: #0f172a; margin-bottom: 8px;">
                                                <i class="fa-solid fa-microchip"></i> Cấu Hình
                                            </label>
                                            <select name="" id="" class="form-control" v-model="giay_edit.cau_hinh_id"
                                                    style="border-radius: 10px; border: 2px solid #e2e8f0; padding: 10px 16px;">
                                                @foreach ($cauhinhs as $k => $v)
                                                    <option value="{{ $v->id }}">{{ $v->ten_cau_hinh }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="" style="font-weight: 600; color: #0f172a; margin-bottom: 8px;">
                                                <i class="fa-solid fa-palette"></i> Màu Sắc
                                            </label>
                                            <select name="" id="" class="form-control" v-model="giay_edit.mau_sac_id"
                                                    style="border-radius: 10px; border: 2px solid #e2e8f0; padding: 10px 16px;">
                                                @foreach ($mausacs as $k => $v)
                                                    <option value="{{ $v->id }}">{{ $v->ten_mau_sac }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="" style="font-weight: 600; color: #0f172a; margin-bottom: 8px;">
                                                <i class="fa-solid fa-image"></i> Hình Ảnh (URL)
                                            </label>
                                            <input type="text" class="form-control" v-model="giay_edit.hinh_anh"
                                                   style="border-radius: 10px; border: 2px solid #e2e8f0; padding: 10px 16px;">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" style="font-weight: 600; color: #0f172a; margin-bottom: 8px;">
                                                <i class="fa-solid fa-folder"></i> Danh Mục
                                            </label>
                                            <select name="" id="" class="form-control" v-model="giay_edit.danh_muc_id"
                                                    style="border-radius: 10px; border: 2px solid #e2e8f0; padding: 10px 16px;">
                                                @foreach ($danhmucs as $k => $v)
                                                    <option value="{{ $v->id }}">{{ $v->ten_danh_muc }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" style="font-weight: 600; color: #0f172a; margin-bottom: 8px;">
                                                <i class="fa-solid fa-copyright"></i> Thương Hiệu
                                            </label>
                                            <select name="" id="" class="form-control" v-model="giay_edit.thuong_hieu_id"
                                                    style="border-radius: 10px; border: 2px solid #e2e8f0; padding: 10px 16px;">
                                            @foreach ($thuonghieus as $k => $v)
                                                <option value="{{ $v->id }}">{{ $v->ten_thuong_hieu }}</option>
                                            @endforeach                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" style="font-weight: 600; color: #0f172a; margin-bottom: 8px;">
                                                <i class="fa-solid fa-venus-mars"></i> Giới Tính
                                            </label>
                                            <select name="" id="" class="form-control" v-model="giay_edit.gioi_tinh"
                                                    style="border-radius: 10px; border: 2px solid #e2e8f0; padding: 10px 16px;">
                                                <option value="0">Nam</option>
                                                <option value="1">Nữ</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" style="font-weight: 600; color: #0f172a; margin-bottom: 8px;">
                                                <i class="fa-solid fa-toggle-on"></i> Tình Trạng
                                            </label>
                                            <select name="" id="" class="form-control" v-model="giay_edit.tinh_trang"
                                                    style="border-radius: 10px; border: 2px solid #e2e8f0; padding: 10px 16px;">
                                                <option value="1">Hiển thị</option>
                                                <option value="0">Ẩn</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="" style="font-weight: 600; color: #0f172a; margin-bottom: 8px;">
                                        <i class="fa-solid fa-align-left"></i> Mô Tả Chi Tiết
                                    </label>
                                    <textarea name="mota_edit" id="mota_edit" rows="6" style="width:100%;padding:8px;border:1px solid #dee2e6;border-radius:6px;resize:vertical;"></textarea>
                                </div>


                            </div>

                        </div>

                    </div>
                    <div class="modal-footer" style="border-top: 1px solid #e2e8f0; padding: 20px;">
                        <button type="button" class="btn-vip btn-secondary" data-bs-dismiss="modal">
                            <i class="fa-solid fa-xmark"></i> Đóng
                        </button>
                        <button type="button" class="btn-vip btn-primary" v-on:click="giayUpdate()">
                            <i class="fa-solid fa-check"></i> Cập Nhật
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Modal -->
        <div class="modal fade" id="DelBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="border-radius: 16px; border: none;">
                    <div class="modal-header" style="background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); color: white; border-radius: 16px 16px 0 0;">
                        <h5 class="modal-title" id="staticBackdropLabel">
                            <i class="fa-solid fa-triangle-exclamation"></i> Xác Nhận Xóa
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="padding: 24px;">
                        <div style="background: #fef2f2; border-left: 4px solid #ef4444; padding: 16px; border-radius: 8px;">
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <i class="fa-solid fa-circle-exclamation" style="font-size: 32px; color: #ef4444;"></i>
                                <div>
                                    <p style="margin: 0; font-weight: 600; color: #0f172a; font-size: 16px;">
                                        Bạn có chắc muốn xóa laptop này?
                                    </p>
                                    <p style="margin: 8px 0 0 0; color: #64748b; font-size: 14px;">
                                        <strong style="color: #ef4444;">@{{ giay_del.Ten_San_Pham }}</strong>
                                    </p>
                                    <p style="margin: 4px 0 0 0; color: #64748b; font-size: 13px;">
                                        Hành động này không thể hoàn tác!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="border-top: 1px solid #e2e8f0; padding: 20px;">
                        <button type="button" class="btn-vip btn-secondary" data-bs-dismiss="modal">
                            <i class="fa-solid fa-xmark"></i> Hủy
                        </button>
                        <button type="button" class="btn-vip" v-on:click="giayDel()" 
                                style="background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); color: white;">
                            <i class="fa-solid fa-trash"></i> Xóa Ngay
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>{{-- end app-product --}}
@endsection
@section('js')
    <script>
        new Vue({
            el: '#app-product',
            data: {
                giay_del: {},
                giay_edit: {},
                giay: {
                    Ten_San_Pham: '',
                    Hinh_Anh: '',
                    Mo_Ta: '',
                    Danh_Muc_Id: null,
                    Thuong_Hieu_Id: null,
                    Gia: null,
                    Tinh_Trang: 1,
                    So_Luong: null,
                    Size_Id: null,
                    Mau_Sac_Id: null,
                    Gioi_Tinh: 0
                },
                List_Giay: [],
                pagination: {
                    current_page: 1,
                    last_page: 1,
                    per_page: 10,
                    total: 0
                },
                stats: {
                    total: 0,
                    active: 0,
                    inactive: 0,
                    totalStock: 0
                }
            },
            computed: {
                countActive() {
                    return this.stats.active;
                },
                countInactive() {
                    return this.stats.inactive;
                },
                totalStock() {
                    return this.stats.totalStock;
                },
                totalProducts() {
                    return this.stats.total;
                }
            },
            created() {
                this.loadData();
            },
            methods: {
                taogiay() {
                    this.giay.Mo_Ta = document.getElementById('mota').value;

                    // Chuẩn bị dữ liệu theo đúng cấu trúc backend yêu cầu
                    const payload = {
                        sanpham: {
                            ten_san_pham: this.giay.Ten_San_Pham,
                            hinh_anh: this.giay.Hinh_Anh,
                            mo_ta: this.giay.Mo_Ta,
                            danh_muc_id: this.giay.Danh_Muc_Id,
                            thuong_hieu_id: this.giay.Thuong_Hieu_Id,
                            gia: this.giay.Gia,
                            tinh_trang: this.giay.Tinh_Trang || 1
                        },
                        options: [{
                            cau_hinh_id: this.giay.Size_Id,
                            mau_sac_id: this.giay.Mau_Sac_Id,
                            so_luong: this.giay.So_Luong,
                            hinh_anh: this.giay.Hinh_Anh,
                            gia_dieu_chinh: 0
                        }]
                    };

                    console.log('Payload gửi đi:', payload);

                    axios
                        .post("{{ Route('ProductCreate') }}", payload)
                        .then((res) => {
                            console.log('Response:', res.data);
                            if (res.data.status == 1) {
                                toastr.success(res.data.message);
                                $('#ThemMoiModal').modal('hide');
                                this.loadData();
                                this.loadStats(); // Reload stats
                                // Reset form
                                this.giay = {
                                    Ten_San_Pham: '',
                                    Hinh_Anh: '',
                                    Mo_Ta: '',
                                    Danh_Muc_Id: null,
                                    Thuong_Hieu_Id: null,
                                    Gia: null,
                                    Tinh_Trang: 1,
                                    So_Luong: null,
                                    Size_Id: null,
                                    Mau_Sac_Id: null,
                                    Gioi_Tinh: 0
                                };
                                document.getElementById('mota').value = '';
                            } else {
                                toastr.error(res.data.message);
                            }
                        })
                        .catch((error) => {
                            console.error('Error:', error.response);
                            if (error.response && error.response.data && error.response.data.errors) {
                                // Hiển thị lỗi validation
                                const errors = error.response.data.errors;
                                Object.keys(errors).forEach(key => {
                                    toastr.error(errors[key][0]);
                                });
                            } else if (error.response && error.response.data && error.response.data.message) {
                                toastr.error(error.response.data.message);
                            } else {
                                toastr.error('Có lỗi xảy ra khi thêm sản phẩm!');
                            }
                        });
                },

                doiStatus(payload) {
                    axios
                        .post('{{ Route('ProductStatus') }}', payload)
                        .then((res) => {
                            if (res.data.status == 1) {
                                toastr.success(res.data.message);
                                this.loadData();
                                this.loadStats(); // Reload stats
                            } else
                                toastr.error(res.data.message);
                        });
                },

                giayEdit(payload) {
                    this.giay_edit = Object.assign({}, payload);
                    var self = this;
                    axios.post('{{ route('OptData2') }}', { id: payload.id })
                        .then(function(res) {
                            if (res.data && res.data.data && res.data.data.length > 0) {
                                self.giay_edit.variants = res.data.data;
                                var firstVariant = res.data.data[0];
                                self.$set(self.giay_edit, 'cau_hinh_id', firstVariant.cau_hinh_id);
                                self.$set(self.giay_edit, 'mau_sac_id', firstVariant.mau_sac_id);
                                // Tổng so_luong tất cả variants = đồng bộ với bảng ngoài
                                var tongSoLuong = res.data.data.reduce(function(sum, v) {
                                    return sum + (parseInt(v.so_luong) || 0);
                                }, 0);
                                self.$set(self.giay_edit, 'so_luong', tongSoLuong);
                            } else {
                                self.giay_edit.variants = [];
                                self.$set(self.giay_edit, 'so_luong', 0);
                            }
                        })
                        .catch(function() {
                            self.giay_edit.variants = [];
                        });
                    this.$nextTick(function() {
                        setTimeout(function() {
                            var ta = document.getElementById('mota_edit');
                            if (ta) ta.value = payload.mo_ta || '';
                        }, 300);
                    });
                },

                giayUpdate() {
                    this.giay_edit.mo_ta = document.getElementById('mota_edit').value;
                    
                    // Chia đều so_luong mới cho tất cả variants
                    var variants = this.giay_edit.variants || [];
                    var tongMoi = parseInt(this.giay_edit.so_luong) || 0;
                    if (variants.length > 0) {
                        var soLuongMoiVariant = Math.floor(tongMoi / variants.length);
                        var du = tongMoi % variants.length;
                        for (var i = 0; i < variants.length; i++) {
                            variants[i].so_luong = soLuongMoiVariant + (i === 0 ? du : 0);
                            variants[i].hinh_anh = variants[i].hinh_anh || this.giay_edit.hinh_anh;
                            variants[i].gia_dieu_chinh = variants[i].gia_dieu_chinh || 0;
                        }
                    } else {
                        variants = [{
                            cau_hinh_id: this.giay_edit.cau_hinh_id,
                            mau_sac_id:  this.giay_edit.mau_sac_id,
                            so_luong:    tongMoi,
                            hinh_anh:    this.giay_edit.hinh_anh,
                            gia_dieu_chinh: 0
                        }];
                    }

                    var updateData = {
                        sanpham: {
                            id: this.giay_edit.id,
                            ten_san_pham: this.giay_edit.ten_san_pham,
                            hinh_anh: this.giay_edit.hinh_anh,
                            mo_ta: this.giay_edit.mo_ta,
                            danh_muc_id: this.giay_edit.danh_muc_id,
                            thuong_hieu_id: this.giay_edit.thuong_hieu_id,
                            gia: this.giay_edit.gia,
                            tinh_trang: this.giay_edit.tinh_trang,
                            gioi_tinh: this.giay_edit.gioi_tinh
                        },
                        options: variants
                    };
                    var self = this;
                    axios.post('{{ Route('ProductUpdate') }}', updateData)
                        .then(function(res) {
                            if (res.data.status == 1) {
                                toastr.success(res.data.message);
                                $('#EditModal').modal('hide');
                                self.loadData();
                                self.loadStats();
                            } else {
                                toastr.error(res.data.message);
                            }
                        });
                },

                giayDel() {
                    axios
                        .post('{{ Route('ProductDestroy') }}', this.giay_del)
                        .then((res) => {
                            if (res.data.status == 1) {
                                toastr.success(res.data.message);
                                $('#DelBackdrop').modal('hide');
                                this.loadData();
                                this.loadStats(); // Reload stats
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
                        .post('{{ Route('ProductData') }}?page=' + page)
                        .then((res) => {
                            if(res.data.data) {
                                if(res.data.data.data) {
                                    this.List_Giay = res.data.data.data;
                                    this.pagination = {
                                        current_page: res.data.data.current_page,
                                        last_page: res.data.data.last_page,
                                        per_page: res.data.data.per_page,
                                        total: res.data.data.total
                                    };
                                }
                            }
                            // Cập nhật stats từ backend trả về
                            if(res.data.stats) {
                                this.stats = {
                                    total:      res.data.stats.total,
                                    active:     res.data.stats.active,
                                    inactive:   res.data.stats.inactive,
                                    totalStock: res.data.stats.total_stock
                                };
                            }
                        });
                },

                loadStats() {
                    // Stats đã được load trong loadData()
                },

                changePage(page) {
                    if (page >= 1 && page <= this.pagination.last_page) {
                        this.loadData(page);
                    }
                },

                getPageNumbers() {
                    const pages = [];
                    const current = this.pagination.current_page;
                    const last = this.pagination.last_page;
                    
                    if (last <= 7) {
                        for (let i = 1; i <= last; i++) {
                            pages.push(i);
                        }
                    } else {
                        if (current <= 3) {
                            for (let i = 1; i <= 5; i++) pages.push(i);
                            pages.push('...');
                            pages.push(last);
                        } else if (current >= last - 2) {
                            pages.push(1);
                            pages.push('...');
                            for (let i = last - 4; i <= last; i++) pages.push(i);
                        } else {
                            pages.push(1);
                            pages.push('...');
                            for (let i = current - 1; i <= current + 1; i++) pages.push(i);
                            pages.push('...');
                            pages.push(last);
                        }
                    }
                    return pages;
                }
            },
        });
    </script>
@endsection
