<section class="featured-event">
  <div class="row flex">
    <div class="col m6">
      <div class="image-wrap">
        {{ the_post_thumbnail('large') }}
      </div>
    </div>
    <div class="col m6">
      <div class="content-wrap">
        <h2 class="mb-0">Featured Event Name</h2>
        <div class="fw-700 mb-3">Jan 12 @ 8:00am—5:00pm</div>
        <p>Location Name, 1234 Street Address</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio eius, laborum, repudiandae, et earum neque est quasi dolorum voluptate velit animi voluptas repellat beatae sequi ratione. Excepturi optio quae modi!</p>
        <a class="btn btn--orange" href="#">Call To Action</a>
      </div>
    </div>
</div>
</section>
<div class="container">
  <div class="tabbed">
    <ul>
      <li>
        <a href="#section-donor-only">{{ __('Donor Only Events', 'sage') }}</a>
      </li>
      <li>
        <a href="#section-nonprofit-only">{{ __('Nonprofit Only Events', 'sage') }}</a>
      </li>
      <li>
        <a href="#section-community-gatherings">{{ __('Community Gatherings', 'sage') }}</a>
      </li>
    </ul>
    <section id="section-donor-only">
      <h2 class="fw-700">{{ __('Donor Only Events', 'sage') }}</h2>
      {!! get_field('tab_donor_only_events_intro') !!}
      @if (have_rows('tab_donor_only_events_content')) @while (have_rows('tab_donor_only_events_content')) @php the_row(); @endphp
        <div class="event-grouping">
          <div class="flex mb-6">
            <div class="event-grouping__content">
              <h3 class="h3 mb-2">{!! get_sub_field('event_grouping_title') !!}</h3>
              @if ($subhead = get_sub_field('event_grouping_subhead'))
                <span class="event-grouping__subhead">{{ $subhead }}</span>
              @endif
              @if ($content = get_sub_field('event_grouping_content'))
                <div>{!! $content !!}</div>
              @endif
            </div>
            <div class="event-grouping__image">
              <img src="@asset('images/textures/texture-triangles-gray.svg')" alt="" />
            </div>
          </div>
          @if ($term_id = get_sub_field('event_grouping_upcoming_events'))
            @include('partials.upcoming-events-by-tax', [
              'term_id' => $term_id,
            ])
          @endif
        </div>
      @endwhile @endif
    </section>
    <section id="section-nonprofit-only">
      <h2>{{ __('Nonprofit Only Events', 'sage') }}</h2>
    </section>
    <section id="section-community-gatherings">
      <h2>{{ __('Community Gatherings', 'sage') }}</h2>
    </section>
  </div>
</div>
