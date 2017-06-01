function alert(){


$.notify({
	icon: 'img/icon.png',
	title: 'ระบบแจ้งเตือนระดับน้ำ',
	message: 'ระดับน้ำในปัจจุบัน'+'<?php echo $f55?>'+' เมตร'
},{
	type: 'minimalist',
    placement: {
        from: "top",
        align: "right"
    },
    offset: {
        x: 10,
        y: 54
    },
	delay: 5000,
	icon_type: 'image',
    animate: {
        enter: 'animated bounceIn',
        exit: 'animated bounceOut'
    },
	template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
		'<img data-notify="icon" class="img-circle pull-left">' +
		'<span data-notify="title">{1}</span>' +
		'<span data-notify="message">{2}</span>' +
	'</div>'
});
}


