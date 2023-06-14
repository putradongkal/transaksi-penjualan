<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <title>Transaksi Penjualan APP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Irfan" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="<?= base_url('themes/images/favicon.ico') ?>">
    <link href="<?= base_url('themes/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('themes/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('themes/css/theme.min.css') ?>" rel="stylesheet" type="text/css" />
    <?= $this->renderSection('css') ?>
</head>

<body>
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="navbar-header">

                <div class="d-flex align-items-left">
                    <button type="button" class="btn btn-sm mr-2 d-lg-none px-3 font-size-16 header-item waves-effect"
                        id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                    <div class="dropdown d-none d-sm-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-plus"></i> Buat Baru
                            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a href="<?= base_url('supplier/tambah') ?>" class="dropdown-item notify-item">
                                Supplier
                            </a>
                            <a href="<?= base_url('barang/tambah') ?>" class="dropdown-item notify-item">
                                Barang
                            </a>
                            <a href="<?= base_url('transaksi/tambah') ?>" class="dropdown-item notify-item">
                                Transaksi
                            </a>
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center">
                    <div class="dropdown d-inline-block ml-2">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="<?= base_url('images/user.png') ?>"
                                alt="Header Avatar">
                            <span class="d-none d-sm-inline-block ml-1"><?= user()->username ?></span>
                            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                href="<?= base_url('logout') ?>">
                                <span>Log Out</span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </header>

        <div class="vertical-menu">
            <div data-simplebar class="h-100">

                <div class="navbar-brand-box">
                    <a href="<?= base_url() ?>" class="logo">
                        <img src="<?= base_url('images/logo.png') ?>"  style="height:30px"/>
                    </a>
                </div>

                <div id="sidebar-menu">
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Menu</li>
                        <li>
                            <a href="<?= base_url('/') ?>" class="waves-effect">
                                <i class='bx bx-home-smile'></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('supplier') ?>" class="waves-effect">
                                <i class='bx bxs-truck'></i>
                                <span>Supplier</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('barang') ?>" class="waves-effect">
                                <i class='bx bx-data'></i>
                                <span>Barang</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('transaksi') ?>" class="waves-effect">
                                <i class='bx bx-transfer'></i>
                                <span>Transaksi</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('laporan-transaksi') ?>" class="waves-effect">
                                <i class='bx bx-file'></i>
                                <span>Laporan Transaksi</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <?= $this->renderSection('content') ?>
                </div>
                <div aria-live="polite" aria-atomic="true" style="position: absolute; top: 20px; right: 20px; z-index:99999">
                    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-animation="true" data-delay="3000">
                        <div class="toast-body"></div>
                    </div>
                </div>
            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            2023 © Transaksi Penjualan APP.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-right d-none d-sm-block">
                                Develop by Irfan
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

    </div>
    <div class="menu-overlay"></div>

    <script src="<?= base_url('themes/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('themes/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('themes/js/metismenu.min.js') ?>"></script>
    <script src="<?= base_url('themes/js/waves.js') ?>"></script>
    <script src="<?= base_url('themes/js/simplebar.min.js') ?>"></script>
    <script src="<?= base_url('themes/js/theme.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?= $this->renderSection('script') ?>
    <script>
        
        $(function(){
            <?php if($msg = session()->getFlashdata('msg')): ?>
                notifMe('success', '<?= $msg ?>');
            <?php endif ?>

            <?php if($msg = session()->getFlashdata('err_msg')): ?>
                notifMe('error', '<?= $msg ?>');
            <?php endif ?>
            
            function notifMe(type, message) {
                let toastClass = 'bg-white text-black'
                switch(type){
                    case 'success':
                        toastClass = 'bg-success text-white';
                        break;
                    case 'error':
                        toastClass = 'bg-danger text-white';
                        break;
                    case 'warning':
                        toastClass = 'bg-warning text-white';
                        break;
                    case 'info':
                        toastClass = 'bg-info text-white';
                        break;
                }
                $('.toast').addClass(toastClass);
                $('.toast-body').text(message);
                $('.toast').toast('show');
            }

            $('.table tbody').on('click', 'tr td .btn-delete', function(){
                const t = $(this);
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: 'Data tidak bisa dikembalikan setelah dihapus!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.isConfirmed) {
                        t.prop('disabled', true);
                        t.closest('td').find('.form-delete').submit();
                    }
                })
            })
        });
	</script>
</body>

</html>