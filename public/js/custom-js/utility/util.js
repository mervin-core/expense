/**
 * Generate random Id
 * @return {int}
 */
const generateRandomId = () => {
	return  Math.random().toString(36).substr(2, 9);
}

/**
 * 
 * @param dom 
 * return dom - if button is checked else return value 0 
 */
const checkBtnIsEmpty =(dom)=> {
    if(typeof dom === 'undefined' ) {
        return Status.OFF;
    }   
    return dom;
}

/**
 * Check field is empty
 * 
 * @param {*} dom 
 */
const isEmptyField=(dom)=> {
    return (dom);
}
/**
 * Check array list is empty
 * 
 * @param {*} arrayList 
 */
const isEmptyArray=(arrayList)=> {
    return (arrayList.length != 0);
}

/**
 * Description: Redirects user to the given url
 * @param url
 * @returns
 */
function redirect(url,noOfSeconds) {
	setTimeout(function() {$(location).attr("href", url);},noOfSeconds)
}