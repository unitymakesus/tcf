@php

$first_name = get_field('first_name');

@endphp

<article class="single-person container-full" {!! post_class() !!}>
  <div class="row flex">
    <div class="col s12 m9 push-m3 bg-primary-darken">
      <section class="single-person__details">
        <div class="content-wrap">
          <h1 class="mb-0" itemprop="name">{{ the_title() }}</h1>
          @if (have_rows('job_titles'))
          <dl class="mt-2">
            <dt class="screen-reader-text">{{ __('Job Title(s)', 'sage') }}</dt>
            @while (have_rows('job_titles'))
              @php the_row(); @endphp
              <dd class="fw-600" itemprop="jobTitle">{{ get_sub_field('job_title') }}</dd>
            @endwhile
          </dl>
          @endif

          <div class="hide-on-med-and-up">
            {!! get_the_post_thumbnail(get_the_ID(), 'large') !!}
          </div>

          <dl class="mt-10">
            @if ($phone = get_field('phone_number'))
              <dt class="mt-2">{{ __('Phone', 'sage') }}</dt>
              <dd itemprop="phone">{{ $phone }}</dd>
            @endif
            @if ($email = get_field('email'))
              <dt class="mt-2">{{ __('Email', 'sage') }}</dt>
              <dd>
                <a itemprop="email" target="_blank" rel="noopener" href="mailto:{{ $email }}">{{ $email }}</a>
              </dd>
            @endif
          </dl>
        </div>
      </section>
      @if ($about = get_field('about'))
      <section class="single-person__about">
        <div class="content-wrap">
          <h2 class="h2">{{ __("About {$first_name}", 'sage') }}</h2>
          {!! $about !!}
        </div>
      </section>
      @endif
    </div>
    <div class="col s12 m3 pull-m9">
      <div class="hide-on-small-only">
        {!! get_the_post_thumbnail(get_the_ID(), 'large') !!}
      </div>

      @if (have_rows('hobbies'))
        <div class="content-wrap-l">
          <h2 class="h2">{{ __("{$first_name}'s Hobbies", 'sage') }}</h2>
          <ul>
            @while (have_rows('hobbies')) @php the_row(); @endphp
              @php
                $image = get_sub_field('hobby_image');
              @endphp
              <li>
                <figure>
                  <img src="{{ $image['sizes']['thumbnail'] }}" alt="{{ $image['alt'] }}" />
                  <figcaption>{{ get_sub_field('hobby_name') }}</figcaption>
                </figure>
              </li>
            @endwhile
          </ul>
        </div>
      @endif
    </div>
  </div>
</article>
