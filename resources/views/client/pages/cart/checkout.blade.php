@extends('client.share.master');
@section('noi_dung')
<style>
[v-cloak]{display:none!important}
.co-page{background:linear-gradient(135deg,#f0f9ff 0%,#f8fafc 60%,#eef2ff 100%);min-height:80vh;padding:30px 0 60px;font-family:"Be Vietnam Pro",sans-serif;}

/* Steps */
.co-steps{display:flex;align-items:center;justify-content:center;margin-bottom:32px;}
.co-step{display:flex;flex-direction:column;align-items:center;flex:1;max-width:180px;}
.co-step__num{width:42px;height:42px;border-radius:50%;background:#e2e8f0;color:#94a3b8;font-weight:700;font-size:14px;display:flex;align-items:center;justify-content:center;border:2px solid #e2e8f0;transition:all .3s;}
.co-step__label{font-size:11px;font-weight:700;color:#94a3b8;margin-top:7px;text-transform:uppercase;letter-spacing:.05em;}
.co-step.done .co-step__num{background:#22c55e;border-color:#22c55e;color:#fff;}
.co-step.active .co-step__num{background:linear-gradient(135deg,#0ea5e9,#6366f1);border-color:#0ea5e9;color:#fff;box-shadow:0 4px 12px rgba(14,165,233,.35);}
.co-step.active .co-step__label{color:#0ea5e9;}
.co-step__line{flex:1;height:2px;background:#e2e8f0;margin-bottom:20px;max-width:100px;}
.co-step__line.done{background:linear-gradient(90deg,#22c55e,#0ea5e9);}

/* Cards */
.co-card{background:rgba(255,255,255,.9);backdrop-filter:blur(12px);border-radius:16px;border:1px solid rgba(255,255,255,.95);box-shadow:0 2px 16px rgba(15,23,42,.08);padding:24px;margin-bottom:20px;}
.co-card__title{font-size:15px;font-weight:800;color:#0f172a;margin-bottom:20px;padding-bottom:12px;border-bottom:2px solid #f1f5f9;display:flex;align-items:center;gap:8px;}
.co-card__title i{color:#0ea5e9;font-size:14px;}

/* Form */
.co-label{font-size:12px;font-weight:700;color:#475569;margin-bottom:6px;text-transform:uppercase;letter-spacing:.04em;}
.co-input{width:100%;padding:12px 16px;border:1.5px solid #e2e8f0;border-radius:10px;font-size:14px;color:#0f172a;outline:none;transition:all .2s;background:#f8fafc;font-family:inherit;box-sizing:border-box;}
.co-input:focus{border-color:#0ea5e9;background:#fff;box-shadow:0 0 0 3px rgba(14,165,233,.1);}
.co-input::placeholder{color:#94a3b8;}
.co-form-group{margin-bottom:16px;}

/* Payment options */
.co-pay-opt{border:2px solid #e2e8f0;border-radius:12px;padding:14px 16px;margin-bottom:10px;cursor:pointer;transition:all .2s;display:flex;align-items:center;gap:12px;background:#f8fafc;}
.co-pay-opt:hover{border-color:#93c5fd;background:#eff6ff;}
.co-pay-opt.selected{border-color:#0ea5e9;background:linear-gradient(135deg,rgba(14,165,233,.06),rgba(99,102,241,.06));}
.co-pay-opt__icon{width:38px;height:38px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:17px;flex-shrink:0;}
.co-pay-opt__icon.cod{background:#dcfce7;color:#16a34a;}
.co-pay-opt__icon.bank{background:#dbeafe;color:#2563eb;}
.co-pay-opt__text strong{font-size:13px;font-weight:700;color:#0f172a;display:block;}
.co-pay-opt__text span{font-size:11px;color:#64748b;}
.co-pay-opt__radio{margin-left:auto;width:18px;height:18px;border-radius:50%;border:2px solid #e2e8f0;display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.co-pay-opt.selected .co-pay-opt__radio{background:#0ea5e9;border-color:#0ea5e9;}
.co-pay-opt.selected .co-pay-opt__radio::after{content:'';width:6px;height:6px;border-radius:50%;background:#fff;}

/* Terms */
.co-terms{display:flex;align-items:center;gap:10px;padding:12px 14px;background:#f8fafc;border-radius:10px;border:1.5px solid #e2e8f0;cursor:pointer;margin-top:4px;}
.co-terms input{width:16px;height:16px;accent-color:#0ea5e9;cursor:pointer;flex-shrink:0;}
.co-terms span{font-size:12px;color:#475569;}

/* Summary */
.co-summary{background:rgba(255,255,255,.9);backdrop-filter:blur(12px);border-radius:16px;border:1px solid rgba(255,255,255,.95);box-shadow:0 2px 16px rgba(15,23,42,.08);padding:24px;position:sticky;top:20px;}
.co-summary__title{font-size:15px;font-weight:800;color:#0f172a;margin-bottom:16px;padding-bottom:12px;border-bottom:2px solid #f1f5f9;}
.co-item{display:flex;align-items:center;gap:10px;padding:10px 0;border-bottom:1px solid #f1f5f9;}
.co-item:last-of-type{border-bottom:none;}
.co-item__img{width:50px;height:50px;object-fit:contain;border-radius:8px;background:#f8fafc;border:1px solid #e2e8f0;padding:3px;flex-shrink:0;}
.co-item__name{font-size:12px;font-weight:700;color:#0f172a;line-height:1.3;}
.co-item__variant{font-size:11px;color:#64748b;}
.co-item__price{margin-left:auto;font-size:13px;font-weight:700;color:#0ea5e9;white-space:nowrap;}
.co-row{display:flex;justify-content:space-between;padding:8px 0;font-size:13px;color:#64748b;border-bottom:1px solid #f8f9fa;}
.co-row span:last-child{font-weight:600;color:#0f172a;}
.co-total{display:flex;justify-content:space-between;padding:14px 0 0;font-size:16px;font-weight:800;color:#0f172a;}
.co-total span:last-child{color:#dc2626;font-size:20px;}
.co-btn{
    width:100%;padding:16px;
    background:linear-gradient(135deg,#0ea5e9 0%,#6366f1 100%);
    color:#fff;border:none;border-radius:50px;
    font-size:15px;font-weight:800;cursor:pointer;margin-top:20px;
    transition:all .3s;font-family:inherit;letter-spacing:.05em;
    box-shadow:0 4px 20px rgba(99,102,241,.4);
    position:relative;overflow:hidden;
    display:flex;align-items:center;justify-content:center;gap:8px;
}
.co-btn::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(90deg,transparent,rgba(255,255,255,.25),transparent);
    transition:left .5s;
}
.co-btn:hover::before{left:100%;}
.co-btn:hover{transform:translateY(-2px);box-shadow:0 8px 28px rgba(99,102,241,.55);}
.co-btn:active{transform:translateY(0);}
.co-secure{text-align:center;margin-top:10px;font-size:11px;color:#94a3b8;}
.co-secure i{color:#22c55e;}
</style>

<div class="co-page" id="app6" v-cloak>
    <div class="container">

        {{-- Steps --}}
        <div class="co-steps">
            <div class="co-step done">
                <div class="co-step__num"><i class="fas fa-check" style="font-size:13px"></i></div>
                <div class="co-step__label">Giỏ hàng</div>
            </div>
            <div class="co-step__line done"></div>
            <div class="co-step active">
                <div class="co-step__num">02</div>
                <div class="co-step__label">Thanh toán</div>
            </div>
            <div class="co-step__line"></div>
            <div class="co-step">
                <div class="co-step__num">03</div>
                <div class="co-step__label">Hoàn tất</div>
            </div>
        </div>

        <div class="row">
            {{-- Left --}}
            <div class="col-lg-7">
                <div class="co-card">
                    <div class="co-card__title"><i class="fas fa-user"></i> Thông tin giao hàng</div>
                    <div class="co-form-group">
                        <div class="co-label">Họ và tên *</div>
                        <input class="co-input" type="text" placeholder="Nhập họ và tên..." v-model="ten_nguoi_nhan">
                    </div>
                    <div class="co-form-group">
                        <div class="co-label">Số điện thoại *</div>
                        <input class="co-input" type="text" placeholder="Nhập số điện thoại..." v-model="so_dien_thoai">
                    </div>
                    <div class="co-form-group" style="margin-bottom:0">
                        <div class="co-label">Địa chỉ giao hàng *</div>
                        <input class="co-input" type="text" placeholder="Số nhà, tên đường, phường/xã, quận/huyện..." v-model="dia_chi">
                    </div>
                </div>

                <div class="co-card">
                    <div class="co-card__title"><i class="fas fa-credit-card"></i> Phương thức thanh toán</div>

                    <div class="co-pay-opt" :class="{selected: hinh_thuc_thanh_toan=='1'}" @click="hinh_thuc_thanh_toan='1'">
                        <div class="co-pay-opt__icon cod"><i class="fas fa-truck"></i></div>
                        <div class="co-pay-opt__text">
                            <strong>Thanh toán khi nhận hàng (COD)</strong>
                            <span>Trả tiền mặt khi nhận được hàng</span>
                        </div>
                        <div class="co-pay-opt__radio"></div>
                    </div>

                    <div class="co-pay-opt" :class="{selected: hinh_thuc_thanh_toan=='2'}" @click="hinh_thuc_thanh_toan='2'">
                        <div class="co-pay-opt__icon bank"><i class="fas fa-university"></i></div>
                        <div class="co-pay-opt__text">
                            <strong>Thanh toán qua VNPay</strong>
                            <span>ATM, Visa, QR Code — An toàn & bảo mật</span>
                        </div>
                        <div class="co-pay-opt__radio"></div>
                    </div>

                    <label class="co-terms">
                        <input type="checkbox" v-model="chap_nhan_dieu_khoan">
                        <span>Tôi đã đọc và đồng ý với điều khoản dịch vụ và chính sách bảo mật</span>
                    </label>
                </div>
            </div>

            {{-- Right --}}
            <div class="col-lg-5">
                <div class="co-summary">
                    <div class="co-summary__title">Đơn hàng (@{{ List_prod.length }} sản phẩm)</div>

                    <div class="co-item" v-for="(v,k) in List_prod" :key="k">
                        <img :src="v.hinh_anh" class="co-item__img" alt="">
                        <div style="flex:1;min-width:0">
                            <div class="co-item__name">@{{ v.ten_san_pham }}</div>
                            <div class="co-item__variant">@{{ v.ten_mau_sac }} · @{{ v.ten_cau_hinh }} · x@{{ v.so_luong }}</div>
                        </div>
                        <div class="co-item__price">@{{ formatNumber(sumOne(v.gia, v.so_luong)) }}₫</div>
                    </div>

                    <div style="margin-top:16px">
                        <div class="co-row"><span>Tạm tính</span><span>@{{ formatNumber(tong) }}₫</span></div>
                        <div class="co-row"><span>Phí giao hàng</span><span>@{{ formatNumber(phiship) }}₫</span></div>
                        <div class="co-row"><span>Giảm giá</span><span style="color:#16a34a">-0₫</span></div>
                        <div class="co-total"><span>Tổng cộng</span><span>@{{ formatNumber(TongVShip) }}₫</span></div>
                    </div>

                    <button class="co-btn" @click="MakeOrder()">
                        <i class="fas fa-lock" style="margin-right:8px"></i>
                        <span v-if="hinh_thuc_thanh_toan=='2'">Thanh toán qua VNPay</span>
                        <span v-else>Đặt hàng ngay</span>
                    </button>
                    <div class="co-secure"><i class="fas fa-shield-alt"></i> Thông tin được mã hóa và bảo mật</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
new Vue({
    el: '#app6',
    data: {
        List_prod: [],
        phiship: 25000,
        ten_nguoi_nhan: '', so_dien_thoai: '', dia_chi: '',
        hinh_thuc_thanh_toan: '',
        chap_nhan_dieu_khoan: false,
    },
    computed: {
        tong: function() {
            var t = 0;
            if (this.List_prod && this.List_prod.length) {
                this.List_prod.forEach(function(item) {
                    t += (parseFloat(item.gia) || 0) * (parseInt(item.so_luong) || 0);
                });
            }
            return t;
        },
        TongVShip: function() {
            return this.tong + this.phiship;
        }
    },
    created() {
        this.data();
    },
    methods: {
        data() {
            var self = this;
            axios.post('{{ Route("CartData") }}')
                .then(function(res) { self.List_prod = res.data.data || []; })
                .catch(function() {});
        },
        sumOne(gia, sl) { return (parseFloat(gia) || 0) * (parseInt(sl) || 0); },
        formatNumber(p) { return Math.round(p).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","); },
        MakeOrder() {
            if (!this.ten_nguoi_nhan.trim()) { toastr.error('Vui lòng nhập tên người nhận!'); return; }
            if (!this.so_dien_thoai.trim()) { toastr.error('Vui lòng nhập số điện thoại!'); return; }
            if (!this.dia_chi.trim()) { toastr.error('Vui lòng nhập địa chỉ!'); return; }
            if (!this.hinh_thuc_thanh_toan) { toastr.error('Vui lòng chọn phương thức thanh toán!'); return; }
            if (!this.chap_nhan_dieu_khoan) { toastr.error('Vui lòng chấp nhận điều khoản!'); return; }

            axios.post('{{ Route("OrderComplete") }}', {
                products: this.List_prod,
                info: {
                    ten_nguoi_nhan: this.ten_nguoi_nhan,
                    tong_tien: this.TongVShip,
                    dia_chi: this.dia_chi,
                    so_dien_thoai: this.so_dien_thoai,
                    hinh_thuc_thanh_toan: parseInt(this.hinh_thuc_thanh_toan),
                }
            }).then(res => {
                if (res.data.status == 1) {
                    toastr.success(res.data.message);
                    setTimeout(() => { window.location.href = '{{ url("/home/cart/order-complete") }}'; }, 1000);
                } else if (res.data.status == 2) {
                    toastr.success('Đang chuyển đến VNPay...');
                    setTimeout(() => { window.location.href = res.data.payment_url; }, 1000);
                } else {
                    toastr.error(res.data.message);
                }
            }).catch(() => { toastr.error('Có lỗi xảy ra!'); });
        }
    }
});
</script>
@endsection
