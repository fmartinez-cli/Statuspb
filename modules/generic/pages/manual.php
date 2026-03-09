<?php
// Initialize session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verify user authentication
require_once dirname(__DIR__) . '/bootstrap.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Manual - Test Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        .section-title {
            background-color: #212529;
            color: white;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 30px;
            text-align: center;
        }
        .manual-section {
            background: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .manual-section h3 {
            color: #2574A9;
            border-bottom: 2px solid #2574A9;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .manual-section h4 {
            color: #333;
            margin-top: 20px;
        }
        .code-block {
            background: #f4f4f4;
            border-left: 4px solid #2574A9;
            padding: 10px 15px;
            font-family: 'Courier New', monospace;
            margin: 10px 0;
        }
        .back-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="section-title">
            <h1><i class="fas fa-book me-3"></i>Test Dashboard - User Manual</h1>
        </div>

        <div id="stats" class="manual-section">
            <h3><i class="fas fa-chart-line me-2"></i>Times & Statistics Page</h3>
            <p>The Times page allows you to search and analyze Work Order statistics.</p>
            
            <h4>Features:</h4>
            <ul>
                <li><strong>Search by WO:</strong> Enter a 9-digit Work Order number to view detailed statistics</li>
                <li><strong>Recent WOs:</strong> Quick access to recently viewed Work Orders</li>
                <li><strong>Quick Overview:</strong> Total racks, active racks, and user statistics</li>
            </ul>
            
            <h4>How to use:</h4>
            <ol>
                <li>Enter a valid 9-digit Work Order number in the search box</li>
                <li>Click "Search" or press Enter</li>
                <li>You'll be redirected to the WO Statistics page with detailed information</li>
            </ol>
        </div>

        <div id="wo_stats" class="manual-section">
            <h3><i class="fas fa-chart-bar me-2"></i>WO Statistics Page</h3>
            <p>Detailed statistics for a specific Work Order.</p>
            
            <h4>Sections:</h4>
            <ul>
                <li><strong>Summary Cards:</strong> Total racks, racks with tests, average time, first/last test</li>
                <li><strong>Charts:</strong> Test status distribution (pie chart) and average time by model (bar chart)</li>
                <li><strong>Model Statistics:</strong> Performance metrics grouped by model type</li>
                <li><strong>Racks Detail Table:</strong> Complete list of all racks with test results and timings</li>
            </ul>
            
            <h4>Actions:</h4>
            <ul>
                <li><strong>Export to Excel:</strong> Download all data as an Excel file</li>
                <li><strong>Click on Serial Number:</strong> Opens detailed rack information modal</li>
                <li><strong>Search in table:</strong> Use the search box to filter racks</li>
            </ul>
        </div>

        <div id="export" class="manual-section">
            <h3><i class="fas fa-file-excel me-2"></i>Export Functionality</h3>
            <p>The export feature generates a comprehensive Excel file with all WO statistics.</p>
            
            <h4>Export includes:</h4>
            <ul>
                <li>General summary with dates and averages</li>
                <li>Test status distribution counts</li>
                <li>Model-based statistics</li>
                <li>Detailed rack table with all test results and comments</li>
                <li>Export metadata (date, user information)</li>
            </ul>
        </div>

        <div class="text-center mt-4 mb-5">
            <a href="stats.php" class="btn btn-primary"><i class="fas fa-arrow-left me-2"></i>Back to Stats</a>
            <a href="index.php" class="btn btn-secondary ms-2"><i class="fas fa-home me-2"></i>Home</a>
        </div>
    </div>

    <a href="stats.php" class="back-button btn btn-dark">
        <i class="fas fa-arrow-left me-2"></i>Back
    </a>
</body>
</html>