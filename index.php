<?php
/**
 * Horizon Theme for Typecho
 * 首页模板
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<div class="container">
    <div class="content-area">
        <?php if ($this->is('index')): ?>
        <div class="hero-section">
            <h1 class="site-title"><?php $this->options->name(); ?></h1>
            <p class="site-description"><?php $this->options->description(); ?></p>
        </div>
        <?php endif; ?>

        <div class="post-grid">
            <?php while ($this->next()): ?>
            <article class="post-card<?php echo $this->fields->sticky == '1' ? ' sticky' : ''; ?>">
                <?php
                $coverImage = $this->fields->coverImage;
                if (!empty($coverImage)):
                ?>
                <a href="<?php $this->permalink(); ?>" class="post-card-cover">
                    <img src="<?php echo htmlspecialchars($coverImage, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php $this->title(); ?>" loading="lazy">
                </a>
                <?php endif; ?>
                <div class="post-card-content">
                    <div class="post-card-meta">
                        <time datetime="<?php $this->date('Y-m-d'); ?>"><?php $this->date('Y-m-d'); ?></time>
                        <span class="post-category">
                            <?php $this->category(','); ?>
                        </span>
                    </div>
                    <h2 class="post-card-title">
                        <a href="<?php $this->permalink(); ?>"><?php $this->title(); ?></a>
                    </h2>
                    <p class="post-card-excerpt">
                        <?php
                        $excerpt = $this->fields->excerpt;
                        if (!empty($excerpt)) {
                            echo htmlspecialchars($excerpt, ENT_QUOTES, 'UTF-8');
                        } else {
                            echo htmlspecialchars(getExcerpt($this->content, 120), ENT_QUOTES, 'UTF-8');
                        }
                        ?>
                    </p>
                    <div class="post-card-footer">
                        <span class="post-card-read">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                            阅读全文
                        </span>
                        <?php if (!empty($this->tags)): ?>
                        <div class="post-card-tags">
                            <?php $this->tags(' ', true, ''); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </article>
            <?php endwhile; ?>
        </div>

        <nav class="pagination">
            <?php $this->pageNav('← 上一页', '下一页 →', 1, '...', array('wrapTag' => 'div', 'wrapClass' => 'pagination-inner')); ?>
        </nav>
    </div>
</div>

<?php $this->need('footer.php'); ?>
