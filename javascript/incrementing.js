
function addItem(id){
  var el = getValue(id);
  document.getElementById(id).value = +el + 1 ;
}

function removeItem(id){

    var el = getValue(id);
    if (el > 0) {
      document.getElementById(id).value = +el - 1 ;
    } else {
    }

}

function getValue(id){

  return document.getElementById(id).value;

}
