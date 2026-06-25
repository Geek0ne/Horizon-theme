<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$options = getThemeOptions();
$siteUrl = $this->options->siteUrl;
$logo = !empty($options['logo']) ? $options['logo'] : '';
$favicon = !empty($options['favicon']) ? $options['favicon'] : '';

// SEO meta
$metaDesc = '';
$ogImage = '';
$ogType = 'website';
if ($this->is('post') || $this->is('page')) {
    $metaDesc = !empty($this->fields->excerpt) ? $this->fields->excerpt : getExcerpt($this->content, 160);
    $ogImage = !empty($this->fields->coverImage) ? $this->fields->coverImage : '';
    $ogType = 'article';
} else {
    $metaDesc = $this->options->description;
}
?>
<!DOCTYPE html>
<html lang="<?php $this->options->lang(); ?>" data-theme="<?php echo $options['darkMode']; ?>" data-code-style="<?php echo $options['codeStyle']; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo htmlspecialchars($metaDesc); ?>">
    <?php if (!empty($favicon)): ?>
    <link rel="icon" href="<?php echo $favicon; ?>" type="image/x-icon">
    <?php endif; ?>

    <?php /* Dynamic Title */ ?>
    <?php if ($this->is('post')): ?>
    <title><?php $this->title(); ?> - <?php $this->options->name(); ?></title>
    <?php elseif ($this->is('page')): ?>
    <title><?php $this->title(); ?> - <?php $this->options->name(); ?></title>
    <?php elseif ($this->is('category')): ?>
    <title>分类: <?php $this->name(); ?> - <?php $this->options->name(); ?></title>
    <?php elseif ($this->is('tag')): ?>
    <title>标签: <?php $this->name(); ?> - <?php $this->options->name(); ?></title>
    <?php elseif ($this->is('search')): ?>
    <title>搜索: <?php $this->keywords(); ?> - <?php $this->options->name(); ?></title>
    <?php else: ?>
    <title><?php $this->options->name(); ?> - <?php $this->options->description(); ?></title>
    <?php endif; ?>

    <?php /* Open Graph */ ?>
    <meta property="og:title" content="<?php $this->title(); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($metaDesc); ?>">
    <meta property="og:url" content="<?php $this->permalink(); ?>">
    <meta property="og:type" content="<?php echo $ogType; ?>">
    <meta property="og:site_name" content="<?php $this->options->name(); ?>">
    <?php if (!empty($ogImage)): ?>
    <meta property="og:image" content="<?php echo $ogImage; ?>">
    <?php endif; ?>
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php $this->title(); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($metaDesc); ?>">

    <?php /* Content Security Policy */ ?>
    <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self' 'unsafe-inline' https://cdnjs.cloudflare.com; style-src 'self' 'unsafe-inline' https://cdnjs.cloudflare.com https://fonts.googleapis.com; font-src 'self' https://fonts.gstatic.com; img-src 'self' data: https:; connect-src 'self';">
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

    <?php $this->head(); ?>

    <?php /* Google Fonts */ ?>
    <?php if ($options['loadGoogleFonts'] == '1'): ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Noto+Sans+SC:wght@300;400;500;600;700;900&family=JetBrains+Mono:wght@400;500;600&display=swap" onload="this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Noto+Sans+SC:wght@300;400;500;600;700;900&family=JetBrains+Mono:wght@400;500;600&display=swap"></noscript>
    <?php endif; ?>

    <link rel="stylesheet" href="<?php $this->options->themeUrl('/assets/css/style.css'); ?>?v=3.3">
    <?php if ($options['showCodeHighlight']): ?>
    <?php
    $highlightCssSri = [
        'github-dark' => 'sha256-nyCNAiECsdDHrr/s2OQsp5l9XeY2ZJ0rMepjCT2AkBk=',
        'github' => 'sha256-Oppd74ucMR5a5Dq96FxjEzGF7tTw2fZ/6ksAqDCM8GY=',
        'monokai' => 'sha256-z/Hp8gg0qcikRwAYwtQ/djNqHcXLedqjCKb0szWTXEU=',
        'dracula' => 'sha256-1GUXIXXTXUk/sWM+I3cAAivYSfoSMWR5CxaLgxissJA=',
        'nord' => 'sha256-x0ENSVyLqyhUcr5YNqAsPYKAZeNOYbxQkCZ4BS/HuKk=',
    ];
    $codeTheme = $options['codeTheme'];
    $sriAttr = isset($highlightCssSri[$codeTheme]) ? ' integrity="' . $highlightCssSri[$codeTheme] . '" crossorigin="anonymous"' : '';
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/<?php echo $codeTheme; ?>.min.css"<?php echo $sriAttr; ?>>
    <?php endif; ?>
    <?php if (!empty($options['primaryColor']) && preg_match('/^#[0-9a-fA-F]{6}$/', $options['primaryColor']) && $options['primaryColor'] !== '#6366f1'): ?>
    <style>:root { --primary: <?php echo $options['primaryColor']; ?>; --primary-light: <?php echo $options['primaryColor']; ?>22; }</style>
    <?php endif; ?>
    <?php if (!empty($options['customCSS'])): ?>
    <style><?php echo htmlspecialchars($options['customCSS'], ENT_QUOTES, 'UTF-8'); ?></style>
    <?php endif; ?>
</head>
<body>
    <div class="page-loader" id="pageLoader">
        <div class="loader-spinner"></div>
    </div>
    <div class="horizon-app">
        <header class="horizon-header">
            <div class="container">
                <div class="header-inner">
                    <a href="<?php echo $siteUrl; ?>" class="site-logo">
                        <?php if (!empty($logo)): ?>
                        <img src="<?php echo $logo; ?>" alt="<?php $this->options->name(); ?>">
                        <?php else: ?>
                        <span class="logo-text"><?php $this->options->name(); ?></span>
                        <?php endif; ?>
                    </a>
                    <nav class="main-nav">
                        <ul class="nav-list">
                            <li><a href="<?php echo $siteUrl; ?>"<?php if ($this->is('index')) echo ' class="active"'; ?>>首页</a></li>
                            <?php \Widget\Contents\Page\Rows::alloc()->to($pages); ?>
                            <?php while ($pages->next()): ?>
                            <li><a href="<?php $pages->permalink(); ?>"<?php if ($this->is('page', $pages->cid)) echo ' class="active"'; ?>><?php $pages->title(); ?></a></li>
                            <?php endwhile; ?>
                        </ul>
                    </nav>
                    <div class="header-actions">
                        <button class="search-toggle" aria-label="搜索">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
                        </button>
                        <button class="theme-toggle" aria-label="切换主题">
                            <svg class="icon-sun" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
                            <svg class="icon-moon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <div class="mobile-nav">
            <ul class="mobile-nav-list">
                <li><a href="<?php echo $siteUrl; ?>">首页</a></li>
                <?php \Widget\Contents\Page\Rows::alloc()->to($mobilePages); ?>
                <?php while ($mobilePages->next()): ?>
                <li><a href="<?php $mobilePages->permalink(); ?>"><?php $mobilePages->title(); ?></a></li>
                <?php endwhile; ?>
            </ul>
        </div>

        <div class="search-overlay">
            <div class="search-container">
                <form action="<?php echo $siteUrl; ?>" method="get" class="search-form">
                    <input type="text" name="s" placeholder="搜索文章..." class="search-input" autofocus>
                    <button type="submit" class="search-submit">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
                    </button>
                </form>
                <button class="search-close">&times;</button>
            </div>
        </div>

        <main class="horizon-main">
