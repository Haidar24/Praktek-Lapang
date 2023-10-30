
<script>
    
    var data = {
        labels: ['Label 1', 'Label 2', 'Label 3', 'Label 4', 'Label 5'],
        datasets: [{
            label: 'Data',
            data: [10, 20, 30, 40, 50], // Isi data sesuai kebutuhan Anda
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 1
        }]
    };

    // Pengaturan konfigurasi grafik
    var options = {
        responsive: true,
        maintainAspectRatio: false
    };

    // Membuat grafik
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar', // Ganti jenis grafik sesuai kebutuhan (bar, line, pie, dll.)
        data: data,
        options: options
    });
</script>
