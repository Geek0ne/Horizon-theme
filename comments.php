<?php
/**
 * Horizon Theme for Typecho
 * 评论模板
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $options->owner->uid) {
            $commentClass = 'comment-author-admin';
        } else {
            $commentClass = 'comment-author-user';
        }
    } else {
        $commentClass = 'comment-author-guest';
    }
    $level = $comments->levels;
    if ($comments->levels > 0) {
        $commentClass .= ' comment-child';
    }
    ?>
    <li id="li-<?php $comments->theId(); ?>" class="comment-body <?php echo $commentClass; ?>">
        <div class="comment-main">
            <div class="comment-header">
                <div class="comment-avatar">
                    <?php echo $comments->gravatar(48); ?>
                </div>
                <div class="comment-info">
                    <span class="comment-author"><?php $comments->author(); ?></span>
                    <time class="comment-time" datetime="<?php $comments->date('c'); ?>">
                        <?php $comments->date('Y-m-d H:i'); ?>
                    </time>
                </div>
            </div>
            <div class="comment-content markdown-body">
                <?php $comments->content(); ?>
            </div>
            <div class="comment-actions">
                <?php $comments->reply(); ?>
            </div>
        </div>
        <?php if ($comments->children): ?>
        <div class="comment-children">
            <?php $comments->threadedComments($options); ?>
        </div>
        <?php endif; ?>
    </li>
    <?php
}

if ($this->have()): ?>
<div class="comments-section" id="comments">
    <h2 class="comments-title">
        <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
        评论 (<?php $this->commentsNum(); ?>)
    </h2>
    <ul class="comment-list">
        <?php $this->comments('comment', array('callback' => 'threadedComments')); ?>
    </ul>
</div>
<?php endif; ?>

<?php if ($this->allow('comment')): ?>
<div class="comment-form" id="respond">
    <h2 class="comment-form-title">发表评论</h2>
    <form action="<?php $this->commentUrl(); ?>" method="post" class="comment-form-inner">
        <?php if ($this->user->hasLogin()): ?>
        <div class="comment-form-logged">
            <span>登录身份：<?php $this->user->screenName(); ?> <a href="<?php $this->options->logoutUrl(); ?>" title="退出">退出</a></span>
        </div>
        <?php endif; ?>
        <div class="comment-form-group">
            <label for="author">昵称 <?php if ($this->requireNameField()): $this->neededFieldMark(); endif; ?></label>
            <input type="text" name="author" id="author" class="form-input" value="<?php $this->commentAuthor(); ?>" <?php if ($this->requireNameField()): $this->required(); endif; ?>>
        </div>
        <div class="comment-form-group">
            <label for="mail">邮箱 <?php if ($this->requireMailField()): $this->neededFieldMark(); endif; ?></label>
            <input type="email" name="mail" id="mail" class="form-input" value="<?php $this->commentMail(); ?>" <?php if ($this->requireMailField()): $this->required(); endif; ?>>
        </div>
        <div class="comment-form-group">
            <label for="url">网站</label>
            <input type="url" name="url" id="url" class="form-input" value="<?php $this->commentUrl(); ?>">
        </div>
        <div class="comment-form-group">
            <label for="textarea">评论内容 <?php $this->neededFieldMark(); ?></label>
            <textarea name="text" id="textarea" class="form-textarea" rows="5" <?php $this->required(); ?>><?php $this->commentContent(); ?></textarea>
        </div>
        <div class="comment-form-submit">
            <?php $this->commentSubmit(); ?>
        </div>
    </form>
</div>
<?php else: ?>
<div class="comment-locked">
    <p>评论已关闭</p>
</div>
<?php endif; ?>
