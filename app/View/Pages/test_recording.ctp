<style>
    html, body {
        margin: 0!important;
        padding: 0!important;
        overflow: hidden!important;
        width: 100%;
    }
</style>

<title>Video Recording</title>
<h1>Video Recording</h1>

<br>

<button id="btn-start-recording">Start Recording</button>
<button id="btn-stop-recording" disabled>Stop Recording</button>

<hr>
<video controls autoplay></video>


<br/>
<br/>
<br/>
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
    video.src = video.srcObject = null;
    video.src = URL.createObjectURL(recorder.getBlob());
    video.play();
    recorder.camera.stop();
    recorder.destroy();
    recorder = null;
}
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
document.getElementById('btn-stop-recording').onclick = function() {
    this.disabled = true;
    recorder.stopRecording(stopRecordingCallback);
};
</script>
