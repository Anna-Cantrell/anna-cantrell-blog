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

    // ===== CONTACT FORM ===== //
  	var formHandler = {
  		settings: {
  			comment_form: $('#commentform'),
  			input: $('#commentform input, #commentform textarea'),
  		},
  		init: function() {
  			this.setInitialState();
  			this.bindUIActions();
  		},
      bindUIActions: function() {
  			this.settings.input.on('focus blur', function(e) { formHandler.toggleLabel($(this), e); });
        this.settings.comment_form.on('submit', this.submit);
  		},

      // Handle form submission requests
  		submit: function(e) {
        if( !formHandler.checkRequiredValues($(this)) ) return false;
        return true;
  		},

      // Check if Form has Required Values
  		checkRequiredValues: function($form) {
  			var requirments_met = true;
  			$form.find('.requiredfield').each(function(){
  				if($(this).val()===''){
  					$(this).closest('.field').addClass('error');
  					requirments_met = false;
  				}
  			});
  			return requirments_met;
  		},

      // Check if there's a value and apply label styles
      setInitialState: function() {
  			this.settings.input.each(function(i) {
  				if($(this).val() != '') {
  					$(this).closest('.field').addClass('label-up');
  				}
  			});
  		},

  		// Determines the position of a field's label based on focus and value
  		toggleLabel: function(elem, e) {
  			if(e.type == 'focus') {
          console.log('focused');
  				elem.closest('.field').addClass('label-up');
  				elem.closest('.field').removeClass('error');
  			}
  			if((e.type == 'blur') && (elem.val() == '')) {
  				elem.closest('.field').removeClass('label-up');
  				if(elem.hasClass('requiredfield')){
  					elem.closest('.field').addClass('error');
  				}
  			}
  		}
  	};
  	formHandler.init();

})(jQuery);
