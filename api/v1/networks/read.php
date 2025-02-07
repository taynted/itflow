<?php

require_once('../validate_api_key.php');
require_once('../require_get_method.php');

// Specific network via ID (single)
if (isset($_GET['network_id'])) {
    $id = intval($_GET['network_id']);
    $sql = mysqli_query($mysqli, "SELECT * FROM networks WHERE network_id = '$id' AND network_client_id LIKE '$client_id' AND company_id = '$company_id'");

} elseif (isset($_GET['network_name'])) {
    // Network by name

    $name = mysqli_real_escape_string($mysqli, $_GET['network_name']);
    $sql = mysqli_query($mysqli, "SELECT * FROM networks WHERE network_name = '$name' AND network_client_id LIKE '$client_id' AND company_id = '$company_id' ORDER BY network_id LIMIT $limit OFFSET $offset");

} elseif (isset($_GET['client_id'])) {
    // Network via client ID

    $sql = mysqli_query($mysqli, "SELECT * FROM networks WHERE network_client_id LIKE '$client_id' AND company_id = '$company_id' ORDER BY network_id LIMIT $limit OFFSET $offset");

} else {
    // All networks

    $sql = mysqli_query($mysqli, "SELECT * FROM networks WHERE network_client_id LIKE '$client_id' AND company_id = '$company_id' ORDER BY network_id LIMIT $limit OFFSET $offset");
}

// Output
require_once("../read_output.php");
