$('.default-date-picker').datepicker({
    format: 'yyyy-mm-dd'
});

$('.timepicker-default').timepicker();


$('.timepicker-24').timepicker({
    autoclose: true,
    minuteStep: 1,
    showSeconds: true,
    showMeridian: false
});

jQuery(document).ready(function ($) {
    'use strict';

    // CENTERED MODALS
    // phase one - store every dialog's height
    $('.modal').each(function () {
        var t = $(this),
            d = t.find('.modal-dialog'),
            fadeClass = (t.is('.fade') ? 'fade' : '');
        // render dialog
        t.removeClass('fade')
            .addClass('invisible')
            .css('display', 'block');
        // read and store dialog height
        d.data('height', d.height());
        // hide dialog again
        t.css('display', '')
            .removeClass('invisible')
            .addClass(fadeClass);
    });
    // phase two - set margin-top on every dialog show
    $('.modal').on('show.bs.modal', function () {
        var t = $(this),
            d = t.find('.modal-dialog'),
            dh = d.data('height'),
            w = $(window).width(),
            h = $(window).height();
        // if it is desktop & dialog is lower than viewport
        // (set your own values)
        if (w > 380 && (dh + 60) < h) {
            d.css('margin-top', Math.round(0.96 * (h - dh) / 2));
        } else {
            d.css('margin-top', '');
        }
    });

});

$('.profile').initial();

$(document).on('change', '.btn-file :file', function() {
  var input = $(this),
	  numFiles = input.get(0).files ? input.get(0).files.length : 1,
	  label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
  input.trigger('fileselect', [numFiles, label]);
});

$(document).ready( function() {
	$('.btn-file :file').on('fileselect', function(event, numFiles, label) {			
		var input = $(this).parents('.input-group').find(':text'),
			log = numFiles > 1 ? numFiles + ' files selected' : label;		
		if( input.length ) {
			input.val(log);
		} else {
			if( log ) alert(log);
		}		
	});
}); 

$('.wysihtml5').wysihtml5();