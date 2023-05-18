<?php
/* Smarty version 4.3.1, created on 2023-05-17 10:52:03
  from '/home/philippantonhermes/PhpStorm/php-framework/templates/home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6464b1d3d387d3_82169600',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0332a1a5074f2e91f2f171d286bbde77da02d643' => 
    array (
      0 => '/home/philippantonhermes/PhpStorm/php-framework/templates/home.tpl',
      1 => 1684320637,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:base/header.tpl' => 1,
    'file:base/footer.tpl' => 1,
  ),
),false)) {
function content_6464b1d3d387d3_82169600 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('title', "Home");
$_smarty_tpl->_subTemplateRender("file:base/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['title']->value), 0, false);
?>
<div class="container">
    <h1>Welcome!</h1>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:base/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
