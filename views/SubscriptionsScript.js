window.onload = function() {
    // Function to fetch subscription data from PHP file and display in table
    function fetchSubscriptionData() {
        fetch('Subscriptions.php')
        .then(response => response.json())
        .then(data => {
            const subscriptionTable = document.getElementById('subscriptionTable');
            subscriptionTable.innerHTML = ''; // Clear existing table content

            // Create table header
            const tableHeader = `
                <table>
                    <tr>
                        <th>Subscription ID</th>
                        <th>User ID</th>
                        <th>Plan ID</th>
                        <th>Day Issued</th>
                        <th>Day Expiring</th>
                    </tr>
                </table>
            `;
            
            subscriptionTable.innerHTML = tableHeader;

            // Populate table with subscription data
            const table = document.querySelector('table');
            data.forEach(subscription => {
                const row = table.insertRow();
                row.innerHTML = `
                    <td>${subscription.subscriptionID}</td>
                    <td>${subscription.userID}</td>
                    <td>${subscription.planID}</td>
                    <td>${subscription.dayIssued}</td>
                    <td>${subscription.dayExpiring}</td>
                `;
            });
        })
        .catch(error => console.error('Error fetching subscription data:', error));
    }

    // Fetch subscription data initially
    fetchSubscriptionData();

    // Fetch subscription data every 5 seconds
    setInterval(fetchSubscriptionData, 5000);
};
