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
                    <th>Name</th>
                    <th>Address</th>
                    <th>Duration</th>
                    <th>Group Size</th>
                    <th>Tour Type</th>
                    <th>Tour Category</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($unit as $un) : ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $un->unit_id; ?></td>
                        <td><?= $un->name; ?></td>
                        <td><?= $un->address; ?></td>
                        <td><?= $un->duration; ?></td>
                        <td><?= $un->groupsize; ?></td>
                        <td><?= $un->tourtype; ?></td>
                        <td><?= $un->tourcategory; ?></td>
                    </tr>
                    <?php $no++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </center>
</body>

</html>