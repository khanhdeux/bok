(function() {
  var $;

  $ = jQuery;

  $.fn.youtubePopup = function(options) {
    var addModal, closeModal, createModal, defaults, start;

    defaults = {
      autoplay: true,
      mainVideoId: "#mainVideo",
      title: ".videoTitle",
      description: ".videoDescription"
    };

    options = $.extend(defaults, options);

    createModal = function(item) {
      var autoplay, iframe_dom;
      if (options.autoplay) {
        autoplay = 1;
      } else {
        autoplay = 0;
      }
      iframe_dom = "<iframe frameborder='0' allowfullscreen='' src='http://www.youtube.com/embed/" + $(item).data('id') + "?rel=0&autoplay=" + autoplay + "&wmode=opaque' marginwidth='0' marginheight='0'></iframe>";
      return iframe_dom;
    };

    start = function(item) {
      var modal;
      modal = createModal(item);
      addModal(modal);
    };

    addModal = function(modal) {
      $(options.mainVideoId).append(modal);
    };

    refreshModal = function() {
      if(!$(options.mainVideoId).is(":visible")) {
          $(options.mainVideoId).slideToggle("slow");
      }

      $(options.mainVideoId).html('');
    };

    changeInfo = function(item) {
        $(options.title).html($(item).data('title'));
        $(options.description).html($(item).data('description'));
    };

    return this.each(function() {
      var thisVid;
      thisVid = '#' + $(this).attr('id');

      $('body').on('click', thisVid, function() {
        refreshModal();
        changeInfo(this);
        return start(this);
      });

    });
  };

}).call(this);
