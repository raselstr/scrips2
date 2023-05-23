<?php

namespace App\Controllers;

use App\Models\OpdModel;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use CodeIgniter\RESTful\ResourcePresenter;
use PhpOffice\PhpSpreadsheet\Style\Border;


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

    public function export()
    {
        $opdmodel = new \App\Models\OpdModel();
        $opd = $opdmodel->findAll();

        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'No');
        $activeWorksheet->setCellValue('B1', 'Kode OPD');
        $activeWorksheet->setCellValue('C1', 'Nama OPD');

        $kolom_mulai = 2;

        foreach ($opd as $key => $value){
            $activeWorksheet->setCellValue('A'.$kolom_mulai, ($kolom_mulai-1));
            $activeWorksheet->setCellValue('B'.$kolom_mulai, $value->opd_kode);
            $activeWorksheet->setCellValue('C'.$kolom_mulai, $value->opd_nama);
            $kolom_mulai++;
        }

        //Tulisan Judul BOLD
        $activeWorksheet->getStyle('A1:C1')->getFont()->setBold(true);

        //Warna Judul Kolom
        $activeWorksheet->getStyle('A1:C1')->getFill()->setFillType(Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFFFFF00');
        
        //Border
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];

        $activeWorksheet->getStyle('A1:C'.($kolom_mulai-1))->applyFromArray($styleArray);

        //Autosize kolom
        $activeWorksheet->getColumnDimension('A')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('B')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('C')->setAutoSize(true);


        //membuat file XLSx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data OPD';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
        header('Cache-Control: max-age=0');

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');  
    }

    public function import()
    {
        $opdmodel = new \App\Models\OpdModel();

        $file = $this->request->getFile('file_excel');
        $extension = $file->getClientExtension();
        if ($extension == 'xlsx' || $extension == 'xls'){
            if($extension == 'xls'){
                $reader = new Xls();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
            $spreadsheet = $reader->load($file);
            $opd = $spreadsheet->getActiveSheet()->toArray();
            // print_r($opd);
            foreach ($opd as $key=>$value){
                if($key == 0){
                    continue;
                }
                $data = [
                    'nama_opd' => $value[1],
                    'kode_opd' => $value[2],
                ];
                $opdmodel->insert($data);
            }
            return redirect()->back()->with('success','File Berhasil di Import');

        } else {
            return redirect()->back()->with('error','Format File Bukan Excel');
        }
    }
}
