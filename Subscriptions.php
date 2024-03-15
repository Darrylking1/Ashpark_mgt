<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscriptions Page</title>
    <link rel="stylesheet" href="SubscriptionStyles.css">
</head>
<body>
    <div class="container">
     <div class="header--wrapper">
        <h1>Subscriptions</h1>
     </div>
        <table id="subscriptions-table">
            <thead>
                <tr>
                    <th>Subscription ID</th>
                    <th>User ID</th>
                    <th>Plan ID</th>
                    <th>Day Issued</th>
                    <th>Day Expiring</th>
                </tr>
            </thead>
            <tbody id="subscriptions-body">
                
            </tbody>
        </table>
    </div>
    <script src="SubscriptionsScript.js"></script>
    
    <div>
        <?php
            $host = "localhost";
            $dbname = "ashpark_mgt.sql";
            $username = "root"; 
            $password = ""; 
            
            $conn = new mysqli('localhost', 'root', '', 'ashpark_mgt');
            

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch data from the database
            $sql = "SELECT * FROM subscription_info";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "SubscriptionID: " . $row["subscription_id"]. " UserID: " . $row["user_id"]. " PlanID: " . $row["plan_id"]. " DayIssued: " . $row["day_issued"]. " ExpiryDate: " . $row["day_expiration"]. "<br>";
                }
            } else {
                echo "0 results";
            }

            $conn->close();
        ?>
    </div>
</body>
</html>
