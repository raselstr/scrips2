<?php

namespace App\Controllers;


use App\Models\UsersModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Users extends ResourcePresenter
{
    function __construct()
    {
        $usersmodel = new UsersModel();
    }
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

        $rules = $usersmodel->validationRules;
        // dd($rules);
        if (! $this->validate($rules)){
            return redirect()->back()->withInput();
        }else{
            $data = $this->request->getPost();
            dd($data);
        }
        // $simpan = $usersmodel->insert($data);
        // dd($usersmodel->errors());

        // $data = $this->request->getPost();
        // $pass = $this->request->getPost('user_password');
      
        // $data['user_password'] = password_hash($pass, PASSWORD_BCRYPT);
        // $simpan = $usersmodel->insert($data);
        // if($simpan){
        //     return redirect()->to(site_url('login'))->with('success','Data Berhasil disimpan');
        // } else {
        //     // dd($usersmodel->errors());
        //     session()->setFlashdata('validation',$usersmodel->errors());
        //     return redirect()->back()->withInput();
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
