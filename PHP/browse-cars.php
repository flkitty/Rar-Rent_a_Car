<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            height: 100vh;
        }
        .sidebar {
            width: 250px;
            background: #2c3e50;
            color: white;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }
        .sidebar h2 {
            font-size: 18px;
            margin-bottom: 15px;
            text-align: center;
        }
        .sidebar select {
            padding: 8px;
            width: 100%;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
        }
        .content {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }
        .car-list {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        .car-item {
            background: white;
            padding: 10px;
            box-shadow: 0px 0px 5px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            border-radius: 5px;
            width: calc(33.333% - 10px);
        }
        .car-item img {
            width: 80px;
            height: 50px;
            margin-right: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Filter Cars</h2>
        <select id="make">
            <option value="">Make</option>
        </select>
        <select id="model">
            <option value="">Model</option>
        </select>
        <select id="year">
            <option value="">Year</option>
        </select>
        <select id="color">
            <option value="">Color</option>
        </select>
        <select id="condition">
            <option value="">Condition</option>
            <option value="New">New</option>
            <option value="Used">Used</option>
            <option value="Certified Pre-Owned">Certified Pre-Owned</option>
        </select>
        <select id="fuel_type">
            <option value="">Fuel Type</option>
            <option value="Gasoline">Gasoline</option>
            <option value="Diesel">Diesel</option>
            <option value="Electric">Electric</option>
            <option value="Hybrid">Hybrid</option>
        </select>
        <select id="availability_status">
            <option value="">Availability</option>
            <option value="available">Available</option>
            <option value="rented">Rented</option>
            <option value="maintenance">Maintenance</option>
        </select>
    </div>
    <div class="content">
        <h2>Available Cars</h2>
        <div class="car-list" id="carList">
            <!-- Cars will be displayed here dynamically -->
        </div>
    </div>
</body>
</html>
