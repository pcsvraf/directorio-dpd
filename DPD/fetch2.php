<?php
$connect = mysqli_connect("localhost", "udb_dpdpucv", "c9we85hm", "db_dpdpucv");
mysqli_set_charset($connect, "utf8");
$column = array("docentes.id", "docentes.unidadAcademica", "docentes.idUnidad", "docentes.docente",
                "docentes.email");
$query = "
 SELECT * FROM docentes 
 INNER JOIN unidadAcademica ON unidadAcademica.id = docentes.idUnidad 
 ";
$query .= " WHERE ";
if (isset($_POST["is_category"])) {
    $query .= "docentes.idUnidad = '" . $_POST["is_category"] . "' AND ";
}
if (isset($_POST["search"]["value"])) {
    $query .= '(docentes.unidadAcademica LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR docentes.docente LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR docentes.email LIKE "%' . $_POST["search"]["value"] . '%") ';
}

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $column[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
    $query .= 'ORDER BY unidadAcademica.id ';
}

$query1 = '';

if ($_POST["length"] != 1) {
    $query1 .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while ($row = mysqli_fetch_array($result)) {
    $sub_array = array();
    $sub_array[] = $row["unidadAcademica"];
    $sub_array[] = $row["docente"];
    $sub_array[] = $row["email"];
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
