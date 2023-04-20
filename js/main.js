// date restrection
function day(input) {
    var value = input.value;
  
    if (value !== "") {
      var intValue = parseInt(value, 10);
  
      if (isNaN(intValue) || intValue < 1 || intValue > 31) {
        input.value = "";
      } else {
        input.value = intValue;
      }
    }
  }

  // month restrection

function month(input) {
    var value = input.value;
  
    if (value !== "") {
      var intValue = parseInt(value, 10);
  
      if (isNaN(intValue) || intValue < 1 || intValue > 12) {
        input.value = "";
      } else {
        input.value = intValue;
      }
    }
  }


  