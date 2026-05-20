<?php $__env->startSection('css'); ?>
<style>
.tk-page{padding:28px 32px}
.tk-card{background:#fff;border-radius:16px;box-shadow:0 2px 12px rgba(0,0,0,.06)}
.tk-card-header{padding:20px 24px;border-bottom:1px solid #f1f5f9;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:12px}
.tk-card-header h3{font-size:16px;font-weight:700;color:#0f172a;margin:0}
.tk-card-body{padding:24px}
.tk-filter{display:flex;align-items:center;gap:8px;flex-wrap:wrap}
.tk-filter input{padding:8px 12px;border:1.5px solid #e2e8f0;border-radius:10px;font-size:13px;outline:none}
.tk-filter input:focus{border-color:#0ea5e9;box-shadow:0 0 0 3px rgba(14,165,233,.1)}
.btn-tk{background:linear-gradient(135deg,#0ea5e9,#3b82f6);color:#fff;border:none;border-radius:10px;padding:8px 16px;font-size:13px;font-weight:700;cursor:pointer;display:inline-flex;align-items:center;gap:6px;transition:all .2s}
.btn-tk:hover{transform:translateY(-1px);box-shadow:0 6px 16px rgba(14,165,233,.35)}
.btn-quick{background:#f1f5f9;color:#475569;border:1.5px solid #e2e8f0;border-radius:8px;padding:6px 14px;font-size:12px;font-weight:600;cursor:pointer;transition:all .2s}
.btn-quick:hover,.btn-quick.active{background:#0ea5e9;color:#fff;border-color:#0ea5e9}
.quick-group{display:flex;gap:6px;flex-wrap:wrap;padding:12px 24px;border-bottom:1px solid #f1f5f9;background:#fafafa;border-radius:0}
.tk-total{background:linear-gradient(135deg,#0ea5e9,#6366f1);border-radius:12px;padding:16px 24px;color:#fff;display:flex;justify-content:space-between;align-items:center;margin-top:20px}
.tk-total-label{font-size:14px;font-weight:600;opacity:.9}
.tk-total-value{font-size:24px;font-weight:800}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('noi_dung'); ?>
<div class="tk-page" id="app">
    <div style="margin-bottom:24px">
        <h2 style="font-size:22px;font-weight:800;color:#f1f5f9;margin:0">
            <i class="fa-solid fa-chart-line" style="color:#0ea5e9"></i> Thống Kê Doanh Thu
        </h2>
    </div>
    <div class="tk-card">
        <div class="tk-card-header">
            <h3><i class="fa-solid fa-calendar" style="color:#0ea5e9"></i> Chọn Khoảng Thời Gian</h3>
            <div class="tk-filter">
                <input type="date" v-model="begin">
                <span style="color:#64748b;font-weight:600">đến</span>
                <input type="date" v-model="end">
                <button class="btn-tk" v-on:click="thongKe()">
                    <i class="fa-solid fa-magnifying-glass"></i> Thống Kê
                </button>
            </div>
        </div>

        <div class="quick-group">
            <span style="font-size:12px;font-weight:600;color:#64748b;align-self:center;margin-right:4px">Chọn nhanh:</span>
            <button class="btn-quick" :class="activeBtn=='7'?'active':''" v-on:click="chonNhanh(7)">7 ngày</button>
            <button class="btn-quick" :class="activeBtn=='30'?'active':''" v-on:click="chonNhanh(30)">30 ngày</button>
            <button class="btn-quick" :class="activeBtn=='thang0'?'active':''" v-on:click="chonThang(0)">Tháng này</button>
            <button class="btn-quick" :class="activeBtn=='thang-1'?'active':''" v-on:click="chonThang(-1)">Tháng trước</button>
            <button class="btn-quick" :class="activeBtn=='nam0'?'active':''" v-on:click="chonNam(0)">Năm nay</button>
            <button class="btn-quick" :class="activeBtn=='nam-1'?'active':''" v-on:click="chonNam(-1)">Năm ngoái</button>
            <button class="btn-quick" :class="activeBtn=='all'?'active':''" v-on:click="chonTatCa()">Tất cả</button>
        </div>

        <div class="tk-card-body">
            <div v-if="!hasData && !loading" style="text-align:center;padding:40px;color:#94a3b8">
                <i class="fa-solid fa-chart-line" style="font-size:40px;display:block;margin-bottom:12px;opacity:.3"></i>
                <div style="font-size:15px;font-weight:600">Không có dữ liệu trong khoảng thời gian này</div>
            </div>
            <canvas id="myChart" style="max-height:400px"></canvas>
            <div class="tk-total">
                <div class="tk-total-label"><i class="fa-solid fa-sack-dollar"></i> Tổng Doanh Thu ({{ labelRange }})</div>
                <div class="tk-total-value">{{ convertToVND(sum) }}</div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
var chart1 = null;

new Vue({
    el: '#app',
    data: { begin: '', end: '', sum: 0, activeBtn: '' },
    computed: {
        labelRange: function() { return this.begin + ' - ' + this.end; }
    },
    mounted: function() {
        var ctx = document.getElementById('myChart');
        chart1 = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Doanh thu (VND)',
                    data: [],
                    borderColor: '#0ea5e9',
                    backgroundColor: 'rgba(14,165,233,.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#0ea5e9',
                    pointRadius: 5
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: true } },
                scales: { y: { beginAtZero: true, ticks: {
                    callback: function(v) {
                        if (v >= 1000000) return (v/1000000).toFixed(0) + 'tr';
                        return v;
                    }
                }}}
            }
        });
        this.end   = moment(new Date()).format('YYYY-MM-DD');
        this.begin = '2023-01-01';
        this.thongKe();
    },
    methods: {
        chonNhanh: function(days) {
            this.activeBtn = String(days);
            this.end   = moment(new Date()).format('YYYY-MM-DD');
            this.begin = moment().subtract(days, 'days').format('YYYY-MM-DD');
            this.thongKe();
        },
        chonThang: function(offset) {
            this.activeBtn = 'thang' + offset;
            this.begin = moment().add(offset, 'months').startOf('month').format('YYYY-MM-DD');
            this.end   = moment().add(offset, 'months').endOf('month').format('YYYY-MM-DD');
            this.thongKe();
        },
        chonNam: function(offset) {
            this.activeBtn = 'nam' + offset;
            this.begin = moment().add(offset, 'years').startOf('year').format('YYYY-MM-DD');
            this.end   = moment().add(offset, 'years').endOf('year').format('YYYY-MM-DD');
            this.thongKe();
        },
        chonTatCa: function() {
            this.activeBtn = 'all';
            this.begin = '2023-01-01';
            this.end   = moment(new Date()).format('YYYY-MM-DD');
            this.thongKe();
        },
        thongKe: function() {
            var self = this;
            self.sum = 0;
            axios.post('<?php echo e(Route("DoanhThuThongKe")); ?>', { begin: self.begin, end: self.end })
                .then(function(res) {
                    if (res.data.data && res.data.data.length > 0) {
                        chart1.destroy();
                        var ctx = document.getElementById('myChart');
                        chart1 = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: res.data.labels,
                                datasets: [{
                                    label: 'Doanh thu (VND)',
                                    data: res.data.data,
                                    borderColor: '#0ea5e9',
                                    backgroundColor: 'rgba(14,165,233,.1)',
                                    borderWidth: 2,
                                    fill: true,
                                    tension: 0.4,
                                    pointBackgroundColor: '#0ea5e9',
                                    pointRadius: 5
                                }]
                            },
                            options: {
                                responsive: true,
                                plugins: { legend: { display: true } },
                                scales: { y: { beginAtZero: true, ticks: {
                                    callback: function(v) {
                                        if (v >= 1000000) return (v/1000000).toFixed(0) + 'tr';
                                        return v;
                                    }
                                }}}
                            }
                        });
                        res.data.data.forEach(function(v) { self.sum += v; });
                    } else {
                        chart1.data.labels = [];
                        chart1.data.datasets[0].data = [];
                        chart1.update();
                        toastr.warning('Khong co du lieu trong khoang thoi gian nay');
                    }
                })
                .catch(function() { toastr.error('Co loi xay ra'); });
        },
        convertToVND: function(v) {
            return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND', minimumFractionDigits: 0 }).format(v);
        }
    }
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.share.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Shop-laptop\resources\views/admin/page/thong_ke/doanh_thu.blade.php ENDPATH**/ ?>