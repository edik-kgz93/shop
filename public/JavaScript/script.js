function minus() {
    var quantity=document.getElementById('quantity').innerHTML;
    if(quantity>1){
        document.getElementById('quantity').innerHTML=quantity-1;
    }
}

function plus() {
    var quantity=document.getElementById('quantity').innerHTML;
    var quantity=parseInt(quantity)+1;
    document.getElementById('quantity').innerHTML=quantity;
    document.getElementById('form_quantity').value=quantity;
}

