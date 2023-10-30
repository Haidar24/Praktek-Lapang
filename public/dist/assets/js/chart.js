var ctx = document.getElementById("dar").getContext("2d");

var myChart = new Chart(ctx, {
    type: "bar",
    data: {
        labels: dataSuratMasuk.map((item) => item.bulan + "/" + item.tahun),
        datasets: [
            {
                label: "Statistics",
                data: dataSuratMasuk.map((item) => item.jumlah), // Menggunakan data jumlah dari dataSuratMasuk
                borderWidth: 2.5, // Ubah ini menjadi 2.5 saja
                backgroundColor: "#6777ef",
                borderColor: "#6777ef",
                pointBackgroundColor: "#ffffff",
                pointRadius: 4,
            },
        ],
    },
    options: {
        legend: {
            display: false,
        },
        scales: {
            yAxes: [
                {
                    gridLines: {
                        drawBorder: false,
                        color: "#f2f2f2",
                    },
                    ticks: {
                        beginAtZero: true,
                        stepSize: 100,
                    },
                },
            ],
            xAxes: [
                {
                    ticks: {
                        display: false,
                    },
                    gridLines: {
                        display: false,
                    },
                },
            ],
        },
    },
});
