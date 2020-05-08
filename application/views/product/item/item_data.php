<section class="content-header">
    <h1>Items
        <small>Tabel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Item</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages'); ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Item</h3>
            <div class="pull-right">
                <a href="<?= site_url('item/add'); ?>" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add</a>
                <a href="<?= site_url('item/laporan_pdf'); ?>" class="btn btn-primary">
                    <i class="fa fa-print"></i> Print</a>
            </div>
        </div>

        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="dtable">
                <thead>
                    <tr>
                        <th style="width: 5%;">#</th>
                        <th>Barcode</th>
                        <th>Name / Title</th>
                        <th>Address</th>
                        <th>Image</th>
                        <th>Duration</th>
                        <th>Group Size</th>
                        <th>Overview</th>
                        <th>Language</th>
                        <th>Tour Type</th>
                        <th>Tour Category</th>
                        <th>Price</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($row->result() as $key => $data) : ?>
                        <tr>
                            <td style="width: 5%;"><?= $no++; ?>.</td>
                            <td>
                                <?= $data->barcode ?> <br>
                                <a href="<?= site_url('item/barcode_qrcode/' . $data->item_id); ?>" class="btn btn-default btn-xs">
                                    Generate<i class="fa fa-barcode"></i>
                                </a>
                            </td>
                            <td><?= $data->name ?></td>
                            <td><?= $data->address ?></td>
                            <td>
                                <?php if ($data->image != null) { ?>
                                    <img src="<?= base_url('uploads/item/' . $data->image) ?>" style="width:100px">
                                <?php } ?>
                            </td>
                            <td><?= $data->duration ?></td>
                            <td><?= $data->groupsize ?></td>
                            <td><?= $data->overview ?></td>
                            <td><?= $data->language ?></td>
                            <td><?= $data->type_name ?></td>
                            <td><?= $data->category_name ?></td>
                            <td><?= $data->price ?></td>
                            <td class="text-center" width="160px">
                                <a href="<?= site_url('item/edit/' . $data->item_id); ?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"></i> Edit
                                </a><br>
                                <form action="<?= site_url('item/delete'); ?>" method="POST" class="">
                                    <input type="hidden" name="item_id" value="<?= $data->item_id ?>">
                                    <button class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this data?')">
                                        <i class="fa fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>