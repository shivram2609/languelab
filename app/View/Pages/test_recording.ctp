
<div class="container">
<title>Video Recording</title>
<h1 id="header">Video Recording</h1>
<div class="contact_bx">
<hr>
<video controls autoplay></video>

<hr>

<br>
<button id="btn-start-recording">Start Recording</button>
<button id="btn-stop-recording" disabled>Stop Recording</button>
<button id="btn-download-recording" disabled>Download Recording</button>
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
	video.upload();
	console.log(recorder);
	die;
	recorder.destroy();
	recorder = null;

}

document.getElementById('btn-stop-recording').onclick = function() {
    this.disabled = true;
	video.pause();
	
    recorder.stopRecording(stopRecordingCallback);
};

document.getElementById('btn-upload-recording').onclick = function() {
    var blob = recorder.getBlob();
	console.log(blob);
	// generating a random file name
	var fileName = getFileName('webm');
	console.log(fileName);
	// we need to upload "File" --- not "Blob"
	var fileObject = new File([blob], fileName, {
		type: 'video/webm'
	});
	var formData = new FormData();

		// recorded data
		formData.append('video-blob', fileObject);

		// file name
		formData.append('video-filename', fileObject.name);

		document.getElementById('header').innerHTML = 'Uploading to Server: (' +  bytesToSize(fileObject.size) + ')';
};
</script>
