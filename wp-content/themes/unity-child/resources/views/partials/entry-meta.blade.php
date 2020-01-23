<div class="entry-meta">
  @if (get_post_type() == 'press')
    <span>Published on <time class="date updated published">{{ App\get_custom_date('press', get_the_ID()) }}</time></span>
  @else
  <span>Published on <time class="date updated published" datetime="{{ get_post_time('c', true) }}" itemprop="datePublished">{{ get_the_date('F j, Y') }} {{ get_field('author_name') ? 'by ' . get_field('author_name') : '' }}</time>
  </span>
  @endif
</div>
