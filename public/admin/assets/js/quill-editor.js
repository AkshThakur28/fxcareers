(function () {
    'use strict';

    /* Quill snow editor */
    var toolbarOptions = [
        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
        [{ 'font': [] }],
        ['bold', 'italic', 'underline', 'strike'],
        ['blockquote', 'code-block'],
        [{ 'list': 'ordered' }, { 'list': 'bullet' }],
        [{ 'indent': '-1' }, { 'indent': '+1' }],
        [{ 'size': ['small', false, 'large', 'huge'] }],
        [{ 'color': [] }, { 'background': [] }],
        ['image', 'video'],
        ['clean']
    ];
    
    var quill = new Quill('#editor', {
        modules: {
            toolbar: toolbarOptions
        },
        theme: 'snow'
    });

    // Sync Quill content to hidden input on form submission
    document.querySelector('form').addEventListener('submit', function () {
        var hiddenInput = document.querySelector('#hiddenLongDescription');
        if (hiddenInput) {
            hiddenInput.value = quill.root.innerHTML;
        }
    });



    /* Sync Quill content with hidden input on form submission */
    document.querySelector('form').addEventListener('submit', function () {
        // Update hidden input with Quill's content
        var hiddenInput = document.querySelector('#hiddenLongDescription');
        if (hiddenInput) {
            hiddenInput.value = quill.root.innerHTML; // Quill's content in HTML format
        }
    });

    /* quill bubble editor */
    var quillBubble = new Quill('#editor1', {
        modules: {
            toolbar: undefined
        },
        theme: 'bubble'
    });

})();
