<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .tabs {
            display: flex;
            margin-bottom: 20px;
        }
        .tab {
            flex: 1;
            text-align: center;
            padding: 10px;
            cursor: pointer;
            border: 1px solid #ddd;
            border-bottom: none;
        }
        .tab.active {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }
        .status-bar {
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin: 20px 0;
        }
        .status-step {
            text-align: center;
        }
        .status-step .circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #28a745;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 5px;
        }
        .status-step p {
            margin: 0;
            font-size: 14px;
        }
        .details {
            margin-bottom: 20px;
        }
        .details .section {
            margin-bottom: 20px;
        }
        .details .section h2 {
            margin: 0;
            font-size: 18px;
            color: #333;
            border-left: 4px solid #ffcd39;
            padding-left: 10px;
        }
        .details .section p {
            margin: 5px 0;
            padding-left: 14px;
        }
        .details .section h3 {
            margin: 0;
            font-size: 16px;
            padding-left: 14px;
        }
        .delivered {
            font-weight: bold;
            padding-left: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="tabs">
            <div class="tab active">ORDER DETAILS</div>
            <div class="tab">TRACK ORDER</div>
        </div>
        <div class="status-bar">
            <div class="status-step">
                <div class="circle">&#10003;</div>
                <p>Placed</p>
            </div>
            <div class="status-step">
                <div class="circle">&#10003;</div>
                <p>Approved</p>
            </div>
            <div class="status-step">
                <div class="circle">&#10003;</div>
                <p>Processed</p>
            </div>
            <div class="status-step">
                <div class="circle">&#10003;</div>
                <p>Shipped</p>
            </div>
            <div class="status-step">
                <div class="circle">&#10003;</div>
                <p>Delivered</p>
            </div>
        </div>
        <div class="details">
            <div class="section">
                <h2>APPROVAL</h2>
                <p><strong>Placed:</strong> January 29, 2024 17:00 - <span>Your Order Is Successfully Placed</span></p>
                <p><strong>On Hold:</strong> 29 January, 2024 17:00 - <span>Your Order Status Is On Hold</span></p>
            </div>
            <div class="section">
                <h2>PROCESSING</h2>
                <p><strong>Processing:</strong> 29 January, 2024 17:02 - <span>Your Order Status Is Processing</span></p>
            </div>
            <div class="section">
                <h2>DELIVERED</h2>
                <p class="delivered">Your order is completed and delivered on 29 January, 2024 17:02</p>
            </div>
        </div>
    </div>
</body>
</html>
