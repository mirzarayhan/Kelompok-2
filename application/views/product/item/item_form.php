<section class="content-header">
    <h1>Items
        <small>Table</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Items Table</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages'); ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page); ?> Items</h3>
            <div class="pull-right">
                <a href="<?= site_url('item'); ?>" class="btn btn-warning">
                    <i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>

        <div class="box-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <form action="<?= site_url('item/proses'); ?>" method="POST">
                        <div class="form-group">
                            <label for="">Barcode *</label>
                            <input type="hidden" name="id" value="<?= $row->item_id; ?>">
                            <input type="text" name="barcode" value="<?= $row->barcode; ?>" class="form-control"  required>
                        </div>
                        <div class="form-group">
                            <label for="product_name">Product Name *</label>
                            <input type="text" name="product_name" id="product_name" value="<?= $row->name; ?>" class="form-control"  required>
                        </div>
                        <div class="form-group">
                            <label for="">Category *</label>
                            <select name="category" class="form-control" required>
                                <option value="">- Choose -</option>
                                <?php foreach($category->result() as $key => $data) { ?>
                                    <option value="<?=$data->category_id?>" <?=$data->category_id == $row->category_id ? "selected" : null?>> <?=$data->name?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Unit *</label>
                            <?php echo form_dropdown('unit', $unit, $selectedunit, 
                                ['class' => 'form-control', 'required' => 'required']); ?>
                        </div>
                        <div class="form-group">
                            <label for="">Price *</label>
                            <input type="number" name="price" value="<?= $row->price; ?>" class="form-control"  required>
                        </div>
                        <div class="from-group">
                            <button type="submit" name="<?= $page; ?>" class="btn btn-success"><i class="fa fa-paper-plane"></i> Save</button>
                            <button type="reset" class="btn" style="margin-left: 10px"><i class="fa fa-undo"></i> Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>