<?php
/**
 * Horizon Theme for Typecho
 * 404 页面模板
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<div class="container">
    <div class="content-area">
        <div class="empty-state error-404">
            <div class="error-code">404</div>
            <h2>页面未找到</h2>
            <p>您访问的页面不存在或已被移除</p>
            <a href="<?php $this->options->siteUrl(); ?>" class="btn btn-primary">返回首页</a>
        </div>
    </div>
</div>

<?php $this->need('footer.php'); ?>
