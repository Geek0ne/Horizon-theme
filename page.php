<?php
/**
 * Horizon Theme for Typecho
 * 独立页面模板
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<div class="container">
    <div class="content-area single-layout">
        <article class="page-full" id="page-<?php $this->cid(); ?>">
            <header class="post-header">
                <h1 class="post-title"><?php $this->title(); ?></h1>
                <div class="post-meta">
                    <time datetime="<?php $this->date('Y-m-d'); ?>">
                        <?php $this->date('Y 年 m 月 d 日'); ?>
                    </time>
                </div>
            </header>

            <div class="post-content markdown-body">
                <?php $this->content(); ?>
            </div>

            <?php $this->comments(); ?>
        </article>
    </div>
</div>

<?php $this->need('footer.php'); ?>
