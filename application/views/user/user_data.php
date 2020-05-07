<section class="content-header">
    <h1>Users Activated
        <small>Tabel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i></a></li>
        <li class="active">User Activated</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Users</h3>
            <div class="pull-right">
                <a href="<?= site_url('user/add'); ?>" class="btn btn-primary">
                    <i class="fa fa-user-plus"></i> Create</a>
                <a href="<?= site_url('user/laporan_pdf'); ?>" class="btn btn-primary">
                    <i class="fa fa-print"></i> Print</a>
            </div>
        </div>

        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="dtable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Level</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($row->result() as $key => $data) : ?>
                        <tr>
                            <td style="width: 5%;"><?= $no++; ?>.</td>
                            <td><?= $data->username ?></td>
                            <td><?= $data->name ?></td>
                            <td><?= $data->gender == 'L' ? 'Male' : 'Female' ?></td>
                            <td><?= $data->email ?></td>
                            <td><?= $data->address ?></td>
                            <td><?= $data->level == 1 ? "Admin" : "Kasir" ?></td>
                            <td><?= $data->status == "Y" ? "Active" : "Non Active" ?></td>
                            <td class="text-center" width="160px">
                                <a href="<?= site_url('user/edit/' . $data->user_id); ?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"></i> Edit</a>
                                <form action="<?= site_url('user/delete'); ?>" method="POST" class="pull-right">
                                    <input type="hidden" name="user_id" value="<?= $data->user_id ?>">
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