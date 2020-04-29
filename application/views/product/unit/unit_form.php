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
                    <form action="<?= site_url('unit/proses'); ?>" method="POST">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Unit Name *</label>
                                <input type="hidden" name="id" value="<?= $row->unit_id; ?>">
                                <input type="text" name="unit_name" class="form-control" value="<?= $row->name; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Unit Address *</label>
                                <textarea name="unit_address" class="form-control" value="<?= $row->address; ?>" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Unit Duration *</label>
                                <input type="text" name="unit_duration" class="form-control" value="<?= $row->duration; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Unit Grup Size *</label>
                                <input type="text" name="unit_grupsize" class="form-control" value="<?= $row->groupsize; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Unit Overview *</label>
                                <textarea name="unit_overview" class="form-control" value="<?= $row->overview; ?>" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Unit Language *</label>
                                <input type="text" name="unit_language" class="form-control" value="<?= $row->language; ?>" required>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Unit Type *</label>
                            <?php
                            $atribut = array('class' => 'form-control');
                            echo form_dropdown('type', $type, $row->type_id ?? '', $atribut);
                            echo form_error('type');
                            ?>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Unit Categori *</label>
                            <select name="unit_categori" class="form-control">
                                <option><?= $row->name ?></option>
                            </select>
                            <?php
                            $atribut = array('class' => 'form-control');
                            echo form_dropdown('category', $category, $row->category_id ?? '', $atribut);
                            echo form_error('category');
                            ?>
                        </div>
                        <div class="from-group col-md-6">
                            <button type="submit" name="<?= $page; ?>" class="btn btn-success"><i class="fa fa-paper-plane"></i> Save</button>
                            <button type="reset" class="btn" style="margin-left: 10px"><i class="fa fa-undo"></i> Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>