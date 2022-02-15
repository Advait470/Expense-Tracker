var url = window.location;

$('ul.nav').filter(function () {
    return this.href == url;
}).parent().addClass('active');