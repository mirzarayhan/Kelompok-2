<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php if ($this->fungsi->user_login()->level == 1) { ?>
        <title>Admin | Traviora</title>
    <?php } else { ?>
        <title>Traviora</title>
    <?php } ?>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css">
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini <?= $this->uri->segment(1) == 'sale' ? 'sidebar-collapse' : null ?>">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <a href="<?= site_url('dashboard') ?>" class="logo" style="background-color: #1a2226">
                <span class="logo-mini"><b>Tr</b></span>
                <img src="<?= base_url() ?>assets/img/Logo.png" alt="Logo Traviora" height="50%">
                <?php if ($this->fungsi->user_login()->level == 1) { ?>
                    <span class="logo-lg"><b>Admin</b>Traviora</span>
                <?php } else { ?>
                    <span class="logo-lg">Traviora</span>
                <?php } ?>
                <span class="logo-lg"><b>Admin</b>Traviora</span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-flag-o"></i>
                                <span class="label label-danger">3</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 3 tasks</li>
                                <li>
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <h3>
                                                    Design some buttons
                                                    <small class="pull-right">20%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">20% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- end task item -->
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all tasks</a>
                                </li>
                            </ul>
                        </li>
                        <!-- User Account -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?= $this->fungsi->user_login()->username ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                    <p>
                                        <?= ucfirst($this->fungsi->user_login()->name) ?>
                                        <small><?= $this->fungsi->user_login()->address ?></small>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?= site_url('auth/logout'); ?>" class="btn btn-flat bg-red">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column -->
        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?= $this->fungsi->user_login()->username ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
                <!-- sidebar menu -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li <?= $this->uri->segment(1) == 'dashboard' ||  $this->uri->segment(1) == '' ? 'class="active"' : ''; ?>>
                        <a href="<?= site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                    </li>
                    <li <?= $this->uri->segment(1) == 'customer' ? 'class="active"' : ''; ?>>
                        <a href="<?= site_url('customer'); ?>"><i class="fa fa-user"></i><span>Customers</span></a>
                    </li>
                    <li <?= $this->uri->segment(1) == 'supplier' ? 'class="active"' : ''; ?>>
                        <a href="<?= site_url('supplier'); ?>"><i class="fa fa-truck"></i><span>Suppliers</span></a>
                    </li>
                    <li class="treeview <?= $this->uri->segment(1) == 'category' ||
                                            $this->uri->segment(1) == 'item' ||
                                            $this->uri->segment(1) == 'unit' ||
                                            $this->uri->segment(1) == 'type' ? 'active' : ''; ?>">
                        <a href="#">
                            <i class="fa fa-archive"></i> <span>Tour Products</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?= $this->uri->segment(1) == 'item' ? 'class="active"' : ''; ?>>
                                <a href="<?= site_url('item'); ?>"><i class="fa fa-circle-o"></i> Items</a>
                            </li>
                            <li <?= $this->uri->segment(1) == 'category' ? 'class="active"' : ''; ?>>
                                <a href="<?= site_url('category'); ?>"><i class="fa fa-circle-o"></i> Categories</a>
                            </li>
                            <li <?= $this->uri->segment(1) == 'type' ? 'class="active"' : ''; ?>>
                                <a href="<?= site_url('type'); ?>"><i class="fa fa-circle-o"></i> Tour Type</a>
                            </li>
                            <li <?= $this->uri->segment(1) == 'unit' ? 'class="active"' : ''; ?>>
                                <a href="<?= site_url('unit'); ?>"><i class="fa fa-circle-o"></i> Units</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview <?= $this->uri->segment(1) == 'sale' ? 'active' : '' ||
                                            $this->uri->segment(1) == 'stock' && $this->uri->segment(2) == 'in' ||
                                            $this->uri->segment(1) == 'stock'  && $this->uri->segment(2) == 'out' ? 'active' : ''; ?>">
                        <a href="#">
                            <i class="fa fa-money"></i> <span>Transaction</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?= $this->uri->segment(1) == 'sale' ? 'class="active"' : ''; ?>>
                                <a href="<?= site_url('sale'); ?>"><i class="fa fa-circle-o"></i> Sales</a>
                            </li>
                            <li <?= $this->uri->segment(1) == 'stock' && $this->uri->segment(2) == 'in' ? 'class="active"' : ''; ?>>
                                <a href="<?= site_url('stock/in'); ?>"><i class="fa fa-circle-o"></i> Stock In</a>
                            </li>
                            <li <?= $this->uri->segment(1) == 'stock' && $this->uri->segment(2) == 'out' ? 'class="active"' : ''; ?>>
                                <a href="<?= site_url('stock/out'); ?>"><i class="fa fa-circle-o"></i> Stock Out</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-pie-chart"></i> <span>Reports</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Sales</a></li>
                            <li><a href="#"><i class="fa fa-circle-o"></i> Stock</a></li>
                        </ul>
                    </li>
                    <?php if ($this->fungsi->user_login()->level == 1) : ?>
                        <li class="header">SETTING</li>
                        <li><a href="<?= site_url('user'); ?>"><i class="fa fa-user"></i><span>User Aktif</span></a></li>
                        <li><a href="<?= site_url('userNonAktif'); ?>"><i class="fa fa-user"></i><span>User Non Active</span></a></li>
                        <li><a href="<?= site_url('akun'); ?>"><i class="fa fa-object-group"></i><span>Akun Website</span></a></li>
                    <?php endif; ?>
            </section>
        </aside>
        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <?php echo $contents ?>
        </div>

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0
            </div>
            <strong>Copyright &copy; 2020 <a href="https://www.linkedin.com/in/m-irvan-alfi-hidayat-63bb28169/">Project1</a>.</strong> All rights reserved.
        </footer>
    </div>

    <script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

    <script src="<?= base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

    <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dtable').DataTable()
        })
    </script>
    <!-- ini untuk tombol search pada tambah stock in -->
    <script>
        $(document).ready(function() {
            $('#dtable').DataTable()
            $(".btn-modal").click(function(e) {
                e.preventDefault();
                console.log("aa");
                var item_id = $(this).data('id');
                var barcode = $(this).data('barcode');
                var name = $(this).data('name');
                var type_name = $(this).data('type');
                var category_name = $(this).data('category');
                var stock = $(this).data('stock');
                var price = $(this).data('price');
                $('#item_id').val(item_id);
                $('#barcode').val(barcode);
                $('#item_name').val(name);
                $('#type_name').val(type_name);
                $('#category_name').val(category_name);
                $('#stock').val(stock);
                $('#price').val(price);
                $('#modal-item').modal('hide');
            });
        })
    </script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '#set_dtl', function() {
                var barcode = $(this).data('barcode');
                var itemname = $(this).data('itemname');
                var detail = $(this).data('detail');
                var suppliername = $(this).data('suppliername');
                var qty = $(this).data('qty');
                var date = $(this).data('date');
                $('#barcode').text(barcode);
                $('#item_name').text(itemname);
                $('#detail').text(detail);
                $('#supplier_name').text(suppliername);
                $('#qty').text(qty);
                $('#date').text(date);
            })
        })
    </script>

    <script>
        $(document).on('click', '#select', function() {
            $('#item_id').val($(this).data('id'));
            $('#barcode').val($(this).data('barcode'));
            $('#price').val($(this).data('price'));
            $('#stock').val($(this).data('stock'));
            $('#modal-item').modal('hide');
        })

        $(document).on('click', '#add_cart', function() {
            var item_id = $('#item_id').val()
            var price = $('#price').val()
            var stock = $('#stock').val()
            var qty = $('#qty').val()
            if (item_id == '') {
                alert('Product belum dipilih')
                $('#barcode').focus()
            } else if (stock < 1) {
                alert('Stock tidak mencukupi')
                $('#item_id').val('')
                $('#barcode').val('')
                $('#barcode').focus()
            } else {
                $.ajax({
                    type: 'POST',
                    url: '<?= site_url('sale/process') ?>',
                    data: {
                        'add_cart': true,
                        'item_id': item_id,
                        'price': price,
                        'qty': qty
                    },
                    datatype: 'json',
                    success: function(result) {
                        if (result.success == true) {
                            alert('Berhasil tambah cart ke db')
                        } else {
                            alert('Gagal tambah item cart')
                        }
                    }
                })
            }
        })
    </script>
</body>

</html>