<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="viewport" content="width=device-width, intial-scale=1.0">
<link href="<?php echo base_url() ?>css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="<?php echo base_url() ?>css/plugins/metisMenu/metisMenu.min.css" type="text/css" rel="stylesheet">
<link href="<?php echo base_url() ?>css/sb-admin-2.css" type="text/css" rel="stylesheet">
<link href="<?php echo base_url() ?>font-awesome-4.1.0/css/font-awesome.min.css" type="text/css" rel="stylesheet">
<!---
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="viewport" content="width=device-width, intial-scale=1.0">
<link href="css/bootstrap.css" type="text/css" rel="stylesheet">
<link href="css/bootstrap-theme.css" type="text/css" rel="stylesheet">
<link href="css/style.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/style.css">
---->
<title>Login</title>
</head>

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Silahkan Login</h3>
                    </div>
                    <div class="panel-body">
                        <?=form_open('user')?>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="id" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="pass" type="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" name="submit_login" class="btn btn-lg btn-success btn-block" value="login_admin">Login</button>
                            </fieldset>
                        <?=form_close()?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery Version 1.11.0 -->
    <script src="<?php echo base_url() ?>js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url() ?>js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url() ?>js/sb-admin-2.js"></script>

</body>
</html>