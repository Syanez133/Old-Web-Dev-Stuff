// Guillermo Yanez - Florida Atlantic University
$(function () {
    if (localStorage.getItem("listcontents") !== null) {
    //POPULATES LIST FROM LOCAL STORAGE
        $("#listcontainer").html(localStorage.getItem("listcontents"));
        $("#listcontainer").children("li").removeAttr("style");
    }
    
    //DELETES THE LOCAL STORED DATA AND CALLS DEFAULT LIST TO RESET THE LIST ITEMS TO THE DEFAULT LIST, MAKES SURE TO REUPDATE COUNTERS 
    
    $("#clear").click(function(){
        localStorage.clear();
          
        $("#listcontainer").html(localStorage.getItem("listcontents"));
        defaultlist();
        updatecount();
        updatemarkedcount()
    
        
    }); 
    
    // DEFAULT VERSION OF THE LIST TO BE RESTORED FROM, IDEALLY THE PLACE TO LOAD A FILE AND HAVE IT IMPORTED TO THE LIST
    function defaultlist()
    {
        $("#listcontainer").append("<li><div class='itemlabel'>" + "Apples" + "</div><div class='editicon glyphicon glyphicon-edit'></div></li>");
        $("#listcontainer").append("<li><div class='itemlabel'>" + "Mangos" + "</div><div class='editicon glyphicon glyphicon-edit'></div></li>");
        $("#listcontainer").append("<li><div class='itemlabel'>" + "Lettuce" + "</div><div class='editicon glyphicon glyphicon-edit'></div></li>");
        $("#listcontainer").append("<li><div class='itemlabel'>" + "Tomatos" + "</div><div class='editicon glyphicon glyphicon-edit'></div></li>");
        $("#listcontainer").append("<li><div class='itemlabel'>" + "Milk" + "</div><div class='editicon glyphicon glyphicon-edit'></div></li>");
        
    }
         
  
    
    
    //COUNTER UPDATE
    function updatecount() {                       // Creates a function to update the counter
        var items = $("li[class != 'complete']").length; // Number of items in list that are not marked
        $("#counter").text(items);                   // displays the number of items left
    }
    updatecount();
    
    //MARKED COUNTER UPDATE
    function updatemarkedcount() {                       // Creates a function to update the markedcounter
        var items = $("li[class = 'complete']").length; // Number of marked items in the list 
        $("#completecounter").text(items);                   // displays the number of items completed
    }
    updatemarkedcount();
    
    //ADD ITEM
    $(".addicon").click(function () {
        if ($("#additemtextbox").val() === "") {         //prevents a blank item
            $("#additemtextbox").val("").focus();
        } else {
            var item = $("#additemtextbox").val();
            $("#listcontainer").append("<li><div class='itemlabel'>" + item + "</div><div class='editicon glyphicon glyphicon-edit'></div></li>");
            $("li").first().hide().fadeIn(450);
            localStorage.setItem("listcontents", $("#listcontainer").html());
            updatecount();
             updatemarkedcount();
            $("#additemtextbox").val("").focus();
        }
    });
    
  
    //CLICKS THE ADD BUTTON WHEN ENTER IS PRESSED
    $("#additemtextbox").keypress(function (event) {
        if (event.keyCode === 13) {
            $(".addicon").click();
        }
    });
    
   
    //MARKS THE ITEM AS COMPLETE
    $("#listcontainer").on('click', '.itemlabel', function () {
        
        var complete = $(this).hasClass("complete"),
            editable = $(this).attr('contenteditable'),
            item = $(this).text();
        if (complete && editable !== "true") {  //if item is already complete, this reverts it to normal
            $(this).parent("li").remove();
            $("#listcontainer").prepend("<li> <span class='itemlabel'>" + item + "</span> <div class='editicon glyphicon glyphicon-edit'></div></li>");
            $("li").first().hide().fadeIn(450);
            localStorage.setItem("listcontents", $("#listcontainer").html());
        } else if (editable !== "true") {       //if the item is not complete, completes it
            $(this).parent("li").remove();
            $("#listcontainer").append("<li class='complete'><span class='itemlabel complete'>" + "<div class='checkedicon glyphicon glyphicon-check'></div>" + item + "</span><div class='minusicon glyphicon glyphicon-minus'></div></li>");
            $("li").last().hide().fadeIn(450);
            localStorage.setItem("listcontents", $("#listcontainer").html());
             
        }
        updatecount();
         updatemarkedcount()
    });
      
    
    
    //WHEN THE EDIT ICON IS CLICKED THE LIST ITEM BECOMES EDITABLE
    $("#listcontainer").on("click", ".editicon", function () {
        $(this).siblings(".itemlabel").attr("contenteditable", "true").focus();
        $(this).parent("li").append("<div class='checkicon glyphicon glyphicon-edit'></div>");
        $(this).remove(".editicon");
    });
    
    //BLURS FROM LIST ITEM WHEN ENTER IS PRESSED WHILE EDITING
    $("#listcontainer").on("keypress", ".itemlabel", function (event) {
        if (event.keyCode === 13) {
            $(".checkicon").click();
        }
    });
    //ON BLUR FROM LIST ITEM, CLICKS THE CHECK ICON
    $("#listcontainer").on("blur", ".itemlabel", function () {
        $(this).siblings(".checkicon").click();
    });
    //MAKES ITEM UN-EDITABLE WHEN CHECK ICON IS CLICKED
    $("#listcontainer").on("click", ".checkicon", function () {
        $(this).siblings(".itemlabel").attr("contenteditable", "false");
        $(this).parent("li").append("<div class='editicon glyphicon glyphicon-edit'></div>");
        $(this).remove(".checkicon");
        $(".editicon").mouseleave();
        localStorage.setItem("listcontents", $("#listcontainer").html());
    });
    
    
    //DELETE COMPLETED ITEM
    $("#listcontainer").on("click", ".minusicon", function () {
        $(this).parent("li").remove();
        localStorage.setItem("listcontents", $("#listcontainer").html());
         updatemarkedcount();
    });
    
    //BOLDS LIST ITEM TEXT WHEN HOVER OVER ICON FOR EDIT
    $("#listcontainer").on({
        mouseenter: function () {
            $(this).siblings(".itemlabel").css("font-weight", "600");
        },
        mouseleave: function () {
            $(this).siblings(".itemlabel").css("font-weight", "normal");
        }
    }, ".editicon");
    
    //BOLDS LIST ITEM TEXT WHEN HOVER OVER ICON FOR MINUS
    $("#listcontainer").on({
        mouseenter: function () {
            $(this).siblings(".itemlabel").css("font-weight", "600");
        },
        mouseleave: function () {
            $(this).siblings(".itemlabel").css("font-weight", "normal");
        }
    }, ".minusicon");
    

});