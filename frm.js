
            $(function(){
                $("#sign_up_form").submit(function(e)
                {
 
                    var formObj = $(this);
                    var formURL = formObj.attr("action");
                    var formData = new FormData(this);
                    $.ajax({
                        url: formURL,
                        type: 'POST',
                        data:  formData,
                        mimeType:"multipart/form-data",
                        contentType: false,
                        cache: false,
                        processData:false,
                        success: function(data, textStatus, jqXHR)
                        {
                            $("#confirm").html(data);
                        },
                        error: function(jqXHR, textStatus, errorThrown)
                        {
                        }
                        
                    });
                    e.preventDefault(); //Prevent Default action.
                });
 

            });
  