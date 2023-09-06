import Chart from 'chart.js/auto';

document.addEventListener('DOMContentLoaded', function(){
    const mothers = JSON.parse(document.getElementById('mothers_data').textContent);

    const mothersData = mothers.map(mother => ({
        id: mother.id,
        firstname: mother.firstname
    }));

    const chartData = {
        labels: mothersData.map(row => row.id),
        datasets: [
            {
                label: 'Names',
                data: mothersData.map(row => row.firstname)
            }
        ]
    };

    const ctx = document.getElementById('progress').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: chartData
    });
});
