<?php
require_once './app/helpers/Alert.php';
require_once './app/models/Classroom.php';
require_once './app/models/Student.php';

if ($_SESSION['user']['role'] !== 'admin') {
    header('Location: ./403.php');
    exit;
}

$id = $_REQUEST['id'] ?? null;

$classroomObj = new Classroom();
$student = new Student();
$students = $classroomObj->getStudentByClassroom($id);
$classroom = $classroomObj->getClassroomById($id);
$studentLists = $student->findAll();

$merged = array_merge($students, $studentLists);
$availStudents = array_filter($merged, function ($student) use ($classroom) {
    return $student['tahun_ajaran'] !== $classroom['tahun_ajaran'];
});

if (!$classroom){
    header('Location: ./404.php');
    exit;
}
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">List Siswa Kelas <?= $classroom['classroom_name'] ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="./dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="./dashboard.php?page=classroom-lists">List Kelas</a></li>
                    <li class="breadcrumb-item active">List Siswa Kelas <?= $classroom['classroom_name'] ?> - <?= $classroom['tahun_ajaran'] ?> </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a href="./dashboard.php?page=classroom-lists" class="btn btn-primary mb-3">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
                <?php if ($classroom['status'] === 'ACTIVE') : ?>
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-lg">
                        <i class="fas fa-plus mr-2"></i>
                       Tambah Siswa
                    </button>
                <?php endif; ?>
                <?php Alert::notify(); ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Siswa Kelas <?= $classroom['classroom_name'] ?> - <?= $classroom['tahun_ajaran'] ?></h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>NIS</th>
                                <th>Jenis Kelamin</th>
                                <th>Agama</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>No HP</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($students as $key => $value) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $value['fullname'] ?></td>
                                    <td><?= $value['nis'] ?></td>
                                    <td><?= $value['gender'] ?></td>
                                    <td><?= $value['religion'] ?></td>
                                    <td><?= $value['birthplace'] ?></td>
                                    <td><?= $value['birthdate'] ?></td>
                                    <td><?= $value['address'] ?></td>
                                    <td><?= $value['phone_number'] ?></td>
                                    <td>
                                        <a href="" class="btn btn-xs btn-warning">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-lg" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Siswa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="./app/controllers/StudentsClassroomController.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="classroom_id" value="<?= $classroom['id'] ?>">
                        <label>Select Students</label>
                        <select class="select2" multiple="multiple" id="students" name="students[]" data-placeholder="Select a students" style="width: 100%;">
                            <?php foreach ($availStudents as $key => $value) : ?>
                                <option value="<?= $value['id'] ?>"><?= $value['fullname'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>