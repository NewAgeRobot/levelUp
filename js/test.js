$(document).ready(function(){
    $("#reorder").click(function(){
            var fixHelperModified = function(e, tr) {
            var $originals = tr.children();
            var $helper = tr.clone();
            $helper.children().each(function(index) {
                $(this).width($originals.eq(index).width())
            });
            return $helper;
        },
        updateIndex = function(e, ui) {
            $('td.index', ui.item.parent()).each(function (i) {
                $(this).html(i);
            });
        };

        $("#sort tbody").sortable({
            helper: fixHelperModified,
            stop: updateIndex
        }).disableSelection();
    })

    $("#reorderDone").click(function(){
        var amountSaved = $(".index").length;
        /*this is only javascript so can't do server stuff, going to have to bring in ajax
        
        I have how many courses there are and can call each one by their position

        for loop ajax call to a php file called "savedCourseOrder.php" 
        sending the current position and course code
        php file takes the ajax variables and loops through the database
        finds the course by code & email, same way as delete
        updates its position with the position sent
        */










        var thingy = $(".index").eq(0).text();
        alert($(".jsCourseCode").eq(thingy).text());
        window.location.reload();
    });
    
});