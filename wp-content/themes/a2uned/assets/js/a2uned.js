(function( $ ) {

  var a2uned = {
    init: function () {
      if($('ul.crypto-addresses').length) {
        this.copyWalletAddress();
      }
    },
    copyWalletAddress: function () {

      $('ul.crypto-addresses li button').on('click', function (e) {
        e.preventDefault();

        var inputId = $(this).attr('rel');
        var copyText = $(inputId);
        var message = $(this).next('span');

        copyText.select();
        document.execCommand('copy');

        message.addClass('visible');

        setTimeout(function () {
          message.removeClass('visible');
        }, 2000)
      });
    }
  }
  $( document ).ready(function() {
    a2uned.init();
  });

})( jQuery );