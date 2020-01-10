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

/**
 * Converts a number into a short version with suffix (eg: 1000 -> 1k)
 */
function number_format_short($n, $precision = 1) {
  $num = intval($n);

	if ($num < 900) {
		// 0 - 900
		$num_format = number_format($num, $precision);
		$suffix = '';
	} else if ($num < 900000) {
		// 0.9k-850k
		$num_format = number_format($num / 1000, $precision);
		$suffix = '<sub aria-hidden="true">K</sub><span class="screen-reader-text">thousand</span>';
	} else if ($num < 900000000) {
		// 0.9m-850m
		$num_format = number_format($num / 1000000, $precision);
		$suffix = '<sub aria-hidden="true">M</sub><span class="screen-reader-text">million</span>';
	} else if ($num < 900000000000) {
		// 0.9b-850b
		$num_format = number_format($num / 1000000000, $precision);
		$suffix = '<sub aria-hidden="true">B</sub><span class="screen-reader-text">billion</span>';
	} else {
		// 0.9t+
		$num_format = number_format($num / 1000000000000, $precision);
		$suffix = '<sub aria-hidden="true">T</sub><span class="screen-reader-text">trillion</span>';
	}
  // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
  // Intentionally does not affect partials, eg "1.50" -> "1.50"
	if ($precision > 0) {
		$dotzero = '.' . str_repeat('0', $precision);
		$num_format = str_replace($dotzero, '', $num_format);
  }

	return $num_format . $suffix;
}
