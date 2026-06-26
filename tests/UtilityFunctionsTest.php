<?php
/**
 * Horizon Theme - Utility Functions Tests
 */

use PHPUnit\Framework\TestCase;

class UtilityFunctionsTest extends TestCase
{
    /**
     * Test getWordCount with Chinese text
     */
    public function testGetWordCountChinese(): void
    {
        $result = getWordCount('你好世界这是测试');
        $this->assertEquals(8, $result);
    }

    /**
     * Test getWordCount with HTML tags
     */
    public function testGetWordCountWithHtml(): void
    {
        $result = getWordCount('<p>你好</p><span>世界</span>');
        $this->assertEquals(4, $result);
    }

    /**
     * Test getWordCount large number formatting
     */
    public function testGetWordCountLargeNumber(): void
    {
        $text = str_repeat('好', 15000);
        $result = getWordCount($text);
        $this->assertStringContainsString('万', $result);
    }

    /**
     * Test getReadTime Chinese text
     */
    public function testGetReadTimeChinese(): void
    {
        $text = str_repeat('好', 400);
        $result = getReadTime($text);
        $this->assertEquals('1 分钟', $result);
    }

    /**
     * Test getReadTime mixed content
     */
    public function testGetReadTimeMixed(): void
    {
        $text = str_repeat('好', 200) . ' ' . str_repeat('word ', 200);
        $result = getReadTime($text);
        $this->assertEquals('1 分钟', $result);
    }

    /**
     * Test getReadTime minimum 1 minute
     */
    public function testGetReadTimeMinimum(): void
    {
        $result = getReadTime('短文本');
        $this->assertEquals('1 分钟', $result);
    }

    /**
     * Test getExcerpt short text
     */
    public function testGetExcerptShort(): void
    {
        $result = getExcerpt('短文本', 100);
        $this->assertEquals('短文本', $result);
    }

    /**
     * Test getExcerpt long text truncation
     */
    public function testGetExcerptLong(): void
    {
        $text = str_repeat('这是一段很长的文本。', 20);
        $result = getExcerpt($text, 20);
        $this->assertStringEndsWith('...', $result);
        $this->assertLessThanOrEqual(23, mb_strlen($result));
    }

    /**
     * Test getExcerpt strips HTML
     */
    public function testGetExcerptStripsHtml(): void
    {
        $result = getExcerpt('<p>测试文本</p>', 100);
        $this->assertStringNotContainsString('<p>', $result);
        $this->assertEquals('测试文本', $result);
    }
}
