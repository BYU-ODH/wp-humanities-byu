<?php
/**
 * The Template for displaying the projects page.
 */

get_header();

the_title('<h1>', '</h1>'); ?>

<div class="projectLegend">
    <div class="projectLegendStyle">
        <span class="intakeStatus statusLineSizeODH"> Intake</span>&nbsp;
        <span class="liveStatus statusLineSizeODH"> Live</span>
		<span class="archivedStatus statusLineSizeODH">Archived</span>
    </div>
</div>

<div class="entry-content odhBoxContentGrid">
	<!--main card content starts here-->
	<div class="odhBoxCards">
        <?php echo pods( 'projects', array( 'limit' => -1 ) )->template( 'Project Card Template' ); ?>
 	</div>
</div>

<?php get_footer(); ?>