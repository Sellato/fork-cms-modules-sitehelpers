$(function() {
    if($('#js-uploadifive').length > 0)
    {
        $('#js-uploadifive').uploadifive({
                'width'             : 'auto',
                'height'            : 'auto',
                'auto'              : false,
                'debug'             : jsBackend.current.debug,
                'simUploadLimit'    : 3,
                'formData'          : {

                                        'timestamp' : jsBackend.data.get('uploadifive.upload_timestamp'),
                                        'token'     : jsBackend.data.get('uploadifive.upload_token'),
                                        'id'     : jsBackend.data.get('uploadifive.id'),
                                        'fork[module]'     : jsBackend.current.module,
                                        'fork[action]'  : 'UploadImage',
                                        'fork[language]'    : jsBackend.current.language
                                     },
                'queueID'           : 'js-uploadifive-queue',
                'uploadScript'      : '/backend/ajax',
                'removeCompleted'   : false,
                'buttonClass'       : 'uploadifive-select-button',
                'fileType'          : 'image/*',
                'buttonText'        : utils.string.ucfirst(jsBackend.locale.lbl('SelectImages')),
                'onQueueComplete'   : function(file, data)
                {
                    window.location = jsBackend.data.get('uploadifive.upload_uploaded_success_url')
                },
                'onFallback'        : function() {
                    //window.location = jsBackend.data.get('uploadifive.upload_uploaded_fallback_url')
                 }
            });


        $('.js-upload-start').click(function(e){
            e.preventDefault();
            $('#js-uploadifive').uploadifive('upload')
        });

        $('.uploadifive-button').removeClass('uploadifive-button');
    }
});
