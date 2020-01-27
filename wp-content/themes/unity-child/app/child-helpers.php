<?php

namespace App;

/**
 * Returns primary term based on The SEO Framework.
 */
function get_the_primary_term($post_id, $taxonomy) {
  if ($primary_term = the_seo_framework()->get_primary_term($post_id, $taxonomy)) {
    return $primary_term;
  }

	return the_seo_framework()->get_primary_term($post_id, $taxonomy);
}

/**
 * Retrieve the content's date or date override text.
 *
 * @param string $post_type
 * @param int $id
 */
function get_custom_date($post_type, $id) {
  if ($date_display = get_field("{$post_type}_date_display", $id)) {
    return $date_display;
  }

  return get_field("{$post_type}_date", $id);
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

/**
 * Returns the deadline text (or override text) for a Scholarship or Grant.
 */
function get_award_deadline_text($award) {
  if ($override = get_field('deadline_override', $award)) {
    return $override;
  } elseif ($deadline = get_field('deadline', $award)) {
    $deadline = \DateTime::createFromFormat('Ymd', $deadline);
    return $deadline->format('F j, Y');
  }
}

/**
 * Displays a Twitter feed from oAuth plugin
 * @param string $username
 * @param int $count
 */
function displayTweets($username, $count) {
	if (!function_exists('getTweets')) {
		return;
	}

  $tweets = getTweets($username, $count);

  if ($tweets) {
    foreach ($tweets as $tweet) {
      if (isset($tweet['text'])) {
        $tweet_text = $tweet['text'];
      }

      // add links to shortlinks
      if (isset($tweet['entities']['urls'])) {
        foreach ($tweet['entities']['urls'] as $key => $link) {
          $tweet_text = preg_replace('`'.$link['url'].'`', '<a href="'.$link['url'].'" target="_blank">'.$link['url'].'</a>',
          $tweet_text);
        }
      }

      // add link to hashtags
      if (isset($tweet['entities']['hashtags'])) {
        foreach ($tweet['entities']['hashtags'] as $key => $hashtag) {
          $tweet_text = preg_replace('/#'.$hashtag['text'].'/i', '<a href="https://twitter.com/hashtag/'.$hashtag['text'].'" target="_blank">#'.$hashtag['text'].'</a>', $tweet_text);
        }
      }

      // Photo media
      $photo_text = '';
      if (isset($tweet['quoted_status']['entities']['media'])) {
        foreach ($tweet['quoted_status']['entities']['media'] as $key => $media) {
          if ($media['type'] === 'photo') {
            $photo_url = $media['media_url_https'];
            $photo_url .= ':thumb';
            $photo_text = '<div class="media-left pull-left"><img class="media-object" src="'.$photo_url.'" alt=""/></div>';
          }
        }
      }

      // Retweets & Favorites
      $count_text = '';
      if (isset($tweet['retweet_count']) || isset($tweet['favorite_count'])) {
        $count_text = '<div>';

        if (isset($tweet['retweet_count'])) {
          $count_text .= '<span class="twitter-stat twitter-stat--retweet"><span class="screen-reader-text">Retweeted</span>'.$tweet['favorite_count'].'<span class="screen-reader-text">times.</span></span>';
        }

        if (isset($tweet['favorite_count'])) {
          $count_text .= '<span class="twitter-stat twitter-stat--like"><span class="screen-reader-text">Favorited </span>'.$tweet['favorite_count'].'<span class="screen-reader-text"> times.</span></span>';
        }

        $count_text .= '</div>';
      }

      echo "<div class='tweets__item'>{$photo_text}<div class='media-body'>{$tweet_text} {$count_text}</div></div>";
    }
  }
}
