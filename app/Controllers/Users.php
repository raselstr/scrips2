<?php

namespace App\Controllers;


use App\Models\UsersModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Users extends ResourcePresenter
{
    public function __construct()
    {
        helper(['url','form']);
    }
    // protected $helpers = ['form'];
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        
        return view('auth/register');
    }

    /**
     * Present a view to present a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Present a view to present a new single resource object
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
     *
     * @return mixed
     */
    public function create()
    {
        $usersmodel = new UsersModel();
        $data = $this->request->getPost();
        $valid = $this->validate($usersmodel->getValidationRules());
        // dd($valid);


        if(!$valid){
            return view('auth/register',['valid'=>$this->validator]);
        } else {
            $pass = $this->request->getPost('user_password');
            $data['user_password'] = password_hash($pass, PASSWORD_BCRYPT);
            $usersmodel->insert($data);
        }

        // if (! $this->validate($usersmodel->getValidationRules())) {
        //     // session()->setFlashdata('errors',$this->validator->listErrors());
        //     dd($usersmodel->errors());
        //     return redirect()->back();
        // }

        // $simpan = $usersmodel->insert($data);
        // if(!$simpan){
        //     session()->setFlashdata('validation',$usersmodel->errors());
        //     return redirect()->back()->withInput();
        // } else {
        //     $pass = $this->request->getPost('user_password');
        //     $data['user_password'] = password_hash($pass, PASSWORD_BCRYPT);
        //     return redirect()->to(site_url('login'))->with('success','Data Berhasil disimpan');
        // }

        
        
        // else{
        //     echo 'Berhasil';
        //     // $data = $this->request->getPost();
        //     // dd($data);
        // }
        // $simpan = $usersmodel->insert($data);
        // dd($usersmodel->errors());

        // $data = $this->request->getPost();
        
      
        // 
        // $simpan = $usersmodel->insert($data);
        // if(!$simpan){
        //     session()->setFlashdata('validation',$usersmodel->errors());
        //     return redirect()->back()->withInput();
        // //     
        // } else {
        //     $pass = $this->request->getPost('user_password');
        //     $data['user_password'] = password_hash($pass, PASSWORD_BCRYPT);
        // //     // dd($usersmodel->errors());
        // return redirect()->to(site_url('login'))->with('success','Data Berhasil disimpan');
        // //     
        // }


    }

    /**
     * Present a view to edit the properties of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Process the updating, full or partial, of a specific resource object.
     * This should be a POST.
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Present a view to confirm the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function remove($id = null)
    {
        //
    }

    /**
     * Process the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
