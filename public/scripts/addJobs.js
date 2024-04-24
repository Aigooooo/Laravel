$('#add-job-form').submit(function(event){
    event.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
        url: 'api/addJob',
        method: 'POST',
        data: formData,
        success: function(response){
            if(response.status == 200){
                window.location.href = '/jobBoard';
            }else{
                console.log("Error: " + response.message);
            }            
        },
        error: function(xhr, status, error){
                console.error('Error: ', error);
            }
    });
});