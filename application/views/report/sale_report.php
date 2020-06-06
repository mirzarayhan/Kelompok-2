<section class="content-header">
    <h1>Sale Report
        <small>Tabel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Sale</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Sale</h3>
        </div>

        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Invoice</th>
                        <th>Date</th>
                        <th>Customer</th>
                        <th>Total</th>
                        <th>Discount</th>
                        <th>Grand Total</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($row->result() as $key => $data) : ?>
                        <tr>
                            <td style="width: 5%;"><?= $no++; ?>.</td>
                            <td><?= $data->invoice ?></td>
                            <td><?= indo_date($data->date) ?></td>
                            <td><?= $data->customer_id == null ? "Umum" : $data->customer_name?></td>
                            <td class="text-right"><?= indo_currency($data->total_price) ?></td>
                            <td class="text-right"><?= indo_currency($data->discount) ?></td>
                            <td class="text-right"><?= indo_currency($data->final_price) ?></td>
                            <td class="text-center" width="200px">
                                <button class="btn btn-default btn-xs">Detail</button>
                                <a href="<?= site_url('sale/cetak/' . $data->sale_id); ?>" target="_blank" class="btn btn-info btn-xs">
                                    <i class="fa fa-print"></i> Print
                                </a>
                                <a href="<?= site_url('sale/delete/' . $data->sale_id); ?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i> Delete
                                </a>
                               
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>