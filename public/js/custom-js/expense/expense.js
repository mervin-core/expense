$(function() {
    attachListenerAddExpenseBtn();
    attachListenerUpdateExpenseBtn();
    attachListenerDeleteExpenseBtn();
});
/**
 * Add User role Button
 */
const attachListenerAddExpenseBtn=()=> {
    $(document).on('click','#addExpenseBtn',function() {
        let categoryId = $('#category').val();
        let amount     = $('#amount').val();
        let entryDate  = $('#entryDate').val();
        const expObj = {};
        if(isEmptyField(categoryId) && isEmptyField(amount) && isEmptyField(entryDate)) {
            expObj.categoryId = categoryId;
            expObj.amount     = amount;
            expObj.entryDate  = entryDate;
            insertExpense(expObj);
        } else {
            alertify.warning('Please fill up all required field(s)');
        }
    });
}
/**
 * AJAX: Add Expense Category
 */
const insertExpense=(expense)=> {
    $.when(ajax.create('/expense',expense)).done(function(response) {
        switch(response.status) {
            case HttpStatus.SUCCESS:
                    redirect('/expense',1000);
					break;
        }
    });
}

/**
 * Edit User role
 */
const attachListenerEditExpense=(expense)=> {
    $('#editCategory').val(expense.category_id);
    $('#editAmount').val(expense.amount);
    $('#editEntryDate').val(expense.entry_date);
    $('#expenseId').val(expense.id);
}

/**
 * Update user role button
 */
const attachListenerUpdateExpenseBtn=()=> {
    $(document).on('click','#updateExpenseBtn',function() {
        let categoryId  = $('#editCategory').val();
        let amount      = $('#editAmount').val();
        let entryDate   = $('#editEntryDate').val();
        let expenseId   = $('#expenseId').val();
        let _method      = $('#_method').val();
        const expObj ={};
        if(isEmptyField(amount) && isEmptyField(entryDate) && isEmptyField(categoryId)) {
            expObj.categoryId = categoryId;
            expObj.amount     = amount;
            expObj.entryDate  = entryDate;
            expObj._method    = _method;
            updateExpense(expObj,expenseId);
        } else {
            alertify.warning('Please fill up all required field(s)');
        }
    });
}

/**
 * AJAX: UPDATE EXPENSE CATEGORY
 */
const updateExpense=(expense,id)=> {
    $.when(ajax.update('/expense/',id,expense)).done(function(response) {
        switch(response.status) {
            case HttpStatus.SUCCESS:
                    redirect('/expense',1000);
					break;
        }
    });
}

/**
 * Delete User role
 */
const attachListenerDeleteExpense=(expense)=> {
    $('#delExpenseId').val(expense.id);
}

/**
 * Delete User role button
 */
const attachListenerDeleteExpenseBtn=()=> {
    $(document).on('click','#deleteExpenseBtn',function(){
        let expenseId = $('#delExpenseId').val();
        deleteExpense(expenseId);
    });
}

/**
 * AJAX: Remove User role
 */
const deleteExpense=(id)=> {
    $.when(ajax.remove('/expense/',id)).done(function(response) {
        switch(response.status) {
            case HttpStatus.SUCCESS:
                    redirect('/expense',1000);
					break;
        }
    });
}