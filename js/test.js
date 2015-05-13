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

    $('.reorderDone').show();
    $(".reorderDone").click(function() { //SAVE COURSE ORDER BUTTON CLICKED
    var amountSaved = $(".index").length;
    var codeArray = []; //CREATES AN ARRAY THAT IS THE LENGTH OF THE AMOUNT OF ENTRIES
    for (var j = 0; j < amountSaved; j++){
        var codeTest = $(".jsCourseCode").eq(j).text(); //GRABS THE CURRENT CODE FOR THE INSTANCE OF .JSCOURSECODE CLASS THAT IS EQUAL TO THE EQ VALUE
        // console.log(codeTest); //PRINTS IT TO THE CONSOLE
        codeArray.push(codeTest);
    }




    var firstInstance = $(".index").eq(0).text();
    var firstCode = $(".jsCourseCode").eq(firstInstance).text();





      $.ajax({
          method: 'POST' ,
          url: 'savedCourseOrder.php' ,
          data: { codeArray: codeArray } ,
          success: function(result)
          {
            $('.reorderDone').after(result);
            $('.reorderDone').hide();
            window.location.reload();
        }
    });
  });


    $("#reorderDone").click(function(){
        /*this is only javascript so can't do server stuff, going to have to bring in ajax
        
        I have how many courses there are and can call each one by their position

        for loop ajax call to a php file called "savedCourseOrder.php" 
        sending the current position and course code
        php file takes the ajax variables and loops through the database
        finds the course by code & email, same way as delete
        updates its position with the position sent
        */










        
        window.location.reload();
    });

    
    
});