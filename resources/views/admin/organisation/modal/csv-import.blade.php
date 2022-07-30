<div class="progress d-none" id="progress">
    <div id="progressBar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<div class="modal-header">
    <h5>
        Import CSV File
    </h5>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12 d-none  mb-3 alert alert-success" id="message"></div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="csv_file" class="label-control">CSV File
                    <sup class="text-danger">*</sup>
                </label>
                <input type="file" accept="application/csv" name="csv_file" id="csv_file" class="form-control" />
            </div>
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="button" onclick="uploadFile()" class="btn btn-primary">Import CSV</button>
</div>

<script>
    function _(el) {
        return document.getElementById(el);
    }

    function uploadFile() {
        $("#message").addClass("d-none");
        var file = _("csv_file").files[0];
        // alert(file.name+" | "+file.size+" | "+file.type);
        var formdata = new FormData();
        formdata.append("csv_file", file);
        var ajax = new XMLHttpRequest();
        ajax.upload.addEventListener("progress", progressHandler, false);
        ajax.addEventListener("load", completeHandler, false);
        ajax.addEventListener("error", errorHandler, false);
        ajax.addEventListener("abort", abortHandler, false);

        ajax.open("POST", "{{ route('admin.org.store_csv_upload',$organisation->id) }}"); // http://www.developphp.com/video/JavaScript/File-Upload-Progress-Bar-Meter-Tutorial-Ajax-PHP
        ajax.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
        //use file_upload_parser.php from above url
        ajax.send(formdata);
    }

    function progressHandler(event) {
        // _("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
        var percent = (event.loaded / event.total) * 100;
        $(".progress").removeClass("d-none");
        console.log(Math.round(percent) + "%");
        let widthValue = Math.round(percent) + "%"
        $(".progress-bar").css("width", widthValue);
        // _("progressBar").value = Math.round(percent);
        // _("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
    }

    function completeHandler(event) {
        $("#progress").addClass('d-none');
        $(".progress-bar").css("width", "0%");
        let response = JSON.parse(event.target.responseText);
        $("#message").removeClass("d-none").html(response.data);
        // _("status").innerHTML = event.target.responseText;
        // _("progressBar").value = 0; //wil clear progress bar after successful upload
    }

    function errorHandler(event) {
        _("status").innerHTML = "Upload Failed";
    }

    function abortHandler(event) {
        _("status").innerHTML = "Upload Aborted";
    }
</script>