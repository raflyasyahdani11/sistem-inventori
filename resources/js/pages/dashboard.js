const elementData = document.getElementById('datas');
let { barangTerlaris, barangTerbanyak } = elementData.dataset;

barangTerlaris = JSON.parse(barangTerlaris);
barangTerbanyak = JSON.parse(barangTerbanyak);

const elementBarangTerlaris = document.getElementById('barang_terlaris');
const labelBarangTerlaris = barangTerlaris.map(b => b.nama);
const dataBarangTerlaris = barangTerlaris.map(b => parseInt(b.jumlah));

const barChart = new Chart(elementBarangTerlaris, {
    type: 'bar',
    data: {
        labels: labelBarangTerlaris,
        datasets: [{
            label: "Jumlah",
            backgroundColor: "#4e73df",
            hoverBackgroundColor: "#2e59d9",
            borderColor: "#4e73df",
            data: dataBarangTerlaris,
        }],
    },
    options: {
        maintainAspectRatio: false,
        scales: {
            xAxes: [{
                time: {
                    unit: 'month'
                },
                gridLines: {
                    display: false,
                    drawBorder: false
                },
                ticks: {
                    maxTicksLimit: 3
                },
                maxBarThickness: 25,
            }],
            yAxes: [{
                ticks: {
                    maxTicksLimit: 5,
                }
            }],
        },
    }
});

const elementBarangTerbanyak = document.getElementById('barang_terbanyak');
const labelBarangTerbanyak = barangTerbanyak.map(b => b.nama);
const dataBarangTerbanyak = barangTerbanyak.map(b => parseInt(b.jumlah));

const pieChart = new Chart(elementBarangTerbanyak, {
    type: 'pie',
    data: {
        labels: labelBarangTerbanyak,
        datasets: [{
            data: dataBarangTerbanyak,
            backgroundColor: ["#CECE5A", "#FFE17B", "#FD8D14", "#C51605"],
        }],
    },
    options: {
        maintainAspectRatio: false,
    },
});