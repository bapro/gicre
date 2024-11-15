<style>
@import url('https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap');
body {
  height: 100%; margin: 0
}

a {
    color: #007bff;
    text-decoration: none;
}
button:focus,
input:focus{
  outline: none;
  box-shadow: none;
}
a,
a:hover{
  text-decoration: none;
}

body{
  font-family: 'Roboto', sans-serif;
   background-color: #ddd;
  
}


/*------------*/
select {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxOS4wLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiDQoJIHZpZXdCb3g9Ii00NzMgMjc3IDEyIDgiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgLTQ3MyAyNzcgMTIgODsiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPHN0eWxlIHR5cGU9InRleHQvY3NzIj4NCgkuc3Qwe2ZpbGw6IzhBOTNBNjt9DQo8L3N0eWxlPg0KPHBhdGggY2xhc3M9InN0MCIgZD0iTS00NzEuNiwyNzcuM2w0LjYsNC42bDQuNi00LjZsMS40LDEuNGwtNiw2bC02LTZMLTQ3MS42LDI3Ny4zeiIvPg0KPC9zdmc+DQo=) calc(100% - 18px) / 11px no-repeat;
}
.form-area {
    background-color: #fff;
    box-shadow: 0px 4px 8px rgb(0 0 0 / 16%);
    padding: 40px;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.form-area .form-inner {
    width: 100%;
}
.form-group{
    position: relative;
    margin-bottom: 30px;
}
.form-control {
    display: block;
    width: 100%;
    height: auto;
    padding: 8px 19px;
    padding-top: 21px;
    min-height: 55px;
    font-size: 1rem;
    color: #475F7B;
    background-color: #FFF;
    border: 1px solid #DFE3E7;
    border-radius: .267rem;
    -webkit-transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
select.form-control{
    padding-top: 10px;
    transition: 0.15s;
}
.form-control:focus {
    color: #475F7B;
    background-color: #FFF;
    border-color: #5A8DEE;
    outline: 0;
    box-shadow: none;
}
.floating-label {
    font-size: 16px;
    font-weight: 400;
    color: #475F7B;
    opacity: 1;
    top: 16px;
    left: 20px;
    pointer-events: none;
    position: absolute;
    transition: 240ms;
    margin-bottom: 0;
    z-index: 1;
}
.floating-diff .floating-label{
    opacity: 0;
}
.floating-diff.focused .floating-label{
    opacity: 1;
}
.form-group.focused .floating-label {
    opacity: 1;
    color: #7b7f82;
    top: 4px;
    left: 19px;
    font-size: 12px;
}
.form-group.focused select.form-control{
    padding-top: 21px;
}
.float-checkradio{
    background-color: #FFF;
    border: 1px solid #DFE3E7;
    border-radius: .267rem;
    padding: 8px 19px;
    transition: 0.3s;
    min-height: 55px;
}
.float-checkradio.focused{
    padding-top: 21px;
}



/*--------select2-css----*/
.select2Part .floating-label{
    opacity: 0;
}
.select2Part.focused .floating-label{
    opacity: 1;
}
.select2multiple .floating-label{
    opacity: 1;
}
.select2Part.focused .select2-container--default .select2-selection--single .select2-selection__rendered{
    padding-top: 13px;
}
.select2-container--default .select2-selection--single{
    border: 1px solid #DFE3E7;
    height: 55px;
}
.select2-container--focus.select2-container--default .select2-selection--single{
    border: 1px solid #5A8DEE;
    background-color: #fff;
}
.select2-container--default .select2-selection--single .select2-selection__rendered{
    line-height: 40px;
    transition: 240ms;
    padding-right: 40px;
    font-size: 16px;
    font-weight: 400;
    color: #475F7B;
    padding-top: 7px;
}
.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 53px;
    right: 15px;
    transition: 240ms;
}
.select2-container--default .select2-results__option--highlighted[aria-selected] {
    background-color: rgb(236 238 241);
    color: #4a494a;
}
.select2-container--default .select2-selection--single .select2-selection__arrow b{
    border: none;
    background: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxOS4wLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiDQoJIHZpZXdCb3g9Ii00NzMgMjc3IDEyIDgiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgLTQ3MyAyNzcgMTIgODsiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPHN0eWxlIHR5cGU9InRleHQvY3NzIj4NCgkuc3Qwe2ZpbGw6IzhBOTNBNjt9DQo8L3N0eWxlPg0KPHBhdGggY2xhc3M9InN0MCIgZD0iTS00NzEuNiwyNzcuM2w0LjYsNC42bDQuNi00LjZsMS40LDEuNGwtNiw2bC02LTZMLTQ3MS42LDI3Ny4zeiIvPg0KPC9zdmc+DQo=') no-repeat 0 0;
    width: 12px;
    height: 8px;
    background-size: 100% 100%;
    transform: translateY(-50%);
    left: 0;
    right: 0;
    margin: auto;
}
.select2-container--default .select2-results__option[aria-selected=true] {
    background-color: #5A8DEE;
    color: #fff;
}  
.select2-container--default .select2-results__option:last-child{
    border-radius: 0px 0px 4px 4px;
}
.select2-container--default .select2-selection--single{
    border-radius: .267rem;
}
.select2-container .select2-selection--single .select2-selection__rendered{
    padding-left: 19px;

}
.select2-container--default.select2-container--open.select2-container--above .select2-selection--multiple, 
.select2-container--default.select2-container--open.select2-container--above .select2-selection--single {
    border-top-left-radius: 6px;
    border-top-right-radius: 6px;
}
.select2-results__option {
    padding: 8px 18px;
    user-select: none;
    -webkit-user-select: none;
    color: #4F4F4F;
    font-size: 15px;
    font-weight: 400;
}
.select2-container--open .select2-dropdown--above {
    box-shadow: 0px 6px 32px rgb(0 0 0 / 10%);
    border-radius: 0px;
    border: none;
    top: 8px;
    border-radius: 6px;
    overflow: hidden;
}

.select2-container--open .select2-dropdown--below{
    box-shadow: 0px 2px 18px rgb(0 0 0 / 16%);
    border-radius: 0px;
    border: none;
    top: -8px;
    border-radius: 6px;
    overflow: hidden;
}
.select2Part.w-100 > .select2-container{    
    width: 100% !important;
}
.select2-search--dropdown{
    padding: 12px 15px;
    position: relative;
}
.select2-container--default .select2-search--dropdown .select2-search__field{
    font-size: 14px;
    border: 1px solid #DFE3E7;
    border-radius: 4px;
    color: #757575;
    padding: 10px 15px;
    background-color: #fff;
    position: relative;
    padding-right: 45px;
}
.select2-container--default .select2-search--dropdown:after{
    content: "\f002";
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    position: absolute;
    top: 23px;
    right: 30px;
    font-size: 15px;
    color: rgba(0,0,0,0.54);
}
.select2-container--default .select2-selection--multiple{
    background-color: #fff;
    border: 1px solid #DFE3E7;
    min-height: 50px;
    border-radius: 6px;
    position: relative;
}
.select2-container--default.select2-container--focus .select2-selection--multiple{
    border: 1px solid #5A8DEE;
    background-color: #fff;
}
.select2-container--default .select2-selection--multiple .select2-selection__rendered{
    color: #757575;
    line-height: 55px;
    padding-right: 40px;
    display: block;
    height: 100%;
    padding-bottom: 7px;
    padding-top: 17px;
    padding-left: 17px;
    transition: 240ms;
}
.select2-container--default .select2-selection--multiple .select2-selection__arrow {
    height: 48px;
    right: 15px;
}
.select2-container--default .select2-selection--multiple .select2-search--inline .select2-search__field{
    line-height: initial;
    padding: 0;
}
.select2-container--default .select2-selection--multiple .select2-selection__rendered:before {
    border: none;
    content: '';
    background: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxOS4wLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiDQoJIHZpZXdCb3g9Ii00NzMgMjc3IDEyIDgiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgLTQ3MyAyNzcgMTIgODsiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPHN0eWxlIHR5cGU9InRleHQvY3NzIj4NCgkuc3Qwe2ZpbGw6IzhBOTNBNjt9DQo8L3N0eWxlPg0KPHBhdGggY2xhc3M9InN0MCIgZD0iTS00NzEuNiwyNzcuM2w0LjYsNC42bDQuNi00LjZsMS40LDEuNGwtNiw2bC02LTZMLTQ3MS42LDI3Ny4zeiIvPg0KPC9zdmc+DQo=') no-repeat 0 0;
    width: 12px;
    height: 8px;
    background-size: 100% 100%;
    transform: translateY(-50%);
    position: absolute;
    right: 18px;
    top: 26px;
}
.select2-container--default .select2-selection--multiple .select2-selection__rendered li {
    list-style: none;
    line-height: initial;
    padding: 5px;
    font-size: 14px;
    position: relative;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #f1f1f1;
    border: 1px solid #f1f1f1;
    border-radius: 4px;
    cursor: default;
    float: left;
    color: #1f1f1f;
    margin-right: 5px;
    margin-top: 5px;
    width: initial !important;
    padding: 5px 10px;
    padding-right: 24px !important;
    font-size: 13px !important;
    letter-spacing: 0.3px;
}
.select2-container--default .select2-search--inline .select2-search__field{
    width: 100% !important;
    font-size: 16px;
    margin-top: 0px;
    padding: 0;
    padding-left: 5px;
    line-height: 27px;
    padding-top: 6px;
}

.select2-container--default .select2-selection--multiple .select2-selection__choice__remove{
    position: absolute;
    font-size: 17px;
    width: 20px;
    height: 20px;
    top: 3px;
    text-align: center;
    color: #e45555;
    right: 0px;
}
.floating-group.focused .select2-container--default .select2-selection--multiple .select2-selection__rendered{
    padding-bottom: 7px;
    padding-top: 17px;
    padding-left: 17px;
}
/*.select2multiple .select2-container--default .select2-results__option[aria-selected=true] {
    display: none;
}*/
</style>
<form action="javascript:void(0);">
							<div class="form-group floating-group">
								<label class="floating-label">Full Name</label>
								<input type="text" class="form-control floating-control" />
							</div>
							<div class="form-group floating-group">
								<label class="floating-label">Email Address</label>
								<input type="email" class="form-control floating-control" />
							</div>
							<div class="form-group floating-group floating-diff">
								<label class="floating-label">Select Country</label>
								<select id="country" name="country" class="form-control floating-control">
									<option value="">Select Country</option>   
									<option value="Afganistan">Afghanistan</option>
									<option value="Albania">Albania</option>
									<option value="India">India</option>
									<option value="American Samoa">American Samoa</option>
									<option value="Andorra">Andorra</option>
									<option value="Angola">Angola</option>
								</select>
							</div>
							<div class="form-group select2Part w-100 floating-group">
                                <label class="floating-label">Select State</label>
                                <select name="" id="" class="form-control customSelect floating-control">
                                    <option value="">Select State</option>
                                    <option value="1">Category 1</option>
                                    <option value="2">Category 2</option>
                                    <option value="3">Category 3</option>
                                    <option value="4">Category 4</option>
                                </select>
                            </div>
                           
							<div class="form-group floating-group">
								<label class="floating-label">Password</label>
								<input type="password" class="form-control floating-control" value="" />
							</div>
							<div class="form-group floating-group">
								<label class="floating-label">Message</label>
								<textarea name="" id="" rows="4" class="form-control floating-control"></textarea>
							</div>
							<button type="submit" class="btn btn-primary form-submit">Submit</button>
						</form>
						<script>
						// ----floatin input label in input and select
						
						
						$('.form-group').select2({
			theme: 'bootstrap-5',
			width: '100%',
			dropdownParent: $('#largeModalOrdenMedica'),
			tags:true
			});	

$('.form-group').find('.floating-control').each(function (index, ele) {
	var $ele = $(ele);
	if($ele.val() != '' || $ele.is(':selected') === true){
		$ele.parents('.floating-group').addClass('focused');
	}
})


$('.floating-control').on('focus', function (e) {
	$(this).parents('.floating-group').addClass('focused');	
}).on('blur', function(){
	if($(this).val().length > 0){
		$(this).parents('.floating-group').addClass('focused');		
	}else{
		$(this).parents('.floating-group').removeClass('focused');
	}
});
$('.floating-control').on('change', function (e) {
	if($(this).is('select')){
		if($(this).val() === $("option:first", $(this)).val()) {
			$(this).parents('.floating-group').removeClass('focused');
		}
		else{
			$(this).parents('.floating-group').addClass('focused');
		}
	}
})


// --------select2-------
$(document).ready(function() {
	//---- select2 single----
	$('.customSelect').each(function() {
		var dropdownParents = $(this).parents('.select2Part')
		$(this).select2({
			dropdownParent: dropdownParents,
			minimumResultsForSearch: -1
		}).on("select2:open", function (e) { 
			$(this).parents('.floating-group').addClass('focused');
		}).on("select2:close", function (e) {
			if($(this).find(':selected').val() === ''){
				$(this).parents('.floating-group').removeClass('focused');
			}
		});
	});

	//---- select2 multiple----
	$('.customSelectMultiple').each(function() {
		var dropdownParents = $(this).parents('.select2Part');
		// var placehldrget = $(this).attr("data-placeholder");
		$(this).select2({
			dropdownParent: dropdownParents,
			// placeholder: placehldrget,
			// tags: true,
			// closeOnSelect: false,
		}).on("select2:open", function (e) { 
			$(this).parents('.floating-group').addClass('focused');
		}).on("select2:close", function (e) {
			if($(this).val() != ''){
				$(this).parents('.floating-group').addClass('focused');
			}else{
				$(this).parents('.floating-group').removeClass('focused');
			}
		}).on("select2:select", function (e) { 
			$(this).parents('.floating-group').addClass('focused');
		}).on("select2:unselect", function (e) {
			$(this).parents('.floating-group').addClass('focused');
		})
	});
});
						</script>