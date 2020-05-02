<section class="content-header">
    <h1>Units
        <small>Tabel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Units</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Barcode Generator <i class="fa fa-barcode"></i></h3>
            <div class="pull-right">
                <a href="<?= site_url('unit'); ?>" class="btn btn-warning btn-flat btn-sm">
                    <i class="fa fa-undo"></i> Back</a>
            </div>
        </div>
        <div class="box-body">
            <?php
            $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
            echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->barcode, $generator::TYPE_CODE_128)) . '"style="width:200px">';
            ?>
            <br>
            <?= $row->barcode ?>
            <br><br>
            <a href="<?= site_url('unit/barcode_print/' . $row->unit_id) ?>" target="_blank" class="btn btn-default btn-flat btn-sm">
                <i class="fa fa-print"></i> Print</a>
        </div>
    </div>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">QR-Code Generator <i class="fa fa-qrcode"></i></h3>
        </div>
        <div class="box-body">
            <?php
            $qrCode = new Endroid\QrCode\QrCode('Life is too short to be generating QR codes');
            $qrCode->writeFile('uploads/qr-code/unit-' . $row->barcode . '.png');
            ?>
            <img src="<?= base_url('uploads/qr-code/unit-' . $row->barcode . '.png') ?>" style="width:200px">
            <br>
            <?= $row->barcode ?>
            <br><br>
            <a href="<?= site_url('unit/qrcode_print/' . $row->unit_id) ?>" target="_blank" class="btn btn-default btn-flat btn-sm">
                <i class="fa fa-print"></i> Print</a>
        </div>
    </div>
</section>