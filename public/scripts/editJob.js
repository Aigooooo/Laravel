$(document).ready(function(){
    function getJob(){
        var jobId = window.location.pathname.split('/').pop();
        $.ajax({
            url: '/api/getJob/'+jobId,
            method: 'GET',
            success: function(response){
                if(response.status == 200){
                    var job = response.job;
                    $('#job-title').val(job.job_title);
                    $('#job-description').val(job.job_description);
                    $('#positions-available').val(job.positions_available);
                }else{
                    console.log(response.message);
                }
            }

        });
    }
    $('#edit-job-form').submit(function(event){
        event.preventDefault();
        var jobId = window.location.pathname.split('/').pop();
        var formData = $(this).serialize();
        $.ajax({
            url: '/api/editJob/'+jobId,
            method: 'PUT',
            data: formData,
            success: function(response){
                if(response.status == 200){
                    alert('Job Updated!');
                    window.location.href = '/jobBoard';
                }else{
                    console.log(response.message);
                }   
            }
        });
    });
    getJob();
});