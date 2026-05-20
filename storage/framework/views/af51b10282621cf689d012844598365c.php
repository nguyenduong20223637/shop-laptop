<script src="/assets_admin/js/bootstrap.bundle.min.js"></script>
<script>
// Fix CKEditor đè lên Bootstrap modal - chạy sau khi tất cả đã load
$(document).on('show.bs.modal', '.modal', function() {
    if (typeof CKEDITOR !== 'undefined') {
        $.each(CKEDITOR.instances, function(name, editor) {
            $(editor.container.$).hide();
        });
    }
});
$(document).on('hidden.bs.modal', '.modal', function() {
    if (typeof CKEDITOR !== 'undefined') {
        $.each(CKEDITOR.instances, function(name, editor) {
            $(editor.container.$).show();
        });
    }
});
</script>







<?php /**PATH C:\xampp\htdocs\Shop-laptop\resources\views/admin/share/js.blade.php ENDPATH**/ ?>