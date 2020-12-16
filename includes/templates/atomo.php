<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="<?php echo MOWP_ASSETS . 'apps/' . $GLOBALS['mowp_app'] . '/dist/umi.css'; ?>" />
    <script>
        window.originalBaseName = '/' + window.location.pathname.split('/')[1];
        // window.resourceBaseUrl = window.originalBaseName;
        window.routerBase = window.originalBaseName + "/<?php echo $GLOBALS['mowp_app']; ?>";
    </script>
    <script>
        window.publicPath = window.resourceBaseUrl || "/<?php echo $GLOBALS['mowp_app']; ?>/";
    </script>
    <script>
        //! umi version: 3.3.2
    </script>
</head>

<body>
    <div id="<?php echo $GLOBALS['mowp_app']; ?>"></div>

    <script src="<?php echo MOWP_ASSETS . 'apps/' . $GLOBALS['mowp_app'] . '/dist/umi.js'; ?>"></script>
</body>

</html>