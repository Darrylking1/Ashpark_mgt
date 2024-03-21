// Check if the user is already parked
function isUserParked(slot) {
    var parkedSlot = sessionStorage.getItem('parkedSlot');
    return parkedSlot !== null && parkedSlot !== slot;
}

// Store the user's parked slot in session storage
function storeParkedSlot(slot) {
    sessionStorage.setItem('parkedSlot', slot);
}

// Clear the parked slot from session storage
function clearParkedSlot() {
    sessionStorage.removeItem('parkedSlot');
}

var parkingSpots = [
    { slots: 'PN001', status: 'Available' },
    { slots: 'PN002', status: 'Available' },
    { slots: 'PN003', status: 'Available' },
    { slots: 'PN004', status: 'Available' },
    { slots: 'PN005', status: 'Available' },
    { slots: 'PN006', status: 'Available' },
    { slots: 'PN007', status: 'Available' },
    { slots: 'PN008', status: 'Available' },
    { slots: 'PN009', status: 'Available' },
    { slots: 'PN010', status: 'Available' },
    { slots: 'PN011', status: 'Available' },
    { slots: 'PN012', status: 'Available' },
    { slots: 'PN013', status: 'Available' },
    { slots: 'PN014', status: 'Available' },
    { slots: 'PN015', status: 'Available' },
    { slots: 'PN016', status: 'Available' },
    { slots: 'PN017', status: 'Available' },
    { slots: 'PN018', status: 'Available' },
    { slots: 'PN019', status: 'Available' },
    { slots: 'PN020', status: 'Available' }
    // Add more parking spots as needed
];

// Function to initialize the parking table
document.addEventListener('DOMContentLoaded', function() { 
    initializeParkingTable();
});

function initializeParkingTable() {
    var parkingTableWrapper = document.querySelector('.table-container'); 
    parkingTableWrapper.classList.add('tabular-wrapper');

    var parkingTable = document.createElement('table');
    parkingTable.classList.add('table-container');
    
    // Create table header
    var thead = document.createElement('thead');
    var headerRow = document.createElement('tr');
    var headers = ['Slots', 'Status', 'Action'];
    headers.forEach(function(headerText) {
        var header = document.createElement('th');
        header.textContent = headerText;
        headerRow.appendChild(header);
    });
    thead.appendChild(headerRow);
    parkingTable.appendChild(thead);

    // Create table body
    var tbody = document.createElement('tbody');
    // Loop through the parkingSpots array and populate the table rows
    parkingSpots.forEach(function(spot) {
        var row = document.createElement('tr');

        // Create cells for slot number and status
        var slotCell = document.createElement('td');
        slotCell.textContent = spot.slots;
        row.appendChild(slotCell);

        var statusCell = document.createElement('td');
        statusCell.textContent = spot.status;
        row.appendChild(statusCell);

        var actionCell = document.createElement('td');
        var parkButton = document.createElement('button');
        parkButton.textContent = 'Park';
        parkButton.addEventListener('click', function() {
            park(spot.slots); // Pass the slot to the park function
        });
        actionCell.appendChild(parkButton);
        row.appendChild(actionCell);

        tbody.appendChild(row);
    });
    parkingTable.appendChild(tbody);

    parkingTableWrapper.appendChild(parkingTable);
}

// Call the initializeParkingTable function when the page loads
window.addEventListener('load', initializeParkingTable);

// Define the park function
function park(slots) {
    // Check if the user is already parked
    if (isUserParked()) {
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: 'You are already parked in another slot. Please unpark before parking again.'
        });
        return;
    }    

    // Store the parked slot in session storage
    storeParkedSlot(slots);

    // Update status in the HTML table
    var statusElement = document.querySelector('.table-container tbody tr:nth-child(' + (parkingSpots.findIndex(function(spot) { return spot.slots === slots; }) + 1) + ') td:nth-child(2)');
    statusElement.textContent = 'Unavailable';

    // Simulate AJAX request to update the database
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../actions/update_checkin.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log('Parking successful');
        } else {
            console.error('Error occurred while parking');
        }
    };
    xhr.send(JSON.stringify({ slots: slots, action: 'park' }));

    // Change button text and behavior
    var parkButton = statusElement.nextElementSibling.firstChild;
    parkButton.textContent = 'Unpark';

    // Update event listener to unpark function
    parkButton.removeEventListener('click', park);
    parkButton.addEventListener('click', function unparkHandler() {
        unpark(slots);
        parkButton.removeEventListener('click', unparkHandler);
    });
}

// Define the unpark function
function unpark(slots) {
    // Clear the parked slot from session storage
    clearParkedSlot();

    // Update status in the HTML table
    var statusElement = document.querySelector('.table-container tbody tr:nth-child(' + (parkingSpots.findIndex(function(spot) { return spot.slots === slots; }) + 1) + ') td:nth-child(2)');
    statusElement.textContent = 'Available';

    // Simulate AJAX request to update the database
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../actions/update_checkin.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log('Unparking successful');
        } else {
            console.error('Error occurred while unparking');
        }
    };
    xhr.send(JSON.stringify({ slots: slots, action: 'unpark' }));

    // Change button text and behavior
    var parkButton = statusElement.nextElementSibling.firstChild;
    parkButton.textContent = 'Park';

    // Update event listener to park function
    parkButton.removeEventListener('click', unpark);
    parkButton.addEventListener('click', function parkHandler() {
        park(slots);
        parkButton.removeEventListener('click', parkHandler);
    });
}

    // Function to fetch parking availability data from the server
    function fetchParkingData() {
        // Make an AJAX request to fetch parking data
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '../actions/get_availability_parking.php', true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.onload = function() {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
                var parkingData = JSON.parse(xhr.responseText);
                updateParkingTable(parkingData);
            } else {
                console.error('Error occurred while fetching parking data');
            }
        };
        xhr.send();
    }

   


    // Call fetchParkingData function initially and then periodically
    fetchParkingData();
    setInterval(fetchParkingData, 5000); 