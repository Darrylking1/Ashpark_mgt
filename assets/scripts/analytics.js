const ctx = document.getElementById('lineChart').getContext("2d");

new Chart(ctx, {
  type: 'line',
  data: {
    labels: ['Mon', 'Tues', 'Wed', 'Thurs', 'Fri', 'Sat', 'Sun'],
    datasets: [{
      label: 'Peak Parking Period',
      data: [80, 60, 70, 80, 90, 100, 70], 
      borderWidth: 1,
      borderColor: 'blue', 
      backgroundColor: 'rgba(0, 0, 255, 0.1)', 
      pointBackgroundColor: 'blue' 
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
      y: {
        beginAtZero: true,
        title: {
          display: true,
          text: 'Number of Parked Cars'
        }
      },
      x: {
        title: {
          display: true,
          text: 'Day of the Week'
        }
      }
    }
  }
});