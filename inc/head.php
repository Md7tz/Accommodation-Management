<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" type="text/css" href="/<?php echo constant('URL_SUBFOLDER') ?>/public/css/main.css">
    <link rel="stylesheet" type="text/css" href="/<?php echo constant('URL_SUBFOLDER') ?>/public/css/cookies.css">
    <?php if (strstr($_SERVER['REQUEST_URI'], "dashboard.php")) : ?>
        <link rel="stylesheet" type="text/css" href="/<?php echo constant('URL_SUBFOLDER') ?>/public/css/dashboard.css">
    <?php endif; ?>
    <?php if (strstr($_SERVER['REQUEST_URI'], "auth")) : ?>
        <link rel="stylesheet" type="text/css" href="/<?php echo constant('URL_SUBFOLDER') ?>/public/css/cube.css">
    <?php endif; ?>
    <title>AMS</title>
</head>