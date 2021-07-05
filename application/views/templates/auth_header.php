<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EOS SYSTEM</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/');?>plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/');?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/');?>dist/css/adminlte.min.css">
  
  <link rel="icon" href="<?= base_url('assets/img/logo/contohlogo.PNG'); ?>">
</head>
<body class="hold-transition login-page" style="background-color:	darkseagreen">

<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message1');?>"></div>
<div class="flash-wrongpassword" data-flashdata="<?= $this->session->flashdata('message2');?>"></div>
<div class="flash-wrongusername" data-flashdata="<?= $this->session->flashdata('message3');?>"></div>
<div class="flash-logout" data-flashdata="<?= $this->session->flashdata('message4');?>"></div>
<div class="flash-forgot" data-flashdata="<?= $this->session->flashdata('wrongemail');?>"></div>
<div class="flash-checkemail" data-flashdata="<?= $this->session->flashdata('cekemail');?>"></div>
<div class="flash-change" data-flashdata="<?= $this->session->flashdata('successchange');?>"></div>