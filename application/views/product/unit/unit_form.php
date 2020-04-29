<section class="content-header">
    <h1>Units
        <small>Table</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Unit Table</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page); ?> Unit</h3>
            <div class="pull-right">
                <a href="<?= site_url('unit'); ?>" class="btn btn-warning">
                    <i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>

        <div class="box-body table-responsive">
            <div class="row">
                <div>
                    <?php echo form_open_multipart('unit/proses') ?>
                    <!-- <form action="<?= site_url('unit/proses'); ?>" method="POST"> -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Unit Name *</label>
                                <input type="hidden" name="id" value="<?= $row->unit_id; ?>">
                                <input type="text" name="unit_name" class="form-control" value="<?= $row->name; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Unit Address *</label>
                                <input type="text" name="unit_address" class="form-control" value="<?= $row->address; ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Image</label>
                                <?php if($page == 'edit') {
                                    if($row->image != null) { ?>
                                        <div style="margin-bottom:5px">
                                            <img src="<?=base_url('uploads/unit/'.$row->image )?>" style="width:100%">
                                        </div>
                                    <?php
                                    }
                                } ?>
                                <input type="file" name="image" class="form-control">
                                <small>(Leave blank if not <?=$page == 'edit' ? 'change' : 'available' ?>)</small>
                            </div>
                            <div class="form-group">
                                <label for="">Unit Duration *</label>
                                <input type="text" name="unit_duration" class="form-control" value="<?= $row->duration; ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Unit Grup Size *</label>
                                <input type="text" name="unit_grupsize" class="form-control" value="<?= $row->groupsize; ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Unit Overview *</label>
                                <input type="text" name="unit_overview" class="form-control" value="<?= $row->overview; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Unit Language *</label>
                                <input type="text" name="unit_language" class="form-control" value="<?= $row->language; ?>">
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Unit Type *</label>
                            <select name="unit_type" class="form-control">
                                <option>option 1</option>
                                <option>option 2</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Unit Categori *</label>
                            <select name="unit_categori" class="form-control">
                                <option value="">- Choose -</option>
                            </select>
                        </div>
                        <div class="from-group col-md-6">
                            <button type="submit" name="<?= $page; ?>" class="btn btn-success"><i class="fa fa-paper-plane"></i> Save</button>
                            <button type="reset" class="btn" style="margin-left: 10px"><i class="fa fa-undo"></i> Reset</button>
                        </div>
                    <?php echo form_close() ?>
                    <!-- </form> -->
                </div>
            </div>
        </div>
    </div>
</section>