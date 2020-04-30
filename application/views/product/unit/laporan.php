<!DOCTYPE html>
<html>

<head>
    <title><?= $title ?></title>
    <style type="text/css">
        table {
            border: 1px solid #e3e3e3;
            border-collapse: collapse;
            font-family: arial;
            color: #5E5B5C;
            margin: 0 auto;
            width: 100%;
        }

        thead th {
            text-align: left;
            padding: 10px;
        }

        tbody td {
            border-top: 1px solid #e3e3e3;
            padding: 10px;
        }

        tbody tr:nth-child(even) {
            background: #F6F5FA;
        }

        tbody tr:hover {
            background: #EAE9F5;
        }
    </style>
</head>

<body>
    <center>
        <h3>Data Unit</h3>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Unit Id</th>
                    <th>Barcode</th>
                    <th>Name</th>
                    <th>Category Id</th>
                    <th>Unit Id</th>
                    <th>Price</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($unit as $unt) : ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $unt->unit_id; ?></td>
                        <td><?= $unt->barcode; ?></td>
                        <td><?= $unt->name; ?></td>
                        <td><?= $unt->category_id; ?></td>
                        <td><?= $unt->unit_id; ?></td>
                        <td><?= $unt->price; ?></td>
                        <td><?= $unt->stock; ?></td>
                    </tr>
                    <?php $no++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </center>
</body>

</html>