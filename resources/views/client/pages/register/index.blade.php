<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký - DTStore</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; overflow-x: hidden; }
        
        .register-scene {
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
            background: rgba(139, 92, 246, 0.5);
            border-radius: 50%;
            animation: float 20s infinite;
        }
        
        .particle:nth-child(1) { width: 80px; height: 80px; left: 10%; top: 20%; animation-delay: 0s; }
        .particle:nth-child(2) { width: 60px; height: 60px; left: 80%; top: 60%; animation-delay: 2s; background: rgba(236, 72, 153, 0.4); }
        .particle:nth-child(3) { width: 100px; height: 100px; left: 50%; top: 80%; animation-delay: 4s; background: rgba(249, 115, 22, 0.3); }
        .particle:nth-child(4) { width: 40px; height: 40px; left: 20%; top: 70%; animation-delay: 6s; }
        .particle:nth-child(5) { width: 70px; height: 70px; left: 70%; top: 30%; animation-delay: 8s; background: rgba(139, 92, 246, 0.5); }
        
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
                linear-gradient(rgba(139, 92, 246, 0.1) 1px, transparent 1px),
                linear-gradient(90deg, rgba(139, 92, 246, 0.1) 1px, transparent 1px);
            background-size: 50px 50px;
            animation: gridMove 20s linear infinite;
        }
        
        @keyframes gridMove {
            0% { transform: translate(0, 0); }
            100% { transform: translate(50px, 50px); }
        }
        
        .register-container {
            max-width: 1200px;
            width: 100%;
            margin: auto;
            padding: 40px 20px;
            position: relative;
            z-index: 10;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }
        
        /* Left side - Form */
        .register-form {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            max-height: 90vh;
            overflow-y: auto;
        }
        
        .register-form::-webkit-scrollbar {
            width: 6px;
        }
        
        .register-form::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 3px;
        }
        
        .register-form::-webkit-scrollbar-thumb {
            background: rgba(139, 92, 246, 0.5);
            border-radius: 3px;
        }
        
        .register-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .badge {
            display: inline-block;
            padding: 8px 20px;
            background: rgba(139, 92, 246, 0.2);
            border: 1px solid rgba(139, 92, 246, 0.3);
            border-radius: 20px;
            color: #a78bfa;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 20px;
        }
        
        .register-title {
            font-size: 32px;
            font-weight: 800;
            color: #fff;
            margin-bottom: 8px;
        }
        
        .register-subtitle {
            color: #94a3b8;
            font-size: 14px;
        }
        
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-bottom: 16px;
        }
        
        .form-group {
            margin-bottom: 16px;
        }
        
        .form-group-full {
            grid-column: 1 / -1;
        }
        
        .form-label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #cbd5e1;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .input-wrapper {
            position: relative;
        }
        
        .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
            font-size: 16px;
        }
        
        .form-input {
            width: 100%;
            padding: 12px 14px 12px 42px;
            background: rgba(255, 255, 255, 0.05);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            font-size: 14px;
            color: #fff;
            transition: all 0.3s;
            outline: none;
        }
        
        .form-input:focus {
            background: rgba(255, 255, 255, 0.08);
            border-color: #8b5cf6;
            box-shadow: 0 0 0 4px rgba(139, 92, 246, 0.1);
        }
        
        .form-input:focus + .input-icon {
            color: #8b5cf6;
        }
        
        .form-input::placeholder {
            color: #64748b;
        }
        
        .checkbox-group {
            margin: 20px 0;
        }
        
        .checkbox {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            color: #94a3b8;
            cursor: pointer;
        }
        
        .checkbox input {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: #8b5cf6;
        }
        
        .btn-register {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
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
            margin-bottom: 20px;
            position: relative;
            overflow: hidden;
        }
        
        .btn-register::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }
        
        .btn-register:hover::before {
            left: 100%;
        }
        
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(139, 92, 246, 0.4);
        }
        
        .btn-register:active {
            transform: translateY(0);
        }
        
        .register-footer {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #64748b;
            font-size: 13px;
        }
        
        .register-footer a {
            color: #a78bfa;
            text-decoration: none;
            font-weight: 600;
        }
        
        .register-footer a:hover {
            text-decoration: underline;
        }
        
        /* Right side - Illustration */
        .illustration {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        
        .laptop-image {
            width: 100%;
            max-width: 400px;
            height: auto;
            border-radius: 20px;
            box-shadow: 0 30px 60px rgba(139, 92, 246, 0.4);
            animation: iconFloat 3s ease-in-out infinite;
            margin-bottom: 40px;
        }
        
        @keyframes iconFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        
        .illustration-title {
            font-size: 36px;
            font-weight: 800;
            color: #fff;
            text-align: center;
            background: linear-gradient(135deg, #8b5cf6, #ec4899, #f97316);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 16px;
        }
        
        .illustration-subtitle {
            font-size: 16px;
            color: #94a3b8;
            text-align: center;
            margin-bottom: 30px;
        }
        
        .benefits {
            display: grid;
            gap: 16px;
            width: 100%;
            max-width: 400px;
        }
        
        .benefit {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 16px;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: #fff;
        }
        
        .benefit-icon {
            width: 40px;
            height: 40px;
            background: rgba(139, 92, 246, 0.2);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
            color: #a78bfa;
        }
        
        .benefit-text {
            font-size: 14px;
            font-weight: 600;
        }
        
        @media (max-width: 1024px) {
            .register-container {
                grid-template-columns: 1fr;
            }
            
            .illustration {
                display: none;
            }
            
            .register-form {
                max-height: none;
            }
        }
        
        @media (max-width: 576px) {
            .register-title {
                font-size: 26px;
            }
            
            .form-grid {
                grid-template-columns: 1fr;
            }
            
            .register-form {
                padding: 30px 20px;
            }
        }
    </style>
</head>

<body>
    <div class="register-scene" id="app">
        <div class="particles">
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
        </div>
        <div class="grid"></div>
        
        <div class="register-container">
            <!-- Left side - Form -->
            <div class="register-form">
                <div class="register-header">
                    <span class="badge">✨ Thành viên mới</span>
                    <h1 class="register-title">Đăng Ký</h1>
                    <p class="register-subtitle">Tạo tài khoản để nhận ưu đãi đặc biệt</p>
                </div>
                
                <form @submit.prevent="register">
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">Họ và tên</label>
                            <div class="input-wrapper">
                                <input 
                                    type="text" 
                                    class="form-input" 
                                    placeholder="Nguyễn Văn A"
                                    v-model="them_moi.ho_va_ten" 
                                    required
                                >
                                <i class='bx bx-user input-icon'></i>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Ngày sinh</label>
                            <div class="input-wrapper">
                                <input 
                                    type="date" 
                                    class="form-input"
                                    v-model="them_moi.ngay_sinh" 
                                    required
                                >
                                <i class='bx bx-calendar input-icon'></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Địa chỉ</label>
                        <div class="input-wrapper">
                            <input 
                                type="text" 
                                class="form-input" 
                                placeholder="Số nhà, đường, phường/xã..."
                                v-model="them_moi.dia_chi" 
                                required
                            >
                            <i class='bx bx-map input-icon'></i>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <div class="input-wrapper">
                            <input 
                                type="email" 
                                class="form-input" 
                                placeholder="you@example.com"
                                v-model="them_moi.email" 
                                required
                            >
                            <i class='bx bx-envelope input-icon'></i>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Số điện thoại</label>
                        <div class="input-wrapper">
                            <input 
                                type="tel" 
                                class="form-input" 
                                placeholder="09xxxxxxxx"
                                v-model="them_moi.so_dien_thoai" 
                                required
                            >
                            <i class='bx bx-phone input-icon'></i>
                        </div>
                    </div>
                    
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">Mật khẩu</label>
                            <div class="input-wrapper">
                                <input 
                                    type="password" 
                                    class="form-input" 
                                    placeholder="Tối thiểu 6 ký tự"
                                    v-model="them_moi.password" 
                                    required 
                                    minlength="6"
                                >
                                <i class='bx bx-lock-alt input-icon'></i>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Nhập lại mật khẩu</label>
                            <div class="input-wrapper">
                                <input 
                                    type="password" 
                                    class="form-input" 
                                    placeholder="Nhập lại mật khẩu"
                                    v-model="them_moi.re_password" 
                                    required
                                >
                                <i class='bx bx-lock-alt input-icon'></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="checkbox-group">
                        <label class="checkbox">
                            <input type="checkbox">
                            <span>Đăng ký nhận tin khuyến mãi và ưu đãi đặc biệt</span>
                        </label>
                    </div>
                    
                    <button type="submit" class="btn-register">
                        <i class='bx bx-user-plus'></i>
                        <span>Tạo tài khoản</span>
                    </button>
                </form>
                
                <div class="register-footer">
                    Đã có tài khoản? <a href="/home/login/">Đăng nhập ngay</a>
                    <br><br>
                    <a href="/" class="link"><i class='bx bx-home'></i> Về trang chủ</a>
                </div>
            </div>
            
            <!-- Right side - Illustration -->
            <div class="illustration">
                <img src="{{ asset('assets_client/images/register.png') }}" 
                     alt="Register" 
                     class="laptop-image"
                     onerror="this.style.display='none'">
                <h2 class="illustration-title">Ưu đãi thành viên</h2>
                <p class="illustration-subtitle">Nhận ngay những quyền lợi đặc biệt</p>
                
                <div class="benefits">
                    <div class="benefit">
                        <div class="benefit-icon">
                            <i class='bx bx-gift'></i>
                        </div>
                        <div class="benefit-text">Giảm 10% cho đơn hàng đầu tiên</div>
                    </div>
                    <div class="benefit">
                        <div class="benefit-icon">
                            <i class='bx bx-star'></i>
                        </div>
                        <div class="benefit-text">Tích điểm đổi quà hấp dẫn</div>
                    </div>
                    <div class="benefit">
                        <div class="benefit-icon">
                            <i class='bx bx-bell'></i>
                        </div>
                        <div class="benefit-text">Nhận thông báo khuyến mãi sớm nhất</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        new Vue({
            el: '#app',
            data: {
                them_moi: {},
            },
            methods: {
                register() {
                    axios
                        .post('{{ Route('clientRegister') }}', this.them_moi)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success(res.data.message, 'Thành công');
                                setTimeout(() => {
                                    window.location.href = "/home/login/";
                                }, 500);
                            } else {
                                toastr.error('Đã xảy ra lỗi. Vui lòng thử lại.', 'Lỗi');
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
