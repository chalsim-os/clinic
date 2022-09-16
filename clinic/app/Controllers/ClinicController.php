<?php

namespace App\Controllers;
use App\Models\MedicineModel;
use App\Models\StocksModel;
use App\Models\ClinicStaffModel;
use App\Models\AppointmentModel;
use App\Models\UserModel;
use App\Models\SMed;
class ClinicController extends BaseController
{
  public function secret()
  {
    return 'Cr!%f';
  }
  public function approve($id=null)
  {
    $ap = new AppointmentModel();
    $data = [
      'apstatus' => 'approved',
    ];
    $session = session();
    $ap->set($data)->where('scid', $id)->update();
    $session->setFlashdata('msg', 'Request was approved');
    return redirect()->to($_SERVER['HTTP_REFERER']);
  }
  public function viewrecords($id = null)
  {
    $ap = new AppointmentModel();
    $med = new SMed();
    $decrypted_id_raw = base64_decode($id);
    $decrypted_id = preg_replace(sprintf('/%s/', $this->secret()), '', $decrypted_id_raw);
    $where = "ClientID={$decrypted_id} and apstatus='done'";
    $data = [
      'smdata' => $ap->where($where)->findAll(),
      'id'     => $decrypted_id
    ];
    return view('clinic/viewrecords', $data);
  }
  public function client()
  {

    $where = "type='student' or type='faculty' or type='staff'";
    $client = new UserModel();
    $data = [
      'area' => 'Client List',
      'smdata' => $client->where($where)->findAll(),
      'secret' => $this->secret()
    ];
    // var_dump($data);
    return view('clinic/clients', $data);
  }
  public function newrequest()
  {

  }
  public function incoming()
  {
    $ap = new AppointmentModel();
    $today = date('Y-m-d');
    $data = [
      'smdata' => $ap->where('apstatus', 'approved')->where('date >', $today)->orderBy('date', 'asc')->findAll(),
      'type' => 'incoming',
    ];
    return view('clinic/request', $data);
  }
  public function today()
  {
    $ap = new AppointmentModel();
    $today = date('Y-m-d');
    $data = [
      'smdata' => $ap->where('apstatus', 'approved')->where('date', $today)->orderBy('time', 'asc')->findAll(),
      'type' => 'today',
    ];
    return view('clinic/request', $data);
  }
  public function nschedule()
  {
    $ap = new AppointmentModel();
    $data = [
      'type' => 'pending',
      'smdata' => $ap->where('apstatus', 'pending')->orderBy('time', 'asc')->findAll()
    ];
    return view('clinic/request', $data);
  }
  public function registerstaff()
  {
    $image = $this->request->getFile('picture');
    $imageName = $image->getName();
    $image->move('images', $imageName);
    $sc = new ClinicStaffModel();
    $data = [
      'name' => $this->request->getVar('name'),
      'type' => $this->request->getVar('type'),
      'picture' => 'images/' . $imageName,
      'status' => 'ACTIVE'
    ];
    $sc->insert($data);

  }
  public function changesched()
  {
    $sched = $this->request->getVar('schedule');
    $csid = $this->request->getVar('csid');
    $sc = new ClinicStaffModel();
    $val  = '';
    $session = session();
    foreach($sched as $sched){
      $val .= $sched .'; ';

    }
    echo $val;

    $data = [
      'schedule' => $val,
    ];
    $sc->set($data)->where('csid', $csid)->update();
    $session->setFlashdata('msg', 'Schedule updated');
    return redirect()->to($_SERVER['HTTP_REFERER']);



  }
  public function staff()
  {
    $staff = new ClinicStaffModel();
    $data = [
      'smdata' => $staff->findAll()
    ];

    return view('clinic/staff', $data);
  }
  public function updatemed()
  {
    $name = $this->request->getVar('name');
    $description = $this->request->getVar('description');
    $type = $this->request->getVar('type');
    $category = $this->request->getVar('category');
    $id = $this->request->getVar('id');
    $med = new MedicineModel();
    $session = session();
    $data = [
      'name' => $name,
      'description' => $description,
      'type' => $type,
      'category' => $category,
    ];
    $med->set($data)->where('id', $id)->update();
    $session->setFlashdata('msg', 'Medicine updated');
    return redirect()->to($_SERVER['HTTP_REFERER']);
  }
  public function history($id = null)
  {
    $med = new MedicineModel();
    $data = [
      'smdata' => $med->join('stocklogs', 'medicine.id=stocklogs.medID')->where('medicine.id', $id)->findAll()
    ];

    return view('clinic/medhistory', $data);
  }
  public function addstock()
  {
    $name = $this->request->getVar('name');
    $id = $this->request->getVar('id');
    $oldq = $this->request->getVar('oldq');
    $type = $this->request->getVar('type');
    $quantity = $this->request->getVar('quantity');
    $validity = $this->request->getVar('validity');
    $newq = $oldq + $quantity;
    $now = date("Y-m-d");
    $session = session();
    $sm = new StocksModel();
    $med = new MedicineModel();
    if($validity <= $now){
      $session->setFlashdata('msg', 'Please check the expiry date');
      return redirect()->to($_SERVER['HTTP_REFERER']);
    }else{
      $data = [
        'name' => $name,
        'medID' => $id,
        'oldq' => $oldq,
        'type' => $type,
        'quantity' => $quantity,
        'validity' => $validity,
      ];
      $up = [
        'stocks' => $newq
      ];
      $sm->save($data);
      // echo $newq;
      $med->set($up)->where('id', $id)->update();
      $session->setFlashdata('msg', 'Medicine quantity updated');
      return redirect()->to($_SERVER['HTTP_REFERER']);
    }
  }
  public function index()
  {
    $data = [
      'area' => 'dashboard'
    ];
    return view('clinic/index', $data);
  }
  public function medicinelist()
  {
    $med = new MedicineModel();

    $data = [
      'medicine' => $med->findAll()
    ];
    return view('clinic/medicine', $data);
  }
}
