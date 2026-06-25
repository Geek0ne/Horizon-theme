<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$options = getThemeOptions();
?>
        </main>

        <footer class="horizon-footer">
            <div class="container">
                <div class="footer-grid">
                    <div class="footer-col">
                        <div class="footer-brand">
                            <?php if (!empty($options['logo'])): ?>
                            <img src="<?php echo htmlspecialchars($options['logo'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php $this->options->name(); ?>" class="footer-logo">
                            <?php else: ?>
                            <span class="footer-brand-name"><?php $this->options->name(); ?></span>
                            <?php endif; ?>
                        </div>
                        <p class="footer-desc"><?php $this->options->description(); ?></p>
                        <?php renderSocialLinks($options); ?>
                    </div>
                    <div class="footer-col">
                        <h4 class="footer-col-title">站点</h4>
                        <ul class="footer-links">
                            <li><a href="<?php $this->options->siteUrl(); ?>">首页</a></li>
                            <li><a href="<?php $this->options->feedUrl(); ?>">RSS 订阅</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4 class="footer-col-title">统计</h4>
                        <ul class="footer-stats">
                            <li><span class="stat-num"><?php echo $this->count('篇文章'); ?></span> 文章</li>
                            <li><span class="stat-num"><?php $catCount = $this->widget('Widget_Abstract_Metas', 'type=category'); echo $catCount->length; ?></span> 分类</li>
                            <li><span class="stat-num"><?php $tagCount = $this->widget('Widget_Abstract_Metas', 'type=tag'); echo $tagCount->length; ?></span> 标签</li>
                        </ul>
                    </div>
                </div>
                <div class="footer-bottom">
                    <p>&copy; <?php echo date('Y'); ?> <?php $this->options->name(); ?>. Powered by <a href="https://typecho.org" target="_blank" rel="noopener">Typecho</a> & <a href="https://github.com/user/horizon" target="_blank" rel="noopener">Horizon</a></p>
                    <a href="#top" class="back-to-top" title="回到顶部">
                        <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 19V5M5 12l7-7 7 7"/></svg>
                    </a>
                </div>
            </div>
        </footer>
    </div>

    <script defer src="<?php $this->options->themeUrl('/assets/js/main.js'); ?>?v=3.0"></script>
    <?php if ($options['showCodeHighlight']): ?>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js" integrity="sha256-g3pvpbDHNrUrveKythkPMF2j/J7UFoHbUyFQcFe1yEY=" crossorigin="anonymous" onload="hljs.highlightAll()"></script>
    <?php endif; ?>
    <?php $this->footer(); ?>
</body>
</html>
