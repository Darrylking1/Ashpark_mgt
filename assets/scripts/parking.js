// Define an array to store parking spot information
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

];
// Function to initialize the parking table
document.addEventListener('DOMContentLoaded', function() { 
    initializeParkingTable();
});

function initializeParkingTable() {
    var parkingTableWrapper = document.querySelector('.table-container'); // Corrected selector
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

// Define the park function
function park(slots) {
    var statusElement = document.querySelector('#parkingTable tbody tr:nth-child(' + (parkingSpots.findIndex(function(spot) { return spot.slots === slots; }) + 1) + ') td:nth-child(2)');
    statusElement.textContent = 'Unavailable';

    var parkButton = statusElement.nextElementSibling.firstChild;
    parkButton.textContent = 'Unpark';

    // Simulate AJAX request with setTimeout
    setTimeout(function() {
        console.log('Parking successful');
    }, 1000);

    parkButton.removeEventListener('click', park);
    parkButton.addEventListener('click', function unparkHandler() {
        unpark(slots);
        parkButton.removeEventListener('click', unparkHandler);
    });
}

// Define the unpark function
function unpark(slots) {
    var statusElement = document.querySelector('#parkingTable tbody tr:nth-child(' + (parkingSpots.findIndex(function(spot) { return spot.slots === slots; }) + 1) + ') td:nth-child(2)');
    statusElement.textContent = 'Available';

    var parkButton = statusElement.nextElementSibling.firstChild;
    parkButton.textContent = 'Park';

    // Simulate AJAX request with setTimeout
    setTimeout(function() {
        console.log('Unparking successful');
    }, 1000);

    parkButton.removeEventListener('click', unpark);
    parkButton.addEventListener('click', function parkHandler() {
        park(slots);
        parkButton.removeEventListener('click', parkHandler);
    });
}