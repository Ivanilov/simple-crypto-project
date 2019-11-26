@extends('frontend.layouts.app')

@section('title', app_name() . ' | Регистрация партнера')

@section('content')
    <div class="content d-flex justify-content-center align-items-center">
        <!-- Registration form -->
    {{ html()->form('POST', route('frontend.registry-attend.send'))->class('flex-fill')->acceptsFiles()->open() }}
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <i class="icon-plus3 icon-2x text-success border-success border-3 rounded-round p-3 mb-3 mt-1"></i>
                            <h5 class="mb-0">Регистрация партнёра</h5>
                            <span class="d-block text-muted">Пожалуйста, заполните все поля</span>
                        </div>

                        <div action="{!! route('frontend.registry-attend.dropzone-upload') !!}" class="dropzone dz-clickable" id="dropzone-files">
                            {!! Form::hidden('files_order', '[]'); !!}
                            <div class="dz-default dz-message"><span>Перетащите файлы для загрузки <span>или НАЖМИТЕ на иконку</span></span></div>
                        </div>
                        <div class="text-left mb-3 mt-3" >
                            <span class="d-block text-muted">Размер файла не может превышать 2MB.<br> Разрешается загружать до 5 файлов.<br> Разрешенные форматы файлов: .doc/.docx, .xls/.xlsx, .zip/.rar, .jpg/.jpeg/.png .</span>
                        </div>
                        <button type="submit"  class="btn bg-teal-400 btn-labeled btn-labeled-right"><b><i class="icon-plus3"></i></b>Отправить</button>
                    </div>
                </div>
            </div>
        </div>
    {{ html()->form()->close() }}

</div>
@endsection
@push('after-scripts')
    {!! script('frontend/js/plugins/inputmask/inputmask.js') !!}
    {!! script('frontend/js/plugins/dropzone/dropzone.min.js') !!}
    {!! script('frontend/js/plugins/jquery_ui/full.min.js') !!}
    <script>
        $('#phone').inputmask({ alias: "phone", "clearIncomplete": true });
        $(function() {
            $('input[type="tel"]').inputmask({ alias: "phone", "clearIncomplete": true });
        });
        Dropzone.autoDiscover = false;
        $(function() {
            $( "#dropzone-files" ).parent().block({
                message: '<span class="text-semibold"><i class="icon-spinner4 spinner position-left"></i>&nbsp; Обновление</span>',
                timeout: 1500,
                overlayCSS: {
                    backgroundColor: '#fff',
                    opacity: 0.8,
                    cursor: 'wait'
                },
                css: {
                    border: 0,
                    padding: '10px 15px',
                    color: '#fff',
                    width: 'auto',
                    '-webkit-border-radius': 2,
                    '-moz-border-radius': 2,
                    backgroundColor: '#333'
                }
            });
            $("#dropzone-files").dropzone({
                paramName: "file",
                acceptedFiles: ".doc,.docx,.xls,.xlsx,.zip,.rar,.jpg,.jpeg,.png",
                dictDefaultMessage: 'Переместите файлы в это поле <span>или нажмите на иконку</span>',
                maxFilesize: 2, // MB
                maxFiles: 5,
                addRemoveLinks: true,
                dictRemoveFile: 'Удалить',
                dictInvalidFileType:'Вы не можете загружать файлы данного формата',
                dictFileTooBig: 'Размер файла превышает 2MB',
                dictMaxFilesExceeded:'Вы не можете загружать больше 5 файлов',
                sending: function(file, xhr, formData) {
                    formData.append("_token", "{{ csrf_token() }}");
                },
                init:function() {
                    var dz = this;
                    // Success handler
                    this.on("success", function(file, response) {
                        file.id = response.path;
                        file.previewElement.id = response.path;
                        var order = JSON.stringify( $("#dropzone-files").sortable('toArray', { attribute: 'id' }));
                        $("[name='files_order']").val(order);
                    });
                    // File remove handler
                    this.on("removedfile", function(file) {
                        $.ajax({
                            type: 'POST',
                            url: "{!! route('frontend.registry-attend.dropzone-remove') !!}",
                            data: {id: file.id},
                            dataType: 'html',
                            success: function(data){
                                var rep = JSON.parse(data);
                                $.jGrowl('Файл успешно удален', {
                                    theme: 'alert-bordered alert-styled-right alert-success'
                                });
                                // Update images order field with new image sorted by jQuery sortable
                                var order = JSON.stringify( $("#dropzone-files").sortable('toArray', { attribute: 'id' }));
                                $("[name='files_order']").val(order);
                            }
                        });
                    });
                },
                // Error handler
                error: function(file, response) {
                    if($.type(response) === "string"){
                        var message = response;
                    } else {
                        var message = response.message;
                    }
                    file.previewElement.classList.add("dz-error");
                    _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
                    _results = [];
                    for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                        node = _ref[_i];
                        _results.push(node.textContent = message);
                    }
                    return _results;
                },
                success: function(file,done) {
                    $.jGrowl('Файл успешно загружен', {
                        theme: 'alert-bordered alert-styled-right alert-success'
                    });
                }
            });
            /*
             *  Images could be already loaded if user refreshed this page,
             *  so we save them to the dropzone and add them to Dropzone field
             */
            // Init jQuery sortable for post gallery
            $( "#dropzone-files" ).sortable({
                items:'.dz-preview',
                cursor: 'move',
                opacity: 0.5,
                update: function(e, ui){
                    var order = JSON.stringify( $("#dropzone-files").sortable('toArray', { attribute: 'id' }));
                    $("[name='files_order']").val(order);
                }
            });
            $( ".sortable" ).disableSelection();
            // Check files if page was updated
            files_order = $.parseJSON($("[name='files_order']").val());
            // Set ajax async to false to prevent jQuery sortable errors, when files uploads asynchronously
            $.ajaxSetup({
                async: false
            });
            // Add already uploaded images before page refresh
            files_order.forEach(function(file) {
                $.ajax({
                    url : "{!! route('frontend.registry-attend.file-exists') !!}",
                    type: "post",
                    data : 'path=' + file,
                    success: function(data) {
                        if(data.exists) {
                            var mockFile = {
                                id: data.path,
                                name: data.name,
                                size: data.size,
                                type: data.mimetype,
                                status: Dropzone.ADDED,
                                url: '/' + data.path
                            };
                            Dropzone.forElement("#dropzone-files").emit("addedfile", mockFile);
                            Dropzone.forElement("#dropzone-files").emit("thumbnail", mockFile, '/' + data.path);
                            Dropzone.forElement("#dropzone-files").files.push(mockFile);
                            $(mockFile.previewElement).prop('id', data.path);
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        error_message =  errorThrown;
                        if(jQuery.parseJSON(jqXHR.responseText).string)
                        {
                            error_message = error_message + ': ' + jQuery.parseJSON(jqXHR.responseText).string;
                        }
                        $.jGrowl(error_message, {
                            header: '',
                            theme: 'alert-bordered alert-styled-right alert-info'
                        });
                    }
                });
            });
            // Update images order field
            var order = JSON.stringify( $("#dropzone-files").sortable('toArray', { attribute: 'id' }), 4);
            $("[name='files_order']").val(order);
        });
        $(function() {
            $('.file-input').each(function(i, obj) {
                var initPreview = null;
                if($(obj).attr('data-image-url') !== undefined && $(obj).attr('data-image-url') !== '')
                    initPreview = "<img src='"+$(obj).attr('data-image-url')+"' class='file-preview-image' alt=''>";
                $(obj).fileinput({
                    browseLabel: 'Выбрать',
                    removeLabel: 'Удалить',
                    browseIcon: '<i class="fas fa-search"></i>',
                    uploadIcon: '<i class="fas fa-file-upload"></i>',
                    removeIcon: '<i class="fas fa-times"></i>',
                    showCancel: false,
                    //removeClass:'hidden',
                    layoutTemplates: {
                        icon: '<i class="icon-file-check"></i>'
                    },
                    initialCaption: "Файл не выбран",
                    initialPreview: [
                        initPreview,
                    ],
                    allowedFileExtensions: [ "doc","docx","xls","xlsx","zip","rar","png","jpg","jpeg"]
                });
            });
            $('body').on('click','.fileinput-remove-button', function(e){
                $(this).parent().after('<input name="remove_' + $(this).parent().find('.file-input').attr('name') + '" id="remove_' + $(this).parent().find('.file-input').attr('name') + '" type="hidden" value="true" />');
            });
        });
    </script>
@endpush
