<?php
//fetch.php
$connect = mysqli_connect("localhost", "estudiantespucv_dpd", "DpdPucv20xx", "estudiantespucv_dpd");
$columns = array("docentes.id", "docentes.unidadAcademica", "docentes.docente", "docentes.cargo",
"docentes.contratoEscalafon", "docentes.correo");

$query = "SELECT * FROM docentes";

$query .= " WHERE ";

if (isset($_POST["search"]["value"])) {
$query .= '(docentes.id LIKE "%' . $_POST["search"]["value"] . '%" ';
$query .= 'OR docentes.unidadAcademica LIKE "%' . $_POST["search"]["value"] . '%" ';
$query .= 'OR docentes.docente LIKE "%' . $_POST["search"]["value"] . '%" ';
$query .= 'OR docentes.cargo LIKE "%' . $_POST["search"]["value"] . '%" ';
$query .= 'OR docentes.contratoEscalafon LIKE "%' . $_POST["search"]["value"] . '%" ';
$query .= 'OR docentes.correo LIKE "%' . $_POST["search"]["value"] . '%") ';
}

if (isset($_POST["order"])) {
$query .= 'ORDER BY ' . $columns[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' 
';
} else {
$query .= 'ORDER BY id DESC ';
}

$query1 = '';

if ($_POST["length"] != -1) {
$query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while ($row = mysqli_fetch_array($result)) {
$sub_array = array();
$sub_array[] = $row["id"];
$sub_array[] = '<div contenteditable class="update" data-id="' . $row["id"] . '" data-column="unidadAcademica">' . utf8_encode($row["unidadAcademica"]) . '</div>';
$sub_array[] = '<div contenteditable class="update" data-id="' . $row["id"] . '" data-column="docente">' . utf8_encode($row["docente"]) . '</div>';
$sub_array[] = '<div contenteditable class="update" data-id="' . $row["id"] . '" data-column="cargo">' . $row["cargo"] . '</div>';
$sub_array[] = '<div contenteditable class="update" data-id="' . $row["id"] . '" data-column="contratoEscalafon">' . $row["contratoEscalafon"] . '</div>';
$sub_array[] = '<div contenteditable class="update" data-id="' . $row["id"] . '" data-column="correo">' . $row["correo"] . '</div>';
$sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="' . $row["id"] . '">Eliminar</button>';
$data[] = $sub_array;
}

function get_all_data($connect) {
$query = "SELECT * FROM docentes";
$result = mysqli_query($connect, $query);
return mysqli_num_rows($result);
}

$output = array(
"draw" => intval($_POST["draw"]),
"recordsTotal" => get_all_data($connect),
"recordsFiltered" => $number_filter_row,
"data" => $data
);

echo json_encode($output);
?>
