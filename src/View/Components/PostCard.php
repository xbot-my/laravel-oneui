<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * PostCard Component - Blog post/article preview card
 *
 * Usage:
 * <x-oneui::post-card
 *     title="Blog Post Title"
 *     excerpt="Post excerpt..."
 *     image="path/to/image.jpg"
 *     author="John Doe"
 *     date="2024-12-24"
 * />
 * <x-oneui::post-card :post="$post" />
 */
class PostCard extends Component
{
    public function __construct(
        public ?string $title = null,
        public ?string $excerpt = null,
        public ?string $content = null,
        public ?string $image = null,
        public ?string $category = null,
        public ?string $author = null,
        public ?string $authorAvatar = null,
        public ?string $date = null,
        public ?int $readTime = null,
        public ?int $views = null,
        public ?int $comments = null,
        public ?string $url = null,
        public ?string $categoryUrl = null,
        public bool $showImage = true,
        public bool $showExcerpt = true,
        public bool $showMeta = true,
        public bool $showAuthor = true,
        public bool $showStats = false,
        public string $layout = 'vertical', // vertical, horizontal, compact
        public string $size = 'md', // sm, md, lg
        public ?object $post = null, // Alternative: pass post object
    ) {
        // If post object is provided, extract properties
        if ($post && !$title) {
            $this->title = $post->title ?? $post->name ?? $post->headline ?? null;
            $this->excerpt = $this->excerpt ?? $post->excerpt ?? $post->summary ?? $post->lead ?? null;
            $this->content = $this->content ?? $post->content ?? null;
            $this->image = $this->image ?? $post->image ?? $post->featured_image ?? $post->cover_image ?? null;
            $this->category = $this->category ?? $post->category?->name ?? $post->category_name ?? $post->category ?? null;
            $this->author = $this->author ?? $post->author?->name ?? $post->user?->name ?? $post->author_name ?? null;
            $this->authorAvatar = $this->authorAvatar ?? $post->author?->avatar ?? $post->author?->avatar_url ?? null;
            $this->date = $this->date ?? ($post->published_at?->format('M d, Y') ?? $post->date?->format('M d, Y') ?? $post->created_at?->format('M d, Y'));
            $this->readTime = $this->readTime ?? $post->read_time ?? $post->reading_time ?? null;
            $this->views = $this->views ?? $post->views_count ?? $post->views ?? null;
            $this->comments = $this->comments ?? $post->comments_count ?? $post->comments ?? null;
            $this->url = $this->url ?? $post->url ?? $post->slug ?? null;
        }

        // Generate excerpt from content if not provided
        if (!$this->excerpt && $this->content) {
            $this->excerpt = strip_tags($this->content);
            $this->excerpt = strlen($this->excerpt) > 150
                ? substr($this->excerpt, 0, 147) . '...'
                : $this->excerpt;
        }
    }

    /**
     * Get container classes
     */
    public function containerClasses(): string
    {
        $classes = ['block', 'block-rounded', 'block-link-pop'];

        if ($this->url) {
            $classes[] = 'cursor-pointer';
        }

        return implode(' ', $classes);
    }

    /**
     * Get card content wrapper
     */
    public function wrapperTag(): string
    {
        return $this->url ? 'a' : 'div';
    }

    /**
     * Get wrapper attributes
     */
    public function wrapperAttributes(): string
    {
        if ($this->url) {
            return 'href="' . $this->url . '" class="block block-rounded block-link-pop text-decoration-none text-body"';
        }
        return 'class="block block-rounded"';
    }

    /**
     * Check if should display compact
     */
    public function isCompact(): bool
    {
        return $this->layout === 'compact';
    }

    /**
     * Check if should display horizontal
     */
    public function isHorizontal(): bool
    {
        return $this->layout === 'horizontal';
    }

    public function render(): View
    {
        return view('oneui::components.post-card');
    }
}
