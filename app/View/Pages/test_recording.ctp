
<div class="container">
<title>Video Recording</title>
<?php echo $this->Form->create(array("type"=>"file","class"=>"profile_bx")); ?>
<?php echo $this->Form->input("video",array("type"=>"hidden","label"=>false,"div"=>false , "id"=> "record-video")); ?>
<?php echo $this->Form->end();?>
<h1 id="header">Video Recording</h1>
<div class="contact_bx">
<hr>
<video controls autoplay></video>

<hr>
<?php pr($url); die; ?>
<br>
<button id="btn-start-recording">Start Recording</button>
<button id="btn-stop-recording" disabled>Stop Recording</button>
<button id="btn-download-recording" disabled>Download Recording</button>
 <a href= 'WWW_ROOT."img/"."tmp_record/"."RecordRTC-2018910.webm"'>Visit W3Schools.com!</a> 
<button id="btn-download-recording" disabled>Play Uploaded Video</button>
<button id="btn-upload-recording" disabled>Upload Recording</button>
</div>
</div>
<script src="https://cdn.webrtc-experiment.com/RecordRTC.js"></script>
<script src="https://webrtc.github.io/adapter/adapter-latest.js"></script>
<script>
var video = document.querySelector('video');
function captureCamera(callback) {
    navigator.mediaDevices.getUserMedia({ audio: true, video: true }).then(function(camera) {
        callback(camera);
    }).catch(function(error) {
        alert('Unable to capture your camera. Please check console logs.');
        console.error(error);
    });
}

function getFileName(fileExtension) {
	var d = new Date();
	var year = d.getUTCFullYear();
	var month = d.getUTCMonth();
	var date = d.getUTCDate();
	return 'RecordRTC-' + year + month + date + '.' + fileExtension;
}

function stopRecordingCallback() {
    //video.src = video.srcObject = null;
    //video.src = URL.createObjectURL(recorder.getBlob());
    //video.play(); 
	//var tmp = recorder;
    
	//document.getElementById('btn-resume-recording').disabled = false;
	document.getElementById('btn-download-recording').disabled = false;
	document.getElementById('btn-upload-recording').disabled = false;
    //~ //recorder.destroy();
    //recorder = null;
	//tmp.save();
}

//~ createRecording = -&gt;
  //~ recorder and recorder.exportWAV((blob)
    //~ data = new FormData();
    //~ data.append("audio", blob);
    //~ console.log(data)
    //~ $.ajax
      //~ url: 'Your Controller path'
      //~ type: 'POST'
      //~ data: data
      //~ contentType: false
      //~ processData: false
      //~ success: -&gt;
        //~ console.log "Successfully uploaded recording."
  //~ )
  //~ return
//~ fvbvbvbvbvbv

var recorder; // globally accessible
document.getElementById('btn-start-recording').onclick = function() {
    this.disabled = true;
    captureCamera(function(camera) {
        setSrcObject(camera, video);
        video.play();
        recorder = RecordRTC(camera, {
            type: 'video'
        });
        recorder.startRecording();
        // release camera on stopRecording
        recorder.camera = camera;
        document.getElementById('btn-stop-recording').disabled = false;
    });
};

//document.getElementById('btn-resume-recording').onclick = function() {
   
	//this.disabled = true;
      //  recorder.resumeRecording();
		//setSrcObject(camera, video);
		//video.play();
        // document.getElementById('btn-stop-recording').disabled = false;
    //recorder.destroy();
    //recorder = null;
	//tmp.save();
//}
document.getElementById('btn-download-recording').onclick = function() {
    this.disabled = true;
	//~ data = new FormData();
    //~ data.append("video", recorder.getBlob());
    //~ console.log(data);
	recorder.save();
	//~ console.log(recorder);
	//~ die;
	recorder.destroy();
	recorder = null;

}

document.getElementById('btn-stop-recording').onclick = function() {
    this.disabled = true;
	video.pause();
	
    recorder.stopRecording(stopRecordingCallback);
};
	
document.getElementById('btn-upload-recording').onclick = function() {
	// get recorded blob
	var blob = recorder.getBlob();

	// generating a random file name
	var fileName = getFileName('webm');

	// we need to upload "File" --- not "Blob"
	var fileObject = new File([blob], fileName, {
		type: 'video/webm'
	});

	var formData = new FormData();

	// recorded data
	formData.append('video-blob', fileObject);

	// file name
	formData.append('video-filename', fileObject.name);
	
	$.ajax({
		url: '<?php echo SITE_LINK; ?>recording/', // replace with your own server URL
		data: formData,
		cache: false,
		contentType: false,
		processData: false,
		type: 'POST',
		success: function(response) {
			//~ alert(response);
			//~ console.log(response);
			if (response === 'success') {
				alert('successfully uploaded recorded blob');

				// file path on server
				var fileDownloadURL = '<?php echo SITE_LINK; ?>/recording/uploads/' + fileObject.name;

				// preview the uploaded file URL
				document.getElementById('header').innerHTML = '<a href="' + fileDownloadURL + '" target="_blank">' + fileDownloadURL + '</a>';

				// preview uploaded file in a VIDEO element
				document.getElementById('your-video-id').src = fileDownloadURL;

				// open uploaded file in a new tab
				window.open(fileDownloadURL);
				alert(response);
			} else {
				alert("false"); // error/failure
			}
		}
	});
	return false;
};
</script>
