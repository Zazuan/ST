$(document).ready(function() {
    $('.header_page-name').click(function() {
        console.log('constructor-menu.js: hide header');
        $("#frame_id").css("margin-top", "0px");
        $(".header").slideToggle('fast');
        $(".structure").show("fast");
    });

    $('.nav_decline').click(function() { 
        console.log('constructor-menu.js: show header');
        $("#frame_id").css("margin-top", "60px");
        $(".header").slideToggle('fast');
        $(".edit-content").hide("fast");
        $(".structure").hide("fast");
    });

    $('.nav_accept').click(function() {
        console.log("constructor-menu.js: show header");
        $("#frame_id").css("margin-top", "60px");
        $(".header").slideToggle('fast');
        $(".edit-content").hide("fast");
    });

    $('.header__hide-button').click(function() {
        console.log("constructor-menu.js: hide header by preview");
        $("#frame_id").css("margin-top", "0px");
        $(".header").slideToggle('fast');
        $(".edit-content").hide("fast");
        $(".show-menu").show("fast");
    });

    // $('.burger').click(function() {
    //     $(".header").animate({ top: "-=100" }, "fast");
    //     $(".edit-content").show("fast");
    //     //$(".structure").show("fast");
    // });
});

