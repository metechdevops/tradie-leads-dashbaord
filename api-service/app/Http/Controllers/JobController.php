<?php namespace App\Http\Controllers;
use App\Services\JobService;
use Illuminate\Http\Request;

class JobController extends Controller
{

    /**
     * @var JobService
     */
    protected $job_service;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(JobService $job_service)
    {
        $this->job_service = $job_service;
    }

    /**
     * Index  
     *
     * Description
     *
     * @param  $request
     * @return json  data 
     */ 
    public function index(Request $request)
    {
        
        // dd($request->ip()); 
        $jobs = $this->job_service->all($request->all());
        return response()->json($jobs);
    }
    
    /**
     * Update  
     *
     * Description
     *
     * @param  $request
     * @return json An json data
     */ 
    public function update(Request $request)
    {
        $this->job_service->update($request->all());
        $data = [
            'success' => true,
            'message' => 'Lead updated successfully.',
            'status_code' => 200];
        return response()->json($data);
    }


}
