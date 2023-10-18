let transparentBasketballImage;

const video3 = document.getElementsByClassName('input_video3')[0];
const out3 = document.getElementsByClassName('output3')[0];
const controlsElement3 = document.getElementsByClassName('control3')[0];
const canvasCtx3 = out3.getContext('2d');
const fpsControl = new FPS();

const spinner = document.querySelector('.loading');
spinner.ontransitionend = () => {
    spinner.style.display = 'none';
};

// Add helper functions

function angleBetweenPoints(a, b, c) {
    const ab = { x: b.x - a.x, y: b.y - a.y };
    const bc = { x: c.x - b.x, y: c.y - b.y };

    const dotProduct = ab.x * bc.x + ab.y * bc.y;
    const abLength = Math.sqrt(ab.x * ab.x + ab.y * ab.y);
    const bcLength = Math.sqrt(bc.x * bc.x + bc.y * bc.y);

    return Math.acos(dotProduct / (abLength * bcLength)) * (180 / Math.PI);
}

function distanceBetweenPoints(point1, point2) {
    const dx = point1.x - point2.x;
    const dy = point1.y - point2.y;
    return Math.sqrt(dx * dx + dy * dy);
}


function isBasketballHandPlacement(landmarks, canvasWidth, canvasHeight) {
    const thumbTip = {
        x: landmarks[4].x * canvasWidth,
        y: landmarks[4].y * canvasHeight,
    };
    const indexTip = {
        x: landmarks[8].x * canvasWidth,
        y: landmarks[8].y * canvasHeight,
    };
    const middleTip = {
        x: landmarks[12].x * canvasWidth,
        y: landmarks[12].y * canvasHeight,
    };
    const ringTip = {
        x: landmarks[16].x * canvasWidth,
        y: landmarks[16].y * canvasHeight,
    };
    const pinkyTip = {
        x: landmarks[20].x * canvasWidth,
        y: landmarks[20].y * canvasHeight,
    };
    const palmBase = {
        x: landmarks[0].x * canvasWidth,
        y: landmarks[0].y * canvasHeight,
    };

    const thumbIndexDistance = distanceBetweenPoints(thumbTip, indexTip);
    const thumbMiddleDistance = distanceBetweenPoints(thumbTip, middleTip);
    const thumbPalmDistance = distanceBetweenPoints(thumbTip, palmBase);

    const minThumbIndexDistance = 10;
    const minThumbMiddleDistance = 15;
    const minThumbPalmDistance = 20;
    const minIndexMiddleDistance = 5;
    const minMiddleRingDistance = 5;
    const minRingPinkyDistance = 5;
    const minPalmMiddleDistance = 10;

    const minThumbIndexAngle = 70;
    const minIndexMiddleAngle = 10;
    const minMiddleRingAngle = 10;
    const minRingPinkyAngle = 10;

    const thumbIndexAngle = angleBetweenPoints(thumbTip, indexTip, middleTip);
    const indexMiddleAngle = angleBetweenPoints(indexTip, middleTip, ringTip);
    const middleRingAngle = angleBetweenPoints(middleTip, ringTip, pinkyTip);
    const ringPinkyAngle = angleBetweenPoints(ringTip, pinkyTip, palmBase);

    return (
        thumbIndexDistance > minThumbIndexDistance &&
        thumbMiddleDistance > minThumbMiddleDistance &&
        thumbPalmDistance > minThumbPalmDistance &&
        thumbIndexAngle > minThumbIndexAngle &&
        indexMiddleAngle > minIndexMiddleAngle &&
        middleRingAngle > minMiddleRingAngle &&
        ringPinkyAngle > minRingPinkyAngle
    );
}





function distanceBetween(point1, point2) {
    return Math.sqrt(Math.pow(point1.x - point2.x, 2) + Math.pow(point1.y - point2.y, 2));
}

function removeWhiteBackground(image) {
    const canvas = document.createElement('canvas');
    canvas.width = image.width;
    canvas.height = image.height;
    const ctx = canvas.getContext('2d');
    ctx.drawImage(image, 0, 0);

    const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
    const data = imageData.data;

    for (let i = 0; i < data.length; i += 4) {
        const r = data[i];
        const g = data[i + 1];
        const b = data[i + 2];
        const a = data[i + 3];

        if (r === 255 && g === 255 && b === 255) {
            data[i + 3] = 0;
        }
    }

    ctx.putImageData(imageData, 0, 0);
    const newImage = new Image();
    newImage.src = canvas.toDataURL('image/png');
    return newImage;
}

const basketballImage = new Image();
basketballImage.src ='basketball.png';
basketballImage.addEventListener('load', () => {
    console.log('Basketball image loaded');
    transparentBasketballImage = removeWhiteBackground(basketballImage);
});



function drawBasketballIfHandPlacementGood(canvasCtx, landmarks, canvasWidth, canvasHeight) {
    if (isBasketballHandPlacement(landmarks, canvasWidth, canvasHeight)) {
        const thumbTip = {
            x: landmarks[4].x * canvasWidth,
            y: landmarks[4].y * canvasHeight,
        };
        const middleTip = {
            x: landmarks[12].x * canvasWidth,
            y: landmarks[12].y * canvasHeight,
        };
        const centerX = (thumbTip.x + middleTip.x) / 2;
        const centerY = (thumbTip.y + middleTip.y) / 2;

        const imageSize = 80; // Adjust this value according to the desired basketball size
        canvasCtx.drawImage(
            transparentBasketballImage,
            centerX - imageSize / 2,
            centerY - imageSize / 2,
            imageSize,
            imageSize
        );
    }
}


// onResultsHands function
function onResultsHands(results) {
    document.body.classList.add('loaded');
    fpsControl.tick();

    canvasCtx3.save();
    canvasCtx3.clearRect(0, 0, out3.width, out3.height);
    canvasCtx3.drawImage(
        results.image, 0, 0, out3.width, out3.height);
    if (results.multiHandLandmarks && results.multiHandedness) {
        for (let index = 0; index < results.multiHandLandmarks.length; index++) {
            const classification = results.multiHandedness[index];
            const isRightHand = classification.label === 'Right';
            const landmarks = results.multiHandLandmarks[index];
            drawConnectors(
                canvasCtx3, landmarks, HAND_CONNECTIONS,
                { color: isRightHand ? '#00FF00' : '#FF0000' }),
                drawLandmarks(canvasCtx3, landmarks, {
                    color: isRightHand ? '#00FF00' : '#FF0000',
                    fillColor: isRightHand ? '#FF0000' : '#00FF00',
                    radius: (x) => {
                        return lerp(x.from.z, -0.15, .1, 10, 1);
                    }
                });
            drawBasketballIfHandPlacementGood(canvasCtx3, landmarks, out3.width, out3.height);

        }
    }
    canvasCtx3.restore();
}




const hands = new Hands({
    locateFile: (file) => {
        return `https://cdn.jsdelivr.net/npm/@mediapipe/hands@0.1/${file}`;
    }
});
hands.onResults(onResultsHands);

const camera = new Camera(video3, {
    onFrame: async () => {
        await hands.send({ image: video3 });
    },
    width: 480,
    height: 480
});
camera.start();

new ControlPanel(controlsElement3, {
    selfieMode: true,
    maxNumHands: 2,
    minDetectionConfidence: 0.5,
    minTrackingConfidence: 0.5
})
    .add([
        new StaticText({ title: 'MediaPipe Hands' }),
        fpsControl,
        new Toggle({ title: 'Selfie Mode', field: 'selfieMode' }),
        new Slider(
            { title: 'Max Number of Hands', field: 'maxNumHands', range: [1, 4], step: 1 }),
        new Slider({
            title: 'Min Detection Confidence',
            field: 'minDetectionConfidence',
            range: [0, 1],
            step: 0.01
        }),
        new Slider({
            title: 'Min Tracking Confidence',
            field: 'minTrackingConfidence',
            range: [0, 1],
            step: 0.01
        }),
    ])
    .on(options => {
        video3.classList.toggle('selfie', options.selfieMode);
        hands.setOptions(options);
    });
