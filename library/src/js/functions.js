/**
 * Custom JavaScript Functionality
 *
 * This document contains the custom JavaScript functionality for WordPress
 * theme. This is written using jQuery to simplify code complexity.
 *
 * @package WordPress
 * @subpackage Gucci
 * @since Gucci 1.0
 */

// jQuery
(function($) {

	$(document).ready(function() {
    console.log('connected!');
		// Menu toggle
		$('.menu-main-menu-container').prepend('<button class="menu-trigger"></button>');
		$('#menu-main-menu').hide();
	});

  var handleHeaderButtons = {
    settings: {
      searchTrigger: $('.search-trigger'),
      searchform: $('#searchform'),
      menuTrigger: $('nav'),
      menu: $('#menu-main-menu'),
    },
    init: function() {
      this.bindUIActions();
    },
    bindUIActions: function() {
      var _this = this;
      this.settings.searchTrigger.on('click', function() {
        _this.settings.searchform.slideToggle(200);
      });
      this.settings.menuTrigger.on('click', '.menu-trigger', function() {
        console.log('menu trigger');
        $(this).toggleClass('open');
        _this.settings.menu.slideToggle(200).toggleClass('open');
      });
    }
  }
  handleHeaderButtons.init();

	var progressBarHandler = {
      settings: {
        progressBar: $('.progress-bar'),
        docHeight: '',
      },
      init: function() {
        if($('.progress-bar').length) {
          this.setup();
          this.bindUIActions();
        }
      },
      setup: function() {
        var rawHeight = $(document).height(),
            windowHeight = $(window).height();
        if(rawHeight - windowHeight <= 0) {
          this.settings.progressBar.css('width', '100%');
        }
      },
      bindUIActions: function() {
        this.handleProgress();
      },
      handleProgress: function() {
        $(document).on('scroll', function() {
          var docHeight = $(document).height(),
              scrollTop = $(document).scrollTop(),
              windowHeight = $(window).height();

          var width = ( ( scrollTop / (docHeight - windowHeight) ) * 100) + '%';
          progressBarHandler.settings.progressBar.css('width', width);
        });
      }
    }
    progressBarHandler.init();

    // defer iframe example
    function deferIframe() {
      var iframeElem = document.getElementsByTagName('iframe');
      for ( var i = 0; i < iframeElem.length; i++ ) {
        if(iframeElem[i].getAttribute('data-src')) {
          iframeElem[i].setAttribute('src',iframeElem[i].getAttribute('data-src'));
        }
      }
    }
    window.onload = deferIframe;

})(jQuery);
