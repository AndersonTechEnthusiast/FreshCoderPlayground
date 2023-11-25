<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="JavasScript/Autor/PopupViewPerfil.js"></script>
<script src="JavasScript/PerfilView/PerfilCOnta.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-i9phaz7W9l9ZGKRDcq3rGwrD1QmViyyQpjs2eZL/+D5IqI3B8FSWwZN5tg5bZ6iS" crossorigin="anonymous"></script>
<script>
    function previewImage() {
        var input = document.getElementById('imagem');
        var preview = document.getElementById('image-preview');
        var file = input.files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }
</script>
</html>