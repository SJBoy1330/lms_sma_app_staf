'use strict';
var numberOfItems = $('#jadwal-list .jadwal').length; // Get total number of the items that should be paginated
var limitPerPage = 4; // Limit of items per each page
$('#jadwal-list .jadwal:gt(' + (limitPerPage - 1) + ')').hide(); // Hide all items over page limits (e.g., 5th item, 6th item, etc.)
var totalPages = Math.round(numberOfItems / limitPerPage); // Get number of pages
console.log(totalPages);
$(".pagination").append("<a class='to-page active' href='javascript:void(0)'></a>"); // Add first page marker
// Loop to insert page number for each sets of items equal to page limit (e.g., limit of 4 with 20 total items = insert 5 pages)
if (numberOfItems > limitPerPage) {
    for (var i = 1; i <= totalPages; i++) {
        //$(".pagination").append("<li class='current-page'><a href='javascript:void(0)'>" + i + "</a></li>"); // Insert page number into pagination tabs\
        $(".pagination").append("<a class='to-page' href='javascript:void(0)'></a>"); // Add first page marker
    }
}

// Function that displays new items based on page number that was clicked
$(".pagination a.to-page").on("click", function () {
    // Check if page number that was clicked on is the current page that is being displayed



    if ($(this).hasClass('active')) {
        return false; // Return false (i.e., nothing to do, since user clicked on the page number that is already being displayed)
    } else {
        document.getElementById("jadwal-list").style.opacity = "0";
        document.getElementById("jadwal-list").style.transition = "0.5s";
        var currentPage = $(this).index(); // Get the current page number
        $(".pagination a").removeClass('active'); // Remove the 'active' class status from the page that is currently being displayed
        $(this).addClass('active'); // Add the 'active' class status to the page that was clicked on
        setTimeout(function () {
            $("#jadwal-list .jadwal").hide(); // Hide all items in loop, this case, all the list groups

            var grandTotal = limitPerPage * currentPage; // Get the total number of items up to the page number that was clicked on

            // Loop through total items, selecting a new set of items based on page number



            document.getElementById("jadwal-list").style.opacity = "1";
            document.getElementById("jadwal-list").style.transition = "0.5s";


            for (var i = grandTotal - limitPerPage; i < grandTotal; i++) {
                $("#jadwal-list .jadwal:eq(" + i + ")").show(); // Show items from the new page that was selected
            }
        }, 300)
    }


});