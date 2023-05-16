<?= $this->extend('layout/default'); ?>

<?= $this->section('title'); ?>
  <title>Pegawai &mdash; BKAD</title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
  <section class="section">
    <div class="section-header">
      <h1>Data Pegawai Daerah</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= site_url('/'); ?>">Dashboard</a></div>
        <div class="breadcrumb-item">Data Pegawai Daerah</div>
      </div>
    </div>

    <?php if(session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
                <b>Success !!</b>
                <?= session()->getFlashdata('success'); ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if(session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
                <b>Success !!</b>
                <?= session()->getFlashdata('error'); ?>
            </div>
        </div>
    <?php endif; ?>


    <div class="section-body">
        <div class="card">
          <div class="card-header">
            <div class="buttons">
              <a href="<?= site_url('pegawais/new'); ?>" class="btn btn-icon icon-left btn-primary"><i class="far fa-file"></i> Tambah Data</a>
            </div>
            <h4>Daftar Pegawai Daerah</h4>
            <!-- <div class="card-header-action">
              <a href="<?= site_url('pegawais/trash'); ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Trash</a>
            </div> -->
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-striped table-md">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>NIP</th>
                    <th>Nama Pegawai</th>
                    <th>Alamat</th>
                    <th>Info</th>
                    <th>Opd</th>
                    <th>Created At</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php foreach ($peg as $key => $value) : ?>
                  <tr>
                    <td><?= $key + 1; ?></td>
                    <td><?= $value->pegawai_nip; ?></td>
                    <td><?= $value->pegawai_nama; ?></td>
                    <td><?= $value->pegawai_alamat; ?></td>
                    <td><?= $value->pegawai_info; ?></td>
                    <td><?= $value->opd_nama; ?></td>
                    <td><?= $value->created_at; ?></td>
                    <td>
                      <a href="<?= site_url('pegawais/'.$value->pegawai_id.'/edit'); ?>" class="btn btn-icon btn-sm btn-info"><i class="fas fa-pencil-alt"></i></a>
                      <form action="<?= site_url('pegawais/delete/' .$value->pegawai_id); ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin menghapus akan dihapus')">
                        <?= csrf_field(); ?>
                        <button class="btn btn-danger btn-sm" ><i class="fas fa-trash" ></i></a></button>
                      </form>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer text-right">
            <nav class="d-inline-block">
              <ul class="pagination mb-0">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                <li class="page-item">
                  <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
<?= $this->endSection(); ?>