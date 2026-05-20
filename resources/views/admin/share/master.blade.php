<!doctype html>
<html lang="en">
<head>
    @include('admin.share.css')
    @yield('css')
    <style>
        /* Hide CKEditor security warning */
        .cke_notification_warning { display: none !important; }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Inter', 'Segoe UI', sans-serif; 
            background: #f0f2f5 !important;
            color: #333;
        }
        body::before {
            content: '';
            position: fixed; top: 0; left: 0; right: 0; bottom: 0;
            background: 
                radial-gradient(ellipse at 20% 50%, rgba(14,165,233,0.07) 0%, transparent 50%),
                radial-gradient(ellipse at 80% 20%, rgba(139,92,246,0.07) 0%, transparent 50%);
            pointer-events: none; z-index: 0;
        }
        .wrapper { display: none !important; }

        .vip-sidebar {
            width: 260px; height: 100vh;
            background: #1e2a3a;
            border-right: 1px solid rgba(255,255,255,0.07);
            position: fixed; left: 0; top: 0; z-index: 999;
            display: flex !important; flex-direction: column;
            box-shadow: 2px 0 15px rgba(0,0,0,0.3); overflow-y: auto;
        }
        .vip-sidebar::-webkit-scrollbar { width: 4px; }
        .vip-sidebar::-webkit-scrollbar-thumb { background: rgba(14,165,233,0.4); border-radius: 2px; }
        .sidebar-brand { padding: 24px 20px; border-bottom: 1px solid rgba(255,255,255,0.08); display: flex; align-items: center; gap: 12px; flex-shrink: 0; }
        .sidebar-brand-icon { width: 40px; height: 40px; background: linear-gradient(135deg, #0ea5e9, #8b5cf6); border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 20px; color: #fff; }
        .sidebar-brand-text { font-size: 20px; font-weight: 800; color: #fff; }
        .sidebar-brand-text span { color: #22d3ee; }
        .sidebar-section-title { padding: 20px 20px 8px; font-size: 10px; font-weight: 700; color: #475569; text-transform: uppercase; letter-spacing: 1.5px; }
        .sidebar-nav-item { display: flex; align-items: center; gap: 12px; padding: 11px 20px; color: rgba(255,255,255,0.6); text-decoration: none; font-size: 14px; font-weight: 500; transition: all 0.25s; position: relative; margin: 2px 10px; border-radius: 10px; }
        .sidebar-nav-item:hover, .sidebar-nav-item.active { background: rgba(14,165,233,0.15); color: #38bdf8; text-decoration: none; }
        .sidebar-nav-item i { font-size: 17px; width: 22px; text-align: center; }
        .sidebar-footer { margin-top: auto; padding: 20px; border-top: 1px solid rgba(255,255,255,0.08); flex-shrink: 0; }
        .sidebar-footer-user { display: flex; align-items: center; gap: 10px; }
        .sidebar-footer-user img { width: 36px; height: 36px; border-radius: 50%; border: 2px solid #0ea5e9; }
        .sidebar-footer-name { font-size: 13px; font-weight: 700; color: #fff; }
        .sidebar-footer-role { font-size: 11px; color: #64748b; }

        .vip-main { margin-left: 260px !important; min-height: 100vh; }

        .vip-topbar { 
            background: #ffffff !important;
            border-bottom: 1px solid #e4e6ea;
            padding: 0 32px; height: 60px;
            display: flex !important; align-items: center; justify-content: space-between;
            position: sticky; top: 0; z-index: 999;
            box-shadow: 0 1px 4px rgba(0,0,0,0.08);
        }
        .topbar-left { display: flex; align-items: center; gap: 16px; }
        .topbar-search { position: relative; }
        .topbar-search input { 
            width: 280px; padding: 9px 16px 9px 38px;
            border: 1px solid #e4e6ea; border-radius: 8px;
            font-size: 13px; outline: none;
            background: #f8f9fa; color: #333;
        }
        .topbar-search input::placeholder { color: #adb5bd; }
        .topbar-search input:focus { border-color: #0ea5e9; background: #fff; box-shadow: 0 0 0 3px rgba(14,165,233,0.1); }
        .topbar-search i { position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: #adb5bd; font-size: 14px; }
        .topbar-right { display: flex; align-items: center; gap: 8px; }
        .topbar-icon-btn { 
            width: 38px; height: 38px; border-radius: 8px;
            background: #f8f9fa; border: 1px solid #e4e6ea;
            display: flex; align-items: center; justify-content: center;
            cursor: pointer; transition: all 0.2s; position: relative;
            color: #6c757d; font-size: 16px; text-decoration: none;
        }
        .topbar-icon-btn:hover { background: #e9ecef; color: #0ea5e9; border-color: #0ea5e9; }
        .topbar-badge { position: absolute; top: -4px; right: -4px; width: 17px; height: 17px; background: #ef4444; color: #fff; border-radius: 50%; font-size: 10px; font-weight: 700; display: flex; align-items: center; justify-content: center; }
        .topbar-user { 
            display: flex; align-items: center; gap: 10px; padding: 6px 12px;
            border-radius: 8px; cursor: pointer;
            border: 1px solid #e4e6ea; margin-left: 4px;
            background: #f8f9fa; transition: all 0.2s;
        }
        .topbar-user:hover { background: #e9ecef; border-color: #0ea5e9; }
        .topbar-user img { width: 32px; height: 32px; border-radius: 50%; border: 2px solid #0ea5e9; }
        .topbar-user-name { font-size: 13px; font-weight: 700; color: #333; }
        .topbar-user-role { font-size: 11px; color: #6c757d; }

        .vip-page-content { background: #f0f2f5 !important; min-height: calc(100vh - 64px); }

        /* ===== DARK VIP GLOBAL OVERRIDES ===== */
        .page-breadcrumb { display: none !important; }
        hr { display: none !important; }

        /* Light Cards */
        .card, .vip-card {
            background: #ffffff !important;
            border: 1px solid #e4e6ea !important;
            border-radius: 10px !important;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06) !important;
            color: #333 !important;
        }
        .card-header, .vip-card-header {
            background: #f8f9fa !important;
            border-bottom: 1px solid #e4e6ea !important;
            border-radius: 10px 10px 0 0 !important;
            padding: 16px 20px !important; color: #333 !important;
        }
        .card-body { padding: 20px !important; }
        .card-footer {
            background: #f8f9fa !important;
            border-top: 1px solid #e4e6ea !important;
            border-radius: 0 0 10px 10px !important; padding: 14px 20px !important;
        }

        /* Light Forms */
        .form-control, .vip-form-group input, .vip-form-group select, .vip-form-group textarea {
            background: #fff !important;
            border: 1px solid #ced4da !important;
            border-radius: 6px !important; color: #333 !important; padding: 9px 14px !important;
        }
        .form-control:focus { border-color: #0ea5e9 !important; box-shadow: 0 0 0 3px rgba(14,165,233,0.1) !important; }
        .form-control::placeholder { color: #adb5bd !important; }
        label, .vip-form-group label { color: #555 !important; font-weight: 600 !important; font-size: 13px !important; }
        select option { background: #fff; color: #333; }
        .card-header h6, .card-header h5, .card-header h3, .vip-card-header h3 { color: #333 !important; }
        .sidebar-section-title { color: #475569 !important; }
        .sidebar-nav-item { color: #94a3b8 !important; }

        /* Dark Buttons */
        .btn-primary, .btn-vip-primary { background: linear-gradient(135deg, #0ea5e9, #3b82f6) !important; border: none !important; border-radius: 10px !important; color: #fff !important; font-weight: 700 !important; box-shadow: 0 4px 15px rgba(14,165,233,0.3) !important; }
        .btn-secondary, .btn-vip-secondary { background: rgba(255,255,255,0.08) !important; border: 1px solid rgba(255,255,255,0.1) !important; color: #94a3b8 !important; border-radius: 10px !important; }
        .btn-danger, .btn-vip-danger { background: linear-gradient(135deg, #ef4444, #dc2626) !important; border: none !important; border-radius: 10px !important; color: #fff !important; }
        .btn-info { background: linear-gradient(135deg, #06b6d4, #0ea5e9) !important; border: none !important; border-radius: 10px !important; color: #fff !important; }
        .btn-outline-dark { background: rgba(255,255,255,0.05) !important; border: 1px solid rgba(255,255,255,0.1) !important; color: #94a3b8 !important; border-radius: 8px !important; }
        .btn-outline-dark:hover { background: rgba(14,165,233,0.15) !important; color: #38bdf8 !important; border-color: rgba(14,165,233,0.3) !important; }
        .btn-outline-primary { border-color: rgba(14,165,233,0.5) !important; color: #38bdf8 !important; border-radius: 10px !important; }
        .btn-vip-warning { background: linear-gradient(135deg, #f59e0b, #d97706) !important; border: none !important; border-radius: 10px !important; color: #fff !important; }

        /* Light Tables */
        .table { color: #333 !important; }
        .table thead th, .vip-table th { 
            background: #f8f9fa !important; color: #6c757d !important; 
            font-size: 11px !important; font-weight: 700 !important; 
            text-transform: uppercase !important; letter-spacing: 0.5px !important; 
            border-bottom: 2px solid #e4e6ea !important; border-top: none !important; padding: 12px 16px !important; 
        }
        .table tbody td, .vip-table td { 
            border-color: #f0f2f5 !important; color: #333 !important; 
            padding: 12px 16px !important; vertical-align: middle !important; 
        }
        .table tbody tr:hover, .vip-table tbody tr:hover { background: #f8f9fa !important; }
        .table-bordered, .table-bordered td, .table-bordered th { border-color: #e4e6ea !important; }

        /* Dark Badges */
        .badge { padding: 6px 12px !important; border-radius: 20px !important; font-size: 12px !important; font-weight: 700 !important; }
        .bg-gradient-quepal { background: linear-gradient(135deg, #10b981, #059669) !important; }
        .bg-gradient-bloody { background: linear-gradient(135deg, #ef4444, #dc2626) !important; }

        /* Light Modals */
        .modal-content { background: #fff !important; border: 1px solid #e4e6ea !important; border-radius: 12px !important; box-shadow: 0 10px 40px rgba(0,0,0,0.15) !important; color: #333 !important; }
        .modal-header { border-bottom: 1px solid #e4e6ea !important; padding: 18px 24px !important; }
        .modal-footer { border-top: 1px solid #e4e6ea !important; padding: 14px 24px !important; }
        .modal-body { padding: 24px !important; }
        .modal-title { color: #333 !important; font-weight: 700 !important; }
        .btn-close { filter: none !important; }

        /* Light Dropdown */
        .dropdown-menu { background: #fff !important; border: 1px solid #e4e6ea !important; border-radius: 10px !important; box-shadow: 0 8px 24px rgba(0,0,0,0.1) !important; }
        .dropdown-item { color: #555 !important; padding: 9px 16px !important; border-radius: 6px !important; margin: 2px 4px !important; }
        .dropdown-item:hover { background: #f0f7ff !important; color: #0ea5e9 !important; }
        .dropdown-divider { border-color: #e4e6ea !important; }

        /* Text */
        h1,h2,h3,h4,h5,h6 { color: #333 !important; }
        p, span, td, th, div, li, a { color: inherit; }
        .text-dark, .text-black { color: #333 !important; }
        .table td, .table th, .vip-table td, .vip-table th { color: #333 !important; }
        .brand-name, .product-name { color: #333 !important; }
        input, select, textarea { color: #333 !important; }
        input::placeholder, textarea::placeholder { color: #adb5bd !important; }

        /* Status */
        .status-badge.active, .status-pill.active { background: #d1fae5 !important; color: #059669 !important; }
        .status-badge.inactive, .status-pill.inactive { background: #fee2e2 !important; color: #dc2626 !important; }

        /* Action buttons */
        .action-btn.edit { background: #dbeafe !important; color: #2563eb !important; }
        .action-btn.edit:hover { background: #2563eb !important; color: #fff !important; }
        .action-btn.del, .action-btn.delete { background: #fee2e2 !important; color: #dc2626 !important; }
        .action-btn.del:hover, .action-btn.delete:hover { background: #dc2626 !important; color: #fff !important; }
        .action-btn.view { background: #e0f2fe !important; color: #0284c7 !important; }

        /* Stats cards */
        .stat-card { background: #fff !important; border: 1px solid #e4e6ea !important; }
        .stat-card-value { color: #1e293b !important; }
        .stat-card-title { color: #6c757d !important; }
        .table-card { background: #fff !important; border: 1px solid #e4e6ea !important; }
        .table-card-title { color: #333 !important; }
        .table-card-header { border-bottom: 1px solid #e4e6ea !important; background: #f8f9fa !important; }

        /* Row padding */
        .vip-page-content > .row,
        .vip-page-content > .container,
        .vip-page-content > div:not(.modal):not(.modal-backdrop) { padding: 28px 32px; }

        /* Footer */
        footer { background: rgba(15,23,42,0.8) !important; border-top: 1px solid rgba(255,255,255,0.06) !important; color: #334155 !important; text-align: center; padding: 16px 32px !important; }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: rgba(255,255,255,0.02); }
        ::-webkit-scrollbar-thumb { background: rgba(14,165,233,0.3); border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: rgba(14,165,233,0.5); }

        /* Alert */
        .alert-warning { background: #fff3cd !important; border: 1px solid #ffc107 !important; color: #856404 !important; border-radius: 8px !important; }

        /* Modal z-index fix - prevent backdrop blocking */
        .modal-backdrop { opacity: 0.5 !important; }
        .modal { z-index: 1055 !important; }
        .modal-dialog { pointer-events: all !important; }
        .modal-dialog { max-height: 90vh; overflow-y: auto; margin: 20px auto; }
        .modal-content { max-height: 85vh; overflow-y: auto; }

        /* Product img */
        .product-img-2 { width: 50px !important; height: 50px !important; border-radius: 8px !important; object-fit: cover !important; }

        /* CKEditor light theme */
        .cke_chrome { border: 1px solid #ced4da !important; border-radius: 8px !important; overflow: hidden; }
        .cke_top { background: #f8f9fa !important; border-bottom: 1px solid #e4e6ea !important; }
        .cke_bottom { background: #f8f9fa !important; border-top: 1px solid #e4e6ea !important; }
        .cke_editable, .cke_wysiwyg_frame, .cke_wysiwyg_div { background: #fff !important; color: #333 !important; }
        .cke_toolbar_separator { background: #dee2e6 !important; }
        .cke_button_icon { filter: none !important; }
        .cke_combo_text { color: #333 !important; }

        /* ===== GLOBAL VIP OVERRIDES FOR ALL PAGES ===== */
        .page-breadcrumb { display: none !important; }
        hr { display: none !important; }

        /* Wrap all page content with padding */
        .vip-page-content > * { padding: 28px 32px; }
        .vip-page-content > .row,
        .vip-page-content > .container,
        .vip-page-content > div { padding: 28px 32px; }

        /* Cards VIP */
        .card {
            border: none !important;
            border-radius: 16px !important;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06) !important;
        }
        .card-header {
            background: #fff !important;
            border-bottom: 1px solid #f1f5f9 !important;
            border-radius: 16px 16px 0 0 !important;
            padding: 20px 24px !important;
            font-weight: 700 !important;
            font-size: 16px !important;
            color: #0f172a !important;
        }
        .card-body { padding: 24px !important; }
        .card-footer {
            background: #f8fafc !important;
            border-top: 1px solid #f1f5f9 !important;
            border-radius: 0 0 16px 16px !important;
            padding: 16px 24px !important;
        }

        /* Form controls VIP */
        .form-control {
            border: 1.5px solid #e2e8f0 !important;
            border-radius: 10px !important;
            padding: 10px 14px !important;
            font-size: 14px !important;
            transition: all 0.2s !important;
        }
        .form-control:focus {
            border-color: #0ea5e9 !important;
            box-shadow: 0 0 0 3px rgba(14,165,233,0.1) !important;
        }
        label {
            font-weight: 600 !important;
            font-size: 13px !important;
            color: #374151 !important;
            margin-bottom: 6px !important;
        }

        /* Buttons VIP */
        .btn-primary {
            background: linear-gradient(135deg, #0ea5e9, #3b82f6) !important;
            border: none !important;
            border-radius: 10px !important;
            padding: 10px 20px !important;
            font-weight: 700 !important;
            box-shadow: 0 4px 12px rgba(14,165,233,0.3) !important;
        }
        .btn-primary:hover { transform: translateY(-1px) !important; box-shadow: 0 6px 16px rgba(14,165,233,0.4) !important; }
        .btn-info {
            background: linear-gradient(135deg, #06b6d4, #0ea5e9) !important;
            border: none !important;
            border-radius: 10px !important;
            padding: 10px 20px !important;
            font-weight: 700 !important;
            color: #fff !important;
        }
        .btn-secondary { border-radius: 10px !important; padding: 10px 20px !important; font-weight: 600 !important; }
        .btn-danger { border-radius: 10px !important; padding: 10px 20px !important; font-weight: 600 !important; }
        .btn-outline-primary { border-radius: 10px !important; font-weight: 600 !important; }
        .btn-outline-dark { border-radius: 8px !important; }

        /* Tables VIP */
        .table {
            border-collapse: separate !important;
            border-spacing: 0 !important;
        }
        .table thead th {
            background: #f8fafc !important;
            color: #64748b !important;
            font-size: 11px !important;
            font-weight: 700 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.5px !important;
            padding: 14px 16px !important;
            border: none !important;
            border-bottom: 1px solid #e2e8f0 !important;
        }
        .table tbody td {
            padding: 14px 16px !important;
            border-top: 1px solid #f1f5f9 !important;
            border-bottom: none !important;
            font-size: 14px !important;
            vertical-align: middle !important;
        }
        .table tbody tr:hover { background: #f8fafc !important; }
        .table-bordered { border: none !important; }
        .table-bordered td, .table-bordered th { border: none !important; border-bottom: 1px solid #f1f5f9 !important; }

        /* Badges VIP */
        .badge {
            padding: 6px 12px !important;
            border-radius: 20px !important;
            font-size: 12px !important;
            font-weight: 700 !important;
        }
        .bg-gradient-quepal { background: linear-gradient(135deg, #10b981, #059669) !important; }
        .bg-gradient-bloody { background: linear-gradient(135deg, #ef4444, #dc2626) !important; }

        /* Modals VIP */
        .modal-content { border: none !important; border-radius: 16px !important; box-shadow: 0 20px 60px rgba(0,0,0,0.15) !important; }
        .modal-header { border-radius: 16px 16px 0 0 !important; padding: 20px 24px !important; border-bottom: 1px solid #f1f5f9 !important; }
        .modal-footer { border-top: 1px solid #f1f5f9 !important; padding: 16px 24px !important; }
        .modal-body { padding: 24px !important; }

        /* Page title VIP */
        h6.text-uppercase, h5, h6 { font-weight: 700 !important; color: #0f172a !important; }

        /* Product images */
        .product-img-2 { width: 50px !important; height: 50px !important; border-radius: 8px !important; object-fit: cover !important; }

        /* Alert VIP */
        .alert { border-radius: 12px !important; border: none !important; }
        .alert-warning { background: #fef3c7 !important; color: #92400e !important; }
    </style>
</head>
<body>

<aside class="vip-sidebar">
    <div class="sidebar-brand">
        <div class="sidebar-brand-icon"><i class="fa-solid fa-laptop"></i></div>
        <div class="sidebar-brand-text">DT<span>Store</span></div>
    </div>
    <div class="sidebar-section-title">Quản lý</div>
    <a href="/admin/product/" class="sidebar-nav-item {{ request()->is('admin/product*') ? 'active' : '' }}"><i class="fa-solid fa-laptop"></i> Sản phẩm</a>
    <a href="/admin/thuong-hieu/" class="sidebar-nav-item {{ request()->is('admin/thuong-hieu*') ? 'active' : '' }}"><i class="fa-solid fa-copyright"></i> Thương hiệu</a>
    <a href="/admin/banner/" class="sidebar-nav-item {{ request()->is('admin/banner*') ? 'active' : '' }}"><i class="fa-solid fa-image"></i> Banner</a>
    <a href="/admin/danh-muc/" class="sidebar-nav-item {{ request()->is('admin/danh-muc*') ? 'active' : '' }}"><i class="fa-solid fa-folder-open"></i> Danh mục</a>
    <div class="sidebar-section-title">Cài đặt</div>
    <a href="/admin/mau-sac/" class="sidebar-nav-item {{ request()->is('admin/mau-sac*') ? 'active' : '' }}"><i class="fa-solid fa-palette"></i> Màu sắc</a>
    <a href="/admin/cau-hinh/" class="sidebar-nav-item {{ request()->is('admin/cau-hinh*') ? 'active' : '' }}"><i class="fa-solid fa-microchip"></i> Cấu hình</a>
    <div class="sidebar-section-title">Hệ thống</div>
    <a href="/admin/danh-sach-tai-khoan/" class="sidebar-nav-item {{ request()->is('admin/danh-sach*') ? 'active' : '' }}"><i class="fa-solid fa-users"></i> Tài khoản</a>
    <a href="/admin/" class="sidebar-nav-item {{ request()->is('admin') ? 'active' : '' }}"><i class="fa-solid fa-user-shield"></i> Admin</a>
    <a href="/admin/quyen/" class="sidebar-nav-item {{ request()->is('admin/quyen*') ? 'active' : '' }}"><i class="fa-solid fa-key"></i> Quyền hạn</a>
    <a href="/admin/don-hang/" class="sidebar-nav-item {{ request()->is('admin/don-hang*') ? 'active' : '' }}"><i class="fa-solid fa-bag-shopping"></i> Đơn hàng</a>
    <div class="sidebar-section-title">Báo cáo</div>
    <a href="/admin/thong-ke/top-products" class="sidebar-nav-item"><i class="fa-solid fa-trophy"></i> Top sản phẩm</a>
    <a href="/admin/thong-ke/doanh-thu" class="sidebar-nav-item"><i class="fa-solid fa-chart-line"></i> Doanh thu</a>
    <div class="sidebar-footer">
        <div class="sidebar-footer-user">
            <img src="/assets_admin/images/avatars/avatar-2.png" alt="avatar">
            <div>
                <div class="sidebar-footer-name">{{ Auth::guard('admin')->user()->ho_va_ten ?? 'Admin' }}</div>
                <div class="sidebar-footer-role">Quản trị viên</div>
            </div>
        </div>
    </div>
</aside>

<div class="vip-main">
    {{-- Topbar: id=app3 chỉ bao topbar, KHÔNG bao content --}}
    <div id="app3">
        <header class="vip-topbar">
            <div class="topbar-left">
                <div class="topbar-search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Tìm kiếm sản phẩm, đơn hàng...">
                </div>
            </div>
            <div class="topbar-right">
                <a href="/home/" class="topbar-icon-btn" target="_blank"><i class="fa-solid fa-globe"></i></a>
                <div class="topbar-icon-btn">
                    <i class="fa-solid fa-bell"></i>
                    <span class="topbar-badge">3</span>
                </div>
                <div class="topbar-user dropdown" data-bs-toggle="dropdown" style="cursor:pointer;">
                    <img src="/assets_admin/images/avatars/avatar-2.png" alt="avatar">
                    <div>
                        <div class="topbar-user-name">{{ Auth::guard('admin')->user()->ho_va_ten ?? 'Admin' }}</div>
                        <div class="topbar-user-role">Quản trị viên</div>
                    </div>
                    <i class="fa-solid fa-chevron-down" style="font-size:11px;color:#94a3b8;margin-left:4px;"></i>
                </div>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-user me-2"></i>Hồ sơ</a></li>
                    <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-cog me-2"></i>Cài đặt</a></li>
                    <li><hr class="dropdown-divider"></li>
                    @if(Auth::guard('admin')->user())
                    <li><a class="dropdown-item text-danger" href="javascript:;" v-on:click="logoutAdmin()">
                        <i class="bx bx-log-out me-2"></i>Đăng xuất
                    </a></li>
                    @endif
                </ul>
            </div>
        </header>
    </div>

    {{-- Page content: NGOÀI #app3 --}}
    <div class="vip-page-content">
        @yield('noi_dung')
    </div>

    @include('admin.share.footer')
</div>

@include('admin.share.js')
@yield('js')

<script>
new Vue({
    el: '#app3',
    methods: {
        logoutAdmin() {
            axios.post('{{ Route("AdminLougout") }}')
                .then((res) => {
                    if(res.data.status == 1) {
                        toastr.success(res.data.message);
                        setTimeout(() => { window.location.href="/admin/login/"; }, 1000);
                    } else {
                        toastr.error(res.data.message);
                    }
                });
        }
    }
});
</script>
</body>
</html>
