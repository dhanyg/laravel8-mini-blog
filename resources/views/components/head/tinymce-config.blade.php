<div>
    <script src=" {{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script>
        // tinymce.init({
        //     selector: 'textarea#content_post', // Replace this CSS selector to match the placeholder element for TinyMCE
        //     plugins: 'code table lists',
        //     toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
        // });
        tinymce.init({
            selector: '#content_post',
            plugins: 'anchor autolink charmap codesample emoticons link lists searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
                "See docs to implement AI Assistant")),
        });
    </script>
</div>
