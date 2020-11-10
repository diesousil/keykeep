$(document).ready(function() {

    /** tree view component scripts */
    
    $(".tree-view li .icon").click(function() {
        
        if($(this).parent().children(".children").is(":visible")) {
            $(this).children("i").removeClass("fa-folder-open").addClass("fa-folder");
            $(this).parent().children(".children").slideUp(500);
            $(this).parent().children(".credentials").slideUp(500);
        } else {
            $(this).children("i").removeClass("fa-folder").addClass("fa-folder-open");
            $(this).parent().children(".children").slideDown(500);
            $(this).parent().children(".credentials").slideDown(500);
        }

    })
});