<?php
namespace App\Services;

use App\Models\JobModel;
use App\Services\BaseService;

class JobService extends BaseService
{
    public function __construct(JobModel $job)
    {
        $this->job = $job;
    }

            /**
     * @param $params
     *
     * @return mixed
     */
    public function all($params = [])
    {

        $perPage = 10;//config('business.models.order.limit');
        $jobType = (!empty($params['status']))?$params['status']:'new';
        $records = $this->job->where('status','=',$jobType);
        
        return $records->paginate($perPage);
    }

    /**
     * @param $params
     *
     * @return mixed
     */
    public function update($params = [])
    {

        $data = [
            'status' => $params['status']
        ];
        $records = $this->job->where('id',$params['id'])->update($data);
        
        return $records;
    }

}
