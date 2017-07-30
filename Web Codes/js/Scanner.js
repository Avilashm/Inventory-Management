/**
 * Created by parth trehan on 7/10/2017.
 */
var scanner = new Instascan.Scanner({
    video: document.getElementById('preview'),
    mirror: false
});
scanner.addListener('scan', function (content) {

   var r = confirm("You are being redirected, Press OK to continue");
   
    if(r==true){ window.location.href = "getdata.php?w=2&id="+content;
									}
    //here you have to redirect

});
Instascan.Camera.getCameras().then(function (cameras) {
    console.log(cameras)
    if (cameras.length == 1) {
        scanner.start(cameras[0]);
    }
    else if (cameras.length > 1) {
        scanner.start(cameras[1]);
    }
    else {
        console.error('No cameras found.');
    }
}).catch(function (e) {
    console.error(e);
});