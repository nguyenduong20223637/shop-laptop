<!doctype html>
<html lang="en">

<head>
	<?php echo $__env->make('admin.share.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; overflow: hidden; }
        
        .admin-login-scene {
            min-height: 100vh;
            display: flex;
            background: #0f172a;
            position: relative;
            overflow: hidden;
        }
        
        /* Animated background particles */
        .admin-particles {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
        
        .particle {
            position: absolute;
            background: rgba(59, 130, 246, 0.5);
            border-radius: 50%;
            animation: float 20s infinite;
        }
        
        .particle:nth-child(1) { width: 80px; height: 80px; left: 10%; top: 20%; animation-delay: 0s; }
        .particle:nth-child(2) { width: 60px; height: 60px; left: 80%; top: 60%; animation-delay: 2s; background: rgba(168, 85, 247, 0.4); }
        .particle:nth-child(3) { width: 100px; height: 100px; left: 50%; top: 80%; animation-delay: 4s; background: rgba(34, 211, 238, 0.3); }
        .particle:nth-child(4) { width: 40px; height: 40px; left: 20%; top: 70%; animation-delay: 6s; }
        .particle:nth-child(5) { width: 70px; height: 70px; left: 70%; top: 30%; animation-delay: 8s; background: rgba(168, 85, 247, 0.5); }
        
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); opacity: 0.5; }
            50% { transform: translateY(-100px) rotate(180deg); opacity: 1; }
        }
        
        /* Grid background */
        .admin-grid {
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(rgba(59, 130, 246, 0.1) 1px, transparent 1px),
                linear-gradient(90deg, rgba(59, 130, 246, 0.1) 1px, transparent 1px);
            background-size: 50px 50px;
            animation: gridMove 20s linear infinite;
        }
        
        @keyframes gridMove {
            0% { transform: translate(0, 0); }
            100% { transform: translate(50px, 50px); }
        }
        
        .admin-login-container {
            max-width: 1100px;
            width: 100%;
            margin: auto;
            padding: 20px;
            position: relative;
            z-index: 10;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }
        
        /* Left side - Illustration */
        .admin-illustration {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        
        .admin-laptop-image {
            width: 100%;
            max-width: 450px;
            height: auto;
            border-radius: 20px;
            box-shadow: 0 30px 60px rgba(59, 130, 246, 0.4);
            animation: iconFloat 3s ease-in-out infinite;
        }
        
        @keyframes iconFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.1); opacity: 0.5; }
        }
        
        .admin-illustration-title {
            margin-top: 40px;
            font-size: 36px;
            font-weight: 800;
            color: #fff;
            text-align: center;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6, #ec4899);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .admin-illustration-subtitle {
            margin-top: 10px;
            font-size: 16px;
            color: #94a3b8;
            text-align: center;
        }
        
        /* Right side - Login form */
        .admin-login-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 24px;
            padding: 50px 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        }
        
        .admin-login-header {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .admin-badge {
            display: inline-block;
            padding: 8px 20px;
            background: rgba(59, 130, 246, 0.2);
            border: 1px solid rgba(59, 130, 246, 0.3);
            border-radius: 20px;
            color: #60a5fa;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 20px;
        }
        
        .admin-login-title {
            font-size: 32px;
            font-weight: 800;
            color: #fff;
            margin-bottom: 8px;
        }
        
        .admin-login-subtitle {
            color: #94a3b8;
            font-size: 14px;
        }
        
        .admin-form-group {
            margin-bottom: 24px;
        }
        
        .admin-form-label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #cbd5e1;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .admin-input-wrapper {
            position: relative;
        }
        
        .admin-input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
            font-size: 18px;
        }
        
        .admin-form-input {
            width: 100%;
            padding: 14px 16px 14px 48px;
            background: rgba(255, 255, 255, 0.05);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            font-size: 14px;
            color: #fff;
            transition: all 0.3s;
            outline: none;
        }
        
        .admin-form-input:focus {
            background: rgba(255, 255, 255, 0.08);
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }
        
        .admin-form-input:focus + .admin-input-icon {
            color: #3b82f6;
        }
        
        .admin-form-input::placeholder {
            color: #64748b;
        }
        
        .admin-btn-login {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
            border: none;
            border-radius: 12px;
            color: #fff;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 30px;
            position: relative;
            overflow: hidden;
        }
        
        .admin-btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }
        
        .admin-btn-login:hover::before {
            left: 100%;
        }
        
        .admin-btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(59, 130, 246, 0.4);
        }
        
        .admin-btn-login:active {
            transform: translateY(0);
        }
        
        .admin-login-footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #64748b;
            font-size: 13px;
        }
        
        @media (max-width: 992px) {
            .admin-login-container {
                grid-template-columns: 1fr;
                gap: 40px;
            }
            
            .admin-illustration {
                display: none;
            }
            
            .admin-login-card {
                padding: 40px 30px;
            }
        }
        
        @media (max-width: 576px) {
            .admin-login-card {
                padding: 30px 20px;
            }
            
            .admin-login-title {
                font-size: 26px;
            }
        }
    </style>
</head>

<body>
	<div class="admin-login-scene" id="app">
        <div class="admin-particles">
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
        </div>
        <div class="admin-grid"></div>
        
        <div class="admin-login-container">
            <!-- Left side - Illustration -->
            <div class="admin-illustration">
                <img src="<?php echo e(asset('assets_client/images/auth-side-hero.png')); ?>" 
                     alt="Laptop" 
                     class="admin-laptop-image"
                     onerror="this.style.display='none'">
                <h2 class="admin-illustration-title">DTStore Admin</h2>
                <p class="admin-illustration-subtitle">Hệ thống quản trị bán laptop chuyên nghiệp</p>
            </div>
            
            <!-- Right side - Login form -->
            <div class="admin-login-card">
                <div class="admin-login-header">
                    <span class="admin-badge">🔐 Admin Portal</span>
                    <h1 class="admin-login-title">Đăng Nhập</h1>
                    <p class="admin-login-subtitle">Truy cập vào bảng điều khiển quản trị</p>
                </div>
                
                <form @submit.prevent="login">
                    <div class="admin-form-group">
                        <label class="admin-form-label">Email Address</label>
                        <div class="admin-input-wrapper">
                            <input 
                                v-model="dang_nhap.email" 
                                type="email" 
                                class="admin-form-input" 
                                placeholder="admin@dtstore.com"
                                required
                            >
                            <i class='bx bx-envelope admin-input-icon'></i>
                        </div>
                    </div>
                    
                    <div class="admin-form-group">
                        <label class="admin-form-label">Password</label>
                        <div class="admin-input-wrapper">
                            <input 
                                v-model="dang_nhap.password" 
                                type="password" 
                                class="admin-form-input" 
                                placeholder="••••••••••"
                                required
                            >
                            <i class='bx bx-lock-alt admin-input-icon'></i>
                        </div>
                    </div>
                    
                    <button type="submit" class="admin-btn-login">
                        <i class='bx bx-log-in-circle'></i>
                        <span>Đăng Nhập</span>
                    </button>
                </form>
                
                <div class="admin-login-footer">
                    <i class='bx bx-shield-quarter'></i> Secured by DTStore Security System
                </div>
            </div>
        </div>
    </div>

	<?php echo $__env->make('admin.share.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        new Vue({
            el      :   '#app',
            data    :   {
                dang_nhap   : {},
            },
            created()   {

            },
            methods :   {
                login() {
                    axios
                        .post('<?php echo e(Route("adminLogin")); ?>', this.dang_nhap)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message, 'Success');
                                setTimeout(() => {
                                    window.location.href = "/admin/product/";
                                }, 500);
                            } else {
                                toastr.error(res.data.message, 'Error');
                            }
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                }
            },
        });
    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\Shop-laptop\resources\views/admin/login.blade.php ENDPATH**/ ?>