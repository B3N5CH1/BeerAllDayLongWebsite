$( function() {
var dialogClient, formClient,

    // From http://emailregex.com/
    emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,

  fname = $( "#fname" ),
  lname = $("#lname"),
  street = $("#street"),
  hnum = $("#hnum"),
  zip = $("#zip"),
  city = $("#city"),
  country = $("#country"),
  bday = document.getElementById( "bday" ),
  email = $( "#email" ),
  password = $( "#pw" ),
  vpassword = $("#vpassword"),


  dialogProduct, formProduct,

  name = $( "#name"),
  description_de = $( "#description_de"),
  description_fr = $( "#description_fr"),
  description_en = $( "#description_en"),
  size = $( "#size"),
  price = $( "#price"),
  percentage = $( "#percentage"),
  brand = $( "#brand"),
  type = $( "#type"),
  nationality = $( "#nationality"),


  tips = $( ".validateTips" );

function updateTips( text ) {
  tips
    .text( text )
    .addClass( "ui-state-highlight" );
  setTimeout(function() {
    tips.removeClass( "ui-state-highlight", 1500 );
  }, 500 );
}

function checkLength( value, fieldname, min, max ) {
  if ( value.val().length > max || value.val().length < min ) {
    value.addClass( "ui-state-error" );
    updateTips( "Length of " + fieldname + " must be between " +
      min + " and " + max + "." );
    return false;
  } else {
    return true;
  }
}

function checkRegexp( value, regexp, tip ) {
  if ( !( regexp.test( value.val() ) ) ) {
    value.addClass( "ui-state-error" );
    updateTips( tip );
    return false;
  } else {
    return true;
  }
}

function addClient() {
  var valid = true;
  //allFieldsClient.removeClass( "ui-state-error" );

  valid = valid && checkLength(fname, "first name", 2, 25);
  valid = valid && checkLength(lname, "last name", 2, 50);
  valid = valid && checkLength(street, "street", 2, 25);
  valid = valid && checkLength(hnum, "house number", 1, 10);
  valid = valid && checkLength(zip, "zip", 3, 7);
  valid = valid && checkLength(city, "city", 1, 50);
  valid = valid && checkLength(country, "country", 4, 52);

  valid = valid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );
  valid = valid && checkRegexp( email, emailRegex, "eg. mail@example.com" );

  alert(bday.valueAsDate);

  if (valid) {
    $.post("../backend/add.php",
        {
            fname: fname.val(),
            lname: lname.val(),
            street: street.val(),
            hnum: hnum.val(),
            zip: zip.val(),
            city: city.val(),
            country: country.val(),
            bday: bday.valueAsDate,
            email: email.val(),
            password: password.val()
        },
        function(data, status){
            alert("Data: " + data + "\nStatus: " + status);
            dialogClient.dialog( "close" );
            location.reload(true);
        }
    );
  }
  return valid;
}

dialogClient = $( "#dialog-form-client" ).dialog({
  autoOpen: false,
  height: 650,
  width: 450,
  modal: true,
  buttons: {
    "Add a client": addClient,
    Cancel: function() {
      dialogClient.dialog( "Close" );
    }
  },
  close: function() {
    form[ 0 ].reset();
    //allFieldsClient.removeClass( "ui-state-error" );
  }
});

formClient = dialogClient.find( "form" ).on( "submit", function( event ) {
  event.preventDefault();
  addClient();
});

$( "#create-client" ).button().on( "click", function() {
  dialogClient.dialog( "open" );
});

function addProduct() {
  var valid = true;
  //allFieldsProduct.removeClass( "ui-state-error" );

  valid = valid && checkLength(name, "name", 1, 50);
  valid = valid && checkLength(description_de, "german description", 5, 4000);
  valid = valid && checkLength(description_fr, "french description", 5, 4000);
  valid = valid && checkLength(description_en, "english description", 5, 4000);
  valid = valid && checkLength(brand, "brand", 1, 50);
  valid = valid && checkLength(type, "type", 1, 20);
  valid = valid && checkLength(nationality, "nationality", 3, 50);

  if (valid) {
    $.post("../backend/add.php",
        {
            name: name.val(),
            description_de: description_de.val(),
            description_fr: description_fr.val(),
            description_en: description_en.val(),
            size: size.val(),
            price: price.val(),
            percentage: percentage.val(),
            brand: brand.val(),
            type: type.val(),
            nationality: nationality.val()
        },
        function(data, status){
            alert("Data: " + data + "\nStatus: " + status);
            dialogProduct.dialog( "close" );
            location.reload(true);
        }
    );
  }
  return valid;
}

dialogProduct = $( "#dialog-form-product" ).dialog({
  autoOpen: false,
  height: 650,
  width: 450,
  modal: true,
  buttons: {
    "Add a product": addProduct,
    Cancel: function() {
      dialogProduct.dialog( "Close" );
    }
  },
  close: function() {
    form[ 0 ].reset();
    //allFieldsProduct.removeClass( "ui-state-error" );
  }
});

formProduct = dialogProduct.find( "form" ).on( "submit", function( event ) {
  event.preventDefault();
  addProduct();
});

$( "#add-product" ).button().on( "click", function() {
  dialogProduct.dialog( "open" );
});


function rmClient(email) {
    $.ajax({
        url: '../db/connector.php',
        type: 'POST',
        data: {rmemail: email},
        success: function(data) {
            location.reload(true);
        }
    });
};

function rmProd(id) {
    $.ajax({
        url: '../db/connector.php',
        type: 'POST',
        data: {id: id},
        success: function(data) {
            location.reload(true);
        }
    });
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
        if (element.nodeName === "BUTTON" && /remove-client/.test(element.className)) {
            var email = element.value;
            rmClient(email);
            break;
        } else if (element.nodeName === "BUTTON" && /remove-product/.test(element.className)) {
            var prodid = element.value;
            rmProd(prodid);
            break;
        }

        element = element.parentNode;
    }
}








} );
