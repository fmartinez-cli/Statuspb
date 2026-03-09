<?php
/**
 * Project Structure Viewer
 * Run this file to see current project organization
 */

echo "<!DOCTYPE html>
<html>
<head>
    <title>Project Structure Viewer</title>
    <style>
        body { font-family: monospace; background: #1e1e1e; color: #d4d4d4; padding: 20px; }
        .container { max-width: 1200px; margin: 0 auto; }
        h1 { color: #569cd6; }
        h2 { color: #4ec9b0; margin-top: 30px; }
        .folder { color: #4fc1ff; font-weight: bold; }
        .file { color: #ce9178; }
        .tree { margin-left: 20px; border-left: 1px dashed #404040; padding-left: 20px; }
        .item { margin: 5px 0; }
        .branch { color: #6a9955; }
        .note { background: #252526; padding: 10px; border-radius: 5px; margin-top: 20px; }
        .success { color: #89d185; }
        .warning { color: #dcdcaa; }
        .error { color: #f48771; }
        table { border-collapse: collapse; width: 100%; background: #252526; }
        th, td { border: 1px solid #3c3c3c; padding: 8px; text-align: left; }
        th { background: #094771; color: white; }
        .stats { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px; margin: 20px 0; }
        .stat-card { background: #252526; padding: 15px; border-radius: 5px; border-left: 4px solid #569cd6; }
        .stat-number { font-size: 24px; font-weight: bold; color: #4ec9b0; }
        .stat-label { color: #9cdcfe; }
    </style>
</head>
<body>
    <div class='container'>";

echo "<h1>📁 Project Structure Viewer</h1>";

// Define root path
$root = __DIR__;
echo "<p class='branch'>Root: <strong>$root</strong></p>";

// Statistics
$stats = [
    'total_files' => 0,
    'total_folders' => 0,
    'php_files' => 0,
    'js_files' => 0,
    'css_files' => 0,
    'sql_files' => 0,
    'image_files' => 0,
    'other_files' => 0
];

/**
 * Recursive function to scan directory
 */
function scanDirectory($dir, $prefix = '', $isLast = true, &$stats = null) {
    if (!is_dir($dir)) return '';
    
    $files = scandir($dir);
    $output = '';
    $count = count(array_diff($files, ['.', '..']));
    $i = 0;
    
    foreach ($files as $file) {
        if ($file == '.' || $file == '..') continue;
        
        $i++;
        $path = $dir . DIRECTORY_SEPARATOR . $file;
        $isCurrentLast = ($i == $count);
        
        // Build tree prefix
        $branch = $isLast ? '    ' : '│   ';
        if ($i == $count) {
            $treePrefix = $prefix . ($isLast ? '    ' : '    ');
            $line = $prefix . '└── ';
        } else {
            $treePrefix = $prefix . ($isLast ? '    ' : '│   ');
            $line = $prefix . '├── ';
        }
        
        // Check if it's a directory
        if (is_dir($path)) {
            $stats['total_folders']++;
            $output .= "<div class='item'>$line<span class='folder'>📁 $file/</span></div>";
            $output .= scanDirectory($path, $treePrefix, $isCurrentLast, $stats);
        } else {
            $stats['total_files']++;
            
            // Count by extension
            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            switch ($ext) {
                case 'php': $stats['php_files']++; $icon = '🐘'; break;
                case 'js': $stats['js_files']++; $icon = '📜'; break;
                case 'css': $stats['css_files']++; $icon = '🎨'; break;
                case 'sql': $stats['sql_files']++; $icon = '🗄️'; break;
                case 'jpg': case 'jpeg': case 'png': case 'gif': case 'ico': 
                    $stats['image_files']++; $icon = '🖼️'; break;
                default: $stats['other_files']++; $icon = '📄'; break;
            }
            
            $output .= "<div class='item'>$line<span class='file'>$icon $file</span></div>";
        }
    }
    
    return $output;
}

// Statistics cards
echo "<div class='stats'>";
echo "<div class='stat-card'><span class='stat-number'>" . ($stats['total_folders'] + $stats['total_files']) . "</span><br><span class='stat-label'>Total Items</span></div>";
echo "<div class='stat-card'><span class='stat-number'>" . $stats['total_folders'] . "</span><br><span class='stat-label'>Folders</span></div>";
echo "<div class='stat-card'><span class='stat-number'>" . $stats['total_files'] . "</span><br><span class='stat-label'>Files</span></div>";
echo "</div>";

// Scan and display structure
echo "<h2>📂 Directory Tree</h2>";
echo "<div class='tree'>";
echo scanDirectory($root, '', true, $stats);
echo "</div>";

// File type statistics
echo "<h2>📊 File Type Distribution</h2>";
echo "<table>";
echo "<tr><th>Type</th><th>Count</th><th>Percentage</th></tr>";
$file_types = [
    'PHP Files' => $stats['php_files'],
    'JavaScript Files' => $stats['js_files'],
    'CSS Files' => $stats['css_files'],
    'SQL Files' => $stats['sql_files'],
    'Image Files' => $stats['image_files'],
    'Other Files' => $stats['other_files']
];

foreach ($file_types as $type => $count) {
    if ($stats['total_files'] > 0) {
        $percentage = round(($count / $stats['total_files']) * 100, 1);
    } else {
        $percentage = 0;
    }
    echo "<tr><td>$type</td><td>$count</td><td>$percentage%</td></tr>";
}
echo "</table>";

// Check for required files
echo "<h2>✅ Required Files Check</h2>";
echo "<table>";
echo "<tr><th>File</th><th>Status</th><th>Path</th></tr>";

$required_files = [
    'Database Connection' => 'conexion.php',
    'Root Index' => 'index.php',
    'Git Ignore' => '.gitignore',
    'License' => 'LICENSE',
    'Notice' => 'NOTICE',
    'Readme' => 'README.md',
    'Generic Bootstrap' => 'modules/generic/bootstrap.php',
    'Generic Functions' => 'modules/generic/config/functions.php',
    'Generic Queries' => 'modules/generic/config/queries.php',
    'Bay1 Page' => 'modules/generic/pages/bay1.php',
    'Modals Page' => 'modules/generic/pages/modals.php',
    'Bay Table' => 'modules/generic/pages/bay_table.php'
];

foreach ($required_files as $name => $path) {
    $full_path = $root . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $path);
    if (file_exists($full_path)) {
        $status = "<span class='success'>✅ Found</span>";
    } else {
        $status = "<span class='error'>❌ Missing</span>";
    }
    echo "<tr><td>$name</td><td>$status</td><td>$path</td></tr>";
}
echo "</table>";

// Database configuration check
echo "<h2>🗄️ Database Configuration</h2>";
$conexion_path = $root . DIRECTORY_SEPARATOR . 'conexion.php';
if (file_exists($conexion_path)) {
    $content = file_get_contents($conexion_path);
    if (strpos($content, 'factory_test_system') !== false) {
        echo "<p class='success'>✅ Using database: factory_test_system</p>";
    } else {
        echo "<p class='warning'>⚠️ conexion.php exists but may not be using factory_test_system</p>";
    }
} else {
    echo "<p class='error'>❌ conexion.php not found</p>";
}

// Bootstrap check
echo "<h2>🚀 Bootstrap Configuration</h2>";
$bootstrap_path = $root . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR . 'generic' . DIRECTORY_SEPARATOR . 'bootstrap.php';
if (file_exists($bootstrap_path)) {
    echo "<p class='success'>✅ bootstrap.php found</p>";
    
    // Check if bootstrap includes required files
    $content = file_get_contents($bootstrap_path);
    $checks = [
        'conexion.php' => strpos($content, 'conexion.php') !== false,
        'functions.php' => strpos($content, 'functions.php') !== false,
        'queries.php' => strpos($content, 'queries.php') !== false
    ];
    
    foreach ($checks as $file => $found) {
        if ($found) {
            echo "<p class='success'>  ✅ Includes $file</p>";
        } else {
            echo "<p class='warning'>  ⚠️ Does not include $file</p>";
        }
    }
} else {
    echo "<p class='error'>❌ bootstrap.php not found</p>";
}

// Project size
echo "<h2>📏 Project Size</h2>";
function folderSize($dir) {
    $size = 0;
    foreach (glob(rtrim($dir, '/').'/*', GLOB_NOSORT) as $each) {
        $size += is_file($each) ? filesize($each) : folderSize($each);
    }
    return $size;
}

$total_size = folderSize($root);
$size_mb = round($total_size / 1024 / 1024, 2);
$size_kb = round($total_size / 1024, 2);

echo "<p><strong>Total Size:</strong> $size_mb MB ($size_kb KB)</p>";

// Recommendations
echo "<h2>💡 Recommendations</h2>";
echo "<div class='note'>";
echo "<ul>";
if (!file_exists($root . DIRECTORY_SEPARATOR . '.gitignore')) {
    echo "<li class='warning'>⚠️ Create .gitignore file</li>";
}
if (!file_exists($root . DIRECTORY_SEPARATOR . 'LICENSE')) {
    echo "<li class='warning'>⚠️ Add LICENSE file (Apache 2.0 recommended)</li>";
}
if (!file_exists($root . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR . 'generic' . DIRECTORY_SEPARATOR . 'bootstrap.php')) {
    echo "<li class='warning'>⚠️ Create bootstrap.php for generic module</li>";
}
if ($stats['php_files'] < 10) {
    echo "<li class='info'>ℹ️ Project seems small - verify all files are in place</li>";
}
echo "</ul>";
echo "</div>";

echo "</div></body></html>";
?>