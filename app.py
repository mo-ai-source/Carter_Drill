from flask import Flask, render_template, Response
import cv2
from yolo_detection import init_yolo, detect_basketballs

app = Flask(__name__)
camera = cv2.VideoCapture(0)
net, output_layers = init_yolo()

@app.route('/')
def index():
    return render_template('index.html')

def gen_frames():
    while True:
        success, frame = camera.read()
        if not success:
            break
        else:
            boxes, confidences, class_ids = detect_basketballs(net, output_layers, frame)
            for i in range(len(boxes)):
                x, y, w, h = boxes[i]
                label = str(class_ids[i])
                color = (0, 255, 0)
                cv2.rectangle(frame, (x, y), (x + w, y + h), color, 2)
            ret, buffer = cv2.imencode('.jpg', frame)
            frame = buffer.tobytes()
            yield (b'--frame\r\n'
                   b'Content-Type: image/jpeg\r\n\r\n' + frame + b'\r\n')

@app.route('/video_feed')
def video_feed():
    return Response(gen_frames(), mimetype='multipart/x-mixed-replace; boundary=frame')

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000, debug=True)
