/**
 * GLOBAL HELPER FUNCTION
 * 
 * DEVELOPED BY: MERVIN APIAG
 * 
 * DONT COPY :)
 */
$(function(){
    defineHttpStatus();
    defineStatus();
    defineMessages();
    defineAjaxRequest();
});


function defineHttpStatus() {
	HttpStatus = {
        SUCCESS:									200,
        NO_CONTENT:                                 204,
        UNKNOWN_STATUS:                             419,
        UNPROCESSABLE_ENTITY:                       422,
        INTERNAL_SERVER_ERROR:					    500
    };
}

function defineStatus() {
    Status = {
         PENDING:   		    0,
         COMPLETED: 		    1,
     
         APPROVAL:        		0,
         APPROVED:              1,
         DECLINED:              2,
     
         OFF:                   0,
         ON:                    1,
	};
}

function defineMessages() { 
	var tryAgainClause = "\n Please try again. \n If the problem persists, \n please contact mervinapiag@gmail.com.";
	
	Message = {
		UNKNOWN_STATUS:
        "An error has occurred \n" + tryAgainClause,	
        INTERNAL_SERVER_ERROR:
			"An error has occurred \n while connecting to the database. " + tryAgainClause,	
		UNHANDLED_ERROR_MESSAGE:
            "A server error has occurred. " + tryAgainClause,
        NO_CONTENT:
            "Please fill up all required fields",
        UNPROCESSABLE_ENTITY:
            "Duplicate Entry",
        SUCCESS: 
            "Success!",
		SUCCESS_INSERT:
            "Successfully Saved.",
        SUCCESS_UPDATE:
            "Successfully Updated.",
        SUCCESS_DELETE:
            "Successfully Deleted."
	}
}

function defineAjaxRequest() {
	ajax = {
		/**
		 * Description: Generalized Ajax Request For List
		 * @Param url 
		 * @return
		 */	
		fetch : function(url) {
			return $.ajax({
				url: url,
				type: "GET",
				dataType: "json",
				contentType: "application/json",
				mimeType: "application/json",
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
			}).done(function(response) {
				switch(response.status) {
					case HttpStatus.SUCCESS:
						alertify.success(Message.SUCCESS);
						break;
					case HttpStatus.INTERNAL_SERVER_ERROR:
						alertify.error(response.INTERNAL_SERVER_ERROR);
						break;
				}
			});
		},
		/**
		 * Description: Generalized Ajax Request For Object
		 * @Param url
		 * @Param id
		 * @return
		 */
		fetchObj : function(url,id) {
			return $.ajax({
				url: url + id,
				type: "GET",
				dataType: "json",
				contentType: "application/json",
				mimeType: "application/json"
			}).done(function(response) {
				switch(response.status) {
					case HttpStatus.SUCCESS:
						// alertify.success(Message.SUCCESS);	
						break;
					case HttpStatus.INTERNAL_SERVER_ERROR:
						alertify.error(Message.INTERNAL_SERVER_ERROR);
						break;
				}
			});
		},
		update : function(url,id,object) {
			return $.ajax({
				url: url + id,
				type: "POST",
				contentType: "application/json",
				data: JSON.stringify(object),
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
			}).done(function(response) {
				switch(response.status) {
					case HttpStatus.SUCCESS:
						alertify.success(Message.SUCCESS_UPDATE);
                        break;
                    case HttpStatus.NO_CONTENT:
                        alertify.warning(Message.NO_CONTENT);
                        break;
                    case HttpStatus.UNKNOWN_STATUS:
                        alertify.error(Message.UNKNOWN_STATUS);
                        break;
                    case HttpStatus.UNPROCESSABLE_ENTITY:
                        alertify.error(Message.UNPROCESSABLE_ENTITY);
                        break;
					case HttpStatus.INTERNAL_SERVER_ERROR:
						alertify.error(Message.INTERNAL_SERVER_ERROR);
						break;
				}
			});
		},
		customUpdate : function(url,data) {
			return $.ajax({
				url: url,
				type: "PUT",
				data: JSON.stringify(data),
				dataType: "json",
				contentType: "application/json",
				mimeType: "application/json",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
			}).done(function(response) {
				switch(response.status) {
					case HttpStatus.SUCCESS:
						alertify.success(Message.SUCCESS_UPDATE);
						break;
					case HttpStatus.NO_CONTENT:
						$.unblockUI();
						alertify.error(Message.NO_CONTENT);
						break;
				}
			});
		},
		remove :function(url,id) {
			return $.ajax({
				url: url + id,
				type: "DELETE",
				dataType: "json",
				contentType: "application/json",
				mimeType: "application/json",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
			}).done(function(response) {
				switch(response.status) {
					case HttpStatus.SUCCESS:
						alertify.success(Message.SUCCESS_DELETE);
						break;
					case HttpStatus.INTERNAL_SERVER_ERROR:
						alertify.error(Message.INTERNAL_SERVER_ERROR);
						break;
				}
			});
		},
		create : function(url,object) {
			return $.ajax({
				url: url,
				type: "POST",
				dataType: "json",
				data: JSON.stringify(object),
				contentType: "application/json",
                mimeType: "application/json",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
			}).done(function(response) {
				switch(response.status) {
					case HttpStatus.SUCCESS:
						alertify.success(Message.SUCCESS_INSERT);
                        break;
                    case HttpStatus.NO_CONTENT:
                        alertify.warning(Message.NO_CONTENT);
                        break;
                    case HttpStatus.UNKNOWN_STATUS:
                        alertify.error(Message.UNKNOWN_STATUS);
                        break;
                    case HttpStatus.UNPROCESSABLE_ENTITY:
                        alertify.error(Message.UNPROCESSABLE_ENTITY);
                        break;
					case HttpStatus.INTERNAL_SERVER_ERROR:
						alertify.error(Message.INTERNAL_SERVER_ERROR);
						break;
				}
			});
		},
		search : function(url,object) {
			return $.ajax({
				url: url,
				type: "POST",
				dataType: "json",
				data: JSON.stringify(object),
				contentType: "application/json",
                mimeType: "application/json",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
			}).done(function(response) {
				switch(response.status) {
					case HttpStatus.SUCCESS:
						alertify.success(Message.SUCCESS);
                        break;
                    case HttpStatus.NO_CONTENT:
                        alertify.warning(Message.NO_CONTENT);
                        break;
                    case HttpStatus.UNKNOWN_STATUS:
                        alertify.error(Message.UNKNOWN_STATUS);
                        break;
                    case HttpStatus.UNPROCESSABLE_ENTITY:
                        alertify.error(Message.UNPROCESSABLE_ENTITY);
                        break;
					case HttpStatus.INTERNAL_SERVER_ERROR:
						alertify.error(Message.INTERNAL_SERVER_ERROR);
						break;
				}
			});
		},
		upload  : function(url,object) {
			return $.ajax({
				url: url,
				type: "POST",
				dataType: "json",
				data: JSON.stringify(object),
				mimeType: "application/json",
				enctype: 'multipart/form-data',
				processData: false,
		        contentType: false,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
			}).done(function(response) {
				switch(response.status) {
					case HttpStatus.SUCCESS:
						alertify.success(Message.SUCCESS_INSERT);
                        break;
                    case HttpStatus.NO_CONTENT:
                        alertify.warning(Message.NO_CONTENT);
                        break;
                    case HttpStatus.UNKNOWN_STATUS:
                        alertify.error(Message.UNKNOWN_STATUS);
                        break;
                    case HttpStatus.UNPROCESSABLE_ENTITY:
                        alertify.error(Message.UNPROCESSABLE_ENTITY);
                        break;
					case HttpStatus.INTERNAL_SERVER_ERROR:
						alertify.error(Message.INTERNAL_SERVER_ERROR);
						break;
				}
			});
		}
	}
}

