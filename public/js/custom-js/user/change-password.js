$(function(){
    attachListenerValidatePassword();
});

const attachListenerValidatePassword=()=>{
    $(document).on('click','#changePasswordBtn',function(){
        let newPassword = $('#newPassword').val();
        let cPassword   = $('#confirmPassword').val();
        let _method     = $('#_method').val();
        if(isEmptyField(newPassword) && isEmptyField(cPassword)) {
            if(newPassword == cPassword) {
                const obj = {};
                obj.password = newPassword;
                obj._method  = _method;
                updatePassword(obj);
            } else {
                alertify.warning('Please enter Confirm Password Same as New Password');
            }
        } else {
            alertify.warning('Please fill up all required field(s)');
        }
    });
}

/**
 * AJAX: change pass
 */
const updatePassword=(obj)=>{
    $.when(ajax.update('/user/change-password/',$('#userId').val(),obj)).done(function(response) {
        switch(response.status) {
            case HttpStatus.SUCCESS:
                    redirect('/role',1000);
					break;
        }
    });
}