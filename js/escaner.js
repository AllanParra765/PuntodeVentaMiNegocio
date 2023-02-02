var _scannerIsRunning = false;

function startScanner() {
    Quagga.init({
        inputStream: {
            name: "Live",
            type: "LiveStream",
            target: document.querySelector('#scanner-container'),
            constraints: {
                width: 280,
                height: 180,
                facingMode: "environment"
            },
        },
        decoder: {
            readers: [
                "code_128_reader",
                "ean_reader",
                "ean_8_reader",
                "code_39_reader",
                "code_39_vin_reader",
                "codabar_reader",
                "upc_reader",
                "upc_e_reader",
                "i2of5_reader"
            ],
            debug: {
                showCanvas: true,
                showPatches: true,
                showFoundPatches: true,
                showSkeleton: true,
                showLabels: true,
                showPatchLabels: true,
                showRemainingPatchLabels: true,
                boxFromPatches: {
                    showTransformed: true,
                    showTransformedBox: true,
                    showBB: true
                }
            }
        },

    }, function (err) {
        if (err) {
            console.log(err+" Se detuvo");
            return
        }

        console.log("Initialization finished. Ready to start");
        Quagga.start();

        // Set flag to is running
        _scannerIsRunning = true;
    });

    Quagga.onProcessed(function (result) {
        var drawingCtx = Quagga.canvas.ctx.overlay,
        drawingCanvas = Quagga.canvas.dom.overlay;

        if (result) {
//                    console.log ("que es result"+result);//es un objeto
            if (result.boxes) {
               // console.log("que es result.boxes "+ result.boxes);//una serie de enteros con decimal
                drawingCtx.clearRect(0, 0, parseInt(drawingCanvas.getAttribute("width")), parseInt(drawingCanvas.getAttribute("height")));//se toman las cordenadas de x,y,ancho,largo) para pintarlas
                result.boxes.filter(function (box) {
                   // console.log("resultado de box "+ box)
                    return box !== result.box;
                }).forEach(function (box) {
                    Quagga.ImageDebug.drawPath(box, { x: 0, y: 1 }, drawingCtx, { color: "green", lineWidth: 2 });
                });
            }

            if (result.box) {
                Quagga.ImageDebug.drawPath(result.box, { x: 0, y: 1 }, drawingCtx, { color: "yellow", lineWidth: 2 });
            }

            if (result.codeResult && result.codeResult.code) {
                Quagga.ImageDebug.drawPath(result.line, { x: 'x', y: 'y' }, drawingCtx, { color: 'red', lineWidth: 3 });
            }
        }
    });


    Quagga.onDetected(function (result) {
            var code = result.codeResult.code;
              document.querySelector("#codigo").value = code;
       // console.log("Barcode detected and processed : [" + result.codeResult.code + "]", result);
    //alert("Barcode detected and processed : [" + result.codeResult.code + "]", result);
    //document.formulario.codigo.value = result.codeResult.code,result;
    //document.formulario.codigo.value = result.codeResult.code,result;
    //var capa=document.getElementById("#codigo");//.value=result.codeResult.code,result;
    //capa.appendChild(result.codeResult.code,result);
   // document.getElementById('#codigo').innerHTML = result.codeResult.code,result; 
    });
}


// Start/stop scanner
document.getElementById("btn").addEventListener("click", function () {
    if (_scannerIsRunning) {
        Quagga.stop();
    } else {
        startScanner();
    }
}, false);
