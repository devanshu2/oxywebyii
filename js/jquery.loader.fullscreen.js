var loader = {
    begin: function () {
        $("body").addClass("loading");
    },
    stop: function () {
        $("body").removeClass("loading");
    }
};