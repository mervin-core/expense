$(function() {
    attachListenerAddUserRoleBtn();
    attachListenerUpdateUserRoleBtn();
    attachListenerDeleteUserRoleBtn();
});
/**
 * Add User role Button
 */
const attachListenerAddUserRoleBtn=()=> {
    $(document).on('click','#addRoleBtn',function() {
        let roleName    = $('#displayName').val();
        let description = $('#description').val();
        const roleobj = {};
        if(isEmptyField(roleName) && isEmptyField(description)) {
            roleobj.roleName    = roleName;
            roleobj.description = description;
            insertUserRole(roleobj);
        } else {
            alertify.warning('Please fill up all required field(s)');
        }
    });
}
/**
 * AJAX: ADDING ROLE
 */
const insertUserRole=(role)=> {
    $.when(ajax.create('/role',role)).done(function(response) {
        switch(response.status) {
            case HttpStatus.SUCCESS:
                    redirect('/role',1000);
					break;
        }
    });
}

/**
 * Edit User role
 */
const attachListenerEditUserRole=(role)=> {
    $('#editDisplayName').val(role.role_name);
    $('#editDescription').val(role.role_description);
    $('#roleId').val(role.id);
}

/**
 * Update user role button
 */
const attachListenerUpdateUserRoleBtn=()=> {
    $(document).on('click','#updateUserRoleBtn',function() {
        let roleId      = $('#roleId').val();
        let roleName    = $('#editDisplayName').val();
        let description = $('#editDescription').val();
        let _method     = $('#_method').val();
        const roleobj ={};
        if(isEmptyField(roleName) && isEmptyField(description)) {
            roleobj.roleName    = roleName;
            roleobj.description = description;
            roleobj._method     = _method;
            updateUserRole(roleobj,roleId);
        } else {
            alertify.warning('Please fill up all required field(s)');
        }
    });
}

/**
 * AJAX: UPDATE USER ROLE
 */
const updateUserRole=(role,id)=> {
    $.when(ajax.update('/role/',id,role)).done(function(response) {
        switch(response.status) {
            case HttpStatus.SUCCESS:
                    redirect('/role',1000);
					break;
        }
    });
}

/**
 * Delete User role
 */
const attachListenerDeleteUserRole=(role)=> {
    $('#roleName').text(role.role_name);
    $('#roleId').val(role.id);
}

/**
 * Delete User role button
 */
const attachListenerDeleteUserRoleBtn=()=> {
    $(document).on('click','#deleteUserRoleBtn',function(){
        let roleId = $('#roleId').val();
        deleteUserRole(roleId);
    });
}

/**
 * AJAX: Remove User role
 */
const deleteUserRole=(id)=> {
    $.when(ajax.remove('/role/',id)).done(function(response) {
        switch(response.status) {
            case HttpStatus.SUCCESS:
                    redirect('/role',1000);
					break;
        }
    });
}