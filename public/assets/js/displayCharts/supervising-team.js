//DATA

const data = {
    labels: ['Super1 - 10 leaders', 'Super2 - 10 leaders', 'Super3 - 10 leaders', 'Super4 - 10 leaders', 'Super5 - 10 leaders', 'Super6 - 10 leaders'],
    datasets: [
        {
            label: 'معدل الفريق وعدد القادة ',
            data: [100, 75, 85, 81.5, 90, 98.3],
            borderColor: '#CC6666',
            backgroundColor: '#F9EFEF',
            pointStyle: 'circle',
            pointRadius: 10,
            pointHoverRadius: 15
        }
    ]
};
new Chart("finalMark-leaders", {

    // CONFIG
    type: 'line',
    data: data,
    options: {
        responsive: true,
        plugins: {
            title: {
                display: true,
                text: (ctx) => 'Point Style: ' + ctx.chart.data.datasets[0].pointStyle,
            }
        }
    }
});

//-------------------------------------------------------------------------------------//

//DATA

const weeklyPostsData1 = {
    //labels: ['نشر', 'لم ينشر', 'تم بالنيابة', 'نقص في المعايير'],
    datasets: [
        {
            label: 'منشور المتابعة',
            data: [100, 0, 0, 0],
            backgroundColor: ['rgb(75, 192, 192)', 'rgb(255, 99, 132)', 'rgb(255, 159, 64)', 'rgb(255, 205, 86)'],
        }
    ]
};

new Chart("weekly-posts-1", {

    // CONFIG
    type: 'pie',
    data: weeklyPostsData1,
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Chart.js Pie Chart'
            }
        }
    },
});

const weeklyPostsData2 = {
    // labels: ['نشر', 'لم ينشر', 'تم بالنيابة', 'نقص في المعايير'],
    datasets: [
        {
            label: 'منشور مشاكل التقيم',
            data: [0, 0, 0, 100],
            backgroundColor: ['rgb(75, 192, 192)', 'rgb(255, 99, 132)', 'rgb(255, 159, 64)', 'rgb(255, 205, 86)'],
        }
    ]
};

new Chart("weekly-posts-2", {

    // CONFIG
    type: 'pie',
    data: weeklyPostsData2,
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Chart.js Pie Chart'
            }
        }
    },
});
