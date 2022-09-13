<footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
            <!-- <p>2021 &copy; Mazer</p> -->
        </div>
        <div class="float-end">
            <!-- <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="https://saugi.me">Saugi</a></p> -->
        </div>
    </div>
</footer>
</div>
</div>
<script src="<?= base_url('assets/template/'); ?>assets/js/bootstrap.js"></script>
<script src="<?= base_url('assets/template/'); ?>assets/js/app.js"></script>

<!-- Need: Apexcharts -->
<script src="<?= base_url('assets/template/'); ?>assets/extensions/apexcharts/apexcharts.min.js"></script>
<script src="<?= base_url('assets/template/'); ?>assets/js/pages/dashboard.js"></script>

<!-- jquery -->
<script src="<?= base_url('assets/template/'); ?>assets/extensions/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/template/'); ?>assets/extensions/parsleyjs/parsley.min.js"></script>
<script src="<?= base_url('assets/template/'); ?>assets/js/pages/parsley.js"></script>
<!-- <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="<?= base_url('assets/template/'); ?>assets/js/pages/datatables.js"></script> -->

<script src="<?= base_url('assets/template/'); ?>assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="<?= base_url('assets/template/'); ?>assets/js/pages/simple-datatables.js"></script>
<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("card-content");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>
</body>

</html>