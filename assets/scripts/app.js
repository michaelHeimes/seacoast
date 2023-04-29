/**
 * Required
 */
 
 //@prepros-prepend vendor/foundation/js/plugins/foundation.core.js

/**
 * Optional Plugins
 * Remove * to enable any plugins you want to use
 */
 
 // What Input
 //@*prepros-prepend vendor/whatinput.js
 
 // Foundation Utilities
 // https://get.foundation/sites/docs/javascript-utilities.html
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.box.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.imageLoader.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.keyboard.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.mediaQuery.min.js
 //@*prepros-prepend vendor/foundation/js/plugins/foundation.util.motion.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.nest.min.js
 //@*prepros-prepend vendor/foundation/js/plugins/foundation.util.timer.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.touch.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.triggers.min.js


// JS Form Validation
//@prepros-prepend vendor/foundation/js/plugins/foundation.abide.js

// Accordian
//@prepros-prepend vendor/foundation/js/plugins/foundation.accordion.js
//@prepros-prepend vendor/foundation/js/plugins/foundation.accordionMenu.js
//@*prepros-prepend vendor/foundation/js/plugins/foundation.responsiveAccordionTabs.js

// Menu enhancements
//@prepros-prepend vendor/foundation/js/plugins/foundation.drilldown.js
//@prepros-prepend vendor/foundation/js/plugins/foundation.dropdown.js
//@prepros-prepend vendor/foundation/js/plugins/foundation.dropdownMenu.js
//@prepros-prepend vendor/foundation/js/plugins/foundation.responsiveMenu.js
//@*prepros-prepend vendor/foundation/js/plugins/foundation.responsiveToggle.js

// Equalize heights
//@prepros-prepend vendor/foundation/js/plugins/foundation.equalizer.js

// Responsive Images
//@prepros-prepend vendor/foundation/js/plugins/foundation.interchange.js

// Navigation Widget
//@*prepros-prepend vendor/foundation/js/plugins/foundation.magellan.js

// Offcanvas Naviagtion Option
//@prepros-prepend vendor/foundation/js/plugins/foundation.offcanvas.js

// Carousel (don't ever use)
//@*prepros-prepend vendor/foundation/js/plugins/foundation.orbit.js

// Modals
//@prepros-prepend vendor/foundation/js/plugins/foundation.reveal.js

// Form UI element
//@*prepros-prepend vendor/foundation/js/plugins/foundation.slider.js

// Anchor Link Scrolling
//@prepros-prepend vendor/foundation/js/plugins/foundation.smoothScroll.js

// Sticky Elements
//@prepros-prepend vendor/foundation/js/plugins/foundation.sticky.js

// Tabs UI
//@*prepros-prepend vendor/foundation/js/plugins/foundation.tabs.js

// On/Off UI Switching
//@*prepros-prepend vendor/foundation/js/plugins/foundation.toggler.js

// Tooltips
//@*prepros-prepend vendor/foundation/js/plugins/foundation.tooltip.js

// What Input
//@prepros-prepend vendor/what-input.js

// Swiper
//@prepros-prepend vendor/swiper-bundle.js

// DOM Ready
(function($) {
	'use strict';
    
    var _app = window._app || {};
    
    _app.foundation_init = function() {
        $(document).foundation();
    }
        
    _app.emptyParentLinks = function() {
            
        $('.menu li a[href="#"]').click(function(e) {
            e.preventDefault ? e.preventDefault() : e.returnValue = false;
        });	
        
    };
    
    _app.fixed_nav_hack = function() {
        $('.off-canvas').on('opened.zf.offCanvas', function() {
            $('header.site-header').addClass('off-canvas-content is-open-right has-transition-push');		
            $('header.site-header #top-bar-menu .menu-toggle-wrap a#menu-toggle').addClass('clicked');	
        });
        
        $('.off-canvas').on('close.zf.offCanvas', function() {
            $('header.site-header').removeClass('off-canvas-content is-open-right has-transition-push');
            $('header.site-header #top-bar-menu .menu-toggle-wrap a#menu-toggle').removeClass('clicked');
        });
        
        $(window).on('resize', function() {
            if ($(window).width() > 1023) {
                $('.off-canvas').foundation('close');
                $('header.site-header').removeClass('off-canvas-content has-transition-push');
                $('header.site-header #top-bar-menu .menu-toggle-wrap a#menu-toggle').removeClass('clicked');
            }
        });    
    }
    
    _app.display_on_load = function() {
        $('.display-on-load').css('visibility', 'visible');
    }
    
    _app.mobile_nav = function() {
        $(document).on('click', 'a#menu-toggle', function(){
            
            if ( $(this).hasClass('clicked') ) {
                $(this).removeClass('clicked');
                $('body').removeClass('nav-open');
                $('#off-canvas').fadeOut(200);
            
            } else {
            
                $(this).addClass('clicked');
                $('body').addClass('nav-open');
                $('#off-canvas').fadeIn(200);
            
            }
            
        });
    }
    
    // Custom Functions
    
    _app.news_events_slider = function() {
        var neSwiper = new Swiper(".news-events-slider", {
            slidesPerView: 1,
            spaceBetween: 24,
            loop: true,
            preventClicks: true,
            navigation: {
                nextEl: ".ne-swiper-button-next",
                prevEl: ".ne-swiper-button-prev",
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 42,
                },
            },
        });
    }
    
    _app.aff_slider = function() {
        var neSwiper = new Swiper(".aff-slider", {
            slidesPerView: 1,
            spaceBetween: 42,
            loop: true,
        });
    }
    
    _app.alumni_slider = function() {
        var neSwiper = new Swiper(".alumni-slider", {
            slidesPerView: 1,
            spaceBetween: 16,
            loop: true,
            navigation: {
                nextEl: ".alumni-swiper-button-next",
                prevEl: ".alumni-swiper-button-prev",
            },
            breakpoints: {
                540: {
                    slidesPerView: 2,
                    slidesPerGroup: 2,
                },
            },
        });
    }
    
    _app.table_register_link = function() {
        const tablepressTables = document.querySelectorAll(".tablepress");
        
        tablepressTables.forEach(function(tablepressTable) {
            const thElements = tablepressTable.querySelectorAll("th");
            const colCount = thElements.length;
            
            tablepressTable.classList.add('col-count-' + colCount);
            
            const trElements = tablepressTable.querySelectorAll("tr");
            
            trElements.forEach(function(trElement) {
                const lastTdElement = trElement.querySelector("td:last-child");
            
                if (lastTdElement) {
                    const url = lastTdElement.innerHTML;
                    const linkButton = document.createElement("a");
            
                    linkButton.setAttribute('href', url);
                    linkButton.setAttribute('target', '_blank');
                    linkButton.classList.add('button');
                    linkButton.classList.add('light-blue-bg');
                    linkButton.innerHTML = 'Register';
            
                    lastTdElement.innerHTML = '';
                    lastTdElement.appendChild(linkButton);
                }
            });
            
            tablepressTable.style.visibility = 'visible';
            
        });
    }
    
    _app.facility_gallery_slider = function() {
        var neSwiper = new Swiper(".facility-slider", {
            slidesPerView: 1,
            spaceBetween: 42,
            loop: true,
            navigation: {
                nextEl: ".facility-swiper-button-next",
                prevEl: ".facility-swiper-button-prev",
            },
        });
    }
    
    _app.fake_ajax_load_more = function() {
        const list = document.querySelector(".grid");
        if(list) {
            const listItems = list.querySelectorAll(".grid-card");
            const ajaxLoadMoreBtn = document.querySelector(".ajax-load-more");
            
            let k = 4;
            let j = 6;
            
            ajaxLoadMoreBtn.addEventListener("click", function (event) {
                event.preventDefault();
              let range = `.grid-card:nth-child(n+${k}):nth-child(-n+${j})`;
              list
                .querySelectorAll(range)
                .forEach((elem) => (elem.style.display = "block"));
            
              if (listItems.length <= j) {
                this.remove();
              } else {
                k += 3;
                j += 3;
              }
            });
        }
    } 
            
    _app.init = function() {
        
        // Standard Functions
        _app.foundation_init();
        _app.emptyParentLinks();
        _app.fixed_nav_hack();
        _app.display_on_load();
        _app.mobile_nav();
        
        // Custom Functions
        _app.news_events_slider();
        _app.aff_slider();
        _app.alumni_slider();
        _app.table_register_link();
        _app.facility_gallery_slider();
        _app.fake_ajax_load_more();
    }
    
    
    // initialize functions on load
    $(function() {
        _app.init();
    });
	
	
})(jQuery);