<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Reservasi Lapangan Padel</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Data tables -->
    <link rel="stylesheet"
      href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar-brand {
            font-weight: bold;
        }

        .toggle-password i {
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .toggle-password i.unlock-anim {
            transform: rotate(-20deg) scale(1.2);
            color: #28a745;
        }

    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm px-4">
    <div class="container-fluid">

        <a class="navbar-brand" href="/">
            <i class="fas fa-table-tennis mr-2"></i>Padel Arena
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="/">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>

                <?php if(auth()->guard()->check()): ?>
                    <li class="nav-item">
                        <span class="nav-link text-light">
                            <i class="fas fa-user"></i>
                            <?php echo e(auth()->user()->name); ?>

                            <small class="text-muted">(<?php echo e(auth()->user()->role); ?>)</small>
                        </span>
                    </li>

                    <li class="nav-item">
                        <form action="/logout" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-outline-light btn-sm ml-2">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>

<!-- CONTENT -->
<div class="container mt-4">

<!--
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i>
            <?php echo e(session('success')); ?>

            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-times-circle"></i>
            <?php echo e(session('error')); ?>

            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </button>
    <?php endif; ?>
-->

    <?php echo $__env->yieldContent('content'); ?>
</div>

<!-- FOOTER -->
<footer class="text-center text-muted mt-5 mb-3">
    <small>
        © <?php echo e(date('Y')); ?> Reservasi Lapangan Padel • Built with Laravel
    </small>
</footer>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- JavaScript Gembok Login & Register -->
<script>
document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".toggle-password").forEach(toggle => {

        toggle.addEventListener("click", () => {
            const input = document.getElementById(toggle.dataset.target);
            const icon = toggle.querySelector("i");

            if (!input || !icon) return;

            // reset animasi biar bisa diputar ulang
            icon.classList.remove("unlock-anim");
            void icon.offsetWidth;

            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash", "unlock-anim");
            } else {
                input.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye", "unlock-anim");
            }
        });

    });
});
</script>

<!-- JavaScript Gambar Lapangan -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.custom-file-input').forEach(function (input) {
        input.addEventListener('change', function (e) {
            const fileName = e.target.files.length
                ? e.target.files[0].name
                : 'Pilih gambar baru (opsional)';
            e.target.nextElementSibling.innerText = fileName;
        });
    });
});
</script>

<?php if(session('success')): ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: "<?php echo e(session('success')); ?>",
        timer: 2000,
        showConfirmButton: false
    });
</script>
<?php endif; ?>

<?php if(session('error')): ?>
<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: "<?php echo e(session('error')); ?>",
    });
</script>
<?php endif; ?>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Yakin?',
                text: 'Data lapangan akan dihapus permanen!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
</script>


<!-- JQUERY (FULL, WAJIB) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- POPPER & BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- DATATABLES -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

<?php echo $__env->yieldContent('scripts'); ?>



</body>
</html>
<?php /**PATH /home/larh6135/public_html/project_laravel/resources/views/layouts/app.blade.php ENDPATH**/ ?>