<?php

namespace App\Controllers;
use App\Models\UserModel;


class MainController extends BaseController
{
  public function logout(){
       $session = session();
       $session->destroy();
       return redirect()->to(base_url().'/login');
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
          return redirect()->to('/login');
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
      return view('login');
    }
}
