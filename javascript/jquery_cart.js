$( function() {
  function checkOut(confemail) {

    $.post("../classes/db_query.php",
       {confemail: confemail},
       function(response){
           console.log(response);
       }
     );/*
     $.ajax({
          url: '../classes/db_query.php',
          type: 'POST',
          data: {email: email},
          success: function(data) {
            console.log("success");
          }
      });*/
  };

  if (document.addEventListener) {
      document.addEventListener("click", handleClick, false);
  }
  else if (document.attachEvent) {
      document.attachEvent("onclick", handleClick);
  }

  function handleClick(event) {
    event = event || window.event;
    event.target = event.target || event.srcElement;

    var element = event.target;

    // Climb up the document tree from the target of the event
    while (element) {
        if (element.nodeName === "BUTTON" && /checkout/.test(element.className)) {
            var confemail = element.value;
            console.log(confemail);
            checkOut(confemail);
            break;
        } else {
          console.log("HERE");
        }

        element = element.parentNode;
    }
  }
});
