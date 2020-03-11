<!DOCTYPE html>
<html>
<head>
    <title>Upload File</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
</head>
<body>
<div style="display: flex; flex-direction: column">
    @csrf
    <input name="name" type="text">
    <input name="docFile" type="file">
    <button id="btnUpload" style="background-color: red;">Upload</button>
</div>
<script>
    $(document).ready(function () {
        $('#btnUpload').click(function () {
            let formData = new FormData();
            formData.set('_token', $('input[name=_token]').val());
            formData.set('name', $('input[name=name]').val());
            let file = $('input[name=docFile]')[0].files[0];
            formData.set('data', file, file.name);
            $.ajax({
                url: '/upload',
                method: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
            })
        });
    })
</script>
</body>
</html>
