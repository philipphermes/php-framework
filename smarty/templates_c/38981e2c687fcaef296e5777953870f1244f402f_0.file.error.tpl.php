<?php
/* Smarty version 4.3.1, created on 2023-05-17 10:13:08
  from '/home/philippantonhermes/PhpStorm/php-framework/templates/error.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6464a8b4acf845_45794509',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '38981e2c687fcaef296e5777953870f1244f402f' => 
    array (
      0 => '/home/philippantonhermes/PhpStorm/php-framework/templates/error.tpl',
      1 => 1684318054,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:base/header.tpl' => 1,
    'file:base/footer.tpl' => 1,
  ),
),false)) {
function content_6464a8b4acf845_45794509 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('title', $_smarty_tpl->tpl_vars['response']->value);
$_smarty_tpl->_subTemplateRender("file:base/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['title']->value), 0, false);
?>
<div class="container">
    <div class="row center-text">
        <h1 class="title"><?php echo $_smarty_tpl->tpl_vars['response']->value;?>
</h1>
        <hr />
        <p><b>Message:</b> <?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p>
        <br />
        <p>
            <b>For more information contact our support:</b>
            <br />
            <b>Email:</b> <a href="mailto: test@shop.de">test@shop.de</a>
            <br />
            <b>Phone:</b> <a href="tel:123-456-7890">123-456-7890</a>
        </p>
        <br />
        <a class="link-button" href="/">Go back to Home</a>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:base/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
