if (navigator.userAgent.match(/MSIE|Internet Explorer/i) || navigator.userAgent.match(/Trident\/7\..*?rv:11/i)) {
    var href = document.location.href;
    if (!href.match(/[?&]nolastudiopagespeed/)) {
        if (href.indexOf("?") == -1) {
            if (href.indexOf("#") == -1) {
                document.location.href = href + "?nolastudiopagespeed=1"
            } else {
                document.location.href = href.replace("#", "?nolastudiopagespeed=1#")
            }
        } else {
            if (href.indexOf("#") == -1) {
                document.location.href = href + "&nolastudiopagespeed=1"
            } else {
                document.location.href = href.replace("#", "&nolastudiopagespeed=1#")
            }
        }
    }
}