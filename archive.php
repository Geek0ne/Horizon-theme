<?php
/**
 * Horizon Theme for Typecho
 * 归档模板
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<div class="container">
    <div class="content-area">
        <div class="archive-header">
            <h1 class="archive-title">
                <?php if ($this->is('category')): ?>
                分类：<span><?php $this->name(); ?></span>
                <?php elseif ($this->is('tag')): ?>
                标签：<span><?php $this->name(); ?></span>
                <?php elseif ($this->is('author')): ?>
                作者：<span><?php $this->name(); ?></span>
                <?php else: ?>
                归档
                <?php endif; ?>
            </h1>
        </div>

        <div class="post-list">
            <?php while ($this->next()): ?>
            <article class="post-item">
                <div class="post-item-meta">
                    <time datetime="<?php $this->date('Y-m-d'); ?>"><?php $this->date('Y-m-d'); ?></time>
                    <?php if ($this->categories): ?>
                    <span class="post-item-category"><?php $this->category(','); ?></span>
                    <?php endif; ?>
                </div>
                <h2 class="post-item-title">
                    <a href="<?php $this->permalink(); ?>"><?php $this->title(); ?></a>
                </h2>
                <p class="post-item-excerpt">
                    <?php
                    $excerpt = $this->fields->excerpt;
                    if (!empty($excerpt)) {
                        echo htmlspecialchars($excerpt, ENT_QUOTES, 'UTF-8');
                    } else {
                        echo htmlspecialchars(getExcerpt($this->content, 160), ENT_QUOTES, 'UTF-8');
                    }
                    ?>
                </p>
                <?php if (!empty($this->tags)): ?>
                <div class="post-item-tags">
                    <?php $this->tags(' ', true, ''); ?>
                </div>
                <?php endif; ?>
            </article>
            <?php endwhile; ?>
        </div>

        <nav class="pagination">
            <?php $this->pageNav('← 上一页', '下一页 →', 1, '...', array('wrapTag' => 'div', 'wrapClass' => 'pagination-inner')); ?>
        </nav>
    </div>
</div>

<?php $this->need('footer.php'); ?>
