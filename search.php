<?php
/**
 * Horizon Theme for Typecho
 * 搜索结果模板
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<div class="container">
    <div class="content-area">
        <div class="archive-header">
            <h1 class="archive-title">
                搜索：<span><?php $this->keywords(); ?></span>
            </h1>
            <p class="search-result-count">
                共找到 <?php $this->resultsTotal(); ?> 篇相关文章
            </p>
        </div>

        <?php if ($this->have()): ?>
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
                        echo $excerpt;
                    } else {
                        echo getExcerpt($this->content, 160);
                    }
                    ?>
                </p>
            </article>
            <?php endwhile; ?>
        </div>

        <nav class="pagination">
            <?php $this->pageNav('← 上一页', '下一页 →', 1, '...', array('wrapTag' => 'div', 'wrapClass' => 'pagination-inner')); ?>
        </nav>
        <?php else: ?>
        <div class="empty-state">
            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
            <h2>没有找到相关文章</h2>
            <p>换个关键词试试吧</p>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php $this->need('footer.php'); ?>
<script>
(function(){
    var kw = '<?php echo addslashes($this->keywords()); ?>';
    if (!kw) return;
    var re = new RegExp('(' + kw.replace(/[.*+?^${}()|[\]\\]/g, '\\$&') + ')', 'gi');
    document.querySelectorAll('.post-item-title a, .post-item-excerpt').forEach(function(el){
        el.innerHTML = el.innerHTML.replace(re, '<mark>$1</mark>');
    });
})();
</script>
