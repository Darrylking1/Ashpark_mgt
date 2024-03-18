// Add event listeners to each card
document.getElementById('parkingSlotsCard').addEventListener('click', function() {
    // Perform action or navigate to the desired page for parking slots
    console.log('Clicked on Parking Slots');
     Example: window.location.href = '../views/slots.php';
});

document.getElementById('totalUsersCard').addEventListener('click', function() {
    // Perform action or navigate to the desired page for total users
    console.log('Clicked on Total Users');
              window.location.href = '../views/user.php';
});

document.getElementById('parkingAvailability').addEventListener('click', function() {
    // Perform action or navigate to the desired page for peak parking periods
    console.log('Clicked on parking Availability');
              window.location.href = '../views/analytics.php';
});
