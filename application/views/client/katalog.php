<div class="jumbotron text-white" style="background-image: url('<?= base_url('assets/img/pandawa.jpg'); ?>'); background-size: 100%; height: 175px;">
    <h1>Tours</h1>
</div>


<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">
            <?php $no = 1; ?>
            <?php foreach ($row->result() as $key => $data) : ?>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <?php if ($data->image != null) { ?>
                            <img src="<?= base_url('uploads/item/' . $data->image) ?>" width="100%" height="155px">
                        <?php } ?>
                        <div class="card-body">
                            <p class="card-text"><?= $data->name ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="<?= site_url('katalog/edit/' . $data->item_id); ?>" class="btn btn-sm btn-outline-secondary">View</a>
                                </div>
                                <small class="text-muted"><?= $data->price ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>