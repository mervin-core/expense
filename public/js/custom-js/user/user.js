$(function() {
    attachListenerAddUserBtn();
    attachListenerUpdateUserBtn();
    attachListenerDeleteUserBtn();
});

/**
 * Add user button
 */
const attachListenerAddUserBtn=()=> {
    $(document).on('click','#addUserBtn',function(){
        let name     = $('#name').val();
        let email    = $('#email').val();
        let roleId   = $('#role').val();
        const userOjb = {};
        if(isEmptyField(name) && isEmptyField(email) && isEmptyField(roleId)) {
            userOjb.name   = name;
            userOjb.email  = email;
            userOjb.roleId = roleId;
            insertUser(userOjb);
        } else {
            alertify.warning('Please fill up all required field(s)');
        }
    });
}
/**
 * AJAX: ADDING USER
 */
const insertUser=(user)=> {
    $.when(ajax.create('/user',user)).done(function(response) {
        switch(response.status) {
            case HttpStatus.SUCCESS:
                    redirect('/user',1000);
					break;
        }
    });
}

/**
 * Edit user
 */
const attachListenerEditUser=(user)=> {
    $('#editName').val(user.name);
    $('#editEmail').val(user.email);
    $('#editRole').val(user.role.id);
    $('#userId').val(user.id);
}

/**
 * Update user button
 */
const attachListenerUpdateUserBtn=()=> {
    $(document).on('click','#UpdateUserBtn',function() {
        let name     = $('#editName').val();
        let email    = $('#editEmail').val();
        let roleId   = $('#editRole').val();
        let userId   = $('#userId').val();
        let _method  = $('#_method').val();
        const userObj = {};
        if(isEmptyField(name) && isEmptyField(email) && isEmptyField(roleId)) {
            userObj.name   = name;
            userObj.email  = email;
            userObj.roleId = roleId;
            userObj._method = _method;
            updateUser(userObj,userId);
        } else {
            alertify.warning('Please fill up all required field(s)');
        }
    });
}

/**
 * AJAX: UPDATE USER
 */
/**
 * AJAX: UPDATE USER ROLE
 */
const updateUser=(user,id)=> {
    $.when(ajax.update('/user/',id,user)).done(function(response) {
        switch(response.status) {
            case HttpStatus.SUCCESS:
                    redirect('/user',1000);
					break;
        }
    });
}
/**
 * Delete User role
 */
const attachListenerDeleteUser=(user)=> {
    $('#userName').text(user.name);
    $('#userId').val(user.id);
}

/**
 * Delete User button
 */
const attachListenerDeleteUserBtn=()=> {
    $(document).on('click','#deleteUserBtn',function(){
        let userId = $('#userId').val();
        deleteUser(userId);
    });
}

/**
 * AJAX: Remove User role
 */
const deleteUser=(id)=> {
    $.when(ajax.remove('/user/',id)).done(function(response) {
        switch(response.status) {
            case HttpStatus.SUCCESS:
                    redirect('/user',1000);
					break;
        }
    });
}