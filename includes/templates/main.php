<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="<?php echo MOWP_ASSETS . 'apps/molecula/dist/umi.css'; ?>" />
    <script>
        window.originalBaseName = '/' + window.location.pathname.split('/')[1];
        // window.resourceBaseUrl = window.originalBaseName;
        window.routerBase = "/demo";
    </script>
    <script>
        window.publicPath = window.resourceBaseUrl || "/demo";
    </script>
    <script>
        //! umi version: 3.3.2
    </script>
</head>

<body>
    <div id="root-master"></div>

    <script src="<?php echo MOWP_ASSETS . 'apps/molecula/dist/umi.js'; ?>"></script>
</body>

</html>