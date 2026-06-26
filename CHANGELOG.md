# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/), and this project adheres to [Semantic Versioning](https://semver.org/).

## [1.1.0] - 2025-06-26

### Added
- 移动端汉堡菜单按钮 HTML 元素
- LICENSE 文件 (MIT)
- Skip Navigation 链接 (a11y)
- 装饰性 SVG `aria-hidden` 属性
- 导航链接 `aria-current` 属性
- CSS `prefers-reduced-motion` 适配
- Content Security Policy (CSP) 支持
- CDN 资源 SRI 完整性校验
- `getThemeOptions()` 静态缓存
- `getRelatedPosts()` 静态缓存 + Typecho 路由 permalink
- Google Fonts 字重精简 (17→9)
- CSS 压缩合并 (54KB→38KB)
- build.sh 构建脚本

### Fixed
- 搜索页 JavaScript XSS 漏洞 (`addslashes` → `json_encode`)
- 模板输出未转义 XSS 漏洞 (search/functions/post/index/archive/header/footer)
- `links.php` JSON 解析缺少错误处理
- `getReadTime()` 改为同时计算中英文阅读时间
- CSS `:has()` 选择器兼容方案 (Firefox < 121)
- CSS 注释语法错误
- 重复 `@media print` 块合并
- CDN 域名 `dns-prefetch` 预解析

### Changed
- `themeConfig()` 按功能拆分为 6 个子函数
- 所有函数添加 PHPDoc 文档注释和类型声明
- JavaScript 添加 `defer` 属性
- 许可证统一为 MIT (style.css GPL→MIT)
- README 新增 TODO 待完成清单

### Removed
- 未使用的 `sidebar.php`

## [1.0.0] - 2025-06-18

### Added
- 初始版本发布
- 暗色/亮色模式
- 代码高亮 (Highlight.js)
- 响应式设计
- 文章目录 (TOC)
- 搜索功能
- 图片灯箱
- 相关文章推荐
- 分类/标签/归档页面
- 友情链接页面
- 国际化骨架 (hz_t)
