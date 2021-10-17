function selectedMenu(){
    // get radio button value
    var justJavaSelection = document.querySelector('input[name="just-java"]:checked').value;
    var cafeAuLaitSelection = document.querySelector('input[name="cafe-au-lait"]:checked').value;
    var icedCappucinoSelection = document.querySelector('input[name="iced-cappuccino"]:checked').value;

    //get quantity value
    var justJavaQuantity = document.getElementById('just-java-qty').value;
    var cafeAuLaitQuantity = document.getElementById('cafe-au-lait-qty').value;
    var icedCappucinoQuantity = document.getElementById('cappuccino-qty').value;

    //update subtotal of each coffee
    var justJavaSubtotal = document.getElementById('just-java-subtotal');
    var justJavaSubtotal_number = parseFloat(justJavaSelection) * parseFloat(justJavaQuantity);
    justJavaSubtotal.innerHTML = "Subtotal: $"+justJavaSubtotal_number;

    var cafeSubtotal = document.getElementById('cafe-au-lait-subtotal');
    var cafeSubtotal_number  = parseFloat(cafeAuLaitSelection) * parseFloat(cafeAuLaitQuantity);
    cafeSubtotal.innerHTML = "Subtotal: $"+cafeSubtotal_number;

    var icedCappuccinoSubtotal = document.getElementById('cappuccino-subtotal');
    var icedCappuccinoSubtotal_number = parseFloat(icedCappucinoSelection) * parseFloat(icedCappucinoQuantity);
    icedCappuccinoSubtotal.innerHTML = "Subtotal: $"+icedCappuccinoSubtotal_number;

    //update the final total price
    var subtotal_number = parseFloat(justJavaSubtotal_number) + parseFloat(cafeSubtotal_number) + parseFloat(icedCappuccinoSubtotal_number)
    document.getElementById('total').innerHTML = '$'+subtotal_number;
}
