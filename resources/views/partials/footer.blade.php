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
        Underline,
        Strikethrough,
        Font,
        FontSize,
        Heading,
        List,
        ListProperties,
        TodoList,
        Table,
        TableCaption,
        TableCellProperties,
        TableColumnResize,
        TableLayout,
        TableToolbar,
        TableProperties,
        TableScroll,
        Subscript,
        Superscript,
        FontBackgroundColor,
        RemoveFormat
    } from 'ckeditor5';

    const editorEl = document.querySelector('#editor');

    ClassicEditor
        .create( {
            attachTo: editorEl,
            licenseKey: 'GPL', // Or <YOUR_LICENSE_KEY>
            plugins: [ Essentials, Paragraph, Bold, Italic, Underline, Strikethrough, Font, FontSize, Heading, List, TodoList, ListProperties, Table, TableCaption, TableCellProperties, TableColumnResize, TableLayout, TableToolbar, TableProperties,TableScroll, Subscript, Superscript, FontBackgroundColor, RemoveFormat ],
            toolbar: [
                'undo', 'redo', '|', 'heading', '|', 'bold', 'italic', 'underline', 'strikethrough', 'subscript', 'superscript', 'removeFormat', '|',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor','|', 'bulletedList', 'numberedList', 'todoList', '|',
                'insertTable', 'insertTableLayout'
            ],
            licenseKey: 'GPL',
            fontFamily: {
                supportAllValues: true
            },
            fontSize: {
                options: [10, 12, 14, 'default', 18, 20, 22],
                supportAllValues: true
            },
            heading: {
                options: [
                    {
                        model: 'paragraph',
                        title: 'Paragraph',
                        class: 'ck-heading_paragraph'
                    },
                    {
                        model: 'heading1',
                        view: 'h1',
                        title: 'Heading 1',
                        class: 'ck-heading_heading1'
                    },
                    {
                        model: 'heading2',
                        view: 'h2',
                        title: 'Heading 2',
                        class: 'ck-heading_heading2'
                    },
                    {
                        model: 'heading3',
                        view: 'h3',
                        title: 'Heading 3',
                        class: 'ck-heading_heading3'
                    },
                    {
                        model: 'heading4',
                        view: 'h4',
                        title: 'Heading 4',
                        class: 'ck-heading_heading4'
                    },
                    {
                        model: 'heading5',
                        view: 'h5',
                        title: 'Heading 5',
                        class: 'ck-heading_heading5'
                    },
                    {
                        model: 'heading6',
                        view: 'h6',
                        title: 'Heading 6',
                        class: 'ck-heading_heading6'
                    }
                ]
            },
            list: {
                properties: {
                    styles: true,
                    startIndex: true,
                    reversed: true
                }
            },
            table: {
                contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells', 'tableProperties', 'tableCellProperties']
            }
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