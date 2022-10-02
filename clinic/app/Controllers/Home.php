<?php

namespace App\Controllers;
use App\Models\ClinicStaffModel;
use App\Models\AppointmentModel;
use App\Models\ServicesModel;
use App\Models\MedicineModel;
class Home extends BaseController
{
  public function Nurses()
  {
    $st = new ClinicStaffModel();
    $data = [
      'type' => 'Nurses',
      'staff' => $st->where('type','nurse')->findAll()
    ];
    return view('/home/staff', $data);
  }
  public function doctors()
  {
    $st = new ClinicStaffModel();
    $data = [
      'type' => 'Doctors',
      'staff' => $st->where('type!=','nurse')->findAll()
    ];
    return view('/home/staff', $data);
  }
  public function rmedicine()
  {
    $session = session();
    $user = session()->get('aid');
    // echo $user;
    $med = new MedicineModel();

    if($user){
      $data = [
        'med' => $med->where('stocks > 0')->findAll()
      ];
      // var_dump($data);
      return view('home/rmedicine', $data);
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
  public function secret()
  {
    return 'Cr!%f';
  }
  public function views($id = null)
  {
    $decrypted_id_raw = base64_decode($id);
    $decrypted_id = preg_replace(sprintf('/%s/', $this->secret()), '', $decrypted_id_raw);
    $sr = new ServicesModel();
    $s = $sr->where('sid', $decrypted_id)->first();
    $data = [
      'type'  =>  $s['description'],
      'views' =>  $sr->where('sid', $decrypted_id)->first(),
    ];
    return view('home/views', $data);

  }
  public function services()
  {
    $sv = new ServicesModel();
    $data = [
      'type'     => 'Services',
      'services' => $sv->paginate(5),
      'total'    => $sv->countAllResults(),
      'pager'    => $sv->pager,
      'secret'   => $this->secret()
    ];
    return view('home/services', $data);
  }
  public function index()
  {
    $cstf = new ClinicStaffModel();
    $ap = new AppointmentModel();
    $data = [
      'total'    => $cstf->countAllResults(),
      'nurse'    => $cstf->where('type', 'nurse')->countAllResults(),
      'doctor'   => $cstf->where('type', 'College Physician')->countAllResults(),
      'ap'       => $ap->where('apstatus', 'approved')->countAllResults()
    ];
    // var_dump($data);
    return view('home/index', $data);
  }
}
