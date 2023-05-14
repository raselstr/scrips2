<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourcePresenter;
use App\Models\OpdModel;

class Opds extends ResourcePresenter
{
    function __construct()
    {
        $this->opd = new OpdModel();
    }
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $data['opd'] = $this->opd->findAll();
        return view('opd/index', $data);
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
        return view('opd/new');
    }
    
    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
     *
     * @return mixed
     */
    public function create()
    {
        $data = $this->request->getPost();
        $this->opd->insert($data);
        return redirect()->to(site_url('opds'))->with('success','Data Berhasil disimpan');

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
        $opd = $this->opd->where('opd_id', $id)->first();
        if(is_object($opd)){
            $data['opd'] = $opd;
            return view('opd/edit', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
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
        $data = $this->request->getPost();
        $this->opd->update($id, $data);
        return redirect()->to(site_url('opds'))->with('success','Data Berhasil diUpdate');
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
        $this->opd->delete($id);
        return redirect()->to(site_url('opds'))->with('success','Data Berhasil di Hapus');
    }

    public function trash()
    {
        $data['opd'] = $this->opd->onlyDeleted()->findAll();
        return view('opd/trash', $data);
    }

    public function restore($id = null)
    {
        $this->db = \Config\Database::connect();
        if($id != null) {
            $this->db->table('opd')
                ->set('deleted_at', null, true)
                ->where(['opd_id'=>$id])
                ->update();
        } else {
            $this->db->table('opd')
                ->set('deleted_at', null, true)
                ->where('deleted_at is NOT NULL', NULL, false)
                ->update();
        }
        if($this->db->affectedRows() > 0){
            return redirect()->to(site_url('opds/trash'))->with('success','Data Berhasil direstore');
        }
    }

    public function delete2($id = null)
    {
        if($id != null){
            $this->opd->delete($id, true);
            return redirect()->to(site_url('opds/trash'))->with('success','Data Berhasil di Hapus Permanen');
        } else {
            $this->opd->purgeDeleted();
            return redirect()->to(site_url('opds/trash'))->with('success','Data Berhasil di Hapus Permanen');
        }
    }
}
