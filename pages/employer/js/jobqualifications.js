tinymce.init({
    selector: "#jobdescription_textarea1",
    menubar: false,
    plugins: 'link lists autoresize help',
    toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | indent outdent | bullist numlist',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
    
    init_instance_callback : function(editor) {
        var freeTiny = document.querySelector('.tox .tox-notification--in');
    freeTiny.style.display = 'none';
    }
});

tinymce.init({
    selector: "#jobdescription_textarea2",
    menubar: false,
    plugins: 'link lists autoresize help',
    toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | indent outdent | bullist numlist',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
    
    init_instance_callback : function(editor) {
        var freeTiny = document.querySelector('.tox .tox-notification--in');
    freeTiny.style.display = 'none';
    }
});

tinymce.init({
    selector: "#jobdescription_textarea3",
    menubar: false,
    plugins: 'link lists autoresize help',
    toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | indent outdent | bullist numlist',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
    
    init_instance_callback : function(editor) {
        var freeTiny = document.querySelector('.tox .tox-notification--in');
    freeTiny.style.display = 'none';
    }
});

tinymce.init({
    selector: "#addjobdescription_textarea1",
    menubar: false,
    plugins: 'link lists autoresize help',
    toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | indent outdent | bullist numlist',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
    
});

tinymce.init({
    selector: "#addjobdescription_textarea2",
    menubar: false,
    plugins: 'link lists autoresize help',
    toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncentre alignright alignjustify | indent outdent | bullist numlist',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
});

tinymce.init({
    selector: "#addjobdescription_textarea3",
    menubar: false,
    plugins: 'link lists autoresize help',
    toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncentre alignright alignjustify | indent outdent | bullist numlist',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
});