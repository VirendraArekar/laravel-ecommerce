$(function() {
    $('#searchform').one('submit', function myFormSubmitCallback(evt) {
        evt.stopPropagation();
        evt.preventDefault();
        var $this = $(this);
        var keyword = $('#headerSearch').val();
        if (keyword !== '') {
            var url = "<?php echo url('search'); ?>" + '/' + keyword;
            alert(url);
            // $('#searchform').attr('action', '{{ URL::asset(' / images / flags / ') }}' + keyword);
            // $this.submit();
        } else {
            $this.one('submit', myFormSubmitCallback);
        }
    });
});