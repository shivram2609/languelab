
<div class="container">
<title>Video Recording</title>
<h1>Video Recording</h1>
<div class="contact_bx">
<hr>
<video controls autoplay></video>

<hr>

<br>
<button id="btn-start-recording">Start Recording</button>
<button id="btn-stop-recording" disabled>Stop Recording</button>
<button id="btn-download-recording" disabled>Download Recording</button>
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
function stopRecordingCallback() {
    //video.src = video.srcObject = null;
    //video.src = URL.createObjectURL(recorder.getBlob());
    //video.play(); 
	//var tmp = recorder;
    
	//document.getElementById('btn-resume-recording').disabled = false;
	document.getElementById('btn-download-recording').disabled = false;
    //recorder.destroy();
    //recorder = null;
	//tmp.save();
}

//~ createRecording = -&gt;
  //~ recorder and recorder.exportWAV((blob)
    //~ 
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
	recorder.save();
	data = new FormData();
    data.append("audio", blob);
    console.log(data);
    die;
	recorder.destroy();
	recorder = null;

}

document.getElementById('btn-stop-recording').onclick = function() {
    this.disabled = true;
	video.pause();
	
    recorder.stopRecording(stopRecordingCallback);
};
</script>
