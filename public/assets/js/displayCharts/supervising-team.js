//DATA

//.....................finalMark.......................//
const data = {
    labels:  cData.teams ,
    datasets: [
        {
            label: 'معدل الفريق وعدد القادة ',
            data: cData.teamsFinalMark,
            borderColor: '#CC6666',
            backgroundColor: '#F9E675',
            pointStyle: 'circle',
            pointRadius: 10,
            pointHoverRadius: 15
        }
    ]
};
new Chart("finalMark-leaders", {

    // CONFIG
    type: 'bar',
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


//.....................follow_up_post.......................//
//DATA
const weeklyPostsData1 = {
    labels: ['نشر', 'لم ينشر', 'تم بالنيابة', 'نقص في المعايير'],
    datasets: [
        {
            label: 'منشور المتابعة',
            data: cData.follow_up_post, //[1, 2, 1, 0],
            backgroundColor: ['rgb(75, 192, 192)', 'rgb(255, 99, 132)', 'rgb(255, 159, 64)', 'rgb(255, 205, 86)'],
        }
    ]
};

new Chart("weekly-posts-1", {

    // CONFIG
    type: 'doughnut',
    data: weeklyPostsData1,
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Chart.js Doughnut Chart'
              }
        }
    },
});
/*
const weeklyPostsData2 = {
    labels: ['عبارة تشجيعية', ' ذكر رقم الإسبوع والشهر', 'تاغ للقادة', 'نشره الأحد في وقت مناسب', 'صورة مناسبة','سؤال واضح عن الإنجاز','تعليق منفصل لكل قائد'],
    
    datasets: [
        {
            label: 'منشور مشاكل التقيم',
            data: [6, 1, 10, 8,1,3,1],
            backgroundColor: ['rgb(75, 192, 192)', 'rgb(255, 99, 132)', 'rgb(255, 159, 64)', 'rgb(255, 205, 86)', 'rgb(255, 0, 0)', 'rgb(0, 255, 0)', 'rgb(0, 0, 255)'],
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
*/
//......................mark_problems_post......................//
//DATA
const weeklyPostsData2 = {
    labels: ['نشر', 'لم ينشر', 'تم بالنيابة', 'نقص في المعايير'],
    datasets: [
        {
            label: 'منشور مشاكل التقييم',
            data: cData.mark_problems_post, //[1, 2, 1, 0],
            backgroundColor: ['rgb(75, 192, 192)', 'rgb(255, 99, 132)', 'rgb(255, 159, 64)', 'rgb(255, 205, 86)'],
        }
    ]
};

new Chart("weekly-posts-2", {

    // CONFIG
    type: 'doughnut',
    data: weeklyPostsData2,
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Chart.js Doughnut Chart'
              }
        }
    },
});

//......................returning_ambassadors_post......................//
//DATA
const monthlyPostsData1 = {
    labels: ['تم المتابعة', 'تم المتابعة بعد 3 أيام', 'لم تتم المتابعة'],
    datasets: [
        {
            label: 'منشور العائدون',
            data: cData.returning_ambassadors_post, //[1, 2, 1, 0],
            backgroundColor: ['rgb(75, 192, 192)', 'rgb(255, 99, 132)', 'rgb(255, 159, 64)', 'rgb(255, 205, 86)'],
        }
    ]
};

new Chart("monthly-posts-1", {

    // CONFIG
    type: 'doughnut',
    data: monthlyPostsData1,
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Chart.js Doughnut Chart'
              }
        }
    },
});


//......................new_ambassadors_post......................//
//DATA
const monthlyPostsData2 = {
    labels: ['تم المتابعة', 'نقص في المتابعة'],
    datasets: [
        {
            label: 'منشور عضو جديد',
            data: cData.new_ambassadors_post, //[1, 2, 1, 0],
            backgroundColor: ['rgb(75, 192, 192)', 'rgb(255, 99, 132)', 'rgb(255, 159, 64)', 'rgb(255, 205, 86)'],
        }
    ]
};

new Chart("monthly-posts-2", {

    // CONFIG
    type: 'doughnut',
    data: monthlyPostsData2,
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Chart.js Doughnut Chart'
              }
        }
    },
});

//......................withdrawn_ambassadors_post......................//
//DATA
const monthlyPostsData3 = {
    labels: ['تم المتابعة', 'تم المتابعة وتنبيه غير المتفاعلين', 'لم تتم المتابعة'],
    datasets: [
        {
            label: 'منشور المنسحبون ',
            data: cData.withdrawn_ambassadors_post, //[1, 2, 1, 0],
            backgroundColor: ['rgb(75, 192, 192)', 'rgb(255, 99, 132)', 'rgb(255, 159, 64)', 'rgb(255, 205, 86)'],
        }
    ]
};

new Chart("monthly-posts-3", {

    // CONFIG
    type: 'doughnut',
    data: monthlyPostsData3,
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Chart.js Doughnut Chart'
              }
        }
    },
});

//.....................discussion_post.......................//
//DATA
const newsPostsData1 = {
    labels: ['نشر', 'لم ينشر', 'لا يوجد', 'نقص في المعايير'],
    datasets: [
        {
            label: 'النقاش المنهجي',
            data: cData.discussion_post, //[1, 2, 1, 0],
            backgroundColor: ['rgb(75, 192, 192)', 'rgb(255, 99, 132)', 'rgb(255, 159, 64)', 'rgb(255, 205, 86)'],
        }
    ]
};

new Chart("news-posts-1", {

    // CONFIG
    type: 'doughnut',
    data: newsPostsData1,
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Chart.js Doughnut Chart'
              }
        }
    },
});

//.....................leader_training.......................//
//DATA
const newsPostsData2 = {
    labels: ['نشر', 'لم ينشر', 'لا يوجد', 'نقص في المعايير'],
    datasets: [
        {
            label: 'دورة القيادة',
            data: cData.leader_training, //[1, 2, 1, 0],
            backgroundColor: ['rgb(75, 192, 192)', 'rgb(255, 99, 132)', 'rgb(255, 159, 64)', 'rgb(255, 205, 86)'],
        }
    ]
};

new Chart("news-posts-2", {

    // CONFIG
    type: 'doughnut',
    data: newsPostsData2,
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Chart.js Doughnut Chart'
              }
        }
    },
});