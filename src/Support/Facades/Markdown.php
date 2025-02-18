<?php namespace Laralips\Storm\Support\Facades;

use Laralips\Storm\Support\Facade;

/**
 * @method static string parse(string $markdown)
 * @method static string parseClean(string $markdown)
 * @method static string parseSafe(string $markdown)
 * @method static string parseLine(string $markdown)
 * @method static array getFrontMatter()
 * @method static void setParser(\League\CommonMark\Parser\MarkdownParserInterface $parser)
 * @method static void setRenderer(\League\CommonMark\Renderer\DocumentRendererInterface $renderer)
 * @method static \Laralips\Storm\Parse\Markdown enableAttributes()
 * @method static \Laralips\Storm\Parse\Markdown enableAutolinking()
 * @method static \Laralips\Storm\Parse\Markdown enableFootnotes()
 * @method static \Laralips\Storm\Parse\Markdown enableFrontMatter()
 * @method static \Laralips\Storm\Parse\Markdown enableHeadingPermalinks()
 * @method static \Laralips\Storm\Parse\Markdown enableInlineOnly()
 * @method static \Laralips\Storm\Parse\Markdown enableSafeMode()
 * @method static \Laralips\Storm\Parse\Markdown enableTaskLists()
 * @method static \Laralips\Storm\Parse\Markdown enableTables()
 * @method static \Laralips\Storm\Parse\Markdown enableTableOfContents()
 * @method static \Laralips\Storm\Parse\Markdown disableAttributes()
 * @method static \Laralips\Storm\Parse\Markdown disableAutolinking()
 * @method static \Laralips\Storm\Parse\Markdown disableFootnotes()
 * @method static \Laralips\Storm\Parse\Markdown disableFrontMatter()
 * @method static \Laralips\Storm\Parse\Markdown disableHeadingPermalinks()
 * @method static \Laralips\Storm\Parse\Markdown disableInlineOnly()
 * @method static \Laralips\Storm\Parse\Markdown disableSafeMode()
 * @method static \Laralips\Storm\Parse\Markdown disableTaskLists()
 * @method static \Laralips\Storm\Parse\Markdown disableTables()
 * @method static \Laralips\Storm\Parse\Markdown disableTableOfContents()
 * @method static \Laralips\Storm\Parse\Markdown setAttributes(bool $enabled)
 * @method static \Laralips\Storm\Parse\Markdown setAutolinking(bool $enabled)
 * @method static \Laralips\Storm\Parse\Markdown setConfig(array $config)
 * @method static \Laralips\Storm\Parse\Markdown setFootnotes(bool $enabled)
 * @method static \Laralips\Storm\Parse\Markdown setFrontMatter(bool $enabled)
 * @method static \Laralips\Storm\Parse\Markdown setHeadingPermalinks(bool $enabled)
 * @method static \Laralips\Storm\Parse\Markdown setInlineOnly(bool $enabled)
 * @method static \Laralips\Storm\Parse\Markdown setSafeMode(bool $enabled)
 * @method static \Laralips\Storm\Parse\Markdown setTaskLists(bool $enabled)
 * @method static \Laralips\Storm\Parse\Markdown setTables(bool $enabled)
 * @method static \Laralips\Storm\Parse\Markdown setTableOfContents(bool $enabled)
 *
 * @see \Laralips\Storm\Parse\Markdown
 */
class Markdown extends Facade
{
    /**
     * {@inheritDoc}
     */
    protected static $cached = false;

    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return 'parse.markdown';
    }
}
