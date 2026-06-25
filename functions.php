<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form)
{
    $logo = new \Typecho\Widget\Helper\Form\Element\Text(
        'logo',
        null,
        null,
        _t('站点 Logo'),
        _t('输入 Logo 图片 URL，留空则显示站点标题')
    );
    $form->addInput($logo);

    $favicon = new \Typecho\Widget\Helper\Form\Element\Text(
        'favicon',
        null,
        null,
        _t('Favicon'),
        _t('输入 Favicon URL')
    );
    $form->addInput($favicon);

    $showToc = new \Typecho\Widget\Helper\Form\Element\Radio(
        'showToc',
        array('1' => _t('显示'), '0' => _t('隐藏')),
        '1',
        _t('文章目录'),
        _t('文章页面是否显示侧边目录')
    );
    $form->addInput($showToc);

    $showCodeHighlight = new \Typecho\Widget\Helper\Form\Element\Radio(
        'showCodeHighlight',
        array('1' => _t('启用'), '0' => _t('禁用')),
        '1',
        _t('代码高亮'),
        _t('是否启用代码高亮')
    );
    $form->addInput($showCodeHighlight);

    $codeTheme = new \Typecho\Widget\Helper\Form\Element\Select(
        'codeTheme',
        array(
            'github-dark' => _t('GitHub Dark'),
            'github' => _t('GitHub Light'),
            'monokai' => _t('Monokai'),
            'dracula' => _t('Dracula'),
            'nord' => _t('Nord'),
        ),
        'github-dark',
        _t('代码主题'),
        _t('选择代码高亮主题')
    );
    $form->addInput($codeTheme);

    $codeStyle = new \Typecho\Widget\Helper\Form\Element\Select(
        'codeStyle',
        array(
            'dark' => _t('暗色 (Dark)'),
            'light' => _t('亮色 (Light)'),
        ),
        'dark',
        _t('代码框风格'),
        _t('选择代码框的明暗风格')
    );
    $form->addInput($codeStyle);

    $showWordCount = new \Typecho\Widget\Helper\Form\Element\Radio(
        'showWordCount',
        array('1' => _t('显示'), '0' => _t('隐藏')),
        '1',
        _t('字数统计'),
        _t('文章页是否显示字数统计')
    );
    $form->addInput($showWordCount);

    $showReadTime = new \Typecho\Widget\Helper\Form\Element\Radio(
        'showReadTime',
        array('1' => _t('显示'), '0' => _t('隐藏')),
        '1',
        _t('阅读时间'),
        _t('文章页是否显示预估阅读时间')
    );
    $form->addInput($showReadTime);

    $showAuthor = new \Typecho\Widget\Helper\Form\Element\Radio(
        'showAuthor',
        array('1' => _t('显示'), '0' => _t('隐藏')),
        '1',
        _t('作者信息'),
        _t('文章页是否显示作者卡片')
    );
    $form->addInput($showAuthor);

    $showShareButtons = new \Typecho\Widget\Helper\Form\Element\Radio(
        'showShareButtons',
        array('1' => _t('显示'), '0' => _t('隐藏')),
        '1',
        _t('分享按钮'),
        _t('文章页是否显示分享按钮')
    );
    $form->addInput($showShareButtons);

    $darkMode = new \Typecho\Widget\Helper\Form\Element\Select(
        'darkMode',
        array(
            'auto' => _t('跟随系统'),
            'light' => _t('亮色'),
            'dark' => _t('暗色'),
        ),
        'auto',
        _t('暗色模式'),
        _t('默认颜色模式')
    );
    $form->addInput($darkMode);

    $showCategories = new \Typecho\Widget\Helper\Form\Element\Radio(
        'showCategories',
        array('1' => _t('开启'), '0' => _t('关闭')),
        '1',
        _t('分类导航页'),
        _t('顶部导航栏是否显示分类页面')
    );
    $form->addInput($showCategories);

    $showTags = new \Typecho\Widget\Helper\Form\Element\Radio(
        'showTags',
        array('1' => _t('开启'), '0' => _t('关闭')),
        '1',
        _t('标签导航页'),
        _t('顶部导航栏是否显示标签页面')
    );
    $form->addInput($showTags);

    $showArchives = new \Typecho\Widget\Helper\Form\Element\Radio(
        'showArchives',
        array('1' => _t('开启'), '0' => _t('关闭')),
        '1',
        _t('归档导航页'),
        _t('顶部导航栏是否显示归档页面')
    );
    $form->addInput($showArchives);

    $loadGoogleFonts = new \Typecho\Widget\Helper\Form\Element\Radio(
        'loadGoogleFonts',
        array('1' => _t('开启'), '0' => _t('关闭')),
        '1',
        _t('Google Fonts'),
        _t('是否加载 Google Fonts（关闭可提升国内访问速度）')
    );
    $form->addInput($loadGoogleFonts);

    $showCopyright = new \Typecho\Widget\Helper\Form\Element\Radio(
        'showCopyright',
        array('1' => _t('开启'), '0' => _t('关闭')),
        '0',
        _t('版权声明'),
        _t('文章底部是否显示 CC 版权声明')
    );
    $form->addInput($showCopyright);

    $githubUrl = new \Typecho\Widget\Helper\Form\Element\Text(
        'githubUrl', null, '', _t('GitHub 地址'), _t('输入 GitHub 个人主页 URL')
    );
    $form->addInput($githubUrl);

    $weiboUrl = new \Typecho\Widget\Helper\Form\Element\Text(
        'weiboUrl', null, '', _t('微博地址'), _t('输入微博个人主页 URL')
    );
    $form->addInput($weiboUrl);

    $twitterUrl = new \Typecho\Widget\Helper\Form\Element\Text(
        'twitterUrl', null, '', _t('Twitter 地址'), _t('输入 Twitter 个人主页 URL')
    );
    $form->addInput($twitterUrl);

    $emailAddr = new \Typecho\Widget\Helper\Form\Element\Text(
        'emailAddr', null, '', _t('邮箱地址'), _t('输入联系邮箱')
    );
    $form->addInput($emailAddr);

    $friendLinks = new \Typecho\Widget\Helper\Form\Element\Textarea(
        'friendLinks',
        null,
        '',
        _t('友情链接'),
        _t('JSON 格式，示例：[{"name":"站点名","url":"https://...","avatar":"https://...","desc":"描述"}]')
    );
    $form->addInput($friendLinks);

    $language = new \Typecho\Widget\Helper\Form\Element\Select(
        'language',
        array(
            'zh_CN' => _t('简体中文'),
            'en_US' => _t('English'),
        ),
        'zh_CN',
        _t('界面语言'),
        _t('选择主题界面语言（需对应语言文件）')
    );
    $form->addInput($language);

    $primaryColor = new \Typecho\Widget\Helper\Form\Element\Text(
        'primaryColor',
        null,
        '#6366f1',
        _t('主题色'),
        _t('输入主题色 HEX 值')
    );
    $form->addInput($primaryColor);

    $customCSS = new \Typecho\Widget\Helper\Form\Element\Textarea(
        'customCSS',
        null,
        null,
        _t('自定义 CSS'),
        _t('在此输入自定义 CSS 代码')
    );
    $form->addInput($customCSS);
}

function themeFields($layout)
{
    $coverImage = new \Typecho\Widget\Helper\Form\Element\Text(
        'coverImage',
        null,
        null,
        _t('封面图'),
        _t('文章封面图 URL')
    );
    $layout->addItem($coverImage);

    $excerpt = new \Typecho\Widget\Helper\Form\Element\Textarea(
        'excerpt',
        null,
        null,
        _t('摘要'),
        _t('自定义摘要，留空则自动截取')
    );
    $layout->addItem($excerpt);

    $sticky = new \Typecho\Widget\Helper\Form\Element\Radio(
        'sticky',
        array('1' => _t('是'), '0' => _t('否')),
        '0',
        _t('置顶文章'),
        _t('是否将此文章置顶显示')
    );
    $layout->addItem($sticky);
}

function getThemeOptions()
{
    static $cached = null;
    if ($cached !== null) return $cached;

    $options = Helper::options()->custom;
    $defaults = array(
        'logo' => '',
        'favicon' => '',
        'showToc' => '1',
        'showCodeHighlight' => '1',
        'codeTheme' => 'github-dark',
        'codeStyle' => 'dark',
        'showWordCount' => '1',
        'showReadTime' => '1',
        'showAuthor' => '1',
        'showShareButtons' => '1',
        'darkMode' => 'auto',
        'showCategories' => '1',
        'showTags' => '1',
        'showArchives' => '1',
        'loadGoogleFonts' => '1',
        'showCopyright' => '0',
        'githubUrl' => '',
        'weiboUrl' => '',
        'twitterUrl' => '',
        'emailAddr' => '',
        'friendLinks' => '',
        'language' => 'zh_CN',
        'primaryColor' => '#6366f1',
        'customCSS' => '',
    );
    if (is_array($options)) {
        $cached = array_merge($defaults, $options);
    } else {
        $cached = $defaults;
    }
    return $cached;
}

function hz_t($key, $fallback = '')
{
    static $lang = null;
    if ($lang === null) {
        $options = getThemeOptions();
        $locale = $options['language'] ?? 'zh_CN';
        $langFile = __DIR__ . '/languages/' . $locale . '.php';
        $lang = file_exists($langFile) ? include $langFile : array();
    }
    return isset($lang[$key]) ? $lang[$key] : ($fallback ?: $key);
}

function renderBreadcrumb($archive)
{
    $siteUrl = \Widget\Options::alloc()->siteUrl;
    echo '<nav class="breadcrumb" aria-label="breadcrumb"><ol>';
    echo '<li><a href="' . htmlspecialchars($siteUrl, ENT_QUOTES, 'UTF-8') . '">首页</a></li>';

    if ($archive->is('post')) {
        $cats = $archive->categories;
        if (!empty($cats)) {
            echo '<li><a href="' . htmlspecialchars($cats[0]['permalink'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($cats[0]['name'], ENT_QUOTES, 'UTF-8') . '</a></li>';
        }
        echo '<li class="current">' . htmlspecialchars($archive->title, ENT_QUOTES, 'UTF-8') . '</li>';
    } elseif ($archive->is('category')) {
        echo '<li class="current">' . htmlspecialchars($archive->name, ENT_QUOTES, 'UTF-8') . '</li>';
    } elseif ($archive->is('tag')) {
        echo '<li class="current">' . htmlspecialchars($archive->name, ENT_QUOTES, 'UTF-8') . '</li>';
    } elseif ($archive->is('page')) {
        echo '<li class="current">' . htmlspecialchars($archive->title, ENT_QUOTES, 'UTF-8') . '</li>';
    }

    echo '</ol></nav>';
}

function getRelatedPosts($archive, $limit = 3)
{
    static $cache = [];
    $cid = $archive->cid;
    if (isset($cache[$cid])) return $cache[$cid];

    $cats = $archive->categories;
    if (empty($cats)) { $cache[$cid] = []; return []; }

    $catMid = $cats[0]['mid'];
    $db = \Typecho\Db::get();

    $rows = $db->fetchAll($db->select()
        ->from('table.contents')
        ->join('table.relationships', 'table.relationships.cid = table.contents.cid')
        ->where('table.relationships.mid = ?', $catMid)
        ->where('table.contents.cid != ?', $cid)
        ->where('table.contents.type = ?', 'post')
        ->where('table.contents.status = ?', 'publish')
        ->group('table.contents.cid')
        ->order('table.contents.created', \Typecho\Db::SORT_DESC)
        ->limit($limit));

    $result = [];
    $siteUrl = \Widget\Options::alloc()->siteUrl;
    foreach ($rows as $row) {
        $row['permalink'] = $siteUrl . '/index.php/archives/' . $row['cid'] . '/';
        $result[] = $row;
    }
    $cache[$cid] = $result;
    return $result;
}

function renderSocialLinks($options)
{
    $links = [];
    $github = '<a href="' . htmlspecialchars($options['githubUrl']) . '" target="_blank" rel="noopener" title="GitHub"><svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.3 3.44 9.8 8.21 11.39.6.1.8-.26.8-.58v-2.23c-3.34.73-4.03-1.42-4.03-1.42-.55-1.39-1.33-1.76-1.33-1.76-1.09-.75.08-.73.08-.73 1.21.08 1.84 1.24 1.84 1.24 1.07 1.83 2.81 1.3 3.49 1 .1-.78.42-1.31.76-1.6-2.67-.31-5.47-1.33-5.47-5.93 0-1.31.47-2.38 1.24-3.22-.12-.3-.54-1.52.12-3.18 0 0 1.01-.32 3.3 1.23.96-.27 1.98-.4 3-.4 1.02 0 2.05.14 3 .4 2.29-1.55 3.3-1.23 3.3-1.23.65 1.65.24 2.87.12 3.17.77.84 1.24 1.91 1.24 3.22 0 4.61-2.81 5.62-5.48 5.92.43.37.82 1.1.82 2.22v3.29c0 .32.19.69.8.58C20.57 21.8 24 17.3 24 12c0-6.63-5.37-12-12-12z"/></svg></a>';
    if (!empty($options['githubUrl'])) $links[] = $github;

    $weibo = '<a href="' . htmlspecialchars($options['weiboUrl']) . '" target="_blank" rel="noopener" title="微博"><svg width="20" height="20" viewBox="0 0 24 24" fill="#e6162d"><path d="M10.098 20.323c-3.977.391-7.414-1.406-7.672-4.02-.259-2.609 2.759-5.047 6.74-5.441 3.979-.394 7.413 1.404 7.671 4.018.259 2.6-2.759 5.049-6.737 5.439zM16.967 9.237c-.266-.87-1.12-1.339-1.903-1.049-.785.289-1.18 1.187-.894 2.055.277.849 1.079 1.337 1.865 1.075.806-.255 1.199-1.185.932-2.081zM19.892 6.505c-.733-2.251-3.06-3.597-5.214-3.037-2.148.558-3.414 2.817-2.822 5.027.59 2.213 3.164 3.465 5.321 2.875 2.149-.587 3.445-2.612 2.715-4.865z"/></svg></a>';
    if (!empty($options['weiboUrl'])) $links[] = $weibo;

    $twitter = '<a href="' . htmlspecialchars($options['twitterUrl']) . '" target="_blank" rel="noopener" title="Twitter"><svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg></a>';
    if (!empty($options['twitterUrl'])) $links[] = $twitter;

    $email = '<a href="mailto:' . htmlspecialchars($options['emailAddr']) . '" title="邮箱"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg></a>';
    if (!empty($options['emailAddr'])) $links[] = $email;

    if (!empty($links)) {
        echo '<div class="social-links">' . implode('', $links) . '</div>';
    }
}

function getWordCount($text)
{
    $text = preg_replace('/<[^>]+>/', '', $text);
    $text = preg_replace('/\s+/', '', $text);
    mb_internal_encoding('UTF-8');
    $wordCount = mb_strlen($text);
    if ($wordCount >= 10000) {
        return number_format($wordCount / 10000, 1) . '万';
    }
    return $wordCount;
}

function getReadTime($text)
{
    $text = preg_replace('/<[^>]+>/', '', $text);
    $chineseCount = preg_match_all('/[\x{4e00}-\x{9fa5}]/u', $text);
    $englishText = preg_replace('/[\x{4e00}-\x{9fa5}]/u', '', $text);
    $englishWords = str_word_count($englishText);
    $totalWords = $chineseCount + $englishWords;
    $minutes = max(1, ceil($totalWords / 400));
    return $minutes . ' 分钟';
}

function getExcerpt($text, $length = 120)
{
    $text = preg_replace('/<[^>]+>/', '', $text);
    $text = str_replace(array("\n", "\r", "\t"), ' ', $text);
    $text = preg_replace('/\s+/', ' ', trim($text));
    if (mb_strlen($text, 'UTF-8') > $length) {
        $text = mb_substr($text, 0, $length, 'UTF-8') . '...';
    }
    return $text;
}
