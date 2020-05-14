$(function() {
    attachListenerAddExpenseCategoryBtn();
    attachListenerUpdateExpenseCategoryBtn();
    attachListenerDeleteExpenseCategoryBtn();
});
/**
 * Add User role Button
 */
const attachListenerAddExpenseCategoryBtn=()=> {
    $(document).on('click','#addCategoryBtn',function() {
        let categoryName = $('#categoryName').val();
        let description  = $('#description').val();
        let userId       = $('#userId').val();
        const catobj = {};
        if(isEmptyField(categoryName) && isEmptyField(description) && isEmptyField(userId)) {
            catobj.userId       = userId;
            catobj.categoryName = categoryName;
            catobj.description  = description;
            insertExpenseCategory(catobj);
        } else {
            alertify.warning('Please fill up all required field(s)');
        }
    });
}
/**
 * AJAX: Add Expense Category
 */
const insertExpenseCategory=(category)=> {
    $.when(ajax.create('/expense-category',category)).done(function(response) {
        switch(response.status) {
            case HttpStatus.SUCCESS:
                    redirect('/expense-category',1000);
					break;
        }
    });
}

/**
 * Edit User role
 */
const attachListenerEditExpenseCategory=(category)=> {
    $('#editCategoryName').val(category.category_name);
    $('#editDescription').val(category.category_description);
    $('#categoryId').val(category.id);
}

/**
 * Update user role button
 */
const attachListenerUpdateExpenseCategoryBtn=()=> {
    $(document).on('click','#updateExpenseCategoryBtn',function() {
        let categoryId   = $('#categoryId').val();
        let categoryName = $('#editCategoryName').val();
        let description  = $('#editDescription').val();
        let _method      = $('#_method').val();
        const catobj ={};
        if(isEmptyField(categoryName) && isEmptyField(description)) {
            catobj.categoryName = categoryName;
            catobj.description  = description;
            catobj._method     = _method;
            updateExpenseCategory(catobj,categoryId);
        } else {
            alertify.warning('Please fill up all required field(s)');
        }
    });
}

/**
 * AJAX: UPDATE EXPENSE CATEGORY
 */
const updateExpenseCategory=(category,id)=> {
    $.when(ajax.update('/expense-category/',id,category)).done(function(response) {
        switch(response.status) {
            case HttpStatus.SUCCESS:
                    redirect('/expense-category',1000);
					break;
        }
    });
}

/**
 * Delete User role
 */
const attachListenerDeleteExpenseCategory=(category)=> {
    $('#delCategoryName').text(category.category_name);
    $('#categoryId').val(category.id);
}

/**
 * Delete User role button
 */
const attachListenerDeleteExpenseCategoryBtn=()=> {
    $(document).on('click','#deleteExpenseCategoryBtn',function(){
        let categoryId = $('#categoryId').val();
        deleteExpenseCategory(categoryId);
    });
}

/**
 * AJAX: Remove User role
 */
const deleteExpenseCategory=(id)=> {
    $.when(ajax.remove('/expense-category/',id)).done(function(response) {
        switch(response.status) {
            case HttpStatus.SUCCESS:
                    redirect('/expense-category',1000);
					break;
        }
    });
}