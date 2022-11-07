<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/4ca208cb2e.js" crossorigin="anonymous"></script>
</head>

<?php if ($guru['bg_image'] == null) : ?>

    <body style="background-color: #FFEDF3;">
        <!-- HEADER -->
        <?= $this->include('templates/teachers/header') ?>
        <!-- END HEADER -->

        <!-- MAIN -->
        <?= $this->renderSection('content'); ?>
        <!-- END MAIN -->

        <!-- FOOTER -->
        <?= $this->include('templates/teachers/footer'); ?>
        <!-- END FOOTER -->

        <!-- JS -->
        <?= $this->renderSection('js'); ?>
        <!-- END JS -->
    </body>

<?php else : ?>

    <body style="background-image: url('<?= base_url('assets/content/images/' . $guru['bg_image']) ?>'); background-size: cover; background-repeat:no-repeat">
        <!-- HEADER -->
        <?= $this->include('templates/teachers/header') ?>
        <!-- END HEADER -->

        <!-- MAIN -->
        <?= $this->renderSection('content'); ?>
        <!-- END MAIN -->

        <!-- FOOTER -->
        <?= $this->include('templates/teachers/footer'); ?>
        <!-- END FOOTER -->

        <!-- JS -->
        <?= $this->renderSection('js'); ?>
        <!-- END JS -->
    </body>

<?php endif; ?>


</html>
