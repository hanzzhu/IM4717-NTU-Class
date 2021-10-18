function onPriceChange(number){
    let price_number = parseInt(number);
    if(document.getElementById("price_"+price_number).checked == true){
        document.getElementById("price_new_"+price_number).setAttribute("type", "number");
        document.getElementById("price_new_"+price_number).setAttribute("step", "0.01");
    }

    if(document.getElementById("price_"+price_number).checked == false){
        document.getElementById("price_new_"+price_number).setAttribute("type", "hidden");
        document.getElementById("price_new_"+price_number).setAttribute("value", "");
    }


}
