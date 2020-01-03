<?php

namespace App;

/**
 * Retrieve the event's date or date override text.
 */
function get_event_date($event) {
  if ($date_display = get_field('event_date_display', $event)) {
    return $date_display;
  }

  return get_field('event_date', $event);
}

/**
 * Retrieve the event's date as well as the location text.
 */
function get_event_full_details($event) {
  $event_date = get_event_date($event);

  if ($location = get_field('event_location')) {
    return "{$event_date} | {$location}";
  }

  return get_event_date($event);
}
