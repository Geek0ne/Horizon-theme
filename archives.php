<?php
/**
 * Horizon Theme for Typecho
 * 归档页面模板
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<div class="container">
    <div class="content-area">
        <div class="archive-header">
            <h1 class="archive-title">
                <svg aria-hidden="true" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                文章归档
            </h1>
            <p class="archive-stat">共 <?php $this->count('篇文章'); ?>， <?php echo $this->widget('Widget_Metas_Category_List')->length; ?> 个分类</p>
        </div>

        <?php
        $this->widget('Widget_Contents_Post_Recent')->to($recentPosts);
        $currentYear = '';
        while ($recentPosts->next()):
            $year = $recentPosts->date('Y');
            if ($year !== $currentYear):
                if ($currentYear !== '') echo '</ul>';
                $currentYear = $year;
                echo '<div class="archive-year"><h2>' . $year . '</h2></div><ul class="archive-list">';
            endif;
        ?>
            <li class="archive-item">
                <time datetime="<?php $recentPosts->date('Y-m-d'); ?>"><?php $recentPosts->date('m-d'); ?></time>
                <a href="<?php $recentPosts->permalink(); ?>"><?php $recentPosts->title(); ?></a>
                <?php if ($recentPosts->categories): ?>
                <span class="archive-item-cat"><?php $recentPosts->category(','); ?></span>
                <?php endif; ?>
            </li>
        <?php endwhile; ?>
        <?php if ($currentYear !== '') echo '</ul>'; ?>
    </div>
</div>

<?php $this->need('footer.php'); ?>
