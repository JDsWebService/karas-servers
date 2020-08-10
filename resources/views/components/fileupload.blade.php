<style type="text/css">
    #fileUploadPTag {
        position: relative;
        width: 100%;
        height: 100%;
        text-align: center;
        line-height: 50px;
        color: #ffffff;
        font-family: Arial;
        border: 3px dashed #fafafa;
    }
    #fileUpload {
        position: absolute;
        width: 97%;
        height: 56px;
        outline: none;
        opacity: 0;
        z-index: 10;
    }
</style>
<label for="fileUpload" class="mt-3">Resource Image</label>
<div class="form-group">
    <input type="file" id="fileUpload" name="fileUpload">
    <p id="fileUploadPTag">Drag your files here or click in this area.</p>
</div>