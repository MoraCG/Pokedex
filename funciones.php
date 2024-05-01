<?php
function obtenerIdTipo($conn, $tipo) {
    $sql = "SELECT id FROM tipo WHERE nombre = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $tipo);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $tipo_id = $row['id'];
    $stmt->close();
    return $tipo_id;
}