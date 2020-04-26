<style>
    a {
        color: whitesmoke;
    }

    a:hover {
        color: grey;
        text-decoration: underline;
    }
</style>

<body style="background-color: darkslateblue">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg col-lg-6 my-5 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg" style="background-color: #0075DB; color: white; border-radius : 4px;">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 mb-1" style="color:white"><b>Register </b>PT.Traviora</h1>
                                <p class="mb-4">Daftarkan akun anda untuk dapat login ke website kami</p>
                            </div>
                            <form class="user" method="POST" action="<?php echo base_url('Registrasi') ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputEmail" placeholder="Name" name="name">
                                    <?php echo form_error('name', '<div class="text-danger small ml-2">', '</div>') ?>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="exampleInputEmail" placeholder="Email" name="email">
                                    <?php echo form_error('email', '<div class="text-danger small ml-2">', '</div>') ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputEmail" placeholder="Username" name="username">
                                    <?php echo form_error('username', '<div class="text-danger small ml-2">', '</div>') ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password" name="password_1">
                                        <?php echo form_error('password_1', '<div class="text-danger small ml-2">', '</div>') ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" id="exampleRepeatPassword" placeholder="Ulangi Password" name="password_2">
                                        <?php echo form_error('password_2', '<div class="text-danger small ml-2">', '</div>') ?>
                                    </div>
                                </div>
                                <button type="submit" name="login" class="btn btn-warning btn-block">Daftar</button>
                                <hr>
                            </form>
                            <div class="text-center">
                                <a class="small" href="<?php echo base_url('Auth/login') ?>">Sudah Punya Akun? Silahkan Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>