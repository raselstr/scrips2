<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\OpdModel;
use App\Models\PegawaiModel;

class Pegawais extends ResourceController
{
    function __construct()
    {
        $this->peg = new PegawaiModel();
        $this->opd = new OpdModel();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data['peg'] = $this->peg->getAll();
        return view('pegawai/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data['opd'] = $this->opd->findAll();
        return view('pegawai/new', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $data = $this->request->getPost();
        $this->peg->insert($data);
        return redirect()->to(site_url('pegawais'))->with('success','Data Berhasil disimpan');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $peg = $this->peg->find($id);
        if(is_object($peg)){
            $data['peg'] = $peg;
            $data['opd'] = $this->opd->findAll();
            return view('pegawai/edit', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $data = $this->request->getPost();
        $this->peg->update($id, $data);
        return redirect()->to(site_url('pegawais'))->with('success','Data Berhasil diUpdate');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
