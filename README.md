# Horizon — Typecho 现代化博客主题

> 一个精美、现代化、多功能的 Typecho 博客主题，参考 Hugo PaperMod 和 Hexo Butterfly 设计风格。

![Horizon Theme](screenshot.png)

## 功能特性

### 核心功能
- **暗色/亮色模式** — 支持跟随系统、手动切换，localStorage 持久化
- **代码高亮** — Highlight.js 驱动，30+ 语言识别，6 种高亮主题可选
- **macOS 风格代码框** — 红黄绿三色圆点 + 语言标签 + 复制按钮
- **代码框折叠** — 超长代码自动折叠，点击展开/收起
- **文章目录 (TOC)** — 自动生成，sticky 跟随滚动，滚动高亮当前标题
- **阅读进度条** — 顶部渐变进度条，实时显示阅读位置
- **搜索功能** — Ctrl+K 快捷键呼出，搜索结果关键词高亮
- **响应式设计** — 完美适配桌面、平板、手机三个断点
- **图片灯箱** — 点击文章图片放大查看，支持 ESC 关闭

### 页面模板
- **首页** — 文章卡片网格（2 列），支持封面图和摘要
- **文章页** — Markdown 渲染 + 面包屑导航 + 相关推荐 + 版权声明
- **分类页** — 卡片式分类展示
- **标签页** — 彩色浮动标签云动画
- **归档页** — 按年分组的时间线
- **搜索页** — 关键词高亮 + 空状态引导
- **404 页面** — 大号错误码 + 返回首页

### SEO 优化
- Open Graph + Twitter Card 元标签
- JSON-LD 结构化数据（WebSite / BlogPosting）
- 动态 `<title>` — 首页/文章/分类/标签/搜索各不同
- 语义化 HTML 标签
- 面包屑导航

### 评论系统
- 嵌套评论支持
- Gravatar 头像
- 管理员/用户/访客身份区分
- 评论表单验证

### 后台配置项
| 配置项 | 说明 |
|--------|------|
| 站点 Logo | 自定义 Logo URL |
| Favicon | 自定义图标 URL |
| 文章目录 | 开启/关闭 TOC |
| 代码高亮 | 开启/关闭 + 选择主题 |
| 代码框风格 | 暗色/亮色切换 |
| 字数统计 | 开启/关闭 |
| 阅读时间 | 开启/关闭 |
| 作者信息 | 开启/关闭 |
| 分享按钮 | 开启/关闭 |
| 暗色模式 | 跟随系统/亮色/暗色 |
| 分类/标签/归档页 | 各自独立开关 |
| Google Fonts | 开启/关闭 |
| 版权声明 | 开启/关闭 |
| 主题色 | 自定义 HEX 颜色 |
| 社交链接 | GitHub / 微博 / Twitter / 邮箱 |
| 自定义 CSS | 自由扩展样式 |

## 安装方法

### 1. 下载主题

```bash
git clone https://github.com/user/horizon-theme.git
```

或直接下载 ZIP 压缩包。

### 2. 上传到 Typecho

将 `Horizon` 文件夹上传到 Typecho 的 `usr/themes/` 目录：

```
typecho/
└── usr/
    └── themes/
        └── Horizon/        ← 主题目录
            ├── assets/
            │   ├── css/
            │   │   ├── style.css
            │   │   └── tags.css
            │   ├── js/
            │   │   ├── main.js
            │   │   └── tags.js
            │   └── img/
            ├── header.php
            ├── footer.php
            ├── index.php
            ├── post.php
            ├── page.php
            ├── archive.php
            ├── archives.php
            ├── search.php
            ├── categories.php
            ├── tags.php
            ├── comments.php
            ├── sidebar.php
            ├── 404.php
            ├── functions.php
            └── screenshot.png
```

### 3. 启用主题

1. 登录 Typecho 后台 → **控制台 → 外观**
2. 找到 **Horizon** 主题，点击 **启用**
3. 进入 **设置** 自定义主题选项

### 4. 创建导航页面

后台 → **管理 → 独立页面 → 新建**：

| 页面标题 | Slug | 模板 |
|----------|------|------|
| 分类 | categories | categories |
| 标签 | tags | tags |
| 归档 | archives-page | archives |

## 技术栈

- **模板引擎**: Typecho 1.3+
- **代码高亮**: Highlight.js 11.9
- **字体**: Inter / Noto Sans SC / JetBrains Mono（可关闭）
- **样式**: 纯 CSS（CSS Variables + 响应式）
- **脚本**: 原生 JavaScript（无框架依赖）

## 浏览器兼容

- Chrome / Edge 90+
- Firefox 90+
- Safari 14+
- 移动端 Chrome / Safari

## 许可证

MIT License

## 致谢

- [Typecho](https://typecho.org) — 轻量级博客程序
- [Hugo PaperMod](https://github.com/adityatelange/hugo-PaperMod) — 设计灵感
- [Hugo Theme Stack](https://github.com/CaiJimmy/hugo-theme-stack) — 卡片布局参考
- [Highlight.js](https://highlightjs.org) — 代码高亮库
