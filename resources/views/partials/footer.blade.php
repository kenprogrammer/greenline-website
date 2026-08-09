 <footer class="main-footer">
    <strong>Copyright &copy; 2024 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->
<script>
   $(document).ready(function() {
        /**
         * Show and hide password
         */
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if($('#show_hide_password input').attr("type") == "text"){
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass( "fa-eye-slash" );
                $('#show_hide_password i').removeClass( "fa-eye" );
            }else if($('#show_hide_password input').attr("type") == "password"){
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass( "fa-eye-slash" );
                $('#show_hide_password i').addClass( "fa-eye" );
            }
        });
    });
</script>
<!--ckEditor-->
<script type="importmap">
    {
        "imports": {
            "ckeditor5": "{{ asset('plugins/ckeditor5/ckeditor5.js') }}",
            "ckeditor5/": "{{ asset('plugins/ckeditor5/') }}"
        }
    }
</script>
<script type="module">
   import {
        ClassicEditor,
        Essentials,
        Paragraph,
        Bold,
        Italic,
        Font
    } from 'ckeditor5';

    const editorEl = document.querySelector('#editor');

    ClassicEditor
        .create( {
            attachTo: editorEl,
            licenseKey: 'GPL', // Or <YOUR_LICENSE_KEY>
            plugins: [ Essentials, Paragraph, Bold, Italic, Font ],
            toolbar: [
                'undo', 'redo', '|', 'bold', 'italic', '|',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
            ],
            licenseKey: 'GPL'
        } )
        .then( editor => {
            window.editor = editor;

            // Optional: Sync with Livewire if needed
            editor.model.document.on('change:data', () => {
                const component = Livewire.find(editorEl.closest('[wire\\:id]').getAttribute('wire:id'));
                component.set('post_content', editor.getData());
            });
        } )
        .catch( error => {
            console.error( error );
        } );
</script>
</body>
</html>