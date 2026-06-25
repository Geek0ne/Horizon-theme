<?php
/**
 * Horizon Theme for Typecho
 * 文章模板
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
$options = getThemeOptions();
?>

<div class="container">
    <div class="content-area single-layout<?php if ($options['showToc']): ?> has-toc<?php endif; ?>">
        <article class="post-full" id="post-<?php $this->cid(); ?>">
            <?php renderBreadcrumb($this); ?>
            <?php
            $coverImage = $this->fields->coverImage;
            if (!empty($coverImage)):
            ?>
            <div class="post-cover">
                <img src="<?php echo htmlspecialchars($coverImage, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php $this->title(); ?>">
            </div>
            <?php endif; ?>

            <header class="post-header">
                <h1 class="post-title"><?php $this->title(); ?></h1>
                <div class="post-meta">
                    <time datetime="<?php $this->date('Y-m-d'); ?>">
                        <svg aria-hidden="true" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        <?php $this->date('Y 年 m 月 d 日'); ?>
                    </time>
                    <span class="post-category-list">
                        <svg aria-hidden="true" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
                        <?php $this->category(','); ?>
                    </span>
                    <?php if ($options['showWordCount']): ?>
                    <span class="word-count">
                        <svg aria-hidden="true" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                        <?php echo getWordCount($this->content); ?> 字
                    </span>
                    <?php endif; ?>
                    <?php if ($options['showReadTime']): ?>
                    <span class="read-time">
                        <svg aria-hidden="true" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        预计 <?php echo getReadTime($this->content); ?>
                    </span>
                    <?php endif; ?>
                </div>
            </header>

            <div class="post-content markdown-body" id="post-content">
                <?php $this->content(); ?>
            </div>

            <?php if (!empty($this->tags)): ?>
            <div class="post-tags">
                <svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"/><line x1="7" y1="7" x2="7.01" y2="7"/></svg>
                <?php $this->tags(' ', true, ''); ?>
            </div>
            <?php endif; ?>

            <?php if ($options['showShareButtons']): ?>
            <div class="post-share">
                <span class="share-label">分享到：</span>
                <a href="https://service.weibo.com/share/share.php?url=<?php echo urlencode($this->permalink()); ?>&title=<?php echo urlencode($this->title()); ?>" target="_blank" rel="noopener" class="share-btn share-weibo" title="微博">微博</a>
                <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode($this->permalink()); ?>&text=<?php echo urlencode($this->title()); ?>" target="_blank" rel="noopener" class="share-btn share-twitter" title="Twitter">Twitter</a>
                <a href="https://connect.qq.com/widget/shareqq/index.html?url=<?php echo urlencode($this->permalink()); ?>&title=<?php echo urlencode($this->title()); ?>" target="_blank" rel="noopener" class="share-btn share-qq" title="QQ">QQ</a>
            </div>
            <?php endif; ?>

            <?php if ($options['showAuthor']): ?>
            <div class="author-card">
                <div class="author-avatar">
                    <?php echo $this->author->gravatar(96); ?>
                </div>
                <div class="author-info">
                    <div class="author-name"><?php $this->author->name(); ?></div>
                    <div class="author-bio">
                        <?php if ($this->author->intro): ?>
                        <?php $this->author->intro(); ?>
                        <?php else: ?>
                        这个作者很懒，什么都没有留下。
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <nav class="post-nav">
                <div class="post-nav-prev">
                    <?php $this->thePrev('← %s', '<span>上一篇</span>%s'); ?>
                </div>
                <div class="post-nav-next">
                    <?php $this->theNext('→ %s', '<span>下一篇</span>%s'); ?>
                </div>
            </nav>

            <?php if ($options['showCopyright'] == '1'): ?>
            <div class="post-copyright">
                <p>本站所有文章除特别声明外，均采用 <a href="https://creativecommons.org/licenses/by-nc-sa/4.0/" target="_blank" rel="noopener">CC BY-NC-SA 4.0</a> 许可协议。转载请注明来自 <?php $this->options->name(); ?>！</p>
            </div>
            <?php endif; ?>

            <?php
            $related = getRelatedPosts($this, 3);
            if (!empty($related)):
            ?>
            <div class="related-posts">
                <h3 class="related-title">相关文章</h3>
                <div class="related-grid">
                    <?php foreach ($related as $r): ?>
                        <a href="<?php echo htmlspecialchars($r['permalink'], ENT_QUOTES, 'UTF-8'); ?>" class="related-card">
                        <div class="related-card-title"><?php echo htmlspecialchars($r['title'], ENT_QUOTES, 'UTF-8'); ?></div>
                        <time class="related-card-date"><?php echo date('Y-m-d', $r['created']); ?></time>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

            <?php $this->comments(); ?>
        </article>

        <?php if ($options['showToc']): ?>
        <aside class="post-toc" id="post-toc">
            <div class="toc-inner">
                <div class="toc-title">
                    <svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
                    文章目录
                </div>
                <nav class="toc-nav" id="toc-nav"></nav>
            </div>
        </aside>
        <?php endif; ?>
    </div>
</div>

<?php $this->need('footer.php'); ?>
