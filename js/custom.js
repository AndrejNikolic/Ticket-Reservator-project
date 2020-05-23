function readURL(input) {
    if (input.files && input.files[0]) {
    var reader = new FileReader();
      
    reader.onload = function(e) {
        $('#imageView').attr('src', e.target.result);
    }
      
    reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

$("#imageFile").change(function() {
    readURL(this);
});

$(document).ready(function(){
    // tickets
    var current = parseInt($(".qty").val());
    var max = $(".qty").attr("max");
    $(".btn-minus").addClass("disabled");

    if (max == 0){
        $(".btn-plus").addClass("disabled");
        $(".qty").addClass("disabled");
        $(".order-ticket.ticket .btn.btn-primary").addClass("disabled");
    }
    if (current == 0){
        $(".order-ticket.ticket .btn.btn-primary").addClass("disabled");
    }

    $(".qty").focusout(function(){
        current = parseInt($(".qty").val());

        if (current > 0) {
            $(".btn-minus").removeClass("disabled");
            $(".order-ticket.ticket .btn.btn-primary").removeClass("disabled");
        } 
        else {
            $(".btn-minus").addClass("disabled");
            $(".qty").val(0);
            $(".order-ticket.ticket .btn.btn-primary").addClass("disabled");
        }

        if (current > max) {
            $(".btn-plus").addClass("disabled");
            $(".qty").val(max);
        } 
        else {
            $(".btn-plus").removeClass("disabled");
        }
    });

    $(".btn-minus").click(function() {
        $(".btn-plus").removeClass("disabled");
        current = parseInt($(".qty").val());

        if (current > 0) {
            $(".btn-minus").removeClass("disabled");
            $(".qty").val(current - 1);
            $(".order-ticket.ticket .btn.btn-primary").removeClass("disabled");
        } else {
            $(".btn-minus").addClass("disabled");
            $(".order-ticket.ticket .btn.btn-primary").addClass("disabled");
        }
        if (current == 1){
            $(".order-ticket.ticket .btn.btn-primary").addClass("disabled");
        }
    });

    $(".btn-plus").click(function() {
        $(".btn-minus").removeClass("disabled");
        $(".order-ticket.ticket .btn.btn-primary").removeClass("disabled");
        current = parseInt($(".qty").val());

        if (current >= max) {
            $(".btn-plus").addClass("disabled");
        } else {
            $(".btn-plus").removeClass("disabled");
            $(".qty").val(current + 1);
        }
    });

    // vip tickets
    var current_vip = parseInt($(".qty-vip").val());
    var max_vip = $(".qty-vip").attr("max");
    $(".btn-minus-vip").addClass("disabled");

    if (max_vip == 0){
        $(".btn-plus-vip").addClass("disabled");
        $(".qty-vip").addClass("disabled");
        $(".order-ticket.vip .btn.btn-primary").addClass("disabled");
    }
    if (current_vip == 0){
        $(".order-ticket.vip .btn.btn-primary").addClass("disabled");
    }

    $(".qty-vip").focusout(function(){
        current_vip = parseInt($(".qty-vip").val());

        if (current_vip > 0) {
            $(".btn-minus-vip").removeClass("disabled");
            $(".order-ticket.vip .btn.btn-primary").removeClass("disabled");
        } 
        else {
            $(".btn-minus-vip").addClass("disabled");
            $(".qty-vip").val(0);
            $(".order-ticket.vip .btn.btn-primary").addClass("disabled");
        }

        if (current_vip > max_vip) {
            $(".btn-plus-vip").addClass("disabled");
            $(".qty-vip").val(max_vip);
        } 
        else {
            $(".btn-plus-vip").removeClass("disabled");
        }
    });

    $(".btn-minus-vip").click(function() {
        $(".btn-plus-vip").removeClass("disabled");
        current_vip = parseInt($(".qty-vip").val());

        if (current_vip > 0) {
            $(".btn-minus-vip").removeClass("disabled");
            $(".qty-vip").val(current_vip - 1);
            $(".order-ticket.vip .btn.btn-primary").removeClass("disabled");
        } else {
            $(".btn-minus-vip").addClass("disabled");
            $(".order-ticket.vip .btn.btn-primary").addClass("disabled");
        }
        if (current == 1){
            $(".order-ticket.vip .btn.btn-primary").addClass("disabled");
        }
    });

    $(".btn-plus-vip").click(function() {
        $(".btn-minus-vip").removeClass("disabled");
        $(".order-ticket.vip .btn.btn-primary").removeClass("disabled");
        current_vip = parseInt($(".qty-vip").val());

        if (current_vip >= max_vip) {
            $(".btn-plus-vip").addClass("disabled");
        } else {
            $(".btn-plus-vip").removeClass("disabled");
            $(".qty-vip").val(current_vip + 1);
        }
    }); 
})


  