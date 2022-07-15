<!-- MDB JAVASCRIPT & POPPER, BOOTSTRAPS, JQUERY -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/js/main.js'); ?>"></script>

<script>
    $("#sidebarToggle2").click(() => {
        $('#hidden').hide();
    });

    $("#sidebarToggle").click(() => {
        $('#hidden').show();
    })



    //SELECTOR
    const selectorpersonas = $('selector-webcomponent[name=selectorpersonas]');
    let v = selectorpersonas[0].getValue();
    console.log(v);
</script>
</body>

</html>