let searching = {
    find: function () {
        let searchVal = $('#search').val();
        let loc = location.protocol + '//' + location.host + location.pathname;

        if (searchVal != ''){
            window.location = loc + '?s=' + searchVal;
        } else {
            window.location = loc;
        }
    }
};