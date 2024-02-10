var baseUrl = jQuery('#base_url').val();

/************ Video ************/
var datafile = new plupload.Uploader({
    runtimes: 'html5,flash,silverlight,html4',
    browse_button: 'uploadFile', // you can pass in id...
    container: document.getElementById('container'), // ... or DOM Element itself
    chunk_size: '1mb',
    url: baseUrl + '/admin/video/saveChunk',
    max_file_count: 1,
    unique_names: true,
    send_file_name: true,
    multi_selection: false,
    filters: {
        mime_types: [
            { title: "Content files", extensions: "mp4" },
        ],
        prevent_duplicates: true
    },
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    init: {
        PostInit: function () {
            document.getElementById('filelist').innerHTML = '';
            document.getElementById('upload').onclick = function () {
                datafile.start();
                return false;
            };
        },
        FilesAdded: function (up, files) {

            while (up.files.length > 1) {
                up.removeFile(up.files[0]);
                document.getElementById('filelist').innerHTML = '';
            }

            plupload.each(files, function (file) {
                document.getElementById('filelist').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
            });
        },
        UploadProgress: function (up, file) {
            document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
            if (file.percent > 60) {
                // jQuery('#mp3_file_name').val(file.name);
            }
        },
        FileUploaded: function (up, file) {
            jQuery('#mp3_file_name').val(file.target_name);
        },
        Error: function (up, err) {
            document.getElementById('console').innerHTML += "\nError #" + err.code + ": " + err.message;
        }
    }
});
datafile.init();

/************ Music ************/
var datafile1 = new plupload.Uploader({
    runtimes: 'html5,flash,silverlight,html4',
    browse_button: 'uploadFile1', // you can pass in id...
    container: document.getElementById('container1'), // ... or DOM Element itself
    chunk_size: '1mb',
    url: baseUrl + '/admin/music/saveChunk',
    max_file_count: 1,
    unique_names: true,
    send_file_name: true,
    multi_selection: false,
    filters: {
        mime_types: [
            { title: "Content files", extensions: "mp3" },
        ],
        prevent_duplicates: true
    },
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    init: {
        PostInit: function () {
            document.getElementById('filelist1').innerHTML = '';
            document.getElementById('upload1').onclick = function () {
                datafile1.start();
                return false;
            };
        },
        FilesAdded: function (up, files) {

            while (up.files.length > 1) {
                up.removeFile(up.files[0]);
                document.getElementById('filelist1').innerHTML = '';
            }

            plupload.each(files, function (file) {
                document.getElementById('filelist1').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
            });
        },
        UploadProgress: function (up, file) {
            document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
            if (file.percent > 60) {
                // jQuery('#mp3_file_name1').val(file.name);
            }
        },
        FileUploaded: function (up, file) {
            jQuery('#mp3_file_name1').val(file.target_name);
        },
        Error: function (up, err) {
            document.getElementById('console1').innerHTML += "\nError #" + err.code + ": " + err.message;
        }
    }
});
datafile1.init();
/***********************************************/