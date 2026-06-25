<?php
/**
 * Horizon Theme for Typecho
 * 标签页面模板
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<link rel="stylesheet" href="<?php $this->options->themeUrl('/assets/css/tags.css'); ?>">

<div class="container">
    <div class="content-area">
        <div class="archive-header">
            <h1 class="archive-title">
                <svg aria-hidden="true" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"/><line x1="7" y1="7" x2="7.01" y2="7"/></svg>
                全部标签
            </h1>
        </div>

        <div class="tags-canvas" id="tagsCanvas">
            <?php
            $colors = [
                ['#6366f1','#818cf8'],
                ['#8b5cf6','#a78bfa'],
                ['#ec4899','#f472b6'],
                ['#f43f5e','#fb7185'],
                ['#f97316','#fb923c'],
                ['#eab308','#facc15'],
                ['#22c55e','#4ade80'],
                ['#14b8a6','#2dd4bf'],
                ['#06b6d4','#22d3ee'],
                ['#3b82f6','#60a5fa'],
                ['#6366f1','#a5b4fc'],
                ['#d946ef','#e879f9'],
            ];
            $i = 0;
            $tags = $this->widget('Widget_Metas_Tag_Cloud');
            while ($tags->next()):
                $count = $tags->count;
                $color = $colors[$i % count($colors)];
                $size = max(0.9, min(1.6, 0.9 + ($count * 0.15)));
                $delay = ($i * 0.3) % 3;
                $i++;
            ?>
            <a href="<?php $tags->permalink(); ?>" class="tag-float" style="
                font-size: <?php echo $size; ?>rem;
                background: linear-gradient(135deg, <?php echo $color[0]; ?>, <?php echo $color[1]; ?>);
                animation-delay: <?php echo $delay; ?>s;
                animation-duration: <?php echo 2.5 + ($i % 3) * 0.5; ?>s;
                box-shadow: 0 4px 12px <?php echo $color[0]; ?>40;
            ">
                <?php $tags->name(); ?>
                <span class="tag-count-badge"><?php echo $count; ?></span>
            </a>
            <?php endwhile; ?>
        </div>
    </div>
</div>

<script src="<?php $this->options->themeUrl('/assets/js/tags.js'); ?>"></script>
<?php $this->need('footer.php'); ?>
