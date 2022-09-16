<?php

namespace App\Controllers;
use App\Models\ClinicStaffModel;
use App\Models\AppointmentModel;

class Home extends BaseController
{
  public function rmedicine()
  {
    $session = session();
    $user = session()->get('aid');
    // echo $user;
    if($user){
      return view('home/rmedicine');
    }else{
      $session->setTempdata('url', '/login');
      return redirect()->to('/login');
    }
  }
  public function book()
  {
    $name = $this->request->getVar('name');
    $phone = $this->request->getVar('phone');
    $department = $this->request->getVar('department');
    $date = $this->request->getVar('date');
    $time = $this->request->getVar('time');
    $type = $this->request->getVar('type');
    $notes = $this->request->getVar('notes');
    $ap = new AppointmentModel();
    $id = session()->get('aid');
    $dw = $ap->where('date', $date)->where('ClientID', $id)->first();
    if($dw){
      echo 2;
    }else{
      $data = [
        'ClientID' => $id,
        'name' =>$name,
        'phone' =>$phone,
        'department' =>$department,
        'date' =>$date,
        'time' =>$time,
        'apstatus'=>'pending',
        'type' =>$type,
        'notes' =>$notes
      ];
      $ap->save($data);
      echo 1;
    }
  }
  public function appointments($date=null)
  {
    $session = session();
    $user = session()->get('aid');
    $data = [
      'date' => $date
    ];
    // echo $user;
    $url = base_url('/appointment/' . $date);
    if($user){
      return view('home/appointment', $data);
    }else{
      $session->setTempdata('url', $url);
      return redirect()->to('/login');
    }
  }
  public function appointment()
  {
    $session = session();
    $user = session()->get('aid');
    // echo $user;
    if($user){
      return view('home/appointment');
    }else{
      $session->setTempdata('url', '/login');
      return redirect()->to('/login');
    }
  }
  public function schedule()
  {
    $sm = new ClinicStaffModel();
    $data = [
      'sched' => $sm->findAll()
    ];
    return view('home/schedule',$data);
  }
  public function check()
  {
    $date = $this->request->getVar('date');
    // $time = $this->request->getVar('time');
    $sm = new AppointmentModel();
    if(isset($_POST['check'])){
      $data = [
        'schedule' => $sm->where('date', $date)->findAll(),
        'date'     => $date
      ];
      return view('res', $data);
    }else{
      return view('res');
    }

  }
  public function index()
  {
    return view('home/index');
  }
}
