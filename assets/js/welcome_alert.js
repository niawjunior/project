function alert(){
     $.notify({
    message: 'ยินดีต้อนรับเข้าสู่เว็บไซต์'
},{
    element: 'body',
    position: null,
    type: "success",
    allow_dismiss: true,
    newest_on_top: false,
    showProgressbar: false,
    placement: {
        from: "top",
        align: "right"
    },
    offset: {
        x: 10,
        y: 54
    },
    spacing: 10,
    z_index: 1031,
    delay: 4000,
    timer: 1000,
    url_target: '_blank',
    mouse_over: null,
    animate: {
        enter: 'animated bounceIn',
        exit: 'animated bounceOut'
    },
    template: '<div data-notify="container" class="col-sm-2 col-sm-2 alert alert-{0}" role="alert">' +
        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss"><span class="glyphicon glyphicon-remove"></span></button>' +
        '<span data-notify="message">{2}</span>' +
    '</div>' 
});

 $.notify({
    // options
    message: 'ระดับน้ำในปัจุบัน' +' '+'<?php echo $f55?>'+' เมตร'
},{
    // settings
    element: 'body',
    position: null,
    type: "info",
    allow_dismiss: true,
    newest_on_top: false,
    showProgressbar: true,
    placement: {
        from: "top",
        align: "right"
    },
    offset: {
        x: 10,
        y: 54
    },
    spacing: 10,
    z_index: 1031,
    delay: 4000,
    timer: 1000,
    url_target: '_blank',
    mouse_over: null,
    animate: {
        enter: 'animated bounceIn',
        exit: 'animated bounceOut'
    },
    template: '<div data-notify="container" class="col-sm-2 col-sm-2 alert alert-{0}" role="alert">' +
        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss"><span class="glyphicon glyphicon-remove"></span></button>' +
        '<span data-notify="message">{2}</span>' +
    '</div>' 
});
}

