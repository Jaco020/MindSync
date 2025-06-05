document.addEventListener('DOMContentLoaded', () => {
    const chartContainer = document.getElementById('moodChart');

    try {
        const moodData = JSON.parse(chartContainer.dataset.mood);

        if (moodData?.length) {
            const labels = moodData.map(({ date }) =>
                new Date(date).toLocaleDateString('pl-PL', { day: '2-digit', month: '2-digit' })
            );

            const data = moodData.map(({ mood }) => mood);

            new Chart(chartContainer, {
                type: 'line',
                data: {
                    labels,
                    datasets: [{
                        label: 'Nastrój',
                        data,
                        borderColor: '#14b8a6',
                        backgroundColor: 'rgba(20, 184, 166, 0.05)',
                        fill: true,
                        borderWidth: 2,
                        tension: 0.3,
                        pointBackgroundColor: '#14b8a6',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 2,
                        pointRadius: 4,
                        pointHoverRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        intersect: false,
                        mode: 'index'
                    },
                    plugins: {
                        legend: { display: false }
                    },
                    layout: {
                        padding: 10
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 5,
                            ticks: {
                                color: '#9ca3af',
                                stepSize: 1,
                                font: { size: 12 }
                            },
                            grid: {
                                color: 'rgba(156, 163, 175, 0.1)',
                                drawBorder: false
                            }
                        },
                        x: {
                            ticks: {
                                color: '#9ca3af',
                                maxTicksLimit: 8,
                                font: { size: 11 }
                            },
                            grid: { display: false }
                        }
                    }
                }
            });
        } else {
            chartContainer.parentElement.innerHTML =
                '<div class="flex items-center justify-center h-full text-gray-500"><p>Brak danych do wyświetlenia</p></div>';
        }
    } catch (e) {
        console.error('Błąd parsowania danych wykresu', e);
    }
});
