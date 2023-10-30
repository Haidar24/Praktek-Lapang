import "./bootstrap";
import Chart from "chart.js/auto";

// Import Chart.js
import Chart from "chart.js/auto";

// Ambil elemen canvas
const ctx = document.getElementById("myChart").getContext("2d");

// Data Anda (contoh data berdasarkan waktu)
const labels = ["Jan", "Feb", "Mar", "Apr", "Mei"];
const data = [10, 20, 15, 30, 25];

// Inisialisasi grafik
const myChart = new Chart(ctx, {
    type: "line", // Jenis grafik adalah grafik garis
    data: {
        labels: labels, // Label sumbu x (waktu)
        datasets: [
            {
                label: "Perkembangan Data",
                data: data, // Data Anda
                borderColor: "rgba(75, 192, 192, 1)",
                borderWidth: 2,
                fill: false, // Jangan isi area di bawah grafik
            },
        ],
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
            },
        },
    },
});
