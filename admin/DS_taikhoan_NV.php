<!DOCTYPE html>
<html lang="en">
    <?php 
        include_once('./layout/head.php');
        if (isset($_SESSION['id']) && isset($_SESSION['TaiKhoan']) && isset($_SESSION['MatKhau']) && isset($_SESSION['PhanQuyen']) && $_SESSION['PhanQuyen'] != 1) {
            header('location:logout.php');
        }
    ?>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <?php
                include_once('./layout/nav_QT.php')
            ?>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <?php
                        include_once('./layout/topbar.php')
                    ?>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Danh Sách</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Mã Nhân Viên</th>
                                                <th>Tên Nhân Viên</th>
                                                <th>Số Điện Thoại</th>
                                                <th>Địa Chỉ</th>
                                                <th>Chức Vụ</th>
                                                <th>Chức Năng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $p->load_tk_nv("SELECT taikhoan.id, nhanvienvandon.MaNV, nhanvienvandon.HoTen, nhanvienvandon.SDT, nhanvienvandon.DiaChi, phanquyen.TenQuyen 
                                                FROM taikhoan
                                                INNER JOIN nhanvienvandon ON taikhoan.TaiKhoan = nhanvienvandon.TaiKhoan
                                                INNER JOIN phanquyen ON phanquyen.MaQuyen = taikhoan.PhanQuyen
                                                WHERE taikhoan.Taikhoan = nhanvienvandon.Taikhoan
                                                AND taikhoan.Lock   = 1
                                                order by id desc");
                                                $p->load_tk_nv("SELECT taikhoan.id, nhanvientuvan.MaNV, nhanvientuvan.HoTen, nhanvientuvan.SDT, nhanvientuvan.DiaChi, phanquyen.TenQuyen 
                                                FROM taikhoan
                                                INNER JOIN nhanvientuvan ON taikhoan.TaiKhoan = nhanvientuvan.TaiKhoan
                                                INNER JOIN phanquyen ON phanquyen.MaQuyen = taikhoan.PhanQuyen
                                                WHERE taikhoan.Taikhoan = nhanvientuvan.Taikhoan 
                                                AND taikhoan.Lock   = 1
                                                order by id desc");
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <?php 
                    include_once('./layout/footer.php');
                ?>
                <!-- End of Footer -->
            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        <!-- Logout Modal-->
        <?php 
            include_once('./layout/modal_logout.php');
        ?>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>

    </body>

</html>