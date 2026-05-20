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
{{-- Tắt các plugin cũ không cần thiết nữa --}}
{{-- <script src="/assets_admin/plugins/simplebar/js/simplebar.min.js"></script> --}}
{{-- <script src="/assets_admin/plugins/metismenu/js/metisMenu.min.js"></script> --}}
{{-- <script src="/assets_admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script> --}}
{{-- <script src="/assets_admin/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script> --}}
{{-- <script src="/assets_admin/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script> --}}
{{-- <script src="/assets_admin/js/app.js"></script> --}}
