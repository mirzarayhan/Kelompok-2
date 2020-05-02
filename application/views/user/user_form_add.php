<section class="content-header">
    <h1>Users
        <small>Table</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i></a></li>
        <li class="active">User Table</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Add User</h3>
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
                            <input type="text" name="fullname" class="form-control" value="<?= set_value('fullname'); ?>">
                            <span class="help-block"><?= form_error('fullname'); ?></span>
                        </div>
                        <div class="form-group <?= form_error('username') ? 'has-error' : null; ?>">
                            <label for="">Username *</label>
                            <input type="text" name="username" class="form-control" value="<?= set_value('username'); ?>">
                            <span class="help-block"><?= form_error('username'); ?></span>
                        </div>
                        <div class="form-group <?= form_error('email') ? 'has-error' : null; ?>">
                            <label for="">Email *</label>
                            <input type="email" name="email" class="form-control" value="<?= set_value('email'); ?>">
                            <span class="help-block"><?= form_error('email'); ?></span>
                        </div>
                        <div class="form-group <?= form_error('password') ? 'has-error' : null; ?>">
                            <label for="">Password *</label>
                            <input type="password" name="password" class="form-control" value="<?= set_value('password'); ?>">
                            <span class="help-block"><?= form_error('password'); ?></span>
                        </div>
                        <div class="form-group <?= form_error('passconf') ? 'has-error' : null; ?>">
                            <label for="">Password Confirmation *</label>
                            <input type="password" name="passconf" class="form-control" value="<?= set_value('passconf'); ?>">
                            <span class="help-block"><?= form_error('passconf'); ?></span>
                        </div>
                        <div class="form-group <?= form_error('address') ? 'has-error' : null; ?>">
                            <label for="">Address *</label>
                            <textarea name="address" class="form-control"><?= set_value('address'); ?></textarea>
                            <span class="help-block"><?= form_error('address'); ?></span>
                        </div>
                        <div class="form-group <?= form_error('level') ? 'has-error' : null; ?>">
                            <label for="">Level *</label>
                            <select name="level" class="form-control" id="">
                                <?php $level = set_value('level') ?>
                                <option value="">- Pilih -</option>
                                <option value="1" <?= $level == 1 ? "selected" : null; ?>>Admin</option>
                                <option value="2" <?= $level == 2 ? "selected" : null; ?>>Kasir</option>
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