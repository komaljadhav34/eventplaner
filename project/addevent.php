<?php
$services = [
    "Catering" => [500, 3000],
    "Orchestra" => [8000, 60000],
    "Band and Baraat" => [8000, 60000],
    "Photography/Videography" => [10000, 75000],
    "Wedding Cake" => [5000, 30000],
    "Invitations" => [2000, 30000],
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selected_services = isset($_POST['services']) ? $_POST['services'] : [];
    $total_cost = 0;

    foreach ($selected_services as $service) {
        if (isset($services[$service])) {
            $total_cost += $services[$service][0]; // Basic plan cost for now
        }
    }

    echo "<script>alert('Total Estimated Cost: Rs.$total_cost');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 20px;
        }
        .container {
            max-width: 500px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            font-weight: bold;
        }
        .service-item {
            display: flex;
            justify-content: space-between;
        }
        .total-cost {
            font-weight: bold;
            margin-top: 10px;
        }
        input[type="submit"] {
            background: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Book Your Event</h2>
    <form method="post" onsubmit="return validateDate()">
        <label>Event Type:</label>
        <select required>
            <option value="">Select event type</option>
            <option>Wedding</option>
            <option>Birthday</option>
            <option>Corporate Event</option>
        </select>

        <label>Theme:</label>
        <select required>
            <option value="">Select a theme</option>
            <option>Elegant</option>
            <option>Classic</option>
            <option>Modern</option>
        </select>

        <label>Services:</label>
        <div id="services">
            <?php foreach ($services as $name => $price): ?>
                <div class="service-item">
                    <label>
                        <input type="checkbox" name="services[]" value="<?= $name ?>" onchange="updateCost()"> <?= $name ?>
                    </label>
                    <span>Rs. <?= $price[0] ?> - Rs. <?= $price[1] ?></span>
                </div>
            <?php endforeach; ?>
        </div>

        <label>Event Date:</label>
        <input type="date" id="event-date" name="event_date" required>

        <label>Location:</label>
        <input type="text" name="location" required>

        <label>Description:</label>
        <textarea name="description"></textarea>

        <p class="total-cost">Total Cost: Rs. <span id="total-cost">0</span></p>

        <input type="submit" value="Submit">
    </form>
</div>

<script>
    const servicePrices = <?= json_encode($services); ?>;
    function updateCost() {
        let total = 0;
        document.querySelectorAll('input[name="services[]"]:checked').forEach(service => {
            total += servicePrices[service.value][0];
        });
        document.getElementById('total-cost').innerText = total;
    }

    function validateDate() {
        let dateInput = document.getElementById('event-date').value;
        let selectedDate = new Date(dateInput);
        let today = new Date();
        let maxDate = new Date();
        maxDate.setMonth(today.getMonth() + 3);

        if (selectedDate < today || selectedDate > maxDate) {
            alert("Please select a date within the next 3 months.");
            return false;
        }
        return true;
    }
</script>

</body>
</html>
