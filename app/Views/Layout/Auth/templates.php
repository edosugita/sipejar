<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title; ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url('favicon.ico') ?>">

    <!-- page css -->
    <link href="<?= base_url('assets/css/auth.css') ?>" rel="stylesheet">

    <!-- Core css -->
    <link href="<?= base_url('assets/css/app.min.css') ?>" rel="stylesheet">

</head>

<body>
    <?= $this->renderSection('content'); ?>

    <!-- Core Vendors JS -->
    <script src="<?= base_url('assets/js/vendors.min.js') ?>"></script>

    <!-- Core JS -->
    <script src="<?= base_url('assets/js/app.min.js') ?>"></script>

    <script src="<?= base_url('assets/js/script.js') ?>"></script>
    <script src="<?= base_url('/assets/js/Auth/script.js') ?>"></script>

</body>

</html>