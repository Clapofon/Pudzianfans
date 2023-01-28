// Variable to hold request
var request;

// Bind to the submit event of our form
$("#add-comments-form").submit(function(event){

    // Prevent default posting of form - put here to work in case of errors
    event.preventDefault();

    // Abort any pending request
    if (request) {
        request.abort();
    }
    // setup some local variables
    var $form = $(this);

    // Let's select and cache all the fields
    var $inputs = $form.find("input, button");

    // Serialize the data in the form
    var serializedData = $form.serialize();

    // Let's disable the inputs for the duration of the Ajax request.
    // Note: we disable elements AFTER the form data has been serialized.
    // Disabled form elements will not be serialized.
    $inputs.prop("disabled", true);

    // Fire off the request to /strona/include/comment.inc.php
    request = $.ajax({
        url: "/strona/include/comment.inc.php",
        type: "post",
        data: serializedData
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
        //console.log("Hooray, it worked! Response: " + response);
        
        const commentsContainer = document.querySelector(".comments-container");
        const comment = document.createElement("article");
        const commentHeader = document.createElement("header");
        const commentMain = document.createElement("main");
        const commentParagraph1 = document.createElement("p");
        const commentParagraph2 = document.createElement("p");
        const commentParagraph3 = document.createElement("p");
        
        comment.classList.add("flex");
        comment.classList.add("container-fluid");
        comment.classList.add("comment");
        commentHeader.classList.add("flex");
        commentHeader.classList.add("container-fluid");
        commentMain.classList.add("flex");
        commentMain.classList.add("container-fluid");
        commentParagraph1.classList.add("container-fluid");
        commentParagraph2.classList.add("container-fluid");
        commentParagraph3.classList.add("container-fluid");
        
        const data = serializedData.split("&")
        data[1] = data[1].replace("comment-creator=", "");
        data[0] = data[0].replace("comment-content=", "");
        
        var today = new Date();

        // Current Date
          var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();

        
        // Current Time
          var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        
        
        // Current Date and Time
          var dateTime = date+' '+time;
        
        commentParagraph1.innerHTML = data[1];
        commentParagraph2.innerHTML = dateTime;
        commentParagraph3.innerHTML = data[0];
        
        commentsContainer.prepend(comment);
        comment.appendChild(commentHeader);
        comment.appendChild(commentMain);
        commentHeader.appendChild(commentParagraph1);
        commentHeader.appendChild(commentParagraph2);
        commentMain.appendChild(commentParagraph3);
    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });
    
    // Callback handler that will be called regardless
    // if the request failed or succeeded
    request.always(function () {
        // Reenable the inputs
        $inputs.prop("disabled", false);
    });

}); 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           