<section class="content-header">
    <h1>Stock In
        <small>Barang Masuk / Penambahan Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i></a></li>
        <li>Transaction</li>
        <li class="active">Stock In</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Add Stock In</h3>
            <div class="pull-right">
                <a href="<?= site_url('category'); ?>" class="btn btn-warning">
                    <i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>

        <div class="box-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <form action="<?= site_url('stock/in'); ?>" method="POST">
                        <div class="form-group <?= form_error('date') ? 'has-error' : null; ?>">
                            <label for="">Date *</label>
                            <input type="date" name="date" class="form-control" value="<?= date('Y-m-d') ?>" required>
                            <span class="help-block"><?= form_error('date'); ?></span>
                        </div>
                        <div>
                            <label for="barcode">Barcode</label>
                        </div>
                        <div class="form-group input-group">
                            <input name="item_id" id="item_id" class="form-control" type="hidden">
                            <input type="text" name="barcode" id="barcode" class="form-control" required autofocus>
                            <span class="input-group-btn">
                                <button type="button" name="" id="" class="btn btn-info btn" data-toggle="modal" data-target="#modal-item">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <div class="form-group <?= form_error('item_name') ? 'has-error' : null; ?>">
                            <label for="">Item Name</label>
                            <input type="text" name="item_name" id="item_name" class="form-control" readonly>
                            <span class="help-block"><?= form_error('item_name'); ?></span>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-8">
                                    <label for="unit_name">Item unit</label>
                                    <input type="text" name="unit_name" id="unit_name" class="form-control" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="stock">Initial Stock *</label>
                                    <input type="text" name="stock" id="stock" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group <?= form_error('datail') ? 'has-error' : null; ?>">
                            <label for="detail">Detail *</label>
                            <input type="text" name="detail" id="detail" class="form-control" placeholder="Tambahan stock produk" required>
                            <span class="help-block"><?= form_error('detail'); ?></span>
                        </div>
                        <div class="form-group <?= form_error('datail') ? 'has-error' : null; ?>">
                            <label for="supplier">Supplier</label>
                            <select name="supplier" id="supplier" class="form-control">
                                <option value="">- Pilih -</option>
                            </select>
                            <span class="help-block"><?= form_error('supplier'); ?></span>
                        </div>
                        <div class="form-group <?= form_error('datail') ? 'has-error' : null; ?>">
                            <label for="qty">Qty</label>
                            <input type="text" name="qty" id="qty" class="form-control" required>
                            <span class="help-block"><?= form_error('qty'); ?></span>
                        </div>
                        <div class="from-group">
                            <button type="submit" name="in_add" class="btn btn-success"><i class="fa fa-paper-plane"></i> Save</button>
                            <button type="reset" class="btn" style="margin-left: 10px"><i class="fa fa-undo"></i> Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>