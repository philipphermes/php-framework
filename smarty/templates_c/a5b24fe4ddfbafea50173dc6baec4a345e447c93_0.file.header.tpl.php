<?php
/* Smarty version 4.3.1, created on 2023-05-17 10:12:59
  from '/home/philippantonhermes/PhpStorm/php-framework/templates/base/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6464a8ab7ab0d0_51276416',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a5b24fe4ddfbafea50173dc6baec4a345e447c93' => 
    array (
      0 => '/home/philippantonhermes/PhpStorm/php-framework/templates/base/header.tpl',
      1 => 1684318054,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6464a8ab7ab0d0_51276416 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/assets/styles/main.css">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <?php echo (($tmp = $_smarty_tpl->tpl_vars['meta']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>

</head>
<body>
<div class="header" id="header">
    <a class="logo" href="/">PHP Framework</a>
</div><?php }
}
