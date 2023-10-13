<script src="https://cdn.tiny.cloud/1/i9vfj3c8zyapexx0bkwr6l63641qn5wlvr1np9fwmxounnji/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>

<script>
    tinymce.init({
        selector: '#editor',
        language: 'ar',
        directionality : 'rtl',
        height:500,
        fontsize_formats:
            "8pt 9pt 10pt 11pt 12pt 14pt 16pt 18pt 24pt 30pt 36pt 48pt 60pt 72pt 96pt",
        plugins: 'a11ychecker advcode casechange powerpaste export formatpainter linkchecker autolink lists media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker image emoticons',
        toolbar: 'a11ycheck casechange checklist code export formatpainter table image undo redo fontsizeselect styleselect bold italic forecolor  backcolor | addcomment showcomments pageembed permanentpen bullist numlist outdent indent alignleft  aligncenter alignright alignjustify emoticons',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Mahmoud Nasr',
        document_base_url: "{{ config('app.url').'/photos' }}",
        relative_urls: false,
        remove_script_host: false,
        powerpaste_allow_local_images: true,
        powerpaste_word_import: 'prompt',
        powerpaste_html_import: 'prompt',
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tiny.cloud/css/codepen.min.css'],
        setup: function (editor) {
            editor.on('change', function () {
                tinymce.triggerSave();
            });
        },
        file_picker_callback (callback, value, meta) {
            let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth
            let y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight

            tinymce.activeEditor.windowManager.openUrl({
                url : '/file-manager/tinymce5',
                title : 'Laravel File manager',
                width : x * 0.8,
                height : y * 0.8,
                onMessage: (api, message) => {
                    callback(message.content, { text: message.text })
                }
            })
        }

    });
</script>
