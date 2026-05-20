<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - DTStore</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; overflow: hidden; }
        
        .login-scene {
            min-height: 100vh;
            display: flex;
            background: #0f172a;
            position: relative;
            overflow: hidden;
        }
        
        /* Animated background particles */
        .particles {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
        
        .particle {
            position: absolute;
            background: rgba(14, 165, 233, 0.5);
            border-radius: 50%;
            animation: float 20s infinite;
        }
        
        .particle:nth-child(1) { width: 80px; height: 80px; left: 10%; top: 20%; animation-delay: 0s; }
        .particle:nth-child(2) { width: 60px; height: 60px; left: 80%; top: 60%; animation-delay: 2s; background: rgba(99, 102, 241, 0.4); }
        .particle:nth-child(3) { width: 100px; height: 100px; left: 50%; top: 80%; animation-delay: 4s; background: rgba(34, 211, 238, 0.3); }
        .particle:nth-child(4) { width: 40px; height: 40px; left: 20%; top: 70%; animation-delay: 6s; }
        .particle:nth-child(5) { width: 70px; height: 70px; left: 70%; top: 30%; animation-delay: 8s; background: rgba(99, 102, 241, 0.5); }
        
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); opacity: 0.5; }
            50% { transform: translateY(-100px) rotate(180deg); opacity: 1; }
        }
        
        /* Grid background */
        .grid {
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(rgba(14, 165, 233, 0.1) 1px, transparent 1px),
                linear-gradient(90deg, rgba(14, 165, 233, 0.1) 1px, transparent 1px);
            background-size: 50px 50px;
            animation: gridMove 20s linear infinite;
        }
        
        @keyframes gridMove {
            0% { transform: translate(0, 0); }
            100% { transform: translate(50px, 50px); }
        }
        
        .login-container {
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
        .illustration {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        
        .laptop-image {
            width: 100%;
            max-width: 450px;
            height: auto;
            border-radius: 20px;
            box-shadow: 0 30px 60px rgba(14, 165, 233, 0.4);
            animation: iconFloat 3s ease-in-out infinite;
        }
        
        @keyframes iconFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        
        .illustration-title {
            margin-top: 40px;
            font-size: 36px;
            font-weight: 800;
            color: #fff;
            text-align: center;
            background: linear-gradient(135deg, #0ea5e9, #3b82f6, #6366f1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .illustration-subtitle {
            margin-top: 10px;
            font-size: 16px;
            color: #94a3b8;
            text-align: center;
        }
        
        /* Right side - Login form */
        .login-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 24px;
            padding: 50px 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .badge {
            display: inline-block;
            padding: 8px 20px;
            background: rgba(14, 165, 233, 0.2);
            border: 1px solid rgba(14, 165, 233, 0.3);
            border-radius: 20px;
            color: #22d3ee;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 20px;
        }
        
        .login-title {
            font-size: 32px;
            font-weight: 800;
            color: #fff;
            margin-bottom: 8px;
        }
        
        .login-subtitle {
            color: #94a3b8;
            font-size: 14px;
        }
        
        .form-group {
            margin-bottom: 24px;
        }
        
        .form-label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #cbd5e1;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .input-wrapper {
            position: relative;
        }
        
        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
            font-size: 18px;
        }
        
        .form-input {
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
        
        .form-input:focus {
            background: rgba(255, 255, 255, 0.08);
            border-color: #0ea5e9;
            box-shadow: 0 0 0 4px rgba(14, 165, 233, 0.1);
        }
        
        .form-input:focus + .input-icon {
            color: #0ea5e9;
        }
        
        .form-input::placeholder {
            color: #64748b;
        }
        
        .form-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }
        
        .checkbox {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            color: #94a3b8;
        }
        
        .checkbox input {
            width: 18px;
            height: 18px;
            cursor: pointer;
        }
        
        .link {
            color: #22d3ee;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: color 0.3s;
        }
        
        .link:hover {
            color: #0ea5e9;
        }
        
        .btn-login {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #0ea5e9 0%, #3b82f6 100%);
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
        
        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }
        
        .btn-login:hover::before {
            left: 100%;
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(14, 165, 233, 0.4);
        }
        
        .btn-login:active {
            transform: translateY(0);
        }
        
        .login-footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #64748b;
            font-size: 13px;
        }
        
        .login-footer a {
            color: #22d3ee;
            text-decoration: none;
            font-weight: 600;
        }
        
        .login-footer a:hover {
            text-decoration: underline;
        }
        
        @media (max-width: 992px) {
            .login-container {
                grid-template-columns: 1fr;
                gap: 40px;
            }
            
            .illustration {
                display: none;
            }
            
            .login-card {
                padding: 40px 30px;
            }
        }
        
        @media (max-width: 576px) {
            .login-card {
                padding: 30px 20px;
            }
            
            .login-title {
                font-size: 26px;
            }
        }
    </style>
</head>

<body>
    <div class="login-scene" id="app">
        <div class="particles">
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
        </div>
        <div class="grid"></div>
        
        <div class="login-container">
            <!-- Left side - Illustration -->
            <div class="illustration">
                <img src="{{ asset('assets_client/images/auth-side-hero.png') }}" 
                     alt="Laptop" 
                     class="laptop-image"
                     onerror="this.style.display='none'">
                <h2 class="illustration-title">DTStore</h2>
                <p class="illustration-subtitle">Chuyên cung cấp máy tính xách tay chính hãng</p>
            </div>
            
            <!-- Right side - Login form -->
            <div class="login-card">
                <div class="login-header">
                    <span class="badge">🔐 Khách hàng</span>
                    <h1 class="login-title">Đăng Nhập</h1>
                    <p class="login-subtitle">Nhập thông tin để tiếp tục mua sắm</p>
                </div>
                
                <form @submit.prevent="login">
                    <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <div class="input-wrapper">
                            <input 
                                v-model="dang_nhap.email" 
                                type="email" 
                                class="form-input" 
                                placeholder="you@example.com"
                                required
                            >
                            <i class='bx bx-envelope input-icon'></i>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <div class="input-wrapper">
                            <input 
                                v-model="dang_nhap.password" 
                                type="password" 
                                class="form-input" 
                                placeholder="••••••••••"
                                required
                            >
                            <i class='bx bx-lock-alt input-icon'></i>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <label class="checkbox">
                            <input type="checkbox">
                            <span>Ghi nhớ đăng nhập</span>
                        </label>
                        <a href="/home/forgot-password/" class="link">Quên mật khẩu?</a>
                    </div>
                    
                    <button type="submit" class="btn-login">
                        <i class='bx bx-log-in-circle'></i>
                        <span>Đăng Nhập</span>
                    </button>
                </form>
                
                <div class="login-footer">
                    Chưa có tài khoản? <a href="/home/register/">Đăng ký ngay</a>
                    <br><br>
                    <a href="/" class="link"><i class='bx bx-home'></i> Về trang chủ</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        new Vue({
            el: '#app',
            data: {
                dang_nhap: {},
            },
            methods: {
                login() {
                    axios
                        .post('{{ Route('clientLogin') }}', this.dang_nhap)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success(res.data.message, 'Thành công');
                                setTimeout(() => {
                                    window.location.href = "/";
                                }, 2500);
                            } else {
                                toastr.error(res.data.message, 'Lỗi');
                            }
                        })
                        .catch((res) => {
                            if (res.response && res.response.data && res.response.data.errors) {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'Lỗi');
                                });
                            } else {
                                toastr.error('Không thể kết nối máy chủ. Vui lòng thử lại.', 'Lỗi');
                            }
                        });
                },
            },
        });
    </script>
</body>
</html>
