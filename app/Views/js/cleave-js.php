<script src="<?= base_url('plugins/cleave-js/cleave.min.js') ?>" integrity="sha512-KaIyHb30iXTXfGyI9cyKFUIRSSuekJt6/vqXtyQKhQP6ozZEGY8nOtRS6fExqE4+RbYHus2yGyYg1BrqxzV6YA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?= base_url('plugins/cleave-js/cleave-phone.id.js') ?>"></script>
<script>
    $(function(){
		$('.phone-number').toArray().forEach(function(field){
        	new Cleave(field, {
	            phone: true,
	            phoneRegionCode: 'id',
	            numericOnly: true,
	            delimiter: ''
	        });
        });
        $('.price-format').toArray().forEach(function(field) {
            new Cleave(field, {
                numeral: true,
                numeralThousandsGroupStyle: 'thousand'
            });
        });
    });
</script>