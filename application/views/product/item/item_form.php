<section class="content-header">
    <h1>Items
        <small>Table</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Item Table</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages'); ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page); ?> Item</h3>
            <div class="pull-right">
                <a href="<?= site_url('item'); ?>" class="btn btn-warning">
                    <i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>

        <div class="box-body table-responsive">
            <div class="row">
                <div>
                    <?php echo form_open_multipart('item/proses') ?>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Barcode *</label>
                            <input type="hidden" name="id" value="<?= $row->item_id; ?>">
                            <input type="text" name="barcode" value="<?= $row->barcode; ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Item Name *</label>
                            <input type="text" name="item_name" class="form-control" value="<?= $row->name; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Item Address *</label>
                            <input type="text" name="item_address" class="form-control" value="<?= $row->address; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <?php if ($page == 'edit') {
                                if ($row->image != null) { ?>
                                    <div style="margin-bottom:5px">
                                        <img src="<?= base_url('uploads/item/' . $row->image) ?>" style="width:50%">
                                    </div>
                            <?php
                                }
                            } ?>
                            <input type="file" name="image" class="form-control">
                            <small>(Leave blank if not <?= $page == 'edit' ? 'change' : 'available' ?>)</small>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <div class="form-group">
                            <label for="">Item Duration *</label>
                            <input type="text" name="item_duration" class="form-control" value="<?= $row->duration; ?>">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <div class="form-group">
                            <label for="">Item Grup Size *</label>
                            <input type="text" name="item_grupsize" class="form-control" value="<?= $row->groupsize; ?>">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Item Type *</label>
                        <?php echo form_dropdown(
                            'type',
                            $type,
                            $selectedtype,
                            ['class' => 'form-control', 'required' => 'required']
                        ); ?>
                    </div>
                    <div class="form-group col-md-3">
                        <label>item Categori *</label>
                        <select name="category" class="form-control" required>
                            <option value="">- Choose -</option>
                            <?php foreach ($category->result() as $key => $data) { ?>
                                <option value="<?= $data->category_id ?>" <?= $data->category_id == $row->category_id ? "selected" : null ?>> <?= $data->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Item Language *</label>
                            <input type="text" name="item_language" class="form-control" value="<?= $row->language; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Item Overview *</label>
                            <textarea name="item_overview" class="form-control" required><?= $row->overview; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Price *</label>
                            <input type="number" name="price" value="<?= $row->price; ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Stock *</label>
                            <input type="number" name="stock" value="<?= $row->stock; ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="from-group col-md-6">
                        <button type="submit" name="<?= $page; ?>" class="btn btn-success"><i class="fa fa-paper-plane"></i> Save</button>
                        <button type="reset" class="btn" style="margin-left: 10px"><i class="fa fa-undo"></i> Reset</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</section>