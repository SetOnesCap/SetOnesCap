<?php
//include_once($_SERVER['DOCUMENT_ROOT'] . '/admin/templates/header.php');
function asset_path($filename, $directory)
{
    $manifest_path = $_SERVER['DOCUMENT_ROOT'] . $directory . '/rev-manifest.json';
    if (file_exists($manifest_path)) {
        $manifest = json_decode(file_get_contents($manifest_path), TRUE);
    } else {
        $manifest = array();
    }

    if (array_key_exists($filename, $manifest)) {
        return $manifest[$filename];
    }
    return $filename;
}

?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/assets/css/<?php echo asset_path('main.css', ''); ?>"/>
    <link rel="stylesheet" type="text/css" href="/admin/assets/css/<?php echo asset_path('main.css', '/admin'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="admin" id="admin">
<div class="container">
    <div class="box login-box z-1">
        <div class="content">
            <div class="text-center">
                <img src="/assets/images/logo/svg/logo-horizontal-purple.svg"/>
            </div>
            <div class="input-group">
                <input type="text" id="username"/>
                <label for="username">Username</label>
            </div>
            <div class="input-group">
                <input type="password" id="password"/>
                <label for="password">Password</label>
            </div>
            <div class="float-right">
            <input type="button" class="button button-flat" value="Forgot password"/>
            <input type="submit" class="button button-raised" value="Login"/>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
</body>
</html>