<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\MedicineRequestModel;
use App\Models\AppointmentModel;


class MainController extends BaseController
{
  public function getClientID()
  {
    $session = session();
    $cid  = session()->get('aid');
    return $cid;
  }

  public function hrequest()
  {
    if($this->getClientID()){
      $req = new MedicineRequestModel();
      $data = [
        'request' => $req->join('medicine', 'medrequest.medicine=medicine.id')->where('clientID', $this->getClientID())->findAll()
      ];
      return view('home/request_history', $data);
    }else{
      return redirect()->to('login');
    }
  }
  public function bookhistory()
  {
    if($this->getClientID()){
      $ap = new AppointmentModel();
      $data = [
        'request' => $ap->where('clientID', $this->getClientID())->findAll()
      ];
      return view('home/request_history', $data);
    }else{
      return redirect()->to('login');
    }
  }
  public function requestmed()
  {
    $medr  = new MedicineRequestModel();
    $data = [
      'clientID'    =>  $this->getClientID(),
      'name'        => $this->request->getVar('name'),
      'phone'       => $this->request->getVar('phone'),
      'complaints'  => $this->request->getVar('complaints'),
      'medicine'    => $this->request->getVar('medicine'),
      'status'      => 'pending'
    ];
    $medr->save($data);
    echo 1;
  }
  public function verification($length){
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    return substr(str_shuffle($str_result),
    0, $length);
  }
  public function sendMail($email, $message, $subject)
  {
    $mail = \Config\Services::mail();
    $mail->setTo($email);
    $mail->setFrom('krizchan31@gmail.com', 'Confirm Registration');

    $mail->setSubject($subject);
    $mail->setMessage($message);
    if ($mail->send())
    {
      $session->setFlashdata('msg', 'a link was sent to your email');
    }else{
      $data = $mail->printDebugger(['headers']);
      $session->setFlashdata('msg', $data);
    }
  }
  public function changepassword()
  {
    $old_token = $this->request->getVar('old_token');
    $password = $this->request->getVar('password');
    $password1 = $this->request->getVar('password1');
    $user = new UserModel();
    $session = session();
    helper(['form']);
    $check = $user->where('token', $old_token)->first();
    if($check){
      $rules = [
        'password'      => 'required|min_length[4]|max_length[50]',
        'password1'  => 'matches[password]'
      ];
      if($this->validate($rules))
      {
        $data = [
          'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
          'token'    => $this->verification(50),
        ];
        $user->set($data)
        ->where('token', $old_token)
        ->update();
        $session->setFlashdata('msg', 'Password Change.');
        return redirect()->to('/login');
      }else{
        $data = [
          'validation' => $this->validator,
          'token'      => $old_token
        ];
        return view('reset', $data);
        // echo 'asdfgbg';
      }
    }else{
      $session->setFlashdata('msg', 'Invalid link');
      return redirect()->to($_SERVER['HTTP_REFERER']);
    }

  }
  public function passreset($token)
  {

    $user = new UserModel();
    $f = $user->where(['token' => $token])->first();
    $data = [
      'token' => $token,
      'name' => $f['name']
    ];
    $session = session();

    if($f){
      return view('reset', $data);
    }else{
      $session->setFlashdata('msg', 'Expired link');
      return redirect()->to(base_url().'/login');

    }

  }
  public function reset()
  {
    $user = new UserModel();
    $email = $this->request->getVar('email');
    $data = $user->where('email', $email)->first();
    $subject = 'Account reset request';
    $name=$data['name'];
    $link = base_url('reset/') . $data['token'];
    $message = "hello " . $name . "<br>we have receive a new request to reset your password.<br> please click this <a href='".$link. "'>link</a>";
    if($data){
      echo 1;
      $this->sendMail($email, $subject, $message);

    }else{
      echo 0;
    }
  }
  public function logout(){
    $session = session();
    $session->destroy();
    return redirect()->to(base_url().'/login');
  }
  public function verify($token = null)
  {
    $session  = session();
    $user = new UserModel();
    $u = $user->where('token', $token)->first();
    if($u){
      $session->setFlashdata('msg', 'Account successfully verified. Login to continue.');
      $data = [
        'status' => 'active',
        'token'  => $this->verification(50)
      ];
      $user->set($data)->where('token', $token)->update();
    }else{
      $session->setFlashdata('msg', 'Invalid verification link or link expired');
    }
    return redirect()->to(base_url().'/login');
  }
  public function register()
  {
    $session = session();
    helper(['form']);
    $rules = [
      'name'          => 'required|min_length[2]|max_length[50]',
      'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
      'password'      => 'required|min_length[4]|max_length[50]',
      'confirmpassword'  => 'matches[password]'
    ];
    if($this->validate($rules)){
      $userModel = new UserModel();
      $token =$this->verification(50);
      $data = [
        'name'     => $this->request->getVar('name'),
        'email'    => $this->request->getVar('email'),
        'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        'token'    => $token,
        'type'     => 'student',
        'status'   => 'inactive',
      ];
      $userModel->save($data);
      $session->setFlashdata('msg', 'Please check your email address to confirm your Registration');
      $to = $this->request->getVar('email');
      $name = $this->request->getVar('name');
      $subject = 'Please confirm your registration';
      $to = $this->request->getVar('email');
      $name = $this->request->getVar('name');
      $subject = 'Please confirm your registration';
      $message ='Hi ' .$name .'<br><h1>welcome to website!</h1>

      please confirm your registration by clicking this <a href="' . base_url('/verify') . '/' . $token .' ">link</a>';
      $this->sendMail($to, $subject, $message);
      return redirect()->to('/login');
    }else{
      $data['validation'] = $this->validator;
      echo view('login', $data);
    }
  }
  public function validates()
  {
    $isLoggedIn = session()->get('isLoggedIn');
    $user =session()->get('name');
    $type = session()->get('type');
    $loopback = session()->get('url');
    if($isLoggedIn):
      if($loopback){
        return redirect()->to($loopback);
        unset($_SESSION['url']);
      }else{
        if($type == 'student'){
          return redirect()->to('/');
        }elseif($type =='nurse' || $type =='doctor') {
          return redirect()->to('/clinicmg');
        }
      }
    else:
      // return redirect()->to('/login');
      return view('login');
    endif;
  }
  public function auth()
  {
    $email = $this->request->getVar('username');
    $password = $this->request->getVar('password');
    // $url = $this->request->getVar('url');
    $session = session();
    // $session()->setTempdata('url', $url);
    $userModel = new UserModel();
    $data = $userModel->where('email', $email)->first();
    if($data){
      $pass = $data['password'];
      $authenticatePassword = password_verify($password, $pass);
      if($authenticatePassword){
        $user = $data['aid'];
        $session_data = [
          'aid' => $user,
          'name' => $data['name'],
          'email'=>$email,
          'type'=> $data['type'],
          'isLoggedIn' => TRUE
        ];
        $session->set($session_data);
        echo 1;
      }else{
        echo 0;
      }
    }else{
      echo 0;
    }
  }
  public function login()
  {
    // return view('login');
    return $this->validates();
  }
}
