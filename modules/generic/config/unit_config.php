<?php
// Configuration of the unit
define('UNIT_ID', 1); // ID in business_units table
define('DEFAULT_BAY_COUNT', 10);
define('LOCATION_PREFIX', 'TR');

/**
 * Get available rack models for this unit
 * @param mysqli $enlace Database connection
 * @param int $unit_id Unit ID (defaults to UNIT_ID)
 * @return array Associative array of models keyed by model_code
 */
function getAvailableModels($enlace, $unit_id = UNIT_ID) {
    $query = "SELECT id, model_code, display_name, color_code 
              FROM rack_models 
              WHERE unit_id = $unit_id AND is_active = 1
              ORDER BY model_code";
    $result = mysqli_query($enlace, $query);
    $models = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $models[$row['model_code']] = $row;
    }
    return $models;
}

/**
 * Get test sequence for a specific model
 * @param mysqli $enlace Database connection
 * @param int $model_id Model ID
 * @return array Array of tests in sequence order
 */
function getTestSequence($enlace, $model_id) {
    $query = "SELECT tc.test_code, tc.test_name, tc.description, mts.sequence_order
              FROM model_test_sequence mts
              JOIN test_catalog tc ON mts.test_code = tc.test_code
              WHERE mts.model_id = $model_id
              ORDER BY mts.sequence_order";
    $result = mysqli_query($enlace, $query);
    $sequence = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $sequence[] = $row;
    }
    return $sequence;
}

/**
 * Get model ID by its code
 * @param mysqli $enlace Database connection
 * @param string $model_code Model code (A, B, C, D)
 * @param int $unit_id Unit ID
 * @return int|null Model ID or null if not found
 */
function getModelIdByCode($enlace, $model_code, $unit_id = UNIT_ID) {
    $query = "SELECT id FROM rack_models 
              WHERE unit_id = $unit_id AND model_code = '$model_code'";
    $result = mysqli_query($enlace, $query);
    if ($row = mysqli_fetch_assoc($result)) {
        return $row['id'];
    }
    return null;
}
?>