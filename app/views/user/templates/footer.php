<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<footer class="sticky-footer bg-dark text-white py-3">
    <div class="container d-flex align-items-start">
        <div class="mr-4">
            <img src="public/img/logo-monsafe.png" alt="logo" style="width: 100px;">
        </div>
        <p class="text-center mr-2 mb-0">&copy; 2024 MonSafe, Inc.

        </p>
    </div>
</footer>


<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin ingin keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                <a class="btn btn-primary" href=<?php echo BASEURL . "/?controller=Logoutuser" ?>>Iya</a>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap core JavaScript-->
<script src="public/vendor/jquery/jquery.min.js"></script>
<script src="public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="public/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="public/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="public/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="public/js/demo/chart-area-demo.js"></script>
<script src="public/js/demo/chart-pie-demo.js"></script>

</body>

</html>