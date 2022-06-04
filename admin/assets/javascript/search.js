let searching = {
    find: function (event) {
        if ($('.box').length > 50) {
            this.find1(event);
        } else {
            this.find2(event);
        }
    },
    find1: function (event) {
        let searchVal = $('#search').val();
        let loc = location.protocol + '//' + location.host + location.pathname;

        if (searchVal !== ''){
            window.location = loc + '?s=' + searchVal;
        } else {
            window.location = loc;
        }
    },
    find2: function (event) {
        let searchVal = $('#search').val();

        $( ".box" ).each(function( index ) {
            if (!$(this).attr('data-title').toLowerCase().includes(searchVal)) {
                $(this).css("display", "none");
            } else {
                $(this).css("display", "flex");
            }
        });
    }
};