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

function minus_ajax(id, quantity, price) {
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: 'POST',
        url: '/cartajax/minus',
        data: {
            product_id: id,
            product_quantity: quantity,
            product_price: price,
        },
        success: function (m) {
            $('#cart_ajax_quantity'+id).text(m.newquantity[0].quantity);
            $('#sum'+id).text(m.sum);
            console.log(m.allsum);
            $('#allsum').text(m.allsum);
        }
    });
}

function plus_ajax(id, quantity, price){
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: 'POST',
        url: '/cartajax/plus',
        data: {
            product_id: id,
            product_quantity: quantity,
            product_price: price,
        },
        success: function (p) {
            $('#cart_ajax_quantity'+id).text(p.newquantity[0].quantity);
            $('#sum'+id).text(p.sum);
        }
    })
}

function deleteajax(id) {
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: 'POST',
        url: '/cartajax/deleteajax',
        data: {
            product_id: id,
        },
        success: function (d) {
            console.log(d);
            $('#row'+id).remove(d.id);
        }
    })
}
