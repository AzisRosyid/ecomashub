const moneyFlowChart = document.getElementById('moneyFlow');
const netIncomeChart = document.getElementById('netIncome');
const orderChart = document.getElementById('order');
const eventCalendar = document.getElementById('eventCalendar');
const chartAlpha = 0.1;

const currentDate = new Date();
// const calendarDate = new Date();

const chartLabels = [
    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
];

const moneyFlowCanvas = moneyFlowChart.querySelector('canvas');
const netIncomeCanvas = netIncomeChart.querySelector('canvas');
const orderCanvas = orderChart.querySelector('canvas');

const clearChart = () => {
    return new Promise((resolve, reject) => {
        try {
            if (Chart.getChart(moneyFlowCanvas) && Chart.getChart(netIncomeCanvas) && Chart.getChart(orderCanvas)) {
                Chart.getChart(moneyFlowCanvas).destroy();
                Chart.getChart(netIncomeCanvas).destroy();
                Chart.getChart(orderCanvas).destroy();
            }
            resolve();
        } catch (error) {
            reject(error);
        }
    });
};

const loadChart = () => {
    return new Promise((resolve, reject) => {
        try {
            const currentMonth = currentDate.getMonth() + 1;
            clearChart().then(s => fetch(window.location.origin + `/dashboard?api&month=${currentMonth}`)
                .then(response => response.json())
                .then(data => {
                    const { net_income, money_flow, orders, events } = data;

                    const profit = Array.from({ length: currentMonth }, (_, index) => {
                        const entry = net_income.profit_data.find(item => item.month === index + 1);
                        return entry ? entry.total : 0;
                    });
                    const loss = Array.from({ length: currentMonth }, (_, index) => {
                        const entry = net_income.loss_data.find(item => item.month === index + 1);
                        return entry ? entry.total : 0;
                    });
                    const order = Array.from({ length: currentMonth }, (_, index) => {
                        const entry = orders.data.find(item => item.month === index + 1);
                        return entry ? entry.total : 0;
                    });

                    const netIncome = profit.map((p, index) => p - (loss[index] || 0));

                    percentageMode(money_flow.percentage, money_flow.comparison, moneyFlowChart.querySelector('.chart-percentage'));
                    percentageMode(net_income.percentage, net_income.comparison, netIncomeChart.querySelector('.chart-percentage'));
                    percentageMode(orders.percentage, orders.comparison, orderChart.querySelector('.chart-percentage'));

                    new Chart(moneyFlowCanvas, {
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

                    new Chart(netIncomeCanvas, {
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

                    new Chart(orderCanvas, {
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

                    loadCalendar(events);

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

// Calendar
const loadCalendar = (events) => {
    eventCalendar.innerHTML = "";
    events.data.forEach(st => {
        const defaultImg = eventCalendar.getAttribute('defaultImg');
        eventCalendar.innerHTML += `
        <div class="flex py-3 border-b">
                <img src="${defaultImg}" alt=""
                    class="w-12 h-12">
                <div class="ms-3">
                    <p class="font-fredokaBold">${st.title}</p>
                    <p>Mulai: ${st.date_start}, Selesai: ${st.date_end}</p>
                    <p>Lokasi: ${st.location}</p>
                </div>
            </div>
        `;
    });

    currentDate.setDate(1);

    const monthDays = document.querySelector(".days");

    const lastDay = new Date(
        currentDate.getFullYear(),
        currentDate.getMonth() + 1,
        0
    ).getDate();

    const prevLastDay = new Date(
        currentDate.getFullYear(),
        currentDate.getMonth(),
        0
    ).getDate();

    const firstDayIndex = currentDate.getDay();

    const lastDayIndex = new Date(
        currentDate.getFullYear(),
        currentDate.getMonth() + 1,
        0
    ).getDay();

    const nextDays = 7 - lastDayIndex - 1;

    const months = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
    ];

    document.querySelector(".date h1").innerHTML = months[currentDate.getMonth()];

    document.querySelector(".date p").innerHTML = new Date().toDateString();

    let days = "";

    for (let x = firstDayIndex; x > 0; x--) {
        days += `<div class="text-slate-400 col-span-1 cursor-pointer hover:bg-slate-500 hover:text-white text-center h-[37.212px] items-center flex justify-center">${prevLastDay - x + 1}</div>`;
    }

    for (let i = 1; i <= lastDay; i++) {
        if (
            i === new Date().getDate() &&
            currentDate.getMonth() === new Date().getMonth()
        ) {
            days += `<div class="text-white bg-green-600 col-span-1 cursor-pointer hover:bg-slate-500 hover:text-white text-center h-[37.212px] items-center flex justify-center">${i}</div>`;
        } else {
            days += `<div class="col-span-1 cursor-pointer hover:bg-slate-500 hover:text-white text-center h-[37.212px] items-center flex justify-center">${i}</div>`;
        }
    }

    for (let j = 1; j <= nextDays; j++) {
        days += `<div class="text-slate-400 col-span-1 cursor-pointer hover:bg-slate-500 hover:text-white text-center h-[37.212px] items-center flex justify-center">${j}</div>`;
        monthDays.innerHTML = days;
    }
};

document.querySelector(".prev").addEventListener("click", () => {
    currentDate.setMonth(currentDate.getMonth() - 1);
    loadChart();
});

document.querySelector(".next").addEventListener("click", () => {
    currentDate.setMonth(currentDate.getMonth() + 1);
    loadChart();
});

loadChart();
