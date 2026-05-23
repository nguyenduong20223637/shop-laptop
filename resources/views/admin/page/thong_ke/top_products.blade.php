@extends('admin.share.master')

@section('css')
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
.quick-group{display:flex;gap:6px;flex-wrap:wrap;padding:12px 24px;border-bottom:1px solid #f1f5f9;background:#fafafa}
.charts-grid{display:grid;grid-template-columns:1fr 1fr;gap:20px}
.tk-card-body{padding:24px}
.chart-wrap{position:relative;height:300px}
.chart-wrap canvas{position:absolute;top:0;left:0;width:100%!important;height:100%!important}
</style>
@endsection

@section('noi_dung')
<div class="tk-page" id="app">
    <div style="margin-bottom:24px">
        <h2 style="font-size:22px;font-weight:800;color:#f1f5f9;margin:0">
            <i class="fa-solid fa-trophy" style="color:#f59e0b"></i> Top Sản Phẩm
        </h2>
    </div>

    <div class="tk-card" style="margin-bottom:20px">
        <div class="tk-card-header">
            <h3><i class="fa-solid fa-calendar" style="color:#0ea5e9"></i> Chọn Khoảng Thời Gian</h3>
            <div class="tk-filter">
                <input type="date" v-model="begin">
                <span style="color:#64748b;font-weight:600">đến</span>
                <input type="date" v-model="end">
                <button class="btn-tk" v-on:click="loadAll()">
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
            <button class="btn-quick" :class="activeBtn=='all'?'active':''" v-on:click="chonTatCa()">Tất cả</button>
        </div>
    </div>

    <div class="charts-grid">
        <div class="tk-card">
            <div class="tk-card-header">
                <h3><i class="fa-solid fa-eye" style="color:#0ea5e9"></i> Top 5 Sản Phẩm Xem Nhiều Nhất</h3>
            </div>
            <div class="tk-card-body">
                <div class="chart-wrap"><canvas id="myChart"></canvas></div>
            </div>
        </div>
        <div class="tk-card">
            <div class="tk-card-header">
                <h3><i class="fa-solid fa-fire" style="color:#ef4444"></i> Top 5 Sản Phẩm Bán Chạy Nhất</h3>
            </div>
            <div class="tk-card-body">
                <div class="chart-wrap"><canvas id="myChart2"></canvas></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
var colors = ['rgba(14,165,233,.8)','rgba(99,102,241,.8)','rgba(245,158,11,.8)','rgba(16,185,129,.8)','rgba(239,68,68,.8)'];
var chart1 = null;
var chart2 = null;

new Vue({
    el: '#app',
    data: { begin: '', end: '', activeBtn: 'all' },
    mounted: function() {
        chart1 = new Chart(document.getElementById('myChart'), {
            type: 'doughnut',
            data: { labels: [], datasets: [{ label: 'Luot xem', data: [], backgroundColor: colors, borderWidth: 2 }] },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                        align: 'center',
                        labels: { boxWidth: 14, padding: 16, font: { size: 12 } }
                    }
                }
            }
        });
        chart2 = new Chart(document.getElementById('myChart2'), {
            type: 'bar',
            data: { labels: [], datasets: [{ label: 'So luong da ban', data: [], backgroundColor: colors, borderRadius: 8 }] },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: function(ctx) { return ' ' + ctx.parsed.y + ' sản phẩm'; }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { stepSize: 1, precision: 0 }
                    },
                    x: {
                        ticks: {
                            maxRotation: 0,
                            minRotation: 0,
                            callback: function(val, idx) {
                                var label = this.getLabelForValue(val);
                                if (label && label.length > 15) return label.substring(0, 15) + '...';
                                return label;
                            }
                        }
                    }
                }
            }
        });
        this.chonTatCa();
    },
    methods: {
        chonNhanh: function(days) {
            this.activeBtn = String(days);
            this.end   = moment(new Date()).format('YYYY-MM-DD');
            this.begin = moment().subtract(days, 'days').format('YYYY-MM-DD');
            this.loadAll();
        },
        chonThang: function(offset) {
            this.activeBtn = 'thang' + offset;
            this.begin = moment().add(offset, 'months').startOf('month').format('YYYY-MM-DD');
            this.end   = moment().add(offset, 'months').endOf('month').format('YYYY-MM-DD');
            this.loadAll();
        },
        chonNam: function(offset) {
            this.activeBtn = 'nam' + offset;
            this.begin = moment().add(offset, 'years').startOf('year').format('YYYY-MM-DD');
            this.end   = moment().add(offset, 'years').endOf('year').format('YYYY-MM-DD');
            this.loadAll();
        },
        chonTatCa: function() {
            this.activeBtn = 'all';
            this.begin = '2023-01-01';
            this.end   = moment(new Date()).format('YYYY-MM-DD');
            this.loadAll();
        },
        loadAll: function() {
            this.topView();
            this.topSale();
        },
        topView: function() {
            var payload = { begin: this.begin, end: this.end };
            axios.post('{{ Route("TopViewThongKe") }}', payload).then(function(res) {
                chart1.data.labels = res.data.labels;
                chart1.data.datasets[0].data = res.data.data;
                chart1.update();
            }).catch(function() { toastr.error('Loi tai top view'); });
        },
        topSale: function() {
            var payload = { begin: this.begin, end: this.end };
            axios.post('{{ Route("TopSaleThongKe") }}', payload).then(function(res) {
                chart2.data.labels = res.data.labels;
                chart2.data.datasets[0].data = res.data.data;
                chart2.update();
            }).catch(function() { toastr.error('Loi tai top sale'); });
        }
    }
});
</script>
@endsection
