jQuery.noConflict();

(function($) {

  $(document).ready(function(){
  
    //Search form input
    (function () {
      let mainSearch = $('#search-query-input');
      let $searchForm = $('#searchform');

      if (mainSearch.length > 0) {

        //SEARCH ON ANY KEY PRESS
        initSearch(mainSearch);

        //waiting for more letters
        let $waitingInput = $searchForm.find('.search-waiting-input');

        mainSearch.on('keyup', function () {
          
          if(this.value.length > 0 && this.value.length < 4) {
            $waitingInput.removeClass('d-none');
          } else {
            $waitingInput.addClass('d-none');
          }
        });
      }

    })();
    
    //MAIN SEARCH FUNCTION
    function initSearch($element) {
      let cache = [];
      let $loader = $('.loading');

      function search(query, callback) {
        $loader.removeClass('d-none');

        /** No => search for it */
        $.ajax({
          'type': 'post',
          'url': siteVars.ajaxUrl,
          'dataType': 'json',
          'data': {
            q: query,
            action: 'emigma_ajax_search'
          },
          'success': function (payload) {
            //console.log(payload);
            callback(payload);
            $loader.addClass('d-none');
          },
          'error': function(err) {
            console.log(err);
          }
        });
      }

      window.emiSearch = $element.autocomplete({
        autoselect: false, // Select 1st item × search on enter UX
        autoselectOnBlur: false, // On mobile devices = true @todo
        openOnFocus: true,
        minLength: 4,
        debug: true
      }, [
        {
          source: search,
          debounce: 300,
          displayKey: function(suggestion) {
            return suggestion.name
          },
          templates: {
            suggestion: function(suggestion) {
              var query = $('#search-query-input').autocomplete('val');
              console.log(query);
              var regExp = new RegExp('(' + query + ')', 'giu');
              var excerpt = suggestion.excerpt ? suggestion.excerpt : false;
              var excerptOutput = excerpt ? '<div class="suggestion-excerpt">' + excerpt.replace(regExp, '<span class="highlight">$1</span>') + '</div>' : '';

              return '<div class="suggestion-item">' 
              + '<div class="suggestion-cpt">' + suggestion.cpt + '</div>' 
              + '<div class="suggestion-title">' + suggestion.name.replace(regExp, '<span class="highlight">$1</span>') + '</div>' 
              + excerptOutput + '</div>';
            },
            empty: function() {
              return '<div class="suggestion-item"><span>Ni najdenih rezultatov. Predlagamo, da poskusiš spremeniti iskalni niz<span></div>';
            }
          }
        }
      ]).on('autocomplete:selected', function(event, suggestion, dataset, context) {
          window.location.assign(suggestion.link);
      });
    }

    // SEARCH TRIGGER (open and close search bar)
    (function () {
      let sTrigger = $('#search-trigger'),
        ssTrigger = $('#s-search-trigger'),
        //Mobile search trigger
        //mTrigger = $('#mobile-search-trigger'),
        sWrapper = $('#search-wrapper'),
        $body = $('body'),
        $overlay = $('#overlay')
        $form = $('#searchform'),
        $close = sWrapper.find('.close');

      sWrapper.open = false;
      sWrapper.toggler = function () {
        this.toggleClass('active');
        $overlay.toggleClass('active');
        $form.find(':text').trigger('focus');

        sWrapper.open = !sWrapper.open;
        if(true === sWrapper.open)  {
          sWrapper.find('input').focus();
        }
      };

      sWrapper.closer = function () {
        this.removeClass('active');
        $overlay.removeClass('active');
        sWrapper.open = false;
      };

      //search button open/close
      sTrigger.on('click', function (e) {
        e.preventDefault();
        sWrapper.toggler();
      });
      ssTrigger.on('click', function (e) {
        e.preventDefault();
        sWrapper.toggler();
      });
      /* Mobile search trigger
      mTrigger.on('click', function(e) {
        e.preventDefault();
        sWrapper.toggler();
      });
      */

      // Click overlay to close
      $overlay.on('click', function(e) {
        e.preventDefault();
        sWrapper.toggler();
      });

      /* close buttons separate desktop/mobile
      $close.on('click', function (e) {
        e.preventDefault();
        sWrapper.closer();
      });

      $clear.on('click', function (e) {
        e.preventDefault();
        sWrapper.closer();
      });
      */

      sWrapper.on('click', function (e) {
        e.preventDefault();
        sWrapper.closer();
      });

      $form.on('click', function (e) {
        e.stopPropagation();
      });

      // ESCAPE
      $(document).keyup(function(e) {
        if (e.keyCode === 27) {
          sWrapper.closer();
        }
      });

    })();
    
    // Hide or show navbar on scroll
    const nav = $("#nav-sticky");
    var lastScrollTop = 0;

    $(window).on('scroll', function() {

      // Main elements we're working with
      const $stickyNav = $('#nav-sticky');
      const $mainNav = $('#nav');

      // Dynamic values during scrolling
      let scrollPos = 0;
      let navTopPosition = $mainNav.offset().top;
      let navHeight = $mainNav.outerHeight();

      // Define arrow function to avoid losing context
      // and offer reusability during various events
      const navPositionController = () => {
        scrollPos = $(this).scrollTop();

        if (scrollPos > (navTopPosition + navHeight)) {
          $stickyNav.addClass('stickynav');
        } else {
          $stickyNav.removeClass('stickynav');
        }
      }
      // Trigger on document ready (stays when refreshed) and on window scroll
      navPositionController();
      $(window).on('scroll', navPositionController);

      // Hide on scroll down, show on scroll up
      var scrollTop = $(window).scrollTop();

      if(scrollTop > lastScrollTop) {
        nav.removeClass("nav-transition");
      } else {
        nav.addClass("nav-transition");
      }

      lastScrollTop = scrollTop;

    });

    //MOBILE MENU TRIGGER
    var burger = $("#burger");

    if (burger.length) {
      burger.on("click", function () {

        $('#nav').toggleClass('active');
        $("#body").toggleClass("noscroll");
      });
    }

  });

})( jQuery );

// JAVASCRIPT START
class General {
  constructor() {
    this.testVariable = 'JS initalized';
    this.init();    
  }

  init() {
    console.log(this.testVariable);

    Fancybox.bind("[data-fancybox]");

    // JS Code here

  }
}

export default General;