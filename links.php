<?php
/**
 * Horizon Theme for Typecho
 * 友情链接页面模板
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
$options = getThemeOptions();
$linkData = json_decode($options['friendLinks'] ?? '', true);
if (!is_array($linkData)) $linkData = [];
?>

<div class="container">
    <div class="content-area">
        <?php renderBreadcrumb($this); ?>
        <div class="archive-header">
            <h1 class="archive-title">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                友情链接
            </h1>
            <p class="search-result-count">共 <?php echo count($linkData); ?> 个链接</p>
        </div>

        <div class="post-content markdown-body">
            <?php $this->content(); ?>
        </div>

        <?php if (!empty($linkData)): ?>
        <div class="links-grid">
            <?php foreach ($linkData as $link): ?>
            <a href="<?php echo htmlspecialchars($link['url']); ?>" class="link-card" target="_blank" rel="noopener">
                <img src="<?php echo htmlspecialchars($link['avatar']); ?>" alt="<?php echo htmlspecialchars($link['name']); ?>" class="link-avatar" loading="lazy">
                <div class="link-info">
                    <div class="link-name"><?php echo htmlspecialchars($link['name']); ?></div>
                    <div class="link-desc"><?php echo htmlspecialchars($link['desc']); ?></div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php $this->need('footer.php'); ?>
