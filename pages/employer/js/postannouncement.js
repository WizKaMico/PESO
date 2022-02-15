tinymce.init({
    selector: "#announcement_textarea",
    menubar: false,
    plugins: 'link lists autoresize help',
    toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncentre alignright alignjustify | indent outdent | bullist numlist',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
    
    init_instance_callback : function(editor) {
        var freeTiny = document.querySelector('.tox .tox-notification--in');
    freeTiny.style.display = 'none';
    }
});
