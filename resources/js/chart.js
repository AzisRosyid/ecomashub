const moneyFlowChart = document.getElementById('moneyFlow');
const netIncomeChart = document.getElementById('netIncome');
const orderChart = document.getElementById('order');
const chartAlpha = 0.1;

const currentDate = new Date();

const currentMonth = currentDate.getMonth();

const chartLabels = [
    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
];


const clearChart = () => {
    return new Promise((resolve, reject) => {
        try {
            resolve();
        } catch (error) {
            reject(error);
        }
    });
};

const loadChart = () => {
    return new Promise((resolve, reject) => {
        try {
            clearChart().then(s => fetch(window.location.origin + `/admin/dashboard?api`)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    const { net_income, money_flow, orders } = data;

                    const profit = Array.from({ length: currentMonth + 1 }, (_, index) => {
                        const entry = net_income.profit_data.find(item => item.month === index + 1);
                        return entry ? entry.total : 0;
                    });
                    const loss = Array.from({ length: currentMonth + 1 }, (_, index) => {
                        const entry = net_income.loss_data.find(item => item.month === index + 1);
                        return entry ? entry.total : 0;
                    });
                    const order = Array.from({ length: currentMonth + 1 }, (_, index) => {
                        const entry = orders.data.find(item => item.month === index + 1);
                        return entry ? entry.total : 0;
                    });

                    const netIncome = profit.map((p, index) => p - (loss[index] || 0));

                    percentageMode(money_flow.percentage, money_flow.comparison, moneyFlowChart.querySelector('.chart-percentage'));
                    percentageMode(net_income.percentage, net_income.comparison, netIncomeChart.querySelector('.chart-percentage'));
                    percentageMode(orders.percentage, orders.comparison, orderChart.querySelector('.chart-percentage'));

                    new Chart(moneyFlowChart.querySelector('canvas'), {
                        type: 'line',
                        data: {
                            labels: chartLabels,
                            datasets: [{
                                label: 'Keuntungan',
                                data: profit,
                                borderWidth: 2,
                                borderColor: 'green',
                                fill: true,
                                backgroundColor: `rgba(0, 255, 0, ${chartAlpha})`
                            }, {
                                label: 'Kerugian',
                                data: loss,
                                borderWidth: 2,
                                borderColor: 'red',
                                fill: true,
                                backgroundColor: `rgba(255, 0, 0, ${chartAlpha})`
                            }]
                        },
                        options: {
                            tension: 0.4,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    precision: 0,
                                }
                            }
                        }
                    });

                    new Chart(netIncomeChart.querySelector('canvas'), {
                        type: 'line',
                        data: {
                            labels: chartLabels,
                            datasets: [{
                                label: 'Pendapatan Bersih',
                                data: netIncome,
                                borderWidth: 2,
                                borderColor: 'blue',
                                fill: true,
                                backgroundColor: `rgba(0, 0, 255, ${chartAlpha})`
                            }]
                        },
                        options: {
                            tension: 0.4,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    precision: 0
                                }
                            }
                        }
                    });

                    new Chart(orderChart.querySelector('canvas'), {
                        type: 'line',
                        data: {
                            labels: chartLabels,
                            datasets: [{
                                label: 'Pesanan',
                                data: order,
                                borderWidth: 2,
                                borderColor: 'green',
                                fill: true,
                                backgroundColor: `rgba(0, 255, 0, ${chartAlpha})`
                            }]
                        },
                        options: {
                            tension: 0.4,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    stepSize: 1,
                                    precision: 0
                                }
                            }
                        }
                    });

                    resolve();
                })
                .catch(error => {
                    console.error('Error:', error);
                    reject(error);
                }));
        } catch (error) {
            reject(error);
        }
    });
}

const percentageMode = (value, mode, element) => {
    if (mode != 'less') {
        element.classList.add('text-green-500');
        element.innerHTML = `<svg class="" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
        fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
        <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
    </svg>+${value}%`;
    } else {
        element.classList.add('text-red-500');
        element.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
        class="bi bi-caret-down-fill" viewBox="0 0 16 16">
        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
    </svg>-${value}%`;
    }
}

loadChart();
