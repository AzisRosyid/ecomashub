const keuntungan = document.getElementById('keuntungan');
const pengeluaran = document.getElementById('pengeluaran');
const pesanan = document.getElementById('pesanan');
// chart keuntungan
new Chart(keuntungan, {
    type: 'line',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
            'Oktober', 'November', 'Desember'
        ],
        datasets: [{
            label: 'Keuntungan',
            data: [300000, 200000, 400000, 500000, 200000, 300000],
            borderWidth: 2,
            borderColor: 'green'
        }]
    },
    options: {
        tension: 0.4,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// chart pengeluaran
new Chart(pengeluaran, {
    type: 'line',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
            'Oktober', 'November', 'Desember'
        ],
        datasets: [{
            label: 'Pengeluaran',
            data: [12, 19, 3, 5, 2, 3],
            borderWidth: 2,
            borderColor: 'green'
        }]
    },
    options: {
        tension: 0.4,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// chart pesanan
new Chart(pesanan, {
    type: 'line',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
            'Oktober', 'November', 'Desember'
        ],
        datasets: [{
            label: 'Pesanan',
            data: [12, 19, 3, 5, 2, 3],
            borderWidth: 2,
            borderColor: 'green'
        }]
    },
    options: {
        tension: 0.4,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
