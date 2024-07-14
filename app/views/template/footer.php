
<script>
    const root_url = "<?=BASEURL?>"
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="<?=BASEURL?>/bootstrapjs/bootstrap.js"></script>
<script src="<?=BASEURL?>/bootstrapjs/jquery.js"></script>
<script src="<?=BASEURL?>/js/script.js"></script>

<!-- ternyata bisa juga tanpa harus dari link http://localhost....public/ jadi langsung ke folder nya seakan akan sudah di public tanpa diarahkan ke public -->
<script src="sweetalert/sweetalert.js"></script>

<!-- kalau gak ada $data['js'] script dibawah gak bakal ada jadi gak bakal ada error misal $data['js'] kosong -->
<?php if(isset($data['js']) && !empty($data['js'])): ?>
    <script src="<?=$data['js']?>"></script>
<?php endif; ?>

</body>
</html>