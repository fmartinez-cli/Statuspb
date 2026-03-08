<?php
if(!isset($_REQUEST['pb'])){
    header("Location: index.php");
    exit;
}

require_once dirname(__DIR__) . '/bootstrap.php';

$variable = mysqli_real_escape_string($enlace, $_GET["pb"]);
$tr       = mysqli_real_escape_string($enlace, $_GET['tr']);

// Get rack information
$query = "SELECT r.*, m.display_name as model_name, m.color_code
          FROM racks r
          LEFT JOIN rack_models m ON r.model_id = m.id
          WHERE r.serial_number = '$variable'";
$result = mysqli_query($enlace, $query);
$rack = mysqli_fetch_assoc($result);

// set modal type based on session and rack existence
if (isset($_SESSION['Nombre'])) {
    $modal = $rack ? 1 : 2;
} else {
    $modal = $rack ? 3 : 4;
}

// Agregar Bootstrap CSS
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">';
echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">';

// styles personalized for modals
echo '<style>
    .squaredTwo {
        width: 20px;
        height: 20px;
        margin: 0 auto;
    }
    .squaredTwo input[type=checkbox] {
        width: 20px;
        height: 20px;
        cursor: pointer;
    }
    .squaredTwo input[type=checkbox]:disabled {
        cursor: not-allowed;
        opacity: 0.6;
    }
    .info {
        cursor: help;
        border-bottom: 1px dotted #666;
        position: relative;
    }
    .info span {
        display: none;
        position: absolute;
        background: #333;
        color: white;
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 12px;
        white-space: nowrap;
        z-index: 1000;
    }
    .info:hover span {
        display: block;
        bottom: 100%;
        left: 50%;
        transform: translateX(-50%);
        margin-bottom: 5px;
    }
    .tablamodal th, .tablaprueba th {
        background-color: #343a40;
        color: white;
    }
    .comentario-nota {
        background-color: #f8f9fa;
        border-left: 4px solid #2574A9;
        border-radius: 4px;
        padding: 15px;
        margin-bottom: 15px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .comentario-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
        padding-bottom: 5px;
        border-bottom: 1px dashed #dee2e6;
    }
    .comentario-tecnico {
        font-weight: bold;
        color: #2574A9;
    }
    .comentario-reloj {
        background-color: #e9ecef;
        padding: 2px 8px;
        border-radius: 12px;
        font-size: 0.85em;
    }
    .comentario-fecha {
        color: #6c757d;
        font-size: 0.85em;
    }
    .comentario-texto {
        white-space: pre-wrap;
        word-break: break-word;
    }
</style>';

switch ($modal) {
    case 1: // With session and rack
        
         $test_query = "SELECT tr.*, tc.test_name, tc.description
                   FROM test_results tr
                   JOIN test_catalog tc ON tr.test_code = tc.test_code
                   WHERE tr.rack_id = {$rack['id']}
                   ORDER BY tr.sequence_order";
    $test_result = mysqli_query($enlace, $test_query);
    $tests = [];
    while ($t = mysqli_fetch_assoc($test_result)) {
        $tests[] = $t;
    }
    ?>
    <div class="container-fluid p-3">
        <h3 class="text-center text-primary mb-3">
            <?php echo htmlspecialchars($rack['serial_number']); ?>
            <small class="text-muted d-block"><?php echo htmlspecialchars($rack['location_code']); ?></small>
        </h3>
        
        <!-- rack information -->
        <div class="card mb-3">
            <div class="card-header bg-dark text-white">
                <i class="fas fa-server me-2"></i>Rack Information
            </div>
            <div class="card-body">
                <table class="table table-bordered table-sm">
                    <tr>
                        <th class="bg-light">WO</th>
                        <td><?php echo htmlspecialchars($rack['work_order'] ?? 'N/A'); ?></td>
                        <th class="bg-light">SKU</th>
                        <td><?php echo htmlspecialchars($rack['sku'] ?? 'N/A'); ?></td>
                    </tr>
                    <tr>
                        <th class="bg-light">Model</th>
                        <td colspan="3">
                            <span class="badge" style="background-color: <?php echo $rack['color_code'] ?? '#6c757d'; ?>; color: white;">
                                <?php echo htmlspecialchars($rack['model_name'] ?? 'Available'); ?>
                            </span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- test form -->
        <form method="post" action="update_tests.php" id="testForm">
            <input type="hidden" name="rack_id" value="<?php echo $rack['id']; ?>">
            <input type="hidden" name="location" value="<?php echo htmlspecialchars($tr); ?>">
            
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-flask me-2"></i>Test Sequence
                </div>
                <div class="card-body p-0">
                    <table class="table table-bordered mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th style="width: 5%">#</th>
                                <th style="width: 25%">Test</th>
                                <th style="width: 15%">Status</th>
                                <th style="width: 15%">Technician</th>
                                <th style="width: 20%">Start Time</th>
                                <th style="width: 20%">End Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $all_passed = true;
                            $previous_passed = true;
                            foreach ($tests as $index => $test): 
                                $is_passed = ($test['status'] == 'pass');
                                $is_blocked = !$previous_passed && !$is_passed;
                                $is_current = $previous_passed && !$is_passed;
                                
                                if (!$is_passed) $all_passed = false;
                            ?>
                            <tr class="<?php 
                                if ($is_passed) echo 'table-success';
                                elseif ($is_blocked) echo 'table-secondary';
                                elseif ($is_current) echo 'table-warning';
                            ?>">
                                <td class="text-center"><?php echo $test['sequence_order']; ?></td>
                                <td>
                                    <strong><?php echo htmlspecialchars($test['test_name']); ?></strong>
                                    <br>
                                    <small class="text-muted"><?php echo htmlspecialchars($test['description'] ?? ''); ?></small>
                                </td>
                                <td class="text-center">
                                    <?php if ($is_current): ?>
                                        <select name="status[<?php echo $test['id']; ?>]" class="form-select form-select-sm">
                                            <option value="waiting" <?php echo ($test['status'] == 'waiting') ? 'selected' : ''; ?>>Waiting</option>
                                            <option value="running" <?php echo ($test['status'] == 'running') ? 'selected' : ''; ?>>Running</option>
                                            <option value="fail" <?php echo ($test['status'] == 'fail') ? 'selected' : ''; ?>>Fail</option>
                                            <option value="pass">Pass</option>
                                        </select>
                                    <?php elseif ($is_passed): ?>
                                        <span class="badge bg-success">Pass</span>
                                    <?php elseif ($is_blocked): ?>
                                        <span class="badge bg-secondary">Blocked</span>
                                    <?php else: ?>
                                        <span class="badge bg-warning text-dark"><?php echo ucfirst($test['status']); ?></span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <?php 
                                    if ($test['technician_clock']) {
                                        // Get technician name
                                        $tech_query = mysqli_query($enlace, "SELECT full_name FROM users WHERE clock_number = '{$test['technician_clock']}'");
                                        $tech = mysqli_fetch_assoc($tech_query);
                                        echo '<span class="info" title="' . $test['technician_clock'] . '">' . 
                                             ($tech['full_name'] ?? $test['technician_clock']) . 
                                             '<span class="badge bg-secondary">Clock: ' . $test['technician_clock'] . '</span></span>';
                                    } else {
                                        echo '—';
                                    }
                                    ?>
                                </td>
                                <td class="text-center"><?php echo $test['start_time'] ? date('H:i:s', strtotime($test['start_time'])) : '—'; ?></td>
                                <td class="text-center"><?php echo $test['end_time'] ? date('H:i:s', strtotime($test['end_time'])) : '—'; ?></td>
                            </tr>
                            <?php 
                                $previous_passed = $is_passed;
                            endforeach; 
                            ?>
                        </tbody>
                    </table>
                </div>
                <?php if (!$all_passed): ?>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update Tests
                    </button>
                </div>
                <?php endif; ?>
            </div>
        </form>

        <?php if ($all_passed): ?>
        <!-- Clean rack button when all tests passed -->
        <div class="mt-3">
            <form method="post" action="clean_rack.php" onsubmit="return confirm('Are you sure you want to clean this rack? All test data will be archived.')">
                <input type="hidden" name="rack_id" value="<?php echo $rack['id']; ?>">
                <button type="submit" class="btn btn-success w-100">
                    <i class="fas fa-check-circle me-2"></i>All Tests Passed - Clean Rack
                </button>
            </form>
        </div>
        <?php endif; ?>

        <!-- Comments section -->
        <?php
        $comments_query = mysqli_query($enlace, "SELECT c.*, u.full_name 
                                                 FROM comments c
                                                 LEFT JOIN users u ON c.user_clock = u.clock_number
                                                 WHERE c.rack_id = {$rack['id']}
                                                 ORDER BY c.created_at DESC");
        
        if (mysqli_num_rows($comments_query) > 0):
        ?>
        <div class="card mt-3">
            <div class="card-header bg-info text-white">
                <i class="fas fa-comments me-2"></i>Comments
            </div>
            <div class="card-body">
                <?php while ($comment = mysqli_fetch_assoc($comments_query)): ?>
                <div class="comentario-nota">
                    <div class="comentario-header">
                        <span class="comentario-tecnico">
                            <i class="fas fa-user me-2"></i><?php echo htmlspecialchars($comment['full_name'] ?? 'Unknown'); ?>
                        </span>
                        <span class="comentario-reloj">
                            <i class="far fa-id-card me-1"></i><?php echo $comment['user_clock']; ?>
                        </span>
                    </div>
                    <div class="comentario-texto"><?php echo nl2br(htmlspecialchars($comment['comment'])); ?></div>
                    <div class="mt-2 text-end">
                        <small class="comentario-fecha">
                            <i class="far fa-clock me-1"></i><?php echo date('Y-m-d H:i', strtotime($comment['created_at'])); ?>
                        </small>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
        <?php endif; ?>

        <!-- Add comment form -->
        <div class="card mt-3">
            <div class="card-header bg-secondary text-white">
                <i class="fas fa-pen me-2"></i>Add Comment
            </div>
            <div class="card-body">
                <form method="post" action="add_comment.php">
                    <input type="hidden" name="rack_id" value="<?php echo $rack['id']; ?>">
                    <div class="mb-3">
                        <textarea name="comment" class="form-control" rows="2" 
                                  placeholder="Write your comment..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane me-2"></i>Submit Comment
                    </button>
                </form>
            </div>
        </div>
    </div>
    <?php
    break;

    case 2: // With session but no rack → Registration form
        ?>
         <div class="container-fluid p-3">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-plus-circle me-2"></i>Register New Rack</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="register_rack.php" id="formregistro">
                        <div class="mb-3">
                            <label class="form-label">Serial Number</label>
                            <input type="text" class="form-control" name="serial" 
                                   value="<?php echo htmlspecialchars($variable); ?>" 
                                   placeholder="Enter serial number" required>
                            <small class="text-muted">Serial number format: RXXXXXXXXXXXXXXF (16 characters)</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Location</label>
                            <input type="text" class="form-control" value="<?php echo htmlspecialchars($tr); ?>" readonly>
                            <input type="hidden" name="location" value="<?php echo htmlspecialchars($tr); ?>">
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Work Order</label>
                                <input type="text" class="form-control" name="wo" required 
                                       pattern="[0-9]{9}" maxlength="9" placeholder="123456789">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">SKU</label>
                                <input type="text" class="form-control" name="sku" required 
                                       pattern="[A-Za-z0-9]{6,10}" maxlength="10" placeholder="SKU">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Model</label>
                            <select name="model" class="form-select" required>
                                <option value="">Select a model</option>
                                <?php
                                // Obtener modelos A, B, D (excluyendo C)
                                $models = mysqli_query($enlace, "SELECT id, model_code, display_name, color_code 
                                                                 FROM rack_models 
                                                                 WHERE is_active = 1 AND model_code IN ('A', 'B', 'D')
                                                                 ORDER BY model_code");
                                while ($model = mysqli_fetch_assoc($models)) {
                                    $selected = ($model['model_code'] == 'A') ? 'selected' : '';
                                    echo "<option value='{$model['id']}' style='background-color: {$model['color_code']}; color: white;' $selected>";
                                    echo "{$model['display_name']}";
                                    echo "</option>";
                                }
                                // Agregar opción "Available" (modelo por defecto)
                                echo "<option value='available' style='background-color: #3e3e3e; color: white;'>Available</option>";
                                ?>
                            </select>
                        </div>
                        <input type="hidden" name="bay" value="<?php echo substr($tr, 3, 1); ?>">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Register Rack
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
        break;

    case 3: // Without session but with rack → Show rack info in read-only mode
        ?>
         <div class="container-fluid p-3">
            <h3 class="text-center text-primary mb-3"><?php echo htmlspecialchars($rack['serial_number']); ?></h3>
            
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <i class="fas fa-info-circle me-2"></i>Rack Information (Read Only)
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th class="bg-light">WO</th>
                            <td><?php echo htmlspecialchars($rack['work_order'] ?? 'N/A'); ?></td>
                            <th class="bg-light">SKU</th>
                            <td><?php echo htmlspecialchars($rack['sku'] ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th class="bg-light">Model</th>
                            <td colspan="3"><?php echo htmlspecialchars($rack['model_name'] ?? 'Unknown'); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <?php
        break;

    case 4: // Without session and no rack → Prompt to login
        ?>
        <div class="container-fluid p-3">
            <div class="alert alert-warning text-center">
                <i class="fas fa-exclamation-triangle fa-2x mb-3"></i>
                <h4>Login Required</h4>
                <p>You need to login to register a new rack.</p>
                <hr>
                <a href="#modal" class="btn btn-primary">
                    <i class="fas fa-sign-in-alt me-2"></i>Login
                </a>
            </div>
        </div>
        <?php
        break;
}
?>