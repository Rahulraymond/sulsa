<?php
/**
 * @cmsmasters_package 	Children Charity
 * @cmsmasters_version 	1.1.4
 */

?>

<script type="text/html" id="tribe_tmpl_tooltip">
	<div id="tribe-events-tooltip-[[=eventId]]" class="tribe-events-tooltip">
		<h3 class="entry-title summary">[[=title]]</h3>
		<div class="duration">
			<span class="tribe-events-abbr updated published dtstart">
				<abbr class="tribe-events-abbr updated published dtstart">[[=dateDisplay]] <\/abbr>
			</span>
		</div>
		[[ if(imageTooltipSrc.length) { ]]
		<div class="tribe-events-event-thumb preloader">
			<img class="full-width" src="[[=imageTooltipSrc]]" alt="[[=title]]" />
		</div>
		[[ } ]]
		<div class="tribe-events-event-body">
			[[ if(excerpt.length) { ]]
			<div class="entry-summary description">[[=raw excerpt]]</div>
			[[ } ]]
			<span class="tribe-events-arrow"></span>
		</div>
	</div>
</script>

<script type="text/html" id="tribe_tmpl_tooltip_featured">
	<div id="tribe-events-tooltip-[[=eventId]]" class="tribe-events-tooltip tribe-event-featured">
		<h3 class="entry-title summary">[[=title]]</h3>
		<div class="duration">
			<span class="tribe-events-abbr updated published dtstart">
				<abbr class="tribe-events-abbr updated published dtstart">[[=dateDisplay]] <\/abbr>
			</span>
		</div>
		[[ if(imageTooltipSrc.length) { ]]
		<div class="tribe-events-event-thumb preloader">
			<img class="full-width" src="[[=imageTooltipSrc]]" alt="[[=title]]" />
		</div>
		[[ } ]]
		<div class="tribe-events-event-body">
			[[ if(excerpt.length) { ]]
			<div class="entry-summary description">[[=raw excerpt]]</div>
			[[ } ]]
			<span class="tribe-events-arrow"></span>
		</div>
	</div>
</script>
