const ctx = document.getElementById('reservationChart').getContext('2d');
const reservationChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
        datasets: [{
            label: new Date().getFullYear(),
            data: document.getElementById('selectYearRes').value.split(','),
            backgroundColor: [
                'rgba(255, 0, 0, 1)'
            ]
        }]
    },
    options: {  
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
const selectYearRes = document.getElementById('selectYearRes');
selectYearRes.addEventListener('change',yearTracker);
function yearTracker(){
    const label = document.getElementById('selectYearRes').options[selectYearRes.selectedIndex].text;
    console.log(selectYearRes.value.split(','));
    reservationChart.data.datasets[0].label = label;
    reservationChart.data.datasets[0].data = selectYearRes.value.split(',');
    reservationChart.update();
}