$(function() {
    fetchUserTotalExpense();
});
//Global Array
arrayList = [];


/**
 * AJAX: FETCH 
 */
const fetchUserTotalExpense=()=>{
    $.when(ajax.fetch('/dashboard/'+$('#userId').val())).done(function(response){
        switch(response.status) {
            case HttpStatus.SUCCESS:
                console.log(response.user);
                populateUserExpense(response.user);
                break;
        }
    });
}

const populateUserExpense=(userTotalExpense)=> {
    _.each(userTotalExpense,function(category){
        const obj = {};
        obj.y     = populateExpenses(category.expense);
        obj.label = category.category_name;
        arrayList.push(obj);
    });
    initializePieChart(arrayList);
    populateDisplayTotalCategory(arrayList);
}
const populateExpenses=(expense)=> {
    let total = 0;
    _.each(expense,function(exp){
        total = total+exp.amount
    });
    return total;
}
/**
 * Initialize PIE CHART
 */
const initializePieChart=(arrayList)=>{
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        title: {
            text: "My Expenses"
        },
        data: [{
            type: "pie",
            startAngle: 240,
            yValueFormatString: "##0.00\" php\"",
            indexLabel: "{label} {y}",
            dataPoints:arrayList
        }]
    });
    chart.render();
}

const populateDisplayTotalCategory=(category)=> {
    _.each(category,function(cate) {
        appendCategory(cate.y,cate.label);
    });
}
const appendCategory=(total,categoryName)=> {
    $('#category').append($('<p />')
        .text(categoryName)
    );

    $('#TotalExpenses').append($('<p />')
    .text(total)
    );
}
