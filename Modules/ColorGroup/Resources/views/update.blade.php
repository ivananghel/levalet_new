
<style>
.onoffswitch {
    position: relative; width: 90px;
    margin-top: 0px;
    margin-left: 0px;
    -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
}

.onoffswitch-inner:before, .onoffswitch-inner:after {
    display: block; float: left; width: 50%; height:30px; padding: 0; line-height: 30px;
    font-size: 14px; 
}
.onoffswitch-inner:before {
    
    padding-left: 10px;
    background-color: #34A7C1; color: #FFFFFF;
}
.onoffswitch-inner:after {
    
    padding-right: 6px;
    background-color: #EEEEEE; color: #999999;
    text-align: right;
}
.onoffswitch-switch {
    display: block; width: 20px; margin: 4px;
    
    position: absolute; top: 0; bottom: 0;
    right: 56px;
    border: 2px solid #999999; border-radius: 20px;
    transition: all 0.3s ease-in 0s; 
}

</style>
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
    &times;
</button>
<h4 class="modal-title" id="myModalLabel">{{ trans('colorgroup::lang.color_group') }}</h4>
</div>
<div id="result"></div>

<div class="modal-body no-padding" >

<form action="parameters/colorgroup/update/{{$color->id}}" id="add-color-form" method="post" class="smart-form">
    <fieldset id="color_update">
        
        <div class="row">
            <section class="col col-9">
                <label class="label">{{ trans('colorgroup::lang.label_title') }}</label>
                <label class="input"> <i class="icon-append fa fa-file-text-o "></i>
                    <input type="text" name="title" required placeholder="{{ trans('colorgroup::lang.label_title') }}" value="{{ $color->title }}">
                </label>
            </section>
            <section class="col col-3">
                <label class="label">{{ trans('colorgroup::lang.status') }}</label>
                <span class="onoffswitch " >
                    <input id="plo" class="onoffswitch-checkbox" name="status" type="checkbox"   {{ ($color->status == 1 ? "checked" : "") }} >
                    <label for="plo" class="onoffswitch-label">
                        <span data-swchoff-text="{{ trans('colorgroup::lang.disable')}}" data-swchon-text="{{ trans('colorgroup::lang.active')}}" class="onoffswitch-inner"></span>
                        <span class="onoffswitch-switch"></span>
                    </label>
                </span>
            </section>
        </div>
        <hr></hr>
        @foreach(json_decode($color->group_color) as $k =>$col )
        
        <div class="row groupcolor" id="color_update">
            <div class ="countcolor">
                <section class="col col-5" >
                    <label class="label" >{{trans('colorgroup::lang.name')}}</label>
                    <label class="input"> <i class="icon-append fa fa-file-text-o "></i>
                        <input   type="text" name="group[{{$k}}][name]"  value ="{{$col->name}}" placeholder="{{ trans('colorgroup::lang.name') }}" required>
                    </label>
                    
                </section>
                <section class="col col-4" >
                    <label class="label">{{trans('colorgroup::lang.label_color')}}</label>
                    <label class="input"> <i class="icon-append fa fa-pencil-square   "></i>
                        <input  class="color-pick"  data-color="{{$col->color}}" type="text" name='group[{{$k}}][color]' required>
                    </label>
                    
                </section>
            </div>
            <section class="col col-3" >
                
                <a href="javascript:void(0);" class="btn btn-primary btn-sm new_color" style="margin-top:25px;" ><i class="fa fa-plus"></i></a>
                
                <a href="javascript:void(0);" class="btn btn-danger btn-sm delete_color" style="margin-top:25px;"><i class="fa fa-trash-o"></i></a>
                
            </section>
            
        </div>
        @endforeach 
    </fieldset>
    
    <footer>
        <button type="submit" class="btn btn-primary">
            {{ trans('lang.add') }} 
        </button>
        <button type="button" class="btn btn-default" data-dismiss="modal">
            {{ trans('lang.cancel') }}
        </button>
    </footer>
</form>

</div>


<!-- PAGE RELATED PLUGIN(S) -->
<script src="js/plugin/jquery_form/jquery.form.js"></script>

<script>
$('.color-pick').colorpicker();


$(document).on('click', '.btn-group-justified a', function (event) {
    
    var btn = $(this);
    btn.addClass(btn.data('color'));
    $('input[name="status"]').val(btn.data('status'));
    
    $(this).parent().find('.btn').each(function (index, item) {
        if ($(item).data('color') == btn.data('color')) {
            return true;
        }
        $(this).removeClass($(this).data('color')).addClass('btn-default');
    });
});

var errorClass = 'invalid';
var errorElement = 'em';

var $registerForm = $("#add-color-form").validate({
    errorClass: errorClass,
    errorElement: errorElement,
    highlight: function (element) {
        $(element).parent().removeClass('state-success').addClass("state-error");
        $(element).removeClass('valid');
    },
    unhighlight: function (element) {
        $(element).parent().removeClass("state-error").addClass('state-success');
        $(element).addClass('valid');
    },
    // Rules for form validation
    rules: {
      
    },
    // Messages for form validation
    messages: {
       
    },
    // Do not change code below
    errorPlacement: function (error, element) {
        error.insertAfter(element.parent());
    },
    submitHandler: function (form) {
        submit_form('#add-color-form', '#result')
    }
});
</script>