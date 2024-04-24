<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    public function jobFields(){
        $arr = [
            'job_title' => 'required|string|max:191',
            'job_description' => 'required|string|max:500',
            'positions_available' => 'required|integer|max:100'
        ];
        return $arr;
    }

    public function validateInput(Request $request){
        $validator = Validator::make($request->all(),$this->jobFields());
        return $validator;
    }

    public function getAllJobs(){
        $jobs = Job::all();

        if($jobs->count() > 0){
            return response()->json([
                'status' => 200,
                'message' => 'Succesfully Pulled Jobs!',
                'jobs' => $jobs
            ], 200);
        }
        else{
            return response()->json([
                'status' => 404,
                'message' => 'No Jobs Found!'
            ], 404);
        }  
    }

    public function addJob(Request $request){
        if($this->validateInput($request)->fails()){
            return response()->json([
                'status' => 422,
                'message' => $this->validateInput($request)->messages()
            ], 422);
        }else{
            $job = Job::create([
                'job_title' => $request->job_title,
                'job_description' => $request->job_description,
                'positions_available' => $request->positions_available
            ]);
            if($job){
                return response()->json([
                    'status' => 200,
                    'message' => 'Successfully Inserted!',
                    'job' => $job 
                ], 200);
            }else{
                return response()->json([
                    'status' => 500,
                    'message' => 'Something Went Wrong',
                ], 500);
            }
        }
    }

    public function getJob($id){
        $job = Job::find($id);
        if($job){
            return response()->json([
                'status' => 200,
                'message' => 'Successfully Get Job!',
                'job' => $job 
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Job Does Not Exist',
                'job' => $job 
            ], 404);
        }
    }

    public function editJob($id, Request $request){
        $job = Job::find($id);
        if($this->validateInput($request)->fails()){
            return response()->json([
                'status' => 422,
                'message' => $this->validateInput($request)->messages()
            ], 422);
        }else{
            if($job){
                $job->update([
                    'job_title' => $request->job_title,
                    'job_description' => $request->job_description,
                    'positions_available' => $request->positions_available
                ]);
                return response()->json([
                    'status' => 200,
                    'message' => 'Successfully Edited Job!',
                    'job' => $job 
                ], 200);
            }else{
                return response()->json([
                    'status' => 404,
                    'message' => 'Job Does Not Exist',
                    'job' => $job 
                ], 404);
            }
        }
    }

    public function deleteJob($id){
        $job = Job::find($id);
        if($job){
            $job->delete($id);
            return response()->json([
                'status' => 200,
                'message' => 'Successfully Job Deleted!',
                'job' => $job 
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Job Does Not Exist',
                'job' => $job 
            ], 404);
        }
    }
}
