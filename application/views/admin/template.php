<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<title><?php echo $title ?></title>
	 <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url() ?>css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?php echo base_url() ?>css/plugins/timeline.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="<?php echo base_url() ?>css/plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url() ?>css/plugins/morris.css" rel="stylesheet">

    <!-- DatePick CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>css/default.css" type="text/css">

    <!-- Datepicker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.ui.datepicker.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.ui.core.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.ui.theme.css">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url() ?>font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>css/images/favicon.gif">
</head>

<body>
    <div id="wrapper">
<?php
    $this->load->view("admin/nav.php");
?>

