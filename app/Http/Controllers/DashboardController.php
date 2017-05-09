<?php
namespace App\Http\Controllers;
use App\Activity;
use App\Task;
use App\Thread;
use Illuminate\Http\Request;
class DashboardController extends Controller
{
    //
    /**
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = [];
        $data['labels1'] =  "['January', 'February', 'March', 'April', 'May', 'June']";
        $data['values1'] =  "[15,45,4,25,45]";
        $data['labels2'] =  "['January', 'February', 'March', 'April', 'May', 'June']";
        $data['values2'] =  "[15,45,4,25,45]";
        return view('dashboard',$data);
    }
    public function graph1()
    {
        $data = [];
        $data['labels3']= ['Pepe', 'Maria', 'Jaume', 'Abril', 'Peter'];
        $data['values3']= [45,56,43,23,12];
        return $data;
    }
    public function tasks()
    {
        return Task::all();
    }
    public function tasksNumber()
    {
        return Task::all()->count();
    }
    public function threadsNumber()
    {
        return Thread::all()->count();
    }
    public function createRandomTask()
    {
        factory(\App\Task::class)->states('user')->create();
    }
    public function createRandomThread()
    {
        factory(\App\Thread::class)->create();
    }
    public function fetchActivityFeed()
    {
        return Activity::orderbyDesc('update_task').get();
    }
}
