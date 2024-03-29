<?php
$connect = mysqli_connect("localhost", "estudiantespucv_dpd", "DpdPucv20xx", "estudiantespucv_dpd");
mysqli_set_charset($connect, "utf8");
$query = "SELECT * FROM unidadAcademica";
$result = mysqli_query($connect, $query);
?>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Programa Calidad de Servicios</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="../librerias/bootstrap-3.3.6/dist/css/bootstrap.min.css" />
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
        <style type="text/css">
            .anotherhover tbody tr:hover td {
                background-color: #D3D3D3;
            }
            .table-striped tbody tr:nth-child(odd){
                background-color: #ECF7FF;
            }
            .dataTables_length select {
            }
            .dataTables_filter label {
                background-color: #fa7f28;
                color: #FFF;
                width: 200px;
                margin-right: 10px;
                padding-left: 10px;
            }
            @media screen and (max-width: 600px) {
  table {
    border: 0;
  }

  table caption {
    font-size: 1.3em;
  }

  table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }

  table tr {
    border-bottom: 3px solid #ddd;
    display: block;
    margin-bottom: .625em;
  }

  table td {
    border-bottom: 1px solid #ddd;
    display: block;
    font-size: .8em;
    text-align: right;
  }

  td:nth-of-type(1) { font-weight: bold; }
  td:nth-of-type(1):before { content: "unidad"; }
  td:nth-of-type(2):before { content: "nombre"; }
  td:nth-of-type(3):before { content: "email"; }

  table td::before {
    /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
  }

  table td:last-child {
    border-bottom: 0;
  }
}
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <table id="listado" style="font-size: 12px; width: 100%;" class="table anotherhover table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="background-color: #337ab7;">
                            <select name="category" id="category" class="form-control" style="background-color: #fa7f28; color: #FFF">
                                <option value="">Todas las Unidades</option>
                                <?php
                                while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["id"] . '">' . $row["nombre"] . '</option>';
                                }
                                ?>
                            </select>
                        </th>
                        <th style="background-color: #337ab7; color: #FFF">NOMBRE</th>
                        <th style="background-color: #337ab7; color: #FFF">E-MAIL INSTITUCIONAL</th>
                    </tr>
                </thead>
            </table>
        </div>
        <script type="text/javascript" src="librerias/bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
    </body>
</html>
<script type="text/javascript" language="javascript" >
    $(document).ready(function () {


        load_data();
        function load_data(is_category)
        {
            $('#listado').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                },
                "lengthMenu": [15, 25, 50, 100],
                "processing": true,
                "serverSide": true,
                "order": false,
                "ordering": false,
                "ajax": {
                    url: "fetch2.php",
                    type: "POST",
                    data: {is_category: is_category}
                },
                "columnDefs": [
                    {
                        "targets": [2],
                        "orderable": false
                    }
                ]
            });
        }

        $(document).on('change', '#category', function () {
            var category = $(this).val();
            $('#listado').DataTable().destroy();
            if (category != '')
            {
                load_data(category);
            } else
            {
                load_data();
            }
        });
    });


</script>
