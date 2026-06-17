<?php
/**
 * Horizon Theme for Typecho
 * 侧边栏模板
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>

<aside class="sidebar">
    <div class="widget">
        <h3 class="widget-title">关于</h3>
        <p><?php $this->options->description(); ?></p>
    </div>
    <div class="widget">
        <h3 class="widget-title">最新文章</h3>
        <ul class="widget-list">
            <?php
            $recentPosts = $this->widget('Widget_Abstract_Contents', 'type=post&status=publish&limit=5');
            while ($recentPosts->next()):
            ?>
            <li><a href="<?php $recentPosts->permalink(); ?>"><?php $recentPosts->title(); ?></a></li>
            <?php endwhile; ?>
        </ul>
    </div>
    <div class="widget">
        <h3 class="widget-title">分类</h3>
        <ul class="widget-list">
            <?php $this->widget('Widget_Abstract_Metas', 'type=category')->to($categories); ?>
            <?php while ($categories->next()): ?>
            <li><a href="<?php $categories->permalink(); ?>"><?php $categories->name(); ?> (<?php $categories->count(); ?>)</a></li>
            <?php endwhile; ?>
        </ul>
    </div>
    <div class="widget">
        <h3 class="widget-title">标签</h3>
        <div class="sidebar-tags">
            <?php $this->widget('Widget_Abstract_Metas', 'type=tag&sort=count&ignoreZeroCount=1&limit=20')->to($sidebarTags); ?>
            <?php while ($sidebarTags->next()): ?>
            <a href="<?php $sidebarTags->permalink(); ?>" class="sidebar-tag"><?php $sidebarTags->name(); ?></a>
            <?php endwhile; ?>
        </div>
    </div>
</aside>
