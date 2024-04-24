
$(document).ready(function(){
    function displayJobs(){
        $.ajax({
            url: 'api/getAllJobs',
            method: 'GET',
            success: function(response){
                if(response.status == 200){
                    var jobs = response.jobs;
                    var jobListing = $('#data-table tbody');
                    jobListing.empty();
                    $.each(jobs, function(index, job){
                        jobListing.append(
                            '<tr>' +
                            '<td>' + job.job_title + '</td>' +
                            '<td>' + job.job_description + '</td>' +
                            '<td>' + job.positions_available + '</td>' + 
                            '<td><button class="edit-job" data-id="' + job.id + '"> Edit Job</button></td>' +
                            '<td><button class="delete-job" data-id="' + job.id + '"> Delete Job</button></td>' +
                            '</tr>'
                        );
                    });
                    
                    $('.delete-job').click(function(){
                        var jobId = $(this).data('id');
                        console.log(jobId);
                        deleteJob(jobId);
                    });

                    $('.edit-job').click(function(){
                        var jobId = $(this).data('id');
                        window.location.href = '/editJob/' + jobId;
                    });
                }else{
                    console.log("Error: " + response.message);
                }
            }
        });
    }

    function deleteJob(jobId){
        $.ajax({
            url: 'api/deleteJob/'+jobId,
            method: 'DELETE',
            success: function(response){
                if(response.status == 200){
                    alert('Successfully Deleted the Job!');
                    displayJobs();
                }else{
                    console.log('Error: ' + response.message);
                }
            }
        });
    }
    displayJobs();
});