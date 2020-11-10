jQuery(document).ready(function($) {

  'use strict';

  $('.byuLightbox').live('click', function () {
    var $lightbox        = $('<div class="byuLightboxContainer"></div>'),
        $lightboxOverlay = $('<div class="byuLightboxOverlay"></div>'),
        $lightboxContent = $('<div class="byuLightboxContent"></div>'),
        $lightboxClose   = $('<div class="icon byu-icon-close byuLightboxClose"></div>'),
        ajaxUrl          = $(this).data('ajax-url'),
        youtubeId        = $(this).data('youtube-id'),
        imageUrl         = $(this).data('image');

    $lightboxContent.append($lightboxClose);  

    //display ajax content
    if (ajaxUrl) {  
      $.get(ajaxUrl, function (data) {
        $lightboxContent.append($(data).find('.profile-content'));
      });
    }

    //display youtube content
    if (youtubeId) {
      $lightboxContent.append(
        '<div class="video-container">' +
          '<iframe src="//www.youtube.com/embed/'+youtubeId+'" frameborder="0" allowfullscreen></iframe>'+
        '</div>'
      );
    }

    //display image content
    if (imageUrl) {
      $lightboxContent.append(
        '<div class="image-container">' +
          '<img src="' + imageUrl + '" />' +
        '</div>'
      );
    }

    $lightbox.append($lightboxOverlay);
    $lightbox.append($lightboxContent);
    $('body').append($lightbox);

    $lightboxClose.on('click', function () {
      $lightbox.unbind();
      $lightbox.remove();
    });

    $lightboxOverlay.on('click', function () {
      $lightbox.unbind();
      $lightbox.remove();
    });

  });

});
