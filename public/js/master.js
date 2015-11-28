$(function() {
    $('.special.cards .image').dimmer({
        on: 'hover'
    });
    $('#sidebar').sidebar('attach events', '#sidebarItem', 'click');
    $('.ui.accordion').accordion();
    $(".tabular.menu .item").tab();
    $("form.ui.form").form();
    $(".ui.checkbox").checkbox();
    $(".ui.dropdown").dropdown();
});