/*! Organicity - v0.1.0 - 2015-06-23
 * http://www.organicity.eu
 * Copyright (c) 2015 Future Cities Catapult */
jQuery(document).ready(function($) {

// settings for the carousel on the home page
    $("#owl-demo").owlCarousel({
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem:true
    });



// scrolls the page to hot links within that page
    $('a[href^="#"]').on('click', function (event) {
        var target = $($(this).attr('href'));
        if (target.length) {
            event.preventDefault();
            $('html, body').animate({
                scrollTop: target.offset().top
            }, 1000);
        }
    });


    // Opens the hamburger menu
    $("a[href=#menuExpand]").click(function(e) {
        $(".menu").toggleClass("menuOpen");
        $(".menu-wrapper").toggleClass("active");
        e.preventDefault();
    });




// to return the size of an object (dictionary)
    Object.size = function(obj) {
        var size = 0, key;
        for (key in obj) {
            if (obj.hasOwnProperty(key)) size++;
        }
        return size;
    };





// current selected tags
    var selectedTags = {};


    function opencloseFilterMenu(event) {
        //if(!$("#filter-menu").hasClass("active")) {
        $("#filter-menu").toggleClass("active");
        $("#filter-menu-button").toggleClass("active");
        //}
    }


// Setting up the filter menu
    $("#filter-menu-button").click(function(e) {
        $("#filter-menu-button").html($("#filter-menu-button").html() == 'Filter' ? 'Reset':'Filter');

        // if currently open, upon clicking the filter/reset it removes all the highlights
        if($("#filter-menu").hasClass("active")){
            //selectedTags = {"all":true};
            get_blog_posts(e);
            $(".tax-filter").removeClass("highlight");

        }
        opencloseFilterMenu(event);
       // $("#filter-menu").toggleClass("active");
       // $("#filter-menu-button").toggleClass("active");
    });













    function get_blog_posts(event) {
   // console.log("GET BLOG POSTS");

        // Prevent default action - opening tag page
        if (event.preventDefault) {
            event.preventDefault();
        } else {
            event.returnValue = false;
        }
       // console.log(event.data);


        var tagClicked = $(this).attr('title');
        $(this).toggleClass('highlight');

        //$(".menu-tax-filter[title='" + tagClicked + "']").toggleClass("highlight");


        if (typeof tagClicked !== typeof undefined && tagClicked !== false) {

            if (tagClicked in selectedTags) {
                delete selectedTags[tagClicked];
            }
            else {
                selectedTags[tagClicked] = true;
            }

//            $(".menu-tax-filter[title='" + tagClicked + "']").toggleClass("highlight");
//            openFilterMenu(event);


            var selected_taxonomy = "";
            var count = 0;

            for (tag in selectedTags) {
                if (count == 0) {
                    selected_taxonomy = tag;
                } else {
                    selected_taxonomy = selected_taxonomy + ',' + tag;
                }
                count = count + 1;
            }
        }else{
            selectedTags = {};
        }

        // Get tag slug from title attirbute



        // After user click on tag, fade out list of posts
        $('.tagged-posts').fadeOut();

        data = {
            action: 'filter_posts', // function to execute
            afp_nonce: afp_vars.afp_nonce, // wp_nonce
            taxonomy: selected_taxonomy, // selected tag
        };

        $.post( afp_vars.afp_ajax_url, data, function(response) {

            if( response ) {
                // Display posts on page
                $('.tagged-posts').html( response );
                // Restore div visibility
                $('.tagged-posts').fadeIn();
            };
        });
    }


    $('.tax-filter').click(get_blog_posts);
    //$('.menu-tax-filter').click(get_blog_posts);


});

