(function () {
    'use strict';

    var html = document.documentElement;
    var savedTheme = localStorage.getItem('horizon-theme');

    /* ========== Theme ========== */
    function setTheme(theme) {
        html.setAttribute('data-theme', theme);
        localStorage.setItem('horizon-theme', theme);
    }

    function getPreferredTheme() {
        if (savedTheme) return savedTheme;
        return html.getAttribute('data-theme') || 'auto';
    }

    function resolveTheme(theme) {
        if (theme === 'auto') {
            return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
        }
        return theme;
    }

    function initTheme() {
        var theme = getPreferredTheme();
        setTheme(resolveTheme(theme));
    }

    initTheme();

    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', function () {
        if (getPreferredTheme() === 'auto') {
            setTheme(resolveTheme('auto'));
        }
    });

    var themeToggle = document.querySelector('.theme-toggle');
    if (themeToggle) {
        themeToggle.addEventListener('click', function () {
            var current = html.getAttribute('data-theme');
            var next = current === 'dark' ? 'light' : 'dark';
            setTheme(next);
            localStorage.setItem('horizon-theme', next);
        });
    }

    /* ========== Mobile Nav ========== */
    var mobileToggle = document.querySelector('.mobile-menu-toggle');
    var mobileNav = document.querySelector('.mobile-nav');
    if (mobileToggle && mobileNav) {
        mobileToggle.addEventListener('click', function () {
            mobileNav.classList.toggle('active');
            mobileToggle.classList.toggle('active');
        });

        document.addEventListener('click', function (e) {
            if (!mobileNav.contains(e.target) && !mobileToggle.contains(e.target)) {
                mobileNav.classList.remove('active');
                mobileToggle.classList.remove('active');
            }
        });
    }

    /* ========== Search ========== */
    var searchToggle = document.querySelector('.search-toggle');
    var searchOverlay = document.querySelector('.search-overlay');
    var searchClose = document.querySelector('.search-close');
    var searchInput = document.querySelector('.search-input');

    function openSearch() {
        if (searchOverlay) {
            searchOverlay.classList.add('active');
            setTimeout(function () {
                if (searchInput) searchInput.focus();
            }, 100);
        }
    }

    function closeSearch() {
        if (searchOverlay) searchOverlay.classList.remove('active');
    }

    if (searchToggle) searchToggle.addEventListener('click', openSearch);
    if (searchClose) searchClose.addEventListener('click', closeSearch);
    if (searchOverlay) {
        searchOverlay.addEventListener('click', function (e) {
            if (e.target === searchOverlay) closeSearch();
        });
    }

    document.addEventListener('keydown', function (e) {
        if ((e.metaKey || e.ctrlKey) && e.key === 'k') {
            e.preventDefault();
            openSearch();
        }
        if (e.key === 'Escape') closeSearch();
    });

    /* ========== Table of Contents ========== */
    function generateTOC() {
        var content = document.getElementById('post-content');
        var tocNav = document.getElementById('toc-nav');
        if (!content || !tocNav) return;

        var headings = content.querySelectorAll('h1, h2, h3, h4');
        if (headings.length < 2) return;

        var tocHTML = '';
        headings.forEach(function (heading, index) {
            var id = 'heading-' + index;
            heading.id = id;
            var level = parseInt(heading.tagName.charAt(1));
            tocHTML += '<a href="#' + id + '" class="toc-h' + level + '">' + heading.textContent + '</a>';
        });

        tocNav.innerHTML = tocHTML;

        var tocLinks = tocNav.querySelectorAll('a');
        var ticking = false;

        function updateActiveTOC() {
            var scrollPos = window.scrollY + 140;
            var activeIndex = 0;

            headings.forEach(function (heading, index) {
                if (heading.offsetTop <= scrollPos) activeIndex = index;
            });

            tocLinks.forEach(function (link, index) {
                link.classList.toggle('active', index === activeIndex);
            });
        }

        window.addEventListener('scroll', function () {
            if (!ticking) {
                window.requestAnimationFrame(function () {
                    updateActiveTOC();
                    ticking = false;
                });
                ticking = true;
            }
        });

        updateActiveTOC();
    }

    generateTOC();

    /* ========== Back to Top ========== */
    var backToTop = document.querySelector('a[href="#top"]');
    if (backToTop) {
        backToTop.addEventListener('click', function (e) {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    /* ========== Smart Header Hide/Show ========== */
    var header = document.querySelector('.horizon-header');
    if (header) {
        var lastScrollY = 0;
        var headerHidden = false;
        header.style.transition = 'transform 0.3s ease, background-color 0.3s ease, border-color 0.3s ease';

        window.addEventListener('scroll', function () {
            var currentScrollY = window.scrollY;
            if (currentScrollY > 300) {
                if (currentScrollY > lastScrollY && !headerHidden) {
                    header.style.transform = 'translateY(-100%)';
                    headerHidden = true;
                } else if (currentScrollY < lastScrollY && headerHidden) {
                    header.style.transform = 'translateY(0)';
                    headerHidden = false;
                }
            } else {
                header.style.transform = 'translateY(0)';
                headerHidden = false;
            }
            lastScrollY = currentScrollY;
        });
    }

    /* ========== macOS Code Blocks ========== */
    var langNames = {
        'php': 'PHP', 'javascript': 'JavaScript', 'js': 'JavaScript',
        'typescript': 'TypeScript', 'ts': 'TypeScript',
        'python': 'Python', 'py': 'Python',
        'css': 'CSS', 'scss': 'SCSS', 'less': 'LESS',
        'html': 'HTML', 'xml': 'XML',
        'sql': 'SQL',
        'bash': 'Bash', 'sh': 'Shell', 'shell': 'Shell', 'zsh': 'Zsh',
        'json': 'JSON', 'yaml': 'YAML', 'yml': 'YAML',
        'go': 'Go', 'golang': 'Go',
        'rust': 'Rust', 'rs': 'Rust',
        'java': 'Java',
        'c': 'C', 'cpp': 'C++', 'c++': 'C++',
        'ruby': 'Ruby', 'rb': 'Ruby',
        'swift': 'Swift', 'kotlin': 'Kotlin',
        'dockerfile': 'Dockerfile', 'docker': 'Dockerfile',
        'markdown': 'Markdown', 'md': 'Markdown',
        'nginx': 'Nginx', 'apache': 'Apache',
        'makefile': 'Makefile', 'cmake': 'CMake',
        'diff': 'Diff', 'git': 'Git',
        'text': 'Text', 'plaintext': 'Text', 'txt': 'Text'
    };

    var langColors = {
        'php': '#777bb4', 'javascript': '#f7df1e', 'js': '#f7df1e',
        'typescript': '#3178c6', 'ts': '#3178c6',
        'python': '#3776ab', 'py': '#3776ab',
        'css': '#264de4', 'scss': '#cc6699',
        'html': '#e34c26', 'xml': '#f16529',
        'sql': '#e38c00',
        'bash': '#4eaa25', 'sh': '#4eaa25', 'shell': '#4eaa25',
        'json': '#292929', 'yaml': '#cb171e', 'yml': '#cb171e',
        'go': '#00add8', 'golang': '#00add8',
        'rust': '#dea584', 'rs': '#dea584',
        'java': '#ed8b00',
        'c': '#555555', 'cpp': '#f34b7d', 'c++': '#f34b7d',
        'ruby': '#cc342d', 'rb': '#cc342d',
        'swift': '#fa7343', 'kotlin': '#a97bff',
        'dockerfile': '#2496ed', 'docker': '#2496ed',
        'markdown': '#083fa1', 'md': '#083fa1',
        'nginx': '#009639',
        'makefile': '#427819'
    };

    var codeBlocks = document.querySelectorAll('.markdown-body pre code');
    codeBlocks.forEach(function (block) {
        var pre = block.parentElement;
        if (pre.parentElement && pre.parentElement.classList.contains('code-block')) return;

        var lang = '';
        var cls = block.className || '';
        var m = cls.match(/language-(\w+)/);
        if (m) lang = m[1].toLowerCase();
        if (!lang) {
            var m2 = cls.match(/lang-(\w+)/);
            if (m2) lang = m2[1].toLowerCase();
        }

        var langLabel = langNames[lang] || lang.toUpperCase() || 'Code';
        var langColor = langColors[lang] || '';

        var wrapper = document.createElement('div');
        wrapper.className = 'code-block';

        var header = document.createElement('div');
        header.className = 'code-header';
        header.innerHTML = '<div class="code-header-left">' +
            '<div class="code-dots"><span class="code-dot red"></span><span class="code-dot yellow"></span><span class="code-dot green"></span></div>' +
            '</div>' +
            '<div class="code-header-right">' +
            (langLabel ? '<span class="code-lang" style="' + (langColor ? 'color:' + langColor : '') + '">' + langLabel + '</span>' : '') +
            '<button class="code-copy-btn" aria-label="复制代码">复制</button>' +
            '</div>';

        var body = document.createElement('div');
        body.className = 'code-body';
        body.appendChild(pre.cloneNode(true));

        wrapper.appendChild(header);
        wrapper.appendChild(body);
        pre.parentNode.replaceChild(wrapper, pre);

        var newPre = body.querySelector('pre');
        if (newPre) {
            newPre.style.margin = '0';
            newPre.style.border = 'none';
            newPre.style.borderRadius = '0';
        }

        var isCollapsed = newPre && newPre.scrollHeight > 300;
        if (isCollapsed) {
            wrapper.classList.add('collapsed');
            var expandBtn = document.createElement('button');
            expandBtn.className = 'code-expand-btn';
            expandBtn.textContent = '展开代码 ▾';
            wrapper.appendChild(expandBtn);

            expandBtn.addEventListener('click', function () {
                wrapper.classList.remove('collapsed');
                expandBtn.textContent = '收起代码 ▴';
            });

            wrapper.addEventListener('mouseenter', function () {
                if (wrapper.classList.contains('collapsed')) {
                    expandBtn.textContent = '展开代码 ▾';
                }
            });
        }

        var copyBtn = header.querySelector('.code-copy-btn');
        copyBtn.addEventListener('click', function () {
            var codeText = body.querySelector('code');
            if (!codeText) return;
            var text = codeText.textContent;
            navigator.clipboard.writeText(text).then(function () {
                copyBtn.textContent = '已复制!';
                setTimeout(function () { copyBtn.textContent = '复制'; }, 2000);
            }).catch(function () {
                var ta = document.createElement('textarea');
                ta.value = text;
                document.body.appendChild(ta);
                ta.select();
                document.execCommand('copy');
                document.body.removeChild(ta);
                copyBtn.textContent = '已复制!';
                setTimeout(function () { copyBtn.textContent = '复制'; }, 2000);
            });
        });
    });

    /* ========== Reading Progress (Single Post) ========== */
    var postContent = document.getElementById('post-content');
    if (postContent) {
        var progressBar = document.createElement('div');
        progressBar.style.cssText = 'position:fixed;top:0;left:0;height:3px;background:var(--primary-gradient);z-index:1001;transition:width 100ms linear;width:0;border-radius:0 2px 2px 0;';
        document.body.appendChild(progressBar);

        function updateProgress() {
            var rect = postContent.getBoundingClientRect();
            var total = rect.height - window.innerHeight;
            var scrolled = -rect.top;
            var progress = Math.min(Math.max(scrolled / total * 100, 0), 100);
            progressBar.style.width = progress + '%';
        }

        var progressTicking = false;
        window.addEventListener('scroll', function () {
            if (!progressTicking) {
                window.requestAnimationFrame(function () {
                    updateProgress();
                    progressTicking = false;
                });
                progressTicking = true;
            }
        });
    }

    /* ========== Image Lazy Load & Zoom ========== */
    document.querySelectorAll('img:not([loading])').forEach(function(img) {
        img.setAttribute('loading', 'lazy');
    });

    var images = document.querySelectorAll('.markdown-body img');
    images.forEach(function (img) {
        if (img.closest('a')) return;
        img.style.cursor = 'zoom-in';
        img.addEventListener('click', function () {
            if (img.classList.contains('img-zoomed')) {
                img.classList.remove('img-zoomed');
                img.style.cssText = '';
                overlay.style.display = 'none';
                document.body.style.overflow = '';
            } else {
                img.classList.add('img-zoomed');
                img.style.cssText = 'position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);max-width:90vw;max-height:90vh;width:auto;height:auto;z-index:3000;cursor:zoom-out;border-radius:8px;box-shadow:0 20px 60px rgba(0,0,0,0.3);';
                overlay.style.display = 'block';
                document.body.style.overflow = 'hidden';
            }
        });
    });

    var overlay = document.createElement('div');
    overlay.style.cssText = 'position:fixed;inset:0;background:rgba(0,0,0,0.7);z-index:2999;display:none;backdrop-filter:blur(4px);';
    document.body.appendChild(overlay);

    document.addEventListener('click', function (e) {
        if (e.target === overlay) {
            overlay.style.display = 'none';
            var zoomed = document.querySelector('.img-zoomed');
            if (zoomed) {
                zoomed.classList.remove('img-zoomed');
                zoomed.style.cssText = '';
                document.body.style.overflow = '';
            }
        }
    });
})();
