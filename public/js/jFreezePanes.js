/**
 * Created by Joel on 10/23/2015.
 */


(function ($) {

    $.fn.jFreezePanes = function( options ) {

        //set up the variables
        var tableclasses = this.attr('class');
        var selectedTable = this;
        var tableheader = selectedTable.find('thead tr');
        var offsetLeft = selectedTable.offset().left;
        var tableWidth = selectedTable.outerWidth();
        var isChrome = /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor);

        if(isChrome) {
            //add a 1 px to width
            tableWidth += 1;
        }

        console.log('left = ' +offsetLeft);
        //set the default options
        var settings = $.extend({
            // These are the defaults.
            offsetTop: 0,//offsets the top of the header from the top of the page, useful if you have a fixed nav bar
        }, options );

        //add the classes and duplicate table
        this.addClass('jFreezePanesOriginTable');
        this.before("<table class='jFreezePanes "+tableclasses+"' style='width: "+tableWidth+"px;display:none; top:"+settings.offsetTop+"px; left:"+offsetLeft+"px;'><thead><tr></tr></thead></table>");

        //calculate the width of each table header
        tableheader.find('th').each(function(){
            var width = $(this).outerWidth();
            var text = $(this).html();
            if(!$(this).attr('class')) {
                var thclass = '';
            } else {
                var thclass = 'class="'+$(this).attr('class')+'"';
            }
            console.log(text + ' is ' + width + ' long');
            $('.jFreezePanes').find('tr').append('<th '+thclass+' style="display:inline-block;width:'+width+'px;">'+text+'</th>');
        });

        $(window).scroll(function(){
            //check if the table header row is visible
            var pageTopToElementBottom = tableheader.height() + tableheader.offset().top - 10 - settings.offsetTop;//get the distance from the top of the page to the bottom of the table header
            var tableBottomPosition = selectedTable.height() + selectedTable.offset().top;
            console.log('table bottom location ' +tableBottomPosition);
            if($(window).scrollTop() > pageTopToElementBottom) {
                console.log('thead out of view');
                $('.jFreezePanes').show();
            }
            if($(window).scrollTop() < pageTopToElementBottom || $(window).scrollTop() > tableBottomPosition) {
                console.log('thead in view');
                $('.jFreezePanes').hide();
            }
        });

        return this;
    };

}(jQuery));