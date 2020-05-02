<section class="content-header">
    <h1>Update
        <small>Data</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Update Table</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Edit User</h3>
            <div class="pull-right">
                <a href="<?= site_url('user'); ?>" class="btn btn-warning">
                    <i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <form action="" method="POST">
                        <div class="form-group <?= form_error('fullname') ? 'has-error' : null; ?>">
                            <label for="">Name *</label>
                            <input type="hidden" name="user_id" value="<?= $row->user_id ?>">
                            <input type="text" name="fullname" class="form-control" value="<?= $this->input->post('fullname') ?? $row->name ?>">
                            <span class="help-block"><?= form_error('fullname'); ?></span>
                        </div>
                        <div class="form-group <?= form_error('username') ? 'has-error' : null; ?>">
                            <label for="">Username *</label>
                            <input type="text" name="username" class="form-control" value="<?= $this->input->post('username') ?? $row->username ?>">
                            <span class="help-block"><?= form_error('username'); ?></span>
                        </div>
                        <div class="form-group <?= form_error('email') ? 'has-error' : null; ?>">
                            <label for="">Email *</label>
                            <input type="email" name="email" class="form-control" value="<?= $this->input->post('email') ?? $row->email; ?>">
                            <span class="help-block"><?= form_error('email'); ?></span>
                        </div>
                        <div class="form-group <?= form_error('password') ? 'has-error' : null; ?>">
                            <label for="">Password</label><small> Leave blank if not replaced</small>
                            <input type="password" name="password" class="form-control" value="<?= $this->input->post('password') ?>">
                            <span class="help-block"><?= form_error('password'); ?></span>
                        </div>
                        <div class="form-group <?= form_error('passconf') ? 'has-error' : null; ?>">
                            <label for="">Password Confirmation</label>
                            <input type="password" name="passconf" class="form-control" value="<?= $this->input->post('passconf') ?>">
                            <span class="help-block"><?= form_error('passconf'); ?></span>
                        </div>
                        <div class="form-group <?= form_error('address') ? 'has-error' : null; ?>">
                            <label for="">Address *</label>
                            <textarea name="address" class="form-control"><?= $this->input->post('address') ?? $row->address ?></textarea>
                            <span class="help-block"><?= form_error('address'); ?></span>
                        </div>
                        <div class="form-group <?= form_error('level') ? 'has-error' : null; ?>">
                            <label for="">Level *</label>
                            <select name="level" class="form-control" id="">
                                <?php $level = $this->input->post('level') ? $this->input->post('level') : $row->level ?>
                                <option value="1">Admin</option>
                                <option value="2" <?= $level == 2 ? 'selected' : null; ?>>Kasir</option>
                            </select>
                            <span class="help-block"><?= form_error('level'); ?></span>
                        </div>
                        <div class="form-group <?= form_error('status') ? 'has-error' : null; ?>">
                            <label for="">Status *</label>
                            <select name="status" class="form-control" id="">
                                <?php $status = $this->input->post('status') ? $this->input->post('status') : $row->status ?>
                                <option value="Y">Active</option>
                                <option value="N" <?= $status == "N" ? 'selected' : null; ?>>Non Active</option>
                            </select>
                            <span class="help-block"><?= form_error('level'); ?></span>
                        </div>
                        <div class="from-group">
                            <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Save</button>
                            <button type="reset" class="btn" style="margin-left: 10px"><i class="fa fa-undo"></i> Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>