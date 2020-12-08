// Check if the given item matches the given filters
// @param item: the DOM <li> of a directory entry
function valid_item(i) {
    var $i = jQuery(i);

    // Check if the faculty status is right
    /// The target class comes from the statusfilter selection
    $selected_status = jQuery(".statusfilter.current").data("class");
    
    if ($selected_status) {
        if (!$i.hasClass($selected_status))
            return false;}

    // Check if the department is right
    // // TODO get data-dept equivalent for affiliated
    var $dept = jQuery("div.directory div.filter-container div.filter-label span.current").attr("data-dept");
    var $dept_class = "department-" + $dept;
    var $affil_class = "affiliated-" + $dept;

    if ($dept !== 'all' && !($i.hasClass($dept_class) || $i.hasClass($affil_class))) return false;    
    //if ($dept !== 'all' && !$i.hasClass($dept)) return false;    

    // Check if the search filter matches
    var qstring = jQuery("#directory-filter").val().toLowerCase();
    var filter_threshold = 0;
    if (qstring.length > filter_threshold) {
        name = $i.find ("h4").html().toLowerCase();
        if (name.indexOf(qstring) == -1) return false;}

    // Passes all the tests!
    return true;
}

function filter_items() {
    var $filterable_items = jQuery(".filterable-item");
    $filterable_items.each(function() {
        var $self = jQuery(this);
        if (valid_item($self)) {$self.fadeIn();}
        else { $self.fadeOut() };
    })}

jQuery(document).ready(function($) {

    'use strict';

    $('.filter').on('click', function () {
        var $clickedEl = $(this),
            $filterContainer = $clickedEl.closest('.filter-container'),
            $selectedEl = $filterContainer.find('.current'),
            $filterableItems = $filterContainer.nextAll('.filterable').eq(0).find('.filterable-item'),
            $filter = $clickedEl.data('class'),
            $statusFilter = $('.statusfilter-container').find('.current'),
            $statusFilterClass = $statusFilter.data('class');

        //update selected text
        $selectedEl.text($clickedEl.text());
        $selectedEl.attr("data-dept", $filter);

        filter_items();
    });

    $('.statusfilter').on('click', function () {
        var $clickedEl = $(this),
            $filterContainer = $clickedEl.closest('.statusfilter-container'),
            $filterableItems = $filterContainer.nextAll('.filterable').eq(0).find('.filterable-item'),
            $filter = $clickedEl.data('class'),
            $prevFilter = $filterContainer.find('.current'),
            $deptFilter = $('.filter-container').find('.current').attr('data-dept');

        if($prevFilter)
            $prevFilter.removeClass('current');

        $clickedEl.addClass('current');

        filter_items();
    });

    jQuery("#directory-filter").on("input", function(){
        filter_items();
    });
});
