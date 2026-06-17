<?php
/**
 * Horizon Theme for Typecho
 * 分类页面模板
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<div class="container">
    <div class="content-area">
        <div class="archive-header">
            <h1 class="archive-title">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
                全部分类
            </h1>
        </div>

        <div class="category-grid">
            <?php
            $cats = $this->widget('Widget_Metas_Category_List');
            while ($cats->next()):
            ?>
            <a href="<?php $cats->permalink(); ?>" class="category-card">
                <div class="category-card-name"><?php $cats->name(); ?></div>
                <div class="category-card-count"><?php $cats->count(); ?> 篇文章</div>
                <?php if ($cats->description): ?>
                <div class="category-card-desc"><?php $cats->description(); ?></div>
                <?php endif; ?>
            </a>
            <?php endwhile; ?>
        </div>
    </div>
</div>

<?php $this->need('footer.php'); ?>
